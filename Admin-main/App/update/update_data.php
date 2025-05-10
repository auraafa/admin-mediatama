
<?php
include('../../conf/config.php');
// var_dump($_GET['id']);
if($_GET['kode']=='karyawan'){
    $id = $_GET['id'];
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $jabatan = $_POST['jabatan'] ?? '';
    $status = $_POST['status'] ?? '';
    $query = mysqli_query($koneksi,"UPDATE `tb_karyawan` SET `nama`='$nama',`Email`='$email',`jabatan`='$jabatan',`status`='$status' WHERE `id`='$id'");
    header('Location: ../index.php?page=data-karyawan');
}

//data admin
if($_GET['kode']=='admin'){
    $id = $_GET['id'];
    $nama = $_POST['nama'] ?? '';
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $status_akun = $_POST['status_akun'] ?? '';
    $level = $_POST['level'] ?? '';

    $query = mysqli_query($koneksi,"UPDATE tb_admin SET `nama`='$nama', `username`='$username',`email`='$email',`password`='$password',`status_akun`='$status_akun',`level`='$level' WHERE `id_admin` ='$id'");
    header('Location: ../index.php?page=data-admin');
}

//data member
if($_GET['kode']=='member'){
    $id = $_GET['id'];
    $nama = $_POST['nama'] ?? '';
    $no_hp = $_POST['no_hp'] ?? '';
    $email = $_POST['email'] ?? '';
    $paket = $_POST['paket'] ?? '';
    $status = $_POST['status'] ?? '';

    $query = mysqli_query($koneksi,"UPDATE `tb_member` SET `nama`='$nama',`no_hp`='$no_hp',`email`='$email',`paket`='$paket',`status`='$status' WHERE `id`='$id'");
    header('Location: ../index.php?page=data-member');
}

// Menampilkan data dengan aman
//echo htmlspecialchars($nama) . "<br>";
//echo htmlspecialchars($email) . "<br>";
//echo htmlspecialchars($jabatan) . "<br>";
//echo htmlspecialchars($status) . "<br>";

?>