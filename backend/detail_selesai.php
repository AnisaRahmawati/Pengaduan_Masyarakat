<?php 
session_start();
include 'koneksi.php';
include 'template/header.php';

$id_pengaduan = $_GET['id_pengaduan'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan JOIN tbl_masyarakat ON tbl_pengaduan.nik=tbl_masyarakat.nik WHERE id_pengaduan= '$id_pengaduan'");

$tampil2 = mysqli_query($koneksi, "SELECT * FROM tbl_tanggapan JOIN tbl_petugas ON tbl_tanggapan.id_petugas = tbl_petugas.id_petugas WHERE id_pengaduan=$_GET[id_pengaduan]");
 ?>

<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    <div class="chat-room mt">
      <aside class="mid-side">
        <div class="chat-room-head">
          <h3>Detail Pengaduan</h3>
            <a href="pengaduan_selesai.php" class="btn btn-primary pull-right">Kembali</a>
        </div>

    <div class="group-rom">
      <?php 
      while($data = mysqli_fetch_array($tampil)) { ?>

        <div class="first-part odd">
          <img class="img-circle" src="../img/masyarakat/<?php echo $data['foto_masyarakat']; ?>" width="32">
          <?php echo $data['nama']; ?>
        </div>

        <div class="second-part">
          <?php echo $data['isi_laporan']; ?>
          <br><br>
          <img src="img/<?php echo $data['foto']; ?>"  class="text-center" width="40%" height="40%">
          </div>

        <div class="third-part"><?php echo $data['tgl_pengaduan']; ?></div>
        </div>
      <?php } ?>


 <?php 
      while($data = mysqli_fetch_array($tampil2)) { ?>
        <div class="group-rom">
          <div class="first-part">
            <img class="img-circle" src="img/<?php echo $data['foto_petugas']; ?>" width="32"> 
            <?php echo $data['nama_petugas']; ?></div>
          <div class="second-part"><?php echo $data['tanggapan']; ?></div>
          <div class="third-part"><?php echo $data['tgl_tanggapan']; ?></div>
        <?php } ?>
        </div>

            </aside>
        </div>
        <!-- page end-->
      </section>
      <!-- /wrapper -->
    </section>

 <?php 
 include 'template/footer.php';
  ?>