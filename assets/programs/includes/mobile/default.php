<?php
if($sites_array == 'main-hp'){
$template = 'top_five_hp';
}
else{
$template = 'inner_new';
}

switch($code){

          case 'US':
		  $sites_five = array           (1 => 'winpalace',
										 2 => 'bovada',
										 3 => 'drake'
										);

	      break;

		  default:
		  $sites_five = array           (1 => 'spincasino',
										 2 => 'rubyfortune',
										 3 => 'royalvegas');


		  break;
}


?>
