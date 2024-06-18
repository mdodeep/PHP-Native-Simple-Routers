<?php
function get_header()
{
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
        $breadcrumbs .= '<ol class="breadcrumb m-0">';

        // Memeriksa apakah URL merupakan default home
        if ($count_breadcrumbs == 1) {
            // Jika ya, maka menampilkan "Dashboard" sebagai breadcrumbs yang aktif
            $breadcrumbs .= '<li class="breadcrumb-item active">Dashboard</li>';
        } else {
            $breadcrumbs .= '<li class="breadcrumb-item"><a href="' . APP_URL . DEFAULT_HOME . '">Home</a></li>';

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

    require_once('public/template/header.php');
}

function get_footer()
{
    require_once('public/template/footer.php');
}
