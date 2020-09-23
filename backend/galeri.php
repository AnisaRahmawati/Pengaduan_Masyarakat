<?php 
ob_start();
session_start();
if (!isset($_SESSION['petugas_id'])) header("location:login.php");
include "koneksi.php";
include "template/header.php";
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_galeri ORDER BY id_galeri DESC")

 ?>


<section id="main-content">
  <section class="wrapper site-min-height">
    <h2><i class="fa fa-picture-o"></i> Galeri</h2>

    <hr>

<a href="proses_tambah/tambah_galeri.php" class="btn btn-primary">[+] Tambah</a>
<div class="row mt">
<div class="col-lg-12">

 <!-- form berita -->
       <div class="row">
        <?php while($galeri = mysqli_fetch_assoc($tampil)): ?>
          <div class="col-sm-3 text-center">
            <ul class="list-group"> <br>
              <li class="list-group-item">
                <img src="../img/<?= $galeri['foto']; ?>"  width="150" height="100">
                <h5><?=$galeri['judul']; ?></h5>
                <a class="btn btn-theme" href="proses_edit/edit_galeri.php?id_galeri=<?php echo $galeri['id_galeri']; ?>"><i class="fa fa-edit"></i> Edit</a>

     <a class="btn btn-danger" href="proses_hapus/hapus_galeri.php?id_galeri=<?php echo $galeri['id_galeri']; ?>" onclick="return confirm('Apakah yakin dihapus ?');"><i class="fa fa-trash-o"></i> Hapus</a>
              </li>
            </ul>
          </div>
<?php endwhile;  ?>
              <!--/ col-md-4 -->
            </div>
            <!-- /row FIFTH ROW OF PANELS -->
            <!--  SIXTH ROW OF PANELS -->
            <!-- Product Panel -->
          

      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->

 
 <?php 
mysqli_close($koneksi);
ob_end_flush();
include "template/footer.php";
?>