<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
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
	  
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Laporan kategori umur per posko
        </a>
		<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
		<?php
		include "koneksi.php";
		
		$wilayah = "select id_posko, nama_posko from posko";
		$cari = mysqli_query($kon, $wilayah);

		while ($tampil = mysqli_fetch_array($cari))	
			{
			$nama_posko=$tampil['nama_posko'];
			
		
       echo "<a class='dropdown-item' href='laporan_ngusi_per_.php?id_posko=".$tampil['id_posko']."' value='".$tampil['nama_posko']."'>$nama_posko</a>";
		         
?>			
<?php
			}
?></nav>
<table class="table table-hover">
<tr>
<th>Nama</th>
<th>Nama Posko</th>
<th>Tanggal Masuk</th>
<th>Lama Menggungsi</th>
</tr>
<?php 
include "koneksi.php";

$cari = "SELECT nama, posko.nama_posko, tanggal_masuk_posko , CURDATE(), DATEDIFF (CURDATE(), tanggal_masuk_posko) AS 'lama_mengungsi'
FROM pengungsi JOIN posko ON posko.id_posko = pengungsi.id_posko";
$muncul = mysqli_query($kon, $cari);

while ($tampil = mysqli_fetch_array($muncul)) {
	$nama = $tampil ['nama'];
	$nama_posko = $tampil['nama_posko'];
	$tanggal_masuk_posko = $tampil['tanggal_masuk_posko'];
	$lama_mengungsi = $tampil ['lama_mengungsi'];
	
	echo "
	<tr>
	<td>$nama</td>
	<td>$nama_posko</td>
	<td>$tanggal_masuk_posko</td>
	<td>$lama_mengungsi Hari</td>
	
	</tr>";
}


?>

