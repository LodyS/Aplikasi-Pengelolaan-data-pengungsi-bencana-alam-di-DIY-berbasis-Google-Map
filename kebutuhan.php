<?php
include "koneksi.php";

$kebutuhan = $_POST ['kebutuhan'];

$query = "insert into kebutuhan_khusus (kebutuhan) values ('$kebutuhan')";
$oke = mysqli_query($kon, $query);

?>