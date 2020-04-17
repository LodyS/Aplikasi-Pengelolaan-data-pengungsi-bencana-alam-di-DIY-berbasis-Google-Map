<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
<table class="table table-hover">
<tr>
<th>Nama Pengungsi</th>
<th>Tanggal Pindah</th>
<th>Posko Baru</th>
<th>Posko Asal</th>
<th>Alasan</th>
<th>Status Kepindahan</th>
</tr>

<?php
include "koneksi.php";

$riwayat ="SELECT pengungsi.nama, tanggal_pindah, posko.nama_posko AS posko_baru, 
CASE posko_asal
WHEN '1341' THEN 'Wilayah 1'
WHEN '1342' THEN 'Wilayah 2'
WHEN '1343' THEN 'Wilayah 3'
WHEN '1344' THEN 'Wilayah 4'
WHEN '1345' THEN 'Wilayah 5'
END AS posko_asal, alasan, status
FROM riwayat_posko_pengungsi
JOIN posko ON posko.id_posko = riwayat_posko_pengungsi.posko_tujuan
JOIN pengungsi ON pengungsi.id_pengungsi = riwayat_posko_pengungsi.id_pengungsi where status <> 'Diproses'";

$lihat = mysqli_query($kon, $riwayat); 
	while ($tampil_riwayat = mysqli_fetch_array($lihat))
{
	$nama       			= $tampil_riwayat['nama'];
	$tanggal_pindah			= $tampil_riwayat['tanggal_pindah'];
	$posko_baru				= $tampil_riwayat['posko_baru'];
	$posko_asal				= $tampil_riwayat['posko_asal'];
	$alasan					= $tampil_riwayat['alasan'];
	$status      			= $tampil_riwayat['status'];


echo "<tr>
	  <td>$nama</td>
	  <td>$tanggal_pindah</td>
	  <td>$posko_baru</td>
	  <td>$posko_asal</td>
	  <td>$alasan</td>
	  <td>$status</td>
	  </tr>";
}
?>
</table>