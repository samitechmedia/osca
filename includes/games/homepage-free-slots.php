<?php

// Games System Controller
$games = new \CodeLibrary\Php\Controllers\GamesSystem\GamesSystem('CA');
$homepageTemplate = '/CodeLibrary/Php/Views/GamesSystem/osca/visual/homepageVisual.php';
$games->setCustomTemplate($homepageTemplate);

// The following game references is quicker but requires knowledge of game-id,
// else use $games->filterGames(x,y,z) for gameType based [] and reduce using $games->getSliceOfGames($sortedGames, a, b);

// Get X Free-Games
$freeGamesIdArr = [882, 2874, 899, 2880, 2878, 2031, 981, 2058];
// Get X Real-Money Games
$realMoneyGamesIdArr = [2314, 2317, 915, 2318, 822, 822, 822, 822];
// Output Visual Games Config
$games->generateVisualJavascriptConfiguration();

$detect = new Mobile_Detect;
if ($detect->isMobile()) {
    $mobile = true;
}

echo '
<div class="tabs__area">
    <ul class="tabs__nav type-display-flex">
        <li class="tabs-nav__item tabs-nav__item--active">
            <a href="#tab-1">FREE Games</a>
        </li>
        <li class="tabs-nav__item">
            <a href="#tab-2">Real Money</a>
        </li>
    </ul>

    <div class="tabs__stage">
        <div id="tab-1" class="tabs__item">';
            $games->getGamesForSpecificPageByArray($freeGamesIdArr);
echo '
        </div>
        <div id="tab-2" class="tabs__item">';
            $games->getGamesForSpecificPageByArray($realMoneyGamesIdArr);
echo '
        </div>
    </div>
</div>';
