<?php

$jam_masuk = strtotime('10:05:25');
$jenis_kendaran = "Motor";
$jam_keluar = strtotime('13:07:33');


$nopol = "AB1028DC";

$lama = $jam_keluar - $jam_masuk;
$jam   = floor($lama / (60 * 60));

  if ($jenis_kendaran == "mobil"){
	 
	$biaya_parkir = $jam * 5000;
         } else {
	$biaya_parkir = $jam * 1000;  
  }


echo "Nopol 	   : ".$nopol."<br/>";
echo "Jam masuk    : ".$jam_masuk=date(strtotime('10:05:25'))."<br/>";
echo "Jam keluar   : ".$jam_keluar=date(strtotime('13:07:33'))."<br/>";
echo "Biaya parkir : "."Rp. ".$biaya_parkir;