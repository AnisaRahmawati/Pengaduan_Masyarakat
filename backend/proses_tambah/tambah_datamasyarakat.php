<?php
session_start();
include '../template/header.php';
include "../koneksi.php";
?>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h2><i class="fas fa-users"></i>Tambah Data Masyarakat</h2>
        <hr>
       
<!--ADVANCED FILE INPUT-->
        <div class="row mt-2">
          <div class="col-lg-12 mt-2">
            <div class="form-panel">
              <form action="" method="post" enctype="multipart/form-data" class="form-horizontal style-form">
               

              <div class="form-group">
                 <label class="control-label col-md-3">
                   NIK 
                 </label>

                 <div class="col-md-9">
                   <input class="form-control" name="nik" type="number" required />
                 </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-md-3">
                   Nama 
                 </label>

                 <div class="col-md-9">
                   <input class=" form-control" name="nama" type="text" required />
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
                        <input type="file" class="default" name="foto_masyarakat" />
                        </span>
                        <a href="" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
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
                   Alamat 
                 </label>

                 <div class="col-md-9">
                   <input class=" form-control" name="alamat" type="text" required />

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

  $tambah = mysqli_query($koneksi, "INSERT INTO tbl_masyarakat(id_masyarakat, nama, nik, alamat, telepon, foto_masyarakat, username, password) VALUES ('', '$nama', '$nik', '$alamat', '$telepon', '$nama_file', '$username', '$password')");

  //cek apakah berhasil atau tidak
  if($tambah) {
    echo "
    <script>
    alert('data berhasil ditambahkan !');
    window.location.href = '../data_masyarakat.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('data gagal ditambahkan !');
    window.location.href = '../data_masyarakat.php';
    </script>
    ";
  }
}

include "../template/footer.php";
?>