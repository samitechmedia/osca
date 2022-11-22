<?php

error_reporting(E_ALL);
ini_set('display_errors','1');
$jackpot_url = 'https://www.quasargaming.com/best-casino-jackpots?type=json';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $jackpot_url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);

//first check for general curl errors
if (!curl_errno($ch)) {
    //if no errors get the status info of the request
    $status = curl_getinfo($ch);
    //make sure response is 200
    if ($status['http_code'] == '200') {
        if (!empty($json)) {
            $decodedInformation = json_decode($json, true);

            foreach ($decodedInformation as $jackpot) {

                $replacement_array = array(' ', ',', '.');
                $cleanedAmount = explode('.', $jackpot['jackpotAmountEUR']);
                $nospaces = str_replace($replacement_array, '', $jackpot['gameName']);

                $standardName = strtolower($nospaces);

                $jackpotInsert[$standardName]['name'] = $jackpot['gameName'];
                $jackpotInsert[$standardName]['jackpotCode'] = $standardName;
                $jackpotInsert[$standardName]['amount'] = $cleanedAmount[0];
                $jackpotInsert[$standardName]['image'] = $standardName;
            }
            echo '<p>Novoline: success!</p>';
            curl_close($ch);
        } else {
            echo '<p>Novoline feed did not return any json, bypassing feed.</p>';
        }
    } else{
        echo '<p>Novoline feed did not return a 200 HTTP response code, bypassing feed. </p>';
    }
} else {
    echo '<p>Novoline feed CURL error, bypassing feed. </p>';
}




