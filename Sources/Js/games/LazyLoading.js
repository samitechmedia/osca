/**
 * Lazy Loader for images
 *  >> to be extended as required
 *
 * LazyLoading script for requesting images via Promise.
 * Uses a <div> Element as placeholder which displays a loader/spinner, that holds the required Image element
 * properties to be used. Basic structure as follows
 *
 * <div class="{identifier}"
 *      // First image load
 *      data-src=""
 *      data-alt=""
 *      data-height="XXpx"
 *      data-width="XXpx"
 *
 *      // Recursive HD image load (optional/experimental >> may change the -hd identifier)
 *      data-src-hd=""
 *      data-alt-hd=""
 *      data-height-hd="XXpx"
 *      data-width-hd="XXpx"
 *  >
 *  </div>
 *
 * The default class {identifier} is '.lazyLoader', which can be override as follows;
 *
 *  <script type="text/javascript">
 *      window.LazyLoading : {
 *          'selector': '.lazyLoader'
 *      };
 *  </script>
 *
 * If you change the default identifier make sure you update the spinner/loader identier as well.
 * Following is a reference to the CSS used for the spinner
 *
 *  .[selector]{
 *      border: 5px solid #f3f3f3;
 *      -webkit-animation: spin 1s linear infinite;
 *      animation: spin 1s linear infinite;
 *      border-top: 5px solid #555;
 *      border-radius: 50%;
 *      width: 50px;
 *      height: 50px;
 *
 *      margin:auto;
 *      top: 33%;
 *      position: relative;
 *  }
 *
 *  @keyframes spin {
 *      0% { transform: rotate(0deg); }
 *      100% { transform: rotate(360deg); }
 *  }
 *
 * Version Changes:
 *  0.4:
 *      - Review initialisation adding further validation on whether LazyLoading has run init()
 *      - Updated fallback logic to accept an Object of fallback references loaded via key reference
 *      - Added `validateCss` configuration : true will check and inject missing css for spinner
 *      - Removed call to fn::requestRecursiveLoad()
 *      - Reduced checks on `requiredAttributes` to only 'data-src'
 *      - Update fn::requestImage() height & width validation
 *
 *
 * @author Carlos Wylie
 * @version 0.4
 */

// IE BS...
// https://developer.mozilla.org/en-US/docs/Web/API/CustomEvent/CustomEvent
(function () {
    // Ignore for correct CustomEvent implementation
    if ( typeof window.CustomEvent === "function" ) return false;
    // Else define...
    function CustomEvent ( event, params ) {
        params = params || { bubbles: false, cancelable: false, detail: undefined };
        var evt = document.createEvent( 'CustomEvent' );
        evt.initCustomEvent( event, params.bubbles, params.cancelable, params.detail );
        return evt;
    }

    CustomEvent.prototype = window.Event.prototype;

    window.CustomEvent = CustomEvent;
})();

(function(window, document, undefined) {

    "use strict";
    /**
     * Lazy Loading Script
     *
     * @namespace LazyLoading
     * @author Carlos Wylie
     */
    var LazyLoading = {
        /**
         * Script Version
         * @memberOf LazyLoading
         * @var {String}
         */
        version: '0.4',

        /**
         * Internal check on whether LazyLoading has initialised
         * @property {boolean}
         */
        hasInitialised : false,

        /**
         * Script configuration properties/values
         *
         * @memberOf LazyLoading
         *
         * @property {Object} config Configuration Object
         * @property {boolean} config.debug True to enable console debugging, else false
         * @property {boolean} config.init True to setup/initialise - configuration setup / dependencies check
         * @property {boolean} config.start True to start up LazyLoading - start LazyLoading image processing
         * @property {String} config.selector Class selector applied to identify elements
         * @property {String} config.selectorLoad Class selector applied to elements to load under onLoad Event
         * @property {String} config.selectorScroll Class selector applied to elements to load under under Scroll Event
         * @property {String} config.selectorEvent Class selector applied to elements to load under user Event
         * @property {String} config.eventName Event name identifier, default is `LazyLoader.triggerEventLoad`
         * @property {number} config.timeout Timeout to apply to image load recursive call
         * @property {number} config.toleranceScroll Number of pixels that ScrollEvent should apply before loading an image
         * @property {String} config.fallback URL to fallback image for unresolved images
         */
        config: {
            // Debug flag, true to echo logs
            'debug' : false,
            //
            'init' : true,
            //
            'start' : false,
            // Check style rule for `selector` exists
            'validateCss' : true,
            // Placeholder/img selector
            'selector': '.lazyLoader',
            // Elements to load on init
            'selectorLoad': '.lazyLoaderLoad',
            // Elements to listen to on scroll
            'selectorScroll': '.lazyLoaderScroll',
            // Elements to listen to event dispatch
            'selectorEvent': '.lazyLoaderEvent',
            // Recursive call timeout
            'timeout': 100,
            // Scroll tolerance >> used in scrollTrackingConfig
            'toleranceScroll': 0,
            // Event name to dispatch
            'eventName' : 'LazyLoader.triggerEventLoad',
            // Fallback image(s) to load : string/object
            'fallback' : false,
            //
            'radix' : 10
        },

        /**
         * Note dataset attribute keys,
         * in HTML defined as 'data-abc',
         * but in dataset converted to 'dataAbc'
         *
         * @see https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/dataset
         * @property {Object}
         */
        dataKey: {
            'src' : 'src',
            'fallback' : 'fallback',
            'fallback-key' : 'fallbackKey'
        },

        /**
         * Default fallback key to use,
         * if cannot find one in failed Node
         */
        fallbackDefaultKey : 'default',

        /**
         * Fallback configuration typeOf
         * @property {string}
         */
        fallbackTypeOf : false,

        /**
         * Scroll tracking variable reference, used to identify element positions relative to Window and whether/when
         * the image associated with such should be loaded
         *
         * @memberOf LazyLoading
         * @see LazyLoading.setupScrollTrackingConfig For setup/override process
         *
         * @property {Object} scrollTrackingConfiguration
         * @property {boolean} scrollTrackingConfiguration.scrolling Whether scrolling is taking place
         * @property {number} scrollTrackingConfiguration.scrollY
         * @property {number} scrollTrackingConfiguration.tolerance
         * @property {number} scrollTrackingConfiguration.winHeight
         * @property {number} scrollTrackingConfiguration.scrollLeft
         * @property {number} scrollTrackingConfiguration.scrollTop
         */
        scrollTrackingConfig: {
            'scrolling': false,
            'scrollY': 0,
            'tolerance': 0,
            'winHeight': 0,
            'scrollLeft': 0,
            'scrollTop': 0,
        },

        /**
         * ScrollEvent tracked elements,
         * by listenToScroll(),
         * loaded when come into view by isElementInView()<br>
         *
         * Storing an individual reference to each Element and corresponding Function/callback to executed when it
         * comes into view.<br>
         * <pre>
         *  [{
         *      e: element,
         *      f: callback()
         *  }, ... ]
         * </pre>
         *
         * @memberOf LazyLoading
         * @see LazyLoading.listenToScroll
         *
         * @property {Array} elementsScrollTracking
         * @property {Object} elementsScrollTracking.{} Object Reference
         * @property {Element} elementsScrollTracking.{}.e Element being tracked
         * @property {Function} elementsScrollTracking.{}.f Function callback to execute once Element is in view
         *
         */
        elementsScrollTracking: [],

        /**
         * Reference to Elements to process on Event( LazyLoader.triggerEventLoad )
         *
         * @memberOf LazyLoading
         *
         * @property {array} elementsEventListening Element reference
         */
        elementsEventListening: [],

        /**
         * Lazy Loader default css styles to apply if not found/resolved for the default selector
         *  - `config`.`selector`
         */
        cssStyle : '{\n' +
        'border: 5px solid #f3f3f3;\n' +
        '-webkit-animation: spinLazyLoader 1s linear infinite;\n' +
        'animation: spinLazyLoader 1s linear infinite;\n' +
        'border-top: 5px solid #555;\n' +
        'border-radius: 50%;\n' +
        'width: 50px;\n' +
        'height: 50px;\n' +
        '\n' +
        'position: relative;\n' +
        'margin:auto;\n' +
        'top:22.5%;\n' +
        '}\n' +
        '\n' +
        '@keyframes spinLazyLoader {\n' +
        '0% { transform: rotate(0deg); }\n' +
        '100% { transform: rotate(360deg); }\n' +
        '}',

        /**
         * Available/reference to HTTP request methods to use
         *
         * @memberOf LazyLoading
         *
         * @property {Object} requestMethods
         * @property {string} requestMethods.METHOD_POST `POST` method string
         * @property {string} requestMethods.METHOD_GET `GET` method string
         * @property {string} requestMethods.METHOD_PUT `PUT` method string
         */
        requestMethods : {
            METHOD_POST : 'POST',
            METHOD_GET : 'GET',
            METHOD_PUT : 'PUT',
        },

        /**
         * Initialises LazyLoading,
         * extends configuration variables if any are provided,
         * and runs dependency check for Promise() and request CL es-6-polyfill script if missing.<br>
         * If polyfill is required fn will return false, and run a callback post dependency resolution.
         *
         *
         * @memberOf LazyLoading
         * @see LazyLoading.loadImages()
         *
         * @param {object} config Configuration to apply
         * @returns {boolean} True on success, else False on missing dependency
         */
        init: function (config) {
            // Extend configuration variables
            for (var k in LazyLoading.config) {
                if (config.hasOwnProperty(k)) {
                    LazyLoading.config[k] = config[k];
                    // Dump in console when in debug mode
                    LazyLoading.console(false, 'init', 'updateConfig', {'k' : k, 'value' : config[k]});
                }
            }

            // Check for Promise() support
            if(LazyLoading.isPromiseAvailable() === false){
                // Request polyfill script and call init()
                LazyLoading.requestPromisePolyfill( LazyLoading.init );
                // Prevent execution this time round
                return false;
            }
            // Internal reference to successful initialisation
            LazyLoading.hasInitialised = true;
            // Return success
            return true;
        },

        /**
         * Starts LazyLoading,
         * running the process inside a Promise or as inline script.
         *
         * @memberOf LazyLoading
         * @method start
         *
         * @param {boolean} asPromise True to execute process in a Promise() and return a reference to it,
         * else False to just execute
         * @return {boolean|Promise} True on success start, False on failure, or Promise
         */
        start : function (asPromise) {
            // Return var
            var RR = false;
            // requested load as Promise (so can .then() response)
            if(asPromise === true){
                RR = new Promise(function(resolve, reject){
                    try {
                        // Self recursive call
                        LazyLoading.start(false);
                        resolve(true);
                    }
                    catch(e){
                        reject(e);
                    }
                });
            }
            // request load
            else {
                // Run script configurations setup
                LazyLoading.setupConfigurations();
                // Setup LazyLoading listeners,
                //  - scroll listener
                LazyLoading.listenToScroll();
                //  - resize events
                LazyLoading.listenToResize();
                //  - LazyLoading event
                LazyLoading.listenToEvent();

                // Run LazyLoading selectors
                //  - elements to load on scroll (into view)
                LazyLoading.addElementsLoadOnScroll(LazyLoading.config.selectorScroll, false);
                //  - elements to load on event dispatch, default to false on assumption user will dispatch Event()
                LazyLoading.addElementsLoadOnEvent(LazyLoading.config.selectorEvent, false);
                //  - elements to load immediately
                LazyLoading.addElementsLoadOnInit(LazyLoading.config.selectorLoad);

                RR = true;
            }

            return RR;
        },

        /**
         * Check if Promise is supported
         *
         * @memberOf LazyLoading
         * @method isPromiseAvailable
         * @returns {boolean} True if available, else False
         */
        isPromiseAvailable: function () {
            return !window.Promise ? false : true
        },

        /**
         * Request polyfill scripts,
         * and executes a callback function on script.load if provided
         *
         * @memberOf LazyLoading
         * @method requestPromisePolyfill
         * @param {function} callback Reference to fn to call on script.onload() Event
         */
        requestPromisePolyfill: function (callback) {
            LazyLoading.console(false, "requestPromisePolyfill", 'Requesting...', {'callback': callback});
            // Create element
            var script = document.createElement("script");
            // Set properties
            script.type = 'text/javascript';
            script.src = "/CodeLibrary/ThirdParty/Javascript/es6-promise-polyfill.js";
            // Set callback
            if(typeof callback === 'function') {
                script.onload = callback;
            }
            // Add to document
            document.body.appendChild(script);
        },

        /**
         * Find/process Nodes/Elements to process.<br>
         * Uses document.querySelectorAll( selectorOrNodes ) to find Elements if string selector is provided,
         * or processes single/multiple Node/Element references,
         * returning an Array on success, else Boolean false.
         *
         * @memberOf LazyLoading
         * @method getElementsToProcess
         * @param {string|Object|Array} selectorOrNodes String to querySelectorAll(), single Node/Element or Array of
         * @returns {Array|boolean} Array of Node/Elements to process, else Boolean False on failure
         */
        getElementsToProcess : function(selectorOrNodes){
            var elements = [];

            if(typeof selectorOrNodes === 'string'){
                // Run selector
                elements = document.querySelectorAll(selectorOrNodes);
            }
            else if(typeof selectorOrNodes === 'object'){
                // Assuming single element pushed
                elements.push(selectorOrNodes);
            }
            else if(selectorOrNodes.length > 0){
                // Assuming could be jQuery found
                for(var i=0;i<selectorOrNodes.length;i++){
                    elements.push(selectorOrNodes[i]);
                }
            }
            else{
                LazyLoading.console(true, 'addElementsLoadOnScroll', '\tCould not resolve "selectorOrNode" with value ', selectorOrNodes);
                return false;
            }

            return elements;
        },

        /**
         * Add elements to scroll event,
         * and trigger associated Event if requested.
         *
         * @memberOf LazyLoading
         * @method addElementsLoadOnScroll
         *
         * @see LazyLoading.getElementsToProcess
         * @see LazyLoading.dispatchEventScroll
         *
         * @param {string|Object} selectorOrNodes String selector, or Array or Node/Elements
         * @param {boolean} triggerListener True to trigger Event(), else False
         */
        addElementsLoadOnScroll : function(selectorOrNodes, triggerListener){
            var elementsLoadOnScroll = LazyLoading.getElementsToProcess(selectorOrNodes);

            if (elementsLoadOnScroll.length > 0) {
                // For each...
                for(var i = 0; i<elementsLoadOnScroll.length; i++ ) {
                    var e = elementsLoadOnScroll[i];
                    // Track these elements in window scroll, and execute function() as callback when come into view
                    LazyLoading.addTrackingElement(
                        e,
                        function (element) {
                            // Find LazyLoading placeholder in element and load the image
                            //LazyLoading.loadImage(element.querySelector(LazyLoading.config.selector));

                            // Find all LazyLoading placeholder in element and load the images
                            LazyLoading.loadImages(element.querySelectorAll(LazyLoading.config.selector));
                        })
                }
            }

            // Trigger Event
            if(triggerListener){
                LazyLoading.dispatchEventScroll();
            }
        },

        /**
         * Add elements to LazyLoader event, and trigger listener if requested
         *
         * @see LazyLoading::getElementsToProcess();
         * @see LazyLoading::dispatchEventLoad();
         * @param {string|Object} selectorOrNodes String selector, or Node(s)
         * @param {boolean} triggerListener True to trigger Event(), else false
         */
        addElementsLoadOnEvent : function( selectorOrNodes, triggerListener ){
            // elements to process
            var elementsLoadOnEvent = LazyLoading.getElementsToProcess(selectorOrNodes);
            // validate
            if (elementsLoadOnEvent.length > 0) {
                for(var i=0, len = elementsLoadOnEvent.length; i < len; i++) {
                    LazyLoading.elementsEventListening.push(elementsLoadOnEvent[i]);
                }
            }

            // Trigger Event
            if(triggerListener){
                LazyLoading.dispatchEventLoad();
            }
        },

        /**
         * Add and process Elements to resolve immediately during LazyLoader.init()
         *
         * @memberOf LazyLoading
         * @method addElementsLoadOnInit
         *
         * @see LazyLoading.getElementsToProcess
         *
         * @param {string|Object} selectorOrNodes String selector, or Nodes/Elements reference
         * @param {boolean} triggerListener True to trigger Event(), else false
         */
        addElementsLoadOnInit : function(selectorOrNodes){
            var elementsLoadNow = LazyLoading.getElementsToProcess(selectorOrNodes);

            if (elementsLoadNow.length > 0) {
                LazyLoading.loadImages(elementsLoadNow);
            }
        },

        /**
         * Dispatch CustomEvent for the provided eventName reference
         *
         * @memberOf LazyLoading
         * @method dispatchEvent
         *
         * @param {string} eventName Event name to dispatch
         * @returns {boolean} True on dispatch, False on invalid eventName
         */
        dispatchEvent: function (eventName) {
            if(typeof eventName !== 'string'){
                LazyLoading.console(true, "dispatchEvent()", 'invalid eventName',
                    {'eventName' : eventName, 'typeof' : typeof eventName}
                );
                return false;
            }

            LazyLoading.console(false, "dispatchEvent()", eventName, null);

            window.dispatchEvent(new CustomEvent(eventName));
            //
            return true;
        },

        /**
         * Dispatch LazyLoading Load Event,
         * using configuration provided eventName
         *
         * @memberOf LazyLoading
         * @method dispatchEventLoad
         *
         * @see LazyLoading.dispatchEvent
         * @see LazyLoading.config
         */
        dispatchEventLoad: function(){
            LazyLoading.dispatchEvent(LazyLoading.config.eventName);
        },

        /**
         * Dispatch window.scroll Event
         *
         * @memberOf LazyLoading
         * @method dispatchEventScroll
         *
         * @see LazyLoading.dispatchEvent
         */
        dispatchEventScroll: function(){
            LazyLoading.dispatchEvent('scroll');
        },

        /**
         * Add LazyLoading eventLoadImages fn using provided configuration eventName,
         * attached to window
         *
         * @memberOf LazyLoading
         * @method listenToEvent
         *
         * @see LazyLoading.config.eventName
         * @see LazyLoading.eventLoadImages
         */
        listenToEvent: function () {
            window.addEventListener(LazyLoading.config.eventName, LazyLoading.eventLoadImages);
        },

        /**
         * Process Elements associated to LazyLoading.config.eventName,
         * and triggers loading of images for these.
         *
         *
         * @memberOf LazyLoading
         * @method eventLoadImages
         *
         * @see LazyLoading.config.selector
         * @see LazyLoading.loadImages
         */
        eventLoadImages: function () {
            if (LazyLoading.elementsEventListening.length) {
                //
                for(var i=0, len = LazyLoading.elementsEventListening.length;i<len; i++) {
                    //
                    LazyLoading.loadImages(
                        LazyLoading.elementsEventListening[i].querySelectorAll(LazyLoading.config.selector)
                    );
                }
            }
        },

        /**
         * Listen to window resize event.<br>
         * On resize recalculates scroll settings and dispatches Event,
         * to check if on resize any Elements have moved into view.
         *
         * @memberOf LazyLoading
         * @method listenToResize
         *
         * @see LazyLoading.setupScrollTrackingConfig
         * @see LazyLoading.dispatchEventScroll
         *
         * @todo Extend with eventListener options > but need to ensure compatibility check
         */
        listenToResize: function () {
            // Setup the event listener
            window.addEventListener('resize', function (e) {
                // Reset/update the configuration... dimensions have changed
                LazyLoading.setupScrollTrackingConfig(true);
                // Dispatch event - check if any elements came into view
                LazyLoading.dispatchEventScroll();
            });
        },

        /**
         * Process multiple LazyLoading images.<br>
         * Loops over provided placeholder @param
         * and calls LazyLoading.loadImage() on each entry
         *
         * @memberOf LazyLoading
         * @method loadImages
         *
         * @see LazyLoading.loadImage
         * @param {HTMLElement[]} placeholders Array of elements to process
         * @returns {boolean} True on success, else False
         */
        loadImages: function (placeholders) {
            // Count elements to process
            var count = placeholders.length;

            if (count === 0) {
                return false;
            }

            // Cycle over and load
            for (var i = 0; i < count; i++) {
                LazyLoading.loadImage(placeholders[i]);
            }

            return true;
        },
        /**
         * Request image load
         *
         * @memberOf LazyLoading
         * @method loadImage
         *
         * @see LazyLoading.requestImage
         * @see LazyLoading.replaceWithImage
         * @see LazyLoading.requestRecursiveLoad
         * @see LazyLoading.requestImageHandleError
         *
         * @param placeholder LazyLoading image placeholder
         */
        loadImage: function (placeholder) {
            if(placeholder === undefined){
                return false;
            }

            LazyLoading.requestImage(placeholder)
            // Replace with requested image
                .then(LazyLoading.replaceWithImage)
                // Recursive self call (nested image load)
                //  .then(LazyLoading.requestRecursiveLoad)
                // Catch errors
                .catch(LazyLoading.requestImageHandleError);
        },

        /**
         * Run a XHR request for an image resource in a Promise.<br>
         * Gets data-attributes from the placeholder Element/Node and (tries to) create an Image resource.<br>
         *
         * On success it resolve() an Object containing the placeholder node and the newly created Image resource,
         * so the placeholder can be replaced with the Image resource.<br>
         *
         * On error it reject() an error message.
         *
         * @memberOf LazyLoading
         * @method requestImage
         *
         * @see LazyLoading.attributesValidate
         * @see LazyLoading.removeLazyClasses
         * @see LazyLoading.attributeModifier
         *
         * @param {HTMLElement} node Element containing image resource details
         * @returns {Promise} Promise running XHR request
         */
        requestImage: function (node) {

            // Add a check for when send over a jQuery found element
            if (window.$ && node instanceof jQuery && node.length) {
                node = node[0];
            }

            if(!node){
                LazyLoading.console(true, 'requestImage', 'Invlaid / missing Node', {'node' : node});
            }

            var radix = LazyLoading.config.radix || 10;

            // Return Promise...
            return new Promise(function (resolve, reject) {
                // Check have required attributes
                // Assumption will ONLY hold data- attr for LazyLoading ELSE extend with attribute 'data-lazy-'
                var attrChecked = LazyLoading.attributesValidate(node.attributes);
                // String for errors
                if (typeof attrChecked === 'string') {
                    reject(attrChecked);
                }
                // Empty for completed recursive calls
                else if (attrChecked.length === 0) {
                    // Return false over reject, for instance where making recursive calls
                    return false;
                }
                // Get required attributes
                var src = attrChecked['data-src'],
                    height = node.dataset.height || false,
                    width = node.dataset.width || false,
                    alt = node.dataset.alt || false;

                // Image Node
                var img = new Image();
                // Promise response {node : dataHolder/replaceWithImage, img : imageResource}
                var response = {
                    node: node,
                    img: img
                };

                // On successful load, resolve()
                img.onload = function () {
                    resolve(response);
                }
                // On unsuccessful load, reject()
                img.onerror = function () {
                    var errorMessage = 'Failed to load image src: ' + src;
                    reject({node:node, error : errorMessage});
                }

                // Validate & process height
                if(height !== false) {
                    switch (typeof height) {
                        case 'string':
                            height = parseInt(height.replace('px', ''), radix);
                            if (Number.isNaN(height)) {
                                LazyLoading.console(true, 'requestImage.Promise', 'Invalid height', null);
                                break;
                            }
                        case 'number':
                            img.height = height;
                            break;
                    }
                }

                // Validate & process width
                if(width !== false) {
                    switch (typeof width) {
                        case 'string':
                            width = parseInt(width.replace('px', ''), radix);
                            if (Number.isNaN(width)) {
                                LazyLoading.console(true, 'requestImage.Promise', 'Invalid weight', null);
                                break;
                            }
                        case 'number':
                            img.width = width;
                            break;
                    }
                }

                // Set alternative message
                if(typeof alt === 'string') {
                    img.alt = alt;
                }
                // Set image source
                img.src = src;
                // Set image classes, having removed LazyLoader classes
                img.className = LazyLoading.removeLazyClasses(node.className);

                // Check for recursive attributes (currently only for HD)
                //var recursiveAttributes = LazyLoading.attributesModifier(attrChecked);
                // Set recursive attributes to Image
                // Note that we dont need Lazy class identifiers by this stage as have direct node/element reference
                //for (var prop in recursiveAttributes) {
                //    img.setAttribute(prop, recursiveAttributes[prop]);
                //}
            });
        },

        /**
         * Handle image load error.<br>
         * Will attempt to load fallback image, if one has been defined.
         *
         * @memberOf LazyLoading
         * @method requestImageHandleError
         *
         * @see LazyLoading.loadImage
         *
         * @param {Object} rejected
         * @param {Element} rejected.node
         * @param {String} rejected.error
         *
         */
        requestImageHandleError : function(rejected) {
            var node = rejected.node, errMessage = rejected.error;

            LazyLoading.console(true, 'requestImageHandleError' , errMessage,
                { 'rejected' : rejected, 'node' : node});

            if(LazyLoading.dataKey['fallback'] in node.dataset === false){
                // Check for/get Fallback-Type
                var customFallbackKey = node.dataset[ LazyLoading.dataKey['fallback-key'] ] || false;
                // Get the Fallback Resource
                var fallbackToLoad = LazyLoading.getFallbackResource(customFallbackKey);
                //
                if(fallbackToLoad !== false){
                    //node.setAttribute(LazyLoading.dataKey['src'] , fallbackToLoad);
                    node.dataset[ LazyLoading.dataKey['src'] ] = fallbackToLoad;
                    // Flag tried to fallback
                    //node.setAttribute(LazyLoading.dataKey['fallback'], 'true');
                    node.dataset[ LazyLoading.dataKey['fallback'] ] = 'true';
                    // Attempt load...
                    LazyLoading.loadImage(node);
                }

                LazyLoading.console(false, 'requestImageHandleError', '', {
                    customFallbackKey : customFallbackKey,
                    fallbackToLoad : fallbackToLoad
                });
            }
            else {
                LazyLoading.console(true, "requestImageHandleError", "Tried to load fallback with no success!", null);
            }
        },

        /**
         * Set the default fallback key
         * @param key
         */
        set setFallbackDefaultKey(key) {
            this.fallbackDefaultKey = key;
        },

        /**
         * Get the default fallback key
         * @returns {string}
         */
        get getFallbackDefaultKey() {
            return this.fallbackDefaultKey;
        },

        /**
         * Get fallback data
         * @returns {boolean}
         */
        get getFallbackData() {
            return this.config.fallback;
        },

        /**
         *
         * @returns {boolean|string}
         */
        getFallbackResource : function( keyReference ) {
            var refResource = false;
            //
            if (LazyLoading.config.fallback) {
                //
                switch (LazyLoading.fallbackTypeOf) {
                    case 'string':
                        // Set fallback value
                        refResource = this.getFallbackData;
                        break;

                    case 'object':
                        var fallbackObject = this.getFallbackData;

                        if(fallbackObject.hasOwnProperty(keyReference)){
                            refResource = fallbackObject[keyReference];
                        }
                        else if(fallbackObject.hasOwnProperty(this.getFallbackDefaultKey)) {
                            refResource = fallbackObject[this.getFallbackDefaultKey];
                        }

                        break;

                    default:
                        break;
                }
            }

            return refResource;
        },

        /**
         * Strip any LazyLoading classes from the provided class string.
         *
         * @memberOf LazyLoading
         * @method removeLazyClasses
         *
         * @param {string} stringClass Element classes as one string
         * @returns {string} Modified classes
         */
        removeLazyClasses : function(stringClass){
            var returnClass = '',
                separator = ' ';

            if(!stringClass || typeof stringClass !== 'string'){
                return returnClass;
            }

            // Classes to validate
            var classAsArray = stringClass.split(separator),
                // Classes to check for, having removed the `.`
                /*@todo run on init so prevent recursive definition */
                classChecks = [
                    LazyLoading.config.selector.substr(1),
                    LazyLoading.config.selectorEvent.substr(1),
                    LazyLoading.config.selectorLoad.substr(1),
                    LazyLoading.config.selectorScroll.substr(1),
                ];

            // For all Lazy selectors
            for(var i=0;i<classChecks.length;i++){
                // Check if set in class array
                var index = classAsArray.indexOf(classChecks[i]);
                // If defined...
                if(index !== -1) {
                    // Remove it
                    classAsArray.splice(classAsArray.indexOf(classChecks[i]), 1);
                }
            }

            // Join to string
            if(classAsArray.length){
                returnClass = classAsArray.join(separator);
            }

            return returnClass;
        },

        /**
         * Run recursive image load call.
         *
         * @memberOf LazyLoading
         * @method requestRecursiveLoad
         *
         * @see LazyLoading.loadImage
         * @param {Element|Node} element Element to process
         *
         * @todo review with the aim to allow loading low-res -> high-res images
         */
        requestRecursiveLoad: function (element) {

            if (!element) {
                return false;
            }

            // Timeout for testing...
            setTimeout(function (element) {
                LazyLoading.console(false, "LazyLoading::requestRecursiveLoad()", "running recursive call..");
                LazyLoading.loadImage(element)
            }, LazyLoading.config.timeout);
        },

        /**
         * Validate provided attributes.<br>
         * Captures 'data-' attributes and validates them if exist.<br>
         * On success return the attributes, else return error message.<br><br>
         *
         * Note that attributes param can be empty after/under recursive calls.
         *
         * @memberOf LazyLoading
         * @method attributesValidate
         *
         * @param {NamedNodeMap} attributes Array of attributes to validate
         * @return {Object|string} Attributes on success (can be empty), else error message
         */
        attributesValidate: function (attributes) {
            // Manual length
            var responseAttributes = {'length': 0}

            // Cycle over attributes and keep anything with data-
            for (var index in attributes) {
                // Only for those of type string
                if (typeof attributes[index]['name'] === 'string') {
                    // Capture attribute name+value
                    var attrName = attributes[index]['name'],
                        attrValue = attributes[index]['value'];

                    // Only for those starting with `data`
                    if (attrName.indexOf('data') === 0) {
                        responseAttributes[attrName] = attrValue;
                        responseAttributes['length']++;
                    }
                }
            }

            // Capture any validation errors
            var errorMessages = [];
            // Only validate if have attributes
            if (responseAttributes.length !== 0) {
                // Get required attributes for image to work/load
                // Run check that these are actually defined...
                var requiredAttributes = ['data-src'];
                //var requiredAttributes = ['data-src', 'data-height', 'data-width', 'data-alt'];
                // Process...
                for (var index in requiredAttributes) {
                    if (responseAttributes.hasOwnProperty(requiredAttributes[index]) === false) {
                        var eMessage = '\n\tMissing attribute ' + requiredAttributes[index];
                        errorMessages.push(eMessage);
                    }
                }
            }

            // Return errors if present
            if (errorMessages.length !== 0) {
                return errorMessages.join("");
            }
            // Return attributes
            return responseAttributes;
        },

        /**
         * Check and alters attribute name.<br>
         * Used under recursive call operations i.e. data-src-hd >> data-src
         *
         * @memberOf LazyLoading
         * @method attributesModifier
         *
         * @see LazyLoading.attributesValidate
         * @param {Array} attributes
         * @return {Array} Modified attributes
         */
        attributesModifier: function (attributes) {
            // Will need to extend if want to chain load more than one image...
            var attributesData = [],
                // Regex expresion
                regexp = /-hd/i,
                // Search value
                replaceSearch = '-hd',
                // Replace value
                replaceWith = '';

            // For all entries..
            for (var index in attributes) {
                // Run match
                var found = index.match(regexp);
                // If matched
                if (found) {
                    // Modify the attribute
                    attributesData[index.replace(replaceSearch, replaceWith)] = attributes[index];
                }
            }

            return attributesData;
        },
        /**
         * Called under Request Promise.resolve()<br>
         * Replaces container/placeholder with resolved image Node/Element.
         *
         * @memberOf LazyLoading
         * @method replaceWithImage
         *
         * @param {Object} data Promise resolved data {}
         */
        replaceWithImage: function (data) {
            var node = data.node,
                img = data.img,
                parent = node.parentNode;

            // Check exists, due to recursive calls
            if(!parent){
                return false;
            }

            // Replace node with the resolver <img>
            parent.replaceChild(img, node);

            //return data;
            return img;
        },

        /**
         * Attach listener to `scroll` event.
         * On trigger evaluates scroll activity and calls reactToScroll().<br>
         *
         * Timeout set to update scroll tracking variable to false
         *
         * @memberOf LazyLoading
         * @method listenToScroll
         *
         * @see LazyLoading.reactToScroll
         * @see LazyLoading.scrollTrackingConfig.scrolling
         *
         * @todo add ListenerOptions Support
         */
        listenToScroll: function () {
            // Setup the event listener
            window.addEventListener('scroll', function (e) {
                // Update dependencies for scrolling listener
                LazyLoading.setupScrollTrackingConfig(false);
                // Limit execution calls
                if (!LazyLoading.scrollTrackingConfig.scrolling) {
                    // https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
                    window.requestAnimationFrame(function () {
                        LazyLoading.reactToScroll();
                        LazyLoading.scrollTrackingConfig.scrolling = true;
                    });
                }

                // Delay triggers...
                setTimeout(function () {
                    LazyLoading.scrollTrackingConfig.scrolling = false;
                }, 100);
            });
        },

        /**
         * Track an element for LazyLoading in view condition,<br>
         * adding a reference to the element and a callback function to execute when the condition is satisfied.<br>
         *
         * Callback function is executed using Promise,
         * trigger the callback and resolving the element,
         * and calling removeTrackingElement when the Promise resolves
         *
         * @memberOf LazyLoading
         * @method addTrackingElement
         *
         * @param {Element|Node} element Element to track
         * @param {function} callback Function to trigger when comes into view
         * @return {boolean} True if added successfully, else false
         */
        addTrackingElement: function (element, callback) {
            if (!element) {
                LazyLoading.console(true, "addTrackingElement", "Invalid element reference provided", null);
                return false;
            }

            if (typeof callback !== 'function') {
                callback = function () {
                    LazyLoading.console(true, "addTrackingElement", "No resolve() function was defined!", null);
                };
            }

            // Modify the callback to add custom Promise.resolve()
            var mCallback = function () {
                new Promise(function (resolve, reject) {
                    // Run the user defined callback
                    callback(element);
                    // Resolve() our Promise.then()
                    resolve(element);
                }).then(LazyLoading.removeTrackingElement);
            }
            // Push reference element and callback function to execute
            this.elementsScrollTracking.push({'e': element, 'f': mCallback});

            return true;
        },

        /**
         * Remove element tracked by listenToScroll().<br>
         * Elements are removed by identity comparison using innerHTML.
         *
         * @memberOf LazyLoading
         * @method removeTrackingElement
         *
         * @see LazyLoading.elementsScrollTracking
         *
         * @param {Element|Node} elm The element to remove
         */
        removeTrackingElement: function (elm) {
            // Cycle over scroll (in reverse - prevent index exception)
            for(var i=LazyLoading.elementsScrollTracking.length-1; i>0; i--) {
                if (elm.innerHTML === LazyLoading.elementsScrollTracking[i].e.innerHTML) {
                    var removed = LazyLoading.elementsScrollTracking.splice(i, 1);
                    LazyLoading.console(false, 'removeTrackingElement', '', {element : removed});
                    return false;
                }
            }
        },

        /**
         * Reaction call to listenToScroll() function.<br>
         *
         * Cycle over all tracked elements and run isElementInView() check.
         * For any element meeting the condition trigger the callback
         *
         * @memberOf LazyLoading
         * @method reactToScroll
         *
         * @see LazyLoading.isElementInView
         * @see LazyLoading.listenToScroll
         */
        reactToScroll: function () {
            // For all scroll elements registered / to listen to
            for(var i=0;i<LazyLoading.elementsScrollTracking.length; i++) {
                // Check if element `e` is in view, and call resolve() defined function `f`
                LazyLoading.isElementInView(LazyLoading.elementsScrollTracking[i].e).then(LazyLoading.elementsScrollTracking[i].f);
            }
        },

        /**
         * Check if an element is in view.<br>
         * Runs check in a Promise,
         * and for in-view elements condition calls resolve() on the element.
         *
         * @memberOf LazyLoading
         * @method isElementInView
         *
         * @see LazyLoading.scrollTrackingConfig For configuration variables
         *
         * @param {Element|Node} el The element to check
         * @return {Promise} Promise reference, calling resolve() if element is in view
         */
        isElementInView: function (el) {
            // Start loading BEFORE reach the element?
            return new Promise(function (resolve, reject) {
                // Current Y position
                var posY = LazyLoading.scrollTrackingConfig.scrollY,
                    // Boundary tolerance
                    tolerance = LazyLoading.scrollTrackingConfig.tolerance,
                    // Height (in pixels) of the browser window viewport including, if rendered, the horizontal scrollbar.
                    winHeight = LazyLoading.scrollTrackingConfig.winHeight,
                    // Should always return top & left (+ more values depending on browser support)
                    rect = el.getBoundingClientRect(),
                    // Scroll Offsets
                    scrollLeft = LazyLoading.scrollTrackingConfig.scrollLeft,
                    scrollTop = LazyLoading.scrollTrackingConfig.scrollTop,
                    // Element position relative to document
                    position = {
                        top: rect.top + scrollTop,
                        left: rect.left + scrollLeft,
                        bottom: rect.top + scrollTop + rect.height,
                    },
                    // Upper bound check
                    checkUpper = posY - tolerance,
                    // Lower bound check
                    checkLower = (winHeight + posY) + tolerance;
                // Element is in view
                if ((checkUpper < position.top && checkLower > position.top ) || (checkUpper < position.bottom && checkLower > position.bottom)) {
                    resolve(el);
                }

            });
        },

        /**
         * Setup any script dependencies/listeners.
         *
         * @memberOf LazyLoading
         * @method setupConfigurations
         *
         * @see LazyLoading.setupScrollTrackingConfig
         * @see LazyLoading.checkCssClass
         */
        setupConfigurations: function () {
            // Setup Scroll Configuration
            LazyLoading.setupScrollTrackingConfig(true);
            // Validate if a CSS style has been set for the default selector
            if(LazyLoading.config.validateCss === true) {
                LazyLoading.checkCssClass(LazyLoading.config.selector);
            }
            // Validate Fallback
            LazyLoading.validateFallbackType(LazyLoading.config.fallback);
        },

        /**
         * Setup scrollTrackingConfig.
         *
         * @memberOf LazyLoading
         * @method setupScrollTrackingConfig
         *
         * @see LazyLoading.scrollTrackingConfig
         *
         * @param {Boolean} setAll True to set/reset configuration, False to only update scroll references
         */
        setupScrollTrackingConfig: function (setAll) {
            // Validate flag
            if (typeof setAll !== 'boolean') {
                setAll = false;
            }

            if (setAll === true) {
                // Window Height >> will change with orientaion changes...
                LazyLoading.scrollTrackingConfig.winHeight = window.innerHeight;
                // Scroll tolerance
                LazyLoading.scrollTrackingConfig.tolerance = LazyLoading.config.toleranceScroll;
            }

            // Left scroll position
            LazyLoading.scrollTrackingConfig.scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
                // Top scroll position
                LazyLoading.scrollTrackingConfig.scrollTop = window.pageYOffset || document.documentElement.scrollTop,
                // Current Scroll Position Y
                LazyLoading.scrollTrackingConfig.scrollY = window.scrollY;

        },

        /**
         * Display a console.log() or console.error() message,
         * for the provided data/params, when configuration.debug flag is set to true>
         *
         * @todo Make as component so can reuse...
         *
         * @memberOf LazyLoading
         * @method console
         *
         * @param {boolean} isError Flag if should render as error
         * @param {string} functionName Name of function where error originated
         * @param {string} message Message to dump
         * @param {Object} data Data object to dump
         *
         * @return {boolean} False if not in debug mode, else true
         */
        console : function(isError, functionName, message, data ){
            // Only run/display messages when in debug mode
            if(!this.config.debug){
                return false;
            }

            var dumpMessage = "LazyLoading::" + functionName+" >>\n" + message,
                dumpData = data ? data : '';

            if(isError){
                console.error(dumpMessage, dumpData);
            }
            else{
                console.log(dumpMessage, dumpData);
            }

            return true;
        },

        /**
         * Validate if a CSS class style has been set for the default selector
         *
         * Note that `styleSheets` is under Working Draft so will only work under supported Browsers
         * @see https://developer.mozilla.org/en-US/docs/Web/API/Document/styleSheets StyleSheets Draft
         *
         * @param {string} className Class name to check
         * @todo Review support/compatibility
         */
        checkCssClass : function(className){
            // Execute asynchronously...
            return new Promise(function (resolve, reject) {
                // If supports styleSheets and one is defined for the given className being validated
                if (document.styleSheets && document.styleSheets.length !== 0) {
                    //
                    var hasLazyLoadingStyles = false;
                    // Loop over all styles sheets...
                    loop1:
                        for (var i = 0; i < document.styleSheets.length; i++) {
                            //
                            if (document.styleSheets[i]['cssRules']) {
                                // Loop over all CSS rules for given StyleSheet...
                                loop2:
                                    for (var r = 0; r < document.styleSheets[i]['cssRules'].length; r++) {
                                        // var reference
                                        var cssRule = document.styleSheets[i]['cssRules'][r];
                                        // validate check - not checking @keyframes
                                        if (cssRule.constructor.name === 'CSSStyleRule' && cssRule['selectorText'] === className) {
                                            hasLazyLoadingStyles = true;
                                            break loop1;
                                        }
                                    }
                            }
                        }

                    // If style could not be resolved, lets inject ourselves
                    if (hasLazyLoadingStyles === false) {
                        LazyLoading.console(true, "checkCssClass", "No style sheets", {});
                        //
                        var style = document.createElement('style'),
                            head = document.head || document.getElementsByTagName('head')[0];

                        // Define type
                        style.type = 'text/css';

                        // Assign style rule className
                        var classStyleRule = className + LazyLoading.cssStyle;

                        // inject/set css content
                        style.appendChild(
                            document.createTextNode(classStyleRule)
                        );

                        // attach..
                        head.appendChild(style);
                    }
                    else{
                        LazyLoading.console(true, "checkCssClass", "Style style present", {});
                    }
                }
            });
        },

        /**
         * Validate fallback reference data to be valid,
         * string or object
         *
         * @param {String|Object} fallback
         */
        validateFallbackType : function (fallback){
            // Identify type
            var fallbackTypeOf = typeof fallback;
            // Validate type
            switch (fallbackTypeOf) {
                case 'boolean':
                    // default false - ignore
                    break;
                case 'string':
                case 'object':
                    LazyLoading.fallbackTypeOf = fallbackTypeOf;
                    break;

                default:
                    LazyLoading.console(true, 'validateFallbackType', 'Unknown fallback configuration',
                        {'fallback': fallback, 'fallbackType': typeof fallback}
                    );
            }
        },

        //////////
        // FOLLOWING IS WORK IN PROGRESS TO WRITE AJAX GET/POST VIA PROMISE
        // AND HAS NOT BEEN PROPERTY DOCUMENTED
        // THIS SHOULD BE REMOVED OVER REQUEST OBJECT WITH NATIVE FUNCTIONALITY - NO JQUERY
        //////////
        /**
         * Make a XMLHttpRequest via Promise()
         * Both resolve() and request() take the XMLHttpRequest Object so 'response' must be directly accessed
         *
         * TODO>>think of way to store xhr so that can use .abort() in chained requests (ajax search ?)
         *
         * @param method Method to invoke
         * @param url Url to call
         * @param params Request params, converted to string, accepts String, Number, Object
         * @return {XMLHttpRequest|Error} XMLHttpRequest on request success, Error on validation error
         */
        requestAjax: function (method, url, params) {
            // validate the method
            method = this.requestValidateMethod(method);
            // validate the url >> missing logic
            url = this.requestValidateUrl(url);
            // validate/cast parameters to string
            params = this.requestValidateParams(params);

            // Promise() it...
            return new Promise(function (resolve, reject) {
                // New request
                var xhr = new XMLHttpRequest();
                // Open connection >> always async
                xhr.open(method, url, true);

                // Send the proper header information along with the request
                // https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/setRequestHeader
                switch (method) {
                    case 'GET':
                        xhr.onload = function () {
                            // Request finished, resolve( this )
                            resolve(this);
                        };
                        break;

                    case 'POST':
                        // Set request header ( do we need other case scenarios? )
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        // Listen to state changes
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                                // Request finished. Do processing here.
                                resolve(this);
                            }
                        }
                        break;
                }

                // On error, reject( message )
                xhr.onerror = function () {
                    var errorMessage = 'An error occurred during the transaction. ' + xhr.statusText;
                    reject(errorMessage);
                }

                // Send/make the request
                xhr.send(params);
            });
        },

        /**
         * Serialise an Object to be sent over XMLHttpRequest
         *
         * @param obj Object to serialise
         * @return {string} Serialised object
         */
        requestParamSerialise: function (obj) {
            // Temporary container
            var str = [];
            // Process...
            for (var p in obj) {
                if (obj.hasOwnProperty(p)) {
                    // Push as "key=val"
                    str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                }
            }
            // return serialised string
            return str.join("&");
        },

        /**
         * Validate request method type/name
         * @param method
         * @return {string|*}
         */
        requestValidateMethod: function (method) {
            var errorMessage = 'LazyLoading.requestAjax() >> ',
                type = typeof method,
                validatedMethod = '';

            if (type !== 'string') {
                errorMessage += 'incorrect variable type ' + type + '. Expecting "string".';
                throw Error(errorMessage);
            }

            // To upper Case
            validatedMethod = method.toUpperCase();

            var validateAgainst = [];
            for(var prop in LazyLoading.requestMethods){
                validateAgainst.push( LazyLoading.requestMethods[prop] );
            }

            // Check method is supported
            if (validateAgainst.indexOf(validatedMethod) === -1) {
                errorMessage += 'unknown/unsupported method ' + method + '. ' +
                    'Valid methods include ' + validateAgainst.join(',') + '.';

                throw Error(errorMessage);
            }

            return validatedMethod;
        },

        /**
         * Validate request URL
         *
         * @param url
         * @return {*}
         */
        requestValidateUrl: function (url) {
            return url;
        },

        /**
         * Validate request params
         *  Strings are left untouched
         *  Booleans.toString()
         *  Objects are serialised via this.requestParamSerialise()
         *
         * @see LazyLoading::requestParamSerialise();
         * @param params
         * @return {string} String representation of provided param
         */
        requestValidateParams: function (params) {
            var validatedParams = params;

            switch (typeof params) {
                case 'string':
                    break

                case 'boolean':
                    validatedParams = params.toString();
                    break;
                case 'object':
                    validatedParams = this.requestParamSerialise(params);
                    break;

                //undefined
                //function
                default:
                    validatedParams = '';
                    break;

            }

            return validatedParams;
        },
    }

    /* Check for any configuration values */
    var config = window.LazyLoadingConfiguration ? window.LazyLoadingConfiguration : {};

    /* Initialise LazyLoading  */
    if(config.init !== false){
        // run dependency checks
        LazyLoading.init(config);
        // attach start listeners - if requested / else manual
        if(LazyLoading.config.start !== false) {
            switch (LazyLoading.config.start) {
                /* Start on `DOMContentLoaded` */
                case 'DOMContentLoaded':
                    document.addEventListener("DOMContentLoaded", function (event) {
                        if (LazyLoading.hasInitialised === true) {
                            LazyLoading.start(true);
                        }
                        else {
                            LazyLoading.console(
                                true,
                                'LazyLoading:start on DOMContentLoaded',
                                'LazyLoading has not been initialised',
                                {}
                            );
                        }
                    });
                    break;
                /* Start on `load` */
                case 'load':
                    document.addEventListener("load", function (event) {
                        if (LazyLoading.hasInitialised === true) {
                            LazyLoading.start(true);
                        }
                        else {
                            LazyLoading.console(
                                true,
                                'LazyLoading:start on load',
                                'LazyLoading has not been initialised',
                                {}
                            );
                        }
                    });
                    break;
                /* Unknown */
                default:
                    LazyLoading.console(true, 'LazyLoading:start', 'Unknown start option', {'config.start': config.start});
                    break;
            }
        }
    }

    /* Global Scope assignation */
    window.LazyLoading = LazyLoading;

})(window, document);