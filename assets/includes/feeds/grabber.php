<?PHP

function get_winners($number_of,$amount = false,$countries = false){
include("/usr/www/users/corg/resources/feeds/config.php");

//set some variables
if($countries && is_array($countries)){
$countries = join(',',$countries); 
}
	
//connect to the database
$db = new PDO("mysql:host=".$settings['db']['host'].";dbname=".$settings['db']['database'].";charset=UTF-8", $settings['db']['username'], $settings['db']['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

//test for some conditions and try the proper query
if(!$countries){
	try{
	 $query = $db->prepare("SELECT * FROM winner_casinos, winner_players WHERE winner_players.casino_id = winner_casinos.id ORDER BY rand() LIMIT 0,$number_of");
	 $query->execute();
	  }
	   catch(PDOException $e) { print_r($e); die("ERROR: A database error occured."); 
	  }
}
else{
	try{
	   $query = $db->prepare("SELECT * FROM winner_casinos, winner_players WHERE winner_players.casino_id = winner_casinos.id AND winner_players.player_country = '$countries' ORDER BY rand() LIMIT 0, $number_of");
	   $query->execute();
	
	  }
	   catch(PDOException $e) { print_r($e); die("ERROR: A database error occured.");
	  }
}




while($show = $query->fetch(PDO::FETCH_ASSOC))
 {
   if(strlen($show['game'])>30){
	  $game = substr($show['game'], 0, 25); 
	  $game.='...';
   }
   $returned_array[] = array('player_name' => $show['player_name'], 'won_amount' => $show['won_amount'], 'game' => $game);
 }
 return $returned_array;
}
