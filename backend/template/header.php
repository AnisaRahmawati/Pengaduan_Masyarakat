<?php 
$conn = mysqli_connect("localhost", "root", "", "pengaduan_masyarakat");
$profile = mysqli_query($conn, "SELECT * FROM tbl_petugas WHERE id_petugas");
$pengaduan = mysqli_query($conn, "SELECT * FROM tbl_pengaduan JOIN tbl_masyarakat ON tbl_pengaduan.id_masyarakat = tbl_masyarakat.id_masyarakat WHERE status='0' LIMIT 3");
$notifikasi = mysqli_query($conn, "SELECT * FROM tbl_pengaduan WHERE status='0' ORDER BY id_pengaduan DESC");
$jml_notif = mysqli_num_rows($notifikasi);
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Aplikasi Pengaduan masyarakat</title>

  <!-- Favicons -->
  <link rel="shortcut icon" href="http://localhost/pengaduan_masyarakat/backend/img/apm.png">

  <!-- Bootstrap core CSS -->
  

  <link href="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- teaxtarea tanggapan -->
  <link href="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" />


  <!-- css search,pagination -->
  <link href="http://localhost/pengaduan_masyarakat/backend/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />

  <link href="http://localhost/pengaduan_masyarakat/backend/lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />

  <link href="http://localhost/pengaduan_masyarakat/backend/lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />

  <link rel="stylesheet" href="http://localhost/pengaduan_masyarakat/backend/lib/advanced-datatable/css/DT_bootstrap.css" />

  <link href="http://localhost/pengaduan_masyarakat/backend/css/style-responsive.css" rel="stylesheet">
  <link href="http://localhost/pengaduan_masyarakat/backend/css/table-responsive.css" rel="stylesheet">


  <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_masyarakat/backend/fontawesome-free/css/all.min.css">
   
  <!--external css-->
  
  <link href="http://localhost/pengaduan_masyarakat/backend/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  
  
  <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_masyarakat/backend/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_masyarakat/backend/lib/gritter/css/jquery.gritter.css" />

  <!-- galeri -->
  <link href="http://localhost/pengaduan_masyarakat/backend/lib/fancybox/jquery.fancybox.css" rel="stylesheet" />


  <!-- Custom styles for this template -->
  <link href="http://localhost/pengaduan_masyarakat/backend/css/style.css" rel="stylesheet">


  <!-- CSS TABEL -->
  <link href="http://localhost/pengaduan_masyarakat/backend/lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />

  <link href="http://localhost/pengaduan_masyarakat/backend/lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />

 <!-- upload gambar -->
   <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap-fileupload/bootstrap-fileupload.css" />

   <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_lama/backend/lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_lama/backend/lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_lama/backend/lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_lama/backend/lib/bootstrap-datetimepicker/datertimepicker.css" />
  <!-- end gambar -->

  
</head>

<body>
  <section id="container">
   
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="http://localhost/pengaduan_masyarakat/backend/index.php" class="logo"><b>A<span>PM</span></b></a>
     
      <div class="nav notify-row" id="top_menu">
        <!-- Notif -->
        <ul class="nav top-menu">

           <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="">
               <i class="fa fa-bell-o"></i>
              <span class="badge bg-theme"><?php echo $jml_notif ?></span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green"><?php echo $jml_notif ?> Pengaduan baru masuk</p>
              </li>

              <?php while ($data = mysqli_fetch_array($pengaduan)) { ?>
              <li>
                <a href="pengaduan_baru.php">
                  <span class="photo"><img src="http://localhost/pengaduan_masyarakat/img/masyarakat/<?php echo $data['foto_masyarakat']; ?>"></span>
                  <span class="subject">
                  <span class="from"><?php echo $data['nama']; ?></span>
                  <span class="time"><?php echo $data['tgl_pengaduan'];  ?></span>
                  </span>
                  </a>
              </li>
               <?php } ?>
                  <li>
                <a href="pengaduan_baru.php">Lihat selengkapnya</a>
              </li>
             
            </ul>
          </li>
        </ul>
        <!--  notification end -->
      </div>


      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="http://localhost/pengaduan_masyarakat/backend/template/logout.php" onclick="return confirm('Apakah anda yakin ingin logout?');">Logout</a></li>
        </ul>
      </div>
    </header>

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <?php $foto = mysqli_fetch_assoc($profile)  ?>
          <p class="centered"><img src="http://localhost/pengaduan_masyarakat/backend/img/<?php echo $_SESSION['petugas_foto_petugas'];?>" class="img-circle" width="100"></p>
          <h5 class="centered"><?php echo $_SESSION['petugas_nama_petugas'];?></h5>

          <!-- sidebar -->
          <li class="mt">
            <a href="http://localhost/pengaduan_masyarakat/backend/index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>

        <?php if($_SESSION['petugas_level'] == 1 || $_SESSION['petugas_level'] == 2) { ?>


          <li class="sub-menu">
              <a href="http://localhost/pengaduan_masyarakat/backend/pengaduan_baru.php">
              <i class="fa fa-bell"></i>
              <span>Pengaduan Baru</span>
              </a>
          </li>

         <li class="sub-menu">
            <a href="http://localhost/pengaduan_masyarakat/backend/pengaduan_proses.php">
              <i class="fa fa-refresh"></i>
              <span>Pengaduan Diproses</span>
              </a>
          </li> 

          <li class="sub-menu">
            <a href="http://localhost/pengaduan_masyarakat/backend/pengaduan_selesai.php">
              <i class="fa fa-check"></i>
              <span>Pengaduan Selesai</span>
              </a>
          </li> 
      <?php } ?>


  <?php 
        if ($_SESSION ['petugas_level'] == 1) {

          ?>            
       <li class="sub-menu">
            <a href="http://localhost/pengaduan_masyarakat/backend/galeri.php">
              <i class="fa fa-picture-o"></i>
              <span>Galeri</span>
              </a>
          </li>
         
         <li class="sub-menu">
            <a href="http://localhost/pengaduan_masyarakat/backend/berita.php">
              <i class="fa fa-book"></i>
              <span>Berita</span>
              </a>
          </li>
         

          <li class="sub-menu">
            <a href="http://localhost/pengaduan_masyarakat/backend/data_masyarakat.php">
              <i class="fas fa-users"></i>
              <span>Data Masyarakat</span>
              </a>
          </li>

          <li class="sub-menu">
            <a href="http://localhost/pengaduan_masyarakat/backend/data_petugas.php">
              <i class="fas fa-users-cog"></i>
              <span>Data Petugas</span>
              </a>
          </li>

          </ul>
        <?php } ?>
        <!-- sidebar menu end-->
      </div>
    </aside>


   <script>
    $(document).ready(function(){
      $('#editor').summernote({
        height:200,
        
      });
    });

  </script>