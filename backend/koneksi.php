<?php

global $koneksi;

$namaserver = "localhost";
$username = "root";
$password = "";
$namadb = "pengaduan_masyarakat";

$koneksi = mysqli_connect($namaserver,$username,$password,$namadb);
if(!$koneksi) {
	die("Koneksi Gagal".mysqli_connect_error());
}
?>