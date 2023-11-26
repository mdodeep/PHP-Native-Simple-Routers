<?php

/**
 * Baris code ini penting, jangan di ganti
 */
define("APP_URL", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/"); // Definisi Utama
define("APP_PATH", dirname(dirname(__DIR__))); // Definisi Folder App
//-------------------------------------------------------------------------------

// Definisi Default Home
define("DEFAULT_HOME", "home"); // "home" dapat kamu ganti dengan apapun yang kamu butuhkan sebagai value default untuk tampilan utama applikasi/situs kamu.

// Definisi Default Home
define("APP_ASSETS_PATH", APP_URL . "assets/"); // "assets/" dapat kamu sesuaikan dengan nama folder "assets" pada root kamu.

//-------------------------------------------------------------------------------
/**
 * Kamu dapat menambahkan definisi definisi yang kamu butuhkan sesuai keperluan aplikasi/website kamu.
 */

// Definisi Opsional
define("APP_NAME", "PHP Native Routes");
define("APP_VER", "1.0");
define("APP_LOGO", APP_ASSETS_PATH . "static/images/logo/logo.svg");
define("APP_ICON", APP_ASSETS_PATH . "static/images/logo/favicon.svg");
//-------------------------------------------------------------------------------