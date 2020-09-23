<?php
ob_start();
session_start();
if(isset($_SESSION['petugas_username'])) header("location: index.php");
include"koneksi.php";

// proses login
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = mysqli_query($koneksi, "SELECT * FROM tbl_petugas WHERE username = '$username' AND password = '$password'");
  if(mysqli_num_rows($sql)>0) {
    $row_akun = mysqli_fetch_array($sql);

    $_SESSION['petugas_id'] = $row_akun['id_petugas'];
    $_SESSION['petugas_username'] = $row_akun['username'];
    $_SESSION['petugas_password'] = $row_akun['password'];
    $_SESSION['petugas_nama_petugas'] = $row_akun['nama_petugas'];
    $_SESSION['petugas_foto_petugas'] = $row_akun['foto_petugas'];
    $_SESSION['petugas_level'] = $row_akun['id_level'];

    if ($_SESSION['petugas_level'] == "1") {
      header("location: index.php");
    } else{
      header("location: pengaduan_baru.php");
    }

  } else {
    header("location: login.php?login-gagal");
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Halaman Login</title>

  <!-- Custom fonts for this template-->
  <link href="login/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="login/css/sb-admin-2.min.css" rel="stylesheet">

  <!--  ICON -->
        <link rel="shortcut icon" href="img/apm.png">


</head>

<body class="bg-gradient-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7 pt-4">

        <div class="card o-hidden border-1 shadow-lg my-5">
          <div class="card-body p-0">

            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                  </div>
                  <form action="login.php" method="post" class="user">

                    <?php 
                        if(isset($_GET['login-gagal'])) { ?>
                      <div class="alert alert-danger" role="alert">
Username / Password yang anda masukan salah
</div>
                    <?php } ?>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    </div>
                   
                    <button type="submit" class="btn btn-info btn-user btn-block" name="login" value="Login">
                      Login
                    </button>
                  </form>

                  <hr>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="login/vendor/jquery/jquery.min.js"></script>
  <script src="login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="login/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>



<?php
mysqli_close($koneksi);
ob_end_flush();
?>
