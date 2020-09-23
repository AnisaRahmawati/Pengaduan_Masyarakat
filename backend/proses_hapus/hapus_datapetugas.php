<?php 
$conn = mysqli_connect('localhost','root','','pengaduan_masyarakat');
$operator= mysqli_query($conn, "SELECT * FROM tbl_petugas where id_petugas = 1");
$petugas = mysqli_fetch_assoc($operator);


function hapus($id) {
  $conn = mysqli_connect('localhost','root','','pengaduan_masyarakat');
  mysqli_query($conn, "DELETE FROM tbl_petugas WHERE id_petugas = '$id'");
  return mysqli_affected_rows($conn);
}

$id = $_GET["id_petugas"];
if( hapus($id) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus')
        document.location.href = '../data_petugas.php';
        </script>
  ";
} else {
  echo "
        <script>
        alert('data gagal dihapus')
        document.location.href = '../data_petugas.php';
        </script>
  ";
}
