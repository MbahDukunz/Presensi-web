<!DOCTYPE html>
<html>
<head>
    <title>List Kegiatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <?php $level = $this->session->userdata('level') ?>
    <?php $id_pegawai = $this->session->userdata('id_pegawai') ?>
    <?php $id_seksi = $this->session->userdata('id_seksi') ?>
    <?php $id_bidang = $this->session->userdata('id_bidang') ?>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">LIHAT DETAIL</a>
  
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav">
      <li class="nav-item active ">
        <a class="nav-link" href="<?php echo site_url(). 'kegiatan_c/index'; ?>">MENU KEGIATAN <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
    <span class="navbar-text mr-2">
      <?php echo $_SESSION["nama"]?>
    </span>
    <a href="<?php echo site_url(). 'auth_c/logout'; ?>" class="btn btn-outline-info my-10 my-sm-0" type="submit">Logout</a>

</nav>
<br>
<div class="row justify-content-center">
  <div class="col-md-11">
    <div class="card border">
      <div class="card-body">
  <!-- <a href="<?php echo site_url(). 'kegiatan_c/tambah'; ?>" class="btn btn-outline-info mb-sm-2">+ Tambah Kegiatan</a> -->
  <br>
<table id="example" class="display" style="width:100%">
  <thead>
    <tr>
      <th scope="col">Nama Kegiatan</th>
      <th scope="col">Latitude</th>
      <th scope="col">Longitude</th>
      <th scope="col">Foto</th>
      <th scope="col">Tanggal</th>
    </tr>
      </thead>
        <tbody>
    <?php 
    $a = json_decode($kegiatan);
    foreach($a->kegiatan as $k){ 
    ?>

    <tr scope="row">
    <td><?php echo $k->nama_kegiatan ?></td>
    <td><?php echo $k->latitude ?></td>
    <td><?php echo $k->longitude ?></td>
    <td>
      <img src="http://localhost/cobalagi/<?php echo $k->foto ?>"></img>
    </td>
    <td><?php echo $k->tanggal_kegiatan ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>

      </div>
  </div>
</div>

  </div>
    </blockquote>

</body>
</html>