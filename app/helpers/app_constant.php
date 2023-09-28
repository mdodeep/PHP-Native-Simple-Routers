<?php

// Definisi Default Home
define("DEFAULT_HOME", "home");

// Definisi Utama
define("APP_URL", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/");

//-------------------------------------------------------------------------------
/**
 * Kamu dapat mengubah definisi APP_ASSETS_PATH sesuai dengan folder url asset kamu
 */
define("APP_ASSETS_PATH", APP_URL . "assets/");
//-------------------------------------------------------------------------------

// PENTING! JANGAN DIUBAH
define("APP_PATH", dirname(dirname(__DIR__)));

//-------------------------------------------------------------------------------
/**
 * Kamu dapat menambahkan definisi definisi yang kamu butuhkan sesuai keperluan aplikasi/website kamu.
 */

// Definisi Opsional
define("APP_NAME", "PHP Native Routes");
define("APP_VER", "1.0");
define("APP_LOGO", APP_ASSETS_PATH . "images/logo.png");
define("APP_ICON", APP_ASSETS_PATH . "images/icon.png");
//-------------------------------------------------------------------------------