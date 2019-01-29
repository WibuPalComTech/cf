<?php 
	// filter id dari get id
	$id = $mysqli->escape_string(@$_GET['id']);

	// mengambil data klinik
	$klinik = $mysqli->query("select * from klinik");

	// memanggil data tanyajawab berdasarkan id dari method get yang didapat oleh sistem
	$data = $mysqli->query("select * from gejala where id_gejala='$id'");
	$isi  =	$data->fetch_object();
?><div class="modal-dialog modal-lg">
  <div class="modal-content"> 
    <!-- Modal Header -->
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title"><i class="fa fa-pencil"></i> Edit Gejala</h4>
    </div>
    <div class="modal-body">
	  <form id="form-validation" action="frame.php?f=gejala/p_edit" method="post" class="form-horizontal form-bordered ajaxformModal" data-target="#page-content">
		<fieldset>
		  <div class="form-group">
			<label class="col-md-2 control-label" for="nama_gejala">Nama Gejala <span class="text-danger">*</span></label>
			<div class="col-md-10">
			  <input type="text" id="nama_gejala" name="nama_gejala" class="form-control col-md-10" placeholder="Masukkan Nama Gejala.." value="<?= $isi->nama_gejala; ?>" />
			  <input type="hidden" id="id" name="id" value="<?= $isi->id_gejala; ?>" />
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-md-2 control-label" for="pertanyaan">Pertanyaan Baru <span class="text-danger">*</span></label>
			<div class="col-md-10">
				<textarea id="pertanyaan" name="pertanyaan" class="form-control col-md-10" placeholder="Masukkan Pertanyaan.."><?= $isi->pertanyaan; ?></textarea>
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