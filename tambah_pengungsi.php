<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php include "koneksi.php"; ?><br/><br/>
<form action="inputPengungsi.php" method="POST">
<div class="col-sm-3">
Posko :<select class="form-control" name="id_posko">
<option></option>
<?php
$some = "SELECT id_posko,nama_posko FROM posko ";
$query = mysqli_query($kon, $some);

while ($tampil = mysqli_fetch_assoc ($query)){
	echo "<option value='".$tampil['id_posko']."'>".$tampil['nama_posko']."</option>";

}
?>
</select></div><br/>
<div class="col-sm-3">
Nama Pengungsi : <input type="text" class="form-control" name="nama"><br/>
Jenis Kelamin : 
<select class="form-control" name="jenis_kelamin">
<option></option>
<option value="L">Pria</option>
<option value="P">Wanita</option><br/></select><br/>

Tanggal lahir : <input type="date" name="tanggal_lahir"><br/><br/>
Alamat : <input type="text" class="form-control" name="alamat"><br/>
Tanggal masuk posko : <input type="date" name="tanggal_masuk_posko"><br/><br/>
Riwayat Sakit :
<select class="form-control" name="id_riwayat_sakit">
<option></option>
<?php
$some = "SELECT id_riwayat_sakit, nama_penyakit FROM riwayat_sakit";
$query = mysqli_query($kon, $some);

while ($tampil = mysqli_fetch_assoc ($query)){
	echo "<option value='".$tampil['id_riwayat_sakit']."'>".$tampil['nama_penyakit']."</option>";

}
?></select>
<br/>
Kebutuhan Khusus :
<select class="form-control" name="id_kebutuhan">
<option></option>
<?php
include "koneksi.php";
$need = "SELECT id_kebutuhan, kebutuhan FROM kebutuhan_khusus";
$q = mysqli_query($kon, $need);

while ($tampil = mysqli_fetch_assoc ($q)){
	echo "<option value='".$tampil['id_kebutuhan']."'>".$tampil['kebutuhan']."</option>";

}
?></select><br/>
<button type="submit" class="btn btn-danger" value="Simpan">Simpan</button>
