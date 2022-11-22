<?php
namespace CodeLibrary\Php\Config;

/**
 *  DO NOT EDIT THIS IN GIT IN THE CODE LIBRARY REPO YOU WILL BREAK THE WORLD
 *
 * Child class to store all the site specific settings like passwords and global
 * paths so they are all set in one place
 *
 * Class Settings
 *  @package CodeLibrary\Php\Config
 */
class Settings extends SettingsAbstract
{
    public static $siteName = 'onlineslots.ca';

    // Geo System Database Details
    public static $geoDatabaseServerAddress = 'tasks.db_net_management';
    public static $geoDatabaseUsername = 'onlineslots_ca';
    public static $geoDatabasePassword = 'vUhaYtnsmfs6dJTu';
    public static $geoDatabaseName = 'onlinesl_geo';

    public static $jackpotDatabaseServerAddress = 'tasks.db_net_management';
    public static $jackpotDatabaseUsername = 'onlineslots_ca';
    public static $jackpotDatabasePassword = 'vUhaYtnsmfs6dJTu';
    public static $jackpotDatabaseName = 'onlinesl_cljackpots';

    public static $gamesDatabaseServerAddress = 'tasks.db_net_management';
    public static $gamesDatabaseUsername = 'onlineslots_ca';
    public static $gamesDatabasePassword = 'vUhaYtnsmfs6dJTu';
    public static $gamesDatabaseName = 'onlinesl_clgames_v2';

    // winner System Database Details
    public static $winnerFeedDatabaseServerAddress = 'tasks.db_net_management';
    public static $winnerFeedDatabaseUsername = 'onlineslots_ca';
    public static $winnerFeedDatabasePassword = 'vUhaYtnsmfs6dJTu';
    public static $winnerFeedDatabaseName = 'onlinesl_feeds';

    public static $gamesApiUsername = 'flyingtojapanwouldtakelong';
    public static $gamesApiPassword = 'moderntimesallowforlotsofthings';

      // analytics api
    public static $analyticsApiUsername = 'osca_analytics';
    public static $analyticsApiPassword = 'There-Is-No-place_like_home';


    public static $partnerAfflinks = array(
        'CA'=> array(
            'desktop' => '/go/jackpotcity/casino',
            'mobile' => '/go/jackpotcity/casino'
        )
    );

    /*
        public static $winnerDefaultTemplate = '/CodeLibrary/Php/Views/WinnerFeedSystem/corg/default.php';
        public static $winnerJavascriptConfigTemplate = '/CodeLibrary/Php/Views/WinnerFeedSystem/javascriptConfig.php';
        public static $winnerAjaxTemplate = '/CodeLibrary/Php/Views/WinnerFeedSystem/corg/ajaxTemplate.php';

        public static $winnerScrollParent = array(
            'jsname'=>'winnerScrollParent',
            'name' => 'feedWinnersNew-table',
            'type' => 'class'
        );
        public static $winnerScroll = array(
            'jsname'=>'winnerScroll',
            'name' => 'feedWinnersNew-row-group',
            'type' => 'class'
        );
        public static $indWinner = array(
            'jsname'=>'indWinner',
            'name' => 'feed_link_track',
            'type' => 'class'
        );
        public static $initialWinners = array(
            'jsname'=>'initialWinners',
            'name' => 'initialWinners',
            'type' => 'class'
        );
        public static $addedWinners = array(
            'jsname'=>'addedWinners',
            'name' => 'addedWinners',
            'type' => 'class'
        );
      */

    public static $gamesFilterTemplate ='/CodeLibrary/Php/Views/GamesSystem/osca/visual/visualFilter.php';
    public static $gamesDefaultTemplate ='/CodeLibrary/Php/Views/GamesSystem/osca/visual/visualDefault.php';
    public static $gamesAjaxTemplate = '/CodeLibrary/Php/Views/GamesSystem/osca/visual/visualAjaxTemplate.php';
    public static $gamesLightboxTemplate ='/CodeLibrary/Php/Views/GamesSystem/osca/visual/visualLightbox.php';
    public static $gamesLoadMoreTemplate ='/CodeLibrary/Php/Views/GamesSystem/osca/loadMore.php';
    public static $mobileRedirectLink = '/go/mobilegames/';
    public static $gamesImagePath = '/resources/free_games/uploads/';

    public static $gamesVisualJavascriptConfigTemplate ='/CodeLibrary/Php/Views/GamesSystem/osca/visual/visualJavascriptConfig.php';
    // Visual - Paginator
    public static $gamesFullPaginatorTemplate  ='/CodeLibrary/Php/Views/GamesSystem/osca/visual/visualPagination.php';
    // Visual - Mobile Orientation Notice
    public static $gamesVisualOrientationNoticeTemplate = '/CodeLibrary/Php/Views/GamesSystem/osca/visual/visualOrientationNotice.php';
    // Visual - Flash Notification
    public static $gamesVisualFlashCheckerTemplate = '/CodeLibrary/Php/Views/GamesSystem/osca/visual/visualFlashChecker.php';
    // Visual - Mobile RATING element
    public static $gamesVisualMobileFeedbackTemplate = '/CodeLibrary/Php/Views/GamesSystem/osca/visual/visualMobileGameRating.php';
    // Visual - Feedback Element
    public static $gamesVisualFeedbackElementTemplate = '/CodeLibrary/Php/Views/GamesSystem/osca/visual/visualFeedbackElement.php';
    // Visual - Feedback Response
    public static $gamesVisualFeedbackResponseTemplate = '/CodeLibrary/Php/Views/GamesSystem/osca/visual/visualFeedbackResponse.php';
    // Visual - Element/Selector/Identifiers
    public static $visualConfigPath = '/CodeLibrary/Javascript/Config/GamesSystem/osca/VisualConfig.json';
    //single game review templates
    //These are NOT yet in use on this site
    public static $gamesVisualReviewTemplate = '/CodeLibrary/Php/Views/GamesSystem/osca/defaultReviewTemplate.php';
    //public static $gamesVisualFallbackReviewTemplate = '/CodeLibrary/Php/Views/GamesSystem/osca/fallBackReviewTemplate.php';

    // Visual - titleScreen location
    public static $gamesTitleScreenImagePath = '/images/uploads/titlescreens';

    //public static $mobileRedirectLink = '';

    public static $mobileLobbyLink = array(
        'default'=>'https://www.onlineslots.ca/free'
    );

    //Corg style free games library
    public static $gamesToAdd = array(
        'jsname'=>'gamesToAdd',
        'name' => 'gamesToAdd',
        'type' => 30
    );
    public static $filterParent = array(
        'jsname'=>'filterParent',
        'name' => 'sortingOptionsBody',
        'type' => 'class'
    );
    public static $providerFilter = array(
        'jsname'=>'filterProvider',
        'name' => 'providerSort',
        'type' => 'id',
        'api' => 'providerId'
    );
    public static $gameFilter = array(
        'jsname'=>'filterGame',
        'name' => 'gameSort',
        'type' => 'id',
        'api' => 'gameTypeId'
    );
    public static $orderByFilter  = array(
        'jsname'=>'filterOrderBy',
        'name' => 'orderSort',
        'type' => 'id',
        'api' => 'orderById'
    );
    public static $parentGameContainer = array(
        'jsname'=>'parentGameContainer',
        'name'=>'free-games-container',
        'type'=>'class'
    );
    public static $indGameContainer  = array(
        'jsname'=>'indGameContainer',
        'name' => 'indGameHolder',
        'type' => 'class'
    );
    public static $filterInformationParent = array(
        'jsname'=>'filterInformationParent',
        'name'=>'filterResultBox',
        'type'=>'class'
    );
    public static $filterInformationOrderBy = array(
        'jsname'=>'filterInformationOrderBy',
        'name'=>'filterOrderBy',
        'type'=>'id'
    );
    public static $filterInformationFilters = array(
        'jsname'=>'filterInformationFilters',
        'name'=>'filterFilters',
        'type'=>'id'
    );
    public static $filterInformationCount = array(
        'jsname'=>'filterInformationCount',
        'name'=>'gameCount',
        'type'=>'id'
    );
    public static $loadMore = array(
        'jsname'=>'loadMore',
        'name'=>'load_more_games',
        'type'=>'id'
    );
    public static $closeButtonParent = array(
        'jsname'=>'closeButtonParent',
        'name'=>'gamePopupBody',
        'type'=>'class'
    );
    public static $closeButton = array(
        'jsname'=>'closeButton',
        'name'=>'closePopupBtn',
        'type'=>'class'
    );
    public static $lightbox = array(
        'jsname'=>'lightbox',
        'name'=>'gamePopupBox',
        'type'=>'class'
    );
    public static $ratingParent = array(
        'jsname'=>'ratingParent',
        'name'=>'gamePopupRateBox',
        'type'=>'class'
    );
    public static $rating = array(
        'jsname'=>'rating',
        'name'=>'userRating',
        'type'=>'class'
    );
    public static $ratingMessage = array(
        'jsname'=>'ratingMessage',
        'name'=>'gamePopupRateText',
        'type'=>'class'
    );
    public static $hrefMobileGames = array(
        'jsname'=>'mobileHref',
        'name'=>'image_box',
        'type'=>'class'
    );
    public static $pagesToShow = array(
        'jsname'=>'pagesToShow',
        'name' => 'pagesToShow',
        'type' => 5
    );
    public static $paginator = array(
        'jsname'=>'paginator',
        'name' => 'paginator',
        'type' => 'id'
    );

    // systems caching
    public static $geoCacheEnabled = true;


    // Site Protection System Database Details
    public static $siteProtectionDatabaseName = 'onlinesl_gatekeeper';
    public static $siteProtectionDatabaseServerAddress = 'tasks.db_net_management';
    public static $siteProtectionDatabaseUsername = 'onlineslots_ca';
    public static $siteProtectionDatabasePassword = 'vUhaYtnsmfs6dJTu';

    // site protection system api username and password
    public static $siteProtectionApiUsername = 'OnlineSlGateKepr';
    public static $siteProtectionApiPassword = 'HySMwv9es1Ju2Jv';

    // Bugsnag project API key
    public static $bugsnagAPIKey = '031f1be5a3cabeb6aa845df372dcdcad';

    // Unity settings

    // site information system database details
    public static $siteInformationDatabaseServerAddress = 'tasks.db_net_management';
    public static $siteInformationDatabaseName = 'onlineslots_ca_site_information';
    public static $siteInformationDatabaseUsername = 'onlineslots_ca';
    public static $siteInformationDatabasePassword = 'vUhaYtnsmfs6dJTu';

    // site information system settings
    public static $defaultPageType = 'main-vertical';
    public static $defaultLanguageType = 'en_CA';
    public static $defaultPageCategory = 'comm';

    // centralise system database details
    public static $centraliseDatabaseServerAddress = 'tasks.db_net_management';
    public static $centraliseDatabaseName =  'onlineslots_ca_centralise';
    public static $centraliseDatabaseUsername = 'onlineslots_ca';
    public static $centraliseDatabasePassword = 'vUhaYtnsmfs6dJTu';

    // centralise system path settings
    public static $centraliseViewFoldersPath = '/CodeLibrary/Php/Views/CentraliseSystem/Toplists';
    public static $centraliseDefaultViewFile = 'DefaultToplist.php';
    public static $centraliseBottomTopListViewFile = 'CTA-toplist.php';

    // site information system api username and password
    public static $siteInformationApiUsername = 'osca_site_information';
    public static $siteInformationApiPassword = 'HaveYou-seen-All_This_P4gesThere?';
    // centralise api username and password
    public static $centraliseApiUsername = 'osca_centralise';
    public static $centraliseApiPassword = 'YouSure_C4NadaIs-Not-Thecenter';

    // affliliate link system api username and password
    public static $afflinkApiUsername = 'osca_unity_afflink';
    public static $afflinkApiPassword = 'linksEverywhere_WithSome-Pennies';

    // geo system api uername and password
    public static $geoApiUsername = 'osca_geo_system';
    public static $geoApiPassword = 'TurnAround-theWorld-ofthe_300_Moose';

    // Array to store the specific of folders that should be matched with a
    // specific country/language.
    public static $partnerInformationFolderCountryMap = array();

    // We create an excluded folders array just in case.
    public static $excludedPartnersSubfolders = array();

    /** @var string Default PageVertical name */
    public static $defaultPageVertical = 'casino';

    /** @var string unity afflink entry point url base */
    public static $unityAffLinkBaseUrl = '/go';

    /** @var bool setting to control activation of UnityAfflinks to keep compatibility on old Systems */
    public static $unitAfflinksActivated = true;

    public static $trackingSystems = ['clicky' => true, 'internal' => true, 'adobe' => false];

    // Swift Mailer Credentials and configuration
    public static $mailerUser = 'noreply@onlineslots.ca';


    /**  @var string name to use when attach AA event id to the afflink entry point */
    public static $clientEventTrackingGetParameterName = 'sdid';

    // Email arrays for send AffliateLink errors
    public static $unityAffLinksErrorEmails = ['rob.humphries@itech.media', 'emilia.rynkowska@itech.media', 'keytech@legendcorp.com'];

    public static $regulatedStates = [
        'US' => ['NJ', 'WA', 'NV', 'DE', 'MD', 'LA', 'DC', 'UT', 'MT', 'KY', 'MO', 'NY', 'OR', 'VT', 'PA','WV'],
    ];

    // Array of whole regulated countries
    public static $regulatedCountries = [];

    public static $stateLevelCountries = ['US', 'CA'];

    // clicky - site information
    public static $clickyApiAddress = 'http://in.getclicky.com/in.php';

    // clicky - site id
    public static $clickyPokerSiteId = '100724316';
    public static $clickyCasinoSiteId = '100724316';
    public static $clickyDefaultSiteId = '100724316';
    public static $clickyTestingSiteId = '100724316';

    // clicky - server id
    public static $clickyPokerServerId = 'db55';
    public static $clickyCasinoServerId = 'db55';
    public static $clickyDefaultServerId = 'db55';
    public static $clickyTestingServerId = 'db55';

    // clicky - sitekey admin
    public static $clickyPokerSiteKeyId = 'b0774905bf74b5dfb7c4f0bd37bb5ab1';
    public static $clickyCasinoSiteKeyId = 'b0774905bf74b5dfb7c4f0bd37bb5ab1';
    public static $clickyDefaultSiteKeyId = 'b0774905bf74b5dfb7c4f0bd37bb5ab1';
    public static $clickyTestingSiteKeyId = 'b0774905bf74b5dfb7c4f0bd37bb5ab1';

}
