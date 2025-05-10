<?php 
include('../../conf/config.php');
// Mengakses data dari $_GET dengan pengecekan agar tidak terjadi 'undefined array key'
$nama = $_GET['nama'] ?? '';
$email = $_GET['email'] ?? '';
$jabatan = $_GET['jabatan'] ?? '';
$status = $_GET['status'] ?? '';

//data admin
$nama = $_GET['nama'] ?? '';
$username = $_GET['username'] ?? '';
$email = $_GET['email'] ?? '';
$password = $_GET['password'] ?? '';
$status_akun = $_GET['status_akun'] ?? '';
$level = $_GET['level'] ?? '';

//data member
$nama = $_GET['nama'] ?? '';
$no_hp = $_GET['no_hp'] ?? '';
$email = $_GET['email'] ?? '';
$paket = $_GET['paket'] ?? '';
$status = $_GET['status'] ?? '';

//Dokumen
$Nama_Dokumen = $_GET['Nama_Dokumen'] ?? '';
$Jenis_Dokumen = $_GET['Jenis_Dokumen'] ?? '';
$Tanggal_Unggah = $_GET['Tanggal_Unggah'] ?? '';
$Ukuran_File = $_GET['Ukuran_File'] ?? '';



// Menampilkan data dengan aman
//echo htmlspecialchars($nama) . "<br>";
//echo htmlspecialchars($email) . "<br>";
//echo htmlspecialchars($jabatan) . "<br>";
//echo htmlspecialchars($status) . "<br>";
$query = mysqli_query($koneksi,"INSERT INTO tb_karyawan (nama,Email,jabatan,status) VALUE('$nama','$email','$jabatan','$status')");
header('Location: ../index.php?page=data-karyawan');
$query = mysqli_query($koneksi,"INSERT INTO tb_admin (nama,username,email,password,status_akun,level) VALUE('$nama','$username','$email','$password','$status_akun','$level')");
header('Location: ../index.php?page=data-admin');
$query = mysqli_query($koneksi,"INSERT INTO tb_member (nama,no_hp,email,paket) VALUE('$nama','$no_hp','$email','$paket','$status')");
header('Location: ../index.php?page=data-admin');
$query = mysqli_query($koneksi,"INSERT INTO tb_dokumen (Nama_Dokumen,Jenis_Dokumen,Tanggal_Dokumen,Ukuran_File) VALUE('$Nama_Dokumen','$Jenis_Dokumen','$Tanggal_Unggah','$Ukuran_File')");
header('Location: ../index.php?page=data-admin');
?>