<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<table class="table table-hover">
<tr>
<th>Kebutuhan</th>
<th>Total</th>
</tr>
<?php
include "koneksi.php";

$sakit = "SELECT kebutuhan_khusus.kebutuhan AS kebutuhan, COUNT(kebutuhan_khusus.kebutuhan) AS total  FROM pengungsi 
JOIN riwayat_sakit ON riwayat_sakit.id_riwayat_sakit = pengungsi.id_riwayat_sakit
JOIN posko ON posko.id_posko = pengungsi.id_posko
JOIN kebutuhan_khusus ON kebutuhan_khusus.id_kebutuhan = pengungsi.id_kebutuhan GROUP BY  kebutuhan";
$query = mysqli_query($kon, $sakit);

while ($tampil = mysqli_fetch_array($query))
	{
	
	$kebutuhan=$tampil['kebutuhan'];
	$total=$tampil['total'];
	
	echo "
	<tr>
	<td>$kebutuhan</td>
	<td><a href='kebutuhan_posko.php?kebutuhan=".$tampil['kebutuhan']."'>$total</td></tr>
	";
	}
?>
</table>