<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
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
	  

	  
  
	  
	  
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <b style="font-family:inherent">Laporan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="kategoriUmur.php"><b style="font-family:inherent">Rentang Umur</a>
          <a class="dropdown-item" href="sakit_jumlah.php"><b style="font-family:inherent">Riwayat Sakit</a>
		       <a class="dropdown-item" href="laporan_riwayat_pengungsi.php"><b style="font-family:inherent">Kebutuhan khusus Pengungsi</a>
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
      <table class="table table-hover">
<tr>
	<th>Nama Posko</th>
	<th>Alamat</th>
	<th>Jumlah Pengungsi</th>
	<th>Kapasitas Posko</th>	  
	<th>Status Posko</th>
<?php
session_start();
include "koneksi.php";
	
$username = $_POST['username'];
$password = $_POST['password'];

$user = "select * from admin where username = '$username' and password='$password'";
$query = mysqli_query($kon, $user);

$hitung = mysqli_num_rows($query);

	if ($hitung > 0) {
		$_SESSION['username']= $username;
		$_SESSION['password']= $password;
		
		$query = "SELECT admin.id_posko, COUNT(pengungsi.nama) 
				AS jumlah_pengungsi, nama_posko, alamat, lat, lng ,kapasitas_posko,	
					CASE 
				WHEN COUNT(pengungsi.nama) < kapasitas_posko THEN 'Masih bisa ditambah pengungsi'
				WHEN COUNT(pengungsi.nama) >= kapasitas_posko THEN 'Posko sudah penuh'
					END AS status_posko
						FROM posko
				JOIN pengungsi ON pengungsi.id_posko = posko.id_posko 
				JOIN admin ON admin.id_posko = posko.id_posko
						WHERE username = '$username' AND PASSWORD ='$password';";


				$oke = mysqli_query($kon, $query);
		   while ($tampil = mysqli_fetch_array($oke)) {
			  $id_posko=			$tampil['id_posko'];
			  $jumlah_pengungsi= $tampil['jumlah_pengungsi'];
			  $lat=$tampil['lat'];
			  $lng=$tampil['lng'];
			  $nama_posko=$tampil['nama_posko'];
			  $alamat=$tampil['alamat'];
			  $kapasitas_posko=$tampil['kapasitas_posko'];
			  $status_posko=$tampil['status_posko'];
				echo 
					"<tr>
					    <td>$nama_posko<br/></td>
					    <td>$alamat</td>
					    <td>$jumlah_pengungsi</td>
					    <td>$kapasitas_posko</td>
					    <td>$status_posko</td>
					</tr>";
					}
	} else {
		  echo "<script type='text/javascript'>
		
		if(window.location='login1.php');
	
		</script>";

	}
	
?>
</table>
<h3>Pengajuan Pengungsi posko lain yang ingin pindah posko 
<?php 
include "koneksi.php";

$select = "select nama_posko from posko join admin on admin.id_posko = posko.id_posko where username='$username' and password='$password'";
$owe = mysqli_query($kon, $select);

while ($tampil = mysqli_fetch_array($owe)){
	
$nama_posko=$tampil['nama_posko'];
echo $nama_posko;
}
 ?></h3>
<table class="table table-hover">
	<tr>
		<th>Id Pengungsi</th>
		<th>Nama</th>
		<th>Posko Asal</th>
		<th>Posko Tujuan</th>
		<th>Konfirmasi</th>
		<th>Tolak</th>
	</tr>
<?php
include "koneksi.php";


$konfirmasi = "SELECT pengungsi.id_pengungsi, pengungsi.nama, posko_asal, posko_tujuan FROM riwayat_posko_pengungsi 
JOIN pengungsi ON  riwayat_posko_pengungsi.id_pengungsi = pengungsi.id_pengungsi
JOIN admin ON riwayat_posko_pengungsi.posko_tujuan = admin.id_posko
WHERE STATUS = 'Diproses'  AND admin.username='$username' AND admin.password='$password'";
$query = mysqli_query($kon, $konfirmasi);

while ($tampil = mysqli_fetch_array($query)){
	$id_pengungsi=$tampil['id_pengungsi'];
	$nama=$tampil['nama'];
	$posko_asal=$tampil['posko_asal'];
	$posko_tujuan=$tampil['posko_tujuan'];
	
	echo "
	<tr>
		<td>$id_pengungsi</td>
		<td>$nama</td>
		<td>$posko_asal</td>
		<td>$posko_tujuan</td>
		<td><a href='form_konfirmasi.php?id_pengungsi=".$tampil['id_pengungsi']."'>Konfirmasi</a></td>
	<td><a href='tolak_pengungsi.php?id_pengungsi=".$tampil['id_pengungsi']."'>Tolak</a></td>";
 }
?>
</table>


<hr/>
	<h3>Daftar Pengungsi</h3>
		<table class="table table-hover">
			<tr>
				<th>Nama Pengungsi</th>
				<th>Jenis Kelamin</th>
				<th>Alamat Pengungsi</th>
				<th>Ganti Posko</th>
        </tr>
<?php 
           include "koneksi.php";
		   
					$query = "SELECT id_pengungsi, nama, 
CASE jenis_kelamin
WHEN 'L' THEN 'Pria'
WHEN 'P' THEN 'Wanita'
END AS jenis_kelamin, alamat
FROM pengungsi  
JOIN admin ON admin.id_posko = pengungsi.id_posko 
WHERE admin.username = '$username'";
				$oke = mysqli_query($kon, $query);
		   while ($tampil = mysqli_fetch_array($oke))
		   {
		$id_pengungsi = $tampil['id_pengungsi'];	  
		$nama=$tampil['nama'];
			  $jenis_kelamin=$tampil['jenis_kelamin'];
			  $alamat=$tampil['alamat'];
				echo 
					"<tr>
						<td>$nama<br/></td>
						<td>$jenis_kelamin</td>
						<td>$alamat</td>
						<td><a href='edit_riwayat_posko.php?id_pengungsi=".$tampil['id_pengungsi']."'>Ganti Posko</a></td>
					</tr>";
					}
?>