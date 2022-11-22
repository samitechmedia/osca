<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
$xml_jackpot_url = 'http://www.slotocash.im/extras/feeds/jackpot/xml/';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $xml_jackpot_url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml = curl_exec($ch);
curl_close($ch);

$feed_jackpots = new SimpleXMLElement($xml);
$date = date("Y-m-d H:i:s");

$name_array = array(
                    'i57' =>'Aztec Millions',
                    'i48' =>'Happy Golden Ox of Happiness',
                    'i50' =>'Jackpot Cleopatra\'s Gold',
                    'i52' =>'The Three Stooges',  
                    'i43' =>'Jackpot Piniatas',
                    'i65' =>'Shopping Spree II',
                    'i118' =>'Spirit of the Inca',
                    'i44' =>'Medal Tally',
                    'i54' =>'Year Of Fortune',
                    'i131' =>'Megasaur' 					
					);

foreach($feed_jackpots as $jackpot) {
	   $jackpotId = trim("{$jackpot->Id}");
	          if(isset($name_array[$jackpotId])){
       	  
              $replacement_array = array(' ',',','.','\'');

			  $cleanedAmount = explode('.',trim($jackpot->JackpotAmount));
			  $nospaces =  str_replace($replacement_array, '', $name_array[$jackpotId]);
			  $image = strtolower($nospaces);
	  
			 $jackpotInsert[$jackpotId]['name'] = $name_array[$jackpotId];
			 $jackpotInsert[$jackpotId]['jackpotCode'] = $jackpotId;
			 $jackpotInsert[$jackpotId]['amount'] = $cleanedAmount[0];
			 $jackpotInsert[$jackpotId]['image'] = $image;
			}

}


echo'<p><pre>'.print_r($jackpotInsert,true).'</pre></p>';

