<?php
session_start();
include '../template/header.php';
include "../koneksi.php";

 // ambil data dari URL
$id_petugas = @$_GET['id_petugas'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_petugas JOIN tbl_level ON tbl_petugas.id_level = tbl_level.id_level WHERE id_petugas = '$id_petugas'");

$data = mysqli_fetch_assoc($query);
?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h2><i class="fas fa-users-cog"></i>Edit Data Petugas</h2>
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
                   <input class=" form-control" name="nama_petugas" type="text"  value="<?php echo $data['nama_petugas']; ?>"  />
                 </div>
               </div>

                  <div class="form-group">
                  <label class="control-label col-md-3">Foto</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                         <img src="../img/<?= $data['foto_petugas']; ?>" width="150">
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
                   <input class=" form-control" name="username" value="<?php echo $data['username']; ?>" type="text"  />
                 </div>
               </div>


                 <div class="form-group">
                 <label class="control-label col-md-3">
                   Password 
                 </label>

                 <div class="col-md-9">
                   <input class=" form-control" name="password" value="<?php echo $data['password']; ?>" type="password"  />
                 </div>
               </div>


        

                <div class="form-group">
                 <label class="control-label col-md-3">
                   No Telepon 
                 </label>

                 <div class="col-md-9">
                   <input class=" form-control" name="telepon" type="text" value="<?php echo $data['telepon']; ?>"  />
                 </div>
               </div>


             <div class="form-group">
                 <label class="control-label col-md-3">
                   Level 
                 </label>

                <div class=" form-label-group col-md-9">
                  <select class="form-control" name="id_level">
                     <?php
        $id1 = $data['id_level'];
        $level = mysqli_query($koneksi, "select * from tbl_level");
        while($dl= mysqli_fetch_assoc($level)) {
          $id2 = $dl['id_level']; 
        ?>
          <option value="<?php echo $id2; ?>" <?= $id1==$id2?'selected' : ''?>>
            <?php echo $dl['nama_level']; ?></option>
        <?php } ?>
                  </select>

                  <br>
                   <button class="btn btn-primary" type="submit" name="edit">Simpan</button>
                   
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
if(isset($_POST['edit'])) {
  $nama_petugas = $_POST['nama_petugas'];
  $nama_file = $_FILES['foto_petugas']['name'];
  $source = $_FILES['foto_petugas']['tmp_name'];
  $folder = '../img/';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $telepon = $_POST['telepon'];
  $id_level = $_POST['id_level'];
  move_uploaded_file($source, $folder.$nama_file);

  $edit = mysqli_query($koneksi, "UPDATE tbl_petugas SET
    nama_petugas = '$nama_petugas',
    username = '$username',
    password = '$password',
    telepon = '$telepon',
    id_level = '$id_level',
    foto_petugas = '$nama_file'
    WHERE id_petugas = '$id_petugas'
    ");

  //cek apakah berhasil atau tidak
  if($edit) {
    echo "
    <script>
    alert('data berhasil dirubah !');
    window.location.href = '../data_petugas.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('data gagal dirubah !');
    window.location.href = '../data_petugas.php';
    </script>
    ";
  }
}

include '../template/footer.php';
?>