<?php
session_start();
//error_reporting(E_ALL);
//ini_set( 'display_errors','1'); 
//exit();
if(isset($_SERVER['HTTP_AUTHORIZE']) && isset($_SESSION['AUTHORIZE']) && $_SERVER['HTTP_AUTHORIZE'] == $_SESSION['AUTHORIZE'] ){
include($_SERVER['DOCUMENT_ROOT']."/assets/includes/games/config.php");
include($_SERVER['DOCUMENT_ROOT']."/dev/free_games/functions_update.php");

//$param_one = false;
//$param_two = false;

if(isset($_GET['type'])){
	$id = $_GET['type'];
	$results = url_return($id);
		  echo $results;
  }
  else{




//check for incoming get variables
if(isset($_GET['one'])&& $_GET['one']!= NULL){
	$type_one = $_GET['one'];	
}
if(isset($_GET['two']) && $_GET['two']!= NULL){
	$type_two = $_GET['two'];	
}
if(isset($_GET['three']) && $_GET['three']!= NULL){
	$param_three = $_GET['three'];	
}




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


//sort_games($limit,$type_one = false, $type_two = false)
$data = sort_games(30,$type_one, $type_two);
$row_count = mysqli_num_rows($data);

if($row_count > 0){
	$nmc = 0;
      while($row = mysqli_fetch_array($data)){
      	$id = $row["id"];
						if($row['type_id'] != '4'){
									if($nmc<15){
										  $new_marker = checkCreated($row['created']);
										  if($new_marker){
											  $nmc++;
										  }
									}
								}		  
				 /*
				 if($row['average'] == ''){
                       $row['average'] = '00';
				 }
                 else if($row['average'] %5 != 0){
                       $row['average'] = roundUp($row['average']);
				 }*/
				if(strlen($row['name'])>16){
					$name = substr($row['name'], 0, 16); 
					$name.='...';
                }
				else{
					$name = $row['name'];
				}
		  echo '<a href="#" id="'.$row['id'].'" class="image_box">
		   '.$new_marker.'
					 <img alt="'.$row['name'].'" src="/assets/games/uploads/'.$row['image_url'].'" class="img-normal" width="174px" height="130px">	
					 <span>'.$name.'</span> 
				<span class="freesGameRatingBox">
								<span class="freesGameRating">
								<span style="width: '.$row['average'].'%;"></span>
							</span>
						</span>
					</span>			   
				</a>';
		  
					
					$new_marker = false;
	            }

echo'
<div id="more_div'. $id .'" class="more_div"><a href="#"><div id="load_more_'. $id .'" class="more_tab">
<div class="more_button" id="'. $id .'" data-param1="'. $type_one .'" data-param2="'. $type_two .'">Load More Games</div></a></div>
</div>';
				
               }
			   else{
			       echo '<p style ="font-weight:strong; text-align:center;">Sorry no games for these choices, please try again!</p>';
			   }
             }
}
else{
	echo 'access denied!!';
}
?>



