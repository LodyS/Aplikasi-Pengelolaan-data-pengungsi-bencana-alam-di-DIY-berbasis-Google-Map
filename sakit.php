<?php
include "koneksi.php";

$nama_penyakit = $_POST ['nama_penyakit'];

$query = "insert into riwayat_sakit (nama_penyakit) values ('$nama_penyakit')";
$oke = mysqli_query($kon, $query);

?>