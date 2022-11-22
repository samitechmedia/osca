<?php
#TODO UPDATE CodeLibrary in git
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/programs/functions/dictionary.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/ontario-check.php';

if ($isOntario) {
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/toplist-security.php';
}

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
?>
<div class="game-blocks game-blocks--three type-display-flex">
    <!-- begin loop -->
    <?php
    $row_count = 1;

    foreach ($this->viewVariables['toplist']['partners'] as $partner) {
        ?>
        <?php if ($row_count <= 3) { ?>
            <div class="game-blocks__block <?php if ($row_count == 1) { ?>game-blocks__block--first<?php } ?>">
                <?php if ($row_count == 1) { ?>
                    <div class="first-rated"><?php echo $translations['our1RatedCasino'] ?></div>
                <?php } ?>
                <div class="game-block__title">
                    <span class="game-block__number"><?php echo $row_count; ?></span>
                    <h3 class="title title--top3"><?php echo $partner['partner_information']['sitename']; ?></h3>
                </div>
                <div class="game-block__body">
                    <a href="<?php echo $partner['partner_information']['affiliate_link']; ?>" rel="nofollow noreferrer"
                       target="_blank">
                        <div class="game-block__logo type-display-flex type-flex-justify-around">
                            <div class="game-block__logo-wrapper">
                                <div class="logo">
                                    <img src="<?php echo $partner['partner_information']['logoinner']; ?>"
                                         alt="<?php echo $partner['partner_information']['sitename']; ?> Logo" width="161" height="116">
                                </div>
                            </div>
                            <div class="rating__area">
                                <div class="rating__header">rating</div>
                                <div
                                  class="rating__count"><?php echo round($partner['partner_information']['rating'] / 2, 1); ?>
                                    /5
                                </div>
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
                        </div>
                        <div class="info-box__area type-display-flex type-flex-justify-between">
                            <div class="info-box__item">
                                <p class="info-box__title info-box__title--green">
                                    <?php echo $partner['partner_information']['bonusvalue']; ?>
                                </p>
                                <p>
                                    <?php echo $translations['firstDeposit'] ?>
                                </p>
                            </div>
                            <div class="info-box__item">
                                <p class="info-box__title info-box__title--blue">
                                    <?php echo $partner['partner_information']['payout']; ?>
                                </p>
                                <p>
                                    <?php echo $translations['averagePayout'] ?>
                                </p>
                            </div>
                        </div>

                        <div class="game-block__btn-block">
                            <div class="button-base type-display-flex type-flex-justify-center">
                                <button
                                  class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover primary-btn--border-green primary-btn--background-green primary-btn--box-shadow-green">
                                    <?php echo $translations['playNow'] ?>
                                    <div class="white__inner-circle">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </div>
                                </button>
                            </div>
                        </div>

                    </a>
                    <ul class="game-block__list bullet__list bullet__list--check-green">
                        <li class="bullet__item"><?php echo $partner['partner_information']['bullet1']; ?>
                        </li>
                        <li class="bullet__item"><?php echo $partner['partner_information']['bullet2']; ?>
                        </li>
                        <li class="bullet__item"><?php echo $partner['partner_information']['bullet3']; ?>
                        </li>
                        <li class="bullet__item"><?php echo $partner['partner_information']['bullet4']; ?>
                        </li>
                    </ul>
                    <div class="col-12 game-block__featured">
                        <div class="featured__image-holder type-display-flex type-flex-justify-center">
                            <div class="featured__tool-tip">
                                <?php echo $partner['partner_information']['gamestatus']; ?>
                            </div>
                            <img class="lazy"
                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 520 192'%3E%3C/svg%3E"
                                data-src="<?php echo $partner['partner_information']['gamelogo']; ?>"
                                alt="<?php echo $partner['partner_information']['gamelogoalt']; ?>"
                                width="304" height="112">
                        </div>
                        <p class="game-block__header"><?php echo $partner['partner_information']['gametitle']; ?></p>
                        <p class="game-block__text avalon__text"><?php echo $partner['partner_information']['gametext']; ?></p>
                        <a href="<?php echo $partner['partner_information']['gamelink']; ?>"
                           class="primary-btn primary-btn--outline primary-btn--outline--hover"><?php echo $translations['findOutMore'] ?></a>
                    </div>
                    <div class="game-block__deposit type-display-flex type-flex-justify-center">
                        <p class="game-block__header"><?php echo $translations['depositOptions'] ?></p>
                        <div class="type-display-flex type-flex-justify-between">
                            <?php foreach (explode("||", $partner['partner_information']['paymentsystems']) as $system) { ?>
                                <div class="deposit-icon">
                                    <img src="/images/redesign/icons/deposits/<?php
                                    echo $system; ?>.svg" alt="<?php echo $system;
                                    ?>" width="90" height="24">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="game-block__screenshots">
                        <p class="game-block__header"><?php echo $translations['screenshots'] ?></p>
                        <ul class="clearfix">
                            <li>
                                <a href="<?php echo $partner['partner_information']['screen1link']; ?>" class="fancybox" data-fancybox-group="gallery"><img src="<?php echo $partner['partner_information']['screen1']; ?>" alt="<?php echo $partner['partner_information']['sitename']; ?> Gameplay" height="144" width="108"></a>
                            </li>
                            <li>
                                <a href="<?php echo $partner['partner_information']['screen2link']; ?>" class="fancybox" data-fancybox-group="gallery"><img src="<?php echo $partner['partner_information']['screen2']; ?>" alt="<?php echo $partner['partner_information']['sitename']; ?> Gameplay" height="144" width="108"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="game-block__platforms type-display-flex type-flex-justify-center">
                        <p class="game-block__header"><?php echo $translations['platforms'] ?></p>

                        <ul class="bullet__list type-display-flex type-flex-justify-between">
                            <?php foreach (explode("||", $partner['partner_information']['devices']) as $device) { ?>
                                <li title="<?php echo $device ?>" class="bullet__item bullet__item--null-padding"><svg class="icon mh-4" width="16" height="16" aria-hidden="true"><use xlink:href="/dist/icons/icons-device.svg#icon-<?php echo $device ?>"></use></svg></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="game-block__payout type-display-flex type-flex-justify-center">
                        <p class="game-block__header">Payout Speed</p>
                        <span class="game-block__payout-amount info-box__title info-box__title--green"><span
                              class="percent"><strong><?php echo $partner['partner_information']['payouttime']; ?></strong></span></span>
                    </div>
                    <div class="game-block__links type-display-flex type-flex-justify-center">
                        <a href="<?php echo $partner['partner_information']['affiliate_link']; ?>"
                           class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover primary-btn--border-green primary-btn--background-green primary-btn--box-shadow-green" target="_blank" rel="noreferrer noopener nofollow"><?php echo sprintf($translations['pocketUpToToday'], $partner['partner_information']['bonusvalue']) ?>
                            <div class="white__inner-circle">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </div>
                        </a>
                        <p class="type-read-more"><?php if (isset($partner['partner_information']['reviewurl'])) { ?><a
                                href="<?php echo $partner['partner_information']['reviewurl']; ?>">
                                <?php echo $translations['realMoneyGames'] ?>
                                </a><?php } ?></p>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="top__five-wrapp">
                <a href="<?php echo $partner['partner_information']['affiliate_link']; ?>"
                   class="top-five__item type-display-flex type-flex-justify-around-top" target="_blank" rel="noreferrer noopener nofollow">
                    <div class="image__holder">
                        <div class="image__holder-wrapper">
                            <img src="<?php echo $partner['partner_information']['logohome']; ?>"
                                 alt="<?php echo $partner['partner_information']['sitename']; ?>"
                                 width="161" height="116">
                        </div>
                        <button
                          class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover">
                            <?php echo $translations['playNow'] ?>
                            <div class="white__inner-circle">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </div>
                        </button>
                        <span class="type-read-more type-read-more--icon read-more__trigger js-dataTextToggle"
                              data-text-original="Read more"
                              data-text-swap="Read less">
                        <?php echo $translations['readMore'] ?>
                </span>
                    </div>

                    <div class="inner__left-side">
                        <div class="type-display-flex type-flex-justify-between" style="margin-bottom: 10px;">
                            <div class="">
                                <h2 class="title title--h2"><?php echo $partner['partner_information']['sitename']; ?></h2>
                                <div class="rating__area">
                                    <span
                                      class="rating__count"><?php echo round($partner['partner_information']['rating'] / 2, 1); ?>/5 </span>
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
                            </div>
                            <div class="">
                                <div class="custom__icon custom__icon--orange">
                                    <i class="sprite sprite-icon_spin"></i>
                                </div>
                                <div class="spin__text-holder">
                                    <span
                                      class="spin__total"><?php echo $partner['partner_information']['realmoneygames']; ?>+</span>
                                    <span class="spin__text">Slots & <br> Casino Games</span>
                                </div>
                            </div>
                        </div>
                        <div class="info-box__area type-display-flex type-flex-justify-between">
                            <div class="info-box__item">
                                <p class="info-box__title info-box__title--green"><?php echo $partner['partner_information']['bonusvalue']; ?></p>
                                <p class=""><?php echo $translations['firstDeposit'] ?></p>
                            </div>
                            <div class="info-box__item">
                                <p class="info-box__title info-box__title--blue"><?php echo $partner['partner_information']['payout']; ?></p>
                                <p><?php echo $translations['averagePayout'] ?></p>
                            </div>
                            <div class="info-box__item">
                                <p class="info-box__title info-box__title--green"><?php echo $partner['partner_information']['payouttime']; ?></p>
                                <p><?php echo $translations['payoutSpeed'] ?></p>
                            </div>
                            <div class="info-box__item">
                                <p class="info-box__title info-box__title--orange"><?php echo $partner['partner_information']['realmoneygames']; ?>
                                    +</p>
                                <p><?php echo $translations['realMoneyGames'] ?></p>
                            </div>
                            <div class="info-box__item not_mobile">
                                <p><?php echo $translations['platforms'] ?></p>
                                <ul class="bullet__list type-display-flex type-flex-justify-between">
                                    <?php foreach (explode("||", $partner['partner_information']['devices']) as $device) { ?>
                                        <li title="<?php echo $device ?>"
                                            class="bullet__item bullet__item--null-padding"><svg class="icon mh-4" width="16" height="16" aria-hidden="true"><use xlink:href="/dist/icons/icons-device.svg#icon-<?php echo $device ?>"></use></svg>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="info-box__item not_mobile">
                                <p><?php echo $translations['depositOptions'] ?></p>
                                <div class="deposit-wrapper type-display-flex type-flex-justify-center">
                                    <?php foreach (explode("||", $partner['partner_information']['paymentsystems']) as $system) { ?>
                                        <div class="deposit-icon">
                                            <img src="/images/redesign/icons/deposits/<?php
                                            echo $system; ?>.svg" alt="<?php echo $system;
                                            ?>" width="90" height="24">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="featured__game type-display-flex type-flex-justify-between">
                    <div class="col-12 col-lg-6 freeGame-block">
                        <a href="<?php echo $partner['partner_information']['gamelink']; ?>" class="featured__image-holder">
                            <div class="featured__tool-tip">
                                <?php echo $partner['partner_information']['gamestatus']; ?>
                            </div>
                            <img class="lazy"
                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 520 192'%3E%3C/svg%3E"
                                data-src="<?php echo $partner['partner_information']['gamelogo']; ?>"
                                alt="<?php echo $partner['partner_information']['gamelogoalt']; ?>"
                                width="520" height="192">
                        </a>
                        <span class="avalon__title"><?php echo $partner['partner_information']['gametitle']; ?></span>
                        <p class="avalon__text"><?php $translations['over20MillionPaidOutToWinners'] ?></p>
                        <a href="<?php echo $partner['partner_information']['gamelink']; ?>"
                           class="primary-btn primary-btn--outline primary-btn--outline--hover"><?php echo $translations['findOutMore'] ?></a>
                    </div>
                    <div class="col-12 col-lg-5">
                        <h3 class="title title--h4"><?php echo $partner['partner_information']['sitename']; ?>
                            <?php echo $translations['slotPlayerBenefits'] ?>
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
                           class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover">
                            <?php echo $translations['playGamesNow'] ?>
                            <div class="white__inner-circle">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </div>
                        </a>
                        <?php
                            if (isset($partner['partner_information']['reviewurl'])) {
                        ?>
                                <a href="<?php echo $partner['partner_information']['reviewurl']; ?>" class="type-read-more">
                                    <?php echo $pageLanguage == 'en' ? 'Read '. $partner['partner_information']['sitename'].' Review': $translations['readReview']; ?>
                                </a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php
        $row_count++;
    }
    ?>

    <!-- end loop -->
</div>

<?php
if ($isOntario) {
    if ($pageLanguage === 'fr') {
        echo '<div class="toplist__disclaimer toplist__disclaimer--right">Les conditions générales s\'appliquent à tous les bonus. Seulement 19+. Jouez de façon responsable.</div>';
    } else {
        echo '<div class="toplist__disclaimer toplist__disclaimer--right">T&amp;Cs Apply to All Bonuses. 19+ only. Play Responsibly.</div>';
    }
}
?>
