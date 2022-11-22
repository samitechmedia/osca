<?php
//$dbc is the database connection and is included in the config.php file which is required for this functions.php file to work

function url_return($dbc,$id){
	
//building a query
$query = "SELECT gamelink FROM games WHERE id = $id";
$results = $dbc->query($query);

	if($results === false){
		//BELOW IS HOW TO FIND OUT YOUR QUERY ERROR WITH PDO!!!!
			echo 'sorry not working and here is why:';
			echo '<p><pre>'.print_r($dbc->errorInfo(),true).'</pre></p>';
		}
		else{
		
		   $row = $results->rowCount();
			if($row != '0'){
			    //while($row = $results->fetch()){
				return $results;
				}
				else{
			    return 'There was a problem, please contact an administrator';
			    }

      }
	
	
}







function get_games($dbc){
	
//building a query
$query = "SELECT id,provider_id,name,gamelink,type_id,image_url FROM games WHERE type_id ='1' ORDER BY name ASC";
$results = $dbc->query($query);

	if($results === false){
		//BELOW IS HOW TO FIND OUT YOUR QUERY ERROR WITH PDO!!!!
			echo 'sorry not working and here is why:';
			echo '<p><pre>'.print_r($dbc->errorInfo(),true).'</pre></p>';
		}
		else{
		
		   $row = $results->rowCount();
			if($row != '0'){
			    //while($row = $results->fetch()){
				return $results;
				}
				else{
			    return 'There was a problem, please contact an administrator';
			    }

      }
	
	
}

function sort_games($limit,$dbc,$type_one = false, $type_two = false){
	
  
  if($limit == 'all'){
	  $limit_query = '';	  
  }
  else{
	  $limit_query = 'LIMIT 0,'.$limit.'';	  
  }
 
 if(!$type_one && !$type_two){ 
            $query = "SELECT id,provider_id,name,gamelink,type_id,image_url FROM games WHERE type_id ='1' ORDER BY name ASC";
  }
  
 else if($type_one && !$type_two){
 			$query = "SELECT id,provider_id,name,gamelink,type_id,image_url FROM games WHERE type_id ='1' AND provider_id ='$type_one' ORDER BY name ASC";
	}
 else if(!$type_one && $type_two){
            $query = "SELECT id,provider_id,name,gamelink,type_id,image_url FROM games WHERE type_id ='1' ORDER BY $type_two";
 }
 else if($type_one && $type_two){
            $query = "SELECT id,provider_id,name,gamelink,type_id,image_url FROM games WHERE type_id ='1' AND provider_id ='$type_one' ORDER BY $type_two";
 }
 
$results = $dbc->query($query);

	if($results === false){
		//BELOW IS HOW TO FIND OUT YOUR QUERY ERROR WITH PDO!!!!
			echo 'sorry not working and here is why:';
			echo '<p><pre>'.print_r($dbc->errorInfo(),true).'</pre></p>';
		}
		else{
		
		   $row = $results->rowCount();
			if($row != '0'){
			    //while($row = $results->fetch()){
				return $results;
				}
				else{
			    return 'There was a problem, please contact an administrator';
			    }

      }
 
 

return $results;
	
}






/*function rewrite_images($dbc){
	
//building a query
$query = "SELECT id,image_url FROM games";
$results = $dbc->query($query);

	if($results === false){
		//BELOW IS HOW TO FIND OUT YOUR QUERY ERROR WITH PDO!!!!
			echo 'sorry not working and here is why:';
			echo '<p><pre>'.print_r($dbc->errorInfo(),true).'</pre></p>';
		}
		else{
		
		   $row = $results->rowCount();
			if($row != '0'){
			    while($row = $results->fetch()){
				  $find ='http://www.onlinecasino.de/assets/free_games/';
				  $row_id = $row['id'];
				$pieces = explode('/uploads/',$row['image_url']);
				$new_url = '/assets/games/uploads/'.$pieces[1];
				echo'<p>'.$new_url.'</p>';
				$query2 = "UPDATE games SET image_url='$new_url' WHERE id ='$row_id'";
                $results2 = $dbc->query($query2);
				
					if($results2 === false){
		                //BELOW IS HOW TO FIND OUT YOUR QUERY ERROR WITH PDO!!!!
			          echo 'sorry not working and here is why:';
			          echo '<p><pre>'.print_r($dbc->errorInfo(),true).'</pre></p>';
		           }

				}
			}
      }
	
	
}*/


?>
