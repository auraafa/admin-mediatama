<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Dokumen</h3>
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
                  <th>Nama Dokumen</th>
                  <th>Jenis Dokumen</th>
                  <th>Tanggal Unggah</th>
                  <th>Ukuran File</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_dokumen");
                    while($mhs = mysqli_fetch_array($query)){
                    ?>
                <tr>
                  <td><?php echo $mhs['Nama_Dokumen'];?></td>
                  <td><?php echo $mhs['Jenis_Dokumen'];?></td>
                  <td><?php echo $mhs['Tanggal_Unggah'];?></td>
                  <td><?php echo $mhs['Ukuran_File'];?></td>
                  <td>
                    <a href="delete/hapus_data.php?id=<?php echo $mhs['Id'];?>" class="btn btn-sm btn-danger">Hapus</a>
                    <a href="index.php?page=edit-data-dokumen&id=<?php echo $mhs['Id'];?>"
                      class="btn btn-sm btn-success">Edit</a>
                    <a class="btn btn-sm btn-primary">Lihat Data</a>
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
        <h4 class="modal-title">Dokumen</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="get" action="add/tambah_data.php">
        <div class="modal-body">
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Nama" name="Nama" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Email" name="Email" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Jabatan" name="Jabatan" required>
            </div>

          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>