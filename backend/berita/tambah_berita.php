<?php
session_start();
include "../koneksi.php";
include "../template/header.php";
$today = date("Y-m-d");
?>

<title>Aplikasi Pengaduan masyarakat</title>

<!-- CSS JS Summernote -->
<link href="../backend/lib/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="summernote.css" rel="stylesheet">
<script src="jquery.js"></script>
<script src="bootstrap.js"></script>
<script src="summernote.js"></script>
</head>

<body>

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
       <h2><i class="fa fa-book"></i> Tambah Berita</h2>
        <hr>        

 <!--ADVANCED FILE INPUT-->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <form action="" method="post" enctype="multipart/form-data" class="form-horizontal style-form">

                <div class="col-md-8">
                  <div class="form-group">
                    <label for="tgl_tulis">Tanggal:</label>
                    <input type="date" value="<?php echo $today ?>" tabindex="1" id="tgl_tulis" class="form-control" name="tgl_tulis" readonly>   
                  </div>

                <div class="form-group">
                  <label for="judul">Judul:</label>
                  <input type="text" tabindex="1" id="judul" name="judul" class="form-control">
                </div>

                <div class="form-group">
                  <label for="id_kategori">Kategori:</label>
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

                
                
                <div class="form-group last">
                  <label class="control-label col-md-4">Thumbnail</label>
                  <div class="col-md-4">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                       <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Foto</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                        <input type="file" class="default" name="thumbnail" />
                        </span>
                        <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Batal</a>
                      </div>
                    </div>
                  </div> 

                   <!-- summernote -->
                   <div class="col-md-12">
                    <div class="compose-editor">
                     <textarea type="text" name="isi_berita" class="form-control" id="editor"></textarea>
                  </div>

                  <div class="compose-btn">
                    <button class="btn btn-theme btn-sm mt-2" type="submit" name="post"><i class="fa fa-check"></i> POST</button>
                  </div>
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




  <script>
    $(document).ready(function(){
      $('#editor').summernote({
        height:200,
        
      });
    });
  </script>

</html>

<?php
if(isset($_POST['post'])) {
  $judul = $_POST['judul'];
  $tgl_tulis = $_POST['tgl_tulis'];
  $nama_file = $_FILES['thumbnail']['name'];
  $source = $_FILES['thumbnail']['tmp_name'];
  $folder = '../img/berita/';
  $isi_berita = $_POST['isi_berita'];
  $id_kategori = $_POST['id_kategori'];
  move_uploaded_file($source, $folder.$nama_file);

  $post = mysqli_query($koneksi, "INSERT INTO tbl_berita(id_berita, judul, tgl_tulis, thumbnail, isi_berita, id_kategori) VALUES ('', '$judul', '$tgl_tulis', '$nama_file', '$isi_berita' , '$id_kategori')");

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




<script type="text/javascript" src="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script src="http://localhost/pengaduan_masyarakat/backend/lib/advanced-form-components.js"></script>

