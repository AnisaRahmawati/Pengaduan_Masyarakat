<?php 
session_start();
include "koneksi.php";
$id_masyarakat = $_SESSION['id_masyarakat'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_masyarakat WHERE id_masyarakat = '$id_masyarakat'");
$data = mysqli_fetch_assoc($tampil);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Aplikasi APM</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="backend/img/apm.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/login/css/sb-admin-2.min.css" rel="stylesheet">


  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <!-- CSS upload gambar -->
  <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link href="http://localhost/pengaduan_masyarakat/css/style.css" rel="stylesheet">

</head>

<body>

<section>
  <div class="container">
    <div class="col-md-12"><br>
      
<div class="card border-info mb-5 mx-auto"  style="width: 40rem;" >
  <div class="card-header py-3 bg-gradient-info">
    <h4 class="m-0 font-weight-bold text-light text-center">EDIT PROFIL</h4>
  </div>


  <div class="col-lg-12">
  <form action="" method="POST" enctype="multipart/form-data">

  <div class="card-body text-info">
  <!-- Pilih Foto Profil -->
    <div class="form-group text-center">
      <label class="control-label col-md-3">Foto Profil</label>
        <div class="col-md-12 text-center">
          <div class="fileupload fileupload-new" data-provides="fileupload">
          <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;">
            <img  class="img-circle"  src="img/masyarakat/<?php echo $data ['foto_masyarakat']; ?>" alt="" />
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
</div>
<!-- end card body -->


<div class="row">

<div class="col-md-6">
  <div class="form-group">
   <label>NIK</label>
    <input class=" form-control" name="nik" type="number"  value="<?php echo $data['nik']; ?>"  /> 
  </div>

  <div class="form-group">
     <label>Nama</label>
      <input class=" form-control" name="nama" value="<?php echo $data['nama']; ?>" type="text"  />
  </div>

  <div class="form-group">
     <label>Username</label>
      <input class=" form-control" name="username" value="<?php echo $data['username']; ?>" type="text"  />
  </div>
</div>
<!-- tutup col-md-6 -->

<div class="col-md-6">
  <div class="form-group">
   <label>Password</label>
    <input class=" form-control" name="password" value="<?php echo $data['password']; ?>" type="text"  />
  </div>

  <div class="form-group">
   <label>Alamat</label>
    <input class=" form-control" name="alamat" value="<?php echo $data['alamat']; ?>" type="text"  />
  </div>

  <div class="form-group">
   <label>No Telepon</label>
    <input class=" form-control" name="telepon" value="<?php echo $data['telepon']; ?>" type="text"  />
  </div>
</div>
<!-- tutup col-md-6 -->


<!-- tombol simpan dan kirim -->
<div class="col-md-12">
  <button class="btn btn-info" name="simpan" type="submit">Simpan</button>
    <a href="index.php" class="btn btn-danger pull-right" name="kembali">Kembali</a>
</div>

<br><br><br>

  
        </form>
        </div>
        </div>
      <!-- end div col-lg-12 mt-5 -->
    </div>
  </div>
</section>


<?php 
if(isset($_POST['simpan'])) {
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

  $simpan = mysqli_query($koneksi, "UPDATE tbl_masyarakat SET
    nama = '$nama',
    nik = '$nik',
    alamat = '$alamat',
    telepon = '$telepon',
    foto_masyarakat = '$nama_file',
    username = '$username',
    password = '$password'
    WHERE id_masyarakat = '$id_masyarakat'
    ");

  //cek apakah berhasil atau tidak
  if($simpan) {
    echo "
    <script>
    alert('Edit Profil Berhasil. Untuk melihat perubahan silahkan logout terlebih dahulu !');
    window.location.href = 'profil.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('Edit Profil Gagal !');
    window.location.href = 'profil.php';
    </script>
    ";
  }
}

?>


 <!-- Bootstrap core JavaScript-->
  <script src="backend/login/vendor/jquery/jquery.min.js"></script>
  <script src="backend/login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="http://localhost/pengaduan_masyarakat/backend/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script src="http://localhost/pengaduan_masyarakat/backend/lib/advanced-form-components.js"></script>
