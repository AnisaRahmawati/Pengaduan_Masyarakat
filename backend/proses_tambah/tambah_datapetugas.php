<?php
session_start();
include '../template/header.php';
include "../koneksi.php";
?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h2><i class="fas fa-users-cog"></i>Tambah Data Petugas</h2>
        <hr>
       
<!--ADVANCED FILE INPUT-->
        <div class="row mt-2">
          <div class="col-lg-12 mt-2">
            <div class="form-panel">
              <form action="" method="post" enctype="multipart/form-data" class="form-horizontal style-form">
               

               <div class="form-group">
                 <label class="control-label col-md-3">
                   Nama Petugas 
                 </label>

                 <div class="col-md-9">
                   <input class=" form-control" name="nama_petugas" type="text" required />
                 </div>
               </div>

                  <div class="form-group">
                  <label class="control-label col-md-3">Foto</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Foto</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                        <input type="file" class="default" name="foto_petugas" />
                        </span>
                        <a href="tambah_datapetugas.php" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                      </div>
                    </div>
                   
                  </div>
                </div>

               <div class="form-group">
                 <label class="control-label col-md-3">
                   Username 
                 </label>

                 <div class="col-md-9">
                   <input class=" form-control" name="username" type="text" required />
                 </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-md-3">
                   Password 
                 </label>

                 <div class="col-md-9">
                   <input class=" form-control" name="password" type="password" required />
                 </div>
               </div>

                <div class="form-group">
                 <label class="control-label col-md-3">
                   No Telepon 
                 </label>

                 <div class="col-md-9">
                   <input class=" form-control" name="telepon" type="text" required />
                 </div>
               </div>


             <div class="form-group">
                 <label class="control-label col-md-3">
                   Level 
                 </label>

                <div class=" form-label-group col-md-9">
                  <select class="form-control" name="id_level">
                    <option value="petugas" selected="" disabled="">Pilih Level</option>
                    <?php 
                      $petugas = mysqli_query($koneksi, "SELECT * FROM tbl_level");

                      while ($data = mysqli_fetch_assoc($petugas)) { ?>

                    <option value="<?php echo $data['id_level']; ?>"><?php echo $data['nama_level']; ?></option>
                  <?php } ?>
                  </select>

                  <br>
                   <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
                   
                </div>
              </div>


               
             
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- row -->

      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
<?php
if(isset($_POST['simpan'])) {
  $nama_petugas = $_POST['nama_petugas'];
  $nama_file = $_FILES['foto_petugas']['name'];
  $source = $_FILES['foto_petugas']['tmp_name'];
  $folder = '../img/';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $telepon = $_POST['telepon'];
  $id_level = $_POST['id_level'];
  move_uploaded_file($source, $folder.$nama_file);

  $tambah = mysqli_query($koneksi, "INSERT INTO tbl_petugas(id_petugas, nama_petugas, username, password, telepon, id_level, foto_petugas) VALUES ('', '$nama_petugas', '$username', '$password', '$telepon' , '$id_level', '$nama_file')");

  //cek apakah berhasil atau tidak
  if($tambah) {
    echo "
    <script>
    alert('data berhasil ditambahkan !');
    window.location.href = '../data_petugas.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('data gagal ditambahkan !');
    window.location.href = '../data_petugas.php';
    </script>
    ";
  }
}

include '../template/footer.php';
?>