<?php

/**
 * File ini berisi function-function yang mungkin berguna untuk project kamu.
 */

function get_header()
{

    // Fungsi untuk menampilkan judul pada halaman
    function page_title()
    {
        global $url_folder_name;
        if (empty($url_folder_name)) {
            echo ucwords(str_replace("-", " ", DEFAULT_HOME));
        } else {
            echo ucwords(str_replace("-", " ", $url_folder_name));
        }
    }

    function breadcrumbs()
    {
        global $url_parts;

        // Mendapatkan URL dan memisahkan string menjadi array dengan pemisah "/"
        $url_breadcrumbs = explode('/', rtrim($_SERVER['REQUEST_URI'], '/')); // Menggunakan rtrim untuk menghapus trailing slash

        // Menghitung jumlah elemen array
        $count_breadcrumbs = count($url_breadcrumbs);

        // Membuat variabel untuk menampung hasil breadcrumb
        $breadcrumbs = '';
        $breadcrumbs .= '<ol class="breadcrumb">';

        // Memeriksa apakah URL merupakan default home
        if ($count_breadcrumbs == 1) {
            // Jika ya, maka menampilkan "Dashboard" sebagai breadcrumbs yang aktif
            $breadcrumbs .= '<li class="breadcrumb-item active">Dashboard</li>';
        } else {
            $breadcrumbs .= '<li class="breadcrumb-item"><a href="' . APP_URL . DEFAULT_HOME . '">Dashboard</a></li>';

            // Maksimal dua bagian setelah domain yang akan dianggap sebagai bagian dari breadcrumbs
            $max_breadcrumbs = min(2, $count_breadcrumbs); // Max 3 untuk mengakomodasi domain/element1/element2

            // Looping untuk menampilkan setiap elemen breadcrumb
            $temp_path = '/'; // Menyimpan sementara path yang akan digunakan
            for ($i = 1; $i < $max_breadcrumbs; $i++) {
                $breadcrumb = $url_breadcrumbs[$i];
                if (!empty($breadcrumb) && strpos($breadcrumb, '=') === false) { // Memastikan tidak ada elemen kosong dan tidak mengandung "="
                    $temp_path .= $breadcrumb . '/'; // Menambahkan trailing slash
                    // Memeriksa apakah elemen saat ini adalah elemen terakhir
                    if ($i === ($max_breadcrumbs - 1)) {
                        // Jika ya, maka menambahkan class active
                        $breadcrumbs .= '<li class="breadcrumb-item active">' . ucwords(str_replace('-', ' ', $breadcrumb)) . '</li>';
                    } else {
                        // Jika tidak, maka menambahkan tag link
                        $breadcrumbs .= '<li class="breadcrumb-item"><a href="' . $temp_path . '">' . ucwords(str_replace('-', ' ', $breadcrumb)) . '</a></li>';
                    }
                }
            }
        }
        $breadcrumbs .= '</ol>';

        echo $breadcrumbs;
    }

    require_once APP_PATH . "/public/views-template/header.php";
}

function get_footer()
{
    require_once APP_PATH . "/public/views-template/footer.php";
}

function get_url($url_here = null)
{
    $a_url = APP_URL . $url_here;

    echo $a_url;
}

// Fungsi untuk menampilkan notifikasi
function display_alert()
{
    if (isset($_SESSION['alert_notification'])) {
        $notifikasi = $_SESSION['alert_notification'];
        unset($_SESSION['alert_notification']);
        echo $notifikasi;
    }
}

// Fungsi untuk mendefinisikan notifikasi
function set_alert($notification_style = null, $notification_content = null)
{
    $titles = [
        'success' => 'Berhasil !',
        'warning' => 'Notifikasi',
        'danger' => 'Error !',
        'info' => 'Informasi',
    ];

    if (array_key_exists($notification_style, $titles)) {
        $title_alert = $titles[$notification_style];
    } else {
        $title_alert = '';
    }

    $_SESSION['alert_notification'] = '<div class="alert alert-' . $notification_style . ' alert-dismissible text-bg-' . $notification_style . ' border-0 fade show" role="alert"> <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button> <strong>' . $title_alert . ' </strong> ' . $notification_content . '</div>';
}
