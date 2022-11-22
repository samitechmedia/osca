<?php
include($_SERVER['DOCUMENT_ROOT'].'/assets/jackpots/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/assets/jackpots/db_conn.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];
}

$name_array = array('0' =>'MegaMoolahMega',
                    '1' =>'RouletteRoyale',
					'2' =>'MajorMillions',
					'3' =>'TreasureNile',
					'4' =>'Tunzamunni',
					'5' =>'CashSplash',
					'6' =>'SuperJax',
					'7' =>'WowPot',
					'8' =>'LotsaLoot',
					'9'=>'FruitFiesta',
					'10'=>'JackpotDeuces',
                     );
$jackpot = $name_array[$id];
					 
$query = 'SELECT '.$jackpot.' FROM jackpots ORDER BY date DESC LIMIT 1';
$data = $dbc->query($query);
$row = $data->fetch();

echo '$'.number_format($row[$jackpot]);

/*
		imageArray[0] = 'megahmoolah.gif';
		imageArray[1] = 'rouletteroyale.gif';
		imageArray[2] = 'majormillions.gif';
		imageArray[3] = 'treasurenile.gif';
		imageArray[4] = 'tunzamunni.gif';
		imageArray[5] = 'cashsplash.gif';
		imageArray[6] = 'superjax.gif';
		imageArray[7] = 'wowpot.gif';
		imageArray[8] = 'lotsaloot.gif';
		imageArray[9] = 'fruitfiesta.gif';
		imageArray[10] = 'jackpotdeuces.gif';






*/



if  (mysqli_error($dbc)){
    $error_message = mysqli_error($dbc);
	echo '<p>'.$error_message.'</p>';
	echo '<p>'.$query.'</p>';
	exit();
}

//ORDER BY date LIMIT 1
/*echo '<p>here is the query: '.$query.'</p>';
echo '<p>here is var dump: '.var_dump($data).'</p>';*/

?>
