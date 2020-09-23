<?php 
include "koneksi.php";
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan JOIN tbl_masyarakat ON tbl_pengaduan.nik = tbl_masyarakat.nik WHERE status = '0'");
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Cetak Pengaduan Baru</title>

  <!-- Favicons -->
    <!-- Favicons -->
  <link rel="shortcut icon" href="http://localhost/pengaduan_masyarakat/backend/img/apm.png">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">

    <!--main content start-->
    <section id="main-content">
      <section class="col-lg-12">
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                <div class="pull-left">
                  <h1>APM</h1>
                  <address>
                <strong>Desa Maruyung Sari</strong>
                <br>Kec. Padaherang Kab.Pangandaran <br> 
                <abbr title="Phone">CP:</abbr> (123) 456-7890
              </address>
                </div>
                <!-- /pull-left -->
                <div class="pull-right">
                  <h3 class="well well-small green">Data Pengaduan Masyarakat</h3>
                </div>
                <!-- /pull-right -->
        
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width:20px" class="text-center">No</th>
                      <th style="width:40px">NIK</th>
                      <th style="width:40px" class="text-left">Nama</th>
                      <th style="width:90px" class="text-left">Tgl-Pengaduan</th>
                      <th style="width:90px" class="text-center">Foto</th>
                      <th style="width:90px" class="text-center">Isi Laporan</th>
                      <th style="width:90px" class="text-center">Status</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    while($data = mysqli_fetch_array($tampil)) {
                     ?>
                    <tr>
                      <td class="text-center"><?php echo $no++ ?></td>
                      <td><?php echo $data ['nik']; ?></td>
                      <td class="text-left"><?php echo $data ['nama']; ?></td>
                      <td class="text-left"><?php echo $data['tgl_pengaduan']; ?></td>
                      <td class="text-center"><img src="img/<?php echo $data['foto']; ?>" width="50%"></td>
                      <td><?php echo $data['isi_laporan']; ?></td>
                      <td class="text-center"><span class="label label-danger">Belum ditanggapi</span></td>
                    </tr>
                    
                  </tbody>
                <?php } ?>
                </table>
                <br>
                <br>
              </div>
              <!--/col-lg-12 mt -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
   
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->

</body>

</html>
