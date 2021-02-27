<!DOCTYPE html>
<html>
<head>
	<title>Edit Kegiatan</title>
	 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MENU EDIT KEGIATAN</a>
</nav>


<?php foreach($kegiatan as $k)
{ ?>
	 <!-- <form action="<?php echo base_url(). 'kegiatan_c/update'; ?>" method="post"> -->
    <br>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card border">
            <div class="card-body">
              <?php
              echo form_open_multipart("kegiatan_c/update", "class=\"form-horizontal\"");
              ?>
	            <?php 
                foreach($kegiatan as $k)
                { 
              ?>

                <input type="hidden" name="id_kegiatan" value="<?php echo $k->id_kegiatan ?>">

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Nama Kegiatan</span>
              </div>
		          <input type="text" class="form-control"  name="nama_kegiatan" value="<?php echo $k->nama_kegiatan ?>">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Foto Kegiatan</span>
                <img src="http://localhost/cobalagi/<?php echo $k->foto ?>"></img>
              </div>
            </div>

            <div class="file-upload-wrapper">
              <input type="file" name="filefoto" class="file-upload"/>
            </div>

            <input type="hidden" name="tanggal_kegiatan" value="<?php echo date("l, j F Y H:i:s"); ?>">

              <?php 
                }
              ?>
			<tr>
				<button type="submit" value="Update" name="submit" id="submit" class="btn btn-outline-info my-10 my-sm-0">Update</button>
			</tr>
</div>
</div>
</div>
</div>
</form>
<?php } ?>

</body>
</html>

