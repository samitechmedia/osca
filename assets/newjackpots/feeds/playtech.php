<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
$xml_jackpot_url = 'http://tickers.playtech.com/jackpots/new_jackpotxml.php?info=1&casino=playtech&game=bls&amp;currency=usd';

$date = date("Y-m-d H:i:s");

$name_array = array('Gladiator Jackpot' =>'glrjj-1',
                    'Beach Life' =>'bl',
                    'Spamalot' =>'spmj-2',
					/*'Caribbean Poker' =>'car',*/
                    'Jackpot Darts' =>'drts4',
					'Magic Slots' =>'ms3',
                    'Everybody\'s Jackpot' =>'evjj-1',
					'Megaball' =>'bls',
                    'Cinerama' =>'cifr',
					'Marvel Super Power' =>'mrj-3',
                    'Marvel Jackpot Power' =>'mrj-1',
					'Wall Street Fever' =>'wsffr',
                    'Diamond Valley' =>'gs2',
					'10 line jacks' =>'jb10p',
                    'Dollar Ball' =>'ls',
					'Queen of the Pyramids' =>'qop2',
					'Chests of Plenty'=>'ashcpl-1',
					'Life of Brian'=>'ashlob-1',
					'The Winnings of Oz'=>'ashwnoz-1',
					'Who Wants To Be A Millionaire'=>'ashwwm-1',
					'Beach Life'=>'bl',
					'Caribbean Stud Poker'=>'car',
					'Sweet Party'=>'cnpr4',
					'Cat in Vegas'=>'ctivj-1',
					'Mega Ball'=>'drts1',
					'Esmerelda'=>'esm4',
					'Frankie Dettoris Magic Seven'=>'fdtjp-2',
					'Fei Cui Gong Zhu'=>'drgj-1',
					'Funky Fruits'=>'fnfrj4',
					'Jackpot Giant'=>'jpgt1-1',
					'Magic Slots'=>'ms3',
					'Blackjack Pro'=>'pbj',
					'Purple Hot'=>'phot4',
					'Pyramid of Ramesses'=>'pyrr10',
					'Streaks of Luck'=>'sol6',
					'Spiderman'=>'mrj-4',
					'Thai Temple'=>'tht11',
				);
				
$shared_code_images = array(
					'Blade'=>'blade',
					'Captain America'=>'captain-america',
					'Elektra'=>'electra',
					'Fantastic Four'=>'fantastic-4',
					'Ghost Rider'=>'ghost-rider',
					'Incredible Hulk'=>'incredible-hulk',
					'Iron Man 2'=>'iron-man-2',
					'Iron Man 3'=>'iron-man-3',
					'Marvel Roulette'=>'marvel-roulette',
					'Spiderman'=>'spiderman',
					'The Avengers'=>'the-avengers',
					'Thor'=>'thor',
					'Wolverine'=>'wolverine',
					'X-Men'=>'xmen',                       
					'Nian Nian You You'=>'nian',
					'Fei Cui Gong Zhu'=>'fei',
                   );



foreach ($name_array as $key => $feed) {
    $data = array('info' => '1',
        'casino' => 'playtech',
        'game' => $feed,
        'currency' => 'usd'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $xml_jackpot_url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $xml = curl_exec($ch);
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
                if (!empty($feed_jackpots)) {
                    foreach ($feed_jackpots as $name) {
                        $amount = $name->{'amount-list'}->amount;
                        $xmlName = $key;
                        $cleanedAmount = explode('.', $amount);
                        $jackpotInsert[$key]['name'] = $xmlName;
                        $jackpotInsert[$key]['jackpotCode'] = $feed;
                        $jackpotInsert[$key]['amount'] = $cleanedAmount[0];
                        $jackpotInsert[$key]['image'] = $feed;
                    }
                    curl_close($ch);
                    echo '<p>Playtech game '.$feed.' : success!</p>';
                }
            } else {
                echo '<p>Playtech XML for '.$feed.' is not valid, bypassing feed.';
            }
        } else {
            echo '<p>Playtech feed did not return a 200 HTTP response code, bypassing feed. </p>';
        }
    } else {
        echo '<p>Playtech feed CURL error, bypassing feed. </p>';
    }
}

