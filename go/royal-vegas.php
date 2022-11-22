<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/go/AfflinksInclude.php";
ini_set("default_socket_timeout", "5");
include_once($_SERVER['DOCUMENT_ROOT']."/includes/mobile-detect/mobile_detect.php");
$detect = new Mobile_Detect;

$href = urlencode(str_replace($_SERVER['DOCUMENT_ROOT'],'',$_SERVER['SCRIPT_FILENAME']));
$title = urlencode(str_replace($_SERVER['DOCUMENT_ROOT'],'',$_SERVER['SCRIPT_FILENAME']));
$ref = urlencode( $_SERVER['HTTP_REFERER'] );
$ua = urlencode( $_SERVER['HTTP_USER_AGENT'] );

file_get_contents("http://in.getclicky.com/in.php?site_id=100724316&srv=db55&sitekey_admin=b0774905bf74b5dfb7c4f0bd37bb5ab1&type=outbound&ip_address=".$_SERVER['REMOTE_ADDR']."&href=".$href."&title=".$title."&ref=".$ref."&ua=".$ua); 


if ($detect->isMobile()) {
				header("Location: https://ca.royalvegascasino.com/?a=bfpadid88040"); //Default mobile link
		  }
else{
	header("Location: https://ca.royalvegascasino.com/?a=bfpadid88039"); //Default desktop link
}

