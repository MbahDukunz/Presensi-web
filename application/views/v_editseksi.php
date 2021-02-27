<!DOCTYPE html>
<html>
<head>
	<title>Edit Seksi</title>
	 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MENU EDIT SEKSI</a>
</nav>

<?php foreach($seksi as $b){ ?>
<form action="<?php echo base_url(). 'seksi_c/update'; ?>" method="post">
        <?php 
            foreach($seksi as $s){ 
        ?>

<br>
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card border">
<div class="card-body">

<input type="hidden" name="id_seksi" value="<?php echo $s->id_seksi ?>">

<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Nama Bidang</span>
    </div>
					<select name="id_bidang" class="form-control">
            <option selected="selected" disabled="">Pilih Bidang</option>
                    <?php 
                    foreach($bidang as $b){ 
                    ?>
                        <option value="<?php echo $b->id_bidang ?>"><?php echo $b->nama_bidang ?></option>
                    <?php } ?>
                    </select>
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Nama Seksi</span>
    </div>
    
		<input type="text" class="form-control"  name="nama_seksi" value="<?php echo $s->nama_seksi ?>">
  </div>
  <?php } ?>
			<tr>
				<button type="submit" value="Update" class="btn btn-outline-info my-10 my-sm-0">Update</button>
			</tr>
</div>
</div>
</div>
</div>
</form>
<?php } ?>
</body>
</html>