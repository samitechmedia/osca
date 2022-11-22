
<?php

foreach ($this->viewVariables['games'] as $game) :

    // Image resource
    $imageURL = \CodeLibrary\Php\Config\Settings::$gamesImagePath;
    // Image alteration class - match old-images to title-screens - adds margin
    $imageClassAddition = '';

    if (empty($game['attributes']['title_screen']['attribute_value']) === true) {
        $imageURL.= $game['image_url'];
        $imageClassAddition = 'game-card__image__pushme';
    }
    else{
        $imageURL.= 'titlescreens/' . $game['attributes']['title_screen']['attribute_value'];
    }

    // Ratings hack/compromise to fix ratings between 2 and 3 stars for non rated games
    if(empty($game['ratings_average'])){
        // Random rating
        $game['ratings_average'] = rand(50, 70);
    }

    ?>

    <div class="box col-12 col-sm-6 col-lg-4 col-xl-3">
        <div class="game-card">
            <div class="game-card__image">
                <div style="" class="js_lazyLoader <?php echo $imageClassAddition?>"
                     data-src="<?php echo $imageURL ?>"
                     data-alt="<?php echo $game['game_name']; ?>"
                     data-height=""
                     data-width="">
                </div>
            </div>

            <div class="game-card__info">
                <div class="game-card__details">
                    <p class="game-card__title">
                        <?php echo $game['game_name']; ?>
                    </p>

                    <div class="game-card__rating__rating rating">
                        <span class="rate-stars">
                            <svg class="icon c-silver" width="102" height="18" aria-hidden="true">
                                <use xlink:href="/dist/icons/icons-core.svg#icon-five-stars-solid"></use>
                            </svg>
                            <span class="rate-stars__fill" style="width:<?php echo $game['ratings_average'] ?>%;">
                                <svg class="icon c-orange" width="102" height="18" aria-hidden="true">
                                    <use xlink:href="/dist/icons/icons-core.svg#icon-five-stars-solid"></use>
                                </svg>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="game-card__cta">
                    <a href="" class="js_gamesContainerSingle game-card__button primary-btn primary-btn--border-orange primary-btn--background-orange primary-btn--box-shadow-orange"
                       data-game-id="<?php echo $game['game_id']; ?>">
                        PLAY FOR FREE
                        <div class="white__inner-circle">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
