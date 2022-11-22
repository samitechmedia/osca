<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
$json_jackpot_url = 'https://api.paddypower.com/content/1.1/webservices/jackpots/1.0/jackpot';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $json_jackpot_url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
curl_close($ch);

$date = date("Y-m-d H:i:s");
$feed_jackpots = json_decode($json, true);

echo'<p><pre>'.print_r($feed_jackpots,true).'</pre></p>';

/*
foreach($feed_jackpots as $jackpot) {
	
	  
              $replacement_array = array(' ',',','.');

			  $cleanedAmount = explode('.',$jackpot->attributes()->{'jackpot'});
			  $nospaces =  str_replace($replacement_array, '', $jackpot->attributes()->{'name'});
			  $xmlName = strtolower($nospaces);
	  
			 $jackpotInsert[$xmlName]['name'] = $xmlName;
			 $jackpotInsert[$xmlName]['jackpotCode'] = $xmlName;
			 $jackpotInsert[$xmlName]['amount'] = $cleanedAmount[0];
			 $jackpotInsert[$xmlName]['image'] = $xmlName;

}
*/



