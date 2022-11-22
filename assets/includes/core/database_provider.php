<?php
/**
 * Created by PhpStorm.
 * User: adebolaolowofela
 * Date: 23/11/2018
 * Time: 16:49
 */

use CodeLibrary\Php\Classes\DatabaseInteraction\DatabaseServerConnection;
use CodeLibrary\Php\Config\Settings;

require_once $_SERVER['DOCUMENT_ROOT'] . '/CodeLibrary/Php/Setup/Loader.php';


function simple_dd()
{
    var_dump(func_get_args());
    exit;
}

/*
 * Jackpots
 */


/**
 * @return PDO
 */
function jackpot_getPdo()
{
    $database = new DatabaseServerConnection(
        Settings::$jackpotDatabaseServerAddress,
        'onlinesl_jackpots',  //@ set from jackpots/config
        Settings::$jackpotDatabaseUsername,
        Settings::$jackpotDatabasePassword
    );
    return $database->databaseServerConnection;
}

/**
 * @return string
 */
function jackpot_getMegaAmount()
{
    $megaAmount = '11473895';
    $megaSQLQuery = 'SELECT `date`,`MegaMoolahMega` FROM jackpots ORDER BY date DESC LIMIT 1';
    $pdoObject = jackpot_getPdo();
    $megaData = $pdoObject->query($megaSQLQuery);
    while ($row = $megaData->fetch()) {
        $megaDate = $row['date'];
        $megaAmount = $row['MegaMoolahMega'] . '.00';
    }


    return $megaAmount;
}