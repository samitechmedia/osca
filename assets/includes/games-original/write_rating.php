<?php
session_start();
if(isset($_SERVER['HTTP_AUTHORIZE']) && isset($_SESSION['AUTHORIZE']) && $_SERVER['HTTP_AUTHORIZE'] == $_SESSION['AUTHORIZE'] ){
include($_SERVER['DOCUMENT_ROOT']."/assets/includes/games/config.php");
 $dbc = mysqli_connect($db_host,$db_user,$db_pass,$db_name);



if(isset($_GET['game'])){
	$dirty_id = $_GET['game'];
}
if(isset($_GET['rating'])){
	$dirty_rating = $_GET['rating'];
}

$id = mysqli_real_escape_string($dbc, trim($dirty_id));
$rating = mysqli_real_escape_string($dbc, trim($dirty_rating));

$query = "SELECT id,num_count,average FROM ratings WHERE id = '$id'";
$data = mysqli_query($dbc, $query);	

if(mysqli_num_rows($data)>0){
	$query =  "	UPDATE ratings
                SET average = '$rating'/(num_count+1) + average*(num_count/(num_count+1)),
                num_count = num_count + 1
                WHERE id = '$id'";
	
	
	
}
else{
	$query =  "INSERT INTO ratings(id,num_count,average) VALUES ('$id','1','$rating')";
	}
	$data = mysqli_query($dbc, $query);	
	if  (mysqli_error($dbc)){
		$error_message = mysqli_error($dbc);
		echo '<p>'.$error_message.'</p>';
		exit();
	}
}
else{
	echo 'access denied!!';
}












?>
