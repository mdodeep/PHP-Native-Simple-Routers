<?php

defined('PNDPATH') || exit('Access Denied');

session_start();

/**
 * Menangani kesalahan atau error dengan HTTP response code dan halaman error yang ditentukan.
 *
 * @param int|null $errorCode Kode error HTTP (default: 500).
 * @param bool $errorPage Indikator apakah halaman error akan dimuat (default: false).
 * @return void
 */
function handleError($errorCode = null, $errorPage = false)
{
    if ($errorCode == null) {
        $errorCode = 500;
    }

    // List of HTTP response status codes
    $httpStatusCodes = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
    ];

    // Check if the error code exists in the list of HTTP status codes
    if (!array_key_exists($errorCode, $httpStatusCodes)) {
        $errorCode = 500;
    }

    // Set HTTP response status code header
    header('HTTP/1.1 ' . $errorCode . ' ' . $httpStatusCodes[$errorCode]);

    // Load the error page if provided
    if (isset($errorPage)) {
        if ($errorPage == true) {
            require_once('public/template/' . $errorCode . '.php');
        }
    }

    exit;
}

/**
 * Mengevaluasi apakah sebuah folder ada, merupakan direktori, dan dapat dibaca.
 * 
 * @param string $path_folderURL Path ke folder yang ingin dievaluasi.
 * @return bool Mengembalikan true jika folder ada, merupakan direktori, dan dapat dibaca.
 */
function handleExistFolderURL(string $path_folderURL = null)
{
    return file_exists($path_folderURL) && is_dir($path_folderURL) && is_readable($path_folderURL);
}

/**
 * Fungsi ini untuk memuat file function dan index.php dalam folder yang ditentukan.
 * 
 * @param string $folderURL Nama folder yang ingin dimuat.
 * @return void
 */
function handleRouterURL(string $folderURL = null)
{
    global $url_folder_name;
    global $url_parts;
    $url_indexes = $url_folder_name;
    if (isset($url_parts)) {
        $url_parameter = array_slice($url_parts, 1, null, true); // Mengubah indeks array dimulai dari 1
    }

    $fileCheckURL_function = APP_PATH . '/public/view/' . $folderURL . '/function.php';
    $fileCheckURL_index = APP_PATH . '/public/view/' . $folderURL . '/index.php';
    if (file_exists($fileCheckURL_index) && is_file($fileCheckURL_index) && is_readable($fileCheckURL_index)) {
        if (file_exists($fileCheckURL_function) && is_file($fileCheckURL_function) && is_readable($fileCheckURL_function)) {
            require_once($fileCheckURL_function);
        }
        require_once($fileCheckURL_index);
    }
}

/**
 * Fungsi ini untuk mengembalikan alamat IP pengunjung saat ini. 
 * 
 * @return string Alamat IP dari pengunjung saat ini.
 */
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    // Remove port number from IP if present
    $ip = preg_replace('/:\d+$/', '', $ip);

    return $ip;
}

/**
 * Fungsi ini untuk menampilkan link url ke halaman yang ingin dituju.
 * 
 * @param string $routTo Halaman tujuan.
 * @return void
 */
function routeTo($routeTo = null)
{
    echo APP_URL . $routeTo;
}

/**
 * Fungsi ini untuk mengalihkan otomatis ke halaman yang ingin dituju.
 * 
 * @param string $routTo Halaman tujuan.
 * @return void
 */
function redirectToPage($redirectDestination)
{
    return header('location:' . APP_URL . $redirectDestination, true, 301);
}
