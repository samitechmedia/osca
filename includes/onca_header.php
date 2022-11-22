<?php
//    session_start();
    $_SESSION['AUTHORIZE'] = md5(microtime() . rand());

use CodeLibrary\Php\Controllers\GeoSystem\GeoSystem;
use CodeLibrary\Php\Controllers\SiteInformationSystem\SiteInformationSystem;
use CodeLibrary\Php\Controllers\SiteProtectionSystem\SiteProtectionSystem;
use CodeLibrary\Php\Classes\HtmlAdditions\CanonicalTag;
use CodeLibrary\Php\Controllers\UnitySystem\UnitySystem;
use CodeLibrary\ThirdParty\Php\UserAgentDetection\MobileDetect;
use function Composer\Autoload\includeFile;

require_once $_SERVER['DOCUMENT_ROOT'] . '/CodeLibrary/Php/Setup/Loader.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/faqbuilder/faqbuilder.php';

    $mobileDetection = new MobileDetect();
    $geoSystem = new GeoSystem();
    $siteProtectionSystem = new SiteProtectionSystem($geoSystem->getIpAddressToUse(), $geoSystem->getCountryInformation());
    $siteProtectionSystem->checkForRestrictions();
    $sis = new SiteInformationSystem();

    // Get URI for current page
    $pagePath = $_SERVER['REQUEST_URI'];
    // Set string to target French section
    $pagePathFr = '/fr/';
    // Check the start of the string for target
    if (strpos($pagePath, $pagePathFr) === 0) {
        $pageLanguage = 'fr';
    } else {
        $pageLanguage = 'en';
    }

    $unity = new UnitySystem();
?>

<!DOCTYPE html>
<html lang="<?php echo $pageLanguage ?>_CA" class="no-js">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <meta name=description content="<?php echo $desc; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <?php
        new CanonicalTag();
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/header/ext-domains.php");
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/header/preloads.php");

        include($_SERVER['DOCUMENT_ROOT'] . "/includes/setofscripts.php");
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/mobile-detect/mobile_detect.php");
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/data.php");
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/breadcrumbs/breadcrumb_engine.php");
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/content-blocks/functions.php");
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/bottom-boxes/functions.php");
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/metatags/hreflang-alternates.php");
        include($_SERVER['DOCUMENT_ROOT'] . "/assets/programs/functions/view_functions.php");
        $script = $_SERVER['SCRIPT_NAME'];
    ?>
    <script>
        loadjs=function(){var l=function(){},c={},f={},u={};function s(e,n){if(e){var t=u[e];if(f[e]=n,t)for(;t.length;)t[0](e,n),t.splice(0,1)}}function o(e,n){e.call&&(e={success:e}),n.length?(e.error||l)(n):(e.success||l)(e)}function h(t,r,i,c){var s,o,e=document,n=i.async,f=(i.numRetries||0)+1,u=i.before||l,a=t.replace(/^(css|img)!/,"");c=c||0,/(^css!|\.css$)/.test(t)?(s=!0,(o=e.createElement("link")).rel="stylesheet",o.href=a):/(^img!|\.(png|gif|jpg|svg)$)/.test(t)?(o=e.createElement("img")).src=a:((o=e.createElement("script")).src=t,o.async=void 0===n||n),!(o.onload=o.onerror=o.onbeforeload=function(e){var n=e.type[0];if(s&&"hideFocus"in o)try{o.sheet.cssText.length||(n="e")}catch(e){n="e"}if("e"==n&&(c+=1)<f)return h(t,r,i,c);r(t,n,e.defaultPrevented)})!==u(t,o)&&e.head.appendChild(o)}function t(e,n,t){var r,i;if(n&&n.trim&&(r=n),i=(r?t:n)||{},r){if(r in c)throw"LoadJS";c[r]=!0}!function(e,r,n){var t,i,c=(e=e.push?e:[e]).length,s=c,o=[];for(t=function(e,n,t){if("e"==n&&o.push(e),"b"==n){if(!t)return;o.push(e)}--c||r(o)},i=0;i<s;i++)h(e[i],t,n)}(e,function(e){o(i,e),s(r,e)},i)}return t.ready=function(e,n){return function(e,t){e=e.push?e:[e];var n,r,i,c=[],s=e.length,o=s;for(n=function(e,n){n.length&&c.push(e),--o||t(c)};s--;)r=e[s],(i=f[r])?n(r,i):(u[r]=u[r]||[]).push(n)}(e,function(e){o(n,e)}),t},t.done=function(e){s(e,[])},t.reset=function(){c={},f={},u={}},t.isDefined=function(e){return e in c},t}();
        var sessionAuthorize = "<?php echo $_SESSION['AUTHORIZE'];?>";
    </script>

    <style>
        <?php
        // Path of critical stylesheets
        $atfPath = '/dist/css/atf/atf';
        // If customATF defined on page then add hypen followed by the value
        if (isset($customATF)) $atfPath .= '-' . $customATF;
        // Get contents of critical styles
        $criticalStylesInline = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $atfPath . '.css');
        // Output the critical styles
        echo $criticalStylesInline;
        ?>
    </style>

</head>
<body>
<header class="header">
    <div class="header__background">
        <div class="container">
            <div class="header__wrap type-display-flex type-flex-justify-between">
                <a href="/" class="logo" title="OnlineSlots.ca">
                    <img src="/images/redesign/main_logo.png" alt="OnlineSlots.ca" width="303" height="72">
                </a>
                <?php
                    include($_SERVER['DOCUMENT_ROOT'] . "/includes/header/main-nav.php");
                ?>
            </div>
        </div>
    </div>
    <div class="botton-mobile__menu">
        <div class="container">
            <ul class="bottom-mobile-menu__list type-display-flex type-flex-justify-between">
                <li class="bottom-mobile-menu__item">
                    <a href="/free">free slots</a>
                </li>
                <li class="bottom-mobile-menu__item"><a href="/real-money">real money </a></li>
                <li class="bottom-mobile-menu__item"><a href="/games/"> games</a></li>
            </ul>
        </div>
    </div>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/onca_breadcrumbs.php"); ?>
</header>
