<?PHP

function get_winners($number_of, $amount = false, $countries = false, $flag = [])
{
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/feeds/config.php';


//set some variables
    if ($countries && is_array($countries)) {
        $countries = join(',', $countries);
    }

//connect to the database

    $host = $settings['db']['host'];
    $database = $settings['db']['database'];
    $username = $settings['db']['username'];
    $password = $settings['db']['password'];
    $connectionDsn = "mysql:host=$host;dbname=$database;charset=utf8";
    $db = new PDO($connectionDsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//test for some conditions and try the proper query
    if (!$countries) {
        try {
            $query = $db->prepare("SELECT * FROM winner_casinos, winner_players WHERE winner_players.casino_id = winner_casinos.id ORDER BY rand() LIMIT 0,$number_of");
            $query->execute();
        } catch (PDOException $e) {
            print_r($e);
            die('ERROR: A database error occured.');
        }
    } else {
        try {
            $query = $db->prepare("SELECT * FROM winner_casinos, winner_players WHERE winner_players.casino_id = winner_casinos.id AND winner_players.player_country = '$countries' ORDER BY rand() LIMIT 0, $number_of");
            $query->execute();

        } catch (PDOException $e) {
            print_r($e);
            die('ERROR: A database error occured.');
        }
    }


    while ($show = $query->fetch(PDO::FETCH_ASSOC)) {

        if (strlen($show['game']) > 12) {
            $game = substr($show['game'], 0, 12);
            $game .= '...';
        } else {
            $game = $show['game'];
        }
        if (strlen($show['player_name']) > 8) {
            $name = substr($show['player_name'], 0, 8);
            $name .= '...';
        } else {
            $name = $show['player_name'];
        }
        $amount = number_format($show['won_amount']);

        $returned_array[] = array('flag' => $flag, 'player_name' => $name, 'won_amount' => $amount, 'game' => $game, 'casino' => $show['casino_id']);
    }
    return $returned_array;
}
