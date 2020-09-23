<?php
session_start();
include '../template/header.php';
include "../koneksi.php";

 // ambil data dari URL
$id_masyarakat = @$_GET['id_masyarakat'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_masyarakat WHERE id_masyarakat = '$id_masyarakat'");

$data = mysqli_fetch_assoc($query);
?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h2><i class="fas fa-users-users"></i>Edit Data Masyarakat</h2>
        <hr>
       
<!--ADVANCED FILE INPUT-->
        <div class="row mt-2">
          <div class="col-lg-12 mt-2">
            <div class="form-panel">
              <form action="" method="post" enctype="multipart/form-data" class="form-horizontal style-form">
               

               <div class="form-group">
                 <label class="control-label col-md-3">
                   Nik 
                 </label>

                 <div class="col-md-9">
                   <input class="form-control" name="nik" type="number"  value="<?php echo $data['nik']; ?>"  />
                 </div>
               </div>

            
               <div class="form-group">
                  <label class="control-label col-md-3">Foto</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                         <img src="../../img/masyarakat/<?= $data['foto_masyarakat']; ?>" width="150">
                      </div>

                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Foto</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                        <input type="file" class="default" name="foto_masyarakat" />
                        </span>
                        <a href="" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                      </div>
                    </div>
                   
                  </div>
                </div>

           

               <div class="form-group">
                 <label class="control-label col-md-3">
                   Nama 
                 </label>

                 <div class="col-md-9">
                   <input class=" form-control" name="nama" value="<?php echo $data['nama']; ?>" type="text"  />
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
                   Alamat 
                 </label>

                 <div class="col-md-9">
                   <input class=" form-control" name="alamat" value="<?php echo $data['alamat']; ?>" type="text"  />
                 </div>
               </div>
        

                <div class="form-group">
                 <label class="control-label col-md-3">
                   No Telepon 
                 </label>

                 <div class="col-md-9">
                   <input class=" form-control" name="telepon" type="text" value="<?php echo $data['telepon']; ?>"  />


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
  $nama = $_POST['nama'];
  $nik = $_POST['nik'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];
  $nama_file = $_FILES['foto_masyarakat']['name'];
  $source = $_FILES['foto_masyarakat']['tmp_name'];
  $folder = '../../img/masyarakat/';
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  move_uploaded_file($source, $folder.$nama_file);

  $edit = mysqli_query($koneksi, "UPDATE tbl_masyarakat SET
    nama = '$nama',
    nik = '$nik',
    alamat = '$alamat',
    telepon = '$telepon',
    foto_masyarakat = '$nama_file',
    username = '$username',
    password = '$password'
    WHERE id_masyarakat = '$id_masyarakat'
    ");

  //cek apakah berhasil atau tidak
  if($edit) {
    echo "
    <script>
    alert('data berhasil dirubah !');
    window.location.href = '../data_masyarakat.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('data gagal dirubah !');
    window.location.href = '../data_masyarakat.php';
    </script>
    ";
  }
}

include '../template/footer.php';
?>