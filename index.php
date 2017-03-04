<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once 'vendor/autoload.php';

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

echo "<pre>";
print_r($html);
echo "</pre>";

?>