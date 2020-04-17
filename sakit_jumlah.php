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
          <a class="dropdown-item" href="laporan_pengungsi.php">Laporan Distribusi Pengungsi</a>
          <a class="dropdown-item" href="sakit_jumlah.php">Laporan Riwayat Sakit</a>
            <a class="dropdown-item" href="#">Laporan Riwayat Posko Pengungsi</a>
			
        </div>
      </li>
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Cari per posko
        </a>
		<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
		<?php
		include "koneksi.php";
		
		$wilayah = "select id_posko, nama_posko from posko";
		$cari = mysqli_query($kon, $wilayah);

		while ($tampil = mysqli_fetch_array($cari))	
			{
			$nama_posko=$tampil['nama_posko'];
			
		
       echo "<a class='dropdown-item' href='sakit_per_posko.php?id_posko=".$tampil['id_posko']."' value='".$tampil['nama_posko']."'>$nama_posko</a>";
		         
?>			
<?php
			}
?>
       </div>
		
	
      </li>
	  </ul>
	  </div>
	  </nav>
	  
<table class="table table-class">
<tr>
<th>Nama Penyakit</th>
<th>Jumlah</th>
</tr>
<?php
include "koneksi.php";
$sakit = "SELECT pengungsi.id_posko,riwayat_sakit.id_riwayat_sakit, nama_penyakit, COUNT(pengungsi.id_riwayat_sakit) AS jumlah FROM riwayat_sakit 
JOIN pengungsi ON pengungsi.id_riwayat_sakit = riwayat_sakit.id_riwayat_sakit 
GROUP BY pengungsi.id_riwayat_sakit"; 
$query = mysqli_query($kon, $sakit);

while ($tampil = mysqli_fetch_assoc($query))
	{
	$id_posko = $tampil['id_posko'];
	$id_riwayat_sakit=$tampil['id_riwayat_sakit'];
	$nama_penyakit=$tampil['nama_penyakit'];
	$jumlah=$tampil['jumlah'];
	
	echo "
	<tr>
	<td>$nama_penyakit</td>
	<td><a href='sakit_per_posko.php?id_riwayat_sakit=".$tampil['id_riwayat_sakit']."'>$jumlah</td></tr>
	";
	}
?>