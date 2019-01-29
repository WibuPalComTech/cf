<div class="content-header">
  <div class="header-section">
   <h1>Management User</h1>
  </div>
</div>
<div class="block full">
  <div class="block-title">
    <h2><strong>Semua Pengguna</strong></h2>
  </div><?php 
	// filter inputan 
	$id 				= $mysqli->escape_string(@$_POST['id']);
	$username 	= $mysqli->escape_string(@$_POST['username']);
	$password 	= $mysqli->escape_string(@$_POST['password']);
	$status 		= $mysqli->escape_string(@$_POST['status']);	
	
	$query =  $mysqli->query("INSERT INTO `pengguna` (`username`, `password`, `status`) VALUES ('$username', '$password', '$status');"); 
	if($query){
	?>
	<div class="alert alert-success alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <h4><i class="fa fa-info-circle"></i> Data Berhasil Menambah !</h4>
	</div><?php } else { ?>
	<div class="alert alert-warning alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <h4><i class="fa fa-info-circle"></i> Data Gagal Menambah, Silahkan Hubungi Admin !</h4>
	</div>
	<?php } ?>
    <div class="table-responsive">
    <table id="default-datatable" class="table table-vcenter table-condensed table-bordered">
      <thead>
        <tr>
          <th class="text-center">No.</th>
          <th class="text-center">Username</th>
          <th class="text-center">Status</th>
          <th style="width: 80px;" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
				// memanggil data dari tabel pengguna yang ada pada database
				$data = $mysqli->query("SELECT * FROM pengguna");
				//
				$no 		=	1;
				// memulai perulangan untuk menampilkan data pengguna
				while ($isi = $data->fetch_object()) { ?><tr>
          <td class="text-center"><?= $no++; ?></td>
          <td class="text-center"><?= $isi->username; ?></td>
          <td class="text-center"><?= $isi->status ?></td>
          <td class="text-center">
          	<div class="btn-group-xs">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#detailModal" data-remote="frame.php?f=pengguna/edit&id=<?= $isi->kd_pengguna; ?>" class="btn btn-warning" title="Edit Pengguna"><i class="fa fa-pencil"></i></a>
                <?php 
                // jika username yg ditampilkan adalah username pengguna yg saat ini login maka tombol hapus tidak akan di tampilkan
                if(($isi->username)!=($_SESSION['UserID'])){ 
                	?><a href="javascript:void(0)" data-toggle="modal" data-target="#detailModal" data-remote="frame.php?f=pengguna/hapus&id=<?= $isi->kd_pengguna; ?>" class="btn btn-danger" title="Hapus Pengguna"><i class="fa fa-trash-o"></i></a><?php } ?>
            </div>
          </td>
        </tr>
				<?php } // penutup perulangan ?>
      </tbody>
    </table>
  </div>
</div>
<!-- Load and execute javascript code used only in this page --> 
<script src="js/pages/tablesDatatables.js"></script> 
<script>$(function(){ TablesDatatables.init('#default-datatable'); });</script>