<?
$url = "http://www.brightshare.com/top_payouts/AllSlotsTopPayouts.xml";
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_HEADER, FALSE); 
curl_setopt($ch, CURLOPT_NOBODY, FALSE); 
curl_setopt($ch,CURLOPT_TIMEOUT,10); // TIME OUT is 5 seconds
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
$response = curl_exec($ch); 
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
curl_close($ch); 
$xml = simplexml_load_string($response);

$winners_found = 0;
if($xml){
foreach($xml->children() as $data)
 {

 // gather data
 $winner['feed_id'] = $show['id'];
 $winner['date'] = trim($data->Date);
 $winner['player'] = trim($data->Name);
 $winner['country'] = trim($data->Country);
 $winner['currency'] = "USD";
 $winner['amount'] = trim($data->Amount);
 $winner['game'] = trim($data->Game);
 $winner['casino'] = trim($data->Casino);

 // get the casino ID, or create a new record if the casino is new
 $winner['casino_id'] = lookup_casino($show['id'], $winner['casino']);
 
 // transform some data
 $winner['date'] = date("U", strtotime($winner['date']));
 $winner['amount'] = str_replace(",", "", $winner['amount']);
 $winner['amount'] = str_replace("\$", "", $winner['amount']);
 $winner['amount'] = round($winner['amount'], 2);
 
 // validate the data
 if($winner['date'] > $deadline AND strlen($winner['date']) == 10 AND strlen($winner['player']) > 0 AND $winner['amount'] > 0)
  {
  $winners_found++;
  if(!lookup_winner($winner))
   {
   // new winner, add to database
   try{
    $query4 = $db->prepare("INSERT INTO winner_players (id, feed_id, casino_id, player_name, player_country, won_currency, won_amount, won_date, game) VALUES ('', (:feed_id), (:casino_id), (:player_name), (:player_country), (:won_currency), (:won_amount), (:won_date), (:game))");
    $query4->bindParam(":feed_id", $winner['feed_id']);
    $query4->bindParam(":casino_id", $winner['casino_id']);
    $query4->bindParam(":player_name", $winner['player']);
    $query4->bindParam(":player_country", $winner['country']);
    $query4->bindParam(":won_currency", $winner['currency']);
    $query4->bindParam(":won_amount", $winner['amount']);
    $query4->bindParam(":won_date", $winner['date']);
    $query4->bindParam(":game", $winner['game']);
    $query4->execute();
    }catch(PDOException $e) { die("ERROR: A database error occured."); }
   }
  }
 }
 if($winners_found == 0)
  {
  echo "WARNING: 0 winners found in ".$show['name']." datafeed. Please check if the URL is  still valid.<br />";
  }
 }
else
 {
 echo "WARNING: ".$show['name']." datafeed not found or no valid XML format";
 }
