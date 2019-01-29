<div class="content-header">
  <div class="header-section">
    <h1>Management Gejala</h1>
  </div>
</div>
<div class="block full">
  <div class="block-title">
    <h2><strong>Semua Gejala</strong></h2>
  </div>
    <div class="table-responsive">
    <table id="default-datatable" class="table table-vcenter table-condensed table-bordered">
      <thead>
        <tr>
          <th class="text-center">No.</th>
          <th class="text-center">Nama Gejala</th>
          <th class="text-center">Pertanyaan</th>
          <th style="width: 80px;" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
				// memanggil data dari tabel gejala yang ada pada database
				$data = $mysqli->query("SELECT * FROM gejala");
				//
				$no 		=	1;
				// memulai perulangan untuk menampilkan data gejala
				while ($isi = $data->fetch_object()) { ?><tr>
          <td class="text-center"><?= $no++; ?></td>
          <td class="text-center"><?= $isi->nama_gejala; ?></td>
          <td class="text-center"><?= $isi->pertanyaan ?></td>
          <td class="text-center">
          	<div class="btn-group-xs">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#detailModal" data-remote="frame.php?f=gejala/edit&id=<?= $isi->id_gejala; ?>" class="btn btn-warning" title="Edit Gejala"><i class="fa fa-pencil"></i></a>
                <?php 
                // jika nama_gejala yg ditampilkan adalah nama_gejala gejala yg saat ini login maka tombol hapus tidak akan di tampilkan
                	?><a href="javascript:void(0)" data-toggle="modal" data-target="#detailModal" data-remote="frame.php?f=gejala/hapus&id=<?= $isi->id_gejala; ?>" class="btn btn-danger" title="Hapus Gejala"><i class="fa fa-trash-o"></i></a>
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