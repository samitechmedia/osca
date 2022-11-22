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

$detect = new Mobile_Detect;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/ontario-check.php';
?>

<div class="exclusive-slots">
    <?php
    foreach ($this->viewVariables['toplist']['partners'] as $partner){
    ?>

    <div class="exclusive-slots__head">
        <div class="exclusive-slots__logo">
            <img class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 170 121'%3E%3C/svg%3E" data-src="<?php echo $partner['partner_information']['logoinner']; ?>" alt="<?php echo$partner['partner_information']['sitename']; ?>" width="170" height="121">
        </div>
        <?php if (!$isOntario): ?>
            <div class="exclusive-slots__bonus">
                <p class="toplist__info-title"><?php echo $translations['firstDeposit']?></p>
                <strong class="exclusive-slots__title"><?php echo $partner['partner_information']['bonusvalue']; ?></strong>
            </div>
        <?php endif; ?>
    </div>
    <div class="exclusive-slots__inner">
        <div class="exclusive-slots__block exclusive-slots__block--full">
            <p class="toplist__info-title">Features</p>
            <ul class="bullet__list">
                <li class="bullet__item"><?php echo $translations['moreThan580GamesToPlayWithRealMoney']?></li>
                <?php if (!$isOntario) {?><li class="bullet__item"><?php echo $translations['overC1600AvailableInDepositBonuses']; ?></li><?php } ?>
                <li class="bullet__item"><?php echo $translations['playWithAndEarnRealCash']?></li>
                <li class="bullet__item"><?php echo $translations['350ThemedSlotGames']?></li>
            </ul>
        </div>
        <div class="exclusive-slots__block exclusive-slots__block--payment">
            <p class="toplist__info-title"><?php echo $translations['depositOptions']?></p>
            <div class="toplist__icon-wrapper">

                <?php foreach (explode("||", $partner['partner_information']['paymentsystems']) as $system) { ?>
                    <div class="toplist__icon toplist__column toplist__column-md-2">
                        <div class="toplist__icon-image">
                            <img class="toplist__icon-img lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 15'%3E%3C/svg%3E" data-src="/images/redesign/icons/deposits-cards/<?php
                            echo $system ?>.svg" alt="<?php echo $system
                            ?>" width="48" height="30">
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="exclusive-slots__block exclusive-slots__block--devices">
            <p class="toplist__info-title"> <?php echo $translations['platforms']?></p>
            <ul class="bullet__list bullet__list--devices type-display-flex type-flex-justify-between">
                <?php foreach (explode("||", $partner['partner_information']['devices']) as $device) { ?>
                    <li class="bullet__item bullet__item--null-padding">
                        <svg class="icon mh-4" width="16" height="16" aria-hidden="true"><use xlink:href="/dist/icons/icons-device.svg#icon-<?php echo $device ?>"></use></svg>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <a href="<?php echo $partner['partner_information']['affiliate_link']; ?>"
       class="toplist__button"
       rel="nofollow noreferrer">
        <?php echo $translations['playNow']?>
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
