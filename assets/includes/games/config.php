<?php

use CodeLibrary\Php\Config\Settings;
use CodeLibrary\Php\Classes\DatabaseInteraction\DatabaseServerConnection;

require_once $_SERVER['DOCUMENT_ROOT'] . '/CodeLibrary/Php/Setup/Loader.php';

$db_host = Settings::$gamesDatabaseServerAddress; // MySQL database Host, usually 'localhost'
$db_user = Settings::$gamesDatabaseUsername; // MySQL username
$db_pass = Settings::$gamesDatabasePassword; // MySQL password
//$db_name = Settings::$gamesDatabaseName; // MySQL database
$db_name = 'onlinesl_games'; // MySQL database

try {
    $dbc = (new DatabaseServerConnection(
        $db_host, $db_name, $db_user, $db_pass
    ))->databaseServerConnection;
} catch (PDOException $e) {
    echo '<p>There was a problem with your connection: ' . $e->getMessage() . '</p>';
}


