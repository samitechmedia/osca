<?php

    $detect = new Mobile_Detect;

?>

<div class="exclusive__slots">
    <?php
        $row_count = 1;
        foreach ($sites_five

        as $fname){
    ?>
    <div class="type-display-flex type-flex-justify-center-top">
        <div class="width-lrg-percentage-30 width-sm-percentage-100">
            <div class="exclusive__slots-holder">
                <img src="<?php echo $output[$fname]['logoinner']; ?>" alt="<?php echo $output[$fname]['sitename']; ?>">
            </div>

        </div>
        <div>
            <h2 class="title title--h2">Exclusive Slots Bonus: <span class="green__underline"><span
                        class="green-text"><?php echo $output[$fname]['bonuspercent']; ?></span> Up To <span
                        class="green-text"><?php echo $output[$fname]['bonusvalue']; ?></span></span></h2>
            <ul class="bullet__list">
                <li class="bullet__item"><i class="fa fa-check"></i> More than 580 games to play with real money</li>
                <li class="bullet__item"><i class="fa fa-check"></i> Over C$1600 available in deposit bonuses</li>
                <li class="bullet__item"><i class="fa fa-check"></i> Play with and earn real cash</li>
                <li class="bullet__item"><i class="fa fa-check"></i> 350+ themed slot games</li>
            </ul>
        </div>
    </div>
    <div class="exclusive__options type-display-flex type-flex-justify-center-top">
        <div class="type-left-side">
            <div class="exclusive__item">
                <p class="exclusive__title">Deposit Options</p>
                <div class="type--relative">
                    <div class="swiper-container exclusive-slider js-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($output[$fname]['paymentsystems'] as $system) { ?>
                                <div class="swiper-slide">
                                    <div class="deposit-icon deposit-icon--lge">
                                        <img src="/images/redesign/icons/deposits/<?php
                                                 echo $system ?>.svg" alt="<?php echo $system
                                        ?>"/>
                                    </div>
                                </div>
							<?php } ?>
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
        <div class="type-right-side">
            <div class="exclusive__item">
                <p class="exclusive__title">Platforms</p>
                <ul class="bullet__list type-display-flex type-flex-justify-center">
                    <?php foreach ($output[$fname]['devices'] as $device) { ?>
                        <li class="bullet__item bullet__item--null-padding">
                            <svg class="icon mh-4" width="16" height="16" aria-hidden="true"><use xlink:href="/dist/icons/icons-device.svg#icon-<?php echo $device ?>"></use></svg>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
    <div class="exclusive__bottom-panel type-display-flex type-flex-justify-center">
        <a href="<?php echo $output[$fname]['link']; ?>"
           class="primary-btn primary-btn--border-orange primary-btn--background-orange primary-btn--box-shadow-orange primary-btn--hover"
           rel="nofollow noreferrer">
            Play now
            <div class="white__inner-circle">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </div>
        </a>
    </div>


<?php
    $row_count++;
    }
?>
