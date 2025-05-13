<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Pelanggan</h3>
          </div>
          <!-- /.card-header -->
          <class="card-body">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
              Tambah Data
            </button>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>NO HP</th>
                  <th>Email</th>
                  <th>Paket</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_member");
                    while($mhs = mysqli_fetch_array($query)){
                    ?>
                <tr>
                  <td><?php echo $mhs['nama'];?></td>
                  <td><?php echo $mhs['no_hp'];?></td>
                  <td><?php echo $mhs['email'];?></td>
                  <td><?php echo $mhs['paket'];?></td>
                  <td><?php echo $mhs['status'];?></td>
                  <td>
                    <a href="delete/hapus_data.php?id=<?php echo $mhs['id'];?>&kode=member" class="btn btn-sm btn-danger">Hapus</a>
                    <a href="index.php?page=edit-data-member&id=<?php echo $mhs['id'];?>"
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
        <h4 class="modal-title">Data Pelanggan</h4>
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
              <input type="text" class="form-control" placeholder="No_Hp" name="no_hp" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Paket" name="paket" required>
            </div>
            <div class="col">
              <select class="custom-select" name="status" required>
                <option value="" disabled selected>Status...</option>
                <option value="Berlangsung">Berlangsung</option>
                <option value="Selesai">Selesai</option>
              </select>
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