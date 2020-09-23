<?php 
$conn = mysqli_connect('localhost','root','','pengaduan_masyarakat');
$berita= mysqli_query($conn, "SELECT * FROM tbl_berita where id_berita = 1");
$data = mysqli_fetch_assoc($berita);


function hapus($id_berita) {
  $conn = mysqli_connect('localhost','root','','pengaduan_masyarakat');
  mysqli_query($conn, "DELETE FROM tbl_berita WHERE id_berita = '$id_berita'");
  return mysqli_affected_rows($conn);
}

$id_berita = $_GET["id_berita"];
if( hapus($id_berita) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus')
        document.location.href = '../berita.php';
        </script>
  ";
} else {
  echo "
        <script>
        alert('data gagal dihapus')
        document.location.href = '../berita.php';
        </script>
  ";
}
