[![Header](https://raw.githubusercontent.com/mdodeep/mdodeep/main/img-simple-router-mdodeep-2.png "Header")](https://mdody.com/)


# PHP Native Simple Routers / Routers Sederhana Menggunakan PHP Native

<p>Halo teman-teman, repositori ini adalah routers sederhana yang ditulis menggunakan bahasa pemrograman PHP Native untuk membantu kamu mengerjakan tugas/skripsi/proyek sederhana.</p>

<h3>Apa aja yang bisa dilakukan sama routers sederhana ini?</h3>
<ul>
    <li>Membaguskan Url</li>
    <li>Memudahkan Pengkodean Untuk Setiap Halaman</li>
</ul>
<p>Contohnya seperti ini :</p>
<p><code>https://websitekamu.com/detail-akun/123</code></p>
<p>Jadi kamu tidak perlu lagi menggunakan variabel url untuk parameter kamu seperti ini <code>https://websitekamu.com/detail-akun/index.php?detail-id=123</code></p>

<p>Kemudian untuk pengkodean setiap halaman akan dipisahkan pada folder dari halaman yang akan dibuat.</p>
<p>Contohnya seperti ini :</p>
<p>Seandainya kamu ingin membuat halaman dashboard yang bisa diakses melalui url : <code>https://websitekamu.com/dashboard</code>, maka kamu hanya perlu membuat folder <code>dashboard</code> pada folder <code>public/view/</code> dan membuat 2 file utama pada folder <code>dashboard</code> yaitu <code>function.php</code> dan <code>index.php</code></p>

# Cara Penggunaan Singkat

<h3>1. Cara membuat halaman</h3>
<p>Buatlah sebuah folder dengan nama halaman yang diinginkan pada <code>public/view/</code>. Kemudian di dalam folder halaman yang telah dibuat, buatlah file <code>index.php</code> untuk tampilan halaman dan <code>function.php</code> untuk fungsi-fungsi yang dibutuhkan (file <code>function.php</code> bersifat opsional. Jika tidak dibutuhkan maka tidak usah dibuat.)</p>

<h3>2. Beberapa variabel/konstanta yang dapat digunakan</h3>
<table>
    <tr>
        <th>Variabel/Konstanta</th>
        <th>Tipe</th>
        <th>Fungsi</th>
        <th>Catatan</th>
        <th>Contoh Penggunaan</th>
    </tr>
    <tr>
        <td><code>DEFAULT_HOME</code></td>
        <td>Konstanta</td>
        <td>Untuk mengatur folder halaman utama aplikasi</td>
        <td>Value konstanta dapat disesuaikan dengan folder yang diinginkan</td>
        <td></td>
    </tr>
    <tr>
        <td><code>APP_ASSETS_PATH</code></td>
        <td>Konstanta</td>
        <td>Untuk memanggil folder assets atau folder yang berisi css/js/image</td>
        <td>Value konstanta dapat disesuaikan dengan folder yang diinginkan</td>
        <td><code>
                <link rel="stylesheet" href="<?php echo APP_ASSETS_PATH; ?>compiled/css/app.css">
            </code></td>
    </tr>
</table>