<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Surat Keluar</h3>
              </div>
              <!-- /.card-header -->

              <?php

              $id = $_GET['id'];
              $sql = $conn->query("SELECT * FROM tb_keluar WHERE id='$id'");
              $data = $sql->fetch_assoc();

               ?>

              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <input type="hidden" class="form-control" name="cek_foto" value="<?php echo $data['foto'] ?>">
                  <div class="form-group">
                    <label>No Agenda</label>
                    <input type="text" class="form-control" name="no_keluar" value="<?php echo $data['no_keluar'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Surat</label>
                    <input type="date" class="form-control" name="tgl_agenda" value="<?php echo $data['tgl_agenda'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Klasifikasi</label>
                    <input type="text" class="form-control" name="kla" id="kla" value="<?php echo $data['kla'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Isi Surat</label>
                    <textarea type="text" class="form-control" name="isi"><?php echo $data['isi'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Tujuan</label>
                    <input type="text" class="form-control" name="tujuan" value="<?php echo $data['tujuan'] ?>">
                  </div>
                  <div class="form-group">
                    <label>File input</label><br>
                    <img src="img/<?php echo $data['foto']; ?>" class="rounded" style="width:50%; height:50%;"><br>
                      <div class="custom-file mt-3">
                        <input type="file" class="custom-file-input" id="customFile" for="customFile" name="foto">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="simpan" class="btn btn-primary" value="Submit"/>
                  <a href="?page=keluar" class="btn btn-secondary">Batal</a>
                </div>
              </form>
            </div>
            <!-- /.card -->


<?php

if (isset($_POST['simpan'])) {
  $no_agenda = $_POST['no_keluar'];
  $tgl_agenda = $_POST['tgl_agenda'];
  $isi_surat = $_POST['isi'];
  $tujuan = $_POST['tujuan'];
  $kla    = $_POST['kla'];

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
    $sql = $conn->query("UPDATE tb_keluar SET no_keluar='$no_agenda', tgl_agenda='$tgl_agenda', isi='$isi_surat', tujuan='$tujuan', kla='$kla' WHERE id='$id'");
    // move_uploaded_file($source, $folder.$gambar);
    // unlink($folder.$gambar);

    if ($sql) {
      ?>
      <script type="text/javascript">
      alert("Data berhasil diedit..!");
      window.location.href="?page=keluar";
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
    $sql = $conn->query("UPDATE tb_keluar SET
      no_keluar='$no_agenda',
      tgl_agenda='$tgl_agenda',
      isi='$isi_surat',
      tujuan='$tujuan',
      foto='$gambar',
      kla='$kla'
      WHERE id='$id'");
    unlink($folder.$fotolama);

    if ($sql) {
      ?>
      <script type="text/javascript">
      alert("Data berhasil diedit..!");
      window.location.href="?page=keluar";
      </script>
      <?php
    }

  }
}
 ?>
