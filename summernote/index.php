<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Pengaduan Masyarakat</title>
	  <!-- Required meta tags -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost/pengaduan_masyarakat/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_masyarakat/summernote/summernote.css">
    
    <link rel="stylesheet" type="text/css" href="http://localhost/pengaduan_masyarakat/fontawesome-free/css/all.min.css">
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
<script src="http://localhost/pengaduan_masyarakat/bootstrap/js/jquery.js"></script>

<script src="http://localhost/pengaduan_masyarakat/bootstrap/js/bootstrap.js"></script>
<link href="summernote.css" rel="stylesheet">
<script src="summernote.js"></script>

  <!-- Libraries CSS Files -->
  <link href="http://localhost/pengaduan_masyarakat/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="http://localhost/pengaduan_masyarakat/lib/animate/animate.min.css" rel="stylesheet">
  <link href="http://localhost/pengaduan_masyarakat/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="http://localhost/pengaduan_masyarakat/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="http://localhost/pengaduan_masyarakat/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="http://localhost/pengaduan_masyarakat/css/style.css" rel="stylesheet">



	<link href="bootstrap.css" rel="stylesheet">
	<script src="jquery.js"></script>
	<script src="bootstrap.js"></script>
	<link href="summernote.css" rel="stylesheet">
	<script src="summernote.js"></script>
</head>

<body>

  <header id="header">

    <div id="topbar">
      <!-- Sosmed SMK -->
       <div class="container">
        <div class="social-links">
          <a href="https://www.facebook.com/" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="https://api.whatsapp.com/" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
          <a href="https://instagram.com/" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="container">

      <nav class="main-nav pull-right d-none d-lg-block">
        <ul>
         
          <li><a href="../index.php">Kembali</a></li>
          <li><a href="profil.php"><i class="fa fa-user"></i> Profil</a></li>         
         
        </ul>
      </nav>   
    </div>
  </header><!-- #header -->
    <main id="main">


<section>
  <div class="container">
    <div class="col-md-12"><br>
  
    <header class="section-header">
      <h3>Laporkan Pengaduan</h3><br>
    </header>

<div class="form">
<form action="" method="post" enctype="multipart/form-data">
 
<div class="form-group ">
  <label class="control-label col-lg-2">Tanggal Pengaduan</label>

<div class="col-lg-10">
  <input class=" form-control" name="tgl_pengaduan" minlength="2" type="date" required />
  <br>
  </div>
</div>


<div class="form-group ">
  <label class="control-label col-lg-2">Foto</label>

<div class="col-lg-10">
   <img src="../img/<?= $laporan['foto']; ?>">
    <input type="file" name="foto">
    <br>
  </div>
</div>

<div class="form-group ">
  <label class="control-label col-lg-2">Isi Laporan</label>

<div class="col-lg-10">
  <textarea type="text" name="isi" class="form-control" id="editor"></textarea>
  </div>
</div>
          
  
<div class="form-group">
  <div class="col-lg-offset-2 col-lg-10">
    <button class="btn btn-info" type="submit" name="kirim">Kirim</button>
    <button class="btn btn-danger" type="reset">Reset</button>
  </div>
</div>
      </from>
    </div>

  </div>

	</div>

  </div>
</div>
</section>

	<script>
		$(document).ready(function(){
			$('#editor').summernote({
				height:200,
				
			});
		});

	</script>

</html>