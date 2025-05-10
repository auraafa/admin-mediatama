<?php
// Membuat koneksi ke database MySQL di localhost dengan port default 3306
$koneksi = mysqli_connect('localhost', 'root', '', 'db_Admin');

// Mengecek koneksi
if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
// Jika ingin test koneksi berhasil, bisa uncomment baris berikut:
// else {
//     echo "Koneksi Berhasil";
// }
?>
 