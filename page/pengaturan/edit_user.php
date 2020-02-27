<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit User</h3>
              </div>
              <!-- /.card-header -->


              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">

                  <?php
                  $id = $_GET['id'];
                  $sql = $conn->query("SELECT * FROM tb_user WHERE id='$id'");
                  while($data = $sql->fetch_assoc()){
                    $role = $data['level'];
                   ?>

                  <div class="form-group">
                    <input type="hidden" class="form-control" name="cek_foto" value="<?php echo $data['foto'] ?>">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="<?= $data['username']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required>
                  </div>
                  <div class="form-group">
                    <label>Role :</label>
                    <select class="form-control" name="level">
                      <option> --Pilih -- </option>
                      <option <?php if ($role == 'admin') {echo "selected";
                        } ?> value='admin'>Administrator</<option>
                      <option <?php if ($role == 'user') {
                      echo "selected"; } ?> value='user'>User</<option>
                    </select>
                    </div>
                    <div class="form-group">
                      <label>File input</label><br>
                      <img src="img/<?php echo $data['foto']; ?>" class="rounded" style="width:50%; height:50%;"><br>
                        <div class="custom-file mt-3">
                          <input type="file" class="custom-file-input" id="customFile" for="customFile" name="foto" required>
                          <label class="custom-file-label">Choose file</label>
                      </div>
                    </div>
                  <?php } ?>
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

  $fotolama   = $_POST['cek_foto'];
  $foto       = $_FILES['foto']['name'];
  $source     = $_FILES['foto']['tmp_name'];
  $ekstensifoto   = array('jpeg', 'jpg', 'png', 'pdf');
  $pecah      = explode('.', $foto);
  $ekstensi   = strtolower(end($pecah));
  $ukuran     = $_FILES['foto']['size'];
  $folder     = 'img/';
  $gambar     = date('dmYHis')."-".$foto;

  if (empty($foto)) {
    $sql = $conn->query("UPDATE tb_user SET nama='$nama', username='$username', password='$password', level='$level' WHERE id='$id'");
    // move_uploaded_file($source, $folder.$gambar);
    // unlink($folder.$gambar);

    if ($sql) {
      ?>
      <script type="text/javascript">
      alert("Data berhasil diedit..!");
      window.location.href="?page=pengaturan";
      </script>
      <?php
    }
  }elseif (!$ukuran > 1024) {
    ?>
    <script type="text/javascript">
    alert("File terlalu besar..!");
    // window.location.href="?page=masuk";
    </script>
    <?php

  }elseif (in_array($ekstensi, $ekstensifoto) === false ) {
    ?>
    <script type="text/javascript">
    alert("Ekstensi file tidak diperbolehkan..!");
    // window.location.href="?page=masuk";
    </script>
    <?php
  }else {

    move_uploaded_file($source, $folder.$gambar);
    $sql = $conn->query("UPDATE tb_user SET nama='$nama', username='$username', password='$password', level='$level', foto='$gambar' WHERE id='$id'");
    unlink($folder.$fotolama);

    if ($sql) {
      ?>
      <script type="text/javascript">
      alert("Data berhasil diedit..!");
      window.location.href="?page=pengaturan";
      </script>
      <?php
    }
  }
}
 ?>
