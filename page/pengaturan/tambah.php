<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah User</h3>
              </div>
              <!-- /.card-header -->


              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">

                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $_POST['nama']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="<?= $_POST['username']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required>
                  </div>
                  <div class="form-group">
                    <label>Role :</label>
                      <select class="form-control" name="level" required>
                        <option>-- Pilih --</option>
                          <option value="Admin">Administrator</option>
                          <option value="User">User</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>File input</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" for="customFile" name="foto" required>
                          <label class="custom-file-label">Choose file</label>
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="simpan" class="btn btn-primary" value="Submit"/>
                  <a href="?page=pengaturan" class="btn btn-secondary">Batal</a>
                </div>
              </form>
            </div>
            <!-- /.card -->


<?php

if (isset($_POST['simpan'])) {
  $nama         = $_POST['nama'];
  $username     = $_POST['username'];
  $level        = $_POST['level'];

  $password     = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $foto       = $_FILES['foto']['name'];
  $source     = $_FILES['foto']['tmp_name'];
  $ekstensifoto   = array('jpeg', 'jpg', 'png', 'pdf');
  $pecah      = explode('.', $foto);
  $ekstensi   = strtolower(end($pecah));
  $ukuran     = $_FILES['foto']['size'];
  $folder     = 'img/';
  $gambar     = date('dmYHis')."-".$foto;

  if (in_array($ekstensi, $ekstensifoto) === true) {
    if ($ukuran > 1024) {

  move_uploaded_file($source, $folder.$gambar);

  $sql = $conn->query("INSERT INTO tb_user (nama, username, password, level, foto)
  VALUES (
    '$nama',
    '$username',
    '$password',
    '$level',
    '$gambar'
      )");

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("User berhasil ditambahkan..!");
      window.location.href="?page=pengaturan";
    </script>
    <?php
  }
  else {
    ?>
    <script type="text/javascript">
      alert("User gagal ditambahkan..!");
      // window.location.href="?page=pengaturan";
    </script>
    <?php
  }
}
  else {
    ?>
    <script type="text/javascript">
      alert("Ukuran file terlalu besar..!");
      // window.location.href="?page=pengaturan";
    </script>
    <?php
  }
}
  else {
    ?>
    <script type="text/javascript">
      alert("Ekstensi file yang diupload tidak diperbolehkan..!");
      // window.location.href="?page=pengaturan";
    </script>
    <?php
  }
}
 ?>
