 <?php 
include "koneksi.php";
$id_pengaduan = $_GET['id_pengaduan'];
if (!isset($_POST['status'])) {


$update = mysqli_query($koneksi, "UPDATE tbl_pengaduan SET status = 'selesai' WHERE id_pengaduan = $id_pengaduan");

if($update) {
  echo "
  <script>
      alert('Pengaduan Berhasil Diselesaikan!');
      document.location.href = 'pengaduan_selesai.php';
    </script> 

    ";
} else {
   echo "
    <script>
      alert('Pengaduan Gagal Diselesaikan!');
      document.location.href = 'pengaduan_proses.php';
    </script> 

    ";
} 
}

?>