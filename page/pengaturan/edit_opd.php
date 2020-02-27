<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit OPD</h3>
              </div>
              <!-- /.card-header -->


              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">

                  <?php
                  $id = $_GET['id'];
                  $sql = $conn->query("SELECT * FROM tb_opd WHERE id='$id'");
                  while($data = $sql->fetch_assoc()){

                   ?>

                  <div class="form-group">
                    <input type="hidden" class="form-control" name="cek_foto" value="<?php echo $data['foto'] ?>">
                    <label>OPD</label>
                    <input type="text" class="form-control" name="opd" value="<?= $data['opd']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea type="text" class="form-control" name="alamat" required><?= $data['alamat']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Kepala OPD</label>
                    <input type="text" class="form-control" name="ka_opd" value="<?= $data['ka_opd']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>NIP</label>
                    <input type="number" class="form-control" name="nip" value="<?= $data['nip']; ?>" required>
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
  $opd         = $_POST['opd'];
  $alamat      = $_POST['alamat'];
  $ka_opd      = $_POST['ka_opd'];
  $nip         = $_POST['nip'] ;

  // $password     = password_hash($_POST['password'], PASSWORD_DEFAULT);

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
    $sql = $conn->query("UPDATE tb_opd SET opd='$opd', alamat='$alamat', ka_opd='$ka_opd', nip='$nip' WHERE id='$id'");
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
    $sql = $conn->query("UPDATE tb_opd SET opd='$opd', alamat='$alamat', foto='$gambar', ka_opd='$ka_opd', nip='$nip' WHERE id='$id'");
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
