<?php 
$conn = mysqli_connect('localhost','root','','pengaduan_masyarakat');
$query= mysqli_query($conn, "SELECT * FROM tbl_galeri where id_galeri = 1");
$galeri = mysqli_fetch_assoc($query);


function hapus($id) {
  $conn = mysqli_connect('localhost','root','','pengaduan_masyarakat');
  mysqli_query($conn, "DELETE FROM tbl_galeri WHERE id_galeri = '$id'");
  return mysqli_affected_rows($conn);
}

$id = $_GET["id_galeri"];
if( hapus($id) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus')
        document.location.href = '../galeri.php';
        </script>
  ";
} else {
  echo "
        <script>
        alert('data gagal dihapus')
        document.location.href = '../galeri.php';
        </script>
  ";
}
