<?php
include "koneksi.php";
$search = $_POST['cari_pengungsi'];

$query = "SELECT nama, posko.nama_posko, posko.lokasi, tanggal_masuk_posko FROM pengungsi
			JOIN posko ON posko.id_posko = pengungsi.id_posko
			where nama like '%".$search."%'";
$oke = mysqli_query($kon, $query);

		while ($row = mysqli_fetch_array($oke)){
			$nama				 =$row['nama'];
			$nama_posko			 =$row['nama_posko'];
			$alamat				 =$row['lokasi'];
			$tanggal_masuk_posko =$row['tanggal_masuk_posko'];
	
			echo "<tr id='tampil'>
					<td>$nama</td>
					<td>$nama_posko</td>
					<td>$alamat</td>
					<td>$tanggal_masuk_posko</td>";
?>
			
	<?php		
		}
		?>