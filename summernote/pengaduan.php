<?php
session_start();
include "../koneksi.php";
$tgl_sekarang = date("Y-m-d");

?>

<!DOCTYPE html>
<html>
<head>

  <!-- Required meta tags -->
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="../backend/img/apm.png" rel="icon">

	<title>Pengaduan Masyarakat</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_masyarakat/fontawesome-free/css/all.min.css">

  <!-- CSS upload gambar -->
  <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap-fileupload/bootstrap-fileupload.css" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <script src="http://localhost/pengaduan_masyarakat/bootstrap/js/jquery.js"></script>
  <script src="http://localhost/pengaduan_masyarakat/bootstrap/js/bootstrap.js"></script>

  <!-- Libraries CSS Files -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://localhost/pengaduan_masyarakat/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="http://localhost/pengaduan_masyarakat/lib/animate/animate.min.css" rel="stylesheet">
  <link href="http://localhost/pengaduan_masyarakat/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="http://localhost/pengaduan_masyarakat/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="http://localhost/pengaduan_masyarakat/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="http://localhost/pengaduan_masyarakat/css/style.css" rel="stylesheet">

<!-- CSS JS Summernote -->
	<link href="bootstrap.css" rel="stylesheet">
	<script src="jquery.js"></script>
	<script src="bootstrap.js"></script>
	<link href="summernote.css" rel="stylesheet">
	<script src="summernote.js"></script>
</head>

<body>

  <header id="header">

  <div id="topbar">
     <div class="container">

        <!-- Sosmed SMK -->
        <div class="social-links">
          <a href="https://www.facebook.com/" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="https://api.whatsapp.com/" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
          <a href="https://instagram.com/" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
       <!-- end div sosmed -->

      <!-- Navbar -->
      <nav class="main-nav pull-right d-none d-lg-block">
        <ul>
          <li><a href="../index.php">Kembali</a></li>
          <li class="drop-down"><a href="">Pengaduan</a>
            <ul>
              <li><a href="../summernote/pengaduan.php">Laporkan Pengaduan</a></li>
              <li><a href="../riwayat_laporan.php">Riwayat Laporan</a>
            </ul>
          </li>  

          <li class="drop-down"><a href=""><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?></a>
            <ul>
              <li><a href="../profil.php">Edit Profil</a></li>
              <li><a href="../logout.php" onclick="return confirm('Apakah anda yakin ingin logout?');">Logout</a>
            </ul>
          </li> 

        </ul>
      </nav>   
   </div>
  </div>
</header><!-- #header -->
   

<main id="main">

<section id="intro" class="clearfix">
  <div class="container d-flex h-100">
    <div class="col-md-12 intro-info"><br>
  
  <header class="section-header mt-4">
    <h3>Laporkan Pengaduan</h3><br>
  </header>

<div class="form">
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group" hidden="">
    <label class="control-label col-lg-2">Id_masyarakat</label>
  <div class="col-lg-10">
    <input class="form-control" name="id_masyarakat" value="<?php echo $_SESSION['id_masyarakat'];?>" type="text"/>
    <br>
  </div>
</div>


<div class="form-group " hidden="">
  <label class="control-label col-lg-2">Status</label>
  <div class="col-lg-10">
  <input class="form-control" name="status" value="0" type="text" readonly />
  <br>
  </div>
</div>

 
<div class="form-group ">
  <label class="control-label col-lg-2">Tanggal Pengaduan</label>
  <div class="col-lg-10">
  <input class="form-control" name="tgl_pengaduan" value="<?php echo $tgl_sekarang; ?>" type="date" readonly />
  <br>
  </div>
</div>


<div class="form-group ">
  <label class="control-label col-lg-2">Foto</label>
  <div class="col-lg-10">

  <div class="fileupload fileupload-new" data-provides="fileupload">

      <div class="fileupload-new thumbnail" style="width: 150px; height: 100px;">
      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
      </div>

      <div class="fileupload-preview fileupload-exists thumbnail text-center" style="max-width: 200px; max-height: 150px; line-height: 20px;">
      </div>

<!-- tombol pilih foto -->
      <div>
      <span class="btn btn-info btn-file">
        <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Foto</span>
          <!-- tombol ubah foto -->
          <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
          <input type="file" class="default" name="foto" />
        </span>
          <!-- tombol Batal -->
        <a href="" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Batal</a>
      </div>
<!-- tutup div pilih foto -->
    </div>

  
   <br>
  </div>
</div>

<div class="form-group ">
  <label class="control-label col-lg-2">Isi Laporan</label>
  <div class="col-lg-10">
  <textarea type="text" name="isi_laporan" class="form-control" id="editor"></textarea>
  </div>
</div>
          
  
<div class="form-group">
  <div class="col-lg-offset-2 col-lg-10">
    <button class="btn btn-primary" type="submit" name="kirim">Kirim</button>
  </div>
</div>

  </from>
</div>
<!-- end div form -->

  </div>
</div>
<!-- end div section -->
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

function tambah($data) {
  global $koneksi;
  $tgl_pengaduan = $_POST['tgl_pengaduan'];
  $id_masyarakat = $_POST['id_masyarakat'];
  $isi_laporan = $_POST["isi_laporan"];
  $status = $_POST['status'];

 
  //  upload gambar
  $foto = upload();
  if( !$foto ) {
    return false; 
  }


  $query = "INSERT INTO tbl_pengaduan 
            VALUES ('', '$tgl_pengaduan', '$id_masyarakat', '$isi_laporan', '$foto', '$status')";
  
  mysqli_query($koneksi,$query);

  return mysqli_affected_rows($koneksi);
}


function upload(){
  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name']; 

  //  cek apakah tidak ada gambar yang di upload
  if( $error === 4 ) {
    echo "<script>
        alert('pilih gambar terlebih dahulu!');
    </script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
    echo "<script>
        alert('yang anda upload bukan gambar!');
    </script>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  $folder = "../backend/img/";
  
move_uploaded_file($tmpName, $folder.$namaFileBaru);

  return $namaFileBaru;

}

if(isset($_POST['kirim'])){
 
 // cek apakah data berhasil ditambahkan atau tidak
  if( tambah($_POST) > 0 ) {
    echo "
    <script>
      alert('Pengaduan Berhasil Dikirim!');
      document.location.href = '../riwayat_laporan.php';
    </script> 

    ";
   } else {
     echo "
    <script>
      alert('Pengaduan Gagal Dikirim!');
      document.location.href = 'pengaduan.php';
    </script> 

    ";
   }
 }
?>


<script type="text/javascript" src="http://localhost/pengaduan_masyarakat/backend/lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script src="http://localhost/pengaduan_masyarakat/backend/lib/advanced-form-components.js"></script>
