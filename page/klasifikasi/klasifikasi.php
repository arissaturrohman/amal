<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Klasifikasi Surat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Klasifikasi Surat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-sm">
                  <a href="?page=klasifikasi&aksi=tambah" class="btn btn-outline-primary btn-sm">Tambah</a>
                  <a href="?page=klasifikasi&aksi=import" class="btn btn-outline-success btn-sm float-sm-right">Import</a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="10%">No Klasifikasi</th>
                  <th>Uraian</th>
                  <th width="15%">Aksi</th>
                </tr>
                </thead>
                <tbody>

                  <?php

                  $no = 1;
                  $sql = $conn->query("SELECT * FROM tb_kla");
                  while ($data = $sql->fetch_assoc()) {
                   ?>

                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['no_kla'] ?></td>
                  <td><?php echo $data['uraian']; ?></td>
                  <td class="text-center">
                    <div class="btn-group">
                        <a href="?page=klasifikasi&aksi=edit&id=<?php echo $data['id']; ?>" type="button" class="btn btn-success" title="edit"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Apakah Anda Yakin Menhgapus Data Ini..?')" href="?page=klasifikasi&aksi=hapus&id=<?php echo $data['id']; ?>" type="button" class="btn btn-danger" title="hapus"><i class="fas fa-trash-alt"></i></a>
                      </div>
                  </td>
                </tr>

              <?php } ?>
              </tbody>
            </thead>
          </table>
</div>
</div>
