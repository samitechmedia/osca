<?php
$db_host = "localhost"; // MySQL database Host, usually 'localhost'
$db_user = "onlinesl_chris"; // MySQL username
$db_pass = "aKmaJCkaU6"; // MySQL password
$db_name = "onlinesl_games"; // MySQL database

try{
$dbc = new PDO('mysql:dbname='.$db_name.';host='.$db_host.'',''.$db_user.'',''.$db_pass.'');
}
catch(PDOException $e){
  echo '<p>There was a problem with your connection: '.$e->getMessage().'</p>';
}



?>
