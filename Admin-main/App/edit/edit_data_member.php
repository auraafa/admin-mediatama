<?php 
$id    = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM tb_member WHERE id='$id'");
$view  = mysqli_fetch_array($query);
?>
<section class="content">
    <div class="container-fluid">
      <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Member</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='post' action="update/update_data.php?id=<?= $id?>&kode=member">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="nama" name="nama" value="<?php echo $view['nama'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>No_HP</label>
                        <input type="text" class="form-control" placeholder="no_hp" name="no_hp" value="<?php echo $view['no_hp'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="email" name='email' value="<?php echo $view['email'];?>" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Paket</label>
                        <input type="text" class="form-control" name="paket" placeholder="paket" value="<?php echo $view['paket'];?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" required>
                            <option value="">- PILIH -</option>
                            <option <?= ($view['status'] == 'Berlangsung') ? 'selected' : '' ?> value="Berlangsung">Berlangsung</option>
                            <option <?= ($view['status'] == 'Selesai') ? 'selected' : '' ?> value="Selesai">Selesai</option>
                        </select>
                      </div>
                    </div>

                  </div>
                  <button type="submit" class="btn btn-sm btn-info">Simpan</button>
                  
                </form>
              </div>
              <!-- /.card-body -->
       </div>
    </div>
</section>
