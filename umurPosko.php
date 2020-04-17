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
			  <a class="dropdown-item" href="sakit_jumlah.php">Laporan Riwayat Sakit Posko Pengungsi</a>
			
        </div>
      </li>
 
	  </ul>
	  </div>
	  </nav>

<table class="table table-hover">
<tr>
<th>Nama</th>
<th>Umur</th>
<th>Nama Posko</th>
</tr>

<?php
include "koneksi.php";
$kategori_umur = $_GET['kategori_umur'];
$id_posko 	   = $_GET['id_posko'];

$posko = "SELECT nama, YEAR(CURDATE()) - YEAR(tanggal_lahir) AS umur,
nama_posko FROM pengungsi JOIN  posko  ON posko.id_posko = pengungsi.id_posko WHERE kategori_umur = '$kategori_umur' and posko.id_posko = '$id_posko' ";
$cariUmur = mysqli_query($kon, $posko);


while ($tampil = mysqli_fetch_array($cariUmur))	
	{
	$nama 			= $tampil['nama'];
	$umur 			= $tampil['umur'];
	//$kategori_umur 	= $tampil['kategori_umur'];
	$nama_posko 	= $tampil['nama_posko'];
	
	echo "
	<tr>
	<td>$nama</td>
	<td>$umur</td>
	<td>$nama_posko</td></tr>
	";
	}

?>