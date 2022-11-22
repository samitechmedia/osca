<?php
/* define('DB_HOST', 'vqs775.pair.com');
 define('DB_USER', 'nkisberg_6');
 define('DB_PASSWORD', '5ytTkrah');
 define('DB_NAME', 'nkisberg_review');
 */
use CodeLibrary\Php\Config\Settings;

require_once $_SERVER['DOCUMENT_ROOT'] . '/CodeLibrary/Php/Setup/Loader.php';


//$db_host ='localhost';
//$db_user ='onlinesl_chris';
//$db_pass ='aKmaJCkaU6';

$db_host = Settings::$jackpotDatabaseServerAddress;
$db_user = Settings::$jackpotDatabaseUsername;
$db_pass = Settings::$jackpotDatabasePassword;
//$db_name = Settings::$jackpotDatabaseName;
$db_name = 'onlinesl_jackpots';

