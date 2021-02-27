<!DOCTYPE html>
<html>
<head>
  <title>Input Kegiatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">MENU TAMBAH KEGIATAN</a>
</nav>

<br>
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card border">
      <div class="card-body">
            
            <?php
            echo form_open_multipart("kegiatan_c/simpan", "class=\"form-horizontal\"");
            ?>

 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Nama Kegiatan</span>
    </div>
    <input type="text" name="nama_kegiatan" class="form-control">
  </div>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Foto Kegiatan</span>
    </div>
    <!-- <input type="file" name="filefoto" required><br> -->
  </div>

  <div class="file-upload-wrapper">
    <input type="file" name="filefoto" class="file-upload" required/>
  </div>

      <tr>
        <input type="hidden" name="tanggal_kegiatan" value="<?php echo date("l, j F Y H:i:s"); ?>">
        <button type="submit" value="Tambah" name="submit" id="submit" class="btn btn-outline-info mt-sm-2">Tambah</button>
      </tr>

      </div>
  </div>
</div>

</body>
</html>