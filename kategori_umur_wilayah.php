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
            <a class="dropdown-item" href="laporan_riwayat_pengungsi.php">Laporan Riwayat Posko Pengungsi</a>
        </div>
      </li>
	  

        </div>
      </li>
	  </ul>
	  </div>
	  </nav>
<table class="table table-hover">
<tr>
<th>Nama</th>
<th>Nama Posko</th>
<th>Tanggal lahir</th>
<th>Umur</th>
<th>Kategori umur</th>
</tr>
<?php
$id_posko = $_GET['id_posko'];
include "koneksi.php";
$umur ="SELECT nama, posko.nama_posko, tanggal_lahir , YEAR(CURDATE()) - YEAR(tanggal_lahir) AS 'Umur',
CASE 
WHEN YEAR(CURDATE()) - YEAR(tanggal_lahir) BETWEEN 0  AND 13 THEN 'Anak-Anak'
WHEN YEAR(CURDATE()) - YEAR(tanggal_lahir) BETWEEN 14 AND 18 THEN 'Pemuda'
WHEN YEAR(CURDATE()) - YEAR(tanggal_lahir) BETWEEN 19 AND 30 THEN 'Remaja'
WHEN YEAR(CURDATE()) - YEAR(tanggal_lahir) BETWEEN 21 AND 30 THEN 'Pemuda'
WHEN YEAR(CURDATE()) - YEAR(tanggal_lahir) BETWEEN 31 AND 60 THEN 'Dewasa'
WHEN YEAR(CURDATE()) - YEAR(tanggal_lahir)  >= 61 THEN 'Lansia'
END AS kategori_umur
FROM pengungsi JOIN posko ON posko.id_posko = pengungsi.id_posko where posko.id_posko='$id_posko'";

$rentang = mysqli_query ($kon, $umur);

while ($tampil = mysqli_fetch_array($rentang))
{
	$nama=$tampil['nama'];
	$nama_posko=$tampil['nama_posko'];
	$tanggal_lahir=$tampil['tanggal_lahir'];
	$umur = $tampil['Umur'];
	$kategori_umur=$tampil['kategori_umur'];
	echo "<tr>
	<td>$nama</td>
	<td>$nama_posko</td>
	<td>$tanggal_lahir</td>
	<td>$umur</td>
	<td>$kategori_umur</td>
	";
}
?>
</table>