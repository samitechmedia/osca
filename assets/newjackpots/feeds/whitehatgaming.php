<?php
namespace feedClasses;

error_reporting(E_ALL);
ini_set('display_errors','1');

require_once 'feedClasses/WhiteHatGaming.class.php';

$feed = new WhiteHatGamingFeed;

$feed->fetchResults();
$jackpotInsert = $feed->encodeResults();
echo 'whitehat complete';