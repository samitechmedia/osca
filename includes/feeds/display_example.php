<?PHP

// Example: showing 25 random winners

include("config.php");

$db = new PDO("mysql:host=".$settings['db']['host'].";dbname=".$settings['db']['database'], $settings['db']['username'], $settings['db']['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

try{
 $query = $db->prepare("SELECT * FROM winner_casinos, winner_players WHERE winner_players.casino_id = winner_casinos.id ORDER BY rand() LIMIT 0,25");
 $query->execute();
}catch(PDOException $e) { print_r($e); die("ERROR: A database error occured."); }
while($show = $query->fetch(PDO::FETCH_ASSOC))
 {
 // get the date
 $date = date("l F d, Y", $show['won_date']);
 
 //get the right casino name
 if($show['casino_name_custom'] == "")
  {
  $casino = $show['casino_name_feed'];
  }
 else
  {
  $casino = $show['casino_name_custom'];
  }
  
 // show currency nicer
 if(strtolower($show['won_currency']) == "usd")
  {
  $currency = "\$";
  }
 elseif(strtolower($show['won_currency']) == "eur")
  {
  $currency = "&euro;";
  }
 else
  {
  $currency = $show['won_currency'];
  }
  
 // add affiliate link if there is one set in the database
 if($show['affiliate_url'] !== "")
  {
  $casino = "<a href=\"".$show['affiliate_url']."\" title=\"Visit ".$casino."\" target=\"_blank\">".$casino."</a>";
  }
 
 echo "<p><i>".$show['player_name']."</i> from ".$show['player_country']." won <b>".$currency." ".round($show['won_amount'])."</b> on ".$date." at ".$casino.".</p>";
 }
