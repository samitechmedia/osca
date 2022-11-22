<?php
$apacaheRequestHeaders = getallheaders();
if (!empty($apacaheRequestHeaders['Nginx-True-Client-Ip'])) {
    $_SERVER['REMOTE_ADDR'] = $apacaheRequestHeaders['Nginx-True-Client-Ip'];
}
