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
  <a class="navbar-brand">MENU UTAMA</a>
  
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
	<a href="<?php echo site_url(). 'kegiatan_c/tambah'; ?>" class="btn btn-outline-info mb-sm-2">+ Tambah Kegiatan</a>
	<br>
<table id="example" class="display" style="width:100%">
  <thead>
    <tr>
      <th scope="col">Nama Kegiatan</th>
      <th scope="col">Pelaksana</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama Bidang</th>
      <th scope="col">Nama Seksi</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Terakhir Diubah</th>
      <th scope="col">Action</th>
    </tr>
      </thead>
        <tbody>
    <?php 
    $a = json_decode($kegiatan);
		foreach($a->kegiatan as $k){ 
		?>

    <tr scope="row">
    <td><?php echo $k->nama_kegiatan ?></td>
    <td><?php echo $k->nama ?></td>
    <td><?php echo $k->nip ?></td>
    <td><?php echo $k->nama_bidang ?></td>
    <td><?php echo $k->nama_seksi ?></td>
    <td><?php echo $k->jabatan ?></td>
    <td><?php echo $k->tanggal_kegiatan ?></td>
    <td>
			<?php 
      if ($id_pegawai == $k->id_pegawai)
        { ?>
          <div class="btn-group">
        <a href="<?php echo site_url('kegiatan_c/lihat/'.$k->id_kegiatan); ?> "class="btn btn-outline-info">Lihat</a>    
        <a href="<?php echo site_url('kegiatan_c/edit/'.$k->id_kegiatan); ?> "class="btn btn-outline-info">Edit</a>
        <a href="<?php echo site_url('kegiatan_c/hapus/'.$k->id_kegiatan); ?> "class="btn btn-outline-danger" i class="fas fa-trash">Hapus </a> 
        </div>
        <?php }

      else
        { ?>
        <div> 
          <a href="<?php echo site_url('kegiatan_c/lihat/'.$k->id_kegiatan); ?>" class="btn btn-outline-light">Hanya Lihat</a>
        </div>
        <?php }
      ?>
		</td>
    </tr>
	<?php } ?>
  </tbody>
</table>

      </div>
  </div>
</div>

  </div>
    </blockquote>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>

  $(document).ready(function() {
    $('#example').DataTable();
} );
  
</script>


</body>
</html>