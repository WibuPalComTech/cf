<?php 
	// filter id dari get id
	$id = $mysqli->escape_string(@$_GET['id']);

	// mengambil data klinik
	$klinik = $mysqli->query("select * from klinik");

	// memanggil data tanyajawab berdasarkan id dari method get yang didapat oleh sistem
	$data = $mysqli->query("select * from penyakit where id_penyakit='$id'");
	$isi  =	$data->fetch_object();
?><div class="modal-dialog modal-lg">
  <div class="modal-content"> 
    <!-- Modal Header -->
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title"><i class="fa fa-pencil"></i> Edit Penyakit</h4>
    </div>
    <div class="modal-body">
	  <form id="form-validation" action="frame.php?f=penyakit/p_edit" method="post" class="form-horizontal form-bordered ajaxformModal" data-target="#page-content">
		<fieldset>
		  <div class="form-group">
			<label class="col-md-2 control-label" for="nama_penyakit">Nama Penyakit <span class="text-danger">*</span></label>
			<div class="col-md-10">
			  <input type="text" id="nama_penyakit" name="nama_penyakit" class="form-control col-md-10" placeholder="Masukkan Nama Penyakit.." value="<?= $isi->nama_penyakit; ?>" />
			  <input type="hidden" id="id" name="id" value="<?= $isi->id_penyakit; ?>" />
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-md-2 control-label" for="solusi">Solusi <span class="text-danger">*</span></label>
			<div class="col-md-10">
				<textarea id="solusi" name="solusi" class="form-control col-md-10" placeholder="Masukkan Solusi .."><?= $isi->solusi; ?></textarea>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-md-2 control-label" for="info">Info Baru <span class="text-danger">*</span></label>
			<div class="col-md-10">
				<textarea id="info" name="info" class="form-control col-md-10" placeholder="Masukkan Info.."><?= $isi->info; ?></textarea>
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