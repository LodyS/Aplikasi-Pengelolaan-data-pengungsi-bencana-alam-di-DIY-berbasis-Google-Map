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
<p><?php include "koneksi.php";
//$id_posko=$_GET['id_posko'];
//$cari_posko = "select nama_posko from posko where id_posko='$id_posko'";
//$query_posko = mysqli_query($kon, $cari_posko);

//while ($tampil_posko = mysqli_fetch_assoc($query_posko))
	//{
		//$nama_posko=$tampil_posko['nama_posko'];
		
		//echo "Distribusi riwayat sakit di : ".$nama_posko;
	//}
?>
<table class="table table-hover">
<tr>
<th>Nama Posko</th>
</tr>
<?php
include "koneksi.php";
$id_riwayat_sakit = $_GET['id_riwayat_sakit'];

$cari_sakit = "SELECT posko.id_posko, pengungsi.id_riwayat_sakit, posko.nama_posko FROM pengungsi 
JOIN posko ON posko.id_posko = pengungsi.id_posko
JOIN riwayat_sakit ON riwayat_sakit.id_riwayat_sakit = pengungsi.id_riwayat_sakit
WHERE riwayat_sakit.id_riwayat_sakit = '$id_riwayat_sakit' GROUP BY posko.nama_posko;;";
$query_sakit = mysqli_query($kon, $cari_sakit);


while ($tampil = mysqli_fetch_assoc($query_sakit))
	{
		$id_posko=$tampil['id_posko'];
	 $id_riwayat_sakit=$tampil['id_riwayat_sakit'];
	 $nama_posko=$tampil['nama_posko'];
	 //$jumlah=$tampil['jumlah'];
	
	 echo "
	 <tr>
	 <td><a href='pengungsi_sakit_per_posko.php?id_riwayat_sakit=".$tampil['id_riwayat_sakit']."&id_posko=$id_posko'>$nama_posko</a></td>
	 ";
	}
	?>