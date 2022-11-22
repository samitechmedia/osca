(function (window, document, $, undefined) {

    "use strict";

    /**
     * CustomEvent Polyfill
     * @see https://developer.mozilla.org/en-US/docs/Web/API/CustomEvent/CustomEvent
     */
    (function () {
        // Ignore for correct CustomEvent implementation
        if (typeof window.CustomEvent === "function") return false;

        // Else define...
        function CustomEvent(event, params) {
            params = params || {bubbles: false, cancelable: false, detail: undefined};
            var evt = document.createEvent('CustomEvent');
            evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
            return evt;
        }

        CustomEvent.prototype = window.Event.prototype;

        window.CustomEvent = CustomEvent;
    })();


    $(document).ready(function () {
        //
        var visualFreeGames = {
            /**
             * Is Mobile flag
             */
            isMobile: false,

            /**
             * Boolean flag to identify when LightBox is in fullscreen mode
             */
            isFullscreenAPI: false,

            /**
             * Lightbox icon expand action >> font-awesome
             */
            iconLightboxExpand: 'fa-expand',

            /**
             * Lightbox icon collapse action >> font-awesome
             */
            iconLightboxCompress: 'fa-compress',

            /**
             * Orientation event listener to use,
             *  either "orientationchange" or "resize" (latter has better support)
             */
            orientationListenerName: 'resize',

            /**
             * Keeps track on whether the orientation message has been dismissed by user.
             * Prevents multiple requests to change phone orientation.
             * We do not force players to play in landscape, but note that some games may request it independently.
             *
             * @var boolean
             */
            orientationMessageDismissed: false,

            /**
             * Visual Element ID references
             *  - for reused elements
             *  - may be validated under `configurationSelectors` or `templates`
             */
            visualIds: {
                // Lightbox components (body, header, footer)
                'LB_fancyContent': '',
                'LB_fancyContentHeader': '',
                'LB_fancyContentFooter': '',
                // Lightbox <iframe>/<object> wrapper container -
                'LB_fancyIFrameContainer': '',

                // "Show" Feedback trigger
                'LB_feedbackShow': '',
                // Close Feedback trigger - template validated :: @ActionTriggerDismiss
                //'LB_feedbackCancel': '',
                // Close Orientation notice trigger - before game is loaded - template validated :: @ActionTriggerContinue
                //'LB_orientationPlayBtn': '',
                // Close Orientation notice trigger - before game is loaded - template validated :: @ActionTriggerDismiss
                // 'LB_orientationCloseBtn': '',
                // Social Interaction trigger - template validated (only under mobile)
                'LB_socialButtons': '',
                // Adobe Flash template
                'AF_instantPlay' : '',
                // :: @ActionTriggerDismiss
                //'AF_close' : '',
                // :: @ActionTriggerContinue
                //'AF_enable' : '',

                // Feedback Element template :: @ActionTriggerDismiss
                // 'FE_close' : '',
                // 'FE_back' : '',
                // :: @ActionTriggerSubmit
                // 'FE_submit' : '',

                // Visual "Other" Feedback <textarea> container >> was visualClasses.LB_feedbackContentPlaceholder
                'FE_otherFeedback': '',
            },

            /**
             * Lightbox element Class selector references.
             * Requirements;
             *  - cannot contain `.`
             *  - cannot be compound
             */
            visualClasses: {
                // Lightbox container holder - not used anywhere so to be removed...
                //'LB_holder': '',
                // Lighbox aspect ratio - 4:3 detection - used under fullscreen logic
                'LB_aspectRatio43': '',
                // Lightbox "is in" fullscreen identifier
                'LB_fancyBoxFullscreen': '',
                // Lightbox Close Btn selector
                'LB_btnCloseSelector': '',
                // Lightbox Close Btn Style update when in fullscreen - optional - used for styling
                'LB_btnCloseSelectorFullscreen': '',
                // Lightbox Resize Btn selector
                'LB_btnResizeSelector': '',
                // Lightbox Resize Btn Style update when in fullscreen - optional - used for styling
                'LB_btnResizeSelectorFullscreen': '',
                // Lightbox/Visual Hidden Element class {display:none} - used under fullscreen to hide elements
                'LB_hiddenElement': '',

                // Feedback Element > what holds data-attributes for feedback elements <a>
                'FE_options' : '',
                // Adobe Flash - remove element under initFlash = 'click'
                'AF_reduce' : '',

                // Global Class Selected - generic action (continue) ?
                'ActionTriggerContinue' : '',
                // Global Class Selected - actions dismiss (close / cancel)
                'ActionTriggerDismiss' : '',
                // Global Class Selected - action submit
                'ActionTriggerSubmit' : '',
            },

            /**
             * System element definitions
             *
             *  - name          :   Element variable reference name > what we call it
             *  - identifier    :   Element identifier > id | class name
             *  - selector      :   Element selector > #{identifier} | .{identifier}
             *  - func          :   Element creation function, defined in visualFreeGames library, else uses selector
             *  - required      :   Is required flag, prompt consequence message where condition = true & !element
             *  - consequence   :   System consequence for missing element
             *  - children      :   Child elements that should be checked for, such as those used in/by listeners
             *
             * @TODO >> MODIFY SO THAT NAMES ARE OBJECT KEYS FOR EASIER REFERENCE
             *
             * @see visualFreeGames::systemResourcesSetup();
             */
            configurationSelectors: [
                // Modal element reference (function creation)
                {
                    'name': 'modalElement',
                    'identifier': '',
                    'selector': '',
                    'func': 'createScreen',
                    'required': true,
                    'consequence': 'Will not be able to display games!'
                },
                // Loaded spinner element >> spinner rendered via css (function creation)
                {
                    'name': 'visualGamesLoader',
                    'identifier': '',
                    'selector': '',
                    'func': 'createLoader',
                    'required': true,
                    'consequence': 'A loader/spinner will not be present!'
                },

                //
                // Game Elements/Actions
                //
                // Games Main Container >>
                {
                    'name': 'mainGameContainer',
                    'identifier': '',
                    'selector': '',
                    'consequence': '',
                    'children': []
                },
                // Game Individual Container >>
                // Action trigger hard-coded to nested <a> element
                {
                    'name': 'individualGameContainer',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                {
                    'name': 'loadMoreGamesActionElement',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },

                //
                // View Elements/Actions
                //
                // View Toggle Action Container >>
                // Assess Removal >> OVER THE USE OF gridViewActionElement && listViewActionElement
                // MAKE THESE AS SPECIFIC AS POSSIBLE ex > a.freeLibGamesGridTypeButton:eq(0)
                // IF change element creation logic then keep container so can reference by selector dynamically
                //
                /*{
                    'name': 'viewToggleActionsContainer',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },*/
                // View Toggle Action Element >> View Action - Grid Games View
                {
                    'name': 'gridViewActionElement',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                // View Toggle Action Element >> View Action - List Games View
                {
                    'name': 'listViewActionElement',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                // View Toggle Action Element >> View Action - Toggle Filter View
                {
                    'name': 'filterViewActionElement',
                    'identifier': '',
                    'selector': '',
                    'consequence': 'No functionality to toggle filter collapse visibility'
                },
                // View Container/Wrapper - holds Sort/Filter Containers to hide/show
                //  - optional element
                //      - if defined will be used by hide/show action
                //      - else logic will search for;
                //          sortInformationAndResetActionsContainer & sortFilterActionsContainer
                //      - and hide them
                {
                    "name": "filterToggleViewWrapContainer",
                    "identifier": "",
                    "selector": "",
                    "consequence": ""
                },

                //
                // Filter Elements/Actions
                //
                // Sort Action Container >> Container for Sort By <element> triggers
                {
                    'name': 'sortFilterActionsContainer',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                // Sort Action Element Trigger
                {
                    'name': 'sortFilterActionElement',
                    'identifier': '',
                    'selector': '.',
                    'consequence': '',
                },
                // GameType Filter Action Container >> Container for Filter By <element> triggers
                {
                    'name': 'typeFilterActionsContainer',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                // GameType Filter Action Element Trigger
                {
                    'name': 'typeFilterActionElement',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                // Action Element Text/Label identifier - used to display current filter/sort selection
                //  - reused by all filter <elements> that need their text manipulated in any sort (get/set)
                // - for <select><option> elements do not define one so that the <option>.text() is used
                {
                    'name': 'actionElementText',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },

                // Filters >> Providers >> Provider Container
                // Children >> providerFilterActionElement.selector
                // VISUAL SPECIFIC >> OSCOM
                {
                    'name': 'providerFilterParent',
                    'identifier': '',
                    'selector': '',
                    'consequence': '',
                    'children': []
                },
                // Filters >> Providers >> Provider Container >> Container
                // Children >> providerFilterActionElement.selector
                // VISUAL SPECIFIC >> OSCOM
                // {
                //     'name': 'providerFilterLogosParent',
                //     'identifier': '',
                //     'selector': '',
                //     'consequence': ''
                // },
                // Filters >> Providers >> Provider Container >> Container >> Child/Wrapper
                // VISUAL SPECIFIC >> OSCOM
                {
                    'name': 'providerFilterActionElement',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                // Filters >> Providers >> Provider Container >> Container >> Show More
                // VISUAL SPECIFIC >> OSCOM
                {
                    'name': 'providerShowMoreButton',
                    'identifier': '',
                    'selector': '',
                    'consequence': '',
                },

                //
                // Search Elements/Actions
                //
                // Search Action Container
                {
                    'name': 'searchActionContainer',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                // Search Action Element Trigger - not currently utilised
                {
                    'name': 'searchActionElement',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                // Search Input Element
                {
                    'name': 'searchInput',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },

                //
                //  Reset Sort/Filter Elements/Actions
                //
                // Sort/Filter Reset Actions Container
                {
                    'name': 'sortInformationAndResetActionsContainer',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                // Reset All Action Element Trigger
                {
                    'name': 'resetAllSortInformationActionElement',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                // Reset Individual Action Element Trigger
                {
                    'name': 'resetSingleSortInformationActionElement',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                // Reset <element> text holder - search/replace functionality
                {
                    'name': 'sortInformationTextString',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },

                //
                // Pagination
                //
                {
                    'name': 'libraryGamesPaginationRow',
                    'identifier': '',
                    'selector': '',
                    'consequence': 'Pagination of games will not work'
                },
                {
                    'name': 'libraryGamesPaginationCenter',
                    'identifier': '',
                    'selector': '',
                    'consequence': 'Pagination of games will not work'
                },
                {
                    'name': 'prevButton',
                    'identifier': '',
                    'selector': '',
                    'consequence': 'Previous button in paginator will not work'
                },
                {
                    'name': 'nextButton',
                    'identifier': '',
                    'selector': '',
                    'consequence': 'Next button in paginator will not work'
                },
                {
                    'name': 'prevPageSetButton',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                {
                    'name': 'nextPageSetButton',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },

                // Game count / filtered results count placeholder
                {
                    'name': 'gameCountPlaceholder',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                // Lightbox ratings element - expects <ul> on which will call .children()
                {
                    'name': 'gameRatingActionContainer',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                //
                {
                    "name" : "gameRatingActionElement",
                    "identifier" : "",
                    "selector" : ""
                },
                // Lightbox ratings feedback -
                {
                    'name': 'gameRatingResponsePlaceholder',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                },
                {
                    'name': 'gameRatingCallToAction',
                    'identifier': '',
                    'selector': '',
                    'consequence': ''
                }

            ],

            /**
             * Difference to `configurationSelectors` is that are executed after dependencies have been resolved,
             * after visualFreeGames.systemConfigurationValidation() has been executed
             *  - on missing dependencies these are requested via API
             *
             * @see configurationSelectors
             * @see systemConfigurationValidation()
             */
            configurationSelectorsDependent: [
                // Orientation notice reference (function creation)
                {
                    'name': 'visualOrientationNotification',
                    'identifier': '',
                    'selector': '',
                    'func': 'orientationNoticeCreate',
                    'required': true,
                    'consequence': 'Will not display an orientation message to mobile users!'
                },
                // Feedback form
                {
                    'name': 'feedbackElement',
                    'identifier': '',
                    'selector': '',
                    'func': 'createFeedbackElement',
                    'required': true,
                    'consequence': 'Will not be able to collect feedback from user!'
                },
                // Feedback form post success
                {
                    'name': 'feedbackResponse',
                    'identifier': '',
                    'selector': '',
                    'func': 'createFeedbackElementResponse',
                    'required': true,
                    'consequence': 'Will not be able to collect feedback from user!'
                },
                // Mobile game ratings
                {
                    'name': 'mobileGameRating',
                    'identifier': '',
                    'selector': '',
                    'func': 'createMobileGameRatingElement',
                    'required': true,
                    'consequence': 'Will not be able to collect feedback from user!'
                }
            ],

            /**
             * @var Array jsConfiguration expected keys - used to validate response
             */
            jsConfigurationKeys : [
                'visualIds',
                'visualClasses',
                'configurationSelectors',
                'configurationSelectorsDependent',
                'templatesToProcess'
            ],

            /**
             * Configuration settings
             *  - debug : Development mode flag, True to show log messages in console, False by default
             *
             *  - jsConfiguration : Selector references
             *  - jsMaps : Configuration maps
             *  - jsTemplates : Element templates
             *
             *  - providersToShow : Number of providers to show - OSCOM reference
             *
             *  - filter_name : GameType filter name reference to process for preselection
             *
             *  - jsPreExecution : custom fn to execute during init() - first fn call
             *  - jsPostExecution : custom fn to execute during init() - last fn call before flashCheck (if True)
             *  - initFlash :  True > run on init, False > dont run, 'click' > run on first game click
             */
            config: {
                debug: false,
                jsConfiguration: true,
                jsMaps: null,
                jsTemplates: null,
                jsPreExecution: null,
                jsPostExecution: null,
                providersToShow: 8,
                //filter_id : null,
                filter_name: null,

                initFlash: false,
                initSocial: false,
                initLazyLoading: true,
                staticFilterCount: false,

                gameRatingResponse : 'Thanks For Your Rating!',
                gameEmptyResponse : null,

                showFeedback : true,
            },

            /**
             * @var array Configuration keys to validate/check, runs request if missing
             */
            configKeyValidation: [
                'jsConfiguration',
                'jsMaps',
                'jsTemplates'
            ],

            /**
             * Element identifiers
             */
            identifiers: {},

            /**
             * Element selectors
             */
            selectors: {},

            /**
             * Element nodes
             */
            elements: {},

            /**
             * Provider Map,
             * from visualJsMaps
             */
            providerMap: {},

            /**
             * orderBy Map,
             * from visualJsMaps
             *
             */
            orderByMap: {},

            /**
             * gameType Map,
             * from visualJsMaps
             */
            gameTypeMap: {},

            /**
             * Visual class instance reference
             */
            classInstanceDataObject: null,

            /**
             * Key access to classInstanceDataObject properties
             */
            classInstanceKeys: {
                'manualGeo': 'manualgeo',
                'mobileRedirect': 'mobileredirect',
                'newFlagCount': 'newflagcount',
                'view': 'view',
            },

            /**
             *
             */
            filterInitiators: {
                'search':'search',
                'filterReset':'filterReset',
                'filter':'filter',
                'paginator':'paginator'
            },

            /**
             * VisualGames API request URL
             */
            apiRequestUrl: '/CodeLibrary/Apis/VisualGamesSystem.php',

            /**
             * API Actions reference
             */
            apiActions: {
                'returnSingleGameInfo': 'returnSingleGameInfo',
                'returnFilteredGames': 'returnFilteredGames',
                'insertGamingTime': 'insertGamingTime',
                'insertFeedback': 'insertFeedback',
                'insertRating': 'insertRating',
                'returnJsMaps': 'returnJsMaps',
                'getTemplate': 'getTemplate',
                'getVisualJsConfig': 'getVisualJsConfig'
            },

            /**
             * Visual JS maps to process,
             * sent under $viewVariables
             */
            mapsToProcess: [
                'gameTypeMap',
                'orderByMap',
                'providerMap'
            ],

            /**
             * Dependency scripts,
             * required by VisualGames.js to work
             */
            scripts: {
                'PromisePolyfill': '/CodeLibrary/ThirdParty/Javascript/es6-promise-polyfill.js',
                'LazyLoading': '/CodeLibrary/Javascript/Components/LazyLoading/LazyLoading.js',
                'Twitter': 'https://platform.twitter.com/widgets.js'
            },

            /**
             * Game Id reference
             */
            gameId: 0,

            /**
             * Visual template selectors expected/required.
             *  ids         -   checks by presence
             *  classes     -   checks by presence
             *  selectors   -   check by element selection
             */
            templatesToProcess: {
                'flashElement': {
                    'ids': [],
                    'classes': [],
                    'selectors': []
                },
                'feedbackElement': {
                    'ids': [],
                    'classes': [],
                    'selectors': []
                },
                'feedbackResponse': {
                    'ids': [],
                    'classes': [],
                    'selectors': []
                },
                'orientationNotice': {
                    'ids': [],
                    'classes': [],
                    'selectors': []
                },
                'mobileGameRating': {
                    'ids': [],
                    'classes': [],
                    'selectors': []
                }
            },

            /**
             * @var Object Template elements obtained either from configuration, else requested
             */
            templates: {
                'flashElement': {'html': '', 'css': ''},
                'feedbackElement': {'html': '', 'css': ''},
                'feedbackResponse': {'html': '', 'css': ''},
                'orientationNotice': {'html': '', 'css': ''},
                'mobileGameRating': {'html': '', 'css': ''},
            },

            /**
             * @var Object Error message reference object
             */
            errorMessages: {
                'missingElement': "\tCould not resolve element!",
                'missingSelector': "\tMissing element selectors!",
                'missingIdentifier': "\tMissing element identifier!",
                'validateRequestedExistence': "\tCould not resolve/find Element using given selector within Parent container!",
            },

            /**
             * @var Array init() function performed actions log - prevent re-execution of completed function calls
             */
            initChecksPerformed: [],

            /**
             * @var LazyLoading script reference
             */
            LazyLoading: null,

            /**
             * @var {string} VisualGames custom event prefix
             */
            eventPrefix: 'VisualGames.',

            /**
             * @var {array} VisualGames custom event names
             */
            eventNames: {
                initialised : 'initialised',
                afterUpdateFilters: 'afterUpdateFilters',
                afterRequestGameLoad : 'afterRequestGameLoad',
                feedbackElementShow : 'onFeedbackElementShow',
                feedbackElementClose : 'onFeedbackElementClose',
                feedbackElementSubmit : 'onFeedbackElementSubmit',
                feedbackElementDismiss : 'onFeedbackElementDismiss',
                lightboxFitToScreen : 'onLightboxFitToScreen',
                lightboxFitToFullscreen : 'onLightboxFitToFullscreen',
                lightboxFitToFullscreenOnResize : 'onLightboxFitToFullscreenOnResize',
                lightboxClose : 'onLightboxClose',
                orientationNoticeClose : 'onOrientationNoticeClose',
                showLoader : 'onLoaderShow',
                hideLoader : 'onLoaderHide',
                pagination : 'onPagination'
            },

            /**
             * Initialise VisualGames.js,
             * runs the following functions to check/resolve dependencies
             *
             * Is callback function for missing checkSystemDependencies(),
             * so that when a dependency is resolved (script downloaded) system re-attempts to initialise Content
             *
             *  - setConfigurationVars          :   extend config{} properties
             *  - checkSystemDependencies       :   check for Promise & LazyLoading & Twitter
             *  - systemResourcesSetup          :   setup system resources (identifiers, selected, elements)
             *  - setClassInstanceData          :   set Visual class instance data
             *  - systemConfigurationCheck      :
             *  catch > requestMissingConfigurationVars : request from server
             *  - systemConfigurationValidation :
             *  - systemResourcesSetup          :   for dependent resources
             *  - start                         :   system start + LazyLoading.start()
             *  - checkFlashSupport             :   run Flash check
             *
             * @return {boolean|Promise}
             *  Boolean false on missing dependencies (@see checkSystemDependencies() ), else Promise()
             */
            init: function (visualConfiguration) {
                // Run Promise support check
                if (visualFreeGames.initChecksPerformed.indexOf('isPromiseSupported') === -1) {
                    // Only run once...
                    visualFreeGames.initChecksPerformed.push('isPromiseSupported');
                    // Check for Promise() support first! - makeApiRequest is Promise() dependent
                    if (visualFreeGames.isPromiseSupported(visualFreeGames.init, visualConfiguration) === false) {
                        // Stop execution, reinitialised on script download
                        return false;
                    }
                }

                // Set/process user defined configuration... if provided
                if (visualConfiguration && visualFreeGames.initChecksPerformed.indexOf('setConfigurationVars') === -1) {
                    // Only run once...
                    visualFreeGames.initChecksPerformed.push('setConfigurationVars');
                    // - debug, jsSelectors, jsMaps, jsTemplates..
                    if (visualFreeGames.setConfigurationVars(visualConfiguration) === true) {
                        // terminate execution while configuration is initialised,
                        // selectors may be requested over ajax
                        return false;
                    }
                }

                // Resolve any script/library dependencies
                //  - LazyLoading, Social (Twitter),
                if (visualFreeGames.initChecksPerformed.indexOf('checkSystemDependencies') === -1) {
                    // Only run once...
                    visualFreeGames.initChecksPerformed.push('checkSystemDependencies');
                    if (visualFreeGames.checkSystemDependencies(visualConfiguration) === false) {
                        // Stop execution on missing dependency - which will be auto-resumed/callback
                        return false;
                    }
                }

                try {
                    if (visualFreeGames.initChecksPerformed.indexOf('systemResourcesSetup.configurationSelectors') === -1) {
                        // Only run once...
                        visualFreeGames.initChecksPerformed.push('systemResourcesSetup.configurationSelectors');
                        // Setup system resources
                        //  - identifiers, selected, elements for base/core components
                        visualFreeGames.systemResourcesSetup(visualFreeGames.configurationSelectors);
                    }
                }
                catch (error) {
                    // Critical failure
                    console.error(error);
                    return false;
                }
                // Set Visual class instance data
                //  - need to execute BEFORE any API request
                if (visualFreeGames.initChecksPerformed.indexOf('setClassInstanceData') === -1) {
                    // Only run once...
                    visualFreeGames.initChecksPerformed.push('setClassInstanceData');
                    visualFreeGames.setClassInstanceData();
                }

                // Check configuration components - templates - Rejects request for "default" templates
                visualFreeGames.systemConfigurationCheck()
                // Validate configuration variable selectors - templates - throws Error
                    .then(visualFreeGames.systemConfigurationValidation)
                    // Setup, initialise Content and start...
                    .then(function (e) {
                        // Setup system dependent resources - requires templates
                        visualFreeGames.systemResourcesSetup(visualFreeGames.configurationSelectorsDependent);
                        //
                        visualFreeGames
                        // start systems - setup listeners
                            .start()
                            // post start operations...
                            .then(function () {
                                // get reference to functions want to call
                                var callbacksToMake = visualFreeGames.getPostExecutionFunctions();
                                // validate have calls to make
                                if (callbacksToMake.length !== 0) {
                                    // make all the calls
                                    visualFreeGames.startPostExecution(callbacksToMake);
                                }

                                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.initialised);

                                // LazyLoading - as Promise
                                visualFreeGames.LazyLoading
                                // start - true = Promise
                                    .start(true)
                                    // run on game container, using selector
                                    .then(function () {
                                        // validate whether to trigger LazyLoading event
                                        if (visualFreeGames.config.initLazyLoading === true) {
                                            // Individual Game Selector
                                            var gameSelector = visualFreeGames.getResourceSelector('individualGameContainer');
                                            // Register class with LazyLoading.dispatchEventLoad()
                                            visualFreeGames.LazyLoading.addElementsLoadOnEvent(gameSelector, true);
                                        }
                                    });
                            });
                    })
                    // - Reject() condition, missing properties...
                    // - Error for invalid configuration/Template selectors
                    .catch(function (configurationError) {
                        //
                        visualFreeGames.console(true, 'systemConfigurationCheck', '\tMissing variables/invalid setup\n\t>>', configurationError);
                        // Error - user provided wrong data
                        if (configurationError instanceof Error) {
                            // How far do I go with validating/notifying/auto-correcting ...
                            // This means template is missing required selectors
                            console.error(Error);
                            return false;
                        }
                        else {
                            // Request missing configuration
                            //  - configurationError is array of missing components
                            visualFreeGames.requestMissingConfigurationVars(configurationError);
                        }
                    });
            },

            /**
             * Process user configuration object,
             * for known properties overwrite with provided
             *
             * @param configExtend
             * @return {boolean} True if running AJAX request, else False
             */
            setConfigurationVars: function (configExtend) {
                var progressMessage = '\tStart...';
                // Identify if executing server request
                //  - if true init() will stop execution and expect callback to init() post Promise().then()
                var runningRequest = false;
                // Process only known configuration properties
                for (var prop in visualFreeGames.config) {
                    // extend property value if one has been set
                    if (configExtend.hasOwnProperty(prop)) {
                        // set/override configuration prop
                        visualFreeGames.config[prop] = configExtend[prop];
                    }

                    // process configuration
                    switch (prop) {
                        // Need to set these first hand...
                        case 'jsConfiguration':
                            // if configuration is provided > validate+apply
                            if(typeof visualFreeGames.config[prop] === 'object'){
                                visualFreeGames.setJsConfiguration(visualFreeGames.config[prop]);
                            }
                            // else request via API request
                            else{
                                // flag - update return status
                                runningRequest = true;
                                // Request as Promise...
                                visualFreeGames.requestJavascriptConfigVars()
                                    .then(
                                        function (json) {
                                            // Override from Boolean to Response
                                            visualFreeGames.config.jsConfiguration = json.jsConfiguration;
                                            // Update Configuration Selectors
                                            visualFreeGames.setJsConfiguration(json.jsConfiguration);
                                            // Callback() to continue setup/execution once selectors have been requested
                                            visualFreeGames.init();
                                        }
                                    );
                            }
                            break;

                        default:
                            break;
                    }
                }
                // update progress message
                progressMessage += '\n\tDone!';
                // log
                visualFreeGames.console(false, "setConfigurationVars", progressMessage, configExtend);
                // return whether request is running
                return runningRequest;
            },

            /**
             * Request missing data from server,
             * Promise.all()
             *
             * @param missingConfigurationData
             */
            requestMissingConfigurationVars: function (missingConfigurationData) {
                // All Promises that will be requested
                var allPromise = [];
                // Process missing configuration
                for (var key in missingConfigurationData) {
                    // Missing configuration property to request
                    var configProp = missingConfigurationData[key];
                    // Identify...
                    switch (configProp) {
                        case 'jsConfiguration':
                            allPromise.push(
                                visualFreeGames.requestJavascriptConfigVars()
                            )
                            break;

                        case 'jsMaps':
                            allPromise.push(
                                visualFreeGames.makeApiRequestForJsMaps()
                                    .then(function (maps) {
                                        // Return as expected by configuration var
                                        return {'jsMaps': maps};
                                    })
                            );
                            break;

                        case 'jsTemplates':
                            allPromise.push(
                                visualFreeGames.makeApiRequestForTemplate()
                                    .then(function (templates) {
                                        // Return as expected by configuration var
                                        return {'jsTemplates': templates};
                                    })
                            );
                            break;
                    }
                }

                // Promise.all() requests...
                Promise.all(
                    allPromise
                )
                    .then(function (ajaxResponse) {
                        visualFreeGames.console(false, "requestMissingConfigurationVars", "\tPromise.all() response",
                            {'response' : ajaxResponse});
                        // Process the response
                        for (var i = 0; i < ajaxResponse.length; i++) {
                            // Set configuration
                            visualFreeGames.setConfigurationVars(ajaxResponse[i]);
                        }

                        // Re-run init() with updated configuration variables
                        visualFreeGames.init();
                    })
                    .catch(function (err) {
                        visualFreeGames.console(true, "requestMissingConfigurationVars", "\tPromise.all() error",
                            {'err': err});
                    });
            },

            /**
             * Request custom javascript configuration,
             * Promise
             */
            requestJavascriptConfigVars: function () {
                return visualFreeGames
                    .makeApiRequestForJavascriptConfiguration()
                    .then(function (jsConfig) {
                        visualFreeGames.console(false, "requestJavascriptConfigVars", "\tmakeApiRequestForJavascriptConfiguration", jsConfig);
                        // Return as expected by configuration var
                        return {'jsConfiguration': jsConfig};
                    });
            },

            /**
             * Start VisualGames.js, set listeners
             * as a Promise()
             *
             * @return {Object} Promise
             */
            start: function () {
                var progressMessage = '\t...';
                // Return Promise()
                return new Promise(function (resolve, reject) {
                    // Initialise Listeners
                    //
                    // Mobile Show Filters
                    visualFreeGames.listenForShowFilterToggle();
                    // Filter change
                    visualFreeGames.listenForFilterChange_gameSort();
                    visualFreeGames.listenForFilterChange_gameTypes();
                    visualFreeGames.listenForFilterChange_gameProviders();
                    //
                    visualFreeGames.listenForFilterReset();
                    // View change
                    visualFreeGames.listenForGridOrListViewChange();
                    // Search
                    visualFreeGames.listenForSearchQuery();
                    // Pagination action
                    visualFreeGames.listenForPaginatorClick();
                    //load more click
                    visualFreeGames.listenForLoadMoreClick();
                    // Game click
                    visualFreeGames.listenForSingleGameClick();
                    // Show/hide providers - event used varies for Desktop/Mobile
                    visualFreeGames.listenForProviderVisibility();

                    // Under Mobile hide filters by default
                    visualFreeGames.initFilterViewMode();

                    visualFreeGames.console(false, 'Start()', progressMessage + '\n\tDone!');
                    // Resolve...
                    resolve(true);
                });
            },

            /**
             * Identify and collect function name references to be run post Visual execution
             * @return {Array} Function name references to call
             */
            getPostExecutionFunctions: function () {
                // Function references to call() - in order of execution
                var callbacksToMake = [];

                // Must happen before any other callback in case these are dependent
                // - example, manualFilterSetup triggers a $.on('change') event on <select>
                if (typeof visualFreeGames.config.jsPreExecution === 'function') {
                    // Override internal placeholder for the function
                    visualFreeGames.jsPreExecution = visualFreeGames.config.jsPreExecution;
                    callbacksToMake.push('jsPreExecution');
                }

                // Need to run a check on whether <select> elements are used,
                // if true need to check that data-information-default <option> is set...
                callbacksToMake.push('initFilterCheck');

                // Filter Init - set visual filter to this value
                if (typeof visualFreeGames.config.filter_name === 'string') {
                    callbacksToMake.push('manualFilterSetup');
                }

                // Initialise filter object -
                callbacksToMake.push('initFilterObject');

                // Final custom execution script
                if (typeof visualFreeGames.config.jsPostExecution === 'function') {
                    // Override internal placeholder for the function
                    visualFreeGames.jsPostExecution = visualFreeGames.config.jsPostExecution;
                    callbacksToMake.push('jsPostExecution');
                }

                // Flash Init - if True add so is checked, else run on game click
                if (visualFreeGames.config.initFlash === true) {
                    callbacksToMake.push('checkFlashSupport');
                }

                /*
                 * Static Filter Count Check - if True, show static game count in filter on first load and
                 * when returning to first state filter
                 */
                if(Number.isInteger(visualFreeGames.config.staticFilterCount)) {
                    callbacksToMake.push('initStaticFilterCount');
                }

                return callbacksToMake;
            },

            /**
             * Execute VisualGames post system start() actions/functions.
             * Function reference to execute will be validated as typeof 'function'
             *
             * @param {array} callbacks Function name references to execute
             */
            startPostExecution: function (callbacks) {
                visualFreeGames.console(false, 'startPostExecution', '\tcallbacksToMake', callbacks);
                // validate callbacks..
                if (callbacks && callbacks.length > 0) {
                    // for each callback reference
                    for (var i = 0; i < callbacks.length; i++) {
                        // validate is a function
                        if (typeof visualFreeGames[callbacks[i]] === 'function') {
                            // execute...
                            visualFreeGames[callbacks[i]]();
                        }
                    }
                }
            },

            /**
             * Function reference for config.jsPreExecution
             *  - override from config and called via name reference
             *  - first function to execute after visualFreeGames.start()
             *
             * @see getPostExecutionFunctions
             * @see startPostExecution
             */
            jsPreExecution: function () {
            },

            /**
             * Function reference for config.jsPostExecution
             *  - override from config and called via name reference
             *  - last dependency js to be called (after all post setups, before visual notification i.e. flashChecker)
             *
             * @see getPostExecutionFunctions
             * @see startPostExecution
             */
            jsPostExecution: function () {
            },

            /**
             * Run filter element check to ensure that the default filter has the class 'active' assigned to it,
             * which is conditional requirement under resetFilters - else triggers request for reset
             *
             * Furthermore, if the filter element is of type <option> check that the <select> element selectedIndex
             * matches that of the <option>, else assign
             *
             * This action WILL NOT / SHOULD NOT trigger any actions
             *
             * @return {boolean}
             */
            initFilterCheck: function () {
                // Filter Container
                var typeFilterActionsContainer = visualFreeGames.getResourceElement('sortFilterActionsContainer');
                // Action Trigger Selector
                var typeFilterActionElementSelector = visualFreeGames.getResourceSelector('sortFilterActionElement');
                // Search for Element
                var elementToUse = visualFreeGames.validateRequestedExistence(typeFilterActionsContainer, typeFilterActionElementSelector);
                // Validate existence
                if (elementToUse === false) {
                    // Return message
                    visualFreeGames.console(true, "initFilterCheck",
                        visualFreeGames.errorMessages.validateRequestedExistence,
                        {
                            'typeFilterActionsContainer': typeFilterActionsContainer,
                            'typeFilterActionElementSelector': typeFilterActionElementSelector,
                        }
                    );
                    return false;
                }
                // Validation Success...
                //
                // Search for Element to be "clicked" - based on data attribute
                var optionElement = elementToUse.filter(function () {
                    return this.hasAttribute("data-information-default");
                });

                if (optionElement.length !== 0) {
                    // if no 'active' class set so reset action is accurate - no active class triggers reset
                    if (optionElement.hasClass('active') === false) {
                        optionElement.addClass('active');
                    }
                    // if element is an <option> then set the <select>.selectedIndex value to it, if not already set
                    if (visualFreeGames.getResourceElementNodeName(optionElement, true) === 'option') {
                        // to pure js
                        optionElement = optionElement[0];
                        // if <select> selected index is not same as default <option> set it
                        if (optionElement.parentElement.selectedIndex !== optionElement.index) {
                            optionElement.parentElement.selectedIndex = optionElement.index;
                        }
                    }
                }
            },

            /**
             * Toggle UI selected filters & labels
             * @todo WILL NEED TO EXTEND SO CAN SET OTHER FILTERS, CURRENTLY ONLY WORKS FOR GAME TYPES
             *
             * @requires data-attribute : filter-value
             * @return {boolean} True on success, else false
             */
            manualFilterSetup: function () {
                // As these grow will think of a better/tidier way to run...
                if (visualFreeGames.config.filter_name) {
                    // Filter Container
                    var typeFilterActionsContainer = visualFreeGames.getResourceElement('typeFilterActionsContainer');
                    // Action Trigger Selector
                    var typeFilterActionElementSelector = visualFreeGames.getResourceSelector('typeFilterActionElement');
                    // Validate / Search for Element
                    var elementToUse = visualFreeGames.validateRequestedExistence(typeFilterActionsContainer, typeFilterActionElementSelector);
                    // Validate existence
                    if (elementToUse === false) {
                        // Return message
                        visualFreeGames.console(true, "manualFilterSetup",
                            visualFreeGames.errorMessages.validateRequestedExistence,
                            {
                                'typeFilterActionsContainer': typeFilterActionsContainer,
                                'typeFilterActionElementSelector': typeFilterActionElementSelector,
                            }
                        );
                        return false;
                    }
                    // Validation Success...
                    //
                    // Search for Element to be "clicked" - based on data attribute
                    var anchor = elementToUse.filter(function () {
                        return $(this).data("filter-value") === visualFreeGames.config.filter_name;
                    });

                    // Validate element - could have multiple
                    if (anchor.length === 0) {
                        // Return message
                        visualFreeGames.console(true, "manualFilterSetup",
                            visualFreeGames.errorMessages.missingElement,
                            {
                                'typeFilterActionsContainer': typeFilterActionsContainer,
                                'typeFilterActionElementSelector': typeFilterActionElementSelector,
                            }
                        );
                        return false;
                    }

                    // Change/emulate filter click - emulate returns Promise()
                    visualFreeGames.emulateFilterEventsFromClick(anchor, typeFilterActionsContainer);

                    // manipulate <select>, remove all <option>s but, disable element
                    if (visualFreeGames.getResourceElementNodeName(anchor) === 'OPTION') {
                        // length reference
                        var len = anchor.length;
                        // cycle over elements, update information-default reference
                        for (var i = 0; i < len; i++) {
                            // element reference
                            var optionElement = anchor[i];
                            // update data attribute - value here is 'name'
                            optionElement.setAttribute('data-information-default', optionElement.value);
                            // mark element as active
                            optionElement.classList.add('active');
                            // jQuery <element> reference
                            var selectParent = $(optionElement.parentElement);
                            // update <select> option value
                            selectParent[0].selectedIndex = optionElement.index;
                            // check for one-off fn call - run before disabling the <select>
                            if (selectParent[0].hasAttribute('data-fn-call') === true) {
                                if (window[selectParent[0].getAttribute('data-fn-call')]) {
                                    // call
                                    window[selectParent[0].getAttribute('data-fn-call')](optionElement.parentElement);
                                    // delete from window
                                    delete window[selectParent.attr('data-fn-call')]
                                    // remove reference
                                    selectParent[0].removeAttribute('data-fn-call');
                                }
                            }

                            selectParent
                            // find all <option> elements except that selected and remove
                                .find('option:not([data-filter-value="' + visualFreeGames.config.filter_name + '"])').remove()
                            // Back to <select> element, and disable - only contains ONE <option>
                                .end().prop('disabled', true);

                            // reset element select
                            var selector = visualFreeGames.getResourceSelector('resetSingleSortInformationActionElement');
                            // validate
                            if (selector !== false) {
                                var label = selectParent.parent().find(selector);
                                // validate
                                if (label.length !== 0) {
                                    // update the default value
                                    label[0].setAttribute('data-information-default', optionElement.value);
                                }
                            }
                        }
                    }

                    visualFreeGames.console(false, "manualFilterSetup", '\tDone!');
                    // Return success
                    return true;
                }
            },

            /**
             * Initialise Static Filter Count
             * Sets the count in the H1 and the filter and handles returning count
             * to set number when initial filter state is resumed.
             *
             * @param (int)
             * @return {boolean}
             */
            initStaticFilterCount: function () {
                var countSelector = visualFreeGames.getResourceSelector('gameCountPlaceholder'),
                    staticCount = visualFreeGames.config.staticFilterCount;

                $(countSelector).html(staticCount);
            },

            /**
             * Initialise Filter Object,
             * as a means to reset previous search/filter conditions
             *
             * @return {boolean}
             */
            initFilterObject: function () {
                // Container / trigger elements to check / process by name reference
                var process = [
                    {'container': 'typeFilterActionsContainer', 'element': 'typeFilterActionElement'},
                    {'container': 'sortFilterActionsContainer', 'element': 'sortFilterActionElement'},
                    {'container': 'providerFilterParent', 'element': 'providerFilterActionElement'},
                    {'container': 'searchActionContainer', 'element': 'searchInput'}
                ];
                // length ref
                var toProcess = process.length;
                // cycle through...
                for (var p = 0; p < toProcess; p++) {
                    // Object reference
                    var obj = process[p];
                    // Validate existence - not all systems will have search
                    var triggerElements = visualFreeGames.validateRequestedExistence(
                        visualFreeGames.getResourceElement(obj.container),
                        visualFreeGames.getResourceSelector(obj.element)
                    );
                    // If valid
                    if (triggerElements !== false) {
                        // trigger elements length
                        var len = triggerElements.length;
                        // cycle over
                        for (var t = 0; t < len; t++) {
                            // find default element
                            if (triggerElements[t].hasAttribute('data-information-default')) {
                                // get default data
                                var selectedFilterData = $(triggerElements[t]).data();
                                // update
                                visualFreeGames.filterState.setFilterObject(selectedFilterData);
                                // return - default has been processed
                                break;
                            }
                        }
                    }
                }

                // Update number of elements to return on pagination
                var paginationContainer = visualFreeGames.getResourceElement('libraryGamesPaginationRow');
                // validate element
                if(paginationContainer !== false){
                    if(paginationContainer[0].hasAttribute('data-next-slice') === true){
                        visualFreeGames.filterState.setNumberOfItemsToInclude(
                            paginationContainer[0].getAttribute('data-next-slice')
                        );
                    }
                }

                // debug message
                visualFreeGames.console(false, "initFilterObject", '\tvisualFreeGames.filterState.getFilterObject()',
                    {'visualFreeGames.filterState.getFilterObject()': visualFreeGames.filterState.getFilterObject()}
                );
            },

            //game filtering and display methods

            /**
             * This function establishes a listener for changes of the top filter
             * @return {boolean} True on success, else false
             */
            listenForFilterChange_gameSort: function () {
                // Top Filter row of sort/filter buttons
                var sortFilterActionsContainer = visualFreeGames.getResourceElement('sortFilterActionsContainer');
                // Action Button/Element selector
                var sortFilterActionElement = visualFreeGames.getResourceSelector('sortFilterActionElement');
                // Search for Element
                var triggerElement = visualFreeGames.validateRequestedExistence(sortFilterActionsContainer, sortFilterActionElement);
                // Validate existence
                if (triggerElement === false) {
                    // Return message
                    visualFreeGames.console(true, "listenForFilterChange_gameSort",
                        visualFreeGames.errorMessages.validateRequestedExistence,
                        {
                            'sortFilterActionsContainer': sortFilterActionsContainer,
                            'sortFilterActionElement': sortFilterActionElement,
                        }
                    );
                    return false;
                }

                // Event listener params
                var eventParams = visualFreeGames.getListenerParams(sortFilterActionsContainer, triggerElement);
                // Attach Listener
                eventParams.eventElement.on(
                    eventParams.eventType,
                    {filterParent: sortFilterActionsContainer},
                    visualFreeGames.handleFilterEventsFromClick
                );
                // Return success
                return true;
            },

            /**
             * This function establishes a listener for changes of the provider filter
             * @return {boolean} True on success, else false
             */
            listenForFilterChange_gameProviders: function () {
                // Provider Container
                var providerFilterParent = visualFreeGames.getResourceElement('providerFilterParent');
                // Provider Element Selector
                var providerDropdownLogosSelector = visualFreeGames.getResourceSelector('providerFilterActionElement');
                // Search for Element
                var triggerElement = visualFreeGames.validateRequestedExistence(
                    providerFilterParent,
                    providerDropdownLogosSelector
                );
                // Validate existence
                if (triggerElement === false) {
                    // Return message
                    visualFreeGames.console(true, "listenForFilterChange_gameProviders",
                        visualFreeGames.errorMessages.validateRequestedExistence,
                        {
                            'providerFilterParent': providerFilterParent,
                            'providerDropdownLogosSelector': providerDropdownLogosSelector,
                        }
                    );
                    return false;
                }

                // Event listener params
                var eventParams = visualFreeGames.getListenerParams(providerFilterParent, triggerElement);
                // Attach Listener
                eventParams.eventElement.on(
                    eventParams.eventType,
                    {filterParent: providerFilterParent},
                    visualFreeGames.handleFilterEventsFromClick
                );
                // Return success
                return true;
            },

            /**
             * Toggle `Software Provider` dropdown visibility via css class
             * Event used will depend on whether device is Desktop or Mobile
             * @todo REVIEW VALIDATION
             */
            listenForProviderVisibility: function () {
                // Provider drop-down element
                var providerFilterParent = visualFreeGames.getResourceElement('providerFilterParent');
                // Software Providers menu button - show available Providers
                var providerButton = visualFreeGames.getResourceElement('sortFilterActionElement');
                // Show more Providers button - loads more action
                var showMoreProvidersButtonSelector = visualFreeGames.getResourceSelector('providerShowMoreButton');
                // Validate Requirements
                if (!providerFilterParent || !providerButton || !showMoreProvidersButtonSelector) {
                    visualFreeGames.console(true, 'listenForProviderVisibility',
                        visualFreeGames.errorMessages.missingSelector,
                        {
                            'providerFilterParent': providerFilterParent,
                            'providerButton': providerButton,
                            'showMoreProvidersButtonSelector': showMoreProvidersButtonSelector,
                        }
                    );
                    return false;
                }
                // Provider elements - logos
                var providerElements = visualFreeGames.getAvailableProviders(providerFilterParent);
                // Event trigger to show Provider menu - Mobile / Desktop
                //  - this may need some fine-tuning if get flickering - add / remove listener
                var eventName = visualFreeGames.isMobile ? 'click' : 'mouseenter mouseleave';
                // Attach listener -
                providerButton
                    .on(
                        eventName,
                        function (e) {
                            // Event Name fired
                            var eventFired = e.type;
                            // Trigger Button
                            var button = $(this);
                            // Visibility .class used
                            var visibilityClass = 'dropdown-open';
                            // Is element currently visible
                            var isVisible = button.hasClass(visibilityClass);

                            switch (eventFired) {
                                case 'mouseleave':
                                    // Hide Provider menu
                                    if (isVisible) {
                                        button.removeClass(visibilityClass);
                                    }

                                    // Hide expanded Providers -
                                    visualFreeGames.toggleProvidersInView(false, providerElements);
                                    break;

                                case 'mouseenter':
                                    // Show providers
                                    if (isVisible === false) {
                                        button.addClass(visibilityClass);
                                    }
                                    break;

                                case 'click':
                                    // Providers - hide if previously were showing
                                    if (isVisible === true) {
                                        // Hide expanded Providers - on hide of menu
                                        visualFreeGames.toggleProvidersInView(false, providerElements);
                                    }

                                    // Toggle visibility...
                                    visualFreeGames.toggleSingleActiveState(visibilityClass, button);
                                    break;

                                default:
                                    visualFreeGames.console(true, 'listenForProviderVisibility', '\tUnknown event', eventFired);
                                    break;
                            }
                        })
                    // Show more Providers action - on nested element/button
                    .on(
                        'click',
                        showMoreProvidersButtonSelector,
                        function () {
                            visualFreeGames.toggleProvidersInView(true, providerElements);
                        }
                    );

                // Initialise Provider action...
                visualFreeGames.initProvidersToShow();
            },

            /**
             *
             * @param providerElement Container element to search for Provider Elements
             * @return {array|boolean} Array of Provider Elements on success, else Boolean false
             */
            getAvailableProviders: function (providerElement) {
                // Container for Providers
                var providerElementSelector = visualFreeGames.getResourceSelector('providerFilterActionElement');
                // Search for Element
                var providerElements = visualFreeGames.validateRequestedExistence(providerElement, providerElementSelector);
                // Validate existence
                if (providerElements === false) {
                    // Return message
                    visualFreeGames.console(true, "getAvailableProviders",
                        visualFreeGames.errorMessages.validateRequestedExistence,
                        {
                            'providerElement': providerElement,
                            'providerElementSelector': providerElementSelector,
                        }
                    );
                    return false;
                }

                // Return Providers, or false
                return providerElements.length !== 0 ? providerElements : false;
            },

            /**
             * Initialise logic for "Show more providers"
             * Run check if functionality is required (more than 8 Providers) visible,
             * else modify UI to not show functionality <button>
             *
             * @see uiProvidersButtonToggleVisible
             * @return {boolean} True on success, else False
             */
            initProvidersToShow: function () {
                // Provider Container
                var providerFilterParent = visualFreeGames.getResourceElement('providerFilterParent');
                // Validate Element
                if (providerFilterParent === false) {
                    visualFreeGames.console(true, "initProvidersToShow",
                        visualFreeGames.errorMessages.missingSelector,
                        {
                            'providerFilterParent': providerFilterParent,
                        }
                    );
                    return false;
                }

                // Provider elements -
                var providerElements = visualFreeGames.getAvailableProviders(providerFilterParent);

                // Validate...
                if (providerElements !== false) {
                    // Store HTML Element reference - from template view
                    visualFreeGames.ui = {'providerButton': ''}
                    // Check for hidden Providers
                    var hiddenElements = providerElements.filter('.inactive');
                    // If other are hidden...
                    if (hiddenElements.length === 0) {
                        // Update UI ... hide `Show more`
                        visualFreeGames.uiProvidersButtonToggleVisible(false);
                    }
                    return true;
                }

            },

            /**
             * Modify UI HTML/Element to represent "show" Provider functionality
             * @param hasMore Boolean if has more Providers to show
             * @return {boolean} True on success, else False
             */
            uiProvidersButtonToggleVisible: function (hasMore) {
                // Provider Container
                var providerFilterParent = visualFreeGames.getResourceElement('providerFilterParent');
                // Provider Element - show more
                var providerShowMoreSelector = visualFreeGames.getResourceSelector('providerShowMoreButton');
                // Search for Element
                var buttonElement = visualFreeGames.validateRequestedExistence(providerFilterParent, providerShowMoreSelector);
                // Validate existence
                if (buttonElement === false) {
                    // Return message
                    visualFreeGames.console(true, "uiProvidersButtonToggleVisible",
                        visualFreeGames.errorMessages.validateRequestedExistence,
                        {
                            'providerFilterParent': providerFilterParent,
                            'providerShowMoreSelector': providerShowMoreSelector,
                        }
                    );
                    return false;
                }

                // Run once - store Button HTML content - so can reset to
                if (visualFreeGames.hasOwnProperty('ui')) {
                    if (visualFreeGames.ui.hasOwnProperty('providerButton') && visualFreeGames.ui['providerButton'].length === 0) {
                        visualFreeGames.ui.providerButton = buttonElement.html();
                    }
                }

                // has hidden Providers
                if (hasMore === true) {
                    // Show as default button
                    buttonElement.html(visualFreeGames.ui.providerButton);
                }
                else {
                    // Update HTML
                    buttonElement.html('Available Providers');
                }
                // Return success
                return true;
            },

            /**
             * Show hidden providers function,
             * gets all providers elements and removes '.inactive' class from element that have it
             *
             * Important! Function logic relies on use of
             *  - class : active
             *  - class : inactive
             *  - attribute : data-filter-available
             */
            toggleProvidersInView: function (show, providerElements) {

                if (show === true) {
                    // Show ALL Providers that are `.inactive`, ignoring those that are not available
                    var toShow = providerElements.filter('.inactive').not('[data-filter-available="false"]');

                    //providerElements.filter('.inactive').each(function (index, node) {
                    toShow.each(function (index, node) {
                        node.classList.remove('inactive');
                    });

                    // Check whether have hidden providers
                    var hasMore = toShow > visualFreeGames.config.providersToShow ? true : false;
                    // Update UI Button respectively
                    visualFreeGames.uiProvidersButtonToggleVisible(hasMore);

                }
                else {
                    // Hide all but first matching `visualFreeGames.config.providersToShow` elements
                    var toUse = providerElements.not('[data-filter-available="false"]');

                    // Want to exclude these
                    var activeProvider = toUse.filter('.active');
                    // Want to hide these
                    var providersToHide = toUse.not('.active');
                    // Need to hide anything over 8th element
                    var runCycle = providersToHide.length > visualFreeGames.config.providersToShow ? true : false;
                    // Validate if anything needs hiding...
                    if (runCycle === true) {
                        // Start position for elements that need hiding
                        var start = visualFreeGames.config.providersToShow - activeProvider.length;
                        // How many need to be hidden
                        var len = providersToHide.length;

                        // Due to logic, some elements may need reinstating first
                        // - clicked +8 Provider
                        //      > is in view, so some Provider < 8 was hidden)
                        // - then click Provider < 8
                        //      > as 8th is already hidden need to remove `inactive` class first, else only show 7
                        toUse.filter('.inactive').each(function (index, node) {
                            node.classList.remove('inactive');
                        });

                        // Cycle over and hide providers
                        for (var i = start; i < len; i++) {
                            providersToHide[i].classList.add('inactive');
                        }
                    }
                    // Update UI Button respectively
                    visualFreeGames.uiProvidersButtonToggleVisible(runCycle);
                }
            },

            /**
             * This function establishes a listener for changes of the side filter
             * @return {boolean} True on success, else False
             */
            listenForFilterChange_gameTypes: function () {
                // Game Type Filter Container
                var typeFilterActionsContainer = visualFreeGames.getResourceElement('typeFilterActionsContainer');
                // Game Type Filter Element Selector
                var typeFilterActionElementSelector = visualFreeGames.getResourceSelector('typeFilterActionElement');
                // Validate nested element
                var triggerElement = visualFreeGames.validateRequestedExistence(
                    typeFilterActionsContainer,
                    typeFilterActionElementSelector
                );
                // Validate element existence
                if (triggerElement === false) {
                    visualFreeGames.console(true, "listenForFilterChange_gameProviders",
                        visualFreeGames.errorMessages.validateRequestedExistence,
                        {
                            'typeFilterActionsContainer': typeFilterActionsContainer,
                            'typeFilterActionElementSelector': typeFilterActionElementSelector,
                        }
                    );
                    return false;
                }

                // Event listener params
                var eventParams = visualFreeGames.getListenerParams(typeFilterActionsContainer, triggerElement);
                // Attach Listener -
                // @ TODO PASSIVE EVENT LISTENER ...
                // https://github.com/WICG/EventListenerOptions/blob/gh-pages/explainer.md
                eventParams.eventElement.on(
                    eventParams.eventType,
                    {filterParent: typeFilterActionsContainer},
                    visualFreeGames.handleFilterEventsFromClick
                );
                // Return success
                return true;
            },

            /**
             * This function establishes a listener for the filter reset button
             */
            listenForFilterReset: function () {
                // Sort Status Container Element
                var sortInformationAndResetActionsContainer = visualFreeGames.getResourceElement('sortInformationAndResetActionsContainer');
                // All-reset Element Selector
                var resetButtonSelector = visualFreeGames.getResourceSelector('resetAllSortInformationActionElement');
                // Individual-reset Element Selector
                var resetButtonIndividualSelector = visualFreeGames.getResourceSelector('resetSingleSortInformationActionElement');

                // Setup Reset All
                var resetAllAction = visualFreeGames.validateRequestedExistence(sortInformationAndResetActionsContainer, resetButtonSelector);
                // Validate existence
                if (resetAllAction !== false) {
                    // Attach listener
                    resetAllAction.on(
                        'click',
                        visualFreeGames.handleFilterResetFromAnywhere
                    );
                }

                // Setup Reset Individual
                var resetIndividualAction = visualFreeGames.validateRequestedExistence(sortInformationAndResetActionsContainer, resetButtonIndividualSelector);
                // Validate existence
                if (resetIndividualAction !== false) {
                    resetIndividualAction.on(
                        'click',
                        visualFreeGames.handleFilterResetIndividualCondition
                    );
                }

                // Validate existence
                if (resetIndividualAction === false) {
                    // Return message
                    visualFreeGames.console(true, "listenForFilterReset >> SingleReset",
                        visualFreeGames.errorMessages.validateRequestedExistence,
                        {
                            'sortInformationAndResetActionsContainer': sortInformationAndResetActionsContainer,
                            'resetButtonIndividualSelector': resetButtonIndividualSelector,
                        }
                    );
                }

                // Log any errors / missing elements
                if (resetAllAction === false) {
                    // Return message
                    visualFreeGames.console(true, "listenForFilterReset >> ResetAll",
                        visualFreeGames.errorMessages.validateRequestedExistence,
                        {
                            'sortInformationAndResetActionsContainer': sortInformationAndResetActionsContainer,
                            'resetButtonSelector': resetButtonSelector,
                        }
                    );
                }
            },
            /**
             * This function establishes a listener for inputs to the search form
             * @return {boolean} True on success, else False
             */
            listenForSearchQuery: function () {
                // Search Container
                var searchActionContainer = visualFreeGames.getResourceElement('searchActionContainer');
                // Search <input> element
                var searchInputSelector = visualFreeGames.getResourceSelector('searchInput');
                //
                var searchInputElement = visualFreeGames.validateRequestedExistence(searchActionContainer, searchInputSelector);
                // Validate existence
                if (searchInputElement === false) {
                    // Return message
                    visualFreeGames.console(true, "listenForSearchQuery",
                        visualFreeGames.errorMessages.validateRequestedExistence,
                        {
                            'searchActionContainer': searchActionContainer,
                            'searchInputSelector': searchInputSelector,
                        }
                    );
                    // Return failure
                    return false;
                }

                // Attach Listeners
                searchInputElement
                    .on(
                        'keypress',
                        function (e) {
                            // Prevent page refresh
                            if (e.keyCode === 13) {
                                e.preventDefault();
                            }
                        }
                    )
                    .on(
                        'keyup',
                        function (e) {
                            // searchSystem.manageSearchIntervals.clearTimeoutArray();
                            // searchSystem.handleSearchTimingEvents(e);
                            searchSystem.runSearch(e);
                        }
                    );

                // Return success
                return true;
            },

            /**
             * Remove event listener from seach input element
             * @return {boolean} True on success, else false
             */
            disableSearchQueryListener: function () {
                // Search Container
                var searchActionContainer = visualFreeGames.getResourceElement('searchActionContainer');
                // Search <input> element
                var searchInputSelector = visualFreeGames.getResourceSelector('searchInput');
                // Resolve element
                var searchInputElement = visualFreeGames.validateRequestedExistence(searchActionContainer, searchInputSelector);
                // Validate
                if (searchInputElement === false) {
                    // Return message
                    visualFreeGames.console(true, "disableSearchQueryListener",
                        visualFreeGames.errorMessages.validateRequestedExistence,
                        {
                            'searchActionContainer': searchActionContainer,
                            'searchInputSelector': searchInputSelector,
                        }
                    );
                    // Return failure
                    return false;
                }
                // remove event listeners
                searchInputElement.off('keyup');
                searchInputElement.off('keypress');

                visualFreeGames.console(false, 'disableSearchQueryListener', '\tSearch handler off...');

                return false;
            },

            /**
             * This function establishes a listener for the paginator
             */
            listenForPaginatorClick: function () {
                // Get Pagination Container
                var libraryGamesPaginationRow = visualFreeGames.getResourceElement('libraryGamesPaginationRow');
                // Validate
                // @TODO ADD/EVALUATE DYNAMIC LISTENER
                if (libraryGamesPaginationRow) {
                    libraryGamesPaginationRow.on(
                        'click',
                        'a',
                        visualFreeGames.delegatePaginatorClick
                    );
                }
                else {
                    // Error notice
                    visualFreeGames.console(true, "listenForPaginatorClick",
                        visualFreeGames.errorMessages.validateRequestedExistence,
                        {
                            'libraryGamesPaginationRow': libraryGamesPaginationRow
                        }
                    );
                }
            },

            /**
             *
             */
            listenForLoadMoreClick: function () {
                //@todo why isn't get resource element finding load more button here??
                var loadMoreGames = visualFreeGames.getResourceElement('loadMoreGamesActionElement');
                //using raw selector until mystery is solved.
                if (loadMoreGames) {
                    $('.freeLibGamesMore').on(
                        'click',
                        visualFreeGames.loadMoreGames
                    );
                }
                else {

                }
            },

            /**
             * This function takes a click on either filter and then handles necessary visual actions
             * and ensures the proper helper functions are activated. Lastly it instigates the data
             * gathering process.
             * @param {object} e - The event object
             */
            handleFilterEventsFromClick: function (e) {
                // Prevent execution for inactive elements
                if ($(this).hasClass('inactive')) {
                    return false;
                }
                // Action trigger element
                var clickedElement = $(this);
                // Element type - switch
                switch (visualFreeGames.getResourceElementNodeName(this)) {
                    case 'SELECT':
                        // Override trigger element reference
                        clickedElement = clickedElement.find('option:selected');
                        break;

                    default:
                        // legacy <a> click
                        e.preventDefault();
                        break;
                }

                // establish variables for the data elements and also conditionally set which text to search for
                // trigger element container - sort, gameType...
                var $selectedFilterParent = e.data.filterParent;
                // Data - filter details
                var selectedFilterData = clickedElement.data();
                // conditionally set which text to search for
                var elementTextSelector, textFromSelectedFilter;

                // resource elements
                var caseTopFilter = visualFreeGames.getResourceElement('sortFilterActionsContainer');
                var caseSideFilter = visualFreeGames.getResourceElement('typeFilterActionsContainer');
                var caseProviderFilter = visualFreeGames.getResourceElement('providerFilterParent');

                // functionality notification
                if (caseTopFilter === false || caseSideFilter === false || caseProviderFilter === false) {
                    visualFreeGames.console(true, 'handleFilterEventsFromClick',
                        'Missing Filter switch case...', {
                            'caseTopFilter': caseTopFilter,
                            'caseSideFilter': caseSideFilter,
                            'caseProviderFilter': caseProviderFilter,
                        }
                    );
                }

                // Process based on the triggering container element
                switch ($selectedFilterParent) {
                    case caseTopFilter :
                    case caseSideFilter :
                        elementTextSelector = visualFreeGames.getResourceSelector('actionElementText');
                        // if selector use to search element, else get element text
                        textFromSelectedFilter = elementTextSelector === false ?
                            clickedElement.text() :
                            clickedElement.find(elementTextSelector).text();
                        break;

                    case caseProviderFilter :
                        //highly likely that this is un needed but could be helpful in the future
                        var providerFilterActionElement = visualFreeGames.getResourceElement('providerFilterActionElement');
                        // Validate..
                        if (providerFilterActionElement) {
                            elementTextSelector = providerFilterActionElement.filter(function () {
                                return clickedElement.data("filter-value") !== undefined;
                            });
                        }
                        textFromSelectedFilter = clickedElement.data('filter-value');
                        break;
                }

                //remove any active classes as long as the item clicked is not active
                var itemNotAlreadyActive = visualFreeGames.clearActiveStatesFromFilterGroup($selectedFilterParent, 'active', clickedElement);

                //Then toggle the selected filter if able to
                if (itemNotAlreadyActive) {
                    visualFreeGames.toggleSingleActiveState('active', clickedElement);
                }
                // Update filter state
                visualFreeGames.filterState.setFilterObject(selectedFilterData);

                //next, clear necessary elements from the filter information display and update properly
                visualFreeGames.clearAndUpdateFilterInformationGroup(textFromSelectedFilter, selectedFilterData);

                // Empty games container, show loader
                visualFreeGames.showGameContainerLoader();

                // Add search string if exists
                var inp = visualFreeGames.getResourceElement('searchInput');
                // validate - then set search value to input
                if (inp !== false) {
                    selectedFilterData.search = inp[0].value;
                }

                visualFreeGames
                    .makeApiRequestForFilter(
                        visualFreeGames.filterState.getFilterObject(),
                        visualFreeGames.filterInitiators.filter
                    )
                    .then(function (resolve, reject) {
                        visualFreeGames.showFilteredGames(resolve);
                        visualFreeGames.updateFilters(resolve, selectedFilterData);
                        visualFreeGames.updatePaginatorOnGameSetChange(resolve);
                    })
                    .catch(function (reason) {
                        // This will fire if no games are returned by filter condition...
                        visualFreeGames.console(true, 'handleFilterEventsFromClick', 'Promise.catch()', reason);
                    });
            },

            /**
             * To be reviewed, improved...
             * may need to decouple Promise execution for more controlled callback/function execution
             *
             * @param element
             * @param filterParent
             * @return Promise
             */
            emulateFilterEventsFromClick: function (element, filterParent) {
                // Action trigger element
                // - check length for instances where have multiple trigger elements - Desktop / Mobile
                var clickedElement = element.length > 1 ? $(element[0]) : element;
                // establish variables for the data elements and also conditionally set which text to search for
                // trigger element container - sort, gameType...
                var $selectedFilterParent = filterParent;
                // Data - filter details
                var selectedFilterData = clickedElement.data();
                // conditionally set which text to search for
                var elementTextSelector, textFromSelectedFilter;

                // resource elements
                var caseTopFilter = visualFreeGames.getResourceElement('sortFilterActionsContainer');
                var caseSideFilter = visualFreeGames.getResourceElement('typeFilterActionsContainer');
                var caseProviderFilter = visualFreeGames.getResourceElement('providerFilterParent');

                // functionality notification
                if (caseTopFilter === false || caseSideFilter === false || caseProviderFilter === false) {
                    visualFreeGames.console(true, 'handleFilterEventsFromClick',
                        'Missing Filter switch case...', {
                            'caseTopFilter': caseTopFilter,
                            'caseSideFilter': caseSideFilter,
                            'caseProviderFilter': caseProviderFilter,
                        }
                    );
                }

                // Process based on the triggering container element
                switch ($selectedFilterParent) {
                    case caseTopFilter :
                    case caseSideFilter :
                        elementTextSelector = visualFreeGames.getResourceSelector('actionElementText');
                        // if selector use to search element, else get element text
                        textFromSelectedFilter = elementTextSelector === false ?
                            clickedElement.text() :
                            clickedElement.find(elementTextSelector).text();
                        break;

                    case caseProviderFilter :
                        //highly likely that this is un needed but could be helpful in the future
                        var providerFilterActionElement = visualFreeGames.getResourceElement('providerFilterActionElement');
                        // Validate..
                        if (providerFilterActionElement) {
                            elementTextSelector = providerFilterActionElement.filter(function () {
                                return clickedElement.data("filter-value") !== undefined;
                            });
                        }
                        textFromSelectedFilter = clickedElement.data('filter-value');
                        break;
                }

                //remove any active classes as long as the item clicked is not active
                var itemNotAlreadyActive = visualFreeGames.clearActiveStatesFromFilterGroup($selectedFilterParent, 'active', clickedElement);

                //Then toggle the selected filter if able to
                if (itemNotAlreadyActive) {
                    visualFreeGames.toggleSingleActiveState('active', clickedElement);
                }

                // update the filter object to represent manual filter setup
                visualFreeGames.filterState.setFilterObject(selectedFilterData);

                //next, clear necessary elements from the filter information display and update properly
                visualFreeGames.clearAndUpdateFilterInformationGroup(textFromSelectedFilter, selectedFilterData);
            },

            /**
             * This function takes a click from the individual condition filters
             * @todo RESET LOGIC TO BE IMPLEMENT
             *
             * @param event
             * @return {boolean}
             */
            handleFilterResetIndividualCondition: function (event) {
                if (event) {
                    event.preventDefault();
                }

                visualFreeGames.console(false, 'handleFilterResetIndividualCondition', '\tMissing logic');
                return false;
            },

            /**
             * This function takes a click from the reset all filters button and then ensures that all active filters
             * are cleared and that the proper default filters as indicated by the data-information-default attributes
             * are restored. An api call to establish the default filter is triggered if necessary
             * @param {object} e - The event object
             */
            handleFilterResetFromAnywhere: function (event) {
                if (event) {
                    event.preventDefault();
                }
                // Flag - run request
                var runApiRequest = false;
                // Search Input Element
                var searchValue = visualFreeGames.getResourceElement('searchInput');
                //
                var defaultFilterNotAlreadyActive = {};
                // Default filter values - reset to these
                var defaultFilter = {
                    'top': null,
                    'side': null,
                    'provider': null
                };
                // Filter elements
                var filterParent = {
                    'top': visualFreeGames.getResourceElement('sortFilterActionsContainer'),
                    'side': visualFreeGames.getResourceElement('typeFilterActionsContainer'),
                    'provider': visualFreeGames.getResourceElement('providerFilterParent')
                };

                //
                // Find default element/values to set back to filters
                //
                // Top - Sort filters - search and assign
                defaultFilter.top = visualFreeGames.getDefaultFilterValue(
                    filterParent.top,
                    visualFreeGames.getResourceSelector('sortFilterActionElement')
                );

                // Top - Sort filters - search and assign
                defaultFilter.side = visualFreeGames.getDefaultFilterValue(
                    filterParent.side,
                    visualFreeGames.getResourceSelector('typeFilterActionElement')
                );

                // Top - Sort filters - search and assign
                defaultFilter.provider = visualFreeGames.getDefaultFilterValue(
                    filterParent.provider,
                    visualFreeGames.getResourceSelector('providerFilterActionElement'),
                    'active'
                );

                //loop through each filter object - not inherited properties so this is fine
                for (var gameFilter in defaultFilter) {
                    switch (gameFilter) {
                        case 'provider':
                            // Current clearActiveStatesFromFilterGroup() does not satisfy requirement
                            defaultFilterNotAlreadyActive[gameFilter] = defaultFilter[gameFilter] ? true : undefined;
                            break;

                        default:
                            // check top & side to make sure they are not default
                            defaultFilterNotAlreadyActive[gameFilter] = visualFreeGames.clearActiveStatesFromFilterGroup(
                                filterParent[gameFilter],
                                'active',
                                defaultFilter[gameFilter]
                            );
                            break;
                    }

                    //if default filters values are in fact not active, then manipulate classes and run request
                    if (defaultFilterNotAlreadyActive[gameFilter]) {
                        visualFreeGames.toggleSingleActiveState('active', defaultFilter[gameFilter]);
                        visualFreeGames.swapInDefaultDataText(defaultFilter[gameFilter].data('filter-type'));
                        runApiRequest = true;
                    }
                }

                visualFreeGames.console(false, "handleFilterResetFromAnywhere", '', {
                    'filterParent': filterParent,
                    'defaultFilter': defaultFilter,
                    'defaultFilterNotAlreadyActive': defaultFilterNotAlreadyActive,
                });

                //Reset Search input element
                if (searchValue && searchValue[0].value.length > 0) {
                    runApiRequest = true;
                    searchValue[0].value = '';
                }

                //non event based trigger, run api request
                if (!event) {
                    runApiRequest = true;
                }

                if (runApiRequest) {
                    //Provider filter is reset in filter state function, no need to send specific instructions, reset to 'all'
                    visualFreeGames.filterState.resetFilterObject(
                        defaultFilter.top.data(),
                        defaultFilter.side.data()
                    );

                    // Empty games container, show loader
                    visualFreeGames.showGameContainerLoader();

                    // Make API request
                    visualFreeGames.makeApiRequestForFilter(
                        visualFreeGames.filterState.getFilterObject(),
                        visualFreeGames.filterInitiators.filterReset
                    )
                        .then(function (resolve, reject) {
                            visualFreeGames.showFilteredGames(resolve);
                            visualFreeGames.updateFilters(resolve);
                            visualFreeGames.updatePaginatorOnGameSetChange(resolve);
                        });
                } else {
                    return false;
                }
            },

            /**
             * Search and return default filter element,
             * default checks for data-attribute `information-default`,
             * providing a checkClass reference will run the check using hasClass()
             *
             * @param container Element searching in
             * @param selector Element search for / checking
             * @param checkClass Optional, class name to check for - under case 'providers'
             * @return {jQuery|null} jQuery on match, else null
             */
            getDefaultFilterValue: function (container, selector, checkClass) {
                // Return element
                var $refElement = null;
                // Validate
                if (container === false || selector === false) {
                    // Notify error
                    visualFreeGames.console(true, "getDefaultFilterValue",
                        visualFreeGames.errorMessages.missingSelector,
                        {
                            'container': container,
                            'selector': selector,
                        }
                    );
                    // Return null
                    return $refElement;
                }
                // Apply functionCall to all nested elements
                container.find(selector).each(function () {
                    // Cast - once
                    $refElement = $(this);
                    // Condition
                    var satisfied = typeof checkClass !== 'string' ?
                        $refElement.data('information-default') : $refElement.hasClass(checkClass);
                    // Validate
                    if (satisfied) {
                        // Break from function - found result
                        return false;
                    }
                    // Prevent returning last element if condition not found
                    $refElement = null;
                });
                // Return reference element
                return $refElement;
            },

            /**
             * This function takes the returned data object and updates the providers and game type
             * to ensure that only providers or game types that are in the returned game set are active
             * @param {object} data - the data set returned by the api
             * @param {object|undefined} filterData - data set of clicked item for evaluation
             */
            updateFilters: function (data, filterData) {
                if (!filterData) {
                    filterData = false;
                }
                // Dump some info
                visualFreeGames.console(false, "updateFilters", "\tFunction Params:", {
                    'data': data,
                    'filterData': filterData
                });
                // GameType Filter
                var $sideFilter = visualFreeGames.getResourceElement('typeFilterActionsContainer');
                // Provider Filter
                //var $providerFilter = visualFreeGames.getResourceElement('providerFilterLogosParent');
                var $providerFilter = visualFreeGames.getResourceElement('providerFilterParent');
                // Available options to provide  / process
                var availableProviders = [], availableGameTypes = [];
                //  Validate data
                if (data.hasOwnProperty('filterfull') === true) {
                    // Providers - validate and assign
                    if (data.filterfull.hasOwnProperty('providers') === true) {
                        // Cycle over
                        for (var kp in data.filterfull.providers) {
                            availableProviders.push(data.filterfull.providers[kp]);
                        }
                    }

                    // GameTypes - validate and assign
                    if (data.filterfull.hasOwnProperty('games') === true) {
                        // Cycle over
                        for (var kg in data.filterfull.games) {
                            // Store gameType as lowercase string with no spaces
                            availableGameTypes.push(data.filterfull.games[kg].toLowerCase().replace(/\s/g, ""));
                        }
                    }
                }

                //Validate condition... for Providers, update available gameType filters...
                if ($sideFilter !== false && (filterData === false || (filterData.filterType === 'provider' || filterData.filterValue === 'all'))) {
                    // Trigger Element selector
                    var gameTypeSelector = visualFreeGames.getResourceSelector('typeFilterActionElement');
                    // Entries
                    var $gameTypes = $sideFilter.find(gameTypeSelector);
                    // manipulate provider UI
                    visualFreeGames.updateFiltersGameTypes($gameTypes, availableGameTypes, filterData);
                }

                // Validate condition... for gameTypes, update available Provider filters...
                if ($providerFilter !== false && (filterData === false || (filterData.filterType === 'gameType' && filterData.filterValue !== 'all'))) {
                    // Provider Element Selector -
                    var providerElementSelector = visualFreeGames.getResourceSelector('providerFilterActionElement');
                    // Available Providers - excluding "All" option
                    var $providers = $providerFilter.find(providerElementSelector);
                    // Update visible Providers
                    visualFreeGames.updateFiltersProviders($providers, availableProviders, filterData);
                }

                // Validate condition... for Providers, update available gameType filters...
                if (filterData.filterType === 'search' && filterData !== false) {
                    if ($sideFilter !== false) {
                        // Trigger Element selector
                        var gameTypeSelector = visualFreeGames.getResourceSelector('typeFilterActionElement');
                        // Entries
                        var $gameTypes = $sideFilter.find(gameTypeSelector);
                        // manipulate provider UI
                        visualFreeGames.updateFiltersGameTypes($gameTypes, availableGameTypes, filterData);
                    }

                    if ($providerFilter !== false) {
                        // Provider Element Selector -
                        var providerElementSelector = visualFreeGames.getResourceSelector('providerFilterActionElement');
                        // Available Providers - excluding "All" option
                        var $providers = $providerFilter.find(providerElementSelector);
                        // Update visible Providers
                        visualFreeGames.updateFiltersProviders($providers, availableProviders, filterData);
                    }
                }

                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.afterUpdateFilters);
            },

            /**
             * Update GameType filter options based on filter data response.
             * Cycle over display elements and check if it exists in availableGameTypes,
             * if true show/active else hide/disable
             *
             * @param $providerElements
             * @param availableGameTypes
             * @param filterData
             */
            updateFiltersGameTypes: function ($gameTypeElements, availableGameTypes, filterData) {
                visualFreeGames.console(false, "updateFiltersGameTypes",
                    '\tFunction Params',
                    {
                        "$gameTypeElements": $gameTypeElements,
                        "availableGameTypes": availableGameTypes,
                        'filterData': filterData
                    }
                );

                // Ensure 'All' option is always available so can reset
                if(availableGameTypes.indexOf('all') === -1){
                    availableGameTypes.push('all');
                }

                // Process each existing GameType element
                $gameTypeElements.each(function () {
                    // Trigger element reference
                    var $sideFilterProvider = $(this);
                    // Game type text
                    var textToEvaluate = $sideFilterProvider[0].getAttribute('data-filter-value');

                    // game type is not available so set as inactive
                    if (availableGameTypes.indexOf(textToEvaluate) === -1) {
                        // - add the inactive state
                        if ($sideFilterProvider.hasClass('inactive') === false) {
                            visualFreeGames.toggleSingleActiveState('inactive', $sideFilterProvider);
                        }
                    }
                    // game type is available so set as active
                    else {
                        // - add the active state
                        if ($sideFilterProvider.hasClass('inactive')) {
                            visualFreeGames.toggleSingleActiveState('inactive', $sideFilterProvider);
                        }
                    }

                    // On reset set fist option which is always 'All'
                    if(filterData === false){
                        visualFreeGames.setSelectOption($sideFilterProvider, 0);
                    }
                });
            },

            /**
             *
             * @param $providerElements
             * @param availableGameTypes
             */
            updateFiltersProviders: function ($providerElements, availableProviders, filterData) {
                visualFreeGames.console(false, "updateFiltersProviders",
                    '\tFunction Params',
                    {
                        "$providerElements": $providerElements,
                        "availableGameTypes": availableProviders,
                        'filterData': filterData
                    }
                );

                //
                $providerElements.each(function () {
                    // Cast to jQuery...
                    var $provider = $(this);

                    // Select all - always available - if option exists
                    if (this.getAttribute('data-filter-value') === 'all') {
                        // skip over `all`
                        return true;
                    }

                    // Remove visual attribute - reset state
                    if (this.hasAttribute('data-filter-available')) {
                        this.removeAttribute('data-filter-available');
                    }

                    // Provider is not available under returned set
                    if (availableProviders.indexOf($provider.data('filter-value')) === -1) {
                        // - set to inactive or keep it that way
                        if ($provider.hasClass('inactive') === false) {
                            visualFreeGames.toggleSingleActiveState('inactive', $provider);
                        }
                        // - mark as not available
                        this.setAttribute('data-filter-available', false);

                    } else {
                        // - set to active
                        if ($provider.hasClass('inactive') === true) {
                            visualFreeGames.toggleSingleActiveState('inactive', $provider);
                        }
                        // - mark as available
                        this.setAttribute('data-filter-available', true);
                    }
                });

                // - for <option> set selected option
                if (filterData === false) {
                    // work off provider container element - <select> / <other>
                    if ($providerElements.prevObject) {
                        $.each($providerElements.prevObject, function (index, providerContainer) {
                            // check for `all` option
                            var $optionAll = $(providerContainer).find('[data-filter-value="all"]');
                            // if exists - set
                            if ($optionAll.length !== 0) {
                                visualFreeGames.setSelectOption($optionAll[0], 0);
                            }
                            // else set the first provider element found
                            else {
                                visualFreeGames.setSelectOption($providerElements[0], 0);
                            }
                        });
                    }
                }
            },

            /**
             * Set a desired <option> element as `selected` under its <select> element.
             * Function takes either a DOMElement / jQuery,
             * and either the index position of the option element relative to its parentElement,
             * or a text value to search through parentElement <option> elements which if found is to be set.
             *
             * Function validates optionElement via nodeName
             *
             * @TODO WRITE TEXT SEARCH LOGIC ONCE DECIDE IF RUNNING ON value, text OR data-
             *
             * @param {DomElement|jQuery} optionElement
             * @param {int|string} indexOrValue int for option index position, else string value to search
             */
            setSelectOption: function (optionElement, indexOrValue) {
                // validate, default to first element position
                if (typeof indexOrValue === 'undefined') {
                    indexOrValue = 0;
                }
                // if jQuery - just get element - pure JS it
                if (visualFreeGames.isJqueryInstance(optionElement) === true) {
                    optionElement = optionElement[0];
                }

                // error flag
                var err = null;
                // function params
                var params = {
                    'optionElement': optionElement,
                    'indexOrValue': indexOrValue
                };

                // of type `option`
                if (visualFreeGames.getResourceElementNodeName(optionElement, true) === 'option') {
                    // <select> element
                    var selectElement = optionElement.parentElement;
                    // interpret action - set vs search & set
                    switch (typeof indexOrValue) {
                        case 'number':
                            if (selectElement.options[indexOrValue] !== 'undefined') {
                                selectElement.options[indexOrValue].selected = 'selected';
                            }
                            else {
                                err = '\tUndefined option index!';
                            }
                            break;

                        case 'string':
                            // run by recursive call... find index position
                            // wait until know if to run on value, data-attribute, or text
                            err = '\tFunctionality to be written...';
                            break;

                        default:
                            err = '\tUnknown switch case!';
                            break;

                    }
                }
                //
                if (err !== null) {
                    visualFreeGames.console(true, 'setSelectOption', err, params);
                    // return error
                    return false;
                }
                // return success
                return true;
            },

            //updateFilters

            /**
             * This function delegates a click on any portion of the paginator to the proper handler
             * @param {object} e - The event object
             */
            delegatePaginatorClick: function (e) {
                // prevent element default behaviour - if using <a> with href property
                e.preventDefault();
                // clicked element
                var $target = $(this);
                // check element is not already active or inactive (not available)
                if ($target.hasClass('active') === false && $target.hasClass('inactive') === false) {

                    var paginatorDataType = $target.data('pagination-type'),
                        // $activePageButton = visualFreeGames.elements.$libraryGamesPaginationCenter.children('.active');
                        $paginationPageButton = visualFreeGames.getResourceElement('libraryGamesPaginationCenter'),
                        $activePageButton = $paginationPageButton ? $paginationPageButton.children('.active') : false

                    // Empty games container, show loader
                    visualFreeGames.showGameContainerLoader();

                    switch (paginatorDataType) {
                        case'pageNumber':
                            visualFreeGames.handlePaginatorPageNumberClick($target);
                            break;

                        case'nextPage':
                        case'prevPage':
                            visualFreeGames.handlePaginatorNextOrPrevClick($target, $activePageButton, paginatorDataType);
                            break;

                        case'nextPageSet':
                        case'prevPageSet':
                            visualFreeGames.handlePaginatorNextSetOrPrevSetClick($target, $activePageButton, paginatorDataType);
                            break;

                    }
                }
                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.pagination);
            },

            /**
             * This function handles the click of an actual page number from the paginator.
             * It then makes an api request to get the new games consistent with the number clicked
             * @param {object} $target - The jquery object of the clicked element
             */
            handlePaginatorPageNumberClick: function ($target) {
                var filterObject = visualFreeGames.filterState.getFilterObject();
                visualFreeGames.filterState.setStartingNumberForSlice($target.data('slice'));
                visualFreeGames.updatePageNumberActiveStates($target);
                visualFreeGames.updatePaginatorNextOrPrevButtons($target);
                visualFreeGames.updatePaginatorNextSetOrPrevSetButtons($target);
                visualFreeGames.makeApiRequestForFilter(
                    filterObject,
                    visualFreeGames.filterInitiators.paginator
                )
                    .then(function (resolve, reject) {
                        visualFreeGames.showFilteredGames(resolve);
                        visualFreeGames.filterState.resetStartingNumberForSlice();

                    });
            },

            /**
             * This function handles of a next or previous paginator button.
             * It then makes an api request to get the new games consistent with the proper
             * page number that is highlighted as a result of the click
             * @param {object} $target - The jquery object of the clicked element
             */
            handlePaginatorNextOrPrevClick: function ($target, $activePageButton, paginatorDataType) {
                var filterObject = visualFreeGames.filterState.getFilterObject(),
                    libraryGamesPaginationRow = visualFreeGames.getResourceElement('libraryGamesPaginationRow'),
                    libraryGamesPaginationCenter = visualFreeGames.getResourceElement('libraryGamesPaginationCenter'),
                    pagesToShow = libraryGamesPaginationRow ? libraryGamesPaginationRow.data('pages-to-show') : null;

                if (paginatorDataType === 'nextPage') {
                    //if the current active page is the last page in the set
                    if ($activePageButton.index() === pagesToShow - 1) {
                        visualFreeGames.filterState.setStartingNumberForSlice(parseInt($activePageButton.data('slice')) + parseInt(filterObject.numberOfItemsToInclude));
                        visualFreeGames.updatePaginationPageNumbers($activePageButton, pagesToShow, 'increase');
                        visualFreeGames.updatePaginatorNextOrPrevButtons(libraryGamesPaginationCenter.children().last());
                        visualFreeGames.updatePaginatorNextSetOrPrevSetButtons();
                    } else {
                        //
                        var $next = $activePageButton.next();

                        visualFreeGames.filterState.setStartingNumberForSlice($next.data('slice'));
                        visualFreeGames.updatePageNumberActiveStates($next);
                        visualFreeGames.updatePaginatorNextOrPrevButtons($next);
                        visualFreeGames.updatePaginatorNextSetOrPrevSetButtons();
                    }
                } else if (paginatorDataType === 'prevPage') {
                    //if the current active page is the first page in the set
                    if ($activePageButton.index() === 0) {
                        visualFreeGames.filterState.setStartingNumberForSlice(parseInt($activePageButton.data('slice')) - parseInt(filterObject.numberOfItemsToInclude));
                        visualFreeGames.updatePaginationPageNumbers($activePageButton, pagesToShow, 'decrease');
                        visualFreeGames.updatePaginatorNextOrPrevButtons(libraryGamesPaginationCenter.children().first());
                        visualFreeGames.updatePaginatorNextSetOrPrevSetButtons();
                    } else {
                        //
                        var $prev = $activePageButton.prev();

                        visualFreeGames.filterState.setStartingNumberForSlice($prev.data('slice'));
                        visualFreeGames.updatePageNumberActiveStates($prev);
                        visualFreeGames.updatePaginatorNextOrPrevButtons($prev);
                        visualFreeGames.updatePaginatorNextSetOrPrevSetButtons();
                    }
                }
                //finally make the api request and then show the filtered games upon success
                visualFreeGames.makeApiRequestForFilter(
                    filterObject,
                    visualFreeGames.filterInitiators.paginator
                )
                    .then(function (resolve, reject) {
                        visualFreeGames.showFilteredGames(resolve);
                        visualFreeGames.filterState.resetStartingNumberForSlice();

                    });
            },

            /**
             * This function handles of a nextSet or previousSet paginator button.
             * It then makes an api request to get the new games consistent with the proper
             * page number that is highlighted as a result of the click
             * @param {object} $target - The jquery object of the clicked element
             * @param {object} $activePageButton - The jquery object of the current active page button
             * @param {string} paginatorDataType - a string indicating what part of the paginator is activating this
             */
            handlePaginatorNextSetOrPrevSetClick: function ($target, $activePageButton, paginatorDataType) {
                var filterObject = visualFreeGames.filterState.getFilterObject(),
                    libraryGamesPaginationRow = visualFreeGames.getResourceElement('libraryGamesPaginationRow'),
                    pagesToShow = libraryGamesPaginationRow ? libraryGamesPaginationRow.data('pages-to-show') : false,
                    currentSlice = parseInt($activePageButton.data('slice'));
                //remaining = $target.data('remaining');
                if (paginatorDataType === 'nextPageSet') {
                    visualFreeGames.filterState.setStartingNumberForSlice(pagesToShow * filterObject.numberOfItemsToInclude + currentSlice);
                    visualFreeGames.updatePaginationPageNumbers($activePageButton, pagesToShow, 'setIncrease');
                    visualFreeGames.updatePaginatorNextOrPrevButtons();
                    visualFreeGames.updatePaginatorNextSetOrPrevSetButtons();
                } else if (paginatorDataType === 'prevPageSet') {
                    visualFreeGames.filterState.setStartingNumberForSlice(currentSlice - pagesToShow * filterObject.numberOfItemsToInclude);
                    visualFreeGames.updatePaginationPageNumbers($activePageButton, pagesToShow, 'setDecrease');
                    visualFreeGames.updatePaginatorNextOrPrevButtons();
                    visualFreeGames.updatePaginatorNextSetOrPrevSetButtons();
                }

                visualFreeGames.makeApiRequestForFilter(
                    filterObject,
                    visualFreeGames.filterInitiators.paginator
                )
                    .then(function (resolve, reject) {
                        visualFreeGames.showFilteredGames(resolve);
                        visualFreeGames.filterState.resetStartingNumberForSlice();
                    });

            },

            /**
             * A simple helper function to clear and update active states
             * for the page numbers in the paginator
             * @param {object} $target - The jquery object of the clicked element
             */
            updatePageNumberActiveStates: function ($target) {
                var libraryGamesPaginationCenter = visualFreeGames.getResourceElement('libraryGamesPaginationCenter');

                if (libraryGamesPaginationCenter) {
                    libraryGamesPaginationCenter.children().each(
                        function () {
                            if ($(this).hasClass('active')) {
                                visualFreeGames.toggleSingleActiveState('active', $(this));
                            }
                        });

                    visualFreeGames.toggleSingleActiveState('active', $target);
                }
            },

            /**
             * This function updates the page numbers in the paginator when either the next or prev buttons
             * advance the page set or the nextPageSet or prevPageSet buttons advance the page set.
             * @param {object} $currentPage - the jquery object of the current active page
             * @param {string} pagesToShow - the number of pages to show in the paginator
             * @param {string} type - indicates if it is a previous or next action
             */
            updatePaginationPageNumbers: function ($currentPage, pagesToShow, type) {
                var currentPageNumber = parseInt($currentPage.text()),
                    filterObject = visualFreeGames.filterState.getFilterObject(),
                    currentPageSlice = $currentPage.data('slice'),
                    libraryGamesPaginationRow = visualFreeGames.getResourceElement('libraryGamesPaginationRow'),
                    totalGames = libraryGamesPaginationRow ? libraryGamesPaginationRow.data('total-games') : -1,
                    firstNewPageNumber,
                    firstNewPageNumberSlice;

                if (type === 'increase') {
                    firstNewPageNumber = currentPageNumber + 1 - (pagesToShow - 1);
                    firstNewPageNumberSlice = currentPageSlice - ((pagesToShow - 2) * filterObject.numberOfItemsToInclude);
                } else if (type === 'decrease') {
                    firstNewPageNumber = currentPageNumber - 1;
                    firstNewPageNumberSlice = currentPageSlice - filterObject.numberOfItemsToInclude;
                } else if (type === 'setIncrease') {
                    firstNewPageNumber = currentPageNumber + pagesToShow;
                    firstNewPageNumberSlice = pagesToShow * filterObject.numberOfItemsToInclude + currentPageSlice;
                } else if (type === 'setDecrease') {
                    firstNewPageNumber = currentPageNumber - pagesToShow;
                    firstNewPageNumberSlice = currentPageSlice - pagesToShow * filterObject.numberOfItemsToInclude;
                } else if (type === 'newSet') {
                    firstNewPageNumber = 1;
                    firstNewPageNumberSlice = 0;
                }

                //
                var libraryGamesPaginationCenter = visualFreeGames.getResourceElement('libraryGamesPaginationCenter');

                if (libraryGamesPaginationCenter) {
                    libraryGamesPaginationCenter.children().each(
                        function (i) {
                            if (i === 0) {
                                $(this).html(firstNewPageNumber);
                                $(this).data('slice', firstNewPageNumberSlice);
                                if (type === 'setIncrease' || type === 'setDecrease') {
                                    visualFreeGames.updatePageNumberActiveStates($(this));
                                }
                            } else {
                                //make sure we only make pages if we have the games to get to
                                if (firstNewPageNumberSlice + i * filterObject.numberOfItemsToInclude < totalGames) {
                                    $(this).html(firstNewPageNumber + i);
                                    $(this).data('slice', firstNewPageNumberSlice + i * filterObject.numberOfItemsToInclude);
                                    if ($(this).is(':hidden')) {
                                        //if we hid page buttons in the past and now we are safe again, lets un hide them
                                        $(this).show();
                                    }
                                } else {
                                    //if we are out of games, hide any remaining page buttons
                                    $(this).hide();
                                }
                            }
                        }
                    );
                }
            },

            /**
             * This function updates the class of the next and previous page buttons
             */
            updatePaginatorNextOrPrevButtons: function () {
                var libraryGamesPaginationRow = visualFreeGames.getResourceElement('libraryGamesPaginationRow');
                var libraryGamesPaginationCenter = visualFreeGames.getResourceElement('libraryGamesPaginationCenter');
                var prevButton = visualFreeGames.getResourceElement('prevButton');
                var nextButton = visualFreeGames.getResourceElement('nextButton');

                // Prevent execution if missing elements
                if (!libraryGamesPaginationRow || !libraryGamesPaginationCenter || !prevButton || !nextButton) {
                    return false;
                }

                var totalGames = libraryGamesPaginationRow.data('total-games'),
                    filterObject = visualFreeGames.filterState.getFilterObject(),
                    $activePageButton = libraryGamesPaginationCenter.children('.active');

                //deactivate the previous button if we are on the first slice of the game set
                if ($activePageButton.data('slice') === 0) {
                    if (!prevButton.hasClass('inactive')) {
                        visualFreeGames.toggleSingleActiveState(
                            'inactive',
                            prevButton
                        );
                    }
                    //activate the previous button if we are anywhere else
                } else {
                    if (prevButton.hasClass('inactive')) {
                        visualFreeGames.toggleSingleActiveState(
                            'inactive',
                            prevButton
                        );
                    }
                }
                //deactivate the nextButton if no games remain in the set
                visualFreeGames.console(false, 'updatePaginatorNextOrPrevButtons', '\tHere is totalGames: ', totalGames);
                if (totalGames - $activePageButton.data('slice') < filterObject.numberOfItemsToInclude) {
                    if (!nextButton.hasClass('inactive')) {
                        visualFreeGames.toggleSingleActiveState(
                            'inactive',
                            nextButton
                        );
                    }
                    //activate the nextButton if games remain in the set
                } else {
                    if (nextButton.hasClass('inactive')) {
                        visualFreeGames.toggleSingleActiveState(
                            'inactive',
                            nextButton
                        );
                    }
                }
            },

            /**
             * This function updates the class of the nextPageSet and prevPageSet buttons
             */
            updatePaginatorNextSetOrPrevSetButtons: function () {
                var libraryGamesPaginationRow = visualFreeGames.getResourceElement('libraryGamesPaginationRow');
                var libraryGamesPaginationCenter = visualFreeGames.getResourceElement('libraryGamesPaginationCenter');
                var nextPageSetButton = visualFreeGames.getResourceElement('nextPageSetButton');
                var prevPageSetButton = visualFreeGames.getResourceElement('prevPageSetButton');

                // Prevent execution if missing elements
                if (!libraryGamesPaginationRow || !libraryGamesPaginationCenter || !nextPageSetButton || !prevPageSetButton) {
                    return false;
                }

                var filterObject = visualFreeGames.filterState.getFilterObject(),
                    pagesToShow = libraryGamesPaginationRow.data('pages-to-show'),
                    totalGames = libraryGamesPaginationRow.data('total-games'),
                    $activePageButton = libraryGamesPaginationCenter.children('.active');

                //see if we need to deactivate or activate nextPageSetButton
                if ((totalGames - parseInt($activePageButton.data('slice'))) < (filterObject.numberOfItemsToInclude * pagesToShow)) {

                    if (!nextPageSetButton.hasClass('inactive')) {
                        visualFreeGames.toggleSingleActiveState(
                            'inactive',
                            nextPageSetButton
                        );
                    }
                } else {
                    if (nextPageSetButton.hasClass('inactive')) {
                        visualFreeGames.toggleSingleActiveState(
                            'inactive',
                            nextPageSetButton
                        );
                    }
                }
                //see if we need to deactivate or activate prevPageSetButton
                if (parseInt($activePageButton.data('slice')) >= filterObject.numberOfItemsToInclude * pagesToShow) {
                    if (prevPageSetButton.hasClass('inactive')) {
                        visualFreeGames.toggleSingleActiveState(
                            'inactive',
                            prevPageSetButton
                        );
                    }
                } else {
                    if (!prevPageSetButton.hasClass('inactive')) {
                        visualFreeGames.toggleSingleActiveState(
                            'inactive',
                            prevPageSetButton
                        );
                    }
                }
            },

            /**
             * This function updates the paginator when a new set of games is requested
             * @param {object} dataFromApi - the resolve of the api promise
             */
            updatePaginatorOnGameSetChange: function (dataFromApi) {
                var filterObject = visualFreeGames.filterState.getFilterObject(),
                    firstNewPageNumber = 1,
                    firstNewPageNumberSlice = 0,
                    totalGames = dataFromApi['filtercount'],
                    libraryGamesPaginationRow = visualFreeGames.getResourceElement('libraryGamesPaginationRow'),
                    libraryGamesPaginationCenter = visualFreeGames.getResourceElement('libraryGamesPaginationCenter');

                if (!libraryGamesPaginationRow || !libraryGamesPaginationCenter) {
                    return false;
                }

                libraryGamesPaginationRow.data('total-games', totalGames);

                libraryGamesPaginationCenter.children().each(
                    function (i) {
                        if (i === 0) {
                            $(this).html(firstNewPageNumber);
                            $(this).data('slice', firstNewPageNumberSlice);
                        } else {
                            //make sure we only make pages if we have the games to get to
                            if (firstNewPageNumberSlice + i * filterObject.numberOfItemsToInclude < totalGames) {
                                $(this).html(firstNewPageNumber + i);
                                $(this).data('slice', firstNewPageNumberSlice + i * filterObject.numberOfItemsToInclude);
                                if ($(this).is(':hidden')) {
                                    //if we hid page buttons in the past and now we are safe again, lets un hide them
                                    $(this).show();
                                }
                            } else {
                                //if we are out of games, hide any remaining page buttons
                                $(this).hide();
                            }
                        }
                    }
                );
                visualFreeGames.updatePageNumberActiveStates(
                    libraryGamesPaginationCenter.children().first()
                );
                visualFreeGames.updatePaginatorNextOrPrevButtons();
                visualFreeGames.updatePaginatorNextSetOrPrevSetButtons();
            },

            loadMoreGames: function () {
                visualFreeGames.console(true, 'loadMoreGames', '\tFunction to be written...');
            },

            /**
             * This closure function maintains state of the filter object
             * for any new API requests
             * @param {object} dataFromApi - the resolve of the api promise
             */

            filterState: (function () {
                var filterObject = {
                    'provider': 'all',
                    'orderBy': 'mostPopular',
                    'gameType': 'all',
                    'startingNumberForSlice': '0',
                    'numberOfItemsToInclude': '12',
                    'search': ''
                };

                return {

                    /**
                     * Set the filter object
                     *
                     * for any new API requests
                     * @todo UPDATE data-filter-type from sortOrder to orderBy
                     * @param {object} filterData - object holding current filter status from html
                     */
                    setFilterObject: function (filterData) {
                        if (!filterData) {
                            return false;
                        }

                        var val = filterData.filterValue ? filterData.filterValue : null;

                        switch (filterData.filterType) {
                            case 'sortOrder':
                                filterObject.orderBy = val;
                                break;
                            case 'gameType':
                                filterObject.gameType = val;
                                break;
                            case 'provider':
                                filterObject.provider = val;
                                break;
                            case 'search':
                                filterObject.search = val;
                                break;
                            default:
                                visualFreeGames.console(true, 'filterState:setFilterObject()', '\tUnknown Object.key : filterType', filterData);
                                break;
                        }
                    },

                    /**
                     * reset the filter object
                     *
                     * for any new API requests
                     * @param {object} topFilterData - object holding top filter information
                     * @param {object} sideFilterData - object holding side filter information
                     */
                    resetFilterObject: function (topFilterData, sideFilterData) {
                        filterObject.orderBy = topFilterData.filterValue;
                        filterObject.gameType = sideFilterData.filterValue;
                        filterObject.provider = 'all';
                        filterObject.search = '';
                    },

                    /**
                     * set the starting number for the slice
                     *
                     * for any new API requests
                     * @param {string} topFilterData - string value to set starting number for slice to
                     */
                    setStartingNumberForSlice: function (input) {
                        filterObject.startingNumberForSlice = input;
                    },

                    /**
                     * reset the starting number for the slice
                     */
                    resetStartingNumberForSlice: function () {
                        filterObject.startingNumberForSlice = 0;
                    },

                    /**
                     * set the number of elements/games to return
                     * @param {number} num
                     */
                    setNumberOfItemsToInclude : function(num){
                        if(isNaN(num) === false){
                            filterObject.numberOfItemsToInclude = num;
                        }
                    },

                    /**
                     * get the filter object
                     * @returns filterObject
                     */
                    getFilterObject: function () {
                        return filterObject;
                    }

                };
            })(),

            /**
             * This function takes the data object and outputs the new games on screen
             * @param {object} dataFromApi - Data returned from api promise
             */
            showFilteredGames: function (dataFromApi) {
                // get container - skip validation - already performed by this stage
                var mainGameContainer = visualFreeGames.getResourceElement('mainGameContainer');
                // hide/manipulate changes run by - showGameContainerLoader()
                visualFreeGames.hideGameContainerLoader(mainGameContainer);
                // validate API data
                if (dataFromApi) {
                    // validate games
                    if (dataFromApi.games.length > 0) {
                        // Replace Games
                        mainGameContainer.html(dataFromApi.games);
                        // LazyLoad
                        visualFreeGames.LazyLoading.dispatchEventLoad();
                    }
                    else if(typeof visualFreeGames.config.gameEmptyResponse === 'string') {
                        mainGameContainer.html(
                            visualFreeGames.config.gameEmptyResponse
                        );
                    }
                    // update game count
                    visualFreeGames.updateGameCount(dataFromApi);
                }
            },

            /**
             * Update game count following an API request.
             * Expects/validates for property `filtercount` in data object
             *
             * @param {object} dataFromApi Api response object
             * @return {boolean} True on success, else False
             */
            updateGameCount: function (dataFromApi) {
                var currentFilter = visualFreeGames.filterState.getFilterObject(),
                    gameResultsCount = visualFreeGames.getResourceElement('gameCountPlaceholder');

                //we can ignore the order by value for the purposes of this var
                var truncatedCurrentFilter = visualFreeGames.providerMap[currentFilter.provider]+
                    visualFreeGames.gameTypeMap[currentFilter.gameType],
                    //make sure the first filter is converted to a string
                    firstFilterAsString = visualFreeGames.classInstanceDataObject['firstfilter'],
                    //parse first and third characters from string
                    truncatedFirstFilter = firstFilterAsString.charAt(0)+firstFilterAsString.charAt(2);

                // validate element
                if (gameResultsCount === false) {
                    visualFreeGames.console(
                        true,
                        'updateGameCount',
                        visualFreeGames.errorMessages.missingElement,
                        {'gameResultsCount': gameResultsCount}
                    );

                    return false;
                }

                // validate have count in data object
                if (dataFromApi.hasOwnProperty('filtercount') === false) {
                    visualFreeGames.console(
                        true,
                        'updateGameCount',
                        '\tCould not resolve property `filtercount`',
                        {'dataFromApi': dataFromApi}
                    );
                    return false;
                }
                // Game count
                var resultCount = dataFromApi.filtercount;
                /*first check to see if static game count configuration is enabled, if so, check to see if the
                 *current filter matches the original page load filter, if so, use appropriate initStaticFilterCount
                 *method.
                 */
                if(Number.isInteger(visualFreeGames.config.staticFilterCount)){
                    if(truncatedCurrentFilter===truncatedFirstFilter)
                    {
                        visualFreeGames.console(
                            true,
                            'updateGameCount',
                            '\tMatch with original filter and static count variable is set, reverting to original static count',
                            {'dataFromApi': dataFromApi}
                        );

                        visualFreeGames.initStaticFilterCount();

                        return true;
                    }
                }

                // element length - class selector could give more than one element
                var len = gameResultsCount.length;
                // cycle over elements
                for (var i = 0; i < len; i++) {
                    // update count
                    gameResultsCount[i].innerText = resultCount;
                }
                // return success
                return true;
            },

            /**
             * Listen to Game clicks
             */
            listenForSingleGameClick: function () {
                // Setup Listener - leave validation to function called
                visualFreeGames.toggleSingleGameClickHandler(true);
            },

            /**
             * Toggle game click listener
             *
             * @param {boolean} enable True to add listener, false to remove
             */
            toggleSingleGameClickHandler: function (enable) {
                // Games Container/Holder
                var mainGameContainer = visualFreeGames.getResourceElement('mainGameContainer');
                // Individual Game Selector
                var gameSelector = visualFreeGames.getResourceSelector('individualGameContainer');
                // Validate Resources - Reset Individual
                if (mainGameContainer === false || gameSelector === false) {
                    visualFreeGames.console(true, "toggleSingleGameClickHandler",
                        visualFreeGames.errorMessages.missingSelector,
                        {
                            'mainGameContainer': mainGameContainer,
                            'gameSelector': gameSelector,
                        }
                    );
                    // Return failure
                    return false;
                }

                // Enable Listener
                if (enable) {
                    mainGameContainer.on('click', gameSelector, visualFreeGames.singleGameClickHandler);
                }
                // Disable Listener
                else {
                    mainGameContainer.off('click', gameSelector, visualFreeGames.singleGameClickHandler);
                }
            },

            /**
             *
             * @param e Event
             * @return {boolean} False on error, else true
             */
            singleGameClickHandler: function (e) {
                // flash checker - on game click
                if (visualFreeGames.config.initFlash === 'click') {
                    // run check, store state
                    var flashSupported = visualFreeGames.checkFlashSupport();
                    // if not enabled return
                    if (flashSupported === false) {
                        return false;
                    }
                }

                //
                e.preventDefault();
                // Define attribute name
                var attrGameId = 'data-game-id';
                // Check if the attribute has been defined
                if (!this.hasAttribute(attrGameId)) {
                    visualFreeGames.console(true, "singleGameClickHandler", "\tUnknown/unresolved attribute '" + attrGameId + "'!");
                    return false;
                }

                // Get gameId and parse to int
                var gameId = parseInt(this.getAttribute(attrGameId));
                // If not a number cancel execution
                if (isNaN(gameId)) {
                    visualFreeGames.console(true, "singleGameClickHandler", "GameId is not a number!");
                    return false;
                }

                // Store game id reference
                visualFreeGames.setGameId(gameId);

                // Behaviour to execute...
                if (visualFreeGames.isMobile) {
                    // Add/trigger fullscreen API listener
                    visualFreeGames.attachListenFullscreenAPI(true);
                    // check orientation BEFORE game load, storing the game id to load when when condition satisfied
                    visualFreeGames.listenForScreenOrientation(gameId);
                }
                else {
                    visualFreeGames.requestGameLoad(gameId, false);
                }

                return true;
            },

            /**
             * Request Game,
             * and whether it should be server in fullscreen
             *
             * @param gameId Game ID to load
             * @param {boolean} inFullscreen True to trigger as fullscreen, else false
             */
            requestGameLoad: function (gameId, inFullscreen) {
                // Show loader in Modal
                visualFreeGames.showLoader(true);
                // Turn game click listener off
                visualFreeGames.toggleSingleGameClickHandler(false);

                // Request Lightbox
                var apiRequestData = visualFreeGames.makeApiRequestForSingleGame(gameId);
                // Resolve Lightbox request
                apiRequestData.then(function (result, reject) {
                    // Hide the loader
                    visualFreeGames.hideLoader(false);
                    // Show/load the game
                    visualFreeGames.showGameInLightbox(result, inFullscreen);
                    //
                    visualFreeGames.dispatchEvent(visualFreeGames.eventNames.afterRequestGameLoad);
                });

                return false;
            },


            /**
             * This function is a simple abstract class toggle handler
             * You give it the class you want to toggle and the element you want it to toggle on.
             * @param {string} classNameToToggle - The class name of the toggleable class
             * @param {object} $elementToToggle - selector for the jquery object of the element you wish to toggle
             * @return {boolean} True on success, else False
             */
            toggleSingleActiveState: function (classNameToToggle, $elementToToggle) {
                if (visualFreeGames.isJqueryInstance($elementToToggle) === false) {
                    visualFreeGames.console(true, "toggleSingleActiveState",
                        "\tElement is not an Instance of jQuery!",
                        {"$elementToToggle": $elementToToggle}
                    );
                    // Return failure
                    return false;
                }
                // Toggle action
                $elementToToggle.toggleClass(classNameToToggle);
                // Return success
                return true;
            },

            /**
             * This function ensures that any filter group is cleared of all active classes when a new
             * element is to be set to active. It also checks to make sure that the element being clicked
             * is not already active. If the element is already active, no further action is taken.
             * @param {object} $filterGroup - The Jquery object of the filter group to be evaluated
             * @param {string} classNameToRemove - The string of the class name to be removed
             * @param {object} $elementClicked - The Jquery object of the element clicked that triggered the event
             */
            clearActiveStatesFromFilterGroup: function ($filterGroup, classNameToRemove, $elementClicked) {
                visualFreeGames.console(false, "clearActiveStatesFromFilterGroup", '\tFunction Params:',
                    {
                        "$filterGroup": $filterGroup,
                        "classNameToRemove": classNameToRemove,
                        "$elementClicked": $elementClicked,
                    }
                );

                // Validate element...
                if ($elementClicked) {
                    // Validate condition...
                    if ($elementClicked.hasClass(classNameToRemove) === false) {
                        // !!! Assumption - use the clicked element node type to identify elements to modify
                        // Note that if selectors are not rightly setup this function may not work
                        // The clicked element - listener - should always be the `triggerActionElement`
                        var nodeName = visualFreeGames.getResourceElementNodeName($elementClicked[0], true);
                        //
                        $filterGroup.find(nodeName).each(function () {
                            // Keep a reference - cast once
                            var $childAnchor = $(this);

                            if ($childAnchor.hasClass(classNameToRemove)) {
                                $childAnchor.removeClass(classNameToRemove);
                            }
                        });
                        return true;
                    }
                }
            },

            /**
             * This function makes sure that the current filters in use are displayed properly in the
             * filter information area. It dynamically updates the text to show what filters are in use.
             * @param {string} textToUpdate - The text to search for and evaluate
             * @param {object} dataGroup - The data object from the clicked filter type, to ensure the proper filter
             * group gets updated.
             * @return {boolean} True on success, else False
             */
            clearAndUpdateFilterInformationGroup: function (textToUpdate, dataGroup) {
                // Container Element reference
                var sortInformationAndResetActionsContainer = visualFreeGames.getResourceElement('sortInformationAndResetActionsContainer');
                // Trigger Element reference
                var resetSingleSortInformationActionElement = visualFreeGames.getResourceSelector('resetSingleSortInformationActionElement');
                // Trigger Element text-container reference selector
                var textToFindOrChange = visualFreeGames.getResourceSelector('sortInformationTextString');
                // Validate Elements / Selectors
                if (sortInformationAndResetActionsContainer === false ||
                    resetSingleSortInformationActionElement === false ||
                    textToFindOrChange === false
                ) {
                    visualFreeGames.console(true, 'clearAndUpdateFilterInformationGroup',
                        visualFreeGames.errorMessages.missingElement + ' OR ' + visualFreeGames.errorMessages.missingSelector,
                        {
                            'sortInformationAndResetActionsContainer': sortInformationAndResetActionsContainer,
                            'resetSingleSortInformationActionElement': resetSingleSortInformationActionElement,
                            'textToFindOrChange': textToFindOrChange
                        }
                    );
                    // return failure
                    return false;
                }

                // Validate elements - single reset element triggers
                var singleResetElements = visualFreeGames.validateRequestedExistence(sortInformationAndResetActionsContainer, resetSingleSortInformationActionElement);
                if (singleResetElements === false) {
                    return false;
                }

                // Validate placeholder existence in one of the elements
                var textPlaceholderExists = visualFreeGames.validateRequestedExistence($(singleResetElements[0]), textToFindOrChange);
                if (textPlaceholderExists === false) {
                    return false;
                }

                // Update the individual reset buttons with the newly filter text
                singleResetElements.each(function () {
                    // Element reference - that which triggers the action
                    var element = $(this);
                    // Text container element reference
                    var $fullInformationObject = element.find(textToFindOrChange);
                    // Validate
                    if ($fullInformationObject.length !== 0) {
                        // Text value
                        var textCurrentlyShowing = $fullInformationObject.text();
                        // Visual attribute data
                        var iterationDataGroup = element.data()
                        // Condition - if text is different for same filterType
                        if (textCurrentlyShowing !== textToUpdate && dataGroup.filterType === iterationDataGroup.filterType) {
                            if (dataGroup.informationDefault) {
                                $fullInformationObject.text(dataGroup.informationDefault);
                            } else {
                                $fullInformationObject.text(textToUpdate);
                            }
                        }
                    }
                    else {
                        visualFreeGames.console(
                            true, 'clearAndUpdateFilterInformationGroup', '\tCould not resolver element...',
                            {
                                '$fullInformationObject': $fullInformationObject,
                                'element': element,
                                'textToFindOrChange': textToFindOrChange
                            }
                        );
                    }
                });
                // return success
                return true;
            },

            /**
             * Set the text for
             *
             * @param dataGroup
             */
            swapInDefaultDataText: function (dataGroup) {
                // Container reference
                var sortInformationAndResetActionsContainer = visualFreeGames.getResourceElement('sortInformationAndResetActionsContainer');
                // TextPlaceholder element reference
                var sortInformationTextStringSelector = visualFreeGames.getResourceSelector('sortInformationTextString');
                // Validate references
                if (sortInformationAndResetActionsContainer === false || sortInformationTextStringSelector === false) {
                    visualFreeGames.console(true, 'swapInDefaultDataText',
                        visualFreeGames.errorMessages.missingElement,
                        {
                            'sortInformationAndResetActionsContainer': sortInformationAndResetActionsContainer,
                            'sortInformationTextStringSelector': sortInformationTextStringSelector
                        }
                    );
                    // Return failure
                    return false;
                }
                // Look up element
                var $objectWithTextToChange = sortInformationAndResetActionsContainer.find('[data-filter-type=' + dataGroup + ']');
                // Validate element
                if ($objectWithTextToChange.length === 0) {
                    visualFreeGames.console(true, 'swapInDefaultDataText',
                        visualFreeGames.errorMessages.missingElement,
                        {
                            '$objectWithTextToChange': $objectWithTextToChange,
                            '[data-filter-type=dataGroup]': '[data-filter-type=' + dataGroup + ']'
                        }
                    );
                    // Return failure
                    return false;
                }

                // Look up text
                var textToChangeTo = $objectWithTextToChange.data('information-default');
                // Validate value
                if (typeof textToChangeTo === 'undefined') {
                    visualFreeGames.console(true, 'swapInDefaultDataText',
                        'Data attribute "information-default" returned an undefined value'
                    );
                    // Return failure
                    return false;
                }
                // Search for text placeholder in element and set text
                $objectWithTextToChange.children(sortInformationTextStringSelector).text(textToChangeTo);
                // Return success
                return true;
            },

            /**
             * This function takes a click from either the list or grid view icon and then activates the necessary
             * function to process the request.
             *
             * Assumption - there will always be two elements to toggle view - list/grid
             */
            listenForGridOrListViewChange: function () {
                // Request Grid Action Trigger Element
                var gridViewActionElement = visualFreeGames.getResourceElement('gridViewActionElement');
                // Validate
                if (gridViewActionElement === false) {
                    visualFreeGames.console(true, 'listenForGridOrListViewChange',
                        "\tInvalid gridViewActionElement",
                        {'gridViewActionElement': gridViewActionElement}
                    );
                    // Return Failure
                    return false;
                }

                // Request Grid Action Trigger Element
                var listViewActionElement = visualFreeGames.getResourceElement('listViewActionElement');
                // Validate
                if (listViewActionElement === false) {
                    visualFreeGames.console(true, 'listenForGridOrListViewChange',
                        "\tInvalid listViewActionElement",
                        {'listViewActionElement': listViewActionElement}
                    );
                    // Return Failure
                    return false;
                }

                // Assign Listener - toggle grid view
                gridViewActionElement.on(
                    'click',
                    {reverseElement: listViewActionElement, action: 'grid'},
                    visualFreeGames.changeGamesDisplayMode
                );

                // Assign Listener - toggle list view
                listViewActionElement.on(
                    'click',
                    {reverseElement: gridViewActionElement, action: 'list'},
                    visualFreeGames.changeGamesDisplayMode
                );
                // Return success
                return true;
            },

            /**
             * This function takes a click on the list and grid view icons and then either applies or takes
             * away the listView class from the main container and toggles the active class on the icons
             * @param {object} e - The event object
             * @return {boolean} True
             */
            changeGamesDisplayMode: function (e) {
                // Prevent Default
                e.preventDefault();
                // Remove active state from reverse action element
                e.data.reverseElement.removeClass('active');
                // Add active state to clicked element
                $(this).addClass('active');
                // Get Container Reference
                var mainGameContainer = visualFreeGames.getResourceElement('mainGameContainer');
                // Switch / interpret action
                switch (e.data.action) {
                    case 'grid':
                        // Toggle if has class
                        if (mainGameContainer.hasClass('listView') === true) {
                            mainGameContainer.toggleClass('listView');
                        }
                        break;

                    case 'list':
                        // Toggle if missing class
                        if (mainGameContainer.hasClass('listView') === false) {
                            mainGameContainer.toggleClass('listView');
                        }
                        break;

                    default:
                        visualFreeGames.console(false, 'changeGamesDisplayMode',
                            'Requested unknown action',
                            {'action': e.data.action}
                        );
                        break;
                }
                //
                return false;
            },

            /**
             * This function takes a click from filter toggle icon and then activates the necessary
             * function to process the request.
             *  - only under mobile condition
             *
             * @return {boolean} True on success, else false
             */
            listenForShowFilterToggle: function () {
                // Get Element
                var filterViewActionElement = visualFreeGames.getResourceElement('filterViewActionElement');
                // Validate
                if (filterViewActionElement === false) {
                    visualFreeGames.console(true, 'listenForShowFilterToggle',
                        "\tInvalid filterViewActionElement",
                        {'filterViewActionElement': filterViewActionElement}
                    );
                    return false;
                }
                // Add listener
                filterViewActionElement.on(
                    'click',
                    visualFreeGames.changeFilterViewMode
                );
                // Return success
                return true;
            },

            /**
             * This function takes a click on the filter toggle icon and toggles the sort and filter containers
             * between the class `libraryViewHidden` to show/hide
             * @param {object} e - The event object
             *
             * @TODO MAY NEED REVIEW DEPENDING ON DESIGNS - DEFINE ELEMENTS TO HIDE VIA CONFIG? BY NAME REF
             */
            changeFilterViewMode: function (e) {
                //
                e.preventDefault();
                // Toggle 'active' class on element
                $(this).toggleClass('active');
                // Look for wrapper element - optional
                var wrapper = visualFreeGames.getResourceElement('filterToggleViewWrapContainer');
                // Validate
                if (wrapper !== false) {
                    // toggle wrapper if exists
                    wrapper.toggleClass('libraryViewHidden');
                }
                else {
                    // Toggle toggle class on/off for known individual elements
                    // Sort and Reset buttons -
                    var sortAndReset = visualFreeGames.getResourceElement('sortInformationAndResetActionsContainer');
                    // Validate
                    if (sortAndReset !== false) {
                        // Toggle visibility
                        sortAndReset.toggleClass('libraryViewHidden');
                    }
                    // Sort Filters
                    var sortFilterActionsContainer = visualFreeGames.getResourceElement('sortFilterActionsContainer');
                    // Validate
                    if (sortFilterActionsContainer !== false) {
                        // Toggle visibility
                        sortFilterActionsContainer.toggleClass('libraryViewHidden');
                    }
                }
            },

            /**
             * Triggers 'changeFilterViewMode' via jQuery.trigger() event for Mobile condition,
             * so that filter options are hidden and games are as high as possible
             */
            initFilterViewMode: function () {
                // Check mobile condition
                if (visualFreeGames.isMobile) {
                    // Trigger element - toggle filters
                    var libraryGamesFilters = visualFreeGames.getResourceElement('filterViewActionElement');
                    // Validate
                    if (libraryGamesFilters !== false) {
                        // Trigger
                        libraryGamesFilters.trigger('click');
                    }
                }
            },

            /**
             * Base API request
             *
             * @param {string} action API action to perform
             * @param {Object} dataParametersForRequest Data to send
             * @returns {*}
             */
            makeApiRequest: function (action, dataParametersForRequest) {
                // If undefined/null, set to Object
                if (!dataParametersForRequest) {
                    dataParametersForRequest = {};
                }

                // Add classInstance data to request
                dataParametersForRequest['classInstance'] = visualFreeGames.classInstanceDataObject;
                // Console out the request
                visualFreeGames.console(
                    false,
                    'makeApiRequest',
                    "\tAction : " + action,
                    dataParametersForRequest
                );
                // Return Promise to resolve/reject
                return Promise.resolve(
                    $.ajax({
                        method: "POST",
                        url: visualFreeGames.apiRequestUrl,
                        dataType: 'json',
                        data: {
                            data: dataParametersForRequest,
                            action: action
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            return {
                                'jqXHR': jqXHR,
                                'textStatus': textStatus,
                                'errorThrown': errorThrown,
                            }
                        }
                    })
                ).catch(function (reject) {
                    // Console Error - debug must be true
                    visualFreeGames.console(true, action, 'Promise was rejected! ', reject)
                    // Throw Error - stops execution under init() requests
                    throw Error("Action request for " + action + " : " + reject.responseText);
                });
            },

            /**
             * API request to request game
             *
             * @param gameId
             * @return {Promise} Promise to resolve
             */
            makeApiRequestForSingleGame: function (gameId) {
                var data = {
                    gameId: gameId
                };

                // Request
                return visualFreeGames.makeApiRequest(
                    visualFreeGames.apiActions.returnSingleGameInfo,
                    data
                );
            },


            /**
             * API request to get a set of filtered games
             *
             * @param gameId
             * @param initiator
             * @return {Promise} Promise to resolve
             */
            makeApiRequestForFilter: function (filterObject, initiator) {
                // Data package
                var data = {
                    providerId: visualFreeGames.providerMap[filterObject.provider],
                    orderById: visualFreeGames.orderByMap[filterObject.orderBy],
                    gameTypeId: visualFreeGames.gameTypeMap[filterObject.gameType],
                    startingNumberForSlice: filterObject.startingNumberForSlice,
                    numberOfItemsToInclude: filterObject.numberOfItemsToInclude,
                    initiatedBy: initiator,
                    searchString: filterObject.search
                };

                // Request
                return visualFreeGames.makeApiRequest(
                    visualFreeGames.apiActions.returnFilteredGames,
                    data
                );
            },

            /**
             * API request to log gaming time
             *  - how long was Lightbox open for
             *
             * @param data Data to serve
             * @returns (Promise) Promise request
             */
            makeApiRequestLogGamingTime: function (data) {
                return visualFreeGames.makeApiRequest(
                    visualFreeGames.apiActions.insertGamingTime,
                    data
                );
            },

            /**
             * Make API request to report broken game
             *
             * @param gameid Id of game to report
             * @returns (Promise) Promise
             */
            makeApiRequestForFeedback: function (data) {
                return visualFreeGames.makeApiRequest(
                    visualFreeGames.apiActions.insertFeedback,
                    data
                );
            },


            makeApiRequestForRating: function (data) {
                return visualFreeGames.makeApiRequest(
                    visualFreeGames.apiActions.insertRating,
                    data
                );
            },

            makeApiRequestForTemplate: function (data) {
                return visualFreeGames.makeApiRequest(
                    visualFreeGames.apiActions.getTemplate,
                    data
                );
            },

            /**
             * Listen to game rating click
             *
             * Setup hover() listener on "stars" to manipulate UI state,
             * and click() listener to record action
             *
             * @param {jQuery} $element Element to process/search for Feedback Element
             * @return {boolean} False on missing element, else undefined
             */
            initRatings: function ($element) {
                // Element selector reference
                var ratingsContainerSelector = visualFreeGames.getResourceSelector('gameRatingActionContainer');
                // Ratings Element Container
                var ratingsContainer = visualFreeGames.validateRequestedExistence($element, ratingsContainerSelector );
                // Validate
                if (ratingsContainer === false) {
                    // Print message
                    visualFreeGames.console(true, "initRatings", visualFreeGames.errorMessages.validateRequestedExistence,
                        {'$element': $element, 'ratingsContainerSelector': ratingsContainerSelector}
                    );
                    // Return failure
                    return false;
                }

                // Ratings Element Selector
                var ratingsElementSelector = visualFreeGames.getResourceSelector('gameRatingActionElement');
                // Ratings Element
                var ratingsElement = visualFreeGames.validateRequestedExistence(ratingsContainer, ratingsElementSelector);
                // Validate
                if (ratingsElement === false) {
                    // Print message
                    visualFreeGames.console(true, "initRatings", visualFreeGames.errorMessages.validateRequestedExistence,
                        {'ratingsContainer': ratingsContainer,'ratingsElementSelector': ratingsElementSelector}
                    );
                    // Return failure
                    return false;
                }

                // Validate - enforce one element
                if(ratingsElement.length > 1){
                    ratingsElement = ratingsElement[0];
                }

                // Individual rating triggers - `star`
                var ratingElementIndividual = ratingsElement.children();
                // Validate
                if (ratingElementIndividual.length === 0) {
                    visualFreeGames.console(true, 'initRatings', 'No rating element children!',{'ratingsElements' : ratingsElement});
                    return false;
                }

                // Validation Complete - logic

                // Attach rating element listeners - hover + click
                ratingElementIndividual
                // onHover - manipulate each child <li> element
                    .hover(
                        function () {
                            // Position reference for element hovering over
                            var pos = $(this).index();
                            // Cycle over all elements and 'active' anything less<=position
                            ratingElementIndividual.each(function (index) {
                                var $li = $(this);
                                // add class to anything before or equal to
                                if (index <= pos) {
                                    $li.addClass('active');
                                }
                                else {
                                    $li.removeClass('active');
                                }
                            });
                        },
                        function () {
                            // remove all 'active' states - reset to blanks on hover leave
                            ratingElementIndividual.each(function () {
                                // Remove class
                                $(this).removeClass('active');
                            });
                        }
                    )
                    // onClick - API request to record ratings
                    .on('click', function () {
                        // Get gameId reference
                        var gameId = visualFreeGames.getGameId();
                        // Count number of active <li> elements
                        var scoreSmall = ratingElementIndividual.filter('.active').length;
                        // Calculate score out of 100
                        var score = scoreSmall * 2 * 10;
                        // Payload
                        var data = {
                            gameId: gameId,
                            score: score
                        }

                        // Record Rating
                        visualFreeGames.makeApiRequestForRating(data);


                        // update all rating elements with result of scoreSmall
                        //  - number of elements to set to active

                        var modal = visualFreeGames.getResourceElement('modalElement');
                        // Ratings Element
                        var ratingsContainer = visualFreeGames.validateRequestedExistence(modal, ratingsContainerSelector);
                        // Validate Element
                        if (ratingsContainer.length === 0) {
                            visualFreeGames.console(true, 'initRatings:click', 'Could not resolve element!',
                                {'ratingsContainer' : ratingsContainer}
                            );
                            return false;
                        }

                        // Process each ratings container that may exist in view
                        ratingsContainer.each(function(){
                            // Ratings Container
                            var $ratingContainer = $(this);
                            // Star rating elements
                            var children = $ratingContainer.find(ratingsElementSelector).children();
                            // Set all to selected rating
                            children.each(function (index) {
                                if (index < scoreSmall) {
                                    this.classList.add('active');
                                }
                            });

                            // Disable listener
                            visualFreeGames.disableRatingsHandler(children);
                            // Display a message to the user
                            visualFreeGames.endingEffects($ratingContainer);
                        });

                    });
            },

            /**
             * Disable rating listeners and run endingEffects
             *
             * @see endingEffects()
             * @param $lightbox Container element hosting feedback element
             * @param $ratingsElements Ratings element to disable listeners on
             */
            disableRatingsHandler: function ($ratingsElements) {
                // Remove all .on() listeners
                $ratingsElements.off();
            },

            /**
             * End ratings action, display a confirmation message to the user.
             *
             * Desktop - fn will check for additional element `gameRatingCallToAction`
             * Mobile - fn adds class 'show' to placeholder to display message
             *
             * @see getRatingResponseMessage
             * @param feedbackContainer Container/element to search for message placeholder
             */
            endingEffects: function (feedbackContainer) {
                // Element selector
                var gameRatingResponsePlaceholder = visualFreeGames.getResourceSelector('gameRatingResponsePlaceholder');
                // - only on Desktop element
                var gameRatingCallToAction = visualFreeGames.getResourceSelector('gameRatingCallToAction');
                // Rating message to display
                var ratingMessage = visualFreeGames.getRatingResponseMessage();
                // validate exists
                var messagePlaceholder = visualFreeGames.validateRequestedExistence(feedbackContainer, gameRatingResponsePlaceholder),
                    gameRatingCallToActionPlaceholder = visualFreeGames.validateRequestedExistence(feedbackContainer, gameRatingCallToAction);
                //
                if(messagePlaceholder === false){
                    visualFreeGames.console(true, 'endingEffects',
                        visualFreeGames.errorMessages.validateRequestedExistence,
                        {'feedbackContainer' : feedbackContainer, 'gameRatingResponsePlaceholder' : gameRatingResponsePlaceholder}
                    );
                    return false;
                }

                // Apply message - use html() so don't need to adapt if choose to use HTML (entities) in message
                messagePlaceholder.html(ratingMessage);

                // Under desktop
                if(visualFreeGames.isMobile === false){
                    if(gameRatingCallToActionPlaceholder === false){
                        visualFreeGames.console(true, 'endingEffects',
                            visualFreeGames.errorMessages.validateRequestedExistence,
                            {'feedbackContainer' : feedbackContainer, 'gameRatingCallToActionPlaceholder' : gameRatingCallToActionPlaceholder}
                        );
                        return false;
                    }

                    //additionally remove the ratings call to action
                    gameRatingCallToActionPlaceholder.hide();
                }
                // Under mobile need attach class 'show' to make message visible
                else if (visualFreeGames.isMobile === true) {
                    messagePlaceholder.addClass('show');
                }
            },

            /**
             * Validate feedback message found under config object.
             * If message is valid return the set message, else return `Message is not a string`
             *
             * @return {string} Message to display
             */
            getRatingResponseMessage : function(){
                // Message reference
                var message = visualFreeGames.config.gameRatingResponse;
                // Validate and return
                return typeof message === 'string' ? message : 'Message is not a string';
            },

            // @TODO ? What does this do?
            // Not implemented anywhere yet...
            checkNewFlagCount: function () {
                //var wantedNewFlagAmount = freeGamesConfigVars.classInstanceVars();
                var classInstanceVars = freeGamesConfigVars.classInstanceVars(),
                    currentCount = $('span.new-orange').length + $('span.new-blue').length + $('span.new-green').length + $('span.new-red').length + $('span.new-purple').length;

                var flagsNeeded = classInstanceVars['newFlagCount'] - currentCount;
                return flagsNeeded;
            },

            ////
            // Modal methods
            ////
            /**
             * Creates Modal element,
             *  appends it to the document and returns a reference to the element
             *
             * @returns {jQuery} Modal element reference
             */
            createScreen: function () {
                // Request element - may not exist
                var modalElement = visualFreeGames.getResourceElement('modalElement');
                // Request selector
                var modalIdentifier = visualFreeGames.getResourceIdentifier('modalElement');
                // Validate existence - create element
                if (modalElement === false && modalIdentifier !== false) {
                    // Create element and append
                    modalElement =
                        $('<div></div>')
                            .attr('id', modalIdentifier)
                            // Hide it..
                            .hide()
                            // Add to view
                            .prependTo(document.body);
                }
                // Return element reference
                return modalElement;
            },

            /**
             * Show Modal element
             */
            showScreen: function () {
                // Get element
                var modalElement = visualFreeGames.getResourceElement('modalElement');
                // Validate
                if (modalElement) {
                    // Show
                    modalElement.show();
                    // ?
                    // $('html, body').animate({
                    //     scrollTop: modalElement.offset().top
                    // }, 1);
                }
            },

            /**
             * Attach Element to Modal, prevents duplicate.
             *
             * If Element to attach is already present in Modal,
             * it will be treated as duplicate and not be appended
             *
             * @param element
             */
            attachToScreen: function (element) {
                var modalElement = visualFreeGames.getResourceElement('modalElement');

                if (modalElement !== false) {
                    // Check for duplicate element
                    if (visualFreeGames.isChildDuplicated(modalElement, element)) {
                        return false;
                    }

                    modalElement.append(element);
                }
            },

            /**
             * Hide Modal element,
             * and empty contents if param is true
             *
             * @param {boolean} clearContents True to clear content
             */
            hideScreen: function (clearContents) {
                if (clearContents === true) {
                    visualFreeGames.emptyScreen();
                }

                var modalElement = visualFreeGames.getResourceElement('modalElement');

                if (modalElement !== false) {
                    modalElement.hide();
                }
            },

            /**
             * Empty/clear modal screen content
             */
            emptyScreen: function () {
                var modalElement = visualFreeGames.getResourceElement('modalElement');

                if (modalElement !== false) {
                    modalElement.empty();
                }
            },

            /**
             * Check for duplicate Node element under Parent element
             * Function will cast parent/node to required entity type jquery/Node
             *
             * @param parent jQuery Element
             * @param element Node Element
             */
            isChildDuplicated: function (parent, element) {
                if (visualFreeGames.isJqueryInstance(parent) === false) {
                    parent = $(parent);
                }

                if (visualFreeGames.isJqueryInstance(element) === true) {
                    element = element[0];
                }

                var duplicate = false;

                parent.children().each(function (index, childElement) {
                    // Node comparison, prevent duplicate attachment
                    if (childElement.isEqualNode(element)) {
                        return duplicate = true;
                    }
                });

                return duplicate;
            },

            ////
            // Lightbox methods
            ////

            /**
             * This function adds the game to the screen in a lightbox
             *
             * @param {Object} data Game to append/show
             * @param {boolean} inFullscreen True to trigger as fullscreen, else false
             */
            showGameInLightbox: function (data, inFullscreen) {
                // Resolve modal element
                var modalElement = visualFreeGames.getResourceElement('modalElement');
                // Validate
                if (modalElement) {
                    // Lightbox element reference
                    var $lightbox = $(data.lightbox);

                    // Append to modal
                    $lightbox.appendTo(modalElement);
                    // Set lightbox width/height constraints before showing - desktop only
                    visualFreeGames.lightboxFitToScreen();

                    // Init Social
                    visualFreeGames.initSocial($lightbox)
                    // Initialise ratings (star) listener
                    visualFreeGames.initRatings($lightbox);
                    // Full screen listener
                    visualFreeGames.listenForLightboxFullscreen($lightbox, inFullscreen);
                    // Feedback listener - ON DESKTOP
                    visualFreeGames.listenForFeedback($lightbox);
                    // Close listener
                    visualFreeGames.listenForLightboxClose($lightbox);
                    // Resize listener
                    visualFreeGames.listenForResize();
                    // Hide window scroll bars (disable background scrolling)
                    visualFreeGames.toggleScrollBarsVisible(false);

                    // LazyLoad images - provider/partner
                    visualFreeGames.loadLazyImages($lightbox);

                    // Show modal screen
                    visualFreeGames.showScreen();
                }
            },

            /**
             * Listen to game close
             *  - Desktop simply close
             *  - Mobile need to provide feedback option
             *
             * @param $lightbox
             */
            listenForLightboxClose: function ($lightbox) {
                // Record lightbox load / game start time
                visualFreeGames.gamingTimeStart($lightbox);
                //
                var btnCloseSelector = '.' + visualFreeGames.visualClasses.LB_btnCloseSelector;
                // Setup listener
                $lightbox.on('click', btnCloseSelector, function (e) {
                    // Reset flag
                    visualFreeGames.isFullscreenAPI = false;

                    // On Lightbox close record gaming time
                    visualFreeGames.insertGamingTimeExecute($lightbox);
                    // Display feedback form on mobile devices
                    if (visualFreeGames.isMobile) {
                        // Remove listener - may rotate on game finish
                        visualFreeGames.removeListenerScreenOrientation();
                        // Validate - is feedback supported / requested
                        if(visualFreeGames.config.showFeedback === true) {
                            // Show feedback element
                            visualFreeGames.showMobileFeedbackForm();
                        }
                        else{
                            visualFreeGames.closeLightbox();
                        }
                    }
                    else {
                        // Remove listener - lightbox resize on resize
                        visualFreeGames.removeListenerWindowResize();
                        // Close lightbox action
                        visualFreeGames.closeLightbox();
                    }
                    // Show/enable scroll bars
                    visualFreeGames.toggleScrollBarsVisible(true);
                });
            },

            /**
             * Close game lightbox container action
             *  - hide modal and clear contents
             *  - enable game click handler (can select a game)
             */
            closeLightbox: function () {
                // Exit fullscreen
                visualFreeGames.toggleFullscreenApi(false);
                // Hide the modal, and empty
                visualFreeGames.hideScreen(true);
                // Toggle game click listener on
                visualFreeGames.toggleSingleGameClickHandler(true);

                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.lightboxClose);
            },

            /**
             * Listener for Lightbox fullscreen
             *
             * @param {jQuery} $lightbox Lightbox element
             * @param {boolean} triggerFullscreen Trigger fullscreen
             * @returns {boolean} False on error/missing element(s), else undefined
             */
            listenForLightboxFullscreen: function ($lightbox, triggerFullscreen) {
                // Element selector reference
                var resizeButtonSelector = '.' + visualFreeGames.visualClasses.LB_btnResizeSelector;
                // Ratings Element
                var resizeButtonElement = visualFreeGames.validateRequestedExistence(
                    $lightbox,
                    resizeButtonSelector
                );

                // Validate element exists - i.e. user can trigger manually
                if(resizeButtonElement !== false) {
                    // Add click action listener
                    resizeButtonElement.on('click', function (e) {
                        e.preventDefault();
                        // Where $(this) is the resize button
                        visualFreeGames.lightboxFitToFullscreen($lightbox, $(this));
                    });
                }

                // Flag trigger to full screen under mobile
                if (triggerFullscreen === true) {
                    if(resizeButtonElement !== false) {
                        // Remove full screen toggle option under Mobile, always fullscreen
                        resizeButtonElement.remove();
                    }

                    visualFreeGames.lightboxFitToFullscreen($lightbox, resizeButtonElement);
                }
            },

            /*
             * Fullscreen API
             *  - Note that requests to Fullscreen API can only be requested via user triggered Events
             *  due to security constraint preventing automatic issue of the request
             *
             * References;
             *  https://developer.mozilla.org/en-US/docs/Web/API/Fullscreen_API
             *  https://hacks.mozilla.org/2012/01/using-the-fullscreen-api-in-web-browsers/
             *  https://developers.google.com/web/fundamentals/native-hardware/fullscreen/
             */

            /**
             * Check if Window API is in fullscreen
             * @return {boolean}
             */
            isFullscreenApiActive: function () {
                //
                if (!document.fullscreenElement &&    // alternative standard method
                    !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
                    return false;
                }

                return true;
            },

            /**
             * Toggle Window to fullscreen via API
             *
             * Checks whether current API state matches requested action,
             * if different will then call() the relevant function, else ignore
             *
             * Prevent unnecessary calls() that will trigger 'fullscreenchange' Event
             *
             * @param enable
             */
            toggleFullscreenApi: function (enable) {
                // Document Element
                var docEl = document.documentElement;
                // Request function to use..
                var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
                // Cancel function to use...
                var cancelFullScreen = document.exitFullscreen || document.mozCancelFullScreen || document.webkitExitFullscreen || document.msExitFullscreen;

                if (enable) {
                    // Check that not already in fullscreen
                    if (visualFreeGames.isFullscreenApiActive() === false) {
                        requestFullScreen.call(docEl);
                    }
                }
                else {
                    // Check are in fullscreen
                    if (visualFreeGames.isFullscreenApiActive() === true) {
                        cancelFullScreen.call(document);
                    }
                }
            },

            /**
             * Get fullscreen API Browser specific `eventname`,
             *
             * @return {string|boolean} Event name if supported, else False
             */
            getFullscreenApiEventName: function () {
                // Document reference
                var doc = document;
                // fullscreenAPI event name - false for not unsupported
                var eventName = false;
                // Modify event named based on fullscreenAPI function call
                if (doc.requestFullscreen) {
                    eventName = 'fullscreenchange';
                }
                else if (doc.mozCancelFullScreen) {
                    eventName = 'mozfullscreenchange';
                }
                else if (doc.webkitExitFullscreen) {
                    eventName = 'webkitfullscreenchange';
                }
                else if (doc.msExitFullscreen) {
                    eventName = 'msfullscreenchange';
                }

                return eventName;
            },

            /**
             * Toggle Fullscreen API event listener on or off,
             * for Browser dependent EventName
             *
             * @param {boolean} toggle True to add, False to remove
             */
            attachListenFullscreenAPI: function (toggle) {
                // Get Browser dependent event name
                var eventName = visualFreeGames.getFullscreenApiEventName();
                // Validate support
                if (eventName === false) {
                    return false;
                }

                if (toggle === true) {
                    document.addEventListener(eventName, visualFreeGames.listenerFullscreenApi);

                    // Request fullscreen via API
                    // - note that this can only be done via eventListener triggered by 'click'
                    visualFreeGames.toggleFullscreenApi(true);
                }
                else {
                    document.removeEventListener(eventName, visualFreeGames.listenerFullscreenApi);
                }
            },

            /**
             * Fullscreen API listener action for 'fullscreenchange' Event
             *
             * @see listenerScreenOrientation()
             */
            listenerFullscreenApi: function () {
                if (visualFreeGames.hasOwnProperty(visualFreeGames.orientationListenerName)) {
                    var gameId = visualFreeGames[visualFreeGames.orientationListenerName].id;
                    visualFreeGames.listenerScreenOrientation(gameId);
                }
            },

            /**
             * Make Lightbox fullscreen
             *  - calculates the available height dimension in Window to be applied to game container
             *
             *  - on make fullscreen
             *      - hides Lightbox header and footer (via class addition)
             *      - changes button icon
             *
             *  - on revert fullscreen
             *      - reverts all css/manipulations to originial state
             *
             * Requires/uses font-awesome for expand/collapse icons
             *  - fa-expand
             *  - fa-compress
             *
             * @param {jQuery} $lightbox Lightbox element
             * @param {jQuery} $triggerButton Trigger element (btn)
             * @return {boolean} False on error
             */
            lightboxFitToFullscreen: function ($lightbox, $triggerButton) {
                // Element references

                // iFrame game container
                var $gameContainer = $lightbox.find('#' + visualFreeGames.visualIds.LB_fancyIFrameContainer);
                // Close button
                var $btnClose = $lightbox.find('.' + visualFreeGames.visualClasses.LB_btnCloseSelector);

                if ($gameContainer.length === 0 || $btnClose.length === 0) {
                    visualFreeGames.console(
                        true, 'lightboxFitToFullscreen', '\tMissing reference elements!\n\tPreventing execution...',
                        {
                            gameContainer : $gameContainer,
                            btnClose : $btnClose
                        });
                    return false;
                }

                // Default trigger true
                var actionExpand = true;
                //
                var icon = false;
                // Validate trigger button - might not exist in UI
                if($triggerButton !== false) {
                    // Action icon
                    icon = $triggerButton.children('i');
                    // Action to perform, based on class identifier
                    actionExpand = icon.hasClass(visualFreeGames.iconLightboxExpand);
                }
                // Default Lightbox Game Container manipulation
                var cssManipulationGame = {
                    'padding-bottom': '',
                    'height': ''
                }

                // Lightbox content header
                var lightBoxHeader = $lightbox.find('#' + visualFreeGames.visualIds.LB_fancyContentHeader);
                // Lightbox content footer
                var lightBoxFooter = $lightbox.find('#' + visualFreeGames.visualIds.LB_fancyContentFooter);

                if (lightBoxHeader.length === 0 || lightBoxFooter.length === 0) {
                    visualFreeGames.console(
                        true,
                        'lightboxFitToFullscreen',
                        '\tMissing reference elements for header and footer!'
                    );
                    //return false;
                }

                // Manipulate view based on action
                if (actionExpand) {
                    // Set manipulation values
                    cssManipulationGame['padding-bottom'] = '0';
                    cssManipulationGame['height'] = visualFreeGames.lightboxFitToFullscreenCalculateHeight($lightbox);
                    // Apply manipulation
                    $gameContainer.css(cssManipulationGame);
                    // Apply manipulation class
                    $lightbox.addClass(visualFreeGames.visualClasses.LB_fancyBoxFullscreen);

                    // Hide header + footer under mobile
                    if (visualFreeGames.isMobile) {
                        // Hide header
                        if(lightBoxHeader.length !== 0) {
                            lightBoxHeader.addClass(visualFreeGames.visualClasses.LB_hiddenElement);
                        }
                        // Hide footer
                        if(lightBoxFooter.length !== 0) {
                            lightBoxFooter.addClass(visualFreeGames.visualClasses.LB_hiddenElement);
                        }
                    }
                    // Apply manipulation class >> alters button position in view
                    $btnClose.addClass(visualFreeGames.visualClasses.LB_btnCloseSelectorFullscreen);
                    // Apply manipulation class >> alters button position in view
                    if($triggerButton !== false) {
                        $triggerButton.addClass(visualFreeGames.visualClasses.LB_btnResizeSelectorFullscreen);
                    }
                    // Toggle action icon
                    if(icon) {
                        icon.removeClass(visualFreeGames.iconLightboxExpand).addClass(visualFreeGames.iconLightboxCompress);
                    }
                }
                else {
                    // Apply manipulation >> resets to original values / removes js added style
                    $gameContainer.css(cssManipulationGame);
                    // Remove manipulation class
                    $lightbox.removeClass(visualFreeGames.visualClasses.LB_fancyBoxFullscreen);
                    // Remove manipulation class
                    if(lightBoxHeader.length !== 0) {
                        lightBoxHeader.removeClass(visualFreeGames.visualClasses.LB_hiddenElement);
                    }
                    // Remove manipulation class
                    if(lightBoxFooter.length !== 0) {
                        lightBoxFooter.removeClass(visualFreeGames.visualClasses.LB_hiddenElement);
                    }
                    // Remove manipulation class
                    $btnClose.removeClass(visualFreeGames.visualClasses.LB_btnCloseSelectorFullscreen);
                    // Remove manipulation class
                    if($triggerButton !== false) {
                        $triggerButton.removeClass(visualFreeGames.visualClasses.LB_btnResizeSelectorFullscreen);
                    }
                    // Toggle action icon
                    if(icon) {
                        icon.removeClass(visualFreeGames.iconLightboxCompress).addClass(visualFreeGames.iconLightboxExpand);
                    }
                }

                // Monitor if in fullscreen
                visualFreeGames.isFullscreenAPI = actionExpand;

                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.lightboxFitToFullscreen);
            },

            /**
             * Calculate maximum available height dimension,
             * that lightbox game container can occupy
             *
             * @param $lightbox
             * @return {number}
             */
            lightboxFitToFullscreenCalculateHeight: function ($lightbox) {
                // Available window height -> iOS window.outerHeight returns 0
                var wHeight = window.innerHeight;

                // Lightbox height(s) to factor in available space calculations
                // Header height
                var eHeightHeader = 0;
                // Footer height
                var eHeightFooter = 0;

                // Under desktop need to factor heights
                if (visualFreeGames.isMobile === false) {
                    // Header Height
                    eHeightHeader = $lightbox.find('#' + visualFreeGames.visualIds.LB_fancyContentHeader).outerHeight(true);
                    // Footer Height
                    eHeightFooter = $lightbox.find('#' + visualFreeGames.visualIds.LB_fancyContentFooter).outerHeight(true);
                }
                // Calculate available height
                var dimension = ( wHeight ) - eHeightHeader - eHeightFooter;
                // Console out values
                visualFreeGames.console(
                    false,
                    'lightboxFitToFullscreenCalculateHeight',
                    'Numbers:',
                    {
                        wHeight : wHeight,
                        eHeightHeader: eHeightHeader,
                        eHeightFooter : eHeightFooter,
                        dimension : dimension
                    }
                );
                // Return available height
                return dimension;
            },

            /**
             * Set lighbox game container height,
             * on window resize under Desktop + Fullscreen
             *
             * @param $lightbox
             */
            lightboxFitToFullscreenOnResize: function ($lightbox) {
                // iFrame game container
                var $gameContainer = $lightbox.find('#' + visualFreeGames.visualIds.LB_fancyIFrameContainer);

                var cssManipulationGame = {height: visualFreeGames.lightboxFitToFullscreenCalculateHeight($lightbox)}
                // Apply manipulation
                $gameContainer.css(cssManipulationGame);

                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.lightboxFitToFullscreenOnResize);
            },

            /**
             * Manipulate Lightbox/Game container dimensions to fit in viewport,
             * only for Desktop scenario
             *
             *  default - calculate/set available container dimensions for given aspect ratio
             *  fullscreen - calculate/set height dimension for game container and updates
             *
             */
            lightboxFitToScreen: function () {
                // Only apply to Desktop..
                if (visualFreeGames.isMobile === false) {
                    // Get lightbox from Modal...
                    var $lightbox = visualFreeGames.getResourceElement('modalElement').children();
                    //
                    if ($lightbox.length !== 0) {
                        if (visualFreeGames.isFullscreenAPI) {
                            visualFreeGames.lightboxFitToFullscreenOnResize($lightbox);
                        }
                        else {
                            visualFreeGames.lightboxFitToAspectRation($lightbox);
                        }
                    }
                }

                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.lightboxFitToScreen);
            },

            /**
             * Calculate available lightbox game container dimension,
             * constraint to aspect ratio
             *
             * @param $lightbox
             */
            lightboxFitToAspectRation: function ($lightbox) {
                // Get aspect ratio
                var isAspect43 = $lightbox.hasClass(visualFreeGames.visualClasses.LB_aspectRatio43);
                // Game Content element - wraps around header + footer + iframe/object wrapper
                var lightboxContent = $lightbox.find('#' + visualFreeGames.visualIds.LB_fancyContent);
                // window height + width ref
                var wHeight = window.innerHeight, wWidth = window.innerWidth;
                // Lightbox header/footer heigth ref
                var lightboxHeaderHeight = 0, lightboxFooterHeight = 0;
                // ultimately marginW controls padding/margin
                var marginH = 0, marginW = 100;

                // On lightbox content found
                if (lightboxContent.length !== 0) {
                    // validate have selector selector
                    if(visualFreeGames.visualIds.LB_fancyContentHeader) {
                        // convert to class selector
                        var headerClassSelector = '#' + visualFreeGames.visualIds.LB_fancyContentHeader;
                        // lookup header element
                        var lightBoxHeader = lightboxContent.find(headerClassSelector);
                        // validate exists
                        if(lightBoxHeader.length !== 0){
                            // update header height value
                            lightboxHeaderHeight = lightBoxHeader.outerHeight();
                        }
                    }
                    // validate have selector
                    if(visualFreeGames.visualIds.LB_fancyContentFooter){
                        // convert to class selector
                        var footerSelector = '#' + visualFreeGames.visualIds.LB_fancyContentFooter;
                        // lookup footer element
                        var lightBoxFooter = lightboxContent.find(footerSelector);
                        // validate exists
                        if(lightBoxFooter.length !== 0){
                            // update footer height value
                            lightboxFooterHeight = lightBoxFooter.outerHeight();
                        }
                    }
                }

                // Run calculations...
                var availableHeight = (wHeight - lightboxHeaderHeight - lightboxFooterHeight - marginH);
                // Max Width for given aspect ration for given height...
                var maxWidth = visualFreeGames.getAspectRationWidth(availableHeight, isAspect43);
                // Validate width dimensions, constrain to smallest dimension
                if (maxWidth > wWidth) {
                    maxWidth = wWidth;
                }
                // Apply a margin
                maxWidth -= marginW;

                // Apply width dimension to Lightbox
                $lightbox.css('width', maxWidth);
            },

            /**
             * Calculate height dimension,
             * for given aspect ration width dimension
             *
             * @param {int} w Width
             * @param {bool} isAspect43 True if aspect ratio is 4:3, false 16:9
             * @return {number} Resulting height
             */
            getAspectRationHeight: function (w, isAspect43) {
                return isAspect43 ? ( w / 4) * 3 : ( w / 16) * 9;
            },

            /**
             * Calculate width dimension,
             * for given aspect ration height dimension
             *
             * @param {int} h Height
             * @param {bool} isAspect43 True if aspect ratio is 4:3, false 16:9
             * @return {number} Resulting width
             */
            getAspectRationWidth: function (h, isAspect43) {
                return isAspect43 ? ( h / 3) * 4 : ( h / 9) * 16;
            },

            /**
             * Hide HTML overflow content scrollbars,
             * prevent background scrolling while playing a game
             *
             * @param show True to show, false to hide
             *
             * NOTE - removing all other style changes other the overflow fixes CORG white space issue
             */
            toggleScrollBarsVisible: function (show) {
                //return false;
                if (show) {
                    // Reset anything that has been added/modified
                    //
                    // <html>
                    //       document.documentElement.style.position = '';
                    // <body>
                    //document.body.style.position = '';
                    document.body.style.overflow = '';
                    // // iOS touchmove event
                    // if (visualFreeGames.isMobile === true) {
                    //     document.body.removeEventListener("touchmove", visualFreeGames.preventTouchScroll, false);
                    // }
                }
                else {
                    // <html>
                    //        document.documentElement.style.position = 'fixed';
                    // <body>
                    //document.body.style.position = 'fixed';
                    document.body.style.overflow = 'hidden';
                    // // iOS touchmove event
                    // if (visualFreeGames.isMobile === true) {
                    //     document.body.addEventListener("touchmove", visualFreeGames.preventTouchScroll, false);
                    // }
                }
            },

            /**
             * Prevent content scrolling when modal is in view for mobile devices
             *
             * @ TODO evaluate real need, use of this - is it actually doing something useful ?
             * @param e
             */
            preventTouchScroll: function (e) {
                e.preventDefault();
                visualFreeGames.console(false, 'preventTouchScroll', '?', {'e':e});
                return false;
            },

            /**
             * Check if orientation is in landscape mode
             * Should be used with isMobile flag/check to ignore desktop portrait modes
             * @returns {boolean}
             */
            isOrientationLandscape: function () {
                return (window.innerHeight < window.innerWidth);
            },

            /**
             * Record dismiss status for orientation message display
             *
             * @param {boolean} val Status to set
             * @return {boolean} True on success, else False
             */
            setOrientationMessageStatus: function (val) {
                // Validate
                if (typeof val !== 'boolean') {
                    visualFreeGames.console(true, 'setOrientationMessageStatus', '\tBoolean expected, type `' + typeof val + '` given!\n\tPreventing execution...');
                    return false;
                }
                // Set value
                visualFreeGames.orientationMessageDismissed = val;
                // Return success
                return true;
            },

            /**
             * Retrieve dismissed status for orientation message display
             * @return {boolean}
             */
            getOrientationMessageStatus: function () {
                return visualFreeGames.orientationMessageDismissed;
            },

            /**
             * Setup listener 'orientationchange' event
             * On setup creates an object reference to track variables needed for/during any orientation changes
             *  - id    :   reference to clicked game >> used to load game once orientation is landscape
             *  - game  :   reference to whether a game has been loaded >> if true hide game on wrong orientation
             *
             * @param gameIdClicked Game id to load
             */
            listenForScreenOrientation: function (gameId) {
                // orientationchange {} variables
                visualFreeGames[visualFreeGames.orientationListenerName] = {
                    'id': gameId,
                    'game': false
                };

                // Add event lister, where isMobile check has already been evaluated
                window.addEventListener(visualFreeGames.orientationListenerName, visualFreeGames.listenerScreenOrientation);

                // Trigger the event so that a check is run immediately
                // - as is 'resize' Event should be cross compatible
                window.dispatchEvent(new Event(visualFreeGames.orientationListenerName));
            },

            /**
             * Screen orientation listener actions
             *  - before game load,
             *      - screen is not landscape > notify
             *      - screen is corrected > trigger game load
             *
             *  - game loaded
             *      - orientation changed > store game element reference
             *      - orientation corrected > reload/show game
             *
             */
            listenerScreenOrientation: function () {
                // Check have {} reference
                if (!visualFreeGames.hasOwnProperty(visualFreeGames.orientationListenerName)) {
                    visualFreeGames.console(true, "listenerScreenOrientation",
                        "\tMissing visualFreeGames.orientationListenerName property! Preventing execution...",
                        {'visualFreeGames.orientationListenerName': visualFreeGames.orientationListenerName}
                    )
                    return false;
                }

                // Flag >> is game loaded
                var isGameLoaded = visualFreeGames[visualFreeGames.orientationListenerName]['game'];
                // Flag >> is orientation in landscape
                var isOrientationLandscape = visualFreeGames.isOrientationLandscape();
                // Orientation notice message not been shown yet...
                if (visualFreeGames.getOrientationMessageStatus() === false) {
                    // Orientation is wrong (not landscape) AND user not been notified regarding orientation
                    if (isOrientationLandscape === false) {
                        visualFreeGames.orientationGameNotify();
                    }
                    // Orientation was wrong, message was shown, user rotated
                    else {
                        // update flag
                        visualFreeGames.setOrientationMessageStatus(true);
                    }
                }

                // Orientation notice shown, no game requested yet
                if (visualFreeGames.getOrientationMessageStatus() === true && isGameLoaded === false) {
                    visualFreeGames.orientationGameRequest();
                }

            },

            /**
             * Remove listener 'orientationchange'
             * Deletes Object{} reference and removes the listener
             */
            removeListenerScreenOrientation: function () {
                // delete object reference
                if (visualFreeGames.hasOwnProperty(visualFreeGames.orientationListenerName)) {
                    delete visualFreeGames[visualFreeGames.orientationListenerName];
                }
                // Remove Fullscreen API listener
                visualFreeGames.attachListenFullscreenAPI(false);

                // remove window orientation listener
                window.removeEventListener(visualFreeGames.orientationListenerName, visualFreeGames.listenerScreenOrientation);
            },

            /**
             * Window `resize` listener
             *
             * @see lightboxFitToScreen()
             */
            listenForResize: function () {
                window.addEventListener('resize', visualFreeGames.lightboxFitToScreen);
            },

            /**
             * Remove Window `resize` listener
             */
            removeListenerWindowResize: function () {
                window.removeEventListener('resize', visualFreeGames.lightboxFitToScreen);
            },

            /**
             * Create an orientation notification
             *
             * @returns {jQuery|HTMLElement} Notification node/element to attach
             */
            orientationNoticeCreate: function () {
                // Notice to display
                var rotateNotification = visualFreeGames.attachListenersOrientationNotice(visualFreeGames.templates.orientationNotice.html);
                // Load any images
                visualFreeGames.loadLazyImages(rotateNotification);
                // Return element
                return rotateNotification;
            },

            /**
             * Attach orientation element listeners
             *  - visualFreeGames.orientationNoticeDismissAndPlay
             *  - visualFreeGames.orientationNoticeClose
             *
             * @param orientationHtml
             * @return {jQuery} Element with listeners
             */
            attachListenersOrientationNotice: function (orientationHtml) {

                if (orientationHtml === false) {
                    return false;
                }
                // Validate element as instance of jQuery
                if (visualFreeGames.isJqueryInstance(orientationHtml) === false) {
                    // Cast/convert to jQuery element
                    orientationHtml = $(orientationHtml);
                }

                // return as jQuery with listeners
                return orientationHtml
                // listener - dismiss notice and play game (in portrait)
                    .on('click', '.' + visualFreeGames.visualClasses.ActionTriggerContinue, visualFreeGames.orientationNoticeDismissAndPlay)
                    // listener - dismiss notice
                    .on('click', '.' + visualFreeGames.visualClasses.ActionTriggerDismiss, visualFreeGames.orientationNoticeClose);
            },

            /**
             * Dismiss orientation notification
             * and play/load game in current orientation.
             *
             * Update/set flag that user dismissed notice
             *  - prop >> visualFreeGames.orientationMessageDismissed
             *
             * @see visualFreeGames::setOrientationMessageStatus()
             */
            orientationNoticeDismissAndPlay: function () {
                // Set/update flag that orientation message has been shown / dismissed
                visualFreeGames.setOrientationMessageStatus(true);
                // Trigger check
                window.dispatchEvent(new Event(visualFreeGames.orientationListenerName));
            },

            /**
             * Close/dismiss orientation notification action.
             * If a game was loaded / being played, triggers action to record gaming time
             *
             * @see visualFreeGames::insertGamingTimeExecute()
             * @see visualFreeGames::hideScreen()
             * @see visualFreeGames::removeListenerScreenOrientation()
             */
            orientationNoticeClose: function () {
                // Hide the modal
                visualFreeGames.hideScreen(true);
                // Remove the Screen Orientation Listener event
                visualFreeGames.removeListenerScreenOrientation();
                // Enable game click handler
                visualFreeGames.toggleSingleGameClickHandler(true);

                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.orientationNoticeClose);
            },

            /**
             * Create orientation notification, and show
             *
             * @see visualFreeGames::showScreen()
             */
            orientationGameNotify: function () {

                var notice = visualFreeGames.getResourceElement('visualOrientationNotification');

                if (notice) {
                    // Clone the notice (and listeners), else need to detach/store when close
                    var clone = notice.clone(true);
                    // Append notice
                    visualFreeGames.attachToScreen(clone);
                    // Show modal screen
                    visualFreeGames.showScreen();
                }

                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.orientationGameNotify);
            },

            /**
             * Request game load on change to correct orientation,
             * and sets flag to identify game is loaded
             *
             * @see visualFreeGames::requestGameLoad()
             */
            orientationGameRequest: function () {
                // Clear the modal..
                visualFreeGames.emptyScreen();
                // Request game load
                visualFreeGames.requestGameLoad(visualFreeGames[visualFreeGames.orientationListenerName]['id'], true);
                // Set game load request flag
                visualFreeGames[visualFreeGames.orientationListenerName]['game'] = true;

                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.orientationGameRequest);
            },

            /**
             * Create a loader element,
             * spinner via CSS
             *
             * @returns {*|HTMLElement}
             */
            createLoader: function () {
                return $('<div class="' + visualFreeGames.getResourceIdentifier('visualGamesLoader') + '"></div>');
            },

            /**
             * Show a loader/spinner, rendered inside modal
             * - showScreen param can be anything that evaluates to 'true'
             * - spinner/loader image is served/rendered using CSS
             *
             * @see freeGamesSystem::showScreen()
             * @param showScreen Flag to show Modal
             */
            showLoader: function (showScreen) {
                var loaderNotification = visualFreeGames.getResourceElement('visualGamesLoader');

                if (loaderNotification) {
                    // Attach/append <div> element used to render loader/spinner, identified by class attribute
                    visualFreeGames.attachToScreen(loaderNotification);
                    // If true
                    if (showScreen) {
                        visualFreeGames.showScreen();
                    }
                }

                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.showLoader);
            },

            /**
             * Hide loader/spinner
             *  - hideScreen param can be anything that evaluates to 'true'
             *
             * @see freeGamesSystem::hideScreen()
             * @param hideScreen Flag to hide Modal
             */
            hideLoader: function (hideScreen) {
                var modalElement = visualFreeGames.getResourceElement('modalElement');

                if (modalElement) {
                    // Remove element from Modal
                    modalElement.find(visualFreeGames.getResourceSelector('visualGamesLoader')).remove();
                    // Hide Modal if requested
                    if (hideScreen) {
                        visualFreeGames.hideScreen(false);
                    }
                }

                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.hideLoader);
            },

            /**
             * Add attribute to record game start time / lightbox load
             *
             * @param {jquery} $lightbox
             */
            gamingTimeStart: function ($lightbox) {
                // Record time Lightbox was open (game triggered)
                $lightbox.attr('data-start-time', Date.now());
            },

            /**
             * Calculate and make API request to log how long a game was played.
             *  Measured from how long was the lightbox open for
             *
             * @param $lightbox Game lightbox $ element
             */
            insertGamingTimeExecute: function ($lightbox) {
                // Payload
                var data = {
                    // Get the game id
                    gameId: visualFreeGames.getGameId(),
                    // Calculate gaming time
                    time: Date.now() - $lightbox.attr('data-start-time'),
                }
                // Make API request
                visualFreeGames.makeApiRequestLogGamingTime(data);
            },

            /**
             * Listen for feedback close/dismiss action
             * @param element
             */
            listenForFeedback: function (element) {
                // Feedback element trigger
                var btnFeedbackSelector = '#' + visualFreeGames.visualIds.LB_feedbackShow;

                if (element.find(btnFeedbackSelector).length === 0) {
                    visualFreeGames.console(true, 'listenForFeedback', '\tMissing feedback listener element!\n\tUsing selector: ', btnFeedbackSelector);
                    return false;
                }

                // Setup listener
                element.on('click', btnFeedbackSelector, function (e) {
                    // On mobile
                    if (visualFreeGames.isMobile) {
                        // clear the ratings element on mobile
                        visualFreeGames.emptyScreen();
                    }
                    // Attach to Modal
                    var modal = visualFreeGames.getResourceElement('modalElement');
                    // Display feedback form
                    visualFreeGames.showFeedbackForm(modal);
                });
            },

            /**
             * Show feedback form,
             * by appending to the provided appendTo element
             *
             * @param appendTo Element will append to
             */
            showFeedbackForm: function (appendTo) {
                var feedbackElement = visualFreeGames.getResourceElement('feedbackElement');

                if (feedbackElement && appendTo) {
                    // Check for duplicate element
                    if (visualFreeGames.isChildDuplicated(appendTo, feedbackElement)) {
                        visualFreeGames.console(true, 'showFeedbackForm', 'Duplicated Element, cancelling attachment!',
                            {'appendTo' : appendTo, 'feedbackElement' : feedbackElement}
                        );
                        return false;
                    }

                    // Get feedback element, clone for reuse
                    var feedbackClone = feedbackElement.clone(true);

                    // Initialise ratings (star) listener
                    //  - will validate using gameRatingActionContainer
                    visualFreeGames.initRatings(feedbackClone);

                    // Append to modal >> need to review where we append this too...
                    appendTo.append(feedbackClone);

                    visualFreeGames.dispatchEvent(visualFreeGames.eventNames.feedbackElementShow);
                }
            },

            /**
             * Create Feedback "form" action,
             * called on init()
             *
             * @return {jQuery} element
             */
            createFeedbackElement: function () {
                // Get html template
                var feedbackHtml = visualFreeGames.templates.feedbackElement.html;
                // Attach listeners and return
                return visualFreeGames.attachListenersFeedbackElement(feedbackHtml);
            },

            /**
             * Feedback Response element listeners
             *  - listenForFeedbackOptionClick
             *  - feedbackElementClose
             *  - feedbackElementSubmit
             *
             * @param feedbackHtml
             * @return {jQuery} Feedback element with listeners
             */
            attachListenersFeedbackElement: function (feedbackHtml) {
                if (visualFreeGames.isJqueryInstance(feedbackHtml) === false) {
                    feedbackHtml = $(feedbackHtml);
                }

                var id_submit = '.' + visualFreeGames.visualClasses.ActionTriggerSubmit,
                    //
                    class_optionClick = '.' + visualFreeGames.visualClasses.FE_options,
                    //
                    class_dismiss = '.' + visualFreeGames.visualClasses.ActionTriggerDismiss;

                // Add listeners and return
                feedbackHtml
                // On feedback option select
                    .on('click', class_optionClick, visualFreeGames.listenForFeedbackOptionClick)
                    // Dismiss / Close feedback element
                    .on('click', class_dismiss, visualFreeGames.feedbackElementClose)
                    // On Submit action
                    .on('click', id_submit, visualFreeGames.feedbackElementSubmit);

                return feedbackHtml;
            },

            /**
             * Render and append HTLM to collect user feedback,
             * via <textarea>
             *
             * Note that this is referenced/called from jsMaps
             *
             * @param contentPlaceholder
             */
            feedbackOtherInputShow: function (contentPlaceholder) {
                // Textarea rows to show
                var numberRows = visualFreeGames.isMobile ? 2 : 4;
                //
                var html = '<div id="' + visualFreeGames.visualIds.FE_otherFeedback + '">' +
                    '<textarea maxlength="255" rows="' + numberRows + '"></textarea>' +
                    '</div>';

                contentPlaceholder.parent().append(html);
            },

            /**
             * Remove presence of element to collect user feedback
             *
             * Note that this is referenced/called from jsMaps
             *
             * @see feedbackOtherInputShow()
             * @param contentPlaceholder
             */
            feedbackOtherInputRemove: function (contentPlaceholder) {
                contentPlaceholder.parent().find('#' + visualFreeGames.visualIds.FE_otherFeedback).remove();
            },

            /**
             * Listen to Feedback options being clicked
             *
             * @param element
             * @returns {boolean}
             */
            listenForFeedbackOptionClick: function (e) {
                var $anchor = $(this);
                // Get container
                var $placeholder = $anchor.parent();
                // If already active prevent repeated execution
                if ($placeholder.hasClass('active')) {
                    return false;
                }

                // remove class 'active' from any other element
                $placeholder.parent().find('.active').removeClass('active');
                // add active class to this element
                $placeholder.addClass('active');

                // Check has callback function to call
                var callbackFunction = $anchor.attr('data-callback');
                // Validate as function
                if (typeof visualFreeGames[callbackFunction] === 'function') {
                    // Execute if exists
                    visualFreeGames[callbackFunction]($placeholder);
                }
            },

            /**
             * Process Submit action for feedback form,
             *
             */
            feedbackElementSubmit: function (e) {
                e.preventDefault();
                e.stopPropagation();

                // Feedback element >> cannot use getResourceElement as that instance will not reflect changes
                var $feedbackContainer = $(this).closest(visualFreeGames.getResourceSelector('feedbackElement'));
                // Feedback Option Wrapper
                var feedbackOptionSelector = visualFreeGames.visualClasses.FE_options;

                // Selected /active feedback option
                var $optionSelected = $feedbackContainer.find('.active > .'+ feedbackOptionSelector);

                // Validate an option was selected
                if ($optionSelected.length === 0){
                    // under debug - simply reassure/notify
                    visualFreeGames.console(
                        false,
                        'feedbackElementSubmit',
                        '\tNo feedback option was selected/found - returning',
                        {
                            '$feedbackContainer' : $feedbackContainer,
                            'feedbackOptionSelector' : feedbackOptionSelector,
                            '$optionSelected' : $optionSelected
                        }
                    );
                    // Atm this will just dismiss/close and allow to play more games..
                    visualFreeGames.feedbackElementClose(e);
                    return false;
                }

                // Feedback values to record
                var gameId = visualFreeGames.getGameId(),
                    // Get feedback option value
                    feedbackValue = $optionSelected.attr('data-feedback-value'),
                    feedbackComment = '';

                // Check for "Other" feedback
                var $feedbackOther = $feedbackContainer.find('#' + visualFreeGames.visualIds.FE_otherFeedback);
                // If present, capture value - <textarea> is managed/injected internally by Visual
                if ($feedbackOther.length === 1) {
                    feedbackComment = $feedbackOther.children('textarea').val();
                }
                // Data to send
                var data = {
                    gameId: gameId,
                    feedbackValue: feedbackValue,
                    feedbackComment: feedbackComment
                };

                // Make request over Promise
                var request = visualFreeGames.makeApiRequestForFeedback(data);
                // Process response...
                request.then(function () {
                    // Close feedback
                    visualFreeGames.feedbackElementClose(e, true);
                });

                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.feedbackElementSubmit);
            },

            /**
             * Close feedback element,
             * note we remove completely as we are cloning reference element on request
             */
            feedbackElementClose: function (triggerElement, sayThankYou) {
                // Trigger element
                var el = triggerElement;
                // if was Event dispatched >> .on( ... )
                if (triggerElement.hasOwnProperty('currentTarget')) {
                    el = triggerElement.currentTarget;
                }

                // Remove feedback - using .closest() so checks the element provided too
                var feedbackElementSelector = visualFreeGames.getResourceSelector('feedbackElement');
                // Validate selector
                if (feedbackElementSelector) {
                    // Always hide feedback element
                    $(el).closest(feedbackElementSelector).remove();

                    // Display "Thank you"
                    if (sayThankYou === true) {
                        // Get Modal placeholder
                        var placeholder = visualFreeGames.getResourceElement('modalElement');
                        // Show "Thank you" notice
                        visualFreeGames.showFeedbackElementResponse(placeholder);
                    }
                    // Closed the feedback element, provided no feedback..
                    else {
                        // Under Mobile
                        if (visualFreeGames.isMobile) {
                            // On mobile nothing else to show
                            visualFreeGames.hideScreen(true);
                            // Re-enable game selection
                            visualFreeGames.toggleSingleGameClickHandler(true);
                        }
                    }
                }

                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.feedbackElementClose);
            },

            /**
             * Element to display when feedback is given
             * Varies depending on Desktop/Mobile
             */
            createFeedbackElementResponse: function () {
                // HTML element
                var feedbackHtml = visualFreeGames.templates.feedbackResponse.html;
                // Add listeners and return
                return visualFreeGames.attachListenersFeedbackElementResponse(feedbackHtml);
            },

            /**
             * Feedback Response element listeners
             *  - on dismiss/close element
             *
             * @param feedbackHtml
             * @return {*}
             */
            attachListenersFeedbackElementResponse: function (feedbackHtml) {
                if (visualFreeGames.isJqueryInstance(feedbackHtml) === false) {
                    feedbackHtml = $(feedbackHtml);
                }
                // Selector to use - validated via template check
                var btnBackSelector = '.' + visualFreeGames.visualClasses.ActionTriggerDismiss;

                // On Close action
                feedbackHtml.on('click', btnBackSelector, function () {
                    // Check mobile condition
                    if (visualFreeGames.isMobile === true) {
                        // Enable game click listener (sending user straight back to games)
                        visualFreeGames.toggleSingleGameClickHandler(true);
                        // Hide and clear content in Modal
                        visualFreeGames.hideScreen(true);
                    }
                    else {
                        // Get selector
                        var elementSelector = visualFreeGames.getResourceSelector('feedbackResponse');
                        // Find element - FeedbackResponseElement is a clone...
                        var element = $(this).closest(elementSelector);
                        // Only remove the feedback element, game element is behind
                        if(element.length === 0){
                            visualFreeGames.console(
                                true,
                                'attachListenersFeedbackElementResponse',
                                'feedbackResponseElement could not be resolved via $.closest() from the following params:',
                                {
                                    triggerElement : this,
                                    elementSelector : elementSelector,
                                });
                        }
                        else {
                            // remove FeedbackResponseElement
                            element.remove();
                        }
                    }

                    visualFreeGames.dispatchEvent(visualFreeGames.eventNames.feedbackElementDismiss);
                });

                return feedbackHtml;
            },

            /**
             * Show feedback response form,
             * "Thank you for feedback"
             *
             * @param appendTo
             */
            showFeedbackElementResponse: function (appendTo) {
                // Get feedback element
                var feedbackElementResponse = visualFreeGames.getResourceElement('feedbackResponse');

                if (feedbackElementResponse) {
                    //clone for reuse
                    var clone = feedbackElementResponse.clone(true);
                    // Append to modal >> need to review where we append this too...
                    appendTo.append(clone);
                }

                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.showFeedbackElementResponse);
            },

            /**
             * Create game rating element for Mobile
             *
             * Uses same class identifiers as lightbox (Desktop),
             * so can reuse existing listeners/logic
             */
            createMobileGameRatingElement: function () {
                // HTML element
                var feedbackHtml = visualFreeGames.templates.mobileGameRating.html;
                // Add listeners and return
                return visualFreeGames.attachListenersGameRatingElement(feedbackHtml);
            },

            /**
             *
             * @param ratingsHtml
             * @return {*}
             */
            attachListenersGameRatingElement: function (ratingsHtml) {
                if (visualFreeGames.isJqueryInstance(ratingsHtml) === false) {
                    ratingsHtml = $(ratingsHtml);
                }
                // Listen for feedback click
                visualFreeGames.listenForFeedback(ratingsHtml);

                // Selector to use - validated via template check
                var btnBackSelector = '.' + visualFreeGames.visualClasses.ActionTriggerDismiss;
                // Return, with listeners
                ratingsHtml.on('click', btnBackSelector, function () {
                    // Close action
                    visualFreeGames.closeLightbox();
                });

                return ratingsHtml;
            },

            /**
             * Display feedback element for mobile devices
             */
            showMobileFeedbackForm: function () {
                // Get feedback element, clone for reuse
                var mobileGameRating = visualFreeGames.getResourceElement('mobileGameRating');

                if (mobileGameRating) {
                    var clone = mobileGameRating.clone(true);
                    // Init Ratings
                    visualFreeGames.initRatings(clone);
                    // Init Social
                    visualFreeGames.initSocial(clone);
                    // Empty modal - remove game
                    visualFreeGames.emptyScreen();
                    // Append ratings
                    visualFreeGames.attachToScreen(clone);
                }
                // Dispatch event
                visualFreeGames.dispatchEvent(visualFreeGames.eventNames.showMobileFeedbackForm);
            },

            /**
             * Set current game ID
             * @param gameId Id to set
             */
            setGameId: function (gameId) {
                visualFreeGames.gameId = gameId;
            },
            /**
             * Get current game ID
             * @return {int} Game id
             */
            getGameId: function () {
                return visualFreeGames.gameId;
            },

            /**
             * Validate if an element is instance of jQuery
             *
             * @param element Element to validate
             * @return {boolean} True if instance, else False
             */
            isJqueryInstance: function (element) {
                return element instanceof $;
            },

            /**
             * This function checks to see if a user has the flash plugin
             * - Chrome     :   works
             * - Edge       :   works
             *
             * - Firefox    :   Shockwave Flash plugin missing / or disabled will return false
             *                  IF permission if missing then this wont work
             *
             * - IE         :   Works, but IE shows it's own permission request notice
             *
             * @return {boolean} True if available, else False
             */
            isFlashSupported: function () {
                var flashAvailable = false;

                try {
                    var flashObject = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
                    if (flashObject) {
                        flashAvailable = true;
                    }
                } catch (e) {
                    // On FireFox this will mean Flash is not installed, not necessarily active
                    if (navigator.mimeTypes
                        && navigator.mimeTypes['application/x-shockwave-flash'] !== undefined
                        && navigator.mimeTypes['application/x-shockwave-flash'].enabledPlugin) {

                        flashAvailable = true;
                    }
                }

                return flashAvailable;
            },

            /**
             * Check for Adobe Flash support
             * - run last so that Games can init(), LazyLoad images
             * - flaky as modern browsers by default are disabling/discontinuing Flash
             */
            checkFlashSupport: function () {
                // Flag - is Flash supported ? mobile = true : run check()
                var flashSupported = visualFreeGames.isMobile === true ? true : visualFreeGames.isFlashSupported();
                // Check for Flash Support - mobile always ignored
                if (flashSupported === false) {
                    visualFreeGames.showFlashPopUp();
                }
                //
                return flashSupported;
            },

            /**
             * Show Flash PopUp
             */
            showFlashPopUp: function () {
                // Create Flash element + listeners
                var flashPopUp = visualFreeGames.createFlashPopUp();
                // Get Modal
                var modalElement = visualFreeGames.getResourceElement('modalElement');
                // Validate
                if (flashPopUp && modalElement) {
                    // Append to modal/screen
                    visualFreeGames.attachToScreen(flashPopUp);
                    // Show content
                    visualFreeGames.showScreen();
                }
            },

            /**
             * Create Flash PopUp Element,
             * and add action listeners
             *
             * @return {jQuery) $html
             */
            createFlashPopUp: function () {
                // HTML element
                var flashElementHtml = visualFreeGames.templates.flashElement.html;
                // for Flash init on game click, reduce/remove elements
                if (visualFreeGames.config.initFlash === false || visualFreeGames.config.initFlash === 'click') {
                    flashElementHtml = visualFreeGames.reduceFlashPopUp(flashElementHtml);
                }
                // Return as jQuery with listeners
                return visualFreeGames.attachListenersFlashPopUp(flashElementHtml);
            },

            /**
             * Attach Flash popup listeners
             *  - hideScreen
             *  - triggerFlashPermissions
             *
             *
             * @TODO NEEDS UPDATING ONCE KNOW HOW WILL RESPONSE IF CLICK INSTANT PLAY
             *
             * @param flashHtml HTML element to process
             * @return {jQuery} HTML with event listeners
             */
            attachListenersFlashPopUp: function (flashHtml) {
                if (visualFreeGames.isJqueryInstance(flashHtml) === false) {
                    flashHtml = $(flashHtml);
                }

                var id_instantPlay = '#' + visualFreeGames.visualIds.AF_instantPlay,
                    selector_enable = '.' + visualFreeGames.visualClasses.ActionTriggerContinue,
                    selector_close = '.' + visualFreeGames.visualClasses.ActionTriggerDismiss;

                flashHtml
                    .on('click', selector_close, function () {
                        visualFreeGames.hideScreen(true);
                    })
                    // To test you must disable Flash first, else "nothing" happens
                    .on('click', selector_enable , function () {
                        visualFreeGames.triggerFlashPermissions();
                        visualFreeGames.hideScreen(true);
                    })
                    .on('click', id_instantPlay, function () {
                        // Update to mobile - force API requests as Mobile
                        visualFreeGames.forceClassInstanceData('mobile', 1);
                        // Trigger a new filter/draw
                        //searchSystem.manageSearchIntervals.clearTimeoutArray();
                        //searchSystem.handleSearchTimingEvents({target: {value: ''}});
                        searchSystem.runSearch({target: {value: ''}});
                        // Hide flash notification
                        visualFreeGames.hideScreen(true);
                    });

                return flashHtml;
            },

            /**
             * Reduce Flash Element components,
             * removes elements with callbacks linked to Full Visual library
             *
             * @param flashElement
             * @return {*}
             */
            reduceFlashPopUp: function (flashElement) {
                // validate / cast to jQuery
                if (visualFreeGames.isJqueryInstance(flashElement) === false) {
                    flashElement = $(flashElement);
                }
                // references - selectors to elements to remove
                var flashReduceSelector = '.' + visualFreeGames.visualClasses.AF_reduce;
                // Find element reference
                var ref = flashElement.find(flashReduceSelector);
                // Validate existence
                if (ref.length !== 0) {
                    // Remove
                    ref.remove();
                }
                else{
                    visualFreeGames.console(false, 'reduceFlashPopUp', '\tNo elements to remove',
                        {'flashReduceSelector' : flashReduceSelector,'toRemove' : ref}
                    );
                }

                // return Flash Element
                return flashElement;
            },

            /**
             * Trigger Flash permission request for Chrome
             * https://www.chromium.org/flash-roadmap#TOC-Developer-Recommendations
             *
             * Or we need to implement...
             * https://github.com/swfobject/swfobject
             * for a wider support spectrum
             */
            triggerFlashPermissions: function () {
                visualFreeGames.console(false, 'triggerFlashPermissions', 'userAgent', navigator.userAgent);
                // Flash URL reference
                var flashUrl = 'https://get.adobe.com/flashplayer';

                // UserAgent super basic check
                if (navigator.userAgent.toLowerCase().indexOf('firefox') === -1) {
                    // Create iFrame
                    var iframe = document.createElement('iframe');
                    // Add promerties
                    iframe.src = flashUrl;
                    iframe.sandbox = '';
                    // Append to trigger request / remove
                    document.body.appendChild(iframe);
                    document.body.removeChild(iframe);
                }
                // Do Firefox-related activities
                else {
                    // Create <a> and open flash request
                    var anchor = document.createElement('a');
                    // Add properties
                    anchor.href = flashUrl;
                    anchor.rel = 'no_follow';
                    anchor.target = '_blank';
                    // Append to allow trigger
                    document.body.appendChild(anchor);
                    // Simulate click
                    anchor.click();
                    // Remove
                    document.body.removeChild(anchor);
                }
            },

            /**
             * Check if Promise is available,
             * else requests missing scripts and call callback()
             *
             * @param callback Callback function on script download
             * @return {boolean} True if supports, else False
             */
            isPromiseSupported: function (callback, config) {
                // Missing Promise() support
                if (!window.Promise) {
                    //
                    visualFreeGames.console(
                        true,
                        "isPromiseSupported",
                        "\tPromise are not available!\n\tDownloading necessary script..."
                    );
                    // Script ref
                    var scriptURL = visualFreeGames.scripts.PromisePolyfill;
                    // Fetch Script
                    visualFreeGames.getScript(scriptURL, true)
                        .done(function () {
                            visualFreeGames.console(
                                false, 'isPromiseSupported', '\tScript downloaded!\n\t' + scriptURL
                            );
                            // Run callback
                            callback(config);
                        });
                    //
                    return false;
                }
                visualFreeGames.console(false, "isPromiseSupported", "\tPromise is available!");
                //
                return true;
            },

            /**
             * Check if LazyLoading is available,
             * else requests missing scripts and call callback()
             *
             * @param callback Callback function on script download
             * @return {boolean|Promise} True if supported, else Promise() requesting script
             */
            isLazyLoadingSupported: function () {
                if (!window.LazyLoading) {
                    visualFreeGames.console(
                        true,
                        "isLazyLoadingSupported",
                        "\tLazyLoading is not available!\n\tDownloading necessary script..."
                    );
                    return new Promise(function (resolve, reject) {
                        // Script ref
                        var scriptURL = visualFreeGames.scripts.LazyLoading;
                        //
                        visualFreeGames
                            .getScript(scriptURL, true)
                            .done(function () {
                                visualFreeGames.console(
                                    false,
                                    'isLazyLoadingSupported',
                                    '\tScript downloaded!\n\t' + scriptURL
                                );
                                // Need to assign on script download
                                visualFreeGames.LazyLoading = window.LazyLoading;
                                // Run callback
                                resolve(true);
                            })
                            .fail(function (e) {
                                reject(e);
                            });
                    });
                }
                // Assignation reference
                visualFreeGames.LazyLoading = window.LazyLoading;
                //
                return true;
            },

            /**
             * Check if Twitter `widgets.js` is available,
             * else requests missing scripts and call callback()
             *
             * @return {boolean|Promise} True if supported, else Promise() requesting script
             */
            isTwitterJsIncluded: function () {
                if (!window.twttr) {
                    visualFreeGames.console(
                        true,
                        "isTwitterJsIncluded",
                        "\tTwitterJs is not available!\n\tDownloading necessary script..."
                    );

                    return new Promise(function (resolve, reject) {
                        // Script ref
                        var scriptURL = visualFreeGames.scripts.Twitter;

                        visualFreeGames
                            .getScript(scriptURL, true)
                            .done(function () {
                                visualFreeGames.console(
                                    false,
                                    'isTwitterJsIncluded',
                                    '\tScript downloaded!\n\t' + scriptURL
                                );
                                // Run callback
                                resolve(true);
                            })
                            .fail(function (e) {
                                visualFreeGames.console(
                                    true,
                                    'isTwitterJsIncluded',
                                    '\tRequest error',
                                    {'error' : e}
                                );
                                reject(e);
                            });
                    });
                }
                return true;
            },

            /**
             * Initialise dynamically rendered Twitter social button
             *
             * @see https://dev.twitter.com/web/javascript/initialization
             * @param element
             */
            initTwitterContent: function (element) {
                // Validate/request as Node Element
                element = visualFreeGames.isJqueryInstance(element) ? element[0] : element;
                // Load Twitter Social Button
                twttr.widgets.load(
                    element
                );
            },

            /**
             * Insert and initialise Twitter Tweet button,
             * will check container for data attribute `data-twitter` to use as Tweet string, else blank
             *
             * Note that by default Tweet is embedding the URL
             *
             * @param container Element to attach Social to
             */
            insertTwitterSocial: function (container) {
                // Use provided url, else default to page
                var tweetAttribute = container.attr('data-twitter') ? container.attr('data-twitter') : '';
                // Social Element
                var element = $('<a id="twitterSocial" class="twitter-share-button" href="https://twitter.com/intent/tweet?text=' + tweetAttribute + '">Tweet</a>');
                // Append
                element.appendTo(container);
                // Initialise Twitter Social Share - has to be after append
                visualFreeGames.initTwitterContent(element);
            },

            /**
             * Insert Facebook Like button,
             * will check container for data attribute `data-fb` to use as Like URL, else defaults to current page
             *
             * @param container Element to attach Social to
             */
            insertFacebookSocial: function (parent) {
                // Use provided url, else default to page
                var urlAttribute = parent.attr('data-fb') ? parent.attr('data-fb') : window.location.href;
                // Facebook like URL
                var fbUrl = 'https://www.facebook.com/plugins/like.php?locale=en_GB&href=' + urlAttribute + '&width=55&layout=button&action=like&size=small&show_faces=false&share=false&height=65&appId';
                // iFrame element to load `Like` feature
                var element = $('<iframe width="52" height="20" style="border:none; overflow:hidden; margin-right: 0.25em;" scrolling="no" frameborder="0" allowTransparency="true" src="' + fbUrl + '"></iframe>');
                //
                element.appendTo(parent);
            },

            /**
             * Initialise Facebook Like and Twitter Tweet social buttons
             * @param element
             */
            initSocial: function (element) {
                if (visualFreeGames.config.initSocial === true) {
                    // Social buttons container
                    var socialPlaceholder = element.find('#' + visualFreeGames.visualIds.LB_socialButtons);
                    //
                    if (socialPlaceholder.length !== 0) {
                        // Insert FB
                        visualFreeGames.insertFacebookSocial(socialPlaceholder);
                        // Insert and init() Twitter
                        visualFreeGames.insertTwitterSocial(socialPlaceholder);
                    }
                }
            },

            /**
             * Get external resource <script>, and allow to cache.
             *  - extending jQuery.ajax() function
             *
             * Requests made in this fashion will be cached (from disk cache),
             * where including it in the head will cache (from memory cache)
             *
             * @param url Url to request
             * @param cache Boolean True to cache response, else False
             */
            getScript: function (url, cache) {
                if (typeof cache !== 'boolean') {
                    cache = true;
                }

                // Allow user to set any option except for dataType, cache, and url
                var options = $.extend({}, {
                    dataType: "script",
                    cache: cache,
                    url: url
                });

                // Use $.ajax() since it is more flexible than $.getScript
                // Return the jqXHR object so we can chain callbacks
                return jQuery.ajax(options);
            },

            /**
             * Check for dependencies,
             * and try to resolve them automatically
             *
             * @return {boolean}
             */
            checkSystemDependencies: function (visualConfiguration) {
                //
                visualFreeGames.console(false, "checkSystemDependencies", "\tStart...");
                // Run all dependency as Promise.all()
                var allPromiseResolution = [];
                // Check for LazyLoading support...
                var lazySupport = visualFreeGames.isLazyLoadingSupported();
                // Validate
                if (lazySupport !== true) {
                    // Push Promise() request for script
                    allPromiseResolution.push(lazySupport);
                }

                // Check Social is required...
                if (visualFreeGames.config.initSocial === true) {
                    // Check for Twitter support...
                    var twitterSupport = visualFreeGames.isTwitterJsIncluded();
                    // Validate
                    if (twitterSupport !== true) {
                        // Push Promise() request for script
                        allPromiseResolution.push(twitterSupport);
                    }
                }

                // Resolve all
                if (allPromiseResolution.length !== 0) {
                    // Promise.all() requests...
                    Promise.all(
                        allPromiseResolution
                    )
                        .then(function () {
                            visualFreeGames.console(false, 'checkSystemDependencies', '\tAllPromiseResolution > Success!',
                                {'all' : allPromiseResolution});
                            visualFreeGames.init(visualConfiguration);
                        })
                        .catch(function (e) {
                            visualFreeGames.console(true, 'checkSystemDependencies', '\tAllPromiseResolution > Error!',
                                {'e' : e, 'all' : allPromiseResolution});
                        })
                    // Stop execution until Promise.all() resolves
                    return false;
                }

                visualFreeGames.console(false, "checkSystemDependencies", "\tDone!");
                return true;
            },

            /**
             * Visual jsMaps request
             *
             * @return {Promise}
             */
            makeApiRequestForJsMaps: function () {
                return visualFreeGames.makeApiRequest(visualFreeGames.apiActions.returnJsMaps, null);
            },

            /**
             * Visual javascript configuration request
             *
             * @return {Promise}
             */

            makeApiRequestForJavascriptConfiguration: function () {
                return visualFreeGames.makeApiRequest(visualFreeGames.apiActions.getVisualJsConfig, null);
            },

            /**
             *
             * @param visualJsConfiguration
             */
            setJsConfiguration: function (visualJsConfiguration) {
                //
                visualFreeGames.console(false, "setJsConfiguration", "\tfn params", visualJsConfiguration);
                // track missing config
                var error = false;

                // First instance validation - check expected/required keys exist

                // count entries
                var index = visualFreeGames.jsConfigurationKeys.length;
                // reverse loop - optimised over for()
                while(index--){
                    // init vars..
                    var propKey = visualFreeGames.jsConfigurationKeys[index],
                        hasProp = false,
                        hasEntries = false;

                    // assign and validate prop exists
                    if((hasProp = visualJsConfiguration.hasOwnProperty(propKey) ) === true){
                        hasEntries = visualJsConfiguration[propKey].length === 0 ? false : true;
                    }
                    // validate exists and have data (to process in next stage)
                    if(hasProp === false || hasEntries === false){
                        visualFreeGames.console(
                            true,
                            'setJsConfiguration',
                            '\tUnknown configuration variable!',
                            {
                                'propKey' : propKey,
                                'hasProp' : hasProp,
                                'hasEntries' : hasEntries
                            }
                        );
                        // log there was an error - will terminate execution by `throw Error()`
                        error = true;
                    }
                }
                // on error, log and terminate execution - throw Error
                if(error === true){
                    visualFreeGames.console(
                        true,
                        'setJsConfiguration',
                        '\tMissing known configuration variable!',
                        {'accepts' : visualFreeGames.jsConfigurationKeys}
                    );
                    throw Error("Missing required configuration properties!");
                }

                // Second instance validation - loop over entries and check all expected prop/keys exist

                // Set Configurations
                var propExists = false, propValue = false;
                //
                for (var prop in visualJsConfiguration) {
                    // Configuration Object/Data reference
                    var configData = visualJsConfiguration[prop];
                    //
                    if (configData) {
                        switch (prop) {
                            // Object
                            case 'visualIds':
                            case 'visualClasses':
                                // Loop over keys defined in the script, not the Json
                                for (var key in this[prop]) {
                                    // validate property...
                                    propExists = configData.hasOwnProperty(key);
                                    // check value
                                    propValue = propExists === true ? configData[key] : false;
                                    // validate
                                    if(propExists === true && (propValue !== false && propValue.length !== 0) ) {
                                        // set...
                                        visualFreeGames[prop][key] = propValue;
                                    }
                                    else{
                                        // error
                                        visualFreeGames.console(
                                            true,
                                            'setJsConfiguration',
                                            '\t' + prop + ' >> Missing configuration variable!',
                                            {'prop' : prop, 'key' : key, 'value' : propValue, 'propExists' : propExists}
                                        );
                                        // log there was an error - will terminate execution by `throw Error()`
                                        error = true;
                                    }
                                }

                                break;

                            // Object Array []
                            case 'configurationSelectors':
                            case 'configurationSelectorsDependent':
                                //
                                var i = configData.length;

                                while(i--){
                                    //
                                    var obj = configData[i],
                                        configName = obj.hasOwnProperty('name') ? obj['name'] : false,
                                        configIdentifier = obj.hasOwnProperty('identifier') ? obj['identifier'] : false,
                                        configSelector = obj.hasOwnProperty('selector') ? obj['selector'] : false,
                                        configChildren = obj.hasOwnProperty('children') ? obj['children'] : false;

                                    // Only run if have a name
                                    if (configName && (configIdentifier || configSelector)) {
                                        // Find Object index position for given `configName`
                                        var internalRef = visualFreeGames.findConfigurationObjectIndex(configName, prop);

                                        if (internalRef !== false) {

                                            if (typeof configIdentifier === 'string') {
                                                visualFreeGames[prop][internalRef]['identifier'] = configIdentifier;
                                            }

                                            if (typeof configSelector === 'string') {
                                                visualFreeGames[prop][internalRef]['selector'] = configSelector;
                                            }

                                            if (typeof configChildren === 'object') {
                                                visualFreeGames[prop][internalRef]['children'] = configChildren;
                                            }
                                        }
                                    }
                                }
                                break;

                            case 'templatesToProcess':
                                // template object reference
                                var templates = visualFreeGames[prop];
                                // cycle over each template
                                for (var templateName in templates) {
                                    // validate property...
                                    propExists = configData.hasOwnProperty(templateName);
                                    // capture value - array
                                    propValue = configData[templateName];
                                    // validate
                                    if(propExists === true && propValue.length !== 0) {
                                        // check nester entries
                                        for(var templateProp in propValue){
                                            // validate
                                            if(templates[templateName].hasOwnProperty(templateProp)){
                                                templates[templateName][templateProp] = propValue[templateProp];
                                            }
                                            else{
                                                visualFreeGames.console(
                                                    true,
                                                    'setJsConfiguration',
                                                    '\t' + prop + ' >> Unknown or empty configuration variable!',
                                                    {'templateName' : templateName, 'templateKey' : templateProp, 'propExists' : false}
                                                );

                                                error = true;
                                            }
                                        }
                                    }
                                    else{
                                        visualFreeGames.console(
                                            true,
                                            'setJsConfiguration',
                                            '\t' + prop + ' >> Unknown or empty configuration variable!',
                                            {'templateName' : templateName, 'value' : propValue, 'propExists' : propExists}
                                        );
                                        // log there was an error - will terminate execution by `throw Error()`
                                        error = true;
                                    }
                                }
                                break;
                        }
                    }
                }

                if(error === true){
                    throw Error("Missing required configuration selectors!");
                }
            },

            /**
             * Return configuration selector object index
             * @param name Configuration name reference
             * @return {int|boolean} Index position, else Boolean false
             */
            findConfigurationObjectIndex: function (name, configurationProp) {
                // Reference
                var obj = false;

                var i = visualFreeGames[configurationProp].length;
                // Loop / find
                while(i--){
                    // on match, assign and return
                    if (visualFreeGames[configurationProp][i]['name'] === name) {
                        return obj = i;
                    }
                }

                return obj;
            },

            /**
             * Process and assign Visual jsMaps
             * @param visualJsMaps
             */
            setJsMaps: function (visualJsMaps) {
                // debug mesage
                visualFreeGames.console(false, "setJsMaps", "\tvisualJsMaps", visualJsMaps);
                // Set Visual maps - for know maps
                visualFreeGames.mapsToProcess.forEach(function (key) {
                    if (visualJsMaps.hasOwnProperty(key) && visualFreeGames.hasOwnProperty(key)) {
                        // Set map
                        visualFreeGames[key] = visualJsMaps[key];
                    }
                });
            },

            /**
             * Process, validate and set element templates
             * @param visualJsTemplates
             */
            setJsTemplates: function (visualJsTemplates) {
                // Data dump
                visualFreeGames.console(false, "setJsTemplates",
                    "\tFunction Param",
                    {"visualJsTemplates": visualJsTemplates}
                );
                // Validation flag
                var validated = true;
                // Error flag
                var error = false;
                // Cycle over templates
                for (var templateName in visualFreeGames.templatesToProcess) {
                    // If not recognised/known template...
                    if (visualJsTemplates.hasOwnProperty(templateName) === false) {
                        // Dump a message - but dont stop execution
                        visualFreeGames.console(true, 'setJsTemplates', '\tMissing or unknown Template Name : ' + templateName);
                    }
                    else {
                        // Check has expected HTML data entry
                        if (visualJsTemplates[templateName].hasOwnProperty('html') === false) {
                            visualFreeGames.console(true, 'setJsTemplates', '\tMissing Template ' + templateName);
                            // update flag and return from loop
                            return validated = false;
                        }
                        else {
                            // Validate HTML selectors
                            var validatedObject = visualFreeGames.validateJsTemplates(templateName, visualJsTemplates[templateName]['html']);
                            //
                            if (validatedObject !== false) {
                                // Store validated template
                                visualFreeGames.templates[templateName]['html'] = validatedObject;
                            }
                            else {
                                // update flag and return from loop - message delivered via validateJsTemplates
                                return validated = false;
                            }
                        }
                    }
                }

                return validated;
            },

            /**
             * Function processed expected templates and validated expected ids/classes/selectors in the element
             * Templates are served via ajax, while the ids/classes/selectors are currently defined within the js
             *
             * @see {object} templatesToProcess - for validation params
             * @param templateName
             * @param htmlString
             */
            validateJsTemplates: function (templateName, htmlString) {
                // Reference to expected nested elements
                var validateThis = visualFreeGames.templatesToProcess[templateName];
                //
                var errors = {
                    'ids': [],
                    'classes': [],
                    'selectors': []
                }
                // To jQuery..
                var $html = $(htmlString);
                // Cycle over
                for (var key in validateThis) {
                    // Data reference
                    var validateData = validateThis[key];
                    // Check have something to validate
                    if (validateData.length !== 0) {
                        // error reference
                        var errorRef = [];
                        // process based on key
                        switch (key) {
                            case 'ids':
                                errorRef = visualFreeGames.validateJsTemplatesIds(validateData, $html);
                                break;
                            case 'classes':
                                errorRef = visualFreeGames.validateJsTemplatesClasses(validateData, $html);
                                break;
                            case 'selectors':
                                errorRef = visualFreeGames.validateJsTemplatesSelectors(validateData, $html);
                                break;
                            default:
                                visualFreeGames.console('true', 'validateJsTemplates', "\tUnknown validation key :" + key)
                                break;
                        }
                        // Store results
                        errors[key] = errorRef
                    }
                }

                // If anything did not validate - dump the results
                for (var key in errors) {
                    if (errors[key].length !== 0) {
                        // Dump message + errors
                        visualFreeGames.console(true, 'validateJsTemplates',
                            '\tTemplate did not validate - ' + templateName,
                            errors
                        );
                        // overwrite result/response
                        return $html = false;
                    }
                }
                // return the validated element
                return $html
            },

            /**
             * Validate template ids,
             * check and search template element for provided references.
             * Any missing entry is stored and returned.
             *
             * @param {object} validate Entries to validate
             * @param $html jQuery template to validate
             * @return {Array} Errors, or empty
             */
            validateJsTemplatesIds: function (validate, $html) {
                //
                var errors = [];
                // Process all ids
                validate.forEach(function (ref) {
                    // Validate - element has id, or found inside element
                    if ($html[0].id !== ref && $html.find('#' + ref).length === 0) {
                        // Store missing reference
                        errors.push(ref);
                    }
                });
                // Return validation result
                return errors;
            },

            /**
             * Validate template classes,
             * check and search template element for provided references.
             * Any missing entry is stored and returned.
             *
             * @param {object} validate Entries to validate
             * @param $html jQuery template to validate
             * @return {Array} Errors, or empty
             */
            validateJsTemplatesClasses: function (validate, $html) {
                //
                var errors = [];
                // Process all classes
                validate.forEach(function (ref) {
                    // Validate - element has class, or found inside element
                    if ($html.hasClass(ref) === false && $html.find('.' + ref).length === 0) {
                        // Store missing reference
                        errors.push(ref);
                    }
                });
                // Return validation result
                return errors;
            },

            /**
             *
             * @param {object} validate Entries to validate
             * @param $html jQuery template to validate
             * @return {Array} Errors, or empty
             */
            validateJsTemplatesSelectors: function (validate, $html) {
                //
                var errors = [];
                // Process all classes
                validate.forEach(function (ref) {
                    // Validate - found inside element
                    if ($html.find(ref).length === 0) {
                        // Store missing reference
                        errors.push(ref);
                    }
                });
                // Return validation result
                return errors;
            },

            /**
             * Check if have all required configuration elements,
             * else return those which are missing,
             * to be requested over Request
             *
             * @param config
             * @return {n|*}
             */
            systemConfigurationCheck: function () {
                visualFreeGames.console(false, 'systemConfigurationCheck', '\tStart...');
                //
                return new Promise(function (resolve, reject) {
                    //
                    var missingProperties = [];
                    // Cycle over valid
                    for (var index in visualFreeGames.configKeyValidation) {
                        // Property to validate
                        var prop = visualFreeGames.configKeyValidation[index];
                        // Missing value
                        if (visualFreeGames.config.hasOwnProperty(prop) && !visualFreeGames.config[prop]) {
                            // Capture missing property
                            missingProperties.push(prop);
                        }
                    }

                    // If missing properties...
                    if (missingProperties.length !== 0) {
                        // Reject keys of missing data so can request over AJAX
                        reject(missingProperties);
                    }

                    // Resolve with provided configuration
                    resolve(visualFreeGames.config);
                });
            },

            /**
             * Validate configuration variables,
             *  - jsMaps
             *  - jsTemplates
             *
             * @return {boolean}
             */
            systemConfigurationValidation: function () {
                // Cycle over
                var validated = true;
                //
                for (var index in visualFreeGames.configKeyValidation) {
                    // Property to validate
                    var prop = visualFreeGames.configKeyValidation[index];
                    // Data to process
                    var data = visualFreeGames.config[prop];
                    // Process...
                    switch (prop) {
                        case 'jsConfiguration':
                            visualFreeGames.setJsConfiguration(data);
                            break;

                        case 'jsMaps':
                            visualFreeGames.setJsMaps(data);
                            break;

                        case 'jsTemplates':
                            validated = visualFreeGames.setJsTemplates(data);
                            if (validated !== true) {
                                throw Error("There was a problem validating your templates!");
                            }
                            break;
                    }
                }

                return false;
            },

            /**
             * Process configurationSelectors and load reference
             * identifiers, selectors and elements
             */
            systemResourcesSetup: function (configuration) {
                visualFreeGames.console(false, 'systemResourceSetup', '\tStart...', configuration);

                // Reference for when access in forEach()
                var self = visualFreeGames,
                    failureInstances = 0;
                // Process configuration variables...
                configuration.forEach(function (d) {
                    //Identifiers - if set
                    if (d.identifier && !self.identifiers[d.name]) {
                        self.identifiers[d.name] = d.identifier;
                    }

                    // Selector reference for the element
                    if (d.selector && !self.selectors[d.name]) {
                        self.selectors[d.name] = d.selector;
                    }

                    // Element reference
                    var element = null;
                    // Element creation via function or selector
                    if ((d.func || d.selector)) {
                        // Look up element (try to...)
                        element = d.func ? visualFreeGames[d.func]() : $(self.selectors[d.name]);
                        // If element exists
                        if (element.length) {
                            // Store reference
                            self.elements[d.name] = element;
                        }
                    }

                    // Diagnostics on missing elements, only if required
                    if (d.required && !self.elements[d.name]) {
                        self.diagnosticsError(d.name, d.selector, d.consequence);
                        failureInstances++;
                    }
                    else {
                        // Run a check for nested elements used - on()
                        if (!element && d.children) {
                            self.diagnosticsError(d.name, d.selector, "Missing element reference to validate children", d.children);
                            failureInstances++;
                        }
                        else if (element && d.children) {
                            d['children'].forEach(function (childSelector) {
                                // Check for element
                                var nestedElement = element.find(childSelector);
                                // Validate
                                if (nestedElement.length === 0) {
                                    self.diagnosticsError(d.name, d.selector, "Missing child element " + childSelector);
                                    failureInstances++;
                                }
                            });
                        }
                    }
                });

                // check failure instances, validate that main container exists
                if (failureInstances > 0 || visualFreeGames.getResourceElement('mainGameContainer') === false) {
                    // throws Error
                    self.setupFailureError('systemResourceSetup()');
                }

                visualFreeGames.console(false, '', '\tDone!');
            },

            /**
             * Get Element by name
             * @param name Element name to query
             * @return {jQuery|boolean} Element on match, else Boolean false if not exists
             */
            getResourceElement: function (name) {
                // fn params
                var params = {'name': name};
                // validate name is supported/valid
                if (visualFreeGames.elements.hasOwnProperty(name) === false) {
                    visualFreeGames.console(true, 'getResourceElement', '\tUnknown Element reference', params);
                    return false;
                }
                // validate existence and log
                if (visualFreeGames.elements[name] === false) {
                    visualFreeGames.console(true, 'getResourceElement', visualFreeGames.errorMessages.missingElement, params);
                }
                // return value
                return visualFreeGames.elements[name];
            },

            /**
             * Get Identifier by name
             * @param name Identifier name to query
             * @return {String|boolean} Identifier on match, else Boolean false if not exists
             */
            getResourceIdentifier: function (name) {
                // fn params
                var params = {'name': name};
                // validate name is supported/valid
                if (visualFreeGames.identifiers.hasOwnProperty(name) === false) {
                    visualFreeGames.console(true, 'getResourceIdentifier', '\tUnknown Identifier reference', params);
                    return false;
                }
                // validate existence and log
                if (visualFreeGames.identifiers[name] === false) {
                    visualFreeGames.console(true, 'getResourceIdentifier', visualFreeGames.errorMessages.missingIdentifier, params);
                }
                // return value
                return visualFreeGames.identifiers[name];
            },

            /**
             * Get Selector by name
             * @param name Selector name to query
             * @return {String|boolean} Selector on match, else Boolean false if not exists
             */
            getResourceSelector: function (name) {
                // fn params
                var params = {'name': name};
                // validate name is supported/valid
                if (visualFreeGames.selectors.hasOwnProperty(name) === false) {
                    visualFreeGames.console(true, 'getResourceSelector', '\tUnknown Selector reference', params);
                    return false;
                }
                // validate existence and log
                if (visualFreeGames.selectors[name] === false) {
                    visualFreeGames.console(true, 'getResourceSelector', visualFreeGames.errorMessages.missingSelector, params);
                }
                // return value
                return visualFreeGames.selectors[name];
            },

            /**
             * Get an elements nodeName
             * @param element
             * @param toLowerCase {boolean} True for lowercase, else default return
             * @return {string} nodeName
             */
            getResourceElementNodeName: function (element, toLowerCase) {

                var nName;
                // jquery, access element
                if (visualFreeGames.isJqueryInstance(element)) {
                    nName = element[0].nodeName;
                }
                else {
                    // direct access
                    nName = element.nodeName;
                }

                if (toLowerCase === true) {
                    nName = nName.toLowerCase();
                }

                return nName;
            },

            /**
             * Function checks if the nestedSelector reference exists inside the parentElement,
             * returns the reference element if found, else false.
             *
             * @param parentElement Element to search in - instance of jQuery
             * @param nestedSelector
             * @return {boolean|jQuery} True on success, else jQuery element
             */
            validateRequestedExistence: function (parentElement, nestedSelector) {
                // function params
                var params = {
                    'parentElement': parentElement,
                    'nestedSelector': nestedSelector
                };
                // Validate parent element
                if (visualFreeGames.isJqueryInstance(parentElement) === false) {
                    visualFreeGames.console(true, 'validateRequestedExistence', '\tparentElement is not instance of jQuery!', params);
                    return false;
                }
                // Validate nester selector
                if (typeof nestedSelector !== 'string') {
                    visualFreeGames.console(true, 'validateRequestedExistence', '\tnestedSelector is not of type string!', params);
                    return false;
                }
                // Nested element reference - check existence
                var el = parentElement.find(nestedSelector);
                // Return element, or false
                return el.length === 0 ? false : el;
            },

            /**
             * Identify the event listener parameters to be used.
             * Returns reference to both the element and eventName to bind an action to.
             * Default behaviour is to return the triggerElement and eventName = `click`
             * For triggerElements of nodeName = 'OPTION' modify event to 'change' and return the element container
             *
             * @param container
             * @param triggerElement
             * @return {{eventType: string, eventElement: *}}
             */
            getListenerParams: function (container, triggerElement) {
                // element nodeName
                var elementType = visualFreeGames.getResourceElementNodeName(triggerElement);
                // listener eventName - `click` as default
                var eventType = 'click';
                // element to which to bind the listener
                var eventElement = triggerElement;

                switch (elementType) {
                    case 'OPTION':
                        eventType = 'change';
                        eventElement = container;
                        break;

                    default:
                        break;
                }

                return {
                    'eventType': eventType,
                    'eventElement': eventElement
                }
            },

            /**
             * Set/capture VisualGames class instance data,
             * from main game container
             */
            setClassInstanceData: function () {
                var mainGameContainer = visualFreeGames.getResourceElement('mainGameContainer');
                // validate container..
                if (mainGameContainer) {
                    // get GameSystem Class instance data..
                    var classInstanceData = mainGameContainer.data();
                    // delete any property that does not have a value associated with it
                    for (var key in classInstanceData) {
                        if (!classInstanceData[key]) {
                            delete classInstanceData[key];
                        }
                    }
                    // set classInstanceData
                    visualFreeGames.classInstanceDataObject = classInstanceData;

                    //
                    visualFreeGames.checkForMobile();
                }
            },

            /**
             * Set class instance data property to specified value
             * @param key
             * @param value
             */
            forceClassInstanceData: function (key, value) {
                visualFreeGames.classInstanceDataObject[key] = value;
            },

            /**
             * Set mobile status/flag,
             * checks first through classInstanceDataObject
             * else fallback on JS check
             */
            checkForMobile: function () {
                if (visualFreeGames.classInstanceDataObject.hasOwnProperty('mobile')) {
                    visualFreeGames.isMobile = visualFreeGames.classInstanceDataObject.mobile == 1 ? true : false;
                }
                else {
                    visualFreeGames.isMobile = /Android|iPhone|iPad|iPod|IEMobile|Opera Mini/i.test(navigator.userAgent);
                }
            },


            /**
             * Dispatch a CustomEvent
             *
             * @param {string} eventName Event name to dispatch
             * @returns {boolean} False on eventName !== string, else undefined
             */
            dispatchEvent: function (eventName, eventDetail) {
                if (typeof eventName !== 'string') {
                    visualFreeGames.console(true,
                        "dispatchEvent",
                        "\tEventName is not of type string!",
                        {
                            'visualFreeGames.eventPrefix': visualFreeGames.eventPrefix,
                            'eventName': eventName
                        }
                    );
                    return false;
                }
                //
                visualFreeGames.console(false,
                    "dispatchEvent",
                    "\t" + visualFreeGames.eventPrefix + eventName,
                    {
                        'visualFreeGames.eventPrefix': visualFreeGames.eventPrefix,
                        'eventName': eventName
                    }
                );
                // append suffix to event name fired
                var visualEventName = visualFreeGames.eventPrefix + eventName;

                eventDetail = eventDetail || visualFreeGames;

                // dispatch event
                window.dispatchEvent(new CustomEvent(visualEventName, { detail : eventDetail }));
            },

            /**
             * Display a console.error() message
             *
             * @param name Reference variable name
             * @param selector Variable selector used
             * @param consequence System consequence
             */
            diagnosticsError: function (name, selector, consequence) {
                var message = '\tMissing Element Reference!\n' +
                    '\tVar: ' + name + '\n' +
                    '\tSelector: ' + selector + '\n' +
                    '\tConsequence: ' + consequence + '\n\n';

                visualFreeGames.console(true, "diagnosticsError", message, {});
            },

            /**
             * Configuration selectors setup failure
             * @param nameOfFunction Function that failed
             * @throws Error Terminates Visual init() process
             */
            setupFailureError: function (nameOfFunction) {
                var message = '\tSetup Failure Notification, Script Execution Has Been Terminated\n' +
                    '\tFunction: ' + nameOfFunction + '\n';
                // debug message
                visualFreeGames.console(true, "setupFailure", message, {});
                // throw an Error - will be caught by Promise() and terminate Visual startup execution
                // this identifies a critical error which Visual could not self resolve
                throw Error("Visual critical error during setup!");
            },

            /**
             * Display a console.log() or console.error() message
             *
             * @param {boolean|string} errorType Flag if should render as error
             * @param {string} functionName Name of function where error originated
             * @param {string} message Message to dump
             * @param {Object} data Data object to dump
             * @return {boolean} False if not in debug mode, else true
             */
            console: function (errorType, functionName, message, data) {
                // Only run/display messages when in debug mode
                if (this.config.debug === false) {
                    return false;
                }

                var dumpMessage = "VisualGames::" + functionName + " >>\n\t" + message,
                    dumpData = data ? data : '';

                switch (typeof errorType) {
                    case 'boolean':
                        errorType ? console.error(dumpMessage, dumpData) : console.log(dumpMessage, dumpData);
                        break;

                    case 'string':
                        switch (errorType) {
                            case this.errorTypes.warning:
                                console.warn(dumpMessage, dumpData);
                                break;

                            case this.errorTypes.error:
                                console.error(dumpMessage, dumpData);
                                break;

                            case this.errorTypes.log:
                            default:
                                console.log(dumpMessage, dumpData);
                                break;
                        }
                        break;

                    default:
                        console.log(dumpMessage, dumpData);
                        break;
                }
                return true;
            },

            /**
             * Show Game container loader/spinner during request action.
             * Modify container css
             *  - `height` for no UI `jumps/dimension changes` during search/filter,
             *  - `display` so that spinner/loader is center (ver/hor aligned)
             */
            showGameContainerLoader: function () {
                var gContainer = visualFreeGames.getResourceElement('mainGameContainer');
                // Fix/set height to last used height so UI does not change during each search/filter
                gContainer.css('height', gContainer.innerHeight());
                // Empty all pre-filtered games
                gContainer.empty();

                var loader = visualFreeGames.getResourceElement('visualGamesLoader');
                if (loader !== false) {
                    // show loader while we redraw
                    gContainer.append(loader);
                }
            },

            /**
             * Hide Game container loader/spinner.
             * Resets container modifications applied.
             */
            hideGameContainerLoader: function () {
                var gContainer = visualFreeGames.getResourceElement('mainGameContainer');

                gContainer.css('height', '');

                gContainer.empty();
            },

            /**
             * LazyLoad one or more images under the provided element
             * Accepts jQuery or HTML <element>
             *
             * @param element Element to load images for
             */
            loadLazyImages: function (element) {

                if (visualFreeGames.LazyLoading && element) {
                    // targer as HTML element
                    var target = visualFreeGames.isJqueryInstance(element) === true ? element[0] : element;
                    // LazLoading class name/selector - removing `.`
                    var imageSelector = visualFreeGames.LazyLoading.config.selector.replace('.', '');
                    // find images to load in target/element
                    var images = target.getElementsByClassName(imageSelector);
                    // Validate image...
                    if (images.length !== 0) {
                        // LazyLoad the image
                        visualFreeGames.LazyLoading.loadImages(images);
                    }
                }
                else {
                    if (!visualFreeGames.LazyLoading) {
                        visualFreeGames.console(true, 'loadLazyImages', 'LazyLoading library not available!');
                    }

                    if (!element) {
                        visualFreeGames.console(true, 'loadLazyImages', 'No target element!');
                    }
                }
            },

            /**
             * This function cycles over param key/value
             * and runs setClassInstance() for the given pair.
             *
             * @see setClassInstance()
             * @param obj
             */
            modifyClassInstance : function(classIntanceModifiers){
                for(var k in classIntanceModifiers){
                    this.setClassInstance(k, classIntanceModifiers[k]);
                }
            },

            /**
             * This function will modify classInstance data
             * for the provided key and set the given value
             * validating that the given key/prop exists
             *
             * @param key ClassInstance key/prop
             * @param value Value to set
             */
            setClassInstance : function(key, value){
                if(key in this.classInstanceDataObject){
                    this.classInstanceDataObject[key] = value;
                }
            }
        };

        /**
         *
         */
        var searchSystem = {

            /**
             * @var {Promise} Search operation, xhr() wrapper in Promise()
             */
            searchPromise: null,

            /**
             * This function handles all input changes to the search form.
             * @param {object} e - The event object
             * @todo this function could be slated for removal
             */
            handleSearchTimingEvents: function (e) {
                var searchQuery = e.target.value;
                searchSystem.arrangeSearchInterval(searchQuery);
            },

            /**
             * This function triggers the search request promise if and when the necessary
             * conditions have been met. It will recursively run an api request until conditions no longer warrant one.
             * Additional requests will only run if the promise resolves properly.
             * @param {string} searchQuery - the search query from the input form
             */
            arrangeSearchInterval: function (searchQuery) {
                var searchedTerms = searchSystem.manageSearchIntervals.getSearches();
                //run initial search
                if (searchedTerms[searchedTerms.length - 1] !== searchQuery && searchQuery !== '') {
                    visualFreeGames.disableSearchQueryListener();
                    searchSystem.returnSearchPromise(searchQuery).then(function (resolve, reject) {
                        //once promise resolves store the search term in an array
                        searchSystem.manageSearchIntervals.storeSearches(searchQuery);
                        //reactivate the search listener
                        visualFreeGames.listenForSearchQuery();
                        //activate a follow up promise request
                        var searchInput = visualFreeGames.getResourceElement('searchInput')
                        if (searchInput) {
                            searchSystem.arrangeSearchInterval(searchInput.val());
                            visualFreeGames.showFilteredGames(resolve);
                            visualFreeGames.updatePaginatorOnGameSetChange(resolve);
                        }
                    });
                } else if (searchQuery == '') {
                    visualFreeGames.console(false, 'arrangeSearchInterval', 'searchQuery == \'\'');
                    //
                    visualFreeGames.handleFilterResetFromAnywhere();
                }
            },

            /**
             * Run API games search.
             *
             * @param e KeyEvent trigger, or manually feed object
             * @return {boolean} True on triggered search, else False
             */
            runSearch: function (e) {
                // get input element
                var inp = visualFreeGames.getResourceElement('searchInput');
                // search string
                var searchQuery = e.target.value;
                // validate - then set search value to input
                if (inp !== false) {
                    // clear the input and reset searchQuery
                    inp[0].value = searchQuery;
                    // set filter-value so is consistent with other filterData
                    inp.data('filter-value', searchQuery);
                    // get filter/search object syntax
                    var searchData = inp.data();
                    // update filter object
                    visualFreeGames.filterState.setFilterObject(searchData);
                }

                // cancel previous search - Promise
                this.cancelSearch();

                // when search reset starting slice
                //visualFreeGames.filterState.setStartingNumberForSlice(0);

                var filterObject = visualFreeGames.filterState.getFilterObject();
                filterObject.filterType = 'search';

                var data = {
                    providerId: visualFreeGames.providerMap[filterObject.provider],
                    orderById: visualFreeGames.orderByMap[filterObject.orderBy],
                    gameTypeId: visualFreeGames.gameTypeMap[filterObject.gameType],
                    startingNumberForSlice: filterObject.startingNumberForSlice,
                    numberOfItemsToInclude: filterObject.numberOfItemsToInclude,
                    initiatedBy: visualFreeGames.filterInitiators.search,
                    searchString: filterObject.search
                };

                // get search Promise reference
                this.searchPromise = searchSystem.returnSearchPromise(data);
                // attach resolve logic
                this.searchPromise
                    .then(function (resolve, reject) {
                        visualFreeGames.console(false, "runSearch", '\tsearchPromise.then()',
                            {'resolve': resolve, 'reject': reject}
                        );
                        // validate response, no games > set count
                        if (resolve.games === false) {
                            resolve.filtercount = 0;
                        }

                        visualFreeGames.showFilteredGames(resolve);
                        visualFreeGames.updateFilters(resolve, filterObject);
                        visualFreeGames.updatePaginatorOnGameSetChange(resolve);

                    }).catch(function (e) {
                    visualFreeGames.console(true, "runSearch", '\tcatch()', {'e': e});
                });

                return true;
            },

            /**
             * Cancel search Promise through xhr.abort(), and null reference object
             */
            cancelSearch: function () {
                if (this.searchPromise !== null) {
                    this.searchPromise.abort();
                    this.searchPromise = null;
                }
            },

            /**
             * A simple helper function to grab the api xhr request wrapper in a Promise,
             * and the ability to call abort() on the latter to cancel the xhr.
             *
             * @param {string} query - the search query from the input form
             * @return {promise} Promise
             */

            returnSearchPromise: function (data) {
                return searchSystem.prepareApiRequestForGameSearch(data);
            },

            /**
             * A set of multiple closure functions to store and return searches that have been made
             * @todo this is simply a mutable object. Need to do away with IFFE and restructure
             * @todo if not storing previous searches can be removed completely
             */
            manageSearchIntervals: (function () {
                var timeoutArray = [],
                    searchArray = [];

                return {

                    clearTimeoutArray: function () {
                        for (var i = 0; i <= timeoutArray.length; i++) {
                            clearTimeout(timeoutArray[i]);
                        }
                        timeoutArray.length = 0;
                    },

                    /**
                     * @param {string} input - a search query to push to the array
                     */
                    storeSearches: function (input) {
                        searchArray.push(input);
                    },

                    /**
                     * @return {array} searchArray - an array of searches
                     */
                    getSearches: function () {
                        return searchArray;
                    }
                };
            })(),

            /**
             * Return Promise resolving xhr request.
             * Use abort() on returned Promise to xhr.abort() the request
             *
             * @param {string} searchQuery Value to search for
             * @return {Promise}
             */
            prepareApiRequestForGameSearch: function (searchQuery) {
                visualFreeGames.console(
                    false,
                    'prepareApiRequestForGameSearch',
                    '\tSearch query: ',
                    {'searchQuery': searchQuery}
                );
                // construct xhr request
                var xhr = $.ajax({
                    method: "POST",
                    url: visualFreeGames.apiRequestUrl,
                    dataType: 'json',
                    data: {
                        data: {
                            classInstance: visualFreeGames.classInstanceDataObject,
                            data: searchQuery
                        },
                        action: 'searchGames'
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // console log the error - but we resolve false below
                        visualFreeGames.console(true, 'prepareApiRequestForGameSearch', 'Error: ', {
                            'jqXHR': jqXHR,
                            'textStatus': textStatus,
                            'errorThrown': errorThrown
                        });
                    }
                });
                // resolve xhr request in Promise, return false on abort, else data
                var searchPromise = Promise.resolve(xhr).then(function (data) {
                    return data.statusText === 'abort' ? false : data;
                });
                // abort() functionality
                searchPromise.abort = function () {
                    xhr.abort();
                }
                //
                return searchPromise;
            }
        };

        // Get Visual Configuration settings, if missing need to request over ajax
        var visualConfiguration = window.visualConfiguration ? window.visualConfiguration : undefined;

        // Initilise VisualGames Library
        visualFreeGames.init(visualConfiguration);

    });

})(window, document, jQuery, undefined);