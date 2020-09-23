<?php 
$conn = mysqli_connect('localhost','root','','pengaduan_masyarakat');
$masyarakat= mysqli_query($conn, "SELECT * FROM tbl_masyarakat where id_masyarakat = 1");
$warga = mysqli_fetch_assoc($masyarakat);


function hapus($nik) {
  $conn = mysqli_connect('localhost','root','','pengaduan_masyarakat');
  mysqli_query($conn, "DELETE FROM tbl_masyarakat WHERE id_masyarakat = '$id_masyarakat'");
  return mysqli_affected_rows($conn);
}

$nik = $_GET["id_masyarakat"];
if( hapus($nik) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus')
        document.location.href = '../data_masyarakat.php';
        </script>
  ";
} else {
  echo "
        <script>
        alert('data gagal dihapus')
        document.location.href = '../data_masyarakat.php';
        </script>
  ";
}
