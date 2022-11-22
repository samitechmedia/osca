<?php

$email = '<p>There was an error with the jackpot_reader.php script. This takes the available jackpot xml and enters the info into our database. There has been a malfunction, please read the information provided below to help diagnose the problem:</p>
		
    <p>Mysql Error Message:'.$error_message.'</p>
	<p>Query: '.$query.'</p>';
		  
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $to = "chris@alegend.net";
	
	$msg.='<p style="font-family:Lao UI, Arial, Helvetica, sans-serif; font-size:14px;">There was an error with the Jackpot Reader</p>
	
	<p style="font-family:Lao UI, Arial, Helvetica, sans-serif; font-size:14px;">The details of the error are below:</p>
	
    <strong>Error: </strong>'.$error_message.'<br/>
    <strong>Query: </strong>'.$query.'<br/>

    </p>';
	
	
$sbj = "Jackpot Reader Error";
mail($to, $sbj, $msg, $headers);

?>
