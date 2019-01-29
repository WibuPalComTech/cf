<?php 
	// filter id dari get id
	$id = $mysqli->escape_string(@$_GET['id']);
	// memanggil data penyakit berdasarkan id dari method get yang didapat oleh sistem
	$data = $mysqli->query("select * from penyakit where id_penyakit='$id'");
	$isi  =	$data->fetch_object();
?><div class="modal-dialog">
  <div class="modal-content"> 
    <!-- Modal Header -->
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title"><i class="fa fa-trash-o"></i> Hapus Penyakit</h4>
    </div>
    <div class="modal-body">
	  <form id="form-validation" action="frame.php?f=penyakit/p_hapus" method="post" class="form-horizontal form-bordered ajaxformModal" data-target="#page-content">
		<fieldset>
		  <div class="form-group">
			<label class="col-md-3 control-label" for="pertanyaan">Peringatan <span class="text-danger">*</span></label>
			<div class="col-md-9">
			  <input type="hidden" id="id" name="id" value="<?= $isi->id_penyakit; ?>"/>
			  <span>Apakah Anda Yakin Ingin Menghapus Penyakit Ini ?</span>
			</div>
		  </div>
		</fieldset>
		<div class="form-group form-actions">
		  <div class="col-md-8 col-md-offset-3">
			<button type="submit" class="btn btn-danger" data-loading="Loading .." >Hapus Penyakit</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
		  </div>
		</div>
	  </form>
	</div>
  </div>
</div>
<script>$(function() { FormsValidation.init("#form-validation");});</script>