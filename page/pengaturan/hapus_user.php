<?php

$id =$_GET['id'];
$sql = $conn->query("SELECT * FROM tb_user");
$data = $sql->fetch_assoc();
$folder = 'img/';
$gambar = $data['foto'];

$hapus = $conn->query("DELETE FROM tb_user WHERE id='$id'");
unlink($folder.$gambar);

if ($sql) {
  ?>
  <script type="text/javascript">
    alert("User berhasil dihapus..!");
    window.location.href="?page=pengaturan";
  </script>
  <?php
}

 ?>
