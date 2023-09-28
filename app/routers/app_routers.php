<?php

/**
 * 
 * Penjelasan singkat tentang apa itu domain, folder url, dan parameter url yang menjadi point utama pada routers ini sebelum kamu memulai menggunakannya.
 * 
 * -- Domain --
 * Domain adalah "host" utama atau "alamat" situs/aplikasi kamu.
 * Contoh domain : localhost
 * Contoh domain : websitekamu.com
 * 
 * -- Folder Url --
 * Folder Url adalah string/integer yang diinput setelah domain.
 * Contoh folder url : localhost/login
 * Contoh folder url : websitekamu.com/login
 * 
 * "login" adalah folder url, semua string pertama setelah "/" domain adalah folder url.
 * 
 * -- Parameter Url --
 * Parameter Url adalah string/integer yang diinput setelah folder url.
 * Contoh parameter url : localhost/akun/123/567/890
 * Contoh parameter url : websitekamu.com/akun/123/567/890
 * 
 * "123" adalah parameter ke 1.
 * "567" adalah parameter ke 2.
 * "890" adalah parameter ke 3.
 * 
 */

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['url'])) {

        $url = $_GET['url']; // Mengambil URL
        $url = rtrim($url, '/'); // Menghapus garis miring di belakang
        $url = filter_var($url, FILTER_SANITIZE_URL); // Membersihkan URL
        $url_parts = explode('/', $url); // Pisahkan URL menjadi array
        $url_folder_name = $url_parts[0]; // Mengambil nama folder

        //-----------------------------------------------------------------------------------------------------------------
        /**
         * Setiap string yang diinput setelah nama folder url adalah parameter url.
         * 
         * Kamu dapat menggunakan parameter dari url dengan $url_parameters[urutan_parameter].
         * Contoh seperti ini :
         * https://websitekamu.com/akun/612738/aksi/hapus
         * 
         * Maka kamu akan memiliki parameter sebagai berikut :
         * $url_parameters[1] = 612738
         * $url_parameters[2] = aksi
         * $url_parameters[3] = hapus
         * 
         * Kamu bisa memanfaatkan $url_parameters[urutan_parameter] untuk mengambil data atau pemicu untuk menjalankan fungsi.
         */

        $url_parameters = array_slice($url_parts, 1, null, true); // Mengubah indeks array dimulai dari 1

        //-----------------------------------------------------------------------------------------------------------------

        /**
         * Setiap string/integer yang diinput setelah domain adalah nama folder, seperti ini contohnya :
         * https://websitekamu.com/login
         * 
         * Maka "login" adalah nama folder yang akan dicari dan dieksekusi oleh routers.
         * Jadi jika folder tidak ada, maka akan menampilkan response 404 Eror.
         * 
         * Kamu dapat mengganti konstanta DEFAULT_HOME pada app/helpers/app_constant.php
         * 
         * Setiap nama folder mewakili "Folder Url".
         * Setiap didalam folder harus memiliki file "index.php" sebagai tampilan halaman.
         * Setiap didalam folder tidak harus memiliki file "function.php" sebagai kode fungsi untuk halaman terkait.
         */

        // Check if the folder exists
        if (is_dir(APP_PATH . '/public/views/' . $url_folder_name)) {
            if (file_exists(APP_PATH . '/public/views/' . $url_folder_name . 'function.php')) {
                require_once APP_PATH . '/public/views/' . $url_folder_name . '/function.php'; // Require the index file
            }
            require_once APP_PATH . '/public/views/' . $url_folder_name . '/index.php'; // Require the index file
        } else {
            // 404 error
            http_response_code(404);
            echo '404 Not Found';
        }
    } else {
        // Check if the folder exists
        if (is_dir(APP_PATH . '/public/views/' . DEFAULT_HOME)) {
            if (file_exists(APP_PATH . '/public/views/' . DEFAULT_HOME . 'function.php')) {
                require_once APP_PATH . '/public/views/' . DEFAULT_HOME . '/function.php'; // Require the index file
            }
            require_once APP_PATH . '/public/views/' . DEFAULT_HOME . '/index.php'; // Require the index file
        } else {
            // 404 error
            http_response_code(404);
            echo '404 Not Found';
        }
    }
}
