<?php

#TODO UPDATE CodeLibrary in git
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/programs/functions/dictionary.php';

// Get URI for current page
$pagePath = $_SERVER['REQUEST_URI'];
// Set string to target French section
$pagePathFr = '/fr/';
// Check the start of the string for target
if (strpos($pagePath, $pagePathFr) === 0) {
    $pageLanguage = 'fr';
} else {
    $pageLanguage = 'en';
}

$translations = getTranslations($pageLanguage ?? 'en');

$detect = new Mobile_Detect;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/ontario-check.php';
?>

<div class="exclusive__slots">
    <?php
    foreach ($this->viewVariables['toplist']['partners'] as $partner){
    ?>
    <div class="type-display-flex type-flex-justify-center-top">
        <div class="width-lrg-percentage-30 width-sm-percentage-100">
            <div class="exclusive__slots-holder">
                <img class="lazy"
                     src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 170 121'%3E%3C/svg%3E"
                     data-src="<?php echo $partner['partner_information']['logoinner']; ?>"
                     alt="<?php echo $partner['partner_information']['sitename']; ?>"
                     width="170" height="121">
            </div>

        </div>
        <div class="exclusive__slots-desc">
            <?php if (!$isOntario): ?>
                <h2 class="title title--h2"><?php echo $translations['exclusiveSlotsBonus'] ?> <span class="green__underline"><span
                        class="green-text"><?php echo $partner['partner_information']['bonuspercent']; ?></span> <?php echo $translations['upTo'] ?> <span
                        class="green-text"><?php echo $partner['partner_information']['bonusvalue']; ?></span></span>
                </h2>
            <?php endif; ?>
            <ul class="bullet__list">
                <li class="bullet__item"><i class="fa fa-check"></i><?php echo $translations['moreThan580GamesToPlayWithRealMoney'] ?></li>
                <?php if (!$isOntario) {?><li class="bullet__item"><i class="fa fa-check"></i><?php echo $translations['overC1600AvailableInDepositBonuses']; ?></li><?php }?>
                <li class="bullet__item"><i class="fa fa-check"></i><?php echo $translations['playWithAndEarnRealCash'] ?></li>
                <li class="bullet__item"><i class="fa fa-check"></i><?php echo $translations['350ThemedSlotGames'] ?></li>
            </ul>
        </div>
    </div>
    <div class="exclusive__options type-display-flex type-flex-justify-center-top">
        <div class="type-left-side">
            <div class="exclusive__item">
                <p class="exclusive__title"><?php echo $translations['depositOptions'] ?></p>
                <div class="type--relative js-swiper js-exclusive-swiper">
                    <div class="swiper-container js-exclusive-swiper__container">
                        <div class="swiper-wrapper">
                            <?php foreach (explode("||", $partner['partner_information']['paymentsystems']) as $system) { ?>
                                <div class="swiper-slide">
                                    <div class="deposit-icon deposit-icon--lge">
                                        <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 70 44'%3E%3C/svg%3E" data-src="/images/redesign/icons/deposits/<?php
                                        echo $system ?>.svg" alt="<?php echo $system
                                        ?>" width="60" height="34">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="swiper-btn swiper-btn--prev js-exclusive-swiper__prev" aria-label="previous">
                        <svg class="icon icon--red-white icon--bold" width="30" height="30" aria-hidden="true">
                            <use xlink:href="/dist/icons/icons-core.svg#icon-arrow-solid-left"></use>
                        </svg>
                    </div>
                    <div class="swiper-btn swiper-btn--next js-exclusive-swiper__next" aria-label="next">
                        <svg class="icon icon--red-white icon--bold" width="30" height="30" aria-hidden="true">
                            <use xlink:href="/dist/icons/icons-core.svg#icon-arrow-solid-right"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="type-right-side">
            <div class="exclusive__item">
                <p class="exclusive__title"><?php echo $translations['platforms'] ?></p>
                <ul class="bullet__list type-display-flex type-flex-justify-center">
                    <?php foreach (explode("||", $partner['partner_information']['devices']) as $device) { ?>
                        <li class="bullet__item bullet__item--null-padding"><svg class="icon mh-4" width="28" height="28" aria-hidden="true"><use xlink:href="/dist/icons/icons-device.svg#icon-<?php echo $device ?>"></use></svg></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
    <div class="exclusive__bottom-panel type-display-flex type-flex-justify-center">
        <a href="<?php echo $partner['partner_information']['affiliate_link']; ?>"
           class="primary-btn primary-btn--border-orange primary-btn--background-orange primary-btn--box-shadow-orange primary-btn--hover"
           rel="nofollow noreferrer">
            <?php echo $translations['playNow'] ?>
            <div class="white__inner-circle">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </div>
        </a>
    </div>


<?php
$row_count++;
}

if ($isOntario) {
    if ($pageLanguage === 'fr') {
        echo '<div class="exclusive__disclaimer">Les conditions générales s\'appliquent à tous les bonus. Seulement 19+. Jouez de façon responsable.</div>';
    } else {
        echo '<div class="exclusive__disclaimer">T&amp;Cs Apply to All Bonuses. 19+ only. Play Responsibly.</div>';
    }
}
?>
