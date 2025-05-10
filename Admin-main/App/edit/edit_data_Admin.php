<?php 
$id_admin    = $_GET['id_admin'];
$query = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id_admin='$id_admin'");
$view  = mysqli_fetch_array($query);
?>
<section class="content">
  <div class="container-fluid">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Edit Data Admin</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form method="post" action="update/update_data.php?id=<?= $id_admin?>&kode=admin">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="nama" name="nama"
                  value="<?= $view['nama'] ?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="username" name="username"
                  value="<?= $view['username'];?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="email" name='email'
                  value="<?= $view['email'];?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" placeholder="password" name='password'
                  value="<?= $view['password'];?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Level</label>
                <input type="text" class="form-control" placeholder="level" name='level'
                  value="<?= $view['level'];?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- textarea -->
              <div class="form-group">
                <label>Status</label>
                <select class="custom-select" name="status_akun" required>
                  <option value="" selected>-- PILIH --</option>
                  <option <?php if ($view['status_akun'] == 'Aktif') echo 'selected'; ?> value="Aktif">Aktif</option>
                  <option <?php if ($view['status_akun'] == 'Tidak Aktif') echo 'selected'; ?> value="Tidak Aktif">Tidak Aktif</option>

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