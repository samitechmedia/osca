<?php
include('/usr/www/users/corg/resources/jackpots/config.php');
include('/usr/www/users/corg/resources/jackpots/db_conn.php');

$name_array = array('0' =>'CashSplash',
                    '1' =>'LotsaLoot',
					'2' =>'WowPot',
					'3' =>'SuperJax',
					'4' =>'FruitFiesta',
					'5' =>'TreasureNile',
					'6' =>'CyberStud',
					'8' =>'JackpotDeuces',
					'9' =>'TripleSevens',
					'10'=>'MajorMillions',
					'11'=>'RouletteRoyale',
					'12'=>'KingCashalot',
					'13'=>'Tunzamunni',
					'14'=>'PokerRide',
					'15'=>'MegaMoolahMega',
					'16'=>'Totals'
                     );
					 
foreach($name_array as $name){
	    $names.= $name.',';
}
$query_names = trim($names, ","); 
		
$query = 'SELECT * FROM jackpots ORDER BY date DESC LIMIT 1';
$data = $dbc->query($query);
$row = $data->fetch();
asort($row);




/*if  (mysqli_error($dbc)){
    $error_message = mysqli_error($dbc);
	echo '<p>'.$error_message.'</p>';
	echo '<p>'.$query.'</p>';
	exit();
}
*/
//ORDER BY date LIMIT 1
/*echo '<p>here is the query: '.$query.'</p>';
echo '<p>here is var dump: '.var_dump($data).'</p>';*/

?>
