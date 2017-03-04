<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 04.03.17
 * Time: 17:24
 */

error_reporting(E_ALL);
ini_set('display_errors', true);


require_once 'vendor/autoload.php';

$cook = false;

if (isset( $_COOKIE['curl_session_cookie'])) {
    $cook = true;
    echo 'Session cookie is exists' . '<br>';
}

if (isset( $_COOKIE['curl_normal_cookie'])) {
    $cook = true;

    echo 'Normal cookie is exists' . '<br>';
}

setcookie('curl_session_cookie', 1);
setcookie('curl_normal_cookie', 1, microtime(true) + 10000);

if ($cook) {
    echo 'You are user';
} else {
    echo 'You are guest';
}