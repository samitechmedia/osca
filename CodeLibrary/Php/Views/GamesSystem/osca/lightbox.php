<div class="gamePopupBox">
    <div class="gamePopupTitle"><div class="gameTitle">Play <?php echo $this->viewVariables['database'][0]['game_name']; ?> For Free</div>
        <div class="gamePopupRateBox" data-game-id="<?php echo $this->viewVariables['database'][0]['game_id']; ?>">
            <span class="gamePopupRateText">Help us rate this game</span>
            <!--<span class="gamePopupRate">-->
                <!--<span style="width: 0%;" class="actual_rating" id="508"></span>-->
                        <ul class="userRating">
                            <li class=""></li>
                            <li class=""></li>
                            <li class=""></li>
                            <li class=""></li>
                            <li class=""></li>
                        </ul>
           <!-- </span>-->
        </div></div>
    <div class="gamePopupBody">
        <div class="closePopupBtn"></div>
        <div class="gamePopupInfoBox">
            <?php if(!empty($this->viewVariables['database'][0]['mobile_game_link'])){ ?>
                <iframe style="float:left; width:100%" class="gamePopupImg" frameBorder="0" src="<?php echo $this->viewVariables['database'][0]['mobile_game_link']; ?>" height="504px" width="720"></iframe>
            <?php } else { ?>
                <iframe style="float:left; width:100%" class="gamePopupImg" frameBorder="0" src="<?php echo $this->viewVariables['database'][0]['game_link']; ?>" height="504px" width="720"></iframe>
            <?php } ?>
        </div>
        <div class="popup-free-game-bot">
            <div class="col-in"><div class="block-info-popup">
                    <span class="box-img"><span class="box-img-in"><img alt="" src="/images/logos/jackpot_home_logo.png"></span></span>
                    <span class="block-info-popup-in"><span class="box-rated">Rated <span class="bold">9.5</span>/10</span>
                        <a href="/reviews/jackpot-city.php" class="link-read-reviews">Read Reviews</a></span>
                   </div>
               </div>
            <div class="col-in"><p>Play the real money version of this game with your C$1600 welcome bonus at JackpotCity</p></div>
            <div class="col-in"><a href="<?php echo $this->viewVariables['link']; ?>" target="_blank" rel="nofollow" class="btn-play-now">Play Now</a></div></div>
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
				<span class="stepContent">Make your first deposit. Your bonus will be automatically credited to your
 account!</span>
            </div>
        </div>

    </div>
</div>


<!--
            <div class="popup_rating" data-game-id="<?php //echo $this->viewVariables['database'][0]['game_id']; ?>">
                <p class="title_free">Please Rate this Game</p>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
-->
