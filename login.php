<?php
session_start();

if (isset($_SESSION["login"])) {
  header("Location:login.php");
}
include("inc/config.php");
error_reporting(E_ALL ^(E_NOTICE | E_WARNING));

if (isset($_POST["login"])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = $conn->query("SELECT * FROM tb_user WHERE username='$username'");

  if (mysqli_num_rows($sql) === 1 ) {

    $row = mysqli_fetch_assoc($sql);
    if (password_verify($password, $row['password'])) {

      $_SESSION['login'] = true;
      if ($row['level'] == "Admin") {
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['foto'] = $row['foto'];
        $_SESSION['level'] = "Admin";

        header('location:index.php');
        exit;
      }elseif ($row['level'] == "User") {
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['foto'] = $row['foto'];
        $_SESSION['level'] = "User";

        header('location:index.php');
        exit;
      }
    }
  }

  $error = true;
}


 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMAL | Log In</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <?php
    $sql = $conn->query("SELECT * FROM tb_opd");
    $data = $sql->fetch_assoc();
     ?>
    <img src="img/<?= $data['foto']; ?>" class="img-circle elevation-2" alt="User Image" style="width:20%;">
    <!-- <b><p><? $data['opd']; ?></p></b> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <b><p class="login-box-msg">Aplikasi Surat Masuk & Keluar</p></b>


      <?php if(isset($error)): ?>
                  <p style="color:red; font-style:italic; text-align:center;">Username / Password salah</p>
                  <?php endif; ?>
      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
