<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/go/AfflinksInclude.php";
ini_set("default_socket_timeout", "5");

$href = urlencode(str_replace($_SERVER['DOCUMENT_ROOT'],'',$_SERVER['SCRIPT_FILENAME']));
$title = urlencode(str_replace($_SERVER['DOCUMENT_ROOT'],'',$_SERVER['SCRIPT_FILENAME']));
$ref = urlencode( $_SERVER['HTTP_REFERER'] );
$ua = urlencode( $_SERVER['HTTP_USER_AGENT'] );

file_get_contents("http://in.getclicky.com/in.php?site_id=100724316&srv=db55&sitekey_admin=b0774905bf74b5dfb7c4f0bd37bb5ab1&type=outbound&ip_address=".$_SERVER['REMOTE_ADDR']."&href=".$href."&title=".$title."&ref=".$ref."&ua=".$ua);

include_once($_SERVER['DOCUMENT_ROOT']."/includes/mobile-detect/mobile_detect.php");
$detect = new Mobile_Detect;

// header("location: https://www.jackpotcitycasino.com/canada/?s=wgs16221&a=bfpadid50751");

if ($detect->isMobile() ) { header("Location: http://wlbroadwaygaming.adsrv.eacdn.com/C.ashx?btag=a_3523b_3395c_&affid=1112&siteid=3523&adid=3395&c="); //Default mobile link
} else {
 header("Location: http://wlbroadwaygaming.adsrv.eacdn.com/C.ashx?btag=a_3523b_3395c_&affid=1112&siteid=3523&adid=3395&c="); //Default desktop link
}


