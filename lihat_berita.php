<?php 
session_start();
if (!isset($_SESSION['username'])) 
  header("location:login.php");

include 'koneksi.php';
$id_berita = $_GET['id_berita'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_berita JOIN tbl_kategori ON tbl_berita.id_kategori = tbl_kategori.id_kategori WHERE id_berita = '$id_berita' ");
$berita = mysqli_fetch_assoc($tampil);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Aplikasi PPM</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="backend/img/apm.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <!-- css login buat border -->
  <link href="backend/login/css/sb-admin-2.min.css" rel="stylesheet">

</head>


<body>

  <header id="header">

    <div id="topbar">
      <!-- Sosmed SMK -->
       <div class="container">
        <div class="social-links">
          <a href="https://www.facebook.com/" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="https://api.whatsapp.com/" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
          <a href="https://instagram.com/" class="instagram"><i class="fa fa-instagram"></i></a>
          <a href="index.php"><b>Kembali</b></a>
        </div>
      </div>
    </div>

  </header><!-- #header -->


<section class="text-center" style="margin-top: 15px; color: black;">
  <div class="container">
    <div class="col-md-12 col-lg-12 mt-5"><br>

      <span style="font-size: 16px" class="pull-left">Ditulis <?=$berita['tgl_tulis']; ?></span>
      <span class="pull-right">Kategori : <?=$berita['nama_kategori']; ?></span><br><br>
      
      <p><?=$berita['isi_berita']; ?></p>  

 
  </div>
</div>
</section>




  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
    <div class="footer-top my-auto">     
    <div class="container my-auto">
      <div class="copyright">
        &copy; Copyright <strong>Aplikasi Pelaporan pengaduan masyarakat</strong>. Desa Maruyung Sari
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
        -->
        Designed by <a href="https://bootstrapmade.com/">Anisa Rahmawati</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
