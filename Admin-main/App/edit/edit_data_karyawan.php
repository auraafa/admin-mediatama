<?php 
$id    = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM tb_karyawan WHERE id='$id'");
$view  = mysqli_fetch_array($query)
?>
<section class="content">
    <div class="container-fluid">
      <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Karyawan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="update/update_data.php?id=<?= $id?>&kode=karyawan">
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
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Email" name='email' value="<?php echo $view['Email'];?>" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" placeholder="jabatan" name='jabatan'  value="<?php echo $view['jabatan'];?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" required>
                          <option value="<?php echo $view['status'];?>" selected><?php echo $view['status'];?></option>
                          <option value="Tetap">Tetap</option>
                          <option value="Kontrak">Kontrak</option>
                          <option value="Magang">Magang</option>
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
