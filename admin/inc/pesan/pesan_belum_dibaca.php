<div class="content-header">
  <div class="header-section">
    <h1>Pesan Masuk</h1>
  </div>
</div>
<div class="block full">
  <div class="block-title">
    <h2><strong>Semua Pesan Belum Dibaca</strong></h2>
  </div>
    <div class="table-responsive">
    <table id="default-datatable" class="table table-vcenter table-condensed table-bordered">
      <thead>
        <tr>
          <th style="width: 80px;" class="text-center">Tanggal</th>
          <th class="text-center">Nama</th>
          <th class="text-center">Email</th>
          <th class="text-center">Telepon</th>
          <th class="text-center">Isi Pesan</th>
          <th style="width: 155px;" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
		// memanggil data dari tabel pesan yang ada pada database
		$pesan = $mysqli->query("select pesan.* from pesan WHERE `dibaca`='t'");
		// memulai perulangan untuk menampilkan data pesan
		 while($isi = $pesan->fetch_object() ) {  ?><tr>
          <td class="text-center"><?= $isi->tanggal; ?> WIB</td>
          <td class="text-center"><?= $isi->nama; ?></td>
          <td class="text-center"><?= $isi->email; ?></td>
          <td class="text-center"><?= $isi->telepon; ?></td>
          <td class="text-center"><?= $isi->isi_pesan; ?></td>
          <td class="text-center">
          	<div class="btn-group-xs" id="kode-<?= $isi->id_pesan; ?>">
				<?php if($isi->dibaca=='t'){?><a href="javascript:void(0)" data-target="#kode-<?= $isi->id_pesan; ?>" data-remote="frame.php?f=pesan/edit_pesan_belum_dibaca&id=<?= $isi->id_pesan; ?>" class="btn btn-warning" title="Tandai Sudah Dibaca"><i class="fa fa-check-square-o"></i>Tandai</a><?php } else { ?><a href="javascript:void(0)" class="btn btn-success" title="Sudah Dibaca" disabled><i class="fa fa-check"></i> Sudah Dibaca</a><?php } ?>
				<a href="javascript:void(0)" data-toggle="modal" data-target="#detailModal" data-remote="frame.php?f=pesan/hapus_pesan_masuk&id=<?= $isi->id_pesan; ?>" class="btn btn-danger" title="Hapus Pesan"><i class="fa fa-trash-o"></i></a>
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