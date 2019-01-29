<?php 
	// mengambil data pakar, penyakit dan gejala
	$penyakit = $mysqli->query("select * from penyakit"); 
	$gejala 	= $mysqli->query("select * from gejala"); 
?>
<div class="content-header">
  <div class="header-section">
    <h1>Management Relasi Penyakit & Gejala</h1>
  </div>
</div>
<div class="block full" id="alamat-tab">
  <div class="block-title">
  	<div class="block-options pull-right"><i class="gi gi-keys fa-2x"></i></div>
    <h2><strong>Tambah Relasi Penyakit & Gejala Baru</strong></h2>
  </div>
  <!-- Awal Notifikasi -->
  <div id="notifikasi">
  <form id="form-validation" action="frame.php?f=relasi/p_tambah" method="post" class="form-horizontal form-bordered ajaxform" data-target="#notifikasi">
    <fieldset>
			<div class="form-group">
		  	<label class="col-md-2 control-label" for="id_penyakit">Penyakit <span class="text-danger">*</span></label>
		  	<div class="col-md-10">
				  <select id="id_penyakit" name="id_penyakit" class="form-control select-chosen">
					<option value="">Silahkan Pilih Penyakit</option>
					<?php $no =	1;
					// memulai perulangan untuk menampilkan data penyakit
					while ($kl = $penyakit->fetch_object()) { ?>
					<option value="<?= $kl->id_penyakit ?>"><?= $kl->nama_penyakit ?></option>
					<?php } ?>
				  </select>
				</div>
			</div>
			<div class="form-group">
		  	<label class="col-md-2 control-label" for="id_gejala">Gejala <span class="text-danger">*</span></label>
		  	<div class="col-md-10">
				  <select id="id_gejala" name="id_gejala" class="form-control select-chosen">
					<option value="">Silahkan Pilih Gejala</option>
					<?php $no 		=	1;
					// memulai perulangan untuk menampilkan data gejala
					while ($kl = $gejala->fetch_object()) { ?>
					<option value="<?= $kl->id_gejala ?>"><?= $kl->nama_gejala ?></option>
					<?php } ?>
				  </select>
				</div>
			</div>
		  <div class="form-group">
				<label class="col-md-2 control-label" for="bobot_pakar">Bobot Pakar <span class="text-danger">*</span></label>
				<div class="col-md-10">
				  <input type="number" id="bobot_pakar" name="bobot_pakar" class="form-control col-md-10" placeholder="Masukkan Bobot Pakar..">
				</div>
		  </div>
    </fieldset>
    <div class="form-group form-actions">
      <div class="col-md-9 col-md-offset-2">
        <button type="submit" class="btn btn-sm btn-primary" data-loading-text="Loading .."><i class="fa fa-arrow-right"></i> Submit</button>
      </div>
    </div>
  </form>
  </div>
  <!-- Akhir Notifikasi -->
</div>
<script>$(function() { App.formCustom(); FormsValidation.init("#form-validation");});</script> </div>
  </div>
</div>