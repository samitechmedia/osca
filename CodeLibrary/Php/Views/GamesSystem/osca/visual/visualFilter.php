<?php
/**
 * Created by PhpStorm.
 * User: carlos.wylie
 * Date: 07/08/2018
 * Time: 11:00
 */
?>

<?php
    // Game Type Options
    $gameTypeOptions = '<li class="js_visualTypeFilterActionElement filter__games__item active" 
        data-filter-value="all" data-filter-type="gameType" data-information-default="All Games">All Games</li>';
    //
    foreach ($this->viewVariables['games'] as $index => $gameType) {
        $gameTypeNoSpaces = $gameTypeLabel = null;
        // Accommodate for translations - English
        if(is_string($gameType)) {
            $gameTypeLabel = $gameType;
            $gameTypeNoSpaces = str_replace(' ', '', $gameType);
        }
        // Translated Language
        else{
            $gameTypeLabel = $gameType['label'];
            $gameTypeNoSpaces = str_replace(' ', '', $gameType['filter-value']);
        }


        $opt = '<li class="filter__games__item js_visualTypeFilterActionElement" data-filter-value="' . strtolower($gameTypeNoSpaces) . '"data-filter-type="gameType">' . $gameTypeLabel . '</li>';
        $gameTypeOptions.=$opt;
    }

//    // Game Provider Options
//    $gameProviderOptions = '<li class="sort__game--item js_visualSortFilterActionElement" data-filter-value="all" data-filter-type="provider" data-information-default="All Providers">All Providers</li>';
//
//    foreach ($this->viewVariables['providers'] as $index => $provider){
//        $opt = '<li class="sort__game--item js_visualSortFilterActionElement" data-filter-type="provider" data-filter-value="'.$provider.'">'.$provider.'</li>';
//        $gameProviderOptions.=$opt;
//    }

?>

<div class="games-header">
    <h3 id="free-games" class="games-header__title" data-smooth-scroll="free-games">
        <span class="green-text type-text-uppercase">2000+ FREE</span> slot games found
    </h3>

    <div class="filter__types">
        <button id="filter" class="js_filterButton filter__types__button" data-filter="js_filterGames">
            <i class="fa fa-filter"></i>
            <span class="filter__types__button__text">Filter Games</span>
        </button>
        <button id="filterGame" class="js_filterButton filter__types__button" data-filter="js_filterSort">
            <i class="fa fa-sort" aria-hidden="true"></i>
            <span class="filter__types__button__text">Sort Games</span>
        </button>
        <button id="searchGame" class="js_filterButton filter__types__button filter__types__button--search" data-filter="js_filterSearch">
            <i class="fa fa-search" aria-hidden="true"></i>
            <span class="filter__types__button__text">Search</span>
        </button>

        <button class="js_gamesResetContainer filter__types__button">
            <i class="fa fa-close" aria-hidden="true"></i>
            <span class="js_gamesResetAll filter__types__button__text">Reset</span>
        </button>

    </div>

    <div class="filter__buttons">
        <ul class="filter__games js_filterGames js_visualTypeFilterActionsContainer">
            <?php echo $gameTypeOptions; ?>
        </ul>
        <ul class="filter__sort js_filterSort js_visualSortFilterActionsContainer">
            <li class="filter__sort__item js_visualSortFilterActionElement" value="az" data-filter-type="sortOrder" data-filter-value="az">
                <i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>A - Z
            </li>
            <li class="filter__sort__item js_visualSortFilterActionElement" value="newest" data-filter-type="sortOrder" data-filter-value="newest">
                <i class="fa fa-fire" aria-hidden="true"></i>Newest First
            </li>
            <li class="filter__sort__item js_visualSortFilterActionElement" value="highestRated" data-filter-type="sortOrder" data-filter-value="highestRated">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>Highest Rating
            </li>
            <li class="filter__sort__item js_visualSortFilterActionElement" value="mostPopular" data-filter-type="sortOrder" data-filter-value="mostPopular" data-information-default="Most Popular">
                <i class="fa fa-star" aria-hidden="true"></i>Most Popular
            </li>
        </ul>
        <form action="" class="searchForm js_visualSearchContainer">
            <input class="filter__search js_filterSearch js_visualSearchElement" type="text" placeholder="search" data-search="" data-filter-type="search">
        </form>
    </div>
</div>