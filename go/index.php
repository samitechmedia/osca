<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/go/AfflinksInclude.php";

/**
 * Simple php script to replace the use of .htaccess for directory listing
 * This will allow for increased security as htaccess can be edited and this
 * will for specified files not to be listed.
 * @author John James
 * @copyright Broken Pixel Limited
 * @version 1 2014-05-23 JJ
 * @version 2 2014-09-03 JJ
 *      added a regexp pattern to exclude .htaccess files
 * @version 3 2014-09-04 JJ
 *      added commented out links
 * @version 4 2014-09-08 JJ
 *      alterations to the way the links are output so now they are only file
 *      names with no extension. Ensure proper removal of excluded files
 * @version 5 2014-12-11 JJ
 *      revision to full link but addition of IP restricted access
 */

// array of IP address that are allowed to view the page
$allowedIpAddresses = array(
    '81.105.20.97',
    '68.114.247.124',
    '84.92.105.177',
    '127.0.0.1',
    '216.92.120.207'
);

// array of files to be forced not to list these are in regex format
$filesToExcludeFromListing = array(
    '/index.*$/',
    '/htaccess/',
    '/error/',
);

// make sure no crawler can see the page is sent
echo "<meta name=\"robots\" content=\"noindex,nofollow\">\n";

// check if IP address matches and redirect if it doesnt
if (
    in_array($_SERVER['REMOTE_ADDR'], $allowedIpAddresses)
    || in_array($_SERVER['HTTP_TRUE_CLIENT_IP'], $allowedIpAddresses)
) {
    // get the location of itself
    $currentFileLocation = $_SERVER['SCRIPT_FILENAME'];
    // strip off the index file to get the directory path
    $currentServerDirectory = preg_replace('/\/index.*$/', '', $currentFileLocation);
    // get the web address used
    $requestUrlLocation = $_SERVER['REQUEST_URI'];
    // strip out any index files from the URL
    $urlLocation = preg_replace('/\/index.*$/', '/', $requestUrlLocation);
    // get the domain name
    $domain = $_SERVER['HTTP_HOST'];

    // scan the visited directory for files that can be visited to the use with CURL
    $filesFromCurrentDir = scandir($currentServerDirectory);
    // loop over files to create full html links instead of relative paths that can
    // be pulled using CURL
    $output = array();
    foreach ($filesFromCurrentDir as $fileName) {
        if (
            $fileName != '.'
            && $fileName != '..'
            && is_file($fileName)
        ) {
            // display only the filename and use the main controller to interpret
            // the full path
            $output[] = $urlLocation . $fileName;
        }
        foreach ($filesToExcludeFromListing as $index => $searchTerm) {
            // check for excluded files, remove current dir and upper dir and make
            // sure directories are not output
            foreach ($output as $linkToCheckForExclusions) {
                if (!preg_match($searchTerm, $linkToCheckForExclusions)) {
                    // if a match is found unset the array item
                    unset($output[$index]);
                }
            }
        }
    }

    // make sure the array has no duplicates from the different regex exclusions
    $output = array_unique($output, SORT_STRING);

    // output all the links for the file loop for CURL to pull
    foreach ($output as $linkToOutput) {
        // original full location link commented out
        echo "<!--<a href='http://" . $domain . $linkToOutput . "'></a><br />-->\n";
    }
}
