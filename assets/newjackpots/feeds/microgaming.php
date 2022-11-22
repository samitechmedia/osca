<?php
error_reporting(E_ALL);
ini_set('display_errors','1');

$xml_jackpot_url = 'https://www.buffalopartners.com/xml/jackpots.aspx';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $xml_jackpot_url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml = curl_exec($ch);

$date = date("Y-m-d H:i:s");

//@todo - Buffalo partners really whacked out this feed late 2018 make sure to re evaluate during Q4 jackpot refactor!!

//first check for general curl errors
if (!curl_errno($ch)) {
    //if no errors get the status info of the request
    $status = curl_getinfo($ch);
    //make sure response is 200
    if ($status['http_code'] == '200') {
        //now make sure the xml is valid before attempting to process
        $isXmlValid = evaluateXml($xml);
        if ($isXmlValid) {
            $feed_jackpots = new SimpleXMLElement($xml);
            $name_array = array('CashSplash' => 'Cash Splash',
                'LotsaLoot' => 'Lotsa Loot',
                'WowPot' => 'Wow Pot',
                'SuperJax' => 'SupaJax',
                'FruitFiesta' => 'Fruit Fiesta',
                'TreasureNile' => 'Treasure Nile',
                'CyberStud' => 'Cyber Stud',
                'JackpotDeuces' => 'Jackpot Deuces',
                'TripleSevens' => 'Triple Sevens',
                'MajorMillions' => 'Major Millions',
                'RouletteRoyale' => 'Roulette Royale',
                'KingCashalot' => 'King Cashalot',
                'Tunzamunni' => 'Tunzamunni',
                'PokerRide' => 'Poker Ride',
                'Mega Moolah Mega' => 'Mega Moolah Mega',
                'Totals' => 'Totals'
            );

            foreach ($feed_jackpots as $name) {
                $xmlName = "{$name->name}";
                if (isset($name_array[$xmlName])) {

                    $replacement_array = array(' ', ',', '.');
                    $nospaces = str_replace($replacement_array, '', $xmlName);
                    $cleanedXmlName = strtolower($nospaces);

                    $no_commas = str_replace(',', '', $name->sum);
                    $amountWithoutDecimals = explode('.', $no_commas);
                    $cleanedAmount = (int)trim(preg_replace("/\xc2\xa0/", '', $amountWithoutDecimals[0]));

                    $jackpotInsert["{$name->name}"]['name'] = $name_array[$xmlName];
                    $jackpotInsert["{$name->name}"]['jackpotCode'] = $cleanedXmlName;
                    $jackpotInsert["{$name->name}"]['amount'] = $cleanedAmount;
                    $jackpotInsert["{$name->name}"]['image'] = strtolower($xmlName);

                    // $jackpotSystem->insertJackpots($jackpotInsert);
                }
            }
            curl_close($ch);
            echo '<p>Microgaming: success!</p>';
        } else {
            echo '<p>Microgaming feed is not valid XML, bypassing feed.</p>';
        }
    } else {
        echo '<p>Microgaming feed did not return a 200 HTTP response code, bypassing feed. </p>';
    }
} else {
    echo '<p>Microgaming feed CURL error, bypassing feed. </p>';
}





