<div class="content-header">
  <div class="header-section">
   <h1>Management Relasi Penyakit & Gejala</h1>
  </div>
</div>
<div class="block full">
  <div class="block-title">
    <h2><strong>Semua Relasi Penyakit & Gejala</strong></h2>
  </div><?php 
	// filter inputan 
	$id_penyakit   = $mysqli->escape_string(@$_POST['id_penyakit']);
	$id_gejala 	   = $mysqli->escape_string(@$_POST['id_gejala']);
	$bobot_pakar 	 = $mysqli->escape_string(@$_POST['bobot_pakar']);
	
	$query =  $mysqli->query("INSERT INTO `relasi`(`id_relasi`, `id_penyakit`, `id_gejala`, `bobot_pakar`) VALUES (NULL,'$id_penyakit','$id_gejala','$bobot_pakar')"); 
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
          <th class="text-center">Nama Penyakit</th>
          <th class="text-center">Nama Gejala</th>
          <th class="text-center">Bobot Pakar</th>
          <th style="width: 80px;" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        // memanggil data dari tabel relasi yang ada pada database
        $data = $mysqli->query("SELECT * FROM relasi INNER JOIN penyakit USING(`id_penyakit`) INNER JOIN gejala USING(`id_gejala`)");
        //
        $no     = 1;
        // memulai perulangan untuk menampilkan data relasi
        while ($isi = $data->fetch_object()) { ?><tr>
          <td class="text-center"><?= $no++; ?></td>
          <td><?= "[ P" . $isi->id_penyakit .  " ] " . $isi->nama_penyakit; ?></td>
          <td><?= " [ B" . $isi->id_gejala .  " ] " . $isi->nama_gejala; ?></td>
          <td class="text-center"><?= $isi->bobot_pakar ?></td>
          <td class="text-center">
            <div class="btn-group-xs">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#detailModal" data-remote="frame.php?f=relasi/edit&id=<?= $isi->id_relasi; ?>" class="btn btn-warning" title="Edit Relasi Penyakit & Gejala"><i class="fa fa-pencil"></i></a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#detailModal" data-remote="frame.php?f=relasi/hapus&id=<?= $isi->id_relasi; ?>" class="btn btn-danger" title="Hapus Relasi Penyakit & Gejala"><i class="fa fa-trash-o"></i></a>
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