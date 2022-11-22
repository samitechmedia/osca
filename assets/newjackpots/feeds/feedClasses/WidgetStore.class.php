<?php
namespace feedClasses;

require_once 'BaseFeed.class.php';

use feedClasses\BaseFeed;

class WidgetStoreFeed extends BaseFeed {

    public function __construct()
    {
        $this->jsonJackpotUrl = "http://widgetstore.bosscasinos.com/data.aspx?aWQ9NjQ1&invoke=getData(%5B'en-US',180%5D)&extend=%7B%7D";
    }

    public function fetchResults($json = null, $decode = true, $decodeFlag = true)
    {
        return parent::fetchResults($this->getJsonData());
    }

    public function encodeResults($results = null)
    {
        if (is_null($results)) {
            $results = $this->resultsJson;
        }
        $jackpotInsert = [];

        foreach ($results['items'] as $jackpot) {

            $roundedAmount = str_replace(array('€', '$'), '', explode('.', $jackpot['value'])[0]);
            $standardName = strtolower(str_replace($this->replacementArray, '', $jackpot['name']));

            $jackpotInsert[$standardName]['name']   = $jackpot['name'];
            $jackpotInsert[$standardName]['image']  = $standardName;
            $jackpotInsert[$standardName]['amount'] = $roundedAmount;
            $jackpotInsert[$standardName]['jackpotCode'] = $standardName;
        }

        return $jackpotInsert;
    }

    private function getJsonData()
    {
        return shell_exec('python Feeds/WidgetStoreFetcher.py');
    }
}
