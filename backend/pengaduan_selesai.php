<?php 
ob_start();
session_start();
if (!isset($_SESSION['petugas_id'])) header("location:login.php");
include "koneksi.php";
include "template/header.php";
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan JOIN tbl_masyarakat  ON tbl_pengaduan.id_masyarakat = tbl_masyarakat.id_masyarakat WHERE status='selesai' ORDER BY id_pengaduan DESC");

 ?>


<!DOCTYPE html>
<html>
<head>
  <title>Pengaduan Selesai</title>
  <style type="text/css">
  @media print{
      .logout, .tambah, .aksi, .form-cari {
        display: none;
      }
    }

  </style>
  </head>
<body>

<section id="main-content">
      <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="chat-room mt">
          <aside class="mid-side">
            <div class="chat-room-head">
              <h3>               <i class="fa fa-check-circle"></i>
 Pengaduan Selesai</h3>
            </div>

            <div class="room-desk">
           <!-- Single button -->
                <?php 
        if ($_SESSION ['petugas_level'] == 1) {

          ?>   
              <div class="btn-group">
                <button type="button" class="btn btn-theme dropdown-toggle" data-toggle="dropdown">
                  Cetak Data <span class="caret"></span>
                  </button>
              <ul class="dropdown-menu" role="menu">
                  <li><a href="print_selesai.php">PDF</a></li>
                  <li><a href="halaman_selesai.php">Halaman</a></li>
                 
                  
                </ul>
              </div>
<?php } ?>
              <?php 
              while($data = mysqli_fetch_array($tampil)) { ?>
              <div class="room-box">
                <div class="row">
                  <div class="col-md-8">
                <h5 class="text-primary"><b><?php echo $data["nama"]; ?></b></h5>
                <p><?php echo $data["isi_laporan"] ?></p>
                <p><span class="text-muted">NIK :</span><?php echo $data["nik"]; ?>| <span class="text-muted">Tanggal :</span> <?php echo $data["tgl_pengaduan"]; ?> | <span class="text-muted">status : </span><span class="label label-success"><?php echo $data ["status"]; ?></span></p>
            </div>

             <div class="col-md-4 mt-2">
              <br>
              <div class="text-right">


                    <a class="btn btn-theme" href="detail_selesai.php?id_pengaduan=<?=$data['id_pengaduan']; ?>"> Detail</a>
                
                </div>
             </div>

              </div>
              </div>
            <?php } ?>

          </aside>
          
        </div>
        <!-- page end-->
      </section>
      <!-- /wrapper -->
    </section>

     <?php

mysqli_close($koneksi);
ob_end_flush();
include "template/footer.php";
?>

    </body>
</html>