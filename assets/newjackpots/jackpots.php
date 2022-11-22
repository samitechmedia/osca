<?php
error_reporting(E_ALL);
ini_set( 'display_errors','1'); 
require_once '../../CodeLibrary/Php/Setup/Loader.php';
$jackpotSystem = new CodeLibrary\Php\Controllers\JackpotSystem\JackpotSystem();

//@todo add this function to code library class in Q4 jackpot reorganization
function evaluateXml($xml) {
    libxml_use_internal_errors(TRUE);
    $evaluatedXml = @simplexml_load_string($xml);
    if ($evaluatedXml === FALSE) {
        $validityOfXml = false;
    } else {
        $validityOfXml = true;
    }
    return $validityOfXml;
}

//add rtg back into the array when the feed is fixed!!!
//@todo put feeds in a database with Q4 jackpot reorganization
$available_feeds = array(
    'microgaming',
    'playtech',
    'netent',
    'gamesys',
    /*'rtg',*/
    'party',
    '888',
    'novoline',
    'igt',
    'whitehatgaming'
);

$date = date("Y-m-d H:i:s");

foreach ($available_feeds as $jackpotfeed){
	include($_SERVER['DOCUMENT_ROOT'].'/assets/newjackpots/feeds/'.$jackpotfeed.'.php');
    switch($jackpotfeed){
		case 'microgaming':
		     $finalProvider ='1';
		    break;
		
		case 'netent':
		     $finalProvider ='2';
		    break;
		
		case 'playtech':
		     $finalProvider ='3';
		    break;
		
		case 'gamesys':
		     $finalProvider ='4';
		    break;

        case 'betsoft':
            $finalProvider ='5';
            break;

        case 'rtg':
            $finalProvider = '6';
            break;

        case 'party':
            $finalProvider ='7';
            break;

        case 'novoline':
            $finalProvider ='8';
            break;

        case '888':
            $finalProvider ='9';
            break;

		case 'igt':
			$finalProvider ='10';
			break;

		case 'whitehat':
			$finalProvider ='11';
			break;

		
		default:
		     $finalProvider ='0';
		break;
	}

    if(!empty($jackpotInsert)) {
        foreach($jackpotInsert as $key => $jackpot) {
            $jackpot['provider'] = $finalProvider;
            //$jackpotSystem->insertJackpots($jackpot);
            $jackpotSystem->updateJackpots($jackpot);
        }
	 }
     unset($jackpotInsert); 
}