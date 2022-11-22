<?php
function url_return($id){
	
//building a query
include($_SERVER['DOCUMENT_ROOT']."/assets/includes/games/config.php");
 $dbc = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

$query = "SELECT gamelink FROM games WHERE id = $id";
$data = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($data);	

	/*if  (mysqli_error($dbc)){
		$error_message = mysqli_error($dbc);
		echo '<p>'.$error_message.'</p>';
		exit();
	}*/
   mysqli_close($dbc);
   return $row['gamelink'];

	
	
}

function return_games($limit,$type = false) {
	
  
	  if($limit == 'all'){
	  $limit_query = '';	  
  }
    else{
	  $limit_query = 'LIMIT '.$limit.'';	  
  }

include($_SERVER['DOCUMENT_ROOT']."/assets/includes/games/config.php");
  $dbc = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
  
  
if(!$type){
		   		$query = "SELECT g.id AS id, 
					 r.id AS r_id, 
					 g.provider_id AS provider_id,
					 g.name AS name, 
					 g.gamelink AS gamelink, 
					 g.type_id AS type_id, 
					 g.image_url AS image_url, 
					 g.created AS created,
					 r.average AS average 
				  FROM games g
				  LEFT JOIN ratings r ON g.id=r.id
				  ORDER BY id DESC
				  $limit_query";
				  
}
else{
		   		$query = "SELECT g.id AS id, 
					 r.id AS r_id, 
					 g.provider_id AS provider_id,
					 g.name AS name, 
					 g.gamelink AS gamelink, 
					 g.type_id AS type_id, 
					 g.image_url AS image_url, 
					 g.created AS created,
					 r.average AS average 
				  FROM games g
				  LEFT JOIN ratings r ON g.id=r.id
				  WHERE g.type_id = 1  
				  ORDER BY id DESC
				  $limit_query";
}
  $data = mysqli_query($dbc, $query);	
	
	if  (mysqli_error($dbc)){
		$error_message = mysqli_error($dbc);
		echo '<p>'.$error_message.'</p>';
		exit();
	}
   mysqli_close($dbc);
   return $data;
}

function sort_games($limit,$type_one = false, $type_two = false, $type_three = false){
	
include($_SERVER['DOCUMENT_ROOT']."/assets/includes/games/config.php");
  $dbc = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
  /*echo '<p>1'.$type_one.'</p>';
  echo '<p>2'.$type_two.'</p>';
  echo '<p>3'.$type_three.'</p>';
  exit();*/
  
  
  if($limit == 'all'){
	  $limit_query = '';	  
  }
  else{
	  $limit_query = 'LIMIT 0,'.$limit.'';	  
  }
	  if($type_two =='all'){
		 //$where_clause = 'WHERE g.type_id = 1'; 
		 $where_clause = ''; 

	  }
	  else{
		 //$where_clause = 'WHERE g.provider_id = '.$type_two.' AND g.type_id = 1 '; 
		 $where_clause = 'WHERE g.provider_id = '.$type_two.''; 
	  }
	  

	$gametype_clause = 'g.type_id = 1';

      switch($type_one){
		  case 'mp':
		  $order_clause = 'c.clicks DESC';
		  break;
			
		  case 'hr':
		  $order_clause = 'r.average DESC';
		  break;
			
		  case 'az':
		  $order_clause = 'name ASC';
          break;
		  
		  case 'za':
		  $order_clause = 'name DESC';
		  break;
		  
		  case 'nw':
		  $order_clause = 'id DESC';
		  break;		   
	   }
       if($type_two == 'all' && $type_three =='all'){
		   $connector = '';
	    //we have no filter on the provider or type, so no connector is needed
	   }
	   else if($type_two == 'all' && $type_three != 'all'){
		   $connector = 'WHERE';
		//we have a filter on the type, so we need a where clause because no provider clause was first
	   }
	   else if($type_two != 'all' && $type_three != 'all'){
		   $connector = 'AND';
		//we have a filter on the provider and the type, since the provider comes first with a where clause, we add in the AND clause for the type
	   }
	   	else if($type_two != 'all' && $type_three == 'all'){
		   $connector = '';
		//we have a filter on the provider but no filter on the type
	   }
	   
	   			$query = "SELECT g.id AS id, 
						 c.id AS c_id, 
						 g.provider_id AS provider_id,
						 g.name AS name, 
						 g.gamelink AS gamelink, 
						 g.type_id AS type_id, 
						 g.image_url AS image_url, 
						 g.created AS created,
						 c.clicks AS c_clicks, 
						 r.average AS average
					  FROM games g
					  LEFT JOIN clicks c ON g.id=c.id
					  LEFT JOIN ratings r ON g.id=r.id
					  $where_clause
					  $connector
					  $gametype_clause
					  ORDER BY $order_clause";


  $data = mysqli_query($dbc, $query);	
	
	if  (mysqli_error($dbc)){
		$error_message = mysqli_error($dbc);
		echo '<p>type one: '.$type_one.'</p>';
		echo '<p>type two: '.$type_two.'</p>';
		echo '<p>type three: '.$type_three.'</p>';
		echo '<p>'.$error_message.'</p>';
		echo '<p>'.$query.'</p>';
		exit();
	}

mysqli_close($dbc);
return $data;
	
}

//============================================================================================

function index_games(){
include($_SERVER['DOCUMENT_ROOT']."/assets/includes/games/config.php");
  $dbc = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
  $query = "SELECT id,provider_id,name,gamelink,type_id,image_url FROM games WHERE id IN (25,23,20,32,34,33,18,66,67) ";	 	  
  $data = mysqli_query($dbc, $query);	
	
	if  (mysqli_error($dbc)){
		$error_message = mysqli_error($dbc);
		echo '<p>'.$error_message.'</p>';
		exit();
	}
     mysqli_close($dbc);
     return $data;
}
//==============================================================================================

function click_track($input){
	
include($_SERVER['DOCUMENT_ROOT']."/assets/includes/games/config.php");
 $dbc = mysqli_connect($db_host,$db_user,$db_pass,$db_name);


	$id = mysqli_real_escape_string($dbc, trim($input));
	
	$query = "SELECT id FROM clicks WHERE id = '$id'";
	$data = mysqli_query($dbc, $query);	

	if(mysqli_num_rows($data)>0){
		$query =  "UPDATE `clicks` SET `clicks` = `clicks` + 1 WHERE id = '$id'";
	}
	else{
		$query =  "INSERT INTO clicks(id, clicks) VALUES ('$id','1')";
	}
	$data = mysqli_query($dbc, $query);
		
	if  (mysqli_error($dbc)){
		$error_message = mysqli_error($dbc);
		echo '<p>'.$error_message.'</p>';
		exit();
	 }
	
	
}
	
//==============================================================================================
 function roundUp($n,$x=5) {
	return round(($n+$x/2)/$x)*$x;
}

function getNewMarker(){

	  $new_rand = mt_rand(0,100);
	  if($new_rand <= 20){
		  $new_marker = '<span class="new-red"></span>';
	  }
	  else if($new_rand >=21 && $new_rand <=40){
		  $new_marker = '<span class="new-blue"></span>';
	  }
	  else if($new_rand >=41 && $new_rand <=60){
		  $new_marker = '<span class="new-orange"></span>';
	  }
	  else if($new_rand >=61 && $new_rand <=80){
		  $new_marker = '<span class="new-green"></span>';
	  }	
	  else{
		  $new_marker = '<span class="new-purple"></span>';
	  }									

	return $new_marker;
}

function checkCreated($date){
	
	$created_date = strtotime($date);
	$one_year_ago = strtotime('-3 months');
	
	//echo '<p>cd: '.$created_date.'</p>';
	//echo '<p>oya: '.$one_year_ago.'</p>';
				 
	if($created_date > $one_year_ago){
		$new_marker = getNewMarker();
		return $new_marker;		 
	}
	else{
		return false;
	}
	
}


?>
