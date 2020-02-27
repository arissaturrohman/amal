<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Setting</li>
            </ol>
          </div>
        </div>
      </div><hr><!-- /.container-fluid -->
    </section>

        <div class="card card-info">
          <div class="card-header">
            <div class="row">
              <div class="col-sm text-center">
              <i class="fa fa-users"></i>  <b>Pengguna</b>


              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="3%">No</th>
                  <th width="10%">Nama</th>
                  <th width="10%">Username</th>
                  <th width="10%">Level</th>
                  <th width="20%">Foto</th>
                  <th width="5%">Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $no =1;
                $sql = $conn->query("SELECT * FROM tb_user");
                while($data = $sql->fetch_assoc()){

                 ?>

                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data['nama'] ?></td>
                  <td><?= $data['username'] ?></td>
                  <td><?= $data['level'] ?></td>
                  <td><a href="img/<?php echo $data['foto']; ?>" data-toggle="lightbox">
                  <img src="img/<?php echo $data['foto']; ?>" class="img-fluid" style="width:30%; height:30%;">
                </a></td>
                  <td>
                    <div class="btn-group">
                        <a href="?page=pengaturan&aksi=edit&id=<?php echo $data['id']; ?>" type="button" class="btn btn-success" title="edit"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Apakah Anda Yakin Menhgapus Data Ini..?')" href="?page=pengaturan&aksi=hapus&id=<?php echo $data['id']; ?>" type="button" class="btn btn-danger" title="hapus"><i class="fas fa-trash-alt"></i></a>
                      </div>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </thead>
          </table>
          <a href="?page=pengaturan&aksi=tambah" class="btn btn-outline-primary btn-sm">Tambah</a>
        </div>
      </div>


        <div class="card card-info">
          <div class="card-header">
            <div class="row">
              <div class="col-sm text-center">
              <i class="fa fa-cog"></i>  <b>Aplikasi</b>


              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>OPD</th>
                  <th>Alamat</th>
                  <th>Kepala OPD</th>
                  <th>NIP</th>
                  <th>Logo</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no =1;
                $sql = $conn->query("SELECT * FROM tb_opd");
                while($data = $sql->fetch_assoc()){

                 ?>

                 <tr>
                   <td><?= $no++; ?></td>
                   <td><?= $data['opd'] ?></td>
                   <td><?= $data['alamat'] ?></td>
                   <td><?= $data['ka_opd'] ?></td>
                   <td><?= $data['nip'] ?></td>
                   <td><a href="img/<?php echo $data['foto']; ?>" data-toggle="lightbox">
                   <img src="img/<?php echo $data['foto']; ?>" class="img-fluid" style="width:30%; height:30%;">
                  </a></td>
                   <td>
                     <div class="btn-group">
                         <a href="?page=pengaturan&aksi=edit_opd&id=<?php echo $data['id']; ?>" type="button" class="btn btn-success" title="edit"><i class="fas fa-edit"></i></a>
                       </div>
                   </td>
                 </tr>
               <?php } ?>
              </tbody>
            </thead>
          </table>

        </div>
      </div>
