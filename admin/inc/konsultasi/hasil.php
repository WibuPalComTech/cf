<?php 
if (empty(@$_GET['tahun'])) {
  $tahun = date('Y');
} else {
  $tahun = @$_GET['tahun'];
}
$get_tahun      = $mysqli->query("SELECT YEAR(`tanggal`) AS tahun FROM pasien GROUP BY YEAR(`tanggal`) ORDER BY YEAR(`tanggal`) DESC");
?>
<div class="content-header">
  <div class="header-section">
    <h1>Hasil Konsultasi Penyakit</h1>
  </div>
</div>
<div class="block full">
  <div class="block-title">
    <h2><strong>Semua Hasil Konsultasi Tahun <?= $tahun ?></strong></h2>
    <div class="block-options pull-right">
      <div class="btn-group btn-group-sm">
        <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" data-original-title="Program Studi">Pilih Tahun Konsultasi <span class="caret"></span></a>
        <ul class="dropdown-menu text-left">
          <?php while ($t = $get_tahun->fetch_object()) { ?>
            <li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=konsultasi/hasil&tahun=<?= $t->tahun ?>">Tahun <?= $t->tahun ?></a></li>
          <?php } ?>
        </ul>
      </div>            
    </div>
  </div>
  <div class="table-responsive">
    <table id="default-datatable" class="table table-vcenter table-condensed table-bordered">
      <thead>
        <tr>
          <th class="text-center">No.</th>
          <th class="text-center">Nama Pasien</th>
          <th class="text-center">Tgl Lahir</th>
          <th class="text-center">Umur</th>
          <th class="text-center">Gender</th>
          <th class="text-center">Alamat</th>
          <th class="text-center">Tanggal Konsultasi</th>
          <th class="text-center">Penyakit</th>
          <th class="text-center">Presentase</th>
          <th style="width: 80px;" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
				// memanggil data dari tabel pasien yang ada pada database
        $data = $mysqli->query("SELECT * FROM `hasil` h INNER JOIN `penyakit` pen USING(`id_penyakit`) INNER JOIN `pasien` p USING(`id_pasien`) WHERE YEAR(`p`.`tanggal`) = '$tahun' AND `h`.`possible_disease`='1' ORDER BY `p`.`tanggal` DESC");
				//
        $no 		=	1;
				// memulai perulangan untuk menampilkan data pasien
        while ($isi = $data->fetch_object()) { ?><tr>
          <td class="text-center"><?= $no++; ?></td>
          <td class="text-center"><?= $isi->nama_pasien; ?></td>
          <td class="text-center"><?= $isi->tgl_lahir; ?></td>
          <td class="text-center"><?= $isi->umur; ?> Tahun</td>
          <td class="text-center"><?= $isi->jk; ?></td>
          <td class="text-center"><?= $isi->alamat; ?></td>
          <td class="text-center"><?= $isi->tanggal ?></td>
          <td class="text-center"><?= $isi->nama_penyakit ?></td>
          <td class="text-center"><?= $isi->nilai_hasil*100; ?>%</td>
          <td class="text-center">
          	<div class="btn-group-xs">
              <a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=konsultasi/detail&id=<?= $isi->id_hasil; ?>" class="btn btn-info" title="Lihat Detail"><i class="fa fa-eye"></i></a>
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