<?php

// config
define('BASE_URL', 'http://localhost/php-project/');

// for redirect user to specified url (full adress)
function redirect($url) {
    header('Location: ' . trim(BASE_URL, '/ ') . '/' . trim($url, '/ '));
    exit;
}

// generate asset file appropriate address
function asset($file) {
    return trim(BASE_URL, '/ ') . '/' . trim($file, '/ ');
}

// generates full and appropriate address for specified url
function url($url) {
    return trim(BASE_URL, '/ ') . '/' . trim($url, '/ ');
}

// for debugging purpose
// abbrevation of "dump-die" => var_dump() first and finally exit;
function dd($var) {
    echo '<pre>';
    var_dump($var);
    exit;
}

function validate_inputs(...$inputs) {
    foreach ($inputs as $input) {
        if (empty($input)){
            return false;
        }
    }
    return true;
}
