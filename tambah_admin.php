<form action ="tambah_admin.php" method="POST">
Id Posko
<select class="form-control" name="id_posko">
<option></option>
<?php 
include "koneksi.php"; 
$query = "select id_posko, nama_posko from posko";
$tambah_admin = mysqli_query($kon, $query);

 while ($tambah = mysqli_fetch_array($tambah_admin))
 {
	 $idAdmin = $tambah['id_posko'];
	 $namaAdmin = $tambah['nama_posko'];
	 
	 echo "<option value='".$idAdmin."'>".$namaAdmin."</option>";
 }
?>
</select><br/><br/>
Username : <input type="text" class="form-control" name="username"><br/>
Password : <input type="password" class="form-control" name="password"><br/>
 <button type="submit" class="btn btn-danger">Simpan</button>