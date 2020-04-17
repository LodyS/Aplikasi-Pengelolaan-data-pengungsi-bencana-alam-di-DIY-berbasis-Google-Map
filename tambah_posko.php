<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<form action="proses_posko.php" method="post">

<div class="col-sm-3">
Nama Posko : <input type="text" class="form-control" name="nama_posko"></div><br/>
<div class="col-sm-3">
Latitude : <input type="text" class="form-control" name="lat"><br/></div>
<div class="col-sm-3">
Longitude : <input type="text" class="form-control" name="lng"><br/></div>
<div class="col-sm-3">
Lokasi : <input type="text" class="form-control" name="lokasi"><br/></div>
<div class="col-sm-3">
Kapasistas Posko : <input type="number" class="form-control" name="kapasitas_posko"><br/></div>
<div class="col-sm-3"><button type="submit" class="btn btn-danger" value="Tambah Posko">Tambah Posko</button>