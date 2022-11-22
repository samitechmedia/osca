<?php
include($_SERVER['DOCUMENT_ROOT']."/dev/free_games/config.php");
 $dbc = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if(isSet($_POST['getLastContentId']))
{
$getLastContentId=$_POST['getLastContentId'];
$type_one =$_POST['getParam1'];
$param_two =$_POST['getParam2'];
$param_three =$_POST['getParam3'];
$items =$_POST['numItems'];

if($type_one == '')
{
$type_one = '';
$order_clause = "order by id DESC LIMIT $items,11";
}

if(isset($_POST['getParam2']) && $_POST['getParam2']!= NULL){
	$type_two = $_POST['getParam2'];
}

//$order_clause = "&& g.id > $getLastContentId LIMIT 10";



switch($param_three){
	case 'pk':
	      $type_three = '1';
	break;
	case 'bj':
	      $type_three = '2';
	break;
	case 'ro':
		  $type_three = '3';
	break;
	case 'vp':
		  $type_three = '4';
	break;
	case 'all':
	      $type_three = 'all';
	break;
}

if($type_two =='all'){
		 //$where_clause = 'WHERE g.type_id = 1';
		 $where_clause = '';

	  }
	  else{
		 //$where_clause = 'WHERE g.provider_id = '.$type_two.' AND g.type_id = 1 ';
		 $where_clause = '&& provider_id = '.$type_two.'';
$order_clause = ' LIMIT '.$items.',11';
	  }

      switch($type_one){
		  case 'mp':
		  $order_clause = 'order by c.clicks DESC LIMIT '.$items.',11';
		  break;

		  case 'hr':
		  $order_clause = 'order by r.average DESC LIMIT '.$items.',11';
		  break;

		  case 'az':
		  $order_clause = 'order by name ASC LIMIT '.$items.',11';
          break;

		  case 'za':
		  $order_clause = 'order by name DESC LIMIT '.$items.',11';
		  break;

		  case 'nw':
		  $order_clause = 'order by id DESC LIMIT '.$items.',11';
		  break;
	   }

//$query = "SELECT * FROM games where type_id = 1 $order_clause";
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

if(count(mysqli_fetch_array($data)))
{

while($row = mysqli_fetch_array($data)){
$ratingquery = "SELECT average FROM ratings where id = $row[id]";
				$result = mysqli_query($dbc, $ratingquery);
				$rating = $result->fetch_assoc();
				$id = $row['id'];
				if(empty($rating["average"]))
				{
				$r = 0;
				}else{
				$r = $rating["average"];
				}

				if($r > 0 && $r <= 20)
				{
					$rat = "1";
				}elseif($r > 20 && $r <= 40)
				{
					$rat = "2";
				}elseif($r > 40 && $r <= 60)
				{
					$rat = "3";
				}elseif($r > 60 && $r <= 80)
				{
					$rat = "4";
				}elseif($r > 80 && $r <= 100)
				{
					$rat = "5";
				}else{
					$rat = "0";
				}

				if(strlen($row['name'])>16){
					  $name = substr($row['name'], 0, 16);
					  $name.='...';
				  }
				  else{
					  $name = $row['name'];
				  }



				echo '<a href="#" id="'.$row['id'].'" class="image_box">
               <img alt="'.$row['name'].'" src="/assets/games/uploads/'.$row['image_url'].'" class="lazyfree" width="174px" height="130px">	
			   <span>'.$name.'</span>
				<span class="freesGameRatingBox">
								<span class="freesGameRating">
								<span style="width: '.$row['average'].'%;"></span>
							</span>
						</span>
					</span>
          </a>';
           }
echo'
<div id="more_div'. $id .'" class="more_div"><a href="#"><div id="load_more_'. $id .'" class="more_tab">
<div class="more_button" id="'. $id .'" data-param1="'. $type_one .'" data-param2="'. $param_two .'">Load More Games</div></a></div>
</div>';

}else{
echo "<p class='no-m-games'>There are no more games to load.</p>";
}

}
