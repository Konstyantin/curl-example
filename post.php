<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 05.03.17
 * Time: 20:40
 */

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