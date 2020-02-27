<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Surat Keluar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Surat Masuk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-sm">
                  <a href="?page=keluar&aksi=tambah" class="btn btn-outline-primary btn-sm"> <i class="fa fa-pencil-alt"></i> Tambah</a>
                  <a href="#" class="btn btn-outline-success btn-sm float-sm-right"><i class="fa fa-print"></i> Cetak</a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Agenda</th>
                  <!-- <th>Tanggal Surat</th> -->
                  <th>Tanggal Agenda</th>
                  <th>Klasifikasi</th>
                  <th>Isi Surat</th>
                  <th>Tujuan</th>
                  <th>File</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                  <?php

                  $no = 1;
                  $sql = $conn->query("SELECT * FROM tb_keluar");
                  while ($data = $sql->fetch_assoc()) {
                    // $no_agenda = $data['no_masuk'];
                    //
                    // $noUrut = (int) substr($no_agenda,3);
                    // $noUrut++;
                    //
                    // $char = "";
                    // $no_agenda = $char . sprintf("%03s",$noUrut);
                   ?>

                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['no_keluar'] ?></td>
                  <td><?php echo TanggalIndo( $data['tgl_agenda']) ?></td>
                  <td><?php echo $data['kla']; ?></td>
                  <td><?php echo $data['isi']; ?></td>
                  <td><?php echo $data['tujuan'] ?></td>
                  <td><a href="img/<?php echo $data['foto']; ?>" data-toggle="lightbox">
                  <p class="img-fluid"><?php echo $data['foto']; ?></p>
                </a></td>
                  <td>
                    <div class="btn-group">
                        <a href="?page=keluar&aksi=edit&id=<?php echo $data['id']; ?>" type="button" class="btn btn-success" title="edit"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Apakah Anda Yakin Menhgapus Data Ini..?')" href="?page=keluar&aksi=hapus&id=<?php echo $data['id']; ?>" type="button" class="btn btn-danger" title="hapus"><i class="fas fa-trash-alt"></i></a>
                      </div>
                  </td>
                </tr>

              <?php } ?>
              </tbody>
            </thead>
          </table>
</div>
</div>
