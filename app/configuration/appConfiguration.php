<?php

defined('MDPPATH') || exit('Access Denied');

// Penting ! Jangan Pernah Mengubah Atau Menghapus Baris Ini.
define('APP_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/");
define('APP_PATH', dirname(dirname(__DIR__)));
// --------------------------------------------------------------------

// Koneksi untuk menyambungkan aplikasi dengan database MYSQL
define('DB_HOST', 'localhost');
define('DB_NAME', 'belajar');
define('DB_USER', 'root');
define('DB_PASS', '');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    exit("Failed to connect to MySQL : (" . $conn->connect_errno . ") " . $conn->connect_error);
}
// --------------------------------------------------------------------

define('DEFAULT_HOME', 'dashboard'); // 'dashboard' Dapat kamu ganti dengan halaman yang ingin kamu gunakan sebagai tampilan aplikasi.
define('APP_ASSETS_PATH', APP_URL . 'assets/'); // 'assets/' Dapat kamu sesuaikan dengan nama folder tempat penyimpanan assets CSS,JS dll.

// Konfigurasi opsional yang dapat kamu ubah, hapus, atau tambahkan sesuai dengan kebutuhan aplikasi kamu.
define('APP_NAME', 'MDPROJECT-ROUTER');
define('APP_ENCRYPTION_KEY', base64_encode('MDODYPROJECT'));
// --------------------------------------------------------------------