<?PHP

// include config file
require_once("config.php");

// connect to database
$db = new PDO("mysql:host=".$settings['db']['host'].";dbname=".$settings['db']['database'], $settings['db']['username'], $settings['db']['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

// load all casino names
try{
 $query = $db->prepare("SELECT * FROM winner_casinos");
 $query->execute();
}catch(PDOException $e) { die("ERROR: A database error occured."); }
while($show = $query->fetch(PDO::FETCH_ASSOC))
 {
 $casinos[$show['id']] = array($show['feed_id'], $show['casino_name_feed']);
 }
 
// load all winners
try{
 $query = $db->prepare("SELECT * FROM winner_players");
 $query->execute();
}catch(PDOException $e) { die("ERROR: A database error occured."); }
while($show = $query->fetch(PDO::FETCH_ASSOC))
 {
 $winners[$show['id']] = array($show['feed_id'], $show['casino_id'], $show['player_name'], $show['player_country'], $show['won_currency'], $show['won_amount'], $show['game']);
 }

// function check if this is the first time the record is found
function lookup_winner($array)
 {
 global $winners;
 foreach($winners AS $w_id => $w_array)
  {
  if($w_array[0] == $array['feed_id'] AND $w_array[1] == $array['casino_id'] AND $w_array[2] == $array['player'] AND $w_array[3] == $array['country'] AND $w_array[4] == $array['currency'] AND $w_array[5] == $array['amount'] AND $w_array[6] == $array['game'])
   {
   $match = $w_id;
   }
  }
 if(!$match)
  {
  return false;
  }
 else
  {
  return true;
  }
 }

// look up casino function
function lookup_casino($feed_id, $casino_name)
 {
 global $casinos;
 foreach($casinos AS $c_id => $c_array)
  {
  if($c_array == array($feed_id, $casino_name))
   {
   $casino_id = $c_id;
   }
  }
 if(!$casino_id)
  {
  // new casino found, insert into DB
  global $db;
  try{
   $query3 = $db->prepare("INSERT INTO winner_casinos (id, feed_id, casino_name_feed, casino_name_custom, affiliate_url) VALUES ('', (:feed_id), (:casino_name), '', '')");
   $query3->bindParam(":feed_id", $feed_id);
   $query3->bindParam(":casino_name", $casino_name);
   $query3->execute();
  }catch(PDOException $e) { die("ERROR: A database error occured."); }  
  $casino_id = $db->lastInsertId();
	$casinos[$casino_id] = array($feed_id, $casino_name); 
  }
 return $casino_id;
 }
 
// remove old data
$deadline = date("U") - ($settings['db']['remove_wins_after_days']*24*60*60);
try{
 $query = $db->prepare("DELETE FROM winner_players WHERE won_date < (:deadline)");
 $query->bindParam(":deadline", $deadline);
 $query->execute();
}catch(PDOException $e) { die("ERROR: A database error occured."); } 

// load the feeds
try{
 $query = $db->prepare("SELECT * FROM winner_feeds");
 $query->execute();
}catch(PDOException $e) { die("ERROR: A database error occured."); }
while($show = $query->fetch(PDO::FETCH_ASSOC))
 {
 // check whether it's time to update!
 $now = date("U");
 if($show['last_update']+$show['frequency'] < $now)
  {
  $file = "feeds/".$show['import_script'];
  if(file_exists($file))
   {
   // include the script
   require_once($file);
   
   // register update in database
   try{
    $query2 = $db->prepare("UPDATE winner_feeds SET last_update = (:last_update) WHERE id = (:id)");
    $query2->bindParam(":last_update", $now);
    $query2->bindParam(":id", $show['id']);
    $query2->execute();
   }catch(PDOException $e) { die("ERROR: A database error occured."); }
   }
  else
   {
   die("ERROR: The inport script for ".$show['name']." can not be found.");
   }
  }
 }
 
