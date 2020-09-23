<?php 
ob_start();
session_start();

if (!isset($_SESSION['petugas_id'])) header("location:login.php");

include "koneksi.php";
include "template/header.php";

$id_pengaduan = $_GET['id_pengaduan'];
$tgl_sekarang = date("Y-m-d");
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan JOIN tbl_masyarakat  ON tbl_pengaduan.id_masyarakat = tbl_masyarakat.id_masyarakat WHERE id_pengaduan='$id_pengaduan'");
$petugas = mysqli_query($koneksi, "SELECT * FROM tbl_petugas WHERE id_petugas");

 ?>


<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
  <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="" enctype="multipart/form-data">

    <div class="chat-room mt">
      <aside class="mid-side">
        <div class="chat-room-head">
          <h3>Tanggapan Petugas</h3>
            <a href="pengaduan_baru.php" class="btn btn-primary pull-right">Kembali</a>

         
        </div>

    <div class="group-rom">
    	<?php 
      while($data = mysqli_fetch_array($tampil)) { ?>
      <div class="first-part odd"><img class="img-circle" src="../img/masyarakat/<?php echo $data['foto_masyarakat']; ?>" width="32"> <?php echo $data ["nama"]; ?></div>
      
      <div class="second-part"><?php echo $data ["isi_laporan"]; ?>
      	<br><br>
      	<img src="img/<?php echo $data['foto']; ?>"  class="text-center" width="50%" height="50%">
      	<br>
      </div>

     <div class="third-part"><?php echo $data["tgl_pengaduan"]; ?></div>
	  <?php } ?>
    </div>


<!-- Tanggapan -->
<div class="group-rom">
  <?php $foto = mysqli_fetch_array($petugas)  ?>
  <input type="hidden" name="id_pengaduan" value="<?php echo $_GET['id_pengaduan']; ?>">

  <div class="first-part">
    <img class="img-circle" src="img/<?php echo $_SESSION ['petugas_foto_petugas']; ?>" width="32">    
    <?php echo $_SESSION['petugas_nama_petugas'];?>

      <input type="hidden" name="id_petugas" value="<?php echo $_SESSION['petugas_id'];?>">

 <span class="label label-danger">proses</span>
 <input type="hidden" name="status" value="proses">
</div>

  <div class="second-part">
    <textarea class="wysihtml5 form-control" rows="9" name="tanggapan"></textarea>

<!-- tombol -->
    <br>
      <button class="btn btn-theme" type="submit" name="kirim">Kirim</button>
      <button class="btn btn-theme04" type="reset">Reset</button>


  </div>
  <div class="third-part"><?php echo $tgl_sekarang ?>
     <input name="tgl_tanggapan" value="<?php echo $tgl_sekarang; ?>" minlength="2" type="hidden">
  </div>
</div>


          
          </aside>
 
        </div>
      </form>
        <!-- page end-->
      </section>
      <!-- /wrapper -->
    </section>

<?php 
if(isset($_POST['kirim'])){
$id_pengaduan = $_POST['id_pengaduan'];
$tgl_tanggapan = $_POST['tgl_tanggapan'];
$tanggapan = $_POST['tanggapan'];
$id_petugas = $_POST['id_petugas'];



$kirim = mysqli_query($koneksi, "INSERT INTO tbl_tanggapan VALUES ('','$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')");

$update = mysqli_query($koneksi, "UPDATE tbl_pengaduan SET status = 'proses' WHERE id_pengaduan = '$id_pengaduan'");


if($kirim) {
	echo "
	<script>
      alert('Tanggapan berhasil dikirim!');
      document.location.href = 'pengaduan_proses.php';
    </script> 

    ";
} else {
	 echo "
    <script>
      alert('data gagal ditambahkan!');
      document.location.href = 'pengaduan_baru.php';
    </script> 

    ";
}

}

 ?>




 <?php 
mysqli_close($koneksi);
ob_end_flush();
include "template/footer.php";
?>