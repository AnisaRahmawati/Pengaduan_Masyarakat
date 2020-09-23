<?php
session_start();
include "../koneksi.php";
include "../template/header.php";
$id_berita = @$_GET['id_berita'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_berita INNER JOIN tbl_kategori ON tbl_berita.id_kategori = tbl_kategori.id_kategori WHERE id_berita ='$id_berita'");
$data = mysqli_fetch_assoc($query);

?>


<!-- CSS JS Summernote -->
  <script src="jquery.js"></script>
  <script src="bootstrap.js"></script>
  <link href="summernote.css" rel="stylesheet">
  <script src="summernote.js"></script>

<body>


<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
       <h2><i class="fa fa-book"></i> Edit Berita</h2>
        <hr>        

 <!--ADVANCED FILE INPUT-->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <form action="" method="post" enctype="multipart/form-data" class="form-horizontal style-form">

                <div class="col-md-8">
                  <div class="form-group">
                    <label for="tgl_tulis">Tanggal:</label>
                      <input type="date" value="<?php echo $data['tgl_tulis']; ?>" class="form-control" name="tgl_tulis" readonly>   
                  </div>

                <div class="form-group">
                  <label for="judul">Judul:</label>
                    <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>">
                </div>

                <div class="form-group">
                  <label for="id_kategori">Kategori:</label>
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
                </div>
              </div>
            <!-- tutp div col-md-8 -->

                
<!-- Thumbnail -->
<div class="form-group last">
  <label class="control-label col-md-4">Thumbnail</label>
  <div class="col-md-4">
    <div class="fileupload fileupload-new" data-provides="fileupload">
      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
        <img src="../img/berita/<?php echo $data['thumbnail']; ?>" width="250" />
      </div>
      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
       <div>
        <span class="btn btn-theme02 btn-file">
          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Foto</span>
        <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
        <input type="file" class="default" name="thumbnail" />
        </span>
        <a href="" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Batal</a>
      </div>
    </div>
  </div> 

<!-- summernote -->
<div class="col-md-12">
  <div class="compose-editor">
    <textarea type="text" name="isi_berita" class="form-control" id="editor"><?php echo "$data[isi_berita]"; ?></textarea>
  </div>

  <div class="compose-btn">
    <button class="btn btn-theme btn-sm mt-2" type="submit" name="post"><i class="fa fa-check"></i> POST</button>
  </div>
</div>
                   
</div>
<!-- end div group-last -->
              </form>
            </div>
          </div>
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

  $edit = mysqli_query($koneksi, "UPDATE tbl_berita SET 
          judul = '$judul',
          tgl_tulis = '$tgl_tulis',
          thumbnail = '$nama_file',
          isi_berita ='$isi_berita',
          id_kategori = '$id_kategori'
          WHERE id_berita = '$id_berita'");
  //cek apakah berhasil atau tidak
  if($edit) {
    echo "
    <script>
    alert('Berita Berhasil Di Edit !');
    window.location.href = '../berita.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('Berita Gagal Di Edit !');
    window.location.href = '../berita.php';
    </script>
    ";
  }
}
 ?>




<script type="text/javascript" src="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script src="http://localhost/pengaduan_masyarakat/backend/lib/advanced-form-components.js"></script>
