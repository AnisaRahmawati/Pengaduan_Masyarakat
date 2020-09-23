<?php
session_start();
include '../template/header.php';
include "../koneksi.php";

 // ambil data dari URL
$id_galeri = @$_GET['id_galeri'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_galeri WHERE id_galeri = '$id_galeri'");

$data = mysqli_fetch_assoc($query);
?>

<!--main content start-->
<section id="main-content">
<section class="wrapper site-min-height">
  <h2><i class="fa fa-picture-o"></i> Edit Galeri</h2>
  <hr>
       
<!--ADVANCED FILE INPUT-->
<div class="row mt-2">
  <div class="col-lg-12 mt-2">
    <div class="form-panel">
      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal style-form">
       

       <div class="form-group">
         <label class="control-label col-md-3">
          Judul 
         </label>

         <div class="col-md-9">
           <input class=" form-control" name="judul" type="text"  value="<?php echo $data['judul']; ?>"  />
         </div>
       </div>

      <div class="form-group">
      <label class="control-label col-md-3">Foto</label>

      <div class="col-md-9">
        <div class="fileupload fileupload-new" data-provides="fileupload">

          <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
             <img src="../../img/<?= $data['foto']; ?>" width="200">
          </div>

          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
          </div>

          <div>
            <span class="btn btn-theme02 btn-file">
              <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Foto</span>
              <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
              <input type="file" class="default" name="foto" />
            </span>
              <a href="" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
          </div>

        </div>
       
         
        </div>
     </div>

     <div class="form-group">
     <label class="col-md-3">Kategori</label>

     <div class="col-md-9">
      <select class="form-control" name="id_kategori">
       <?php
        $id1 = $data['id_kategori'];
        $kategori = mysqli_query($koneksi, "select * from tbl_kategori");
        while($dl= mysqli_fetch_assoc($kategori)) {
          $id2 = $dl['id_kategori']; 
        ?>
          <option value="<?php echo $id2; ?>" <?= $id1==$id2?'selected' : ''?>>
            <?php echo $dl['nama_kategori']; ?></option>
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
  $judul = $_POST['judul'];
  $nama_file = $_FILES['foto']['name'];
  $source = $_FILES['foto']['tmp_name'];
  $folder = '../../img/';
  move_uploaded_file($source, $folder.$nama_file);

  $edit = mysqli_query($koneksi, "UPDATE tbl_galeri SET
    judul = '$judul',
    foto = '$nama_file'
    WHERE id_galeri = '$id_galeri'
    ");

  //cek apakah berhasil atau tidak
  if($edit) {
    echo "
    <script>
    alert('data berhasil dirubah !');
    window.location.href = '../galeri.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('data gagal dirubah !');
    window.location.href = '../galeri.php';
    </script>
    ";
  }
}

include '../template/footer.php';
?>