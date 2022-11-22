<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/programs/functions/dictionary.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/ontario-check.php';

if ($isOntario) {
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/toplist-security.php';
}
?>
<div class="top__five-area">
    <?php
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
    foreach ($this->viewVariables['toplist']['partners'] as $index => $partner) { ?>
        <div
          data-oscatoplistnumber="<?php echo $index; ?>"
          data-oscatoplistname="<?php echo $partner['partner_information']['sitename']; ?>"
          data-oscatopliststarrating="<?php echo $partner['partner_information']['rating']; ?>"
          data-oscatoplistpayouts="<?php echo strip_tags($partner['partner_information']['payout']); ?>"
          data-oscatoplistbonusamount="<?php echo $partner['partner_information']['bonusvalue']; ?>"
          class="toplist"
        >
            <div class="toplist__number"><?php echo $index; ?></div>
            <a class="toplist__row"
               href="<?php echo $partner['partner_information']['affiliate_link']; ?>" rel="nofollow noreferrer" target="_blank">
                <div class="toplist__column-full toplist__column-spacing-y toplist__column-md-2">
                    <div class="toplist__logo">
                        <img src="<?php echo $partner['partner_information']['logohome']; ?>"
                             alt="<?php echo $partner['partner_information']['sitename']; ?>"
                             width="132" height="78">
                    </div>
                    <div class="toplist__rating">
                        <span class="toplist__rating-numbers"><?php echo round($partner['partner_information']['rating'] / 2,
                                1); ?> </span>
                        <span class="rating">
                            <span class="rate-stars">
                                <svg class="icon c-silver" width="102" height="18" aria-hidden="true">
                                    <use xlink:href="/dist/icons/icons-core.svg#icon-five-stars-solid"></use>
                                </svg>
                                <span class="rate-stars__fill" style="width:<?php echo $partner['partner_information']['rating'] * 10 + 3 . '%' ?>">
                                    <svg class="icon c-orange" width="102" height="18" aria-hidden="true">
                                        <use xlink:href="/dist/icons/icons-core.svg#icon-five-stars-solid"></use>
                                    </svg>
                                </span>
                            </span>
                        </span>
                    </div>
                    <button class="toplist__button desktop">
                        <?php echo $translations['playNow']; ?>
                    </button>
                    <?php if ($partner['partner_information']['reviewurl']) { ?>
                        <div>
                            <button data-href="<?php echo $partner['partner_information']['reviewurl']; ?>" class="type-read-review type-read-review--fake-anchor">
                                <?php echo $pageLanguage == 'en' ? 'Read '. $partner['partner_information']['sitename'].' Review': $translations['readReview']; ?>
                            </button>
                        </div>
                    <?php } ?>
                </div>
                <div class="toplist__column toplist__column-md-8 toplist__top-info">
                    <div class="toplist__row toplist__row--no-wrap">
                        <div class="toplist__column toplist__column-4 toplist__column--parent">
                            <div class="info-box__item">
                                <p class="toplist__info-title">
                                    <?php echo $translations['firstDeposit']; ?>
                                </p>
                                <p class="toplist__description"><strong><?php echo $partner['partner_information']['bonusvalue']; ?></strong></p>
                            </div>
                        </div>

                        <div class="toplist__column toplist__column-4 toplist__column--parent">
                            <div class="info-box__item">
                                <p class="toplist__info-title">
                                    <?php echo $translations['averagePayout']; ?>
                                </p>
                                <p class="toplist__description">
                                    <svg class="icon icon--x-bold mr-4 c-green" width="10" height="10" aria-hidden="true">
                                        <use xlink:href="/dist/icons/icons-core.svg#icon-check"></use>
                                    </svg>
                                    <strong><?php echo $partner['partner_information']['payout']; ?></strong>
                                </p>
                            </div>
                        </div>
                        <div class="toplist__column toplist__column-4 toplist__column--parent">
                            <div class="info-box__item">
                                <p class="toplist__info-title">
                                    <?php echo $translations['payoutSpeed']; ?>
                                </p>
                                <p class="toplist__description toplist__description--payout">
                                    <svg class="icon mr-4 c-green" width="14" height="14" aria-hidden="true">
                                        <use xlink:href="/dist/icons/icons-free.svg#icon-lightning"></use>
                                    </svg>
                                    <strong><?php echo $partner['partner_information']['payouttime']; ?></strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="toplist__row toplist__row--no-wrap">
                        <div class="toplist__column toplist__column-4 toplist__column--parent">
                            <div class="info-box__item">
                                <p class="toplist__info-title">
                                    <?php echo $translations['platforms']; ?>
                                </p>
                                <ul class="bullet__list bullet__list--devices type-display-flex type-flex-justify-between">
                                    <?php foreach (explode("||", $partner['partner_information']['devices']) as $device) { ?>
                                        <li title="<?php echo $device ?>"
                                            class="bullet__item bullet__item--null-padding"><svg class="icon mh-4" width="16" height="16" aria-hidden="true"><use xlink:href="/dist/icons/icons-device.svg#icon-<?php echo $device ?>"></use></svg>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="toplist__column toplist__column-4 toplist__column--parent">
                            <div class="info-box__item">
                                <p class="toplist__info-title">
                                    <?php echo $translations['realMoneyGames']; ?>
                                </p>
                                <p class="toplist__description"><strong><?php echo $partner['partner_information']['realmoneygames']; ?></strong></p>
                            </div>
                        </div>
                        <div class="toplist__column toplist__column-4 toplist__column--parent">
                            <div class="info-box__item">
                                <p class="toplist__info-title">
                                    <?php echo $translations['depositOptions']; ?>
                                </p>
                                <div class="toplist__icon-wrapper">
                                    <?php foreach (explode("||", $partner['partner_information']['paymentsystems']) as $system) { ?>
                                        <div class="toplist__icon toplist__column toplist__column-md-2">
                                            <div class="toplist__icon-image">
                                                <img class="toplist__icon-img"
                                                    src="/images/redesign/icons/deposits-cards/<?php echo $system; ?>.svg"
                                                    alt="<?php echo $system; ?>"
                                                    width="48" height="30">
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </a>
            <div class="toplist__row align-right top__five-wrapp">
                <a href="<?php echo $partner['partner_information']['affiliate_link']; ?>" class="toplist__column toplist__column-full hide" target="_blank" rel="noreferrer noopener nofollow">
                    <button class="toplist__button mobile">
                        <?php echo $translations['playNow']; ?>
                    </button>
                </a>
                <div class="toplist__flex-wrapper">
                    <?php if ($partner['partner_information']['reviewurl']) { ?>
                        <a href="<?php echo $partner['partner_information']['reviewurl']; ?>" class="type-read-review">
                            <?php echo $pageLanguage == 'en' ? 'Read '. $partner['partner_information']['sitename'].' Review': $translations['readReview']; ?>
                        </a>
                    <?php } ?>
                    <div class="toplist__column text-right">
                        <p class="toplist__read-more type-read-more read-more__trigger m-b">
                            <span class="js-dataTextToggle toplist__read-more-toggle
                                data-text-original="<?php echo $translations['readMore']; ?>"
                                data-text-swap="<?php echo $translations['readLess']; ?>">
                                <?php echo $translations['readMore']; ?>
                            </span>
                            <svg class="icon icon--bold" width="12" height="12" aria-hidden="true">
                                <use xlink:href="/dist/icons/icons-core.svg#icon-angle-down"></use>
                            </svg>
                        </p>
                        <div class="featured__game type-display-flex type-flex-justify-between" style="display: none;">
                            <div class="col-12 col-lg-6 featured__game-top">
                                <div class="freeGame-block">
                                    <a href="<?php echo $partner['partner_information']['reviewurl']; ?>" id="626"
                                       class="featured__top-link">
                                        <div class="featured__tool-tip js-capitalize">
                                            <?php echo $partner['partner_information']['gamestatus']; ?>
                                        </div>
                                        <div class="featured__top-holder">
                                            <div class="featured__image-holder">
                                                <img class="lazy"
                                                    src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 120 90'%3E%3C/svg%3E"
                                                    data-src="<?php
                                                $gameName = str_replace('/games/', '', $partner['partner_information']['gamelink']);
                                                echo '/images/freeslots/' . $gameName . '.png';
                                                ?>"
                                                    alt="<?php echo $partner['partner_information']['gamelogoalt']; ?>"
                                                    width="120" height="90">
                                            </div>
                                            <div>
                                                <span class="game-block__title js-capitalize"><?php echo $partner['partner_information']['gametitle']; ?></span>
                                                <p class="game-block__text js-capitalize"><?php echo $partner['partner_information']['gametext']; ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <a href="<?php echo $partner['partner_information']['gamelink']; ?>"
                                   class="find-out-link">
                                    <?php echo $translations['findOutMore']; ?>
                                </a>
                            </div>
                            <div class="col-12 col-lg-6 featured__game-bottom">
                                <h3 class="toplist-title--4"><?php echo $partner['partner_information']['sitename']; ?>
                                    <?php echo $translations['slotPlayerBenefit']; ?>
                                </h3>
                                <ul class="bullet__list">
                                    <li class="bullet__item">
                                        <svg class="icon icon--x-bold mr-8 c-green" width="10" height="10" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-core.svg#icon-check"></use>
                                        </svg>
                                        <?php echo $partner['partner_information']['bullet1']; ?>
                                    </li>
                                    <li class="bullet__item">
                                        <svg class="icon icon--x-bold mr-8 c-green" width="10" height="10" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-core.svg#icon-check"></use>
                                        </svg>
                                        <?php echo $partner['partner_information']['bullet2']; ?>
                                    </li>
                                    <li class="bullet__item">
                                        <svg class="icon icon--x-bold mr-8 c-green" width="10" height="10" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-core.svg#icon-check"></use>
                                        </svg>
                                        <?php echo $partner['partner_information']['bullet3']; ?>
                                    </li>
                                    <li class="bullet__item">
                                        <svg class="icon icon--x-bold mr-8 c-green" width="10" height="10" aria-hidden="true">
                                            <use xlink:href="/dist/icons/icons-core.svg#icon-check"></use>
                                        </svg>
                                        <?php echo $partner['partner_information']['bullet4']; ?>
                                    </li>
                                </ul>
                                <a href="/games/" class="toplist__button toplist__button--no-border">
                                    <?php echo $translations['playGamesNow']; ?>
                                </a>
                                <?php if ($partner['partner_information']['reviewurl']) { ?>
                                    <div class="text-center">
                                        <a href="<?php echo $partner['partner_information']['reviewurl']; ?>" class="type-read-review">
                                            <?php echo $pageLanguage == 'en' ? 'Read '. $partner['partner_information']['sitename'].' Review': $translations['readReview']; ?>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }
    ?>

</div>

<?php
if ($isOntario) {
    if ($pageLanguage === 'fr') {
        echo '<div class="toplist__disclaimer">Les conditions générales s\'appliquent à tous les bonus. Seulement 19+. Jouez de façon responsable.</div>';
    } else {
        echo '<div class="toplist__disclaimer">T&amp;Cs Apply to All Bonuses. 19+ only. Play Responsibly.</div>';
    }
}
?>
