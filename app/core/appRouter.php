<?php

defined('MDPPATH') || exit('Access Denied');

require_once('appFunction.php');

if (isset($_GET['url'])) {
    $url = $_GET['url']; // Mengambil URL
    if (substr($url, -1) === '/') {
        $url = rtrim($url, '/'); // Menghapus garis miring di belakang
        header('Location: ' . APP_URL . $url); // Redirect ke URL tanpa garis miring di belakang
        exit;
    }
    $url = filter_var($url, FILTER_SANITIZE_URL); // Membersihkan URL
    $url_parts = explode('/', $url); // Pisahkan URL menjadi array
    $url_folder_name = $url_parts[0]; // Mengambil nama folder

    if (handleExistFolderURL(APP_PATH . '/public/view/' . $url_folder_name)) {
        handleRouterURL($url_folder_name);
    } else {
        handleError(404, true);
    }
} else {
    if (handleExistFolderURL(APP_PATH . '/public/view/' . DEFAULT_HOME)) {
        handleRouterURL(DEFAULT_HOME);
    } else {
        handleError(404, true);
    }
}
