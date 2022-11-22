/*
 * Start connections to domains that will de discovered later in analytics scripts
 * @ https://assets.adobedtm.com
 */

// Location where we will inject elements into DOM
const linkInjectElem = document.getElementsByTagName('head')[0];

// List of domains to connect to
// dns-prefetch uses separate link element due to a bug in Safari
const domains = [
    {
        'url': 'https://dpm.demdex.net',
        'rel': 'preconnect',
        'crossOrigin': 'anonymous', // Connection fetch mode is CORS and preconnect makes complete connection.
    },
    {
        'url': 'https://dpm.demdex.net',
        'rel': 'dns-prefetch', // dns-prefetch as a fallback for preconnect
    },
    {
        'url': 'https://tricarboxylic.sc.omtrdc.net',
        'rel': 'dns-prefetch',
    },
    {
        'url': 'https://tri.demdex.net',
        'rel': 'preconnect',
    },
    {
        'url': 'https://tri.demdex.net',
        'rel': 'dns-prefetch',
    },
    {
        'url': 'https://cm.everesttech.net',
        'rel': 'dns-prefetch',
    },
];

export let injectDomainConnections = () => {

    // Loop through domains array
    domains.forEach((domain) => {

        // Build domain connection as html link
        let adoConnect = document.createElement('link');
        adoConnect.rel = domain['rel'];
        adoConnect.href = domain['url'];

        // If 'crossOrigin' is not undefined in array then add crossorigin with its defined value
        if (typeof domain['crossOrigin'] !== 'undefined') {
            adoConnect.crossOrigin = domain['crossOrigin'];
        }

        // Output
        linkInjectElem.appendChild(adoConnect);
    });
};
