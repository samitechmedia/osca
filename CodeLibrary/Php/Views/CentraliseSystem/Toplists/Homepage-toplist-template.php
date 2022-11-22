<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/ontario-check.php';
if ($isOntario) {
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/toplist-security.php';
}
?>
<div class="top__five-area">
    <?php
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

    foreach ($this->viewVariables['toplist']['partners'] as $index => $partner) { ?>
        <div
            data-oscatoplistnumber="<?php echo $index; ?>"
            data-oscatoplistname="<?php echo $partner['partner_information']['sitename']; ?>"
            data-oscatopliststarrating="<?php echo $partner['partner_information']['rating']; ?>"
            data-oscatoplistpayouts="<?php echo strip_tags($partner['partner_information']['payout']); ?>"
            data-oscatoplistbonusamount="<?php echo $partner['partner_information']['bonusvalue']; ?>"
            class="toplist"
        >
            <div class="top__panel top__panel--background type-display-flex type-flex-align-center">
                <div class="top__panel--background-numbered"></div>
                <div class="top__panel-title">
                    <h3 class="title title--h3 title--h3-no-bg-color">
                        <?php echo $partner['partner_information']['sitename']; ?>
                    </h3>
                </div>
            </div>
            <a class="toplist__row toplist__border-bottom toplist__border-right toplist__border-left"
               href="<?php echo $partner['partner_information']['affiliate_link']; ?>" rel="nofollow noreferrer" target="_blank">
                <div class="toplist__column toplist__column-md-2 toplist__column-full">
                    <div class="toplist__logo">
                        <img src="<?php echo $partner['partner_information']['logohome']; ?>"
                             alt="<?php echo $partner['partner_information']['sitename']; ?>"
                             width="121" height="70">
                    </div>
                    <div class="toplist__rating">
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
                        <span class="toplist__rating-numbers"><?php echo round($partner['partner_information']['rating'] / 2,
                                1); ?>/5 </span>
                    </div>
                    <button class="toplist__button desktop">
                        <?php echo $translations['playNow']; ?>
                    </button>
                </div>
                <div class="toplist__column toplist__column-md-8">
                    <div class="toplist__row toplist__border-left">
                        <div class="toplist__column toplist__column-4 toplist__border-top toplist__border-right">
                            <div class="info-box__item">
                                <p class="toplist__info-title">
                                    <?php echo $translations['firstDeposit']; ?>
                                </p>
                                <p class="toplist__description"><?php echo $partner['partner_information']['bonusvalue']; ?></p>
                            </div>
                        </div>

                        <div class="toplist__column toplist__column-4 toplist__border-top toplist__border-right">
                            <div class="info-box__item">
                                <p class="toplist__info-title">
                                    <?php echo $translations['averagePayout']; ?>
                                </p>
                                <p class="toplist__description"><?php echo $partner['partner_information']['payout']; ?></p>
                            </div>
                        </div>
                        <div class="toplist__column toplist__column-4 toplist__border-top toplist__border-right">
                            <div class="info-box__item">
                                <p class="toplist__info-title">
                                    <?php echo $translations['payoutSpeed']; ?>
                                </p>
                                <p class="toplist__description"><?php echo $partner['partner_information']['payouttime']; ?></p>
                            </div>
                        </div>
                        <div class="toplist__column toplist__column-4 toplist__border-top  toplist__border-right">
                            <div class="info-box__item">
                                <p class="toplist__info-title">
                                    <?php echo $translations['realMoneyGames']; ?>
                                </p>
                                <p class="toplist__description"><?php echo $partner['partner_information']['realmoneygames']; ?></p>
                            </div>
                        </div>
                        <div class="toplist__column toplist__column-4 toplist__border-top  toplist__border-right">
                            <div class="info-box__item">
                                <p class="toplist__info-title">
                                    <?php echo $translations['platforms']; ?>
                                </p>
                                <ul class="bullet__list type-display-flex type-flex-justify-between">
                                    <?php foreach (explode("||", $partner['partner_information']['devices']) as $device) { ?>
                                        <li title="<?php echo $device ?>"
                                            class="bullet__item bullet__item--null-padding"><svg class="icon mh-4" width="16" height="16" aria-hidden="true"><use xlink:href="/dist/icons/icons-device.svg#icon-<?php echo $device ?>"></use></svg>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="toplist__column toplist__column-4 toplist__border-top toplist__border-right">
                            <div class="info-box__item">
                                <p class="toplist__info-title">
                                    <?php echo $translations['depositOptions']; ?>
                                </p>
                                <div class="toplist__icon-wrapper">
                                    <?php foreach (explode("||", $partner['partner_information']['paymentsystems']) as $system) { ?>
                                        <div class="toplist__icon toplist__column toplist__column-md-2">
                                            <div class="toplist__icon-image">
                                                <img class="toplist__icon-img" src="/images/redesign/icons/deposits/<?php
                                                echo $system; ?>.svg" alt="<?php echo $system; ?>" width="90" height="24">
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </a>
            <div class="toplist__row toplist__border-all toplist__border-top align-right top__five-wrapp">
                <a href="<?php echo $partner['partner_information']['affiliate_link']; ?>" class="toplist__column toplist__column-full hide">
                    <button class="toplist__button mobile">
                        <?php echo $translations['playNow']; ?>
                    </button>
                </a>
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
                        <div class="col-12 col-lg-6 ">
                            <div class="freeGame-block">
                                <a href="<?php echo $partner['partner_information']['reviewurl']; ?>" id="626"
                                   class="featured__image-holder">
                                    <div class="featured__tool-tip">
                                        <?php echo $partner['partner_information']['gamestatus']; ?>
                                    </div>
                                    <img class="lazy"
                                        src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 520 192'%3E%3C/svg%3E"
                                        data-src="<?php echo $partner['partner_information']['gamelogo']; ?>"
                                        alt="<?php echo $partner['partner_information']['gamelogoalt']; ?>"
                                        width="520" height="192">
                                </a>
                            </div>
                            <span class="avalon__title"><?php echo $partner['partner_information']['gametitle']; ?></span>
                            <p class="avalon__text"><?php echo $partner['partner_information']['gametext']; ?></p>
                            <a href="<?php echo $partner['partner_information']['gamelink']; ?>"
                               class="primary-btn primary-btn--outline primary-btn--outline--hover">
                                <?php echo $translations['findOutMore']; ?>
                            </a>
                        </div>
                        <div class="col-12 col-lg-5">
                            <h3 class="title title--h4"><?php echo $partner['partner_information']['sitename']; ?>
                                <?php echo $translations['slotPlayerBenefit']; ?>
                            </h3>
                            <ul class="bullet__list bullet__list--check-green">
                                <li class="bullet__item"><?php echo $partner['partner_information']['bullet1']; ?>
                                </li>
                                <li class="bullet__item"><?php echo $partner['partner_information']['bullet2']; ?>
                                </li>
                                <li class="bullet__item"><?php echo $partner['partner_information']['bullet3']; ?>
                                </li>
                                <li class="bullet__item"><?php echo $partner['partner_information']['bullet4']; ?>
                                </li>
                            </ul>
                            <a href="/games/"
                               class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover primary-btn--mb-20">
                                <?php echo $translations['playGamesNow']; ?>
                                <div class="white__inner-circle">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </div>
                            </a>
                            <?php if ($partner['partner_information']['reviewurl']) { ?>
                                <a href="<?php echo $partner['partner_information']['reviewurl']; ?>" class="type-read-more">
                                    <?php echo $pageLanguage == 'en' ? 'Read '. $partner['partner_information']['sitename'].' Review': $translations['readReview']; ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    if ($isOntario) {
        echo '<div class="toplist__disclaimer">T&amp;Cs Apply to All Bonuses. 19+ only. Play Responsibly.</div>';
    }
    ?>

</div>
