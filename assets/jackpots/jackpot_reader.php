<?php
include($_SERVER['DOCUMENT_ROOT'].'/assets/jackpots/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/assets/jackpots/db_conn.php');



$xml_jackpot_url = 'https://www.buffalopartners.com/xml/jackpots.aspx';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $xml_jackpot_url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml = curl_exec($ch);
curl_close($ch);


$feed_jackpots = new SimpleXMLElement($xml);
$date = date('j/n/Y');


foreach($feed_jackpots as $name) {
	if($name->name == "Bingo Totals"){
		break;
	}

	if ($name->name =='Mega Moolah Mega'){
		$name->name = 'MegaMoolahMega';
	}
$no_commas = str_replace(',','',$name->sum);
$no_decimal = explode('.',$no_commas);

$jackpot_names.= $name->name.',';
$jackpot_amounts.= '\''.$no_decimal[0].'\',';

$jackpot_names_final = trim($jackpot_names, ","); 
$jackpot_amounts_final = trim($jackpot_amounts, ","); 		
		
}


$query =  "INSERT INTO jackpots(date,$jackpot_names_final) VALUES (CURDATE(),$jackpot_amounts_final)";
try {
    $dbc->beginTransaction();
    $dbc->exec($query);
    $dbc->commit();
}catch (Exception $e){
    $dbc->rollback();
    $error_message = $dbc->error;
    include($_SERVER['DOCUMENT_ROOT'].'/assets/jackpots/jackpot_errors.php');
    exit();
}




      
  

 

















?>
