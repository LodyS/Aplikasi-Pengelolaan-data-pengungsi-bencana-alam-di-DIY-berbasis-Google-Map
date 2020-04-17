<?php

include "koneksi.php";
if(isset($_POST['Login'])){
$username = mysqli_real_escape_string ($kon, $_POST['username']);
$password = mysqli_real_escape_string ($kon, $_POST['password']);

$user = "select * from admin where username = '$username' and password='$password'";
$query = mysqli_query($kon, $user);

if(mysqli_num_rows($query) == 0){
		echo 'User tidak ditemukan';
	}else{
		$row = mysqli_fetch_assoc($query);
		if($level == 'admin'){
			$_SESSION['admin']=$username;
			echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="masuk_admin.php";</script>';
		}else{
			echo '<script language="javascript">alert("Anda bukan admin!"); document.location="login1.php";</script>';
		}
	}
}
?>