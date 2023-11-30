<?php

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

    $indexes = $url_folder_name;

    $url_parameter = array_slice($url_parts, 1, null, true); // Mengubah indeks array dimulai dari 1


    if ($indexes === 'api') {
        if (!empty($url_parameter)) {
            if (file_exists(APP_PATH . '/public/api/' . $url_parameter[1] . '.php')) {
                require_once APP_PATH . '/public/api/' . $url_parameter[1] . '.php'; // Require the index file
            } else {
                // 404 error
                http_response_code(404);
                require_once("public/template/404.php");
                exit;
            }
        } else {
            // 404 error
            http_response_code(404);
            require_once("public/template/404.php");
            exit;
        }
    } else {
        // Check if the folder exists
        if (is_dir(APP_PATH . '/public/views/' . $url_folder_name)) {
            if (file_exists(APP_PATH . '/public/views/' . $url_folder_name . '/index.php')) {
                if (file_exists(APP_PATH . '/public/views/' . $url_folder_name . '/function.php')) {
                    require_once APP_PATH . '/public/views/' . $url_folder_name . '/function.php'; // Require the index file
                }
                require_once APP_PATH . '/public/views/' . $url_folder_name . '/index.php'; // Require the index file
            } else {
                // 404 error
                http_response_code(404);
                require_once("public/template/404.php");
                exit;
            }
        } else {
            // 404 error
            http_response_code(404);
            require_once("public/template/404.php");
            exit;
        }
    }
} else {
    // Check if the folder exists
    if (is_dir(APP_PATH . '/public/views/' . DEFAULT_HOME)) {
        if (file_exists(APP_PATH . '/public/views/' . DEFAULT_HOME . '/index.php')) {
            if (file_exists(APP_PATH . '/public/views/' . DEFAULT_HOME . '/function.php')) {
                require_once APP_PATH . '/public/views/' . DEFAULT_HOME . '/function.php'; // Require the index file
            }
            require_once APP_PATH . '/public/views/' . DEFAULT_HOME . '/index.php'; // Require the index file
        } else {
            // 404 error
            http_response_code(404);
            exit("Terjadi kesalahan, file <strong>index.php</strong> pada default <strong>" . DEFAULT_HOME . "</strong> tidak ditemukan.");
        }
    } else {
        // 404 error
        http_response_code(404);
        require_once("public/template/404.php");
        exit;
    }
}
