<?php
$clicks_count = mt_rand(250,1000);

#var_dump($this->viewVariables['partnerInfo'][0]);

// Game link - Desktop / Mobile link logic in controller
$game_link = $this->viewVariables['game_link'];
// Aspect Ration to render :
// - add to Lightbox for logic, and
// - add to <object> container for styling
$aspect_ration = $this->viewVariables['aspect_ratio'];
// Facebook Like / Twitter Re-tweet link
$social_url = $this->viewVariables['social_url'];

// Current method does not return ratings average data for game
// To retrieve need to update returened data in call,
// or update Model->getSingleGameInfoById() body with
//  return $this->getGamesByArrayOfIds(array($gameId));

if(empty($this->viewVariables['database'][0]['ratings_average']) === false){
    $ratingsAverage = (int) $this->viewVariables['database'][0]['ratings_average'];
}

$allowRatings = true;

?>

    <div id="game-modal-screen" class="game__template <?php echo $aspect_ration?>" data-game-id="<?php echo $this->viewVariables['database'][0]['game_id']; ?>">
        <div class="trigger__area_wrapper">
            <div class="trigger__area" style="color:white">
                <span class="js_lightResize trigger__area--full"><i class="expand"></i></span>
                <span class="js_lightClose trigger__area--close"></span>
            </div>
        </div>

        <div id="js_gameContent">
            <div id="js_gameContentHeader" class="game__template--top-bar">
                <div class="game__template--game-title"><?php echo $this->viewVariables['database'][0]['game_name']; ?></div>
                <div class="game__template--game-rating">
                    <span class="game__template--game-rating-title">2 FREE Spins</span>
                    <div class="rating__area">
                        <span class="rating">
                            <svg class="icon c-orange" width="102" height="18" aria-hidden="true">
                                <use xlink:href="/dist/icons/icons-core.svg#icon-five-stars-solid"></use>
                            </svg>
                        </span>
                        <span class="game__template--game-rating-title">250(reviews)</span>
                    </div>
                </div>
            </div>

            <div class="game__template--body">
                <div id="js_gameContentBody" class="gameContainerResizing <?php echo $aspect_ration ?>">
                    <object type="text/html" data="<?php echo $game_link ?>"></object>
                </div>
            </div>

            <div id="js_gameContentFooter" class="game__template--bottom-bar">
                <div class="">
                    <span class="rating__title">Spin Casino</span>
                    <div class="rating__area">
                        <span class="rating__count">4.5/5 </span>
                        <span class="rating">
                            <span class="rate-stars">
                                <svg class="icon c-silver" width="102" height="18" aria-hidden="true">
                                    <use xlink:href="/dist/icons/icons-core.svg#icon-five-stars-solid"></use>
                                </svg>
                                <span class="rate-stars__fill" style="width:90%;">
                                    <svg class="icon c-orange" width="102" height="18" aria-hidden="true">
                                        <use xlink:href="/dist/icons/icons-core.svg#icon-five-stars-solid"></use>
                                    </svg>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="">
                    <a class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover" href="" rel="nofollow" target="_blank">Visit website
                        <div class="white__inner-circle">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </div>
                    </a>
                    <a id="js_feedbackShow" class="primary-btn primary-btn--outline primary-btn--outline--hover show-feedback">Give feedback on this game</a>
                    <span class="small__text">Play the real money version of this game with your $1000 welcome bonus at Spin Casino.</span>
                </div>
            </div>
        </div>
    </div>
