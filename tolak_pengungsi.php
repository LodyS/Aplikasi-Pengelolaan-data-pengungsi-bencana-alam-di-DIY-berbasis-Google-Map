<?php
include "koneksi.php";
$id_pengungsi  = $_GET['id_pengungsi'];

$konfirmasi = "Update riwayat_posko_pengungsi set status = 'Ditolak' where id_pengungsi = '$id_pengungsi'";

$tolak = mysqli_query($kon, $konfirmasi);
?>
<a href="laporan_riwayat_pengungsi.php">Riwayat Pengungsi</a>