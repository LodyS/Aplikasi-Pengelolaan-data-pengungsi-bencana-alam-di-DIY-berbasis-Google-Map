<div class="page-header">
    <h1>Posko Pengungsi</h1>
</div>
<div id="map" style="height: 768px;"></div>
<script>
function tampilDekat(){
    getCurLocation();
    var image =  'biru1.png';
	
	map_dekat = new google.maps.Map(document.getElementById('map'), {
        zoom: <?=get_option('default_zoom')?>,
        center: {
            lat : default_lat, 
            lng : default_lng
        }
    });
    
	
    var data =  <?=json_encode($db->get_results("SELECT posko.id_posko, COUNT(pengungsi.nama) 
	AS jumlah_pengungsi, nama_posko, lat, lng ,kapasitas_posko FROM posko
JOIN pengungsi ON pengungsi.id_posko = posko.id_posko GROUP BY posko.id_posko"))?>;
    $.each(data, function(k, v){
        var pos = {
            lat : parseFloat(v.lat),
            lng : parseFloat(v.lng)
        };
		 
        var contentString = '<h3>'  + v.nama_posko + '<br/>'  +'</h3>' + 
		   'Jumlah Pengungsi : ' +  v.jumlah_pengungsi + '<br/>' +
            '<p align="center"><a href="?m=posko_detail&ID=' + v.id_posko + '" class="link_detail btn btn-primary">Lihat Detail</a>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
			
		if ((v.kapasitas_posko - v.jumlah_pengungsi) <=0) {
		//if (true){
			image = 'merah1.png';
			 
		} else {
			image = 'biru1.png';
		
		}

        var marker = new google.maps.Marker({
            position: pos,
            map: map_dekat,
            animation: google.maps.Animation.DROP,
			icon : image 	
			
        });         
        marker.addListener('click', function() {
            infowindow.open(map_dekat, marker);
        });
    });    
}  

$(function(){
    tampilDekat();
})
</script>