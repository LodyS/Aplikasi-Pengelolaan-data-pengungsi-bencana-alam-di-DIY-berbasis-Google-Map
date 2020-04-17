<?php

$tanggal_berangkat = $_POST['tanggal_berangkat'];
$tanggal_pulang    = $_POST['tanggal_pulang'];
$jumlah_penumpang  = $_POST['jumlah_penumpang'];

	if ($tanggal_pulang < $tanggal_berangkat) {
		echo "Tanggal tidak valid";
	} else {
		echo "Tanggal berangkat : $tanggal_berangkat<br/>
			  Tanggal pulang    : $tanggal_pulang";
	}
	
	