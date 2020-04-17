<?php
session_start();		
					$query = "SELECT admin.id_posko, COUNT(pengungsi.nama) 
	AS jumlah_pengungsi, nama_posko, lat, lng ,kapasitas_posko FROM posko
JOIN pengungsi ON pengungsi.id_posko = posko.id_posko 
JOIN admin ON admin.id_posko = posko.id_posko
WHERE username = '$username'";


				$oke = mysqli_query($kon, $query);
		   while ($tampil = mysqli_fetch_array($oke))
		   {
			  
			  $id_posko=$tampil['id_posko'];
			  $jumlah_pengungsi= $tampil['jumlah_pengungsi'];
			  $lat=$tampil['lat'];
			  $lng=$tampil['lng'];
			  $nama_posko=$tampil['nama_posko'];
				echo 
					"<tr>
					<td>$nama_posko<br/></td>
					<td>$jumlah_pengungsi</td>
					
				
					</tr>";
					}
?>