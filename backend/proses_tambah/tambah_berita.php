<?php 
session_start();
include '../koneksi.php';
include '../template/header.php';
$today = date("Y-m-d");
?>

<!-- CSS JS Summernote -->
  <link href="http://localhost/pengaduan_masyarakat/summernote/summernote.css" rel="stylesheet">
  <script src="http://localhost/pengaduan_masyarakat/summernote/summernote.js"></script>

<!--content-->
<section id="main-content">
  <section class="wrapper">
    <div class="row mt"> 
    <div class="col-sm-12">

      <section class="panel">
        <header class="panel-heading wht-bg">
          <h4 class="gen-case">Tambah Berita</h4>
        </header>
          <div class="panel-body">             
           <div class="compose-mail">

  <form role="form-horizontal" method="post">
    <div class="row">

    <div class="col-md-8">
      <div class="form-group">
        <label for="tgl_tulis" class="">Tanggal:</label>
        <input type="date" value="<?php echo $today ?>" tabindex="1" id="tgl_tulis" class="form-control" name="tgl_tulis" readonly>   
      </div>
        
      <div class="form-group">
        <label for="judul" class="">Judul:</label>
        <input type="text" tabindex="1" id="judul" name="judul" class="form-control">
      </div>

      <div class="form-group">
        <label for="id_kategori" class="">Kategori:</label>
        <select class="form-control" name="id_kategori">
            <option value="kategori" selected="" disabled="">Pilih Kategori</option>
            <?php 
              $kategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");

              while ($data = mysqli_fetch_assoc($kategori)) { ?>

            <option value="<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></option>
            <?php } ?>
          </select>
      </div>
      <!-- tutp div col-md-8 -->
    </div>  
                    

  <div class="col-md-4">
  <label for="Thumdnail" class="">Thumbnail:</label>
    <div class="fileupload fileupload-new" data-provides="fileupload">

      <div class="fileupload-new thumbnail" style="width: 150px; height: 100px;">
        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
      </div>

      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
      </div>

      <div>
      <a class="fileupload-new btn btn-theme02" type="submit">
      <input type="file" class="default" name="thumnaild" /></a>
  
      <a href="" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Batal</a>
      </div>
    </div>
  <!-- Tutup div col md 4 -->
</div>
<!-- tutup div row -->
</div>
                    
      <div class="compose-editor">
         <textarea type="text" name="isi_berita" class="form-control" id="editor"></textarea>
      </div>

      <div class="compose-btn">
        <button class="btn btn-theme btn-sm mt-2" type="submit" name="post"><i class="fa fa-check"></i> POST</button>
      </div>
    </form>
  </div>
</div>
</section>
</div>
</div>
  </section>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->


  <script>
    $(document).ready(function(){
      $('#editor').summernote({
        height:200,
        
      });
    });

  </script>

<?php
if(isset($_POST['post'])) {
  $judul = $_POST['judul'];
  $nama_file = $_FILES['thumnaild']['name'];
  $source = $_FILES['thumnaild']['tmp_name'];
  $folder = '../img/berita/';
  $tgl_tulis = $_POST['tgl_tulis'];
  $isi_berita = $_POST['isi_berita'];
  $id_kategori = $_POST['id_kategori'];
  move_uploaded_file($source, $folder.$nama_file);

  $post = mysqli_query($koneksi, "INSERT INTO tbl_berita(id_berita, judul, tgl_tulis, thumnaild, isi_berita, id_kategori) VALUES ('', '$judul', '$tgl_tulis', '$nama_file', '$isi_berita' , '$id_kategori')");

  //cek apakah berhasil atau tidak
  if($post) {
    echo "
    <script>
    alert('Berita Berhasil Diposting !');
    window.location.href = '../berita.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('Berita Gagal Diposting !');
    window.location.href = '../berita.php';
    </script>
    ";
  }
}
 ?>



<?php 
include '../template/footer.php';
?>