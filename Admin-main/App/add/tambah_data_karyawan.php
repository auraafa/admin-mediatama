<?php 
include('../../conf/config.php');
// Mengakses data dari $_GET dengan pengecekan agar tidak terjadi 'undefined array key'
$nama = $_POST['nama'] ?? '';
$Email = $_POST['email'] ?? '';
$jabatan = $_POST['jabatan'] ?? '';
$status = $_POST['status'] ?? '';

$query = mysqli_query($koneksi,"INSERT INTO tb_karyawan (nama,Email,jabatan,status) VALUE('$nama','$Email','$jabatan','$status')");
header('Location: ../index.php?page=data-karyawan');
?>