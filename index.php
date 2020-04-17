<?php

include 'functions.php';
/*if(empty($_SESSION['user']))
    header("location:login.php");*/
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="jquery-3.4.1.min.js"></script>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>    
   
    <link rel="icon" href="favicon.ico"/>
    

    <title>Sistem Informasi Geografis</title>
    <!--<link href="assets/css/solar-bootstrap.min.css" rel="stylesheet"/>-->
    <link href="assets/css/general.css" rel="stylesheet"/>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>  
    <script src="assets/tinymce/tinymce.min.js"></script> 
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwiZhoEVwlqJnDd6HYNLPXjNdoc7fpg&callback=initMap">
	</script>
    <script>
        var default_lat = <?=get_option('default_lat')?>; 
        var default_lng = <?=get_option('default_lng')?>;
        var default_zoom = <?=get_option('default_zoom')?>;
    </script>
    <script src="assets/js/script.js"></script>
  </head>
  <body>
  </head>
  
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><b style="font-family:inherent">Aplikasi Pengelolaan data Posko Bencana Yogyakarta</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

     
    
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
 
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="?m=posko_list"><span class="glyphicon glyphicon-map-marker">Posko <span class="sr-only">(current)</span></a></i></li>
	  
	<li class="nav-item active">
        <a class="nav-link" href="?m=login"><span class="glyphicon glyphicon-info-sign">Login <span class="sr-only">(current)</span></a></li>
	  
  
	  
	  
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <b style="font-family:inherent">Laporan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="laporan_pengungsi.php"><b style="font-family:inherent">Distribusi jumlah pengungsi</a>
          <a class="dropdown-item" href="laporan_sakit.php"><b style="font-family:inherent">Riwayat Diagram Sakit</a>
		       <a class="dropdown-item" href="laporan_riwayat_pengungsi.php"><b style="font-family:inherent">Riwayat Posko Pengungsi</a>
		         <a class="dropdown-item" href="laporan_riwayat_sakit.php"><b style="font-family:inherent">Riwayat Sakit Yang Di Derita Pengungsi </a>
				 <a class="dropdown-item" href="jumlah_kebutuhan.php"><b style="font-family:inherent">Laporan Kebutuhan Khusus </a>
		 
		  
         
      </li></ul>
	  
	  <form action="cari.php" method="post">
   <form class="form-inline my-2 my-lg-0">
     
	 <button type="submit" class="btn btn-success">Search</a>
  
  </div>
</nav>


         <?php include "posko_list.php"; ?>
        </div>
        <div id="navbar" class="navbar navbar-light">
          <ul class="nav justify-conter-center">
            <?php if($_SESSION['login']):?>
            <!--<li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li> -->
			  <li><a href="?m=posko_list"><span class="glyphicon glyphicon-lock"></span> Pengungsi</a></li>
            <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <?php else:?>            
            <!--<li><a href="?m=tempat_list"><span class="glyphicon glyphicon-map-marker"></span> Tempat</a></li>
            <li><a href="?m=login"><span class="glyphicon glyphicon-user"></span> Login</a></li>!-->
            <?php endif?>                   
          </ul>          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
    <?php
        if(file_exists($mod.'.php'))
            include $mod.'.php';
        else
           // include 'home.php';
    ?>
    </div>
    
</body>
</html>