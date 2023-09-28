<?php

/**
 * File index.php ini adalah file untuk tampilan pada Folder Url "kedua"
 * Contoh :
 * https://websitekamu.com/kedu
 */

get_header();
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="d-flex flex-wrap">
                    <div class="p-2 flex-fill"><a class="btn btn-primary" href="<?php get_url('home'); ?>">Halaman Home</a></div>
                    <div class="p-2 flex-fill"><a class="btn btn-success" href="<?php get_url('pertama'); ?>">Halaman Pertama</a></div>
                    <div class="p-2 flex-fill"><a class="btn btn-warning" href="<?php get_url('kedua'); ?>">Halaman Kedua</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="position-absolute top-0 start-50 translate-middle-x">
                <div class="d-flex flex-wrap">
                    <div class="p-2 flex-fill">
                        <h1>Kamu Berada Di Halaman Kedua</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>