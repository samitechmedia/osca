<?php
namespace feedClasses;

error_reporting(E_ALL);
ini_set('display_errors','1');

/*
require_once 'feedClasses/WidgetStore.class.php';

$feed = new WidgetStoreFeed;

$feed->fetchResults();
$jackpotInsert = $feed->encodeResults();
echo 'igt complete';
*/
use \CodeLibrary\Php\Classes\ServerConnection\Curler;

//require_once './CodeLibrary/Php/Setup/Loader.php';

$url = "http://widgetstore.bosscasinos.com/data.aspx?aWQ9NjQ1&invoke=getData(%5B%27en-US%27,180%5D)";

$userAgent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36';

$arrayOfHttpHeaders = array(
    'User-Agent: '.$userAgent,
    'Accept-Language: en-GB,en-US;q=0.8,en;q=0.6',
);



$curler = new Curler($url);
$curler->doNotVerifySsl();
$curler->setCurlOptions(CURLOPT_FOLLOWLOCATION, true);
$curler->setCurlOptions(CURLOPT_HTTPHEADER, $arrayOfHttpHeaders);
$curler->setCurlOptions(CURLOPT_HTTPHEADER, $arrayOfHttpHeaders);
$curler->setCurlOptions(CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookieJar.txt');
$curler->setCurlOptions(CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookieJar.txt');


$result = $curler->executeCurl();

$feedObject = json_decode($result['body'],true);

if(!empty($feedObject)) {


foreach ($feedObject['items'] as $key => $jackpot) {

    $replacement_array = array(' ', ',', '.', '\'');
    $roundedAmount = str_replace(array('€', '$'), '', explode('.', $jackpot['value'])[0]);
    $no_commas = str_replace(',', '', $roundedAmount);
    $standardName = strtolower(str_replace($replacement_array, '', $jackpot['name']));
    $splitName = explode('$',$standardName);


    $jackpotInsert[$standardName]['name']   = $splitName[0];
    $jackpotInsert[$standardName]['image']  = $splitName[0];
    $jackpotInsert[$standardName]['amount'] = $no_commas;
    $jackpotInsert[$standardName]['jackpotCode'] = $splitName[0];

}
echo '<p>IGT: success</p>';
}else{
    //@todo add in verbose and robust error reporting with jackpot system upgrade
    echo '<p>IGT: failure</p>';
}