<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/go/AfflinksInclude.php";
use CodeLibrary\Php\Controllers\SiteInformationSystem\SiteInformationSystem;
header("X-Robots-Tag: noindex, nofollow");
// use the autoloader
require_once $_SERVER['DOCUMENT_ROOT'].'/CodeLibrary/Php/Setup/Loader.php';
if(isset($_GET['gameid'])){
    $gameId = $_GET['gameid'];
}
$games = new \CodeLibrary\Php\Controllers\GamesSystem\GamesSystem('CA');
$gameInfo = $games->getSingleGameInfo($gameId);

if($gameId >=1977 && $gameId <= 2063){
    $lobbyLinkPosition = strpos($gameInfo[0]['mobile_game_link'], '&lobby');
    $linkArray = str_split($gameInfo[0]['mobile_game_link'], $lobbyLinkPosition);
    $linkArray[0]=str_replace('https://','http://',$linkArray[0]);
    $encodedLink = urlencode(':/free');
    $finalMobileLink = $linkArray[0].'&lobby=https'.$encodedLink;
}else{
    $finalMobileLink = $gameInfo[0]['mobile_game_link'];
}


header("location: " . $finalMobileLink);
