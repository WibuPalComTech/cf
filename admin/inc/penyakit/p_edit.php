<div class="content-header">
  <div class="header-section">
   <h1>Management Penyakit</h1>
  </div>
</div>
<div class="block full">
  <div class="block-title">
    <h2><strong>Semua Penyakit</strong></h2>
  </div><?php 
	// filter inputan 
	$id          = $mysqli->escape_string(@$_POST['id']);
	$nama_penyakit = $mysqli->escape_string(@$_POST['nama_penyakit']);
	$info 	   = $mysqli->escape_string(@$_POST['info']);
	$solusi 	 = $mysqli->escape_string(@$_POST['solusi']);	
	
	// meng-update data yang telah di inputkan jika ada info yang di inputkan
	$query =  $mysqli->query("UPDATE `penyakit` SET `nama_penyakit` = '$nama_penyakit', `info` = '$info',`solusi` = '$solusi' WHERE `penyakit`.`id_penyakit` = '$id';"); 

	if($query){
	?>
	<div class="alert alert-success alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <h4><i class="fa fa-info-circle"></i> Data Berhasil Diperbarui !</h4>
	</div><?php } else { ?>
	<div class="alert alert-warning alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <h4><i class="fa fa-info-circle"></i> Data Gagal Diperbarui, Silahkan Hubungi Admin !</h4>
	</div>
	<?php } ?>
    <div class="table-responsive">
    <table id="default-datatable" class="table table-vcenter table-condensed table-bordered">
      <thead>
        <tr>
          <th class="text-center">No.</th>
          <th class="text-center">Nama Penyakit</th>
          <th class="text-center">Solusi</th>
          <th class="text-center">Info</th>
          <th style="width: 80px;" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        // memanggil data dari tabel penyakit yang ada pada database
        $data = $mysqli->query("SELECT * FROM penyakit");
        //
        $no     = 1;
        // memulai perulangan untuk menampilkan data penyakit
        while ($isi = $data->fetch_object()) { ?><tr>
          <td class="text-center"><?= $no++; ?></td>
          <td class="text-center"><?= $isi->nama_penyakit; ?></td>
          <td class="text-center"><?= $isi->solusi ?></td>
          <td class="text-center"><?= $isi->info ?></td>
          <td class="text-center">
            <div class="btn-group-xs">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#detailModal" data-remote="frame.php?f=penyakit/edit&id=<?= $isi->id_penyakit; ?>" class="btn btn-warning" title="Edit Penyakit"><i class="fa fa-pencil"></i></a>
                <?php 
                // jika nama_penyakit yg ditampilkan adalah nama_penyakit penyakit yg saat ini login maka tombol hapus tidak akan di tampilkan
                if(($isi->nama_penyakit)!=($_SESSION['UserID'])){ 
                  ?><a href="javascript:void(0)" data-toggle="modal" data-target="#detailModal" data-remote="frame.php?f=penyakit/hapus&id=<?= $isi->id_penyakit; ?>" class="btn btn-danger" title="Hapus Penyakit"><i class="fa fa-trash-o"></i></a><?php } ?>
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