<?php
include "koneksi.php";

$id_posko 	   			= $_POST['id_posko'];
$nama 		   			= $_POST['nama'];
$jenis_kelamin 			= $_POST['jenis_kelamin'];
$tanggal_lahir 			= $_POST['tanggal_lahir'];
$kategori_umur 			= $_POST['kategori_umur'];
$alamat        			= $_POST['alamat'];
$tanggal_masuk_posko    = $_POST['tanggal_masuk_posko'];
$id_riwayat_sakit 		= $_POST['id_riwayat_sakit'];
$id_kebutuhan 			= $_POST['id_kebutuhan'];

$tambah = "insert into pengungsi (id_posko, nama, jenis_kelamin, tanggal_lahir, kategori_umur, alamat, tanggal_masuk_posko, id_riwayat_sakit, id_kebutuhan)
values ('$id_posko', '$nama', '$jenis_kelamin', '$tanggal_lahir', '$kategori_umur', '$alamat', '$tanggal_masuk_posko', '$id_riwayat_sakit', '$id_kebutuhan')";
$query = mysqli_query($kon, $tambah);

?>