<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
   <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">


  <title>Aplikasi Pengaduan masyarakat</title>

  <!-- Favicons -->
  <link rel="shortcut icon" href="http://localhost/pengaduan_masyarakat/backend/img/apm.png">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Bootstrap core CSS -->
  <link href="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- css font-awesome -->
  <link href="http://localhost/pengaduan_masyarakat/backend/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_masyarakat/backend/fontawesome-free/css/all.min.css">
  <!-- Custom styles for this template -->
  <link href="http://localhost/pengaduan_masyarakat/backend/css/style.css" rel="stylesheet">
  <link href="http://localhost/pengaduan_masyarakat/backend/css/style-responsive.css" rel="stylesheet">
  
</head>

<?php 
session_start();
include 'koneksi.php';

$id_pengaduan = $_GET['id_pengaduan'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan JOIN tbl_masyarakat ON tbl_pengaduan.id_masyarakat=tbl_masyarakat.id_masyarakat WHERE id_pengaduan= '$id_pengaduan'");

$tampil2 = mysqli_query($koneksi, "SELECT * FROM tbl_tanggapan JOIN tbl_petugas ON tbl_tanggapan.id_petugas = tbl_petugas.id_petugas WHERE id_pengaduan=$_GET[id_pengaduan]");
 ?>

<section>
   <div class="col-lg-12">
    <div class="container">
   
    <!-- page start-->
    <div class="chat-room">
      <aside class="mid-side">

        <div class="chat-room-head bg-gradient-info" style="background: #17a2b8;">
          <h3>Tanggapan Laporan</h3>
            <a href="riwayat_laporan.php" class="btn btn-danger pull-right">Kembali</a>
        </div>

    <div class="group-rom">
      <?php 
      while($data = mysqli_fetch_array($tampil)) { ?>

        <div class="first-part odd">
          <img class="img-circle" src="img/masyarakat/<?php echo $data['foto_masyarakat']; ?>" width="32">
          <?php echo $data['nama']; ?>
        </div>

        <div class="second-part">
          <?php echo $data['isi_laporan']; ?>
            <br><br>
          <img src="backend/img/<?php echo $data['foto']; ?>"  class="text-center" width="40%" height="40%">
        </div>

        <div class="third-part"><?php echo $data['tgl_pengaduan']; ?>
        </div>
    </div>
    <?php } ?>


 <?php 
  while($data = mysqli_fetch_array($tampil2)) { ?>
    <div class="group-rom">

      <div class="first-part">
        <img class="img-circle" src="backend/img/<?php echo $data['foto_petugas']; ?>" width="32"> 
        <?php echo $data['nama_petugas']; ?>
      </div>

      <div class="second-part"><?php echo $data['tanggapan']; ?></div>
      <div class="third-part"><?php echo $data['tgl_tanggapan']; ?></div>
      <?php } ?>
      <!-- end div group rom-2 -->
    </div>

        </aside>
      </div>
    <!-- page end-->
  </div>
</div>
</section>


















<!-- js placed at the end of the document so the pages load faster -->
  <script src="http://localhost/pengaduan_masyarakat/backend/lib/jquery/jquery.min.js"></script>
  <script src="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap/js/bootstrap.min.js"></script>
  <!-- js box galeri -->
  <script src="http://localhost/pengaduan_masyarakat/backend/lib/fancybox/jquery.fancybox.js"></script>
  <!--common script for all pages-->
  <script src="http://localhost/pengaduan_masyarakat/backend/lib/common-scripts.js"></script>
  

 
