<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<table class="table table-border">
<tr>
<th>Id Pengungsi</th>
<th>Nama</th>
<th>Nama Posko</th>
<th>Aksi</th>
</tr>
<?php
include "koneksi.php";

$queen = "SELECT id_pengungsi, nama, posko.nama_posko,  
pengungsi.alamat, tanggal_masuk_posko
FROM pengungsi
JOIN posko ON posko.id_posko = pengungsi.id_posko";

$query = mysqli_query($kon, $queen);

while ($tampil = mysqli_fetch_array ($query)) {
	$id_pengungsi = $tampil['id_pengungsi'];
	$nama 		  = $tampil['nama'];
	$nama_posko   = $tampil['nama_posko'];

	echo " 
	<tr>
	<td>$id_pengungsi</td>
	<td>$nama</td>
	<td>$nama_posko</td>
	<td><a href='edit_riwayat_posko.php?id_pengungsi=".$tampil['id_pengungsi']."'>Edit</a></td>
	</tr>";
	}
?>