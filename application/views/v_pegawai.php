<!DOCTYPE html>
<html>
<head>
    <title>List Pegawai</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">MENU UTAMA</a>
  
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav">
    	<li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url(). 'pegawai_c/index'; ?>">MENU PEGAWAI <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url(). 'bidang_c/index'; ?>">MENU BIDANG </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url(). 'seksi_c/index'; ?>">MENU SEKSI</a>
      </li>
    </ul>
  </div>
    <span class="navbar-text mr-2">
      <?php echo $_SESSION["nama"]?>
    </span>
    <a href="<?php echo site_url(). 'auth_c/logout'; ?>" class="btn btn-outline-info my-10 my-sm-0" name="logout" type="submit">Logout</a>

</nav>
<br>
<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="card border">
      <div class="card-body">
	<a href="<?php echo site_url(). 'pegawai_c/Tambah'; ?>" class="btn btn-outline-info mb-sm-2">+ Tambah Pegawai</a>

<br>
<table id="example" class="display" style="width:100%">
  <thead>
    <tr>
    		<th scope="col">NIP</th>
			<th scope="col">Bidang</th>
			<th scope="col">Seksi</th>
			<th scope="col">Level</th>
			<th scope="col">Nama</th>
			<th scope="col">Password</th>
			<th scope="col">Jabatan</th>
			<th scope="col">No HP</th>
			<th scope="col">Alamat</th>
				<th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    		<?php 
    		$a = json_decode($pegawai);
		foreach($a->pegawai as $p){ 
		?>
    <tr scope="row">
    		<td><?php echo $p->nip ?></td>
			<td><?php echo $p->nama_bidang ?></td>	
			<td><?php echo $p->nama_seksi ?></td>
			<td><?php echo $p->level ?></td>
			<td><?php echo $p->nama ?></td>
			<td><?php echo $p->password ?></td>
			<td><?php echo $p->jabatan ?></td>
			<td><?php echo $p->nohp ?></td>
			<td><?php echo $p->alamat ?></td>
		<td>
			<div class="btn-group">
				<a href="<?php echo site_url('pegawai_c/edit/'.$p->nip); ?> "class="btn btn-outline-info">Edit</a>
				<a href="<?php echo site_url('pegawai_c/hapus/'.$p->nip); ?> "class="btn btn-outline-danger" i class="fas fa-trash">Hapus </a> 
			</div>
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
<!-- 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
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

