<?php

// Mengecek apakah file "app/init.php" ada di direktori yang sama dengan file ini
if (file_exists("app/init.php")) {
    // Jika file tersebut ada, maka dimuat menggunakan require_once()
    require_once("app/init.php");
} else {
    // Jika file tersebut tidak ada, tampilkan pesan kesalahan dan hentikan program dengan die()
    header("HTTP/1.0 404 Not Found"); // Set response header menjadi 404
    die("Terjadi kesalahan fatal, file init tidak ditemukan.");
}
