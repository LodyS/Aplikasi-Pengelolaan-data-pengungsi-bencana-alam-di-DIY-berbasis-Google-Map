<?php
ini_set("error_reporting",0);
$plat_nomor = "B1375WOA";
$tanggal    = date("d");

echo "No plat kendaraan Anda jika tanpa huruf : ".$plat_regex = preg_replace("/[^0-9]/", "", $plat_nomor)."<br/>";

	if ($plat_regex %2 == 0 and $tanggal % 2==0) {
	        echo "Aman, Silahkan melanjutkan perjalanan<br/>";
		} elseif ($plat_regex %2==1 and $tanggal %2 ==1) {
			echo "Aman, Silahkan melanjutkan perjalanan<br/>";
		} else {
			echo "Maaf Anda terkena tilang dan harus membayar denda sebesar Rp. 500.000<br/>";
		}
?>
<?php
/*for($i=2; $i<=70; $i++)
    {
        if($i%2==0)
            echo ("$i&nbsp;");
    } */
 ?>