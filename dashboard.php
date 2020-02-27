<?php

$level = $_SESSION['level'] == 'User';
if ($level) {

 ?>

<!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">

              <?php

              $sql = $conn->query("SELECT COUNT(isi) AS jumlah FROM tb_masuk");
              $data = $sql->fetch_assoc();
                $masuk = $data['jumlah'];
               ?>

              <div class="inner">
                <h3><?= $masuk; ?></h3>

                <p>Surat Masuk</p>
              </div>
              <div class="icon">
                <i class="fa fa-folder-open"></i>
              </div>
              <a href="?page=masuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <?php

              $sql = $conn->query("SELECT COUNT(isi) AS jumlah FROM tb_keluar");
              $data = $sql->fetch_assoc();
                $keluar = $data['jumlah'];
               ?>
              <div class="inner">
                <h3><?= $keluar; ?></h3>

                <p>Surat Keluar</p>
              </div>
              <div class="icon">
                <i class="fa fa-paper-plane"></i>
              </div>
              <a href="?page=keluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <?php

              $sql = $conn->query("SELECT COUNT(uraian) AS jumlah FROM tb_kla");
              $data = $sql->fetch_assoc();
                $kla = $data['jumlah'];
               ?>
              <div class="inner">
                <h3><?= $kla; ?></h3>

                <p>Klasifikasi</p>
              </div>
              <div class="icon">
                <i class="fa fa-list-alt"></i>
              </div>
              <a href="?page=klasifikasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <?php } else { ?>

            <!-- Small boxes (Stat box) -->
                    <div class="row">
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">

                          <?php

                          $sql = $conn->query("SELECT COUNT(isi) AS jumlah FROM tb_masuk");
                          $data = $sql->fetch_assoc();
                            $masuk = $data['jumlah'];
                           ?>

                          <div class="inner">
                            <h3><?= $masuk; ?></h3>

                            <p>Surat Masuk</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-folder-open"></i>
                          </div>
                          <a href="?page=masuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                          <?php

                          $sql = $conn->query("SELECT COUNT(isi) AS jumlah FROM tb_keluar");
                          $data = $sql->fetch_assoc();
                            $keluar = $data['jumlah'];
                           ?>
                          <div class="inner">
                            <h3><?= $keluar; ?></h3>

                            <p>Surat Keluar</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-paper-plane"></i>
                          </div>
                          <a href="?page=keluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                          <?php

                          $sql = $conn->query("SELECT COUNT(uraian) AS jumlah FROM tb_kla");
                          $data = $sql->fetch_assoc();
                            $kla = $data['jumlah'];
                           ?>
                          <div class="inner">
                            <h3><?= $kla; ?></h3>

                            <p>Klasifikasi</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-list-alt"></i>
                          </div>
                          <a href="?page=klasifikasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <?php

              $sql = $conn->query("SELECT COUNT(nama) AS jumlah FROM tb_user");
              $data = $sql->fetch_assoc();
                $user = $data['jumlah'];
               ?>
              <div class="inner">
                <h3><?= $user; ?></h3>

                <p>Pengguna</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="?page=pengaturan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>
