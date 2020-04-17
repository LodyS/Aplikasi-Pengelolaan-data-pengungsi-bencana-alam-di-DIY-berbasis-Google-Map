<?php
include "koneksi.php";

$id_pengungsi 	= $_POST['id_pengungsi'];
$posko_tujuan 	= $_POST['posko_tujuan'];
$tanggal_pindah = $_POST['tanggal_pindah'];
$posko_asal 	= $_POST['posko_asal'];
$alasan 		= $_POST['alasan'];

$simpan = "insert into riwayat_posko_pengungsi (posko_tujuan, id_pengungsi, tanggal_pindah, posko_asal, alasan, status)
values ('$posko_tujuan', '$id_pengungsi', '$tanggal_pindah', '$posko_asal', '$alasan', 'Diproses')";
$proses_simpan = mysqli_query($kon, $simpan);

?>
Menunggu Konfirmasi