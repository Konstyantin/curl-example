<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'vendor/autoload.php';

require_once 'post.php';

/**
 * Init curl
 */
$curl = curl_init();

/**
 * URL to fetch
 */
curl_setopt($curl, CURLOPT_URL, 'http://ya.ru');

/**
 * Return the transfer as string of the return value instead of outputting it out directly
 */
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

/**
 * Include header in the output
 */
curl_setopt($curl, CURLOPT_HEADER, true);

/**
 * Return only header without body response
 */
curl_setopt($curl, CURLOPT_NOBODY, true);

/**
 * Allow to follow any "Location: " header that the server sends as part of the HTTP header
 */
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

/**
 * Check the existence of a common name in the SSL peer certificate
 */
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

/**
 * Save data in variable $html
 */
$html = curl_exec($curl);

/**
 * Close CURL
 */
curl_close($curl);

//echo "<pre>";
//print_r($html);
//echo "</pre>";

/* Cookies */

/**
 * Path to file which containing the cookies data
 */
$cookieFile = 'tmp/cookie.txt';

/**
 * Curl init
 */
$curl = curl_init();

/**
 * URL to fetch
 */
curl_setopt($curl, CURLOPT_URL, 'http://localhost/cookie.php');

/**
 * Return the transfer as string of the return value instead of outputting it out directly
 */
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

/**
 * Include header in the output
 */
curl_setopt($curl, CURLOPT_HEADER, true);

/**
 * Set name of file to save all internal cookies to when the handler is closed
 */
curl_setopt($curl, CURLOPT_COOKIEJAR, $cookieFile);

/**
 * Set name of the file containing the cookie data
 */
curl_setopt($curl, CURLOPT_COOKIEFILE, $cookieFile);

/**
 * Ignore all cookies which will load the are "Session cookies"
 */
curl_setopt($curl, CURLOPT_COOKIESESSION, true);

/**
 * Save data in variable $html
 */
$html = curl_exec($curl);

/**
 * Close CURL
 */
curl_close($curl);

/**
 * Display data
 */
//echo "<pre>";
//print_r($html);
//echo "</pre>";
?>