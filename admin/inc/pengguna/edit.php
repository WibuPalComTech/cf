<?php 
	// filter id dari get id
$id = $mysqli->escape_string(@$_GET['id']);

	// mengambil data klinik
$klinik = $mysqli->query("select * from klinik");

	// memanggil data tanyajawab berdasarkan id dari method get yang didapat oleh sistem
$data = $mysqli->query("select * from pengguna where kd_pengguna='$id'");
$isi  =	$data->fetch_object();
?><div class="modal-dialog modal-lg">
	<div class="modal-content"> 
		<!-- Modal Header -->
		<div class="modal-header text-center">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title"><i class="fa fa-pencil"></i> Edit Pengguna</h4>
		</div>
		<div class="modal-body">
			<form id="form-validation" action="frame.php?f=pengguna/p_edit" method="post" class="form-horizontal form-bordered ajaxformModal" data-target="#page-content">
				<fieldset>
					<div class="form-group">
						<label class="col-md-2 control-label" for="status">Status <span class="text-danger">*</span></label>
						<div class="col-md-10">
							<select id="status" name="status" class="form-control">
								<option value="">Silahkan Pilih Hak Status</option>
								<option value="aktif">Aktif</option>
								<option value="nonaktif">Non Aktif</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="username">Username <span class="text-danger">*</span></label>
						<div class="col-md-10">
							<input type="text" id="username" name="username" class="form-control col-md-10" placeholder="Masukkan Username.." value="<?php echo $isi->username; ?>" />
							<input type="hidden" id="id" name="id" value="<?php echo $isi->kd_pengguna; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="password">Password Baru <span class="text-danger">*</span></label>
						<div class="col-md-10">
							<input type="password" id="password" name="password" class="form-control col-md-10" placeholder="Masukkan Password Baru Jika Ingin Merubah Password.." />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="ulangi_password">Ulangi Password Baru <span class="text-danger">*</span></label>
						<div class="col-md-10">
							<input type="password" id="ulangi_password" name="ulangi_password" class="form-control col-md-10" placeholder="Masukkan Ulang Password Baru.." />
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
	$('#status').val('<?php echo $isi->status; ?>');
</script>