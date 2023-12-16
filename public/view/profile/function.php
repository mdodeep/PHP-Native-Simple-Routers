<?php
$pageTitle = ucwords(str_replace("-", " ", $url_indexes));

if (isset($url_parameter[1])) {
    $getUser = $url_parameter[1];
    if ($getUser === 'dody') {
        $getName = 'Muhammad Dody Pratama';
        $getEmail = 'dodypratamaa29@gmail.com';
    } else {
        $getName = null;
        $getEmail = null;
    }
}
