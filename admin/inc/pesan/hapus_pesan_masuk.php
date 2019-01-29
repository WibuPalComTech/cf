<?php 
// filter inputan id
$id = $mysqli->escape_string($_GET['id']);
$pesan = $mysqli->query("select pesan.* from pesan where id_pesan='$id'");
$datanya=$pesan->fetch_object();
?><div class="modal-dialog">
	<div class="modal-content"> 
		<!-- Modal Header -->
		<div class="modal-header text-center">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title"><i class="fa fa-trash-o"></i> Hapus Pesan</h4>
		</div>
		<div class="modal-body">
			<form id="form-validation" action="frame.php?f=pesan/simpan_hapus_pesan_masuk" method="post" class="form-horizontal form-bordered ajaxformModal" data-target="#page-content">
				<fieldset>
					<div class="form-group">
						<label class="col-md-3 control-label" for="pertanyaan">Peringatan <span class="text-danger">*</span></label>
						<div class="col-md-9">
							<input type="hidden" id="id" name="id" value="<?= $datanya->id_pesan; ?>"/>
							<span>Apakah Anda Yakin Ingin Menghapus Pesan Ini ?</span>
						</div>
					</div>
				</fieldset>
				<div class="form-group form-actions">
					<div class="col-md-8 col-md-offset-3">
						<button type="submit" class="btn btn-danger" data-loading="Loading .." >Hapus Pesan</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>$(function() { FormsValidation.init("#form-validation");});</script>