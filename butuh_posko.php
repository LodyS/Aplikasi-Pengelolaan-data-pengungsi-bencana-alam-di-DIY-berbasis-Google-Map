<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<table class="table table-hover">
<tr>
<th>Nama</th>
<th>Sakit</th>
</tr>
<?php
include "koneksi.php";

$kebutuhan = $_GET['kebutuhan'];
$posko 	   = $_GET['posko'];

$posko = "SELECT nama, riwayat_sakit.nama_penyakit AS sakit
FROM pengungsi 
JOIN riwayat_sakit ON riwayat_sakit.id_riwayat_sakit = pengungsi.id_riwayat_sakit
JOIN posko ON posko.id_posko = pengungsi.id_posko
JOIN kebutuhan_khusus ON kebutuhan_khusus.id_kebutuhan = pengungsi.id_kebutuhan WHERE kebutuhan_khusus.kebutuhan = '$kebutuhan' AND posko.nama_posko 
= '$posko'";
$query = mysqli_query($kon, $posko);

while ($tampil = mysqli_fetch_array ($query))
	{
	$nama=$tampil['nama'];
	$sakit=$tampil['sakit'];
	
	echo "
	<tr>
	<td>$nama</td>
	<td>$sakit</td>";
	}
	?>