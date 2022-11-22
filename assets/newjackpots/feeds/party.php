<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
$jackpot_url = 'https://casino.partyaccount.com/jackpots.action?isEnableCurrency=true&lang=en_US&invokerProduct=CASINO&brand=PARTY%C2%A4cy=EUR&launchType=IL&lobbytype=instantCasino';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $jackpot_url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);

if (!curl_errno($ch)) {
    //if no errors get the status info of the request
    $status = curl_getinfo($ch);
    //make sure response is 200
    if ($status['http_code'] == '200') {
        //now make sure the xml is valid before attempting to process
        //@todo add in real json string detection in Q4 using json error detection
        if (!empty($json)) {
            $decodedInformation = json_decode($json, true);

            foreach ($decodedInformation as $jackpot) {
                $replacement_array = array(' ', ',', '.');
                $cleanedAmount = explode('.', $jackpot['value']);
                $nospaces = str_replace($replacement_array, '', $jackpot['jackpotGroupName']);

                $standardName = strtolower($nospaces);

                $jackpotInsert[$standardName]['name'] = $jackpot['jackpotGroupName'];
                $jackpotInsert[$standardName]['jackpotCode'] = $standardName;
                $jackpotInsert[$standardName]['amount'] = $cleanedAmount[0];
                $jackpotInsert[$standardName]['image'] = $standardName;

            }
            curl_close($ch);
            echo '<p>Party: success!</p>';
        } else {
            echo '<p>Party feed is not valid XML, bypassing feed.</p>';
        }
    } else {
        echo '<p>Party feed did not return a 200 HTTP response code, bypassing feed. </p>';
    }
} else {
    echo '<p>Party feed CURL error, bypassing feed. </p>';
}
die('party ending');

