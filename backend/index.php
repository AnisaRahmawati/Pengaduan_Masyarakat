<?php 
ob_start();
session_start();
if (!isset($_SESSION['petugas_id'])) header("location:login.php");
include "koneksi.php";
include "template/header.php";

 ?>

  <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
             <div class="col-md-11 p-2 pt-2 text-center">
        <marquee width="30%" style="font-size: 50px;">SELAMAT DATANG</marquee><hr>
          </div>
        </div>
      </section>
      <!-- /wrapper -->
    </section>

 <?php 
mysqli_close($koneksi);
ob_end_flush();
include "template/footer.php";
?>