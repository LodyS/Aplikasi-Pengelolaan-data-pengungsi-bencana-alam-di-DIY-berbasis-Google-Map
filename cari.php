<script src="jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
    <div class="col-sm-40">
<input class="form-control" id="cari_pengungsi" type="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </div>
  
   <div class="container">
		<table class="table table-hover">
		   <thead>
		      <tr>
			     <th>Nama</th>
				 <th>Nama Posko</th>
				 <th>Alamat</th>
				 <th>Tanggal Masuk Posko</th>
			  </tr>
			</thead>		
			<tbody id="tampil">
		<script type="text/javascript">
    $(document).ready( function() {
      $('#cari_pengungsi').on('keyup', function() {
        $.ajax({
          type: 'POST',
          url: 'search.php',
          data: {
            cari_pengungsi: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#tampil').html(data);
          }
        });
      });
    });
  </script>
</html>
      