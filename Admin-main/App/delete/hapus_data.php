<?php 
include('../../conf/config.php');

if($_GET['kode'] == 'karyawan'){
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"DELETE FROM tb_karyawan WHERE id='$id' ");
    header('Location: ../index.php?page=data-karyawan');
}

if($_GET['kode'] == 'admin'){
    $id_admin = $_GET['id_admin'];;
    $query = mysqli_query($koneksi,"DELETE FROM tb_admin WHERE id_admin='$id_admin' ");
    header('Location: ../index.php?page=data-admin');
}

if($_GET['kode'] == 'member'){
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"DELETE FROM tb_member WHERE id='$id' ");
    header('Location: ../index.php?page=data-member');
}

if($_GET['kode'] == 'dokumen'){
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"DELETE FROM tb_dokumen WHERE id='$id' ");
    header('Location: ../index.php?page=dokumen');
}
?>