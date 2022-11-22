<?php
error_reporting(E_ALL);
ini_set('display_errors','1');

$xml_jackpot_url = 'http://www.smart-feeds.com/casinojackpot.xml?brand=1&cur=USD';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $xml_jackpot_url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml = curl_exec($ch);

//first check for general curl errors
if (!curl_errno($ch)) {
    //if no errors get the status info of the request
    $status = curl_getinfo($ch);
    //make sure response is 200
    if($status['http_code'] == '200') {
        //now make sure the xml is valid before attempting to process
        $isXmlValid = evaluateXml($xml);
        if ($isXmlValid) {
            $feed_jackpots = new SimpleXMLElement($xml);
            foreach ($feed_jackpots as $name) {

                $individualNames = explode(',', $name->attributes()->{'name'});

                $replacement_array = array(' ', ',', '.', '\'');
                $nospaces = str_replace($replacement_array, '', $individualNames[0]);
                $cleanedXmlName = strtolower($nospaces);
                $cleanedAmount = explode('.', $name->attributes()->{'amount'});

                $jackpotInsert[$cleanedXmlName]['name'] = $individualNames[0];
                $jackpotInsert[$cleanedXmlName]['jackpotCode'] = $cleanedXmlName;
                $jackpotInsert[$cleanedXmlName]['amount'] = str_replace('$', '', $cleanedAmount[0]);
                $jackpotInsert[$cleanedXmlName]['image'] = strtolower($cleanedXmlName);

            }
            echo '<p>888: success!</p>';
            curl_close($ch);
        } else {
            echo '<p>888 feed is not valid XML, bypassing feed.</p>';
        }
    } else {
        echo '<p>888 feed did not return a 200 HTTP response code, bypassing feed. </p>';
    }
} else {
    echo '<p>888 feed CURL error, bypassing feed. </p>';
}
