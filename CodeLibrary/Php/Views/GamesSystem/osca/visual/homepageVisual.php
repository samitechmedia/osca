<div class="row js_gamesContainer js_lazyLoaderEventListener"
    <?php
        $isMobile = false;
        foreach ($this->viewVariables['classInstance'] as $attribute => $value) {
            if ($attribute === 'mobile') {
                $isMobile = $value;
            }
            echo ' data-' . $attribute . '="' . $value . '"';
        }
    ?>
>
    <?php
        // Define number of games to render as cards, rest as slice/carousel
        $gameIndexBreakPoint = 4;
        // Calculate last entry
        $gameIndexEnd = count($this->viewVariables['games']) - 1;
        //
        foreach ($this->viewVariables['games'] as $index => $game) :
            // Image resource
            $imageURL = \CodeLibrary\Php\Config\Settings::$gamesImagePath;
            // Image alteration class - match old-images to title-screens - adds margin
            $imageClassAddition = '';
            // No title-screen image association
            if (empty($game['attributes']['title_screen']['attribute_value']) === true) {
                $imageURL .= $game['image_url'];
                // add a custom class to match newer title-screen resolutions
                $imageClassAddition = 'game-card__image__pushme';
            } else {
                $imageURL .= 'titlescreens/' . $game['attributes']['title_screen']['attribute_value'];
            }

            // Ratings hack/compromise to fix ratings between 2 and 3 stars for non rated games
            if (empty($game['ratings_average'])) {
                // Random rating
                $game['ratings_average'] = rand(50, 70);
            }

            // Render as Card
            if($index < $gameIndexBreakPoint): ?>
                <div class="free-slots__card">
                    <a href="#" data-game-id="<?php echo $game['game_id']; ?>"
                       class="free-slots__card__image-container js_gamesContainerSingle">
                        <div style="" class="free-slots__card__image js_lazyLoader <?php echo $imageClassAddition ?>"
                             data-src="<?php echo $imageURL ?>"
                             data-alt="<?php echo $game['game_name']; ?>"
                             data-height=""
                             data-width="">
                        </div>
                    </a>

                    <div class="free-slots__info">
                        <p class="free-slots__card__title"><?php echo $game['game_name']; ?></p>

                        <div class="free-slots__rating rating">
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

                        <a href="#" data-game-id="<?php echo $game['game_id']; ?>"
                           class="js_gamesContainerSingle free-slots__info__btn primary-btn primary-btn--border-orange primary-btn--background-orange primary-btn--box-shadow-orange primary-btn--hover">
                            PLAY NOW
                            <div class="white__inner-circle">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </div>
                        </a>
                    </div>
                </div>

    <?php
        // End check for Card
        endif;
        // End loop over Games
        endforeach;
    ?>

</div>
