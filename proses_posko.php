<?php

include "koneksi.php";

$nama_posko = $_POST['nama_posko'];

$lat = $_POST['lat'];
$lng = $_POST['lng'];
$lokasi = $_POST['lokasi'];
$kapasitas_posko = $_POST['kapasitas_posko'];

$query = "insert into posko (nama_posko, lat, lng, lokasi, kapasitas_posko) values ('$nama_posko', '$lat', '$lng', '$lokasi','$kapasitas_posko')";
$oke = mysqli_query ($kon, $query);

?>