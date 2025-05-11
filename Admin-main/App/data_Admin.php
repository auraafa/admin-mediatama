<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Admin</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
              Tambah Data
            </button>
            <br></br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Status Akun</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_admin");
                    while($mhs = mysqli_fetch_array($query)){
                    ?>
                <tr>
                  <td><?= $mhs['nama'];?></td>
                  <td><?= $mhs['username'];?></td>
                  <td><?= $mhs['email'];?></td>
                  <td><?= $mhs['password'];?></td>
                  <td><?= $mhs['status_akun'];?></td>
                  <td><?= $mhs['level'];?></td>
                  <td>
                    <a href="delete/hapus_data.php?id_admin=<?= $mhs['id_admin'];?>&kode=admin"
                      class="btn btn-sm btn-danger">Hapus</a>
                    <a href="index.php?page=edit-data-Admin&id_admin=<?= $mhs['id_admin'];?>"
                      class="btn btn-sm btn-success">Edit</a>
                  </td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="get" action="add/tambah_data.php">
        <div class="modal-body">
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Nama" name="nama" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="col">
              <select class="custom-select" name="status_akun" required>
                <option value="" disabled selected>Status...</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Level" name="level" required>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>