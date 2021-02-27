<!DOCTYPE html>
<html>
<head>
	<title>Edit Bidang</title>
	 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MENU EDIT BIDANG</a>
</nav>

<br>
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card border">
      <div class="card-body">
<?php foreach($bidang as $b){ ?>
<form action="<?php echo base_url(). 'bidang_c/update'; ?>" method="post">
<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Nama Bidang</span>
    </div>
    <input type="hidden" name="id_bidang" value="<?php echo $b->id_bidang ?>">
    <input type="text" name="nama_bidang" class="form-control" value="<?php echo $b->nama_bidang ?>">
  </div>
			<tr>
				<button type="submit" value="Update" class="btn btn-outline-info my-10 my-sm-0">Update</button>
			</tr>

      </div>
  </div>
</div>
</form>
<?php } ?>
</body>
</html>
