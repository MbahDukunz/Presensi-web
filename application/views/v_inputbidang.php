<!DOCTYPE html>
<html>
<head>
	<title>Input Bidang</title>
	 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">MENU TAMBAH BIDANG</a>
</nav>

<br>
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card border">
      <div class="card-body">

      	<form action="<?php echo base_url(). 'bidang_c/simpan'; ?>" method="post">
<!-- <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">ID Bidang</span>
    </div>
    <input type="text" name="id_bidang" class="form-control" >
  </div> -->

<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Nama Bidang</span>
    </div>
    <input type="text" name="nama_bidang" class="form-control">
  </div>

			<tr>
				<button type="submit" value="Tambah" class="btn btn-outline-info my-10 my-sm-0">Tambah</button>
			</tr>

      </div>
  </div>
</div>

</body>
</html>