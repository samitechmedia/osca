<?php
//define path constants, un comment the code below to see the root directory, then simply copy that directory and paste below for each constant where it says "put path here"
/*
$dir = getcwd();
echo $dir;
exit();
*/
define("CATEGORY_PATH", $_SERVER['DOCUMENT_ROOT']."/assets/programs/includes/");
define("SITE_PATH", $_SERVER['DOCUMENT_ROOT']."/assets/programs/information/sites/");
define("TEMPLATE_PATH", $_SERVER['DOCUMENT_ROOT']."/assets/programs/view/");
define("MOBILE_PATH", $_SERVER['DOCUMENT_ROOT']."/assets/programs/includes/mobile");
define("EMAIL_SITENAME", "Onlineslots.ca");


function email_alert($problem,$info){

	$message_sent = true;
	$headers = "From: notifications@alegend.net\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// $to = "tech@legendcorp.com";
	$to = "nigel@itech.media";

	$msg ='<p style="font-family:Lao UI, Arial, Helvetica, sans-serif; font-size:14px;">Warning (OSCA)! Someone has recently modified a list in the '.EMAIL_SITENAME.' centralize system and has used an incorrect site name! The system has mitigated the situation by removing the faulty name from the array, but this means the toplist has less partners than it should. Using the diagnostic information below, please return to the offending list and make sure to correct the faulty partner name:</p>

	<p style="font-family:Lao UI, Arial, Helvetica, sans-serif; font-size:14px;"><strong>List Name: </strong>'.$info[0].'</p>

	<p style="font-family:Lao UI, Arial, Helvetica, sans-serif; font-size:14px;"><strong>Faulty Partner Name: </strong>'.$problem.'</p>

	<p style="font-family:Lao UI, Arial, Helvetica, sans-serif; font-size:14px;"><strong>Category Name: </strong>'.$info[1].'</p>

	<p style="font-family:Lao UI, Arial, Helvetica, sans-serif; font-size:14px;"><strong>Country Directory (if applicable): </strong>'.$info[3].'</p>

	<p style="font-family:Lao UI, Arial, Helvetica, sans-serif; font-size:14px;"><strong>Script Name: </strong>'.$_SERVER['SCRIPT_NAME'].'</p>';

	$sbj =  EMAIL_SITENAME." Centralize Warning System, Improper Site Name Used!";
	mail($to, $sbj, $msg, $headers);


}





//function for getting proper flag for all toplists
function get_flag($code,$category,$restricted){

$available_flags = array('GB', 'US', 'AU', 'CA', 'SE', 'NL', 'IE', 'NZ', 'ZA', 'QUEBEC', 'FR', 'PT', 'BR', 'MY', 'AR', 'CL', 'ES', 'IT', 'BE', 'MX', 'CH', 'NO', 'ES', 'AE', 'DK', 'IE', 'FI', 'IN');

	if($category=='index_pages'){
	switch($code){
		  case 'GB':
		  return 'flag-uk';
		  break;
		  case 'CA':
		  return 'flag-ca';
		  break;
		  case 'AU':
		  return 'flag-au';
		  break;
		  case'US':
		  return'flag-usa';
		  default:
		  return 'noflag-arrow';
		  break;
	    }
     }
	 else{
		 if(in_array($code,$available_flags)){
			 $lower_code = strtolower($code);
			 if(in_array($code,$restricted)){
				$output = '<span class="accepts '.$lower_code.'no"></span>';
			 }// end if
			 else{
				$output = '<span class="accepts '.$lower_code.'"></span>';
			 }// end else

		 }//end if
		 else{//no match in the flag array, so do nothing
			return;
		 }
		 return $output;
	 }// end else
}


//============================================================================================================================//
//function for getting proper currency symbol//

function get_currency($sites_array,$code){
	switch($sites_array){
		case 'au':
		return '$';
		break;
		case 'us':
		return '$';
		break;
		case 'uk':
		return '&pound;';
		break;
		case 'ca':
		return '$';
		break;

		default:
			  switch($code){
				case 'GB':
				return '$';
				break;
				case 'CA':
				return '$';
				break;
				case 'AU':
				return '$';
				break;
				case'US':
				return'$';
				break;
				default	:
				return'$';

		  }



 }





}
