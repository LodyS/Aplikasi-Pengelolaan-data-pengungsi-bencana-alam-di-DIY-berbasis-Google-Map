<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">SIG Posko Bencana Alam Yogyakarta</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        
		
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		
      </li>
 
  
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Laporan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Laporan Distribusi Pengungsi</a>
          <a class="dropdown-item" href="laporan_sakit.php">Laporan Riwayat Sakit</a>
            <a class="dropdown-item" href="#">Laporan Riwayat Posko Pengungsi</a>
        </div>
      </li>
	  </nav>
<?php
include "koneksi.php";

$id_pengungsi = $_GET['id_pengungsi'];

$konfirmasi = "SELECT pengungsi.id_pengungsi, pengungsi.nama, posko_asal, posko_tujuan FROM riwayat_posko_pengungsi 
JOIN pengungsi ON  riwayat_posko_pengungsi.id_pengungsi = pengungsi.id_pengungsi
WHERE pengungsi.id_pengungsi = '$id_pengungsi'";
$query = mysqli_query($kon, $konfirmasi);

while ($tampil = mysqli_fetch_array($query))
 {
	$id_pengungsi=$tampil['id_pengungsi'];
	$nama=$tampil['nama'];
	$posko_asal=$tampil['posko_asal'];
	$posko_tujuan=$tampil['posko_tujuan'];



 }
?>
<form action="konfirmasi.php" method="POST">
<div class="col-sm-3">
Id Pengungsi <input type="text" class="form-control" name="id_pengungsi" value="<?php echo $id_pengungsi; ?>"><br/></div>
<div class="col-sm-3">
Posko Tujuan <input type="text" class="form-control" name="posko_tujuan" value="<?php echo $posko_tujuan; ?>"><br/></div>
<div class="col-sm-3">
Status : <button type="submit" 	class="form-control" class="btn btn-primary" name="Diterima">Diterima</a></div>
</form>
<form action="tolak_pengungsi.php" method="POST">
<input type="hidden" name="id_pengungsi" value="<?php echo $id_pengungsi; ?>"><br/>
</form>