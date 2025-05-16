<?php 
include('../../conf/config.php');
// Mengakses data dari $_GET dengan pengecekan agar tidak terjadi 'undefined array key'

//data admin
$nama = $_POST['nama'] ?? '';
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$status_akun = $_POST['status_akun'] ?? '';
$level = $_POST['level'] ?? '';

// Menampilkan data dengan aman
//echo htmlspecialchars($nama) . "<br>";
//echo htmlspecialchars($email) . "<br>";
//echo htmlspecialchars($jabatan) . "<br>";
//echo htmlspecialchars($status) . "<br>";


$query = mysqli_query($koneksi,"INSERT INTO tb_admin (nama,username,email,password,status_akun,level) VALUE('$nama','$username','$email','$password','$status_akun','$level')");
header('Location: ../index.php?page=data-admin');


?>