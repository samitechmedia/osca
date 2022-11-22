<?php

$dbc = (new CodeLibrary\Php\Classes\DatabaseInteraction\DatabaseServerConnection(
    $db_host, $db_name, $db_user, $db_pass
))->databaseServerConnection;

/*if (!$dbc) {
    die('Connect Error: ' . mysqli_connect_error());
}
*/

