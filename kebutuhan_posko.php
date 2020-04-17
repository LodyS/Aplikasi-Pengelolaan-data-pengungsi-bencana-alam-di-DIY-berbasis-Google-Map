<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<table class="table table-hover">
<tr>
<th>Nama Posko</th>
<th>Total</th>
</tr>
<?php
include "koneksi.php";

$kebutuhan = $_GET['kebutuhan'];

$posko1 = "SELECT posko.nama_posko AS posko, COUNT(kebutuhan_khusus.kebutuhan) AS total 
FROM pengungsi 
JOIN riwayat_sakit ON riwayat_sakit.id_riwayat_sakit = pengungsi.id_riwayat_sakit
JOIN posko ON posko.id_posko = pengungsi.id_posko
JOIN kebutuhan_khusus ON kebutuhan_khusus.id_kebutuhan = pengungsi.id_kebutuhan WHERE kebutuhan_khusus.kebutuhan = '$kebutuhan'
GROUP BY posko;";
$query = mysqli_query($kon, $posko1);

while ($tampil = mysqli_fetch_array($query))
	{
	$posko=$tampil['posko'];
	$total=$tampil['total'];
	
	
	echo "<tr>
	<td><a href='butuh_posko.php?posko=".$tampil['posko']."&kebutuhan=$kebutuhan'>$posko</td>
	<td>$total</td>";
	}
	
	?>