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
			     <a class="dropdown-item" href="laporan_sakit.php"><b style="font-family:inherent">Riwayat Diagram Sakit</a>
		  <a class="dropdown-item" href="diagramUmur.php"><b style="font-family:inherent">Diagram Rentang Umur</a>
		
		<?php
		 include "koneksi.php";
		
			$username = $_POST['username'];
			$password = $_POST['password'];

			$posko = "select id_posko from admin where username='$username' and password='$password'";
			$ekse = mysqli_query($kon, $posko);

	while ($tampil= mysqli_fetch_array($ekse))
		{
		$id_posko=$tampil['id_posko'];
		echo " <a class='dropdown-item' href='riwayatPengungsi.php?id_posko=".$tampil['id_posko']."'><b style='font-family:inherent'>Laporan Riwayat Posko Pengungsi</a>";
		}
		?>
	</li>
	
	  	 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <b style="font-family:inherent">Input data
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="laporan_pengungsi.php"><b style="font-family:inherent">Input pengungsi</a>
          <a class="dropdown-item" href="laporan_sakit.php"><b style="font-family:inherent">Input kebutuhan</a>
		       <a class="dropdown-item" href="laporan_riwayat_pengungsi.php"><b style="font-family:inherent">Input riwayat sakit</a>
			         <a class="dropdown-item" href="tambah_posko.php"><b style="font-family:inherent">Input posko</a>
		  </li>
		     </li>
	  </ul>
<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="logout.php"><span class="glyphicon glyphicon-map-marker">Log Out <span class="sr-only">(current)</span></a></i></li>
         
     
  </div>
</nav>
  <h3>Laporan status perpindahan pengungsi posko <?php 
		include "koneksi.php";
			$id_posko = $_GET['id_posko'];
			$pos = "select nama_posko from posko where id_posko='$id_posko'";
			$q = mysqli_query($kon, $pos);
  
				while ($tam = mysqli_fetch_array($q))
					{
					$nama_posko=$tam['nama_posko'];
					echo $nama_posko;
					}
					?>
<table class="table table-hover">
<tr>
<th>Nama Pengungsi</th>
<th>Tanggal Pindah</th>
<th>Posko Tujuan</th>
<th>Alasan</th>
<th>Status Kepindahan</th>
</tr>

<?php
include "koneksi.php";

$id_posko = $_GET['id_posko'];
$riwayat ="SELECT pengungsi.nama, tanggal_pindah, posko.nama_posko AS posko_baru, 
CASE posko_asal
WHEN '1341' THEN 'Wilayah 1'
WHEN '1342' THEN 'Wilayah 2'
WHEN '1343' THEN 'Wilayah 3'
WHEN '1344' THEN 'Wilayah 4'
WHEN '1345' THEN 'Wilayah 5'
END AS posko_asal, alasan, status
FROM riwayat_posko_pengungsi
JOIN posko ON posko.id_posko = riwayat_posko_pengungsi.posko_tujuan
JOIN pengungsi ON pengungsi.id_pengungsi = riwayat_posko_pengungsi.id_pengungsi 
where riwayat_posko_pengungsi.posko_asal ='$id_posko'
order by tanggal_pindah desc";

$lihat = mysqli_query($kon, $riwayat); 
	while ($tampil_riwayat = mysqli_fetch_array($lihat))
{
	$nama       			= $tampil_riwayat['nama'];
	$tanggal_pindah			= $tampil_riwayat['tanggal_pindah'];
	$posko_baru				= $tampil_riwayat['posko_baru'];
	$alasan					= $tampil_riwayat['alasan'];
	$status      			= $tampil_riwayat['status'];


echo "<tr>
	  <td>$nama</td>
	  <td>$tanggal_pindah</td>
	  <td>$posko_baru</td>
	  <td>$alasan</td>
	  <td>$status</td>
	  </tr>";
}
?>
</table>