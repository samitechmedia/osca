<?php
/**
 * version 2 geo targeting system implementation using the CodeLibrary
 *
 * @author John James
 * @copyright 2015 Legend Corp
 * @link http://www.legendcorp.com
 * @version 2.0.0.0
 */
require_once 'CodeLibrary/Php/Setup/Loader.php';

$geoSystem = new CodeLibrary\Php\Controllers\GeoSystem\GeoSystem();
$code = $geoSystem->getCountryInformation();
$state_code = $geoSystem->getStateInformation();
// set additional location variables that may be used in future
$cityInformation = $geoSystem->getCityInformation();
$continentInformation = $geoSystem->getContinentInformation();

if (!empty($code)) {
    define("COUNTRY_CODE", $code);
}

if(!empty($state_code)){
    define("STATE_CODE", $state_code);
} else {
    define("STATE_CODE", null);
}
