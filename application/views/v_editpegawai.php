<!DOCTYPE html>
<html>
<head>
	<title>Edit Pegawai</title>
	 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MENU EDIT PEGAWAI</a>
</nav>

<br>
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card border">
      <div class="card-body">
<?php foreach($pegawai as $p){ ?>
<form action="<?php echo base_url(). 'pegawai_c/update'; ?>" method="post">

<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">NIP</span>
    </div>
    <input type="text" name="nip" class="form-control" value="<?php echo $p->nip?>">
  </div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">ID Bidang</span>
    </div>
        <select id="bidang" name="id_bidang" class="form-control">
          <option disabled="">Pilih Bidang</option>
                    <?php 
                    foreach($bidang as $b){
                    if ($b->id_bidang == $p->id_bidang) {
                        # code...
                        ?>
                        <option selected="selected" value="<?php echo $b->id_bidang ?>"><?php echo $b->nama_bidang ?></option>
                    <?php
                      }
                    else  
                    {
                    ?>
                        <option value="<?php echo $b->id_bidang ?>"><?php echo $b->nama_bidang ?></option>
                    <?php }} ?>
  </select>
  </div>

<div class="input-group mb-3" >
    <div class="input-group-prepend">
      <span class="input-group-text">ID Seksi</span>
    </div>
        <select name="id_seksi" id="id_seksi" class="form-control">
        <option disabled="">Pilih Seksi</option>
                    <?php 
                    foreach($seksi as $b){
                    if ($b->id_seksi == $p->id_seksi) {
                        # code...
                        ?>
                        <option selected="selected" value="<?php echo $b->id_seksi ?>"><?php echo $b->nama_seksi ?></option>
                    <?php
                      }
                    else  
                    {
                    ?>
                        <option value="<?php echo $b->id_seksi ?>"><?php echo $b->nama_seksi ?></option>
                    <?php }} ?>
      </select>
 </div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Level</span>
    </div>
    <select name="level" class="form-control">
          <!-- <option selected="selected">0</option> -->
          <option value="1">Kepala Dinas</option>
          <option value="2">Kepala Bidang</option>
          <option value="3">Kepala Seksi</option>
          <option value="4">Staff</option>
          <option selected="selected" disabled="">Pilih Level</option>
      </select>
  </div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Nama</span>
    </div>
    <input type="text" name="nama" class="form-control" value="<?php echo $p->nama?>">
  </div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Password</span>
    </div>
    <input type="text" name="password" class="form-control" value="<?php echo $p->password ?>">
  </div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Jabatan</span>
    </div>
    <input type="text" name="jabatan" class="form-control" value="<?php echo $p->jabatan ?>">
  </div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">No Hp</span>
    </div>
    <input type="text" name="nohp" class="form-control" value="<?php echo $p->nohp?>">
  </div>       
<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Alamat</span>
    </div>
    <input type="text" name="alamat" class="form-control" value="<?php echo $p->alamat?>">
</div>       


			<tr>
				<button type="submit" value="Update" class="btn btn-outline-info my-10 my-sm-0">Update</button>
			</tr>

      </div>
  </div>
</div>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
$(document).ready(function(){
  var x = document.getElementById("seksi");
  
  $("#bidang").change(function(){
    var id_bidang=$(this).val();
    // alert(id_bidang);
    console.log(id_bidang);
    $.ajax({
                url: "<?= base_url(); ?>seksi_c/AmbilData",
                data: {
                    id_bidang: id_bidang
                },
                type: "POST",
                dataType: "JSON",
                success: function (result) {
                    var sel_seksi = $("select#id_seksi");
                    sel_seksi.html('');
                    result.forEach(function (row, index) {
                        var opt = $("<option></option>");
                        opt.val(row.id_seksi);
                        opt.text(row.nama_seksi);
                        if (index == 0) {
                            opt.attr("selected", true);
                        }
                        sel_seksi.append(opt);
                    });
                    $("select#id_seksi").trigger("change");
                }
            })
  });
});
</script>

</body>
</html>