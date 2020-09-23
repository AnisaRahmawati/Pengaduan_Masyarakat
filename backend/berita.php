<?php 
ob_start();
session_start();
if (!isset($_SESSION['petugas_id'])) header("location:login.php");
include "koneksi.php";
include "template/header.php";
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_berita ORDER BY id_berita DESC")

 ?>

<section id="main-content">
  <section class="wrapper site-min-height">
    <h2><i class="fas fa-book"></i> Daftar Berita</h2>
     <hr>  
    <!-- row -->
    <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover table-responsive">
  
 

          <!-- tombol tambah -->
                <h4><a href="berita/tambah_berita.php" class="btn btn-primary">[+] Tambah</a></h4>
                <hr>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Tulis</th>
                    <th scope="col">Judul</th>
                    <th scope="col" class="text-center">Thumbnail</th>
                    <th scope="col" colspan="2" class="text-center">Aksi</th>
                  </tr>
                </thead>

            <tbody>
<?php
// pagination
      $batas = 5;
      $halaman = @$_GET['halaman'];
      if (empty($halaman)) {
        $posisi = 0;
        $halaman = 1;
      } else {
        $posisi = ($halaman-1) * $batas;
      }

        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_berita ORDER BY id_berita DESC LIMIT $posisi, $batas");

            $no = 1 + $posisi;
            while($data = mysqli_fetch_assoc($tampil)){
        ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['tgl_tulis']; ?></td>
                    <td>
                      <?php echo $data['judul'] ?>
                    </td>
                    <td class="text-center"><img src="img/berita/<?php echo $data['thumbnail']; ?>" width="20%"></td>
                    
                    <td class="text-center">
                    
                      <a class="btn btn-success" href="berita/edit_berita.php?id_berita=<?=$data['id_berita'];?>"><i class="fa fa-pencil"></i> Edit</a>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-danger" href="proses_hapus/hapus_berita.php?id_berita=<?=$data['id_berita'];?>"  onclick="return confirm('Apakah yakin dihapus ?');"><i class="fa fa-trash-o"></i> Hapus</a>
                    </td>
                  </tr>
                </tbody>
              <?php } ?>
              </table>

              <?php 
//Hitung total data dan halaman link
$query = mysqli_query($koneksi, "SELECT * FROM tbl_berita");
$jmldata = mysqli_num_rows($query);
$jmlhalaman = ceil($jmldata/$batas); ?>

<!-- Pagination -->
<nav aria-label="...">
  <ul class="pagination justify-content-center">
    <?php 
    for($i = 1; $i<=$jmlhalaman; $i++)
      if ($i != $halaman) {
        echo "<li class='page-item'><a class='page-link'  href=\"berita.php?halaman=$i\">$i</a></li> ";
      } else {
        echo "<li class='page-item'><a class='page-link'>$i</a></li> ";
      } 
      ?>
  </ul>
</nav>


            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
 
 <?php 
mysqli_close($koneksi);
ob_end_flush();
include "template/footer.php";
?>