<?php
include "koneksi.php";

$id_posko 	= $_POST['id_posko'];
$username	= $_POST['username'];
$password = $_POST['password'];


$simpan = "insert into admin (id_posko, username, password)
values ('$id_posko', '$username', '$password')";
$proses_simpan = mysqli_query($kon, $simpan);

?>