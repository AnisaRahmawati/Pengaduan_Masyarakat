<?php 
// penggunaan session
session_start();
include "koneksi.php";
include "template/header.php";


?>

<section id="main-content">
  <section class="wrapper site-min-height">
    <h2><i class="fas fa-users-cog"></i> Data Petugas</h2>
     <hr>  
    <!-- row -->
    <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
  <?php 
          $tampil = mysqli_query($conn, "SELECT * FROM tbl_petugas JOIN tbl_level ON tbl_petugas.id_level = tbl_level.id_level");
    ?>

                <h4><a href="proses_tambah/tambah_datapetugas.php" class="btn btn-primary">[+] Tambah</a></h4>
                <hr>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Petugas</th>
                    <th scope="col" class="text-center">Foto</th>
                    <th scope="col">Username</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col" class="text-center">Level</th>
                    <th scope="col" colspan="2" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                   <?php
            $no = 1;
            while($data = mysqli_fetch_array($tampil)){
        ?>
                  <tr>
                    <td><?php echo $no++ ?></td>

                    <td>
                      <?php echo $data['nama_petugas'] ?>
                    </td>
                    <td class="text-center"><img src="img/<?php echo $data['foto_petugas']; ?>" width="10%"></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data ['telepon']; ?></td>
                    <td class="text-center"><span class="label label-info label-mini"><?php echo $data ['nama_level'] ?></span></td>
                    <td class="text-center">
                    
                      <a class="btn btn-primary btn-sm" href="proses_edit/edit_datapetugas.php?id_petugas=<?=$data['id_petugas'];?>"><i class="fa fa-pencil"></i></a>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-danger btn-sm" href="proses_hapus/hapus_datapetugas.php?id_petugas=<?=$data['id_petugas'];?>"  onclick="return confirm('Apakah yakin dihapus ?');"><i class="fa fa-trash-o "></i></a>
                    </td>
                  </tr>
                </tbody>
              <?php } ?>
              </table>
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
        