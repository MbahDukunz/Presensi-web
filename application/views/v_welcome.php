<!DOCTYPE html>
<html>
<head>
    <title>Menu Utama</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MENU UTAMA</a>

</nav>
<br>
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card border">
      <div class="card-body">

<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>

<form action="<?php echo base_url(). 'auth_c/login'; ?>" method="post">

<div class="row">
  <div class="col-lg">
      <h5 align="center">ABSENSI KARYAWAN</h5>
			      <img src="<?php echo base_url('assets/logo.jpg'); ?>">

                
                <p align="center">Selamat Datang di Halaman Utama<br>Dinas Komunikasi dan Informatika <br>Kabupaten Malang</p>
  </div>
                    
                    <div class="col-lg">

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">@</span>
                            </div>
                                <input type="text" name="username" class="form-control" placeholder="NIP">
                            </div>

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">@</span>
                            </div>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>


                        <tr>
                        <button type="submit"  name="submit" class="btn btn-outline-info my-10 my-sm-0">Login</button>
                        </tr>
                    </div>
</div>

</div>
</div>
</div>
</div>

</body>
</html>

