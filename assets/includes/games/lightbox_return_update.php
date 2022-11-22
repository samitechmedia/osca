<?php
session_start();
/*
error_reporting(E_ALL);
ini_set( 'display_errors','1');
*/
if(isset($_SERVER['HTTP_AUTHORIZE']) && isset($_SESSION['AUTHORIZE']) && $_SERVER['HTTP_AUTHORIZE'] == $_SESSION['AUTHORIZE'] ){

include($_SERVER['DOCUMENT_ROOT']."/includes/geo.php") ;
include($_SERVER['DOCUMENT_ROOT']."/assets/includes/games/config.php");
include($_SERVER['DOCUMENT_ROOT']."/assets/includes/games/functions_update.php");

if(isset($_GET['type'])){
	$game = $_GET['type'];
	click_track($game);
    $query = "SELECT id,provider_id,name,gamelink,image_url FROM games WHERE id = :game";
    $statement = $dbc->prepare($query);
    $statement->execute(compact('game'));

        while($row = $statement->fetch()){
            $gamelink = $row['gamelink'];
            $name = $row['name'];
            $id = $row['id'];
        }
}


?>
<div class="gamePopupBox">
	<div class="gamePopupTitle"><?php echo $name; ?></div>
	<div class="gamePopupBody">
		<div class="closePopupBtn"></div>
		<div class="gamePopupRateBox">
        <span class="gamePopupRateText">Help us rate this game</span>
			<span class="gamePopupRate"><span id="<?php echo $id;?>" class="actual_rating" style="width: 0%;"></span></span>
		</div>
		<div class="gamePopupInfoBox">
             <iframe style="float:left; width:100%" class="gamePopupImg" frameBorder="0" src="<?php echo $gamelink; ?>" height="504px" width="720"></iframe>
		</div>
		<div class="gamePopupStepsBox">
			<span class="gamePopupStepsTit">HOW TO PLAY FOR REAL MONEY</span>
			<div class="gamePopupStep step1">
				<span class="stepNumber">1</span>
				<span class="stepContent">Download and install the free casino software.</span>
			</div>
			<div class="gamePopupStep step2">
				<span class="stepNumber">2</span>
				<span class="stepContent">Register and create your new account. </span>
			</div>
			<div class="gamePopupStep step3">
				<span class="stepNumber">3</span>
				<span class="stepContent">Make your first deposit. Your bonus will be automatically credited to your account!</span>
			</div>
		</div>
		<div class="playWithRealMoneyBox">
                       <?php
					      if($code =='US'){$outlink = 'silveroak';}else{$outlink = 'spin-casino';}
					   ?>
			<a href="/go/<?php echo $outlink; ?>/casino" class="playWithRealMoneyBtn" target="_blank" rel="nofollow" >Play For Real Money - Get a C$1000 Bonus Now</a>
		</div>
	</div>
</div>



 <?php
}
else{
	echo 'access denied!';

}
?>
