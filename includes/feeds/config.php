<?PHP


use CodeLibrary\Php\Config\Settings;

require_once $_SERVER['DOCUMENT_ROOT'] . '/CodeLibrary/Php/Setup/Loader.php';

// database connection
$settings['db']['host'] = Settings::$winnerFeedDatabaseServerAddress;
$settings['db']['username'] = Settings::$winnerFeedDatabaseUsername;
$settings['db']['password'] = Settings::$winnerFeedDatabasePassword;
$settings['db']['database'] = Settings::$winnerFeedDatabaseName;

// remove old wins of x days ago
// while I tested, there were about 50-100 winners a day.
$settings['db']['remove_wins_after_days'] = 5;
