<?php 
include 'koneksi.php';
 
  if(isset($_GET['nama'])){
    if($_GET['nama'] == "kosong"){
      echo "<h4 style='color:red'>Nama Belum Di Masukkan !</h4>";
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
  <meta name="author" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Halaman Registrasi</title>


 <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="backend/login/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- css foto profil -->


   <!-- upload gambar -->

  <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap-fileupload/bootstrap-fileupload.css" />
 
  <!-- end gambar -->

  <!--  ICON -->
  <link rel="shortcut icon" href="backend/img/apm.png">


</head>

<body class="bg-gradient-info">

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">
  <div class="col-lg-7 pt-4">
    <div class="card o-hidden border-2 shadow-lg my-5">
      <div class="card-body p-0">

<!-- Nested Row within Card Body -->
<div class="row">
  <div class="col-lg">
    <div class="p-5">

      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Halaman Registrasi</h1>
      </div>


<form action="" method="POST" class="user" enctype="multipart/form-data">
<!-- Pilih Foto Profil -->
    <div class="form-group text-center">
      <label class="control-label col-md-3">Foto Profil</label>
        <div class="col-md-12 text-center">
          <div class="fileupload fileupload-new" data-provides="fileupload">

          <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;">
          <img  class="img-circle"  src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
          </div>

          <div class="fileupload-preview fileupload-exists thumbnail text-center" style="max-width: 200px; max-height: 150px; line-height: 20px;">
          </div>

 <!-- tombol pilih foto -->
          <div>
          <span class="btn btn-info btn-file">
            <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Foto</span>
              <!-- tombol ubah foto -->
              <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
              <input type="file" class="default" name="foto_masyarakat" />
            </span>
              <!-- tombol Batal -->
            <a href="" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Batal</a>
          </div>
<!-- tutup div pilih foto -->
        </div>       
      </div>
    </div>


    <div class="form-group">
      <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap">
    </div>

    <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <input type="number" class="form-control form-control-user" name="nik" id="nik" placeholder="NIK" maxlength="16">
    </div>

    <div class="col-sm-6">
      <input type="text" class="form-control form-control-user" name="telepon" id="telepon" placeholder="No Telepon" maxlength="13">
    </div>
  </div>

  <div class="form-group">
    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat">
  </div>

  <div class="form-group">
    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" minlength="3">
  </div>

  <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
    </div>

  <div class="col-sm-6">
    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Password">
  </div>
</div>

 <div class="text-center">
    <button type="submit" name="register" class="btn btn-info">Registrasi</button>
    <button type="reset" class="btn btn-danger">Reset</button>
</div>

</form>

 <hr>
    <div class="text-center">
      <a class="small" href="login.php"><u>Sudah punya akun | Login</u></a>
    </div> 
<!-- tutup div link sudah punya akun -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

   <?php 
    if (isset($_POST['register'])) {
      $nama = $_POST['nama'];
      $nik = $_POST['nik'];
      $alamat = $_POST['alamat'];
      $telepon = $_POST['telepon'];
      $nama_file = $_FILES['foto_masyarakat']['name'];
      $source = $_FILES['foto_masyarakat']['tmp_name'];
      $folder = 'img/masyarakat/';
      $username = $_POST['username'];
      $password = $_POST['password'];
      
       move_uploaded_file($source, $folder.$nama_file);

      $error=array();
       if (empty($nama)) {
        $error['nama'] = 'nama Tidak Boleh kosong';
      } if (empty($nik)) {
        $error['nik'] = 'Nik Tidak Boleh kosong';
      } if (empty($alamat)) {
        $error['alamat'] = 'alamat Tidak Boleh kosong';
      } if (empty($telepon)) {
        $error['telepon'] = 'telepon Tidak Boleh kosong';
      } if (empty($username)) {
        $error['username'] = 'username Tidak Boleh kosong';
      } if (empty($password)) {
        $error['password'] = 'password Tidak Boleh kosong';
      } 


      $tambah = mysqli_query($koneksi, "INSERT INTO tbl_masyarakat(id_masyarakat, nama, nik, alamat, telepon, foto_masyarakat, username, password) VALUES ('', '$nama', '$nik', '$alamat', '$telepon', '$nama_file', '$username', '$password')");
  
        if($tambah) {
         echo "<script>
          alert('Registrasi anda telah berhasil! Silahkan login');
          window.location='login.php'</script>
          ";
          } else {
            echo "<script>
            alert('Gagal Registrasi');
            window.location='registrasi.php'</script>

            ";
                 
                }
              }
     ?>
                  

  <!-- Bootstrap core JavaScript-->
  <script src="backend/login/vendor/jquery/jquery.min.js"></script>
  <script src="backend/login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="backend/login/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="backend/login/js/sb-admin-2.min.js"></script>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="http://localhost/pengaduan_masyarakat/backend/lib/jquery/jquery.min.js"></script>
  <script src="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="http://localhost/pengaduan_masyarakat/backend/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="http://localhost/pengaduan_masyarakat/backend/lib/jquery.scrollTo.min.js"></script>
  <script src="http://localhost/pengaduan_masyarakat/backend/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="http://localhost/pengaduan_masyarakat/backend/lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="http://localhost/pengaduan_masyarakat/backend/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script src="http://localhost/pengaduan_masyarakat/backend/lib/advanced-form-components.js"></script>

</body>

</html>


