<?php

define("DB_HOST", "localhost");
define("DB_NAME", "test");
define("DB_USER", "root");
define("DB_PASS", "");

//-------------------------------------------------------------------------------

// Membuat koneksi ke database
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Cek koneksi database
if (mysqli_connect_errno()) {
    die("Gagal menyambung ke MySQL : " . mysqli_connect_error());
}
