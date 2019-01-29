<?php 
	// filter id dari get id
	$id = $mysqli->escape_string(@$_GET['id']);

	// mengambil data pakar, penyakit dan gejala
	$penyakit = $mysqli->query("select * from penyakit"); 
	$gejala 	= $mysqli->query("select * from gejala"); 

	// memanggil data tanyajawab berdasarkan id dari method get yang didapat oleh sistem
	$data = $mysqli->query("select * from relasi where id_relasi='$id'");
	$isi  =	$data->fetch_object();
?><div class="modal-dialog modal-lg">
  <div class="modal-content"> 
    <!-- Modal Header -->
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title"><i class="fa fa-pencil"></i> Edit Relasi Penyakit & Gejala</h4>
    </div>
    <div class="modal-body">
	  <form id="form-validation" action="frame.php?f=relasi/p_edit" method="post" class="form-horizontal form-bordered ajaxformModal" data-target="#page-content">
		<fieldset>
		  <div class="form-group">
		  	<label class="col-md-2 control-label" for="id_penyakit">Penyakit <span class="text-danger">*</span></label>
		  	<div class="col-md-10">
				  <select id="id_penyakit" name="id_penyakit" class="form-control select-chosen">
					<option value="">Silahkan Pilih Penyakit</option>
					<?php $no =	1;
					// memulai perulangan untuk menampilkan data penyakit
					while ($kl = $penyakit->fetch_object()) { ?>
					<option value="<?= $kl->id_penyakit ?>" <?= $kl->id_penyakit==$isi->id_penyakit ? 'selected' : '' ?>><?= $kl->nama_penyakit ?></option>
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
					<option value="<?= $kl->id_gejala ?>" <?= $kl->id_gejala==$isi->id_gejala ? 'selected' : '' ?>><?= $kl->nama_gejala ?></option>
					<?php } ?>
				  </select>
				</div>
			</div>
		  <div class="form-group">
				<label class="col-md-2 control-label" for="bobot_pakar">Bobot Pakar <span class="text-danger">*</span></label>
				<div class="col-md-10">
				  <input type="number" id="bobot_pakar" name="bobot_pakar" class="form-control col-md-10" placeholder="Masukkan Bobot Pakar.." value="<?= $isi->bobot_pakar ?>">
				  <input type="hidden" id="id" name="id" value="<?= $isi->id_relasi; ?>" />
				</div>
		  </div>
		</fieldset>
		<div class="form-group form-actions">
		  <div class="col-md-8 col-md-offset-3">
			<button type="submit" class="btn btn-primary" data-loading="Loading .." >Simpan Perubahan</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
		  </div>
		</div>
	  </form>
	</div>
  </div>
</div>
<script>
	/* Initialize app when page loads */
	$(function() { App.formCustom(); FormsValidation.init("#form-validation");}); 
</script>