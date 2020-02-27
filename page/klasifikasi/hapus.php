<?php

$id =$_GET['id'];
$sql = $conn->query("DELETE FROM tb_kla WHERE id='$id'");
// $data = $sql->fetch_assoc();

if ($sql) {
  ?>
  <script type="text/javascript">
    alert("Data berhasil dihapus..!");
    window.location.href="?page=klasifikasi";
  </script>
  <?php
}

 ?>
