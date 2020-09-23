<?php 
session_start();
if (!isset($_SESSION['username'])) 
  header("location:login.php");

include 'koneksi.php';
$pengaduan = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan JOIN tbl_masyarakat ON tbl_pengaduan.id_masyarakat = tbl_masyarakat.id_masyarakat ORDER BY id_pengaduan DESC");
$galeri = mysqli_query($koneksi, "SELECT * FROM tbl_galeri JOIN tbl_kategori ON tbl_galeri.id_kategori = tbl_kategori.id_kategori ORDER BY id_galeri DESC");
$berita = mysqli_query($koneksi, "SELECT * FROM tbl_berita ORDER BY id_berita DESC LIMIT 4");
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

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>


<body>

  <header id="header">

    <div id="topbar">
      <!-- Sosmed Desa -->
       <div class="container">
        <div class="social-links">
          <a href="https://www.facebook.com/" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="https://api.whatsapp.com/" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
          <a href="https://instagram.com/" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="container">

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Beranda</a></li>
          <li><a href="#portfolio">Galeri</a></li>
          <li><a href="#team">Berita</a></li>
          <li class="drop-down"><a href="">Pengaduan</a>
            <ul>
              <li><a href="summernote/pengaduan.php">Laporkan Pengaduan</a></li>
              <li><a href="riwayat_laporan.php">Riwayat Laporan</a>
            </ul>
          </li>  

          <li class="drop-down"><a href=""><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?></a>
            <ul>
              <li><a href="profil.php">Edit Profil</a></li>
              <li><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin logout?');">Logout</a>
            </ul>
          </li>  
         
        </ul>
      </nav>   
    </div>
  </header><!-- #header -->

  <!-- Beranda -->
  <section id="intro" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-md-6 intro-info order-md-first order-last">
          <h2>APM <br>Aplikasi Pengaduan<br><span>Masyarakat</span></h2>
          <div>
            <a href="#beranda" class="btn-get-started scrollto">Beranda</a>
          </div>
        </div>
  
        <div class="col-md-6 intro-img order-md-last order-first">
          <img src="img/intro-img.svg" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </section><!-- Akhir beranda -->

  <main id="main">

    
<!-- Kilas Pengaduan  -->
<section id="testimonials">
  <div class="container">
    <header class="section-header">
      <h3>Kilas Pengaduan</h3>
    </header>

    <div class="row justify-content-center">
      <div class="col-lg-8">

        <div class="owl-carousel testimonials-carousel wow fadeInUp">
                <?php while($data = mysqli_fetch_assoc($pengaduan)) : ?>

          <div class="testimonial-item">
            <img src="img/masyarakat/<?= $data['foto_masyarakat']; ?>" class="testimonial-img" alt="">
            <h3><?php echo $data['nama']; ?></h3>
            <h4><?php echo $data['tgl_pengaduan']; ?></h4>
            <p>
              <?php echo $data ['isi_laporan']; ?>
            </p>
          </div>
        <?php endwhile ?>
        </div>

      </div>
    </div>
  </div>
</section><!-- kilas pengaduan -->






 <!-- GALERI -->
<section id="portfolio" class="section-bg">
  <div class="container">

    <header class="section-header">
      <h3 class="section-title">Galeri</h3>
    </header>

    <div class="row">
      <div class="col-lg-12">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active"></li>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container">
    <?php while ($data = mysqli_fetch_assoc($galeri)) { ?>
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-wrap">
          <img src="img/<?php echo $data ['foto']; ?>" class="img-fluid justify-content-center" alt="" width="400" height="150"  >
          <div class="portfolio-info">
            <h5 style="color: white;"><?php echo $data['judul']; ?></h5>
            <div>
              <a href="img/<?php echo $data ['foto']; ?>" data-lightbox="portfolio" data-title="<?php echo $data['nama_kategori']; ?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
              <a href="img/<?php echo $data ['foto']; ?>" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
</section><!-- Akhir galeri -->



<!-- Berita -->
<section id="team" class="section-bg">
  <div class="container">
    <div class="section-header">
      <h3>Berita</h3>
    </div>

  <div class="row">
    <?php while ($data = mysqli_fetch_assoc($berita)) { ?>

    <div class="col-lg-3 col-md-6 wow fadeInUp">
      <div class="member">
        <img src="backend/img/berita/<?= $data['thumbnail']; ?>" class="img-wraper" alt="" width="300" height="250">

  <div class="member-info">
    <div class="member-info-content">
      <h4><?php echo $data['judul'] ?></h4>
      <span><?php echo $data ['tgl_tulis']; ?></span>
        <div class="social">
          <a class="btn btn-info" href="lihat_berita.php?id_berita=<?php echo $data['id_berita'] ?>">Baca</a>
        </div>
    </div>
  </div>

      </div>
    </div>
    <?php } ?>
  </div>
  </div>
</section><!-- end berita -->



  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
    <div class="footer-top">     
    <div class="container">
      <div class="copyright">
        &copy; Copyright Aplikasi <strong>Pengaduan Masyarakat</strong>.
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
