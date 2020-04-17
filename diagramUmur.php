<?php include"koneksi.php";?>
<script type="text/javascript" src="Chart.js"></script>
<div style="width: 500px;height: 500px">
		<canvas id="myChart"></canvas>
	</div>
	
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["0 - 20 tahun ", "21 - 60 tahun", "Lansia"],
				datasets: [{
					label: 'Informasi Berbentuk diagaram Rentang Umur Pengungsi semua Posko bencana DIY',
					data: [
					<?php $anak = mysqli_query($kon, 
				      "SELECT YEAR(CURDATE()) - YEAR(tanggal_lahir) AS umur FROM pengungsi WHERE  
YEAR(CURDATE()) - YEAR(tanggal_lahir) BETWEEN '0' AND '20'");
					echo mysqli_num_rows($anak); 
					?>,

					<?php $dewasa = mysqli_query($kon, 
				      "SELECT YEAR(CURDATE()) - YEAR(tanggal_lahir) AS umur FROM pengungsi WHERE  
YEAR(CURDATE()) - YEAR(tanggal_lahir) BETWEEN '21' AND '60'");
					echo mysqli_num_rows($dewasa); 
					?>,					
<?php $lansia = mysqli_query($kon, 
				      "SELECT YEAR(CURDATE()) - YEAR(tanggal_lahir) AS umur FROM pengungsi WHERE  
YEAR(CURDATE()) - YEAR(tanggal_lahir)   >60");
					echo mysqli_num_rows($lansia); 
					?>],
					
					
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)'
			
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)'
				
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