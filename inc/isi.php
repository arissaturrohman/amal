<?php
            $page = $_GET['page'];
            $aksi = $_GET['aksi'];

            if ($page == "masuk") {
              if ($aksi == "") {
                include "page/masuk/masuk.php";
              }elseif ($aksi== "tambah") {
                include "page/masuk/tambah.php";
              }
              elseif ($aksi== "edit") {
                include "page/masuk/edit.php";
              }
              elseif ($aksi== "hapus") {
                include "page/masuk/hapus.php";
              }
            }
            elseif ($page == "keluar") {
              if ($aksi == "") {
                include "page/keluar/keluar.php";
              }
              elseif ($aksi== "tambah") {
                include "page/keluar/tambah.php";
              }
              elseif ($aksi== "edit") {
                include "page/keluar/edit.php";
              }
              elseif ($aksi== "hapus") {
                include "page/keluar/hapus.php";
              }
            }
            elseif ($page == "klasifikasi") {
              if ($aksi == "") {
                include "page/klasifikasi/klasifikasi.php";
              }
              elseif ($aksi== "tambah") {
                include "page/klasifikasi/tambah.php";
              }

            elseif ($aksi== "edit") {
              include "page/klasifikasi/edit.php";
            }

          elseif ($aksi== "hapus") {
            include "page/klasifikasi/hapus.php";
          }
          elseif ($aksi== "import") {
            include "page/klasifikasi/import.php";
          }
        }
        elseif ($page == "pengaturan") {
          if ($aksi == "") {
            include "page/pengaturan/pengaturan.php";
          }
          elseif ($aksi== "tambah") {
            include "page/pengaturan/tambah.php";
          }

        elseif ($aksi== "edit") {
          include "page/pengaturan/edit_user.php";
        }

        elseif ($aksi== "edit_opd") {
          include "page/pengaturan/edit_opd.php";
        }

      elseif ($aksi== "hapus") {
        include "page/pengaturan/hapus_user.php";
      }
    }
              if ($page == "") {
                include "dashboard.php";
            }
            ?>
