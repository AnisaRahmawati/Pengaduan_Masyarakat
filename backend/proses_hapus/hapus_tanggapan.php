<?php 
$conn = mysqli_connect('localhost','root','','pengaduan_masyarakat');
$result1= mysqli_query($conn, "SELECT * FROM tbl_pengaduan WHERE id_pengaduan = 1");
$pengaduan = mysqli_fetch_assoc($result1);


function hapus($id) {
  $conn = mysqli_connect('localhost','root','','pengaduan_masyarakat');
  mysqli_query($conn, "DELETE FROM tbl_pengaduan WHERE id_pengaduan = '$id'");
  return mysqli_affected_rows($conn);
}

$id = $_GET["id"];
if( hapus($id) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus')
        document.location.href = '../pengaduan_baru.php';
        </script>
  ";
} else {
  echo "
        <script>
        alert('data gagal dihapus')
        document.location.href = '../pengaduan_baru.php';
        </script>
  ";
}
