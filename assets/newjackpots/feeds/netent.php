<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
$xml_jackpot_url = 'http://www.casinoroom.com/api/jackpot/?currency=USD&format=xml&lang=en';



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
            $date = date("Y-m-d H:i:s");
            //games below are already included on the microgaming feed and are not needed'
            $jackpotsToAvoid = array(
                'Mega Moolah',
                'King Cashalot',
                'Treasure Nile',
                'Major Millions',
                'LotsALoot'
            );
            foreach ($feed_jackpots as $jackpot) {
                if (!in_array($jackpot->game_name, $jackpotsToAvoid)) {
                    $replacement_array = array(' ', ',', '.');

                    $cleanedAmount = explode('.', $jackpot->amount);
                    $nospaces = str_replace($replacement_array, '', $jackpot->game_name);
                    $xmlName = strtolower($nospaces);

                    $jackpotInsert["{$jackpot->game_name}"]['name'] = $jackpot->game_name;
                    $jackpotInsert["{$jackpot->game_name}"]['jackpotCode'] = $xmlName;
                    $jackpotInsert["{$jackpot->game_name}"]['amount'] = $cleanedAmount[0];
                    $jackpotInsert["{$jackpot->game_name}"]['image'] = $xmlName;
                }
            }
            curl_close($ch);
            echo '<p>Netent: success!</p>';
        } else {
            echo '<p>Netent feed is not valid XML, bypassing feed.</p>';
        }
    } else {
        echo '<p>Netent feed did not return a 200 HTTP response code, bypassing feed. </p>';
    }
} else {
    echo '<p>Netent feed CURL error, bypassing feed. </p>';
}





