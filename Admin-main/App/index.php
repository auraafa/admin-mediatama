<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if(!$_SESSION['nama']){
  header('Location: ../index.php?session=expired');
}
include('header.php');?>
<?php include('../conf/config.php');?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <?php include('preloader.php');?>

  <!-- Navbar -->
  <?php include('navbar.php');?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php include('logo.php');?>

    <!-- Sidebar -->
    <?php include('sidebar.php');?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php include('conten_header.php');?>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php 
    if (isset($_GET['page'])){
      if ($_GET['page']=='dashboard'){
        include('dashboard.php');
      }
      else if($_GET['page']=='data-karyawan'){
        include('data_karyawan.php');
      }
      else if($_GET['page']=='edit-data-karyawan'){
        include('edit/edit_data_karyawan.php');
      }
      else if($_GET['page']=='data-admin'){
        include('data_admin.php');
      }
      else if($_GET['page']=='edit-data-Admin'){
        include('edit/edit_data_Admin.php');
      }
      else if($_GET['page']=='data-member'){
        include('data_member.php');
      }
      else if($_GET['page']=='edit-data-member'){
        include('edit/edit_data_member.php');
      }
      else if($_GET['page']=='kalender'){
        include('kalender.php');
      }
      else if($_GET['page']=='dokumen'){
        include('dokumen.php');
      }

    }
    else{
      include('dashboard.php');
    }?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
