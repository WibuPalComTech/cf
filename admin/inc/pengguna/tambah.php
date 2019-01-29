<div class="content-header">
	<div class="header-section">
		<h1>Management User</h1>
	</div>
</div>
<div class="block full" id="password-tab">
	<div class="block-title">
		<div class="block-options pull-right"><i class="gi gi-keys fa-2x"></i></div>
		<h2><strong>Tambah Pengguna Baru</strong></h2>
	</div>
	<!-- Awal Notifikasi -->
	<div id="notifikasi">
		<form id="form-validation" action="frame.php?f=pengguna/p_tambah" method="post" class="form-horizontal form-bordered ajaxform" data-target="#notifikasi">
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
						<input type="text" id="username" name="username" class="form-control col-md-10" placeholder="Masukkan Username..">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="password">Password <span class="text-danger">*</span></label>
					<div class="col-md-10">
						<input type="password" id="password" name="password" class="form-control col-md-10" placeholder="Masukkan Password .." />
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="ulangi_password">Ulangi Password <span class="text-danger">*</span></label>
					<div class="col-md-10">
						<input type="password" id="ulangi_password" name="ulangi_password" class="form-control col-md-10" placeholder="Masukkan Ulang Password .." />
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