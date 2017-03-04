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


/* POST */

/**
 * Execute request
 *
 * @param $url
 * @param null $postData
 * @param string $cookieFile
 * @return mixed
 */
function request($url, $postData = null , $cookieFile = 'tmp/cookie.txt')
{
    /**
     * Curl init
     */
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

    /**
     * Set user agent
     */
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:51.0) Gecko/20100101 Firefox/51.0');


    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookieFile);
    curl_setopt($curl, CURLOPT_COOKIEFILE, $cookieFile);

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    /**
     * Check pass post data
     */
    if ($postData) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
    }

    /**
     * Result executing curl
     */
    $html = curl_exec($curl);

    /**
     * Close CURL
     */
    curl_close($curl);

    /**
     * Return result
     */
    return $html;
}

file_put_contents('tmp/cookie.txt', '');

/**
 * Login filed data
 */
$postData = [
    'op' => 'login',
    'dest' => 'https://www.reddit.com/',
    'user' => 'konstyantin',
    'passwd' => '123456789q',
];

$html = request('https://www.reddit.com/post/login', $postData);
echo $html;
?>