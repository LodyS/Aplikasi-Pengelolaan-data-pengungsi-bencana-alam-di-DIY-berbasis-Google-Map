<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<div>
<table class="table table-hover">
<tr>
<th>Id Pengungsi</th>
<th>Nama</th>
<th>Nama Posko</th>
<th>Id Posko</th>
</tr>
<?php
include "koneksi.php";

$id_pengungsi = $_GET['id_pengungsi'];

$queen = "SELECT id_pengungsi, pengungsi.id_posko,  nama, posko.nama_posko,  
				pengungsi.alamat, tanggal_masuk_posko
						FROM pengungsi
					JOIN posko ON posko.id_posko = pengungsi.id_posko
						where id_pengungsi='$id_pengungsi'";
$query = mysqli_query($kon, $queen);

			while ($tampil = mysqli_fetch_array ($query)) {
					$id_pengungsi = 	$tampil ['id_pengungsi'];
					$nama 		  = 	$tampil ['nama'];
					$nama_posko   = 	$tampil['nama_posko'];
					$id_posko 	  = 	$tampil['id_posko'];
	//$no++;
					echo "<tr>
						<td>$id_pengungsi</td>
						<td>$nama</td>
	                    <td>$nama_posko</td>
						<td>$id_posko</td>
						</tr>";
					}
?>
</table>
</div>
<br/><br/><br/><br/>

<form action="update_riwayat_posko.php" method="post">

<div class="col-sm-3">
&nbsp;&nbsp;Id Pengungsi : <input type="text" class="form-control" name="id_pengungsi" value="<?php echo $id_pengungsi; ?>"></div></div>
<br/><br/>
 &nbsp;&nbsp;Posko Tujuan :
 <div class="col-sm-3">
<select class="form-control" name="posko_tujuan">
<option></option>
<?php
$some = "SELECT posko.id_posko, kapasitas_posko, 
     CASE 
WHEN COUNT(pengungsi.nama) < kapasitas_posko THEN 'Masih bisa ditambah pengungsi'
WHEN COUNT(pengungsi.nama) >= kapasitas_posko THEN 'Posko sudah penuh'
END AS status_posko
     FROM posko 
JOIN pengungsi ON pengungsi.id_posko = posko.id_posko     
     WHERE posko.id_posko <> '$id_pengungsi' 
GROUP BY id_posko
HAVING COUNT(pengungsi.nama) < kapasitas_posko;";
$query = mysqli_query($kon, $some);

while ($tampil = mysqli_fetch_assoc ($query)){
	echo "<option value='".$tampil['id_posko']."'>".$tampil['id_posko']."</option>";

}
?>
</select>
<br/><br/>

Tanggal Pindah :
  <input type="date" name="tanggal_pindah">
  <br/><br/>
  Posko Asal :
  <input type="text" class="form-control" name="posko_asal" value="<?php echo $id_posko; ?>">
  <br/><br/>
  Alasan :
  <input type="text" class="form-control" name="alasan"><br/>
  
  
  <button type="submit" class="btn btn-danger">Simpan</button>