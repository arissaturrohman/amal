<?php

$id =$_GET['id'];
$sql = $conn->query("SELECT * FROM tb_masuk");
$data = $sql->fetch_assoc();
$folder = 'img/';
$gambar = $data['foto'];

$hapus = $conn->query("DELETE FROM tb_masuk WHERE id='$id'");
unlink($folder.$gambar);

if ($sql) {
  ?>
  <script type="text/javascript">
    alert("Data berhasil dihapus..!");
    window.location.href="?page=masuk";
  </script>
  <?php
}

 ?>
