<?php
use CodeLibrary\ThirdParty\Php\UserAgentDetection\MobileDetect;
use CodeLibrary\Php\Controllers\GeoSystem\GeoSystem;

$mobileDetection = new MobileDetect();
$geoSystem = new GeoSystem();

//Geosystem and mobileDetection are instantiated in onca_header.php
$userInfo = [
    "user_mobile" => $mobileDetection->isMobile(),
    "user_tablet" => $mobileDetection->isTablet(),
    "user_continent" => $geoSystem->getContinentInformation(),
    "user_country" => $geoSystem->getCountryInformation(),
    "user_state" => $geoSystem->getStateInformation(),
    "user_city" => $geoSystem->getCityInformation(),
];

?>

<script>
    window.oncaAA = window.oncaAA || {};
    window.oncaAA = <?php echo json_encode($userInfo); ?>
</script>

<script src="/dist/js/adobe.min.js" defer></script>
    