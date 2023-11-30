<?php

// Important line! Do not delete. Contains the router core
define("APP_URL", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/"); // Definisi Pendeteksi URL
define("APP_PATH", dirname(dirname(__DIR__))); // Definisi Folder App
// Important line! Do not delete. Contains the router core

// You can change this according to your needs
define("DEFAULT_HOME", "home"); // Definisi Default Home
define("APP_ASSETS_PATH", APP_URL . "assets/"); // Definisi Folder Assets Aplikasi/Website
// You can change this according to your needs