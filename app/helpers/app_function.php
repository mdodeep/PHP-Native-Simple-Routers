<?php

/**
 * File app_function.php ini adalah file kumpulan fungsi-fungsi utama untuk aplikasi/website kamu.
 * Di file ini kamu dapat membuat fungsi-fungsi atau variabel-variabel yang dibutuhkan.
 */

function get_header()
{
    require_once APP_PATH . "/public/views-template/header.php";
}

function get_footer()
{
    require_once APP_PATH . "/public/views-template/footer.php";
}

function get_url($url_here)
{
    $a_url = APP_URL . $url_here;

    echo $a_url;
}

// Kamu dapat memasukan kode-kode function lain atau kode-kode lain yang kamu butuhkan