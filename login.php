<?php
include 'koneksi.php';
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $login = mysqli_query($koneksi, "SELECT * FROM tbl_masyarakat WHERE username='$username' AND password='$password'");
  $data=mysqli_fetch_assoc($login);
  $cek=mysqli_num_rows($login);

  if ($cek > 0) {
    session_start();
    $_SESSION['id_masyarakat'] = $data['id_masyarakat'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['nik'] = $data['nik'];
    $_SESSION['alamat'] = $data['alamat'];
    $_SESSION['telepon'] = $data['telepon'];
    $_SESSION['foto_masyarakat'] = $data['foto_masyarakat'];  
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    echo "<script>
    alert('Anda Berhasil login, selamat datang $_SESSION[username]');
    window.location='index.php'</script>
    ";
  } else {
    echo "<script>
    alert('Gagal Login');
    window.location='login.php'</script>

    ";
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

  <title>Halaman Login Masyarakat</title>

  <!-- Custom fonts for this template-->
  <link href="backend/login/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="backend/login/css/sb-admin-2.min.css" rel="stylesheet">

  <!--  ICON -->
        <link rel="shortcut icon" href="backend/img/apm.png">


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
                    <h1 class="h4 text-gray-900 mb-4">Halaman Login Masyarakat</h1>
                  </div>
                  <form action="login.php" method="post" class="user">

                    <?php 
                        if(isset($_GET['login-gagal'])) { ?>
                      <div>
                        <p class="text-center" style="color: red;">Username/Password yang anda masukan salah</p>
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
                  <div class="text-center">
                    <a class="small" href="registrasi.php"><u>Belum punya akun? Buat akun</u></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="backend/login/vendor/jquery/jquery.min.js"></script>
  <script src="backend/login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="backend/login/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="backend/login/js/sb-admin-2.min.js"></script>

</body>

</html>




