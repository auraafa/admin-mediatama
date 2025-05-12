<?php 
include("../conf/config.php");
$query = mysqli_query($koneksi,"SELECT id,
(SELECT count(id) FROM tb_member WHERE status='Berlangsung') AS  Berlangsung,
(SELECT count(id) FROM tb_member WHERE status='Selesai') AS  Selesai
 FROM tb_member");
$view = mysqli_fetch_array($query);?>

<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-info">
    <div class="inner">
      <h3><?php echo $view['Berlangsung'];?></h3>

      <p>Pelanggan Aktif</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3><?php echo $view['Selesai'];?><sup style="font-size: 20px"></sup></h3>

      <p>Pelanggan Selesai</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->

<!-- ./col -->

<!-- ./col -->