<?php

defined('MDPPATH') || exit('Access Denied');

session_start();

/**
 * Fungsi untuk menghandle error
 */
function handleError(int $errorCode = 500, bool $errorPage = false)
{
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
    if ($errorPage) {
        require_once('public/template/' . $errorCode . '.php');
    }

    exit;
}

/**
 * Fungsi untuk menghandle folder pada url
 */
function handleExistFolderURL(string $path_folderURL = null)
{
    return file_exists($path_folderURL) && is_dir($path_folderURL) && is_readable($path_folderURL);
}

/**
 * Fungsi untuk menghandle url router
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
 * Fungsi untuk mengambil ip client
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
 * Fungsi untuk meroute dengan link
 */
function routeTo(string $routeTo = null)
{
    echo APP_URL . $routeTo;
}

/**
 * Fungsi untuk meredirect
 */
function redirectToPage(string $redirectDestination)
{
    return header('location:' . APP_URL . $redirectDestination, true, 301);
}

/**
 * Fungsi untuk mengenkode string
 */
function encodeThis(string $plainText)
{
    $key = base64_decode(APP_ENCRYPTION_KEY);

    // Generate initialization vector
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

    // Encrypt the plaintext
    $cipherText = openssl_encrypt($plainText, 'aes-256-cbc', $key, 0, $iv);

    // Combine IV and ciphertext for secure storage
    $encryptedData = base64_encode($iv . $cipherText);

    return $encryptedData;
}

/**
 * Fungsi untuk mendekode string
 */
function decodeThis(string $hashText)
{
    $key = base64_decode(APP_ENCRYPTION_KEY);

    // Decode the base64 encoded string
    $encryptedData = base64_decode($hashText);

    // Extract IV and ciphertext
    $ivLength = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($encryptedData, 0, $ivLength);
    $cipherText = substr($encryptedData, $ivLength);

    // Decrypt the ciphertext
    $plainText = openssl_decrypt($cipherText, 'aes-256-cbc', $key, 0, $iv);

    return $plainText;
}

function handleDataInput(string $inputName)
{
    global $conn;
    return htmlentities(mysqli_real_escape_string($conn, strip_tags(trim($_POST[$inputName]))));
}
