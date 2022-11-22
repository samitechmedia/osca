<?php
function bottom_box($type = false,$script = false){

$box_img = array('ipad',
				 'iphone',
				 'android',
				 'mobile',
				 'vipstatus',
				 'debitandcreditcards',
				 'randomnumbergenerators',
				 'realmoneyslots',
				 'security',
				 'slotmachinehistory',
				 'ecogra',
				 'progressivejackpots');

$box_alt = array('iPad',
				 'iPhone',
				 'Android',
				 'Mobile Gaming',
				 'VIP Status',
				 'Debit Cards',
				 'Random Number Generators',
				 'Real Money Slots',
				 'Security',
				 'Slot Machine History',
				 'Ecogra',
				 'Progressive Jackpots');

$box_lnk = array('/ipad',
				 '/iphone',
				 '/android',
				 '/mobile',
				 '/guides/vip-status',
				 '/deposit/debit-and-credit-card',
				 '/guides/random-number-generators',
				 '/real-money',
				 '/guides/security',
				 '/guides/slot-machine-history',
				 '/guides/ecogra',
				 '/progressive-jackpots');

$keys = array(0,1,2,3,4,5,6,7,8,9,10,11);






switch($type){
	   case 'ipad' :
	         $output = array('1','2','3','4');
	   break;

	   case 'iphone':
	         $output = array('0','2','3','4');
	   break;

	   case 'android':
	         $output = array('1','0','3','4');
	   break;

	   case 'mobile':
	         $output = array('0','1','2','4');
	   break;

	   default;
	      if(in_array($script,$box_lnk)){
			  $remove = array_search($script,$box_lnk);
			  unset($keys[$remove]);
		  }
	    	for($i=0; $i<4; $i++){
				$key = array_rand($keys);

				$output[]=$key;
				unset($keys[$key]);
			}
	   break;

      }
	  echo'
			<div class="box-more clearfix">
    			<h2 class="title title--h2" id="related-topics">MORE  SLOTS-RELATED  TOPICS  FOR  YOU!</h2>
    				<div class="box-more__container">
					  <a class="box-more__item" href="'.$box_lnk[$output[0]].'"><img class="lazy" src="data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 234 146\'%3E%3C/svg%3E" data-src="/images/boxes/'.$box_img[$output[0]].'.jpg" alt="'.$box_alt[$output[0]].'"  width="234" height="146"></a>
					  <a class="box-more__item" href="'.$box_lnk[$output[1]].'"><img class="lazy" src="data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 234 146\'%3E%3C/svg%3E" data-src="/images/boxes/'.$box_img[$output[1]].'.jpg" alt="'.$box_alt[$output[1]].'"  width="234" height="146"></a>
					  <a class="box-more__item" href="'.$box_lnk[$output[2]].'"><img class="lazy" src="data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 234 146\'%3E%3C/svg%3E" data-src="/images/boxes/'.$box_img[$output[2]].'.jpg" alt="'.$box_alt[$output[2]].'"  width="234" height="146"></a>
					  <a class="box-more__item" href="'.$box_lnk[$output[3]].'"><img class="lazy" src="data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 234 146\'%3E%3C/svg%3E" data-src="/images/boxes/'.$box_img[$output[3]].'.jpg" alt="'.$box_alt[$output[3]].'"  width="234" height="146"></a>
				  </div>
			  </div>';
}


?>
