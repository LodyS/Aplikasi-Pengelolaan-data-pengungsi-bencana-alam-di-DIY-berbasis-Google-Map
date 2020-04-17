<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
 
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="?m=posko_list"><span class="glyphicon glyphicon-map-marker">Posko <span class="sr-only">(current)</span></a></i></li>
	  

	  
  
	  
	  
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <b style="font-family:inherent">Laporan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="kategoriUmur.php"><b style="font-family:inherent">Rentang Umur</a>
          <a class="dropdown-item" href="sakit_jumlah.php"><b style="font-family:inherent">Riwayat Sakit</a>
		       <a class="dropdown-item" href="laporan_riwayat_pengungsi.html"><b style="font-family:inherent">Kebutuhan khusus Pengungsi</a>
		  
		 
		  
         
      </li>
	
	  	 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <b style="font-family:inherent">Input data
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="laporan_pengungsi.php"><b style="font-family:inherent">Input pengungsi</a>
          <a class="dropdown-item" href="laporan_sakit.php"><b style="font-family:inherent">Input kebutuhan</a>
		       <a class="dropdown-item" href="laporan_riwayat_pengungsi.html"><b style="font-family:inherent">Input riwayat sakit</a>
		  
		 
		  </li>
		    
      </li>
	  </ul>

         
     
	  
	  
  
  </div>
</nav>
<h3>Informasi Rentang Umur Pengungsi semua Posko bencana DIY</h3>
<table class="table table-hover">
<tr>
<th>Kategori Umur</th>
<th>Jumlah</th>
<?php
include "koneksi.php";

$umur ="SELECT 
CASE
WHEN YEAR(CURDATE()) - YEAR(tanggal_lahir) BETWEEN '0' AND '20' THEN '0 - 20'
WHEN YEAR(CURDATE()) - YEAR(tanggal_lahir) BETWEEN '21' AND '60' THEN '21 - 60'
WHEN YEAR(CURDATE()) - YEAR(tanggal_lahir) > 60 THEN 'Lansia'
END AS kategori_umur, COUNT(*) AS jumlah
FROM (SELECT tanggal_lahir FROM pengungsi) u GROUP BY kategori_umur;";
$query = mysqli_query($kon, $umur);


while ($tampil = mysqli_fetch_array($query))
	{
	$kategori_umur=$tampil['kategori_umur'];
	$jumlah=$tampil['jumlah'];
	
	echo "<tr>";
	echo "<td>$kategori_umur</td>";
	echo "<td>$jumlah<td/></tr>";
	}
	?></table>
	    
	