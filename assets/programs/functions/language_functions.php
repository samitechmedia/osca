<?php
function get_language_list($country_dir){
	
	switch($country_dir){
		case 'nl':
		  $list['cta']='Speel Nu';
		  $list['quickreview']='Snel Overzicht';
		  $list['fullreview']='Recensie';
		  $list['powered']='Powered by';
		  $list['bonus']='Bonus';
		  $list['payout']='Uitbetaling';
		  $list['playon']='Verenigbaar';
		  $list['games']='Spel';
		  $list['cashout']='Cashout';

		break;		
	}
	
	return $list;
}
?>
