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
require_once("app/helpers/app_constant.php"); // Diutamakan file app_constant.php terlebih dahulu.
require_once("app/helpers/app_database.php"); // Kemudian file app_database.php
require_once("app/helpers/app_function.php"); // Kemudian file app_function.php
// Masukan kode require_once yang kamu butuhkan setelah baris ini
//-------------------------------------------------------------------------------


//-------------------------------------------------------------------------------
// Memuat file routers (JANGAN DIHAPUS).
require_once("app/routers/app_routers.php");
//-------------------------------------------------------------------------------