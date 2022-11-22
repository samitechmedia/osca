<?php
header("X-Robots-Tag: noindex, nofollow");
include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/feeds/functions.php';

$flags = array('ca', 'au', 'us', 'bz', 'ch', 'fi', 'it', 'sv', 'es', 'de', 'bg', 'uk', 'nz', 'pt');
$f1 = array_rand($flags);
$f2 = array_rand($flags);

$flag[] = 'ca';
$flag[] = 'ca';
$flag[] = 'ca';
$flag[] = $flags[$f1];
$flag[] = $flags[$f2];
shuffle($flag);

$casinos = array('3' => 'spincasino',
    '6' => 'rubyfortune',
    '2' => 'rvegas');

$feed_display = get_winners('5', false, 'Canada', $flag);
foreach ($feed_display as $key => $value) {

    if ($value['casino'] != '3' || $value['casino'] != '4' || $value['casino'] != '6' || $value['casino'] != '2') {
        $final_casino = array_rand($casinos);
    } else {
        $final_casino = $value['casino'];
    }


    echo
        '
		 <div class="tbl-row" name=' . $casinos[$final_casino] . '>
			  <div class="name-cell">' . $value['player_name'] . '</div>
			  <div class="casino-cell"><span class="ico-casino ico-' . $casinos[$final_casino] . '"></span></div>
			  <div class="amount-cell">C$' . $value['won_amount'] . '</div>
			  <div class="date-cell">' . date('m-d-Y') . '</div>
			  <div class="country-cell"><span class="ico-country ico-' . $flag[$key] . '">&nbsp;</span></div>
			  <div class="play-cell"><a href="#"><span class="bull">»</span> <span>Visit Site</span></a></div>
		  </div>';

}

