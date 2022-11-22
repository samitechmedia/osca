<?php
error_reporting(E_ALL);
ini_set('display_errors','1');


$jackpot_url = 'https://frontapi.cherrytech.com/jackpots?CherryTech-Brand=eurolotto.desktop&Accept-Language=en';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $jackpot_url);
//curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch,CURLOPT_HTTPHEADER,array('CherryTech-Brand: sveacasino.desktop','Accept-Language: en'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
curl_close($ch);


$decodedInformation = json_decode($json,true);
echo'<p><pre>'.print_r($decodedInformation,true).'</pre></p>';

/*
foreach($decodedInformation as $jackpot) {

    echo'<p><pre>'.print_r($jackpot,true).'</pre></p>';
    echo '<p>==================================================</p>';

    $replacement_array = array(' ',',','.');
    $cleanedAmount = explode('.',$jackpot['value']);
    $nospaces =  str_replace($replacement_array, '', $jackpot['jackpotGroupName']);

    $standardName = strtolower($nospaces);

    $jackpotInsert[$standardName]['name'] = $jackpot['jackpotGroupName'];
    $jackpotInsert[$standardName]['jackpotCode'] = $standardName;
    $jackpotInsert[$standardName]['amount'] = $cleanedAmount[0];
    $jackpotInsert[$standardName]['image'] = $standardName;


}
*/

