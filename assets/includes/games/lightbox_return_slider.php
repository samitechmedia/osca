<?php
#include($_SERVER['DOCUMENT_ROOT']."/includes/geo.php") ;
include($_SERVER['DOCUMENT_ROOT']."/assets/includes/games/config.php");
include($_SERVER['DOCUMENT_ROOT']."/assets/includes/games/functions_update.php");

if(isset($_GET['type'])){
    $game = (int)$_GET['type'];
    if (is_integer($game)) {

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

}
if($code =='US'){$outlink = 'silveroak';} else{$outlink = 'spin-casino';}
?>

<div class="popup">
	<div class="modal__overlay">
		<div class="container">
			<div class="popup__container">
				<div class="row type--relative">
					<a href="" class="js-action__popup-close fa fa-close"></a>
					<div class="col-12 col-lg-6 col-xl-9">
						<iframe style="float:left;" class="gamePopupImg" frameBorder="0" src="<?php echo $gamelink; ?>" width="1024px" height="725px"></iframe>
						<!-- <img src="images/modal_big_image.jpg" alt=""> -->
					</div>
					<div class="col-12 col-lg-6 col-xl-3">
						<div class="modal-game__info">
							<span class="modal__title"><?php echo $name; ?></span>
							<ul class="modal__list">
								<li class="modal__item type-display-flex type-flex-justify-between">
									<div class="type-display-flex type-flex-direction-column">
										<span class="green-text text--bold type-text-uppercase">empty</span>
										<span>Reels</span>
									</div>
									<div class="type-display-flex type-flex-direction-column">
										<span class="green-text text--bold type-text-uppercase">empty</span>
										<span>Paylines</span>
									</div>
								</li>
								<li class="modal__item type-display-flex type-flex-justify-between">
									<div class="type-display-flex type-flex-direction-column">
										<span class="green-text text--bold type-text-uppercase">empty</span>
										<span>Multiplier</span>
									</div>
									<div class="type-display-flex type-flex-direction-column">
										<span class="green-text text--bold type-text-uppercase">empty</span>
										<span>Bonus Round</span>
									</div>
								</li>
								<li class="modal__item type-display-flex type-flex-justify-between">
									<div class="type-display-flex type-flex-direction-column">
										<span class="green-text text--bold type-text-uppercase">empty</span>
										<span class="green-text small__text">empty</span>
										<span>Max Bet</span>
									</div>
									<div class="type-display-flex type-flex-direction-column">
										<span class="green-text text--bold type-text-uppercase">empty</span>
										<span class="green-text small__text">Coins</span>
										<span>Max Win</span>
									</div>
								</li>
								<li class="modal__item type-display-flex type-flex-justify-between">
									<div class="type-display-flex type-flex-direction-column">
										<span class="green-text text--bold type-text-uppercase">empty</span>
										<span>Jackpot</span>
									</div>
									<div class="type-display-flex type-flex-direction-column">
										<span class="green-text text--bold type-text-uppercase">empty</span>
										<span>Progressive Jackpot</span>
									</div>
								</li>
							</ul>
							<a href="/go/<?php echo $outlink; ?>/casino" target="_blank" rel="nofollow" class="primary-btn primary-btn--border-orange primary-btn--background-orange primary-btn--box-shadow-orange primary-btn--hover">
								PLAY GAME FOR REAL
								<div class="white__inner-circle">
									<i class="fa fa-arrow-right" aria-hidden="true"></i>
								</div>
							</a>
							<span>Get $1500 Free Bonus to Play For Real Money</span>
							<div class="thumbnail__image">
								<img src="images/redesign/text_image_04.jpg" alt="">
								<a href="" class="blue__link">Try a Random Free Game <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
