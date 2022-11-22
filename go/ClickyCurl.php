<?php
use CodeLibrary\Php\Classes\ServerConnection\Curler;
require_once $_SERVER['DOCUMENT_ROOT'].'/CodeLibrary/Php/Setup/Loader.php';

ini_set("default_socket_timeout", "5");
if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}

$clickyAddress = "http://in.getclicky.com/in.php";
$siteKeyAdmin = urlencode("b0774905bf74b5dfb7c4f0bd37bb5ab1"); //Good - OS.com
$siteId = urlencode("100724316"); // Good - OS.com
$server = urlencode("db55"); //Good - OS.com
$href = urlencode( $_SERVER['REQUEST_URI']);
$title = urlencode( $_SERVER['REQUEST_URI']);
$ref = urlencode( $_SERVER['HTTP_REFERER'] );
$ua = urlencode( $_SERVER['HTTP_USER_AGENT'] );
$urlForClickyTracking =
    $clickyAddress
    .'?site_id='.$siteId
    .'&srv='.$server
    .'&sitekey_admin='.$siteKeyAdmin
    .'&type=outbound'
    .'&ip_address='.$_SERVER['REMOTE_ADDR']
    .'&href='.$href
    .'&title='.$title
    .'&ref='.$ref
    .'&ua='.$ua;


$curler = new Curler($urlForClickyTracking);
$curlStatus = $curler->executeCurl();