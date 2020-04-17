<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<table class="table table-hover">
<tr>
<th>Id Pengungsi</th>
<th>Nama</th>
<th>Posko Asal</th>
<th>Posko Tujuan</th>
<th>Konfirmasi</th>
</tr>
<?php
include "koneksi.php";
$id_pengungsi = $_GET['id_pengungsi'];

$konfirmasi = "SELECT pengungsi.id_pengungsi, pengungsi.nama, posko_asal, posko_tujuan FROM riwayat_posko_pengungsi 
JOIN pengungsi ON  riwayat_posko_pengungsi.id_pengungsi = pengungsi.id_pengungsi
WHERE STATUS = 'Diproses' and pengungsi.id_pengungsi='$id_pengungsi'";
$query = mysqli_query($kon, $konfirmasi);

while ($tampil = mysqli_fetch_array($query))
 {
	$id_pengungsi=$tampil['id_pengungsi'];
	$nama=$tampil['nama'];
	$posko_asal=$tampil['posko_asal'];
	$posko_tujuan=$tampil['posko_tujuan'];
	
	echo "
	<tr>
	<td>$id_pengungsi</td>
	<td>$nama</td>
	<td>$posko_asal</td>
	<td>$posko_tujuan</td>
	<td><a href='form_konfirmasi.php?id_pengungsi=".$tampil['id_pengungsi']."'>Konfirmasi</a></td>;";
 }
?>
</table>