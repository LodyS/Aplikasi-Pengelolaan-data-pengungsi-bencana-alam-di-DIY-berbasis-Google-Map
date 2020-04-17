<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>-->
  <script src="jquery-3.4.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><b style="font-family:inherent">SIG Posko Bencana Yogyakarta</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

     
    
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="?m=posko_list"><span class="glyphicon glyphicon-map-marker">Posko <span class="sr-only">(current)</span></a></i></li>
	  
	<li class="nav-item active">
        <a class="nav-link" href="?m=login"><span class="glyphicon glyphicon-info-sign">Login <span class="sr-only">(current)</span></a></li>
	  
  
	  
	  
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <b style="font-family:inherent">Laporan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="laporan_pengungsi.php"><b style="font-family:inherent">Distribusi jumlah pengungsi</a>
          <a class="dropdown-item" href="laporan_sakit.php"><b style="font-family:inherent">Riwayat Sakit</a>
		       <a class="dropdown-item" href="laporan_riwayat_pengungsi.html"><b style="font-family:inherent">Riwayat Posko Pengungsi</a>
		  
		 
		  
         
      </li></ul>
	  <form action="" method="get">
   <form class="form-inline my-2 my-lg-0">
     <input class="form-control mr-sm-2" name="cari_pengungsi" type="search" placeholder="Ketikkan nama" aria-label="Search">
	 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari pengungsi</button>
	  </div>
</nav>
<h3>Daftar Pencarian nama pengungsi</h3>
<table class="table table-hover">
<tr>
<th>Nama</th>
<th>Nama Posko</th>
<th>Alamat</th>
<th>Tanggal Masuk Posko</th>
</tr>
<?php

include "koneksi.php";


$cari_pengungsi = $_GET['cari_pengungsi'];

$cari = "SELECT nama, posko.nama_posko, posko.lokasi, tanggal_masuk_posko FROM pengungsi
JOIN posko ON posko.id_posko = pengungsi.id_posko
WHERE nama like '%".$cari_pengungsi."%'";
$query = mysqli_query($kon, $cari);

while ($tampil = mysqli_fetch_array($query))
{
	$nama				 =$tampil['nama'];
	$nama_posko			 =$tampil['nama_posko'];
	$alamat				 =$tampil['lokasi'];
	$tanggal_masuk_posko =$tampil['tanggal_masuk_posko'];
	
	echo "<tr>
	<td>$nama</td>
	<td>$nama_posko</td>
	<td>$alamat</td>
	<td>$tanggal_masuk_posko</td>";
}	
?>