<?php
    /*
     * LazyLoading.js will be requested by VisualGames.js if missing.
     * However be aware that the caching mechanism will differ on how
     * the script is server/requested.
     *
     * Serving
     *     from this file - (from memory cache)        >  ~0ms
     *     from VisualGames.js - (from disk cache)     >  ~39ms
     */

    // titleScreen folder reference
    $titlesScreensFolder = 'titlescreens/';
    // Image resource :: '/images/games_free/visual/titlescreens/';
    $imageBaseURL = substr(\CodeLibrary\Php\Config\Settings::$gamesTitleScreenImagePath, 0, -strlen($titlesScreensFolder));
?>

<script>
    /*
     * Visual Games configuration
     */
    var visualConfiguration = <?php echo json_encode($this->viewVariables)?>;
    visualConfiguration.initFlash = false;
    visualConfiguration.gameEmptyResponse = '<div class="search_noresponse">No results found</div>';

    /*
     * LazyLoading configuration
     */
    var LazyLoadingConfiguration = {
        fallback: '/images/games/visual/image_not_found.png',
        tolerance: 50,
        selector: '.js_lazyLoader',
        selectorEvent: '.js_lazyLoaderEventListener',
    };
</script>

<script>
    loadjs.ready('jquery', function() {
        loadjs('/dist/js/games/LazyLoading.min.js');
        loadjs('/dist/js/games/VisualGames.min.js');
        loadjs('/dist/js/games/VisualGamesCustom.min.js');
        loadjs('/dist/js/games/game-tabs.min.js');
    });
</script>
