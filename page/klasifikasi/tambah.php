<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Klasifikasi Surat</h3>
              </div>
              <!-- /.card-header -->

              <?php

              $sql = $conn->query("SELECT * FROM tb_kla");
              $data = $sql->fetch_assoc();

               ?>

              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">

                  <div class="form-group">
                    <label>No Klasifikasi</label>
                    <input type="text" class="form-control" name="no_kla" value="<?= $_POST['no_kla']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Uraian</label>
                    <textarea type="text" class="form-control" name="uraian" required> <?= $_POST['uraian']; ?> </textarea>
                  </div>
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="simpan" class="btn btn-primary" value="Submit"/>
                  <a href="?page=klasifikasi" class="btn btn-secondary">Batal</a>
                </div>
              </form>
            </div>
            </div>
            </div>
            </div>
            <!-- /.card -->


<?php

if (isset($_POST['simpan'])) {
  $no_kla = $_POST['no_kla'];
  $uraian = $_POST['uraian'];

  $sql = $conn->query("INSERT INTO tb_kla (no_kla, uraian)
  VALUES (
    '$no_kla',
    '$uraian'
      )");

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data berhasil ditambahkan..!");
      window.location.href="?page=klasifikasi";
    </script>
    <?php
  }
}
 ?>
