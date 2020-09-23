<?php 
session_start();
include '../koneksi.php';
include '../template/header.php';
$id_berita = $_GET['id_berita'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_berita WHERE id_berita = '$id_berita'");
$data = mysqli_fetch_assoc($query);
 ?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!-- page start-->
        <div class="row mt">
      
            
      
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading wht-bg">
                <h4 class="gen-case">Edit Berita</h4>
              </header>
              <div class="panel-body">
                
                <div class="compose-mail">
                  <form role="form-horizontal" method="post">
                    <div class="row">
                    
                    <div class="col-md-8"><div class="form-group">
                      <label for="tgl_tulis" class="">Tanggal:</label>
                      <input type="date" value="<?php echo $data ['tgl_tulis']; ?>" tabindex="1" id="tgl_tulis" class="form-control" readonly>
                      
                    </div>
                    
                    <div class="form-group">
                      <label for="judul" class="">Judul:</label>
                      <input type="text" value="<?php echo  $data ['judul']; ?>" tabindex="1" id="judul" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="id_kategori" class="">Kategori:</label>
                      <select class="form-control" name="id_kategori">
                          <option value="<?php echo $data ['nama_kategori']; ?>" selected="" disabled="">Pilih Kategori</option>
                          <?php 
                            $kategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");

                            while ($data = mysqli_fetch_assoc($kategori)) { ?>

                          <option value="<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                  </div>  
                    

<div class="col-md-4">
      <label for="Thumdnail" class="">Thumdnail:</label>
       <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 150px; height: 100px;">
                        <img src="../img/berita/<?php echo $data ['thumnaild']; ?>" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Foto</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                        <input type="file" class="default" name="thumnaild" />
                        </span>
                        <a href="" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                      </div>
                    </div>
  
</div>
<!-- tutup div row -->
    </div>
                    


                    <div class="compose-editor">
                      <textarea class="wysihtml5 form-control" rows="9" name="isi_berita" value ="<?php echo $data ['isi_berita']; ?>"></textarea>
                     
                    </div>
                    <div class="compose-btn">
                      <button class="btn btn-theme btn-sm mt-2" type="submit" name="post"><i class="fa fa-check"></i> POST</button>
                    </div>
                  </form>
                </div>
              </div>
            </section>
       
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->

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

  $post = mysqli_query($koneksi, "INSERT INTO tbl_berita(id_berita, judul, tgl_tulis, thumnaild, isi_berita, id_kategori) VALUES ('', '$judul', '$tgl_tulis', '$$nama_file', '$isi_berita' , '$id_kategori')");

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
    alerBerita Gagal Diposting !');
    window.location.href = '../berita.php';
    </script>
    ";
  }
}
 ?>



<?php 
include '../template/footer.php';
?>