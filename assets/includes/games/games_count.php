<?php
include($_SERVER['DOCUMENT_ROOT']."/dev/free_games/config.php"); 
 $dbc = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

$getLastContentId=$_POST['getLastContentId'];
$type_one =$_POST['getParam1'];
$param_two =$_REQUEST['getParam2'];
$items =$_POST['numItems'];

if($type_one == '')
{
$type_one = '';
}

if(isset($_REQUEST['getParam2']) && $_REQUEST['getParam2']!= NULL){
	$type_two = $_REQUEST['getParam2'];	
}

$order_clause = "";


if($type_two =='all'){
		 //$where_clause = 'WHERE g.type_id = 1'; 
		 $where_clause = ''; 

	  }
	  else{
		 //$where_clause = 'WHERE g.provider_id = '.$type_two.' AND g.type_id = 1 '; 
		 $where_clause = '&& provider_id = '.$type_two.''; 
$order_clause = '';
	  }

      switch($type_one){
		  case 'mp':
		  $order_clause = 'order by c.clicks DESC';
		  break;
			
		  case 'hr':
		  $order_clause = 'order by r.average DESC';
		  break;
			
		  case 'az':
		  $order_clause = 'order by name ASC';
          break;
		  
		  case 'za':
		  $order_clause = 'order by name DESC';
		  break;
		  
		  case 'nw':
		  $order_clause = 'order by id DESC';
		  break;		   
	   }

//$query = "SELECT count(*) FROM games where type_id = 1 $order_clause";
//$query = "SELECT * FROM games where type_id = 1 $where_clause $order_clause";

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
where type_id = 1
					  $where_clause
					  $order_clause";

//echo $query;
				$data = mysqli_query($dbc, $query);
$count = mysqli_num_rows($data);
echo $count;
