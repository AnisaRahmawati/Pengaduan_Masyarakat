<?php
require_once __DIR__ . '/vendor/autoload.php';
include "koneksi.php";
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan JOIN tbl_masyarakat ON tbl_pengaduan.nik = tbl_masyarakat.nik WHERE status = '0'");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html>
<head>
	
	<title>Cetak Data Pengaduan</title>
	
	
</head>
<body>

	<h1>Data Pengaduan Masyrakat</h1>

	<table border="1" cellpadding="10" cellspacing="0">

		<tr>
			<th>No.</th>
			<th>Tgl Pengaduan</th>
			<th>NIK</th>
			<th>Nama</th>
			<th>Foto</th>
			<th>Isi Laporan</th>
			<th>Status</th>
		</tr>';
		$i = 1;
		foreach ( $tampil as $row ) {
			$html .= '<tr>
				<td>'. $i++ .'</td>
				<td>'. $row["tgl_pengaduan"] .'</td>
				<td>'. $row["nik"] .'</td>
				<td>'. $row["nama"] .'</td>
				<td><img src="img/'. $row["foto"] .'" width="50"></td>
				<td>'. $row["isi_laporan"] .'</td>
				<td>Belum Ditanggapi</td>
			</tr>';
		}

$html .='</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('data-pengaduan.pdf', 'I');

?>


