<?php 
include('../../conf/config.php');
//data member
$nama = $_POST['nama'] ?? '';
$no_hp = $_POST['no_hp'] ?? '';
$email = $_POST['email'] ?? '';
$paket = $_POST['paket'] ?? '';
$status = $_POST['status'] ?? '';

$query = mysqli_query($koneksi,"INSERT INTO tb_member (nama,no_hp,email,paket,status) VALUE('$nama','$no_hp','$email','$paket','$status')");
header('Location: ../index.php?page=data-member');
?>
