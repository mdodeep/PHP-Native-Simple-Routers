<?php

defined('PNDPATH') || exit('Access Denied');

// Important line! Do not delete. Contains the router core
define('APP_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/"); // Definisi Pendeteksi URL
define('APP_PATH', dirname(dirname(__DIR__))); // Definisi Folder App
// Important line! Do not delete. Contains the router core

// You can change this according to your needs
define('DEFAULT_HOME', 'dashboard'); // You can change the name of the folder designated as the main page.
define('APP_ASSETS_PATH', APP_URL . 'assets/'); // You can change the name of the folder designated as the asset page for your site or application.
//define('APP_ENCRYPTION_SALT', '$2$md');
//define('APP_ENCRYPTION_KEY', base64_encode('MDODYPROJECT'));
//define('MAX_LOGIN_ATTEMPTS', 3);
//define('LOGIN_ATTEMPT_TIMEOUT', 300);

/**
 * You can change and adjust your MySQL account data
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'mdmemberarea');
define('DB_USER', 'root');
define('DB_PASS', '');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// You can change this according to your needs