<?php 
ob_start();
session_start();
if (!isset($_SESSION['petugas_id'])) header("location:login.php");
include "koneksi.php";
include "template/header.php";

$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan JOIN tbl_masyarakat  ON tbl_pengaduan.id_masyarakat = tbl_masyarakat.id_masyarakat WHERE status ='0' ORDER BY id_pengaduan DESC");

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

<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    <div class="chat-room mt">
      <aside class="mid-side">

        <div class="chat-room-head">
          <h3><i class="fa fa-bell"></i> Pengaduan Baru</h3>
        </div>
       

        <div class="room-desk">
           <?php 
        if ($_SESSION ['petugas_level'] == 1) {

          ?>    
          <!-- Cetak Data -->
          <div class="btn-group">
            <button type="button" class="btn btn-theme dropdown-toggle" data-toggle="dropdown">
              Cetak Data <span class="caret"></span>
            </button>

            <ul class="dropdown-menu" role="menu">
              <li><a href="print_baru.php">PDF</a></li>
              <li><a href="halaman_baru.php">Halaman</a></li> 
            </ul>
          </div>
       <?php } ?>
               <?php 
               while($data = mysqli_fetch_array($tampil)) { 
              ?>

              <div class="room-box">
              	<div class="row">

              		<div class="col-md-8">
                    <h5 class="text-primary"><b><?php echo $data["nama"]; ?></b></h5>
                    <p><?php echo $data["isi_laporan"] ?></p>
                    <p><span class="text-muted">NIK :</span><?php echo $data["nik"]; ?>| <span class="text-muted">Tanggal :</span> <?php echo $data["tgl_pengaduan"]; ?> | <span class="text-muted">status : </span><span class="label label-danger">Belum Ditanggapi</span></p>
                  </div>

            <div class="col-md-4 mt-2">
            	<br>
            	<div class="text-right">

                <a class="btn btn-primary btn-sm" href="tanggapan.php?id_pengaduan=<?=$data['id_pengaduan'];  ?>"><i class="fa fa-pencil"></i> Tanggapi</a>

                 <a class="btn btn-danger btn-sm" href="proses_hapus/hapus_pengaduan.php?id_pengaduan=<?=$data['id_pengaduan'];?>"  onclick="return confirm('Apakah yakin dihapus ?');"><i class="fa fa-trash-o "></i></a>
              </div>
            </div>

        </div>
      </div>
       <?php } ?>
</div>
           
         

             
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