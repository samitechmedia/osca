<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
$xml_jackpot_url = 'https://www.jackpotjoy.com/progressives/';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $xml_jackpot_url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml = curl_exec($ch);

$date = date("Y-m-d H:i:s");

//first check for general curl errors
if (!curl_errno($ch)) {
    //if no errors get the status info of the request
    $status = curl_getinfo($ch);
    //make sure response is 200
    if ($status['http_code'] == '200') {
        //now make sure the xml is valid before attempting to process
        $isXmlValid = evaluateXml($xml);
        $feed_jackpots = new SimpleXMLElement($xml);
        if ($isXmlValid) {
            foreach ($feed_jackpots as $jackpot) {

                $replacement_array = array(' ', ',', '.');

                $cleanedAmount = explode('.', $jackpot->attributes()->{'jackpot'});
                $nospaces = str_replace($replacement_array, '', $jackpot->attributes()->{'name'});
                $xmlName = strtolower($nospaces);

                $jackpotInsert[$xmlName]['name'] = $xmlName;
                $jackpotInsert[$xmlName]['jackpotCode'] = $xmlName;
                $jackpotInsert[$xmlName]['amount'] = $cleanedAmount[0];
                $jackpotInsert[$xmlName]['image'] = $xmlName;
            }
            curl_close($ch);
            echo '<p>Gamesys: success!</p>';
        } else {
            echo '<p>Gamesys feed is not valid XML, bypassing feed.</p>';
        }
    } else {
        echo '<p>Gamesys feed did not return a 200 HTTP response code, bypassing feed. </p>';
    }
} else {
    echo '<p>Gamesys feed CURL error, bypassing feed. </p>';
}




