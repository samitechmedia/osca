<?php
namespace feedClasses;

require_once 'BaseFeed.class.php';

use feedClasses\BaseFeed;

class WhiteHatGamingFeed extends BaseFeed {

    private $jackpotsToRecord = array(
        'The Pig Wizard',
        'Super Diamond Deluxe',
        'Win Star',
        'Genie Jackpots'
    );

    public function __construct()
    {
        //test
        $this->jsonJackpotUrl = "https://testfeeds-jackpots.s3.amazonaws.com/GBP.json";
        //prod
        //$this->jsonJackpotUrl = "https://jackpots.whitehatgaming.com/GBP.json";
    }

    public function encodeResults($results = null)
    {
        if (is_null($results)) {
            $results = $this->resultsJson;
        }
        $jackpotInsert = [];

        foreach ($results['jackpots'] as $jackpot) {
            if(in_array($jackpot['name'],$this->jackpotsToRecord)) {
                $roundedAmount = explode('.', $jackpot['value'])[0];
                $standardName = strtolower(str_replace($this->replacementArray, '', $jackpot['name']));

                $jackpotInsert[$standardName]['name'] = $jackpot['name'];
                $jackpotInsert[$standardName]['image'] = $standardName;
                $jackpotInsert[$standardName]['amount'] = $roundedAmount;
                $jackpotInsert[$standardName]['jackpotCode'] = $standardName;
            }
        }
       // echo '<p><pre>'.print_r($jackpotInsert,true).'</pre></p>';
        return $jackpotInsert;
    }
}
