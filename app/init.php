<?php

/**
 * File init.php adalah file penghubung/perantara untuk merequire/memasukan file-fila yang dibutuhkan aplikasi routers ini.
 */

//-------------------------------------------------------------------------------
/**
 * Kamu bisa menyesuaika/menambahkan/menghapus file-file pembantu (helpers) pada bagian ini.
 * Jika ada fungsi-fungsi yang ingin kamu tambahkan dan dibuat file khususnya, maka buatlah di app/helpers/.
 * Setelah itu kamu dapat memasukan fungsi tersebut pada bagian ini dengan cara require_once (disarankan)
 */
require_once("app/setting/setting_app.php"); // Diutamakan file app_constant.php terlebih dahulu.
require_once("app/setting/setting_database.php"); // Kemudian file app_database.php
//-------------------------------------------------------------------------------

// Masukan kode require_once yang kamu butuhkan setelah baris ini
//-------------------------------------------------------------------------------


//-------------------------------------------------------------------------------
// Memuat file functions (JANGAN DIHAPUS).
require_once("app/core/function/app_function.php"); // Kemudian file app_function.php
// Memuat file routers (JANGAN DIHAPUS).
require_once("app/core/router/app_router.php");
//-------------------------------------------------------------------------------