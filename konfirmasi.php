<?php
include "koneksi.php";

//if (isset ($_POST['id_pengungsi'])) {
$id_pengungsi = $_POST['id_pengungsi'];
$posko_tujuan = $_POST['posko_tujuan'];
$diterima      = $_POST['Diterima']; 

//$konfirmasi = "Update riwayat_posko_pengungsi set status = '$status' where id_pengungsi = '$id_pengungsi'";

$konfirmasi = "UPDATE pengungsi
JOIN riwayat_posko_pengungsi ON pengungsi.id_pengungsi = riwayat_posko_pengungsi.id_pengungsi 
SET pengungsi.id_posko = '$posko_tujuan', riwayat_posko_pengungsi.status = 'Diterima'
WHERE pengungsi.id_pengungsi = '$id_pengungsi'";
$update = mysqli_query($kon, $konfirmasi);
?>