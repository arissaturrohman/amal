<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Surat Masuk</h3>
              </div>
              <!-- /.card-header -->

              <?php

              $id = $_GET['id'];
              $sql = $conn->query("SELECT * FROM tb_masuk WHERE id='$id'");
              $data = $sql->fetch_assoc();

               ?>

              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <input type="hidden" class="form-control" name="cek_foto" value="<?php echo $data['foto'] ?>">
                  <div class="form-group">
                    <label>No Agenda</label>
                    <input type="text" class="form-control" name="no_masuk" value="<?php echo $data['no_masuk'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Surat</label>
                    <input type="date" class="form-control" name="tgl_masuk" value="<?php echo $data['tgl_masuk'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Klasifikasi</label>
                    <input type="text" class="form-control" name="kla" value="<?php echo $data['kla'] ?>" id="kla">
                  </div>
                  <div class="form-group">
                    <label>Isi Surat</label>
                    <textarea type="text" class="form-control" name="isi"><?php echo $data['isi'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Asal Surat</label>
                    <input type="text" class="form-control" name="asal" value="<?php echo $data['asal'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Agenda</label>
                    <input type="date" class="form-control" name="tgl_agenda" value="<?php echo $data['tgl_agenda'] ?>">
                  </div>
                  <div class="form-group">
                    <label>File input</label><br>
                    <img src="img/<?php echo $data['foto']; ?>" class="rounded" style="width:50%; height:50%;"><br>
                    <!-- <input type="checkbox" name="cek_foto" value="true"> Ceklist jika ingin mengubah foto <br> -->
                      <div class="custom-file mt-3">
                        <input type="file" class="custom-file-input" id="customFile" for="customFile" name="foto">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="simpan" class="btn btn-primary" value="Submit"/>
                  <a href="?page=masuk" class="btn btn-secondary">Batal</a>
                </div>
              </form>
            </div>
            <!-- /.card -->


<?php

if (isset($_POST['simpan'])) {
  $no_agenda = $_POST['no_masuk'];
  $tgl_masuk = $_POST['tgl_masuk'];
  $isi_surat = $_POST['isi'];
  $asal_surat = $_POST['asal'];
  $tgl_agenda = $_POST['tgl_agenda'];
  $kla        = $_POST['kla'];

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
    $sql = $conn->query("UPDATE tb_masuk SET no_masuk='$no_agenda', tgl_masuk='$tgl_masuk', isi='$isi_surat', asal='$asal_surat', tgl_agenda='$tgl_agenda', kla='$kla' WHERE id='$id'");
    // move_uploaded_file($source, $folder.$gambar);
    // unlink($folder.$gambar);

    if ($sql) {
      ?>
      <script type="text/javascript">
      alert("Data berhasil diedit..!");
      window.location.href="?page=masuk";
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
    $sql = $conn->query("UPDATE tb_masuk SET
      no_masuk='$no_agenda',
      tgl_masuk='$tgl_masuk',
      isi='$isi_surat',
      asal='$asal_surat',
      tgl_agenda='$tgl_agenda',
      foto='$gambar',
      kla='$kla'
      WHERE id='$id'");
    unlink($folder.$fotolama);

    if ($sql) {
      ?>
      <script type="text/javascript">
      alert("Data berhasil diedit..!");
      window.location.href="?page=masuk";
      </script>
      <?php
    }

  }
}
 ?>
