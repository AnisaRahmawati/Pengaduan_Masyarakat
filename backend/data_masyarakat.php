<?php 
// penggunaan session
session_start();
include "koneksi.php";
include "template/header.php";

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
  $keyword = $_POST["keyword"];

  $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_masyarakat 
          WHERE nama LIKE  '%$keyword%' OR 
          nik LIKE '%$keyword%' OR
          alamat LIKE '%$keyword%'
          order by tbl_masyarakat.id_masyarakat DESC

      ");
}

?>

<section id="main-content">
  <section class="wrapper site-min-height">
    <h2><i class="fas fa-users"></i>Data Masyarakat</h2>
     <hr>  
    <!-- row -->
    <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover table-responsive">
  
 

          <!-- tombol tambah -->
                <h4><a href="proses_tambah/tambah_datamasyarakat.php" class="btn btn-primary">[+] Tambah</a></h4>
                <hr>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col" class="text-center">Foto</th>
                    <th scope="col">Username</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Alamat</th>
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

        $tampil = mysqli_query($conn, "SELECT * FROM tbl_masyarakat ORDER BY id_masyarakat DESC LIMIT $posisi, $batas");

            $no = 1 + $posisi;
            while($data = mysqli_fetch_assoc($tampil)){
        ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nik']; ?></td>
                    <td>
                      <?php echo $data['nama'] ?>
                    </td>
                    <td class="text-center"><img src="../img/masyarakat/<?php echo $data['foto_masyarakat']; ?>" width="20%"></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data ['telepon']; ?></td>
                     <td><?php echo $data ['alamat']; ?></td>
                    
                    <td class="text-center">
                    
                      <a class="btn btn-primary btn-sm" href="proses_edit/edit_datamasyarakat.php?id_masyarakat=<?=$data['id_masyarakat'];?>"><i class="fa fa-pencil"></i></a>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-danger btn-sm" href="proses_hapus/hapus_datamasyarakat.php?id_masyarakat=<?=$data['id_masyarakat'];?>"  onclick="return confirm('Apakah yakin dihapus ?');"><i class="fa fa-trash-o "></i></a>
                    </td>
                  </tr>
                </tbody>
              <?php } ?>
              </table>

              <?php 
//Hitung total data dan halaman link
$query = mysqli_query($koneksi, "SELECT * FROM tbl_masyarakat");
$jmldata = mysqli_num_rows($query);
$jmlhalaman = ceil($jmldata/$batas); ?>

<!-- Pagination -->
<nav aria-label="...">
  <ul class="pagination justify-content-center">
    <?php 
    for($i = 1; $i<=$jmlhalaman; $i++)
      if ($i != $halaman) {
        echo "<li class='page-item'><a class='page-link'  href=\"data_masyarakat.php?halaman=$i\">$i</a></li> ";
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
include "template/footer.php";
?>
        