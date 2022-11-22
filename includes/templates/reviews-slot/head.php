<?php

$bc = $slotName;
$customATF = 'slot-review';

if (empty ($excludeArcadeSingleGame)) {
    $includeArcadeResourceHints = true;
}

$reviewDate = date('F Y', strtotime('last month'));

require_once $_SERVER['DOCUMENT_ROOT'] . '/CodeLibrary/Php/Setup/Loader.php';

$geoSystem = new \CodeLibrary\Php\Controllers\GeoSystem\GeoSystem();
$currentCountry = $geoSystem->getCountryInformation();

include $_SERVER['DOCUMENT_ROOT'] . '/includes/onca_header.php';

// Unity
$providerData = $unity->getTopPartnerSingleItemFromTopList();
$partnerInfo = $providerData['toplist']['partners'][1]['partner_information'];
