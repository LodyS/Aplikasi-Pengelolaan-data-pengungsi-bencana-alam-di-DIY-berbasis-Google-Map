<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php 
include "koneksi.php";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">SIG Posko Bencana Alam Yogyakarta</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        
		
      </li>
	  
	   <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		
      </li>
 
  
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Laporan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Laporan Distribusi Pengungsi</a>
          <a class="dropdown-item" href="laporan_sakit.php">Laporan Riwayat Sakit</a>
            <a class="dropdown-item" href="#">Laporan Riwayat Posko Pengungsi</a>
			
        </div>
      </li>
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Laporan kategori umur per posko
        </a>
		<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
		<?php
		include "koneksi.php";
		
		$wilayah = "select id_posko, nama_posko from posko";
		$cari = mysqli_query($kon, $wilayah);

		while ($tampil = mysqli_fetch_array($cari))	
			{
			$nama_posko=$tampil['nama_posko'];
			
		
       echo "<a class='dropdown-item' href='jenis_kelamin_wilayah.php?id_posko=".$tampil['id_posko']."' value='".$tampil['nama_posko']."'>$nama_posko</a>";
		         
?>			
<?php
			}
?>
       </div>
		
	
      </li>
	  </ul>
	  </div>
	  </nav>
  
  
    </ul>
   <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>-->
  </div>
</nav>
<script type="text/javascript" src="Chart.js"></script>
<div style="width: 500px;height: 500px">
		<canvas id="myChart"></canvas>
	</div>
<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Pria", "Wanita"],
				datasets: [{
					label: 'Perbandingan jumlah pengungsi pria dan wanita',
					data: [
					<?php 
					$id_posko = $_GET['id_posko'];
					$pria = mysqli_query($kon, 
				      "SELECT nama FROM pengungsi WHERE jenis_kelamin = 'L' and id_posko = '$id_posko';");
					echo mysqli_num_rows($pria); ?>,
					
					
					<?php 
					$id_posko = $_GET['id_posko'];
					$wanita = mysqli_query($kon, 
					"SELECT nama FROM pengungsi WHERE jenis_kelamin = 'P' and id_posko ='$id_posko';");
					echo mysqli_num_rows($wanita); ?> ],
					
					
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					
			
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)'
					
				
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>