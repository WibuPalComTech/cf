<?php 
	// mengambil data klinik
	$klinik = $mysqli->query("select * from klinik"); 
?>
<div class="content-header">
  <div class="header-section">
    <h1>Management Penyakit</h1>
  </div>
</div>
<div class="block full" id="info-tab">
  <div class="block-title">
  	<div class="block-options pull-right"><i class="gi gi-keys fa-2x"></i></div>
    <h2><strong>Tambah Penyakit Baru</strong></h2>
  </div>
  <!-- Awal Notifikasi -->
  <div id="notifikasi">
  <form id="form-validation" action="frame.php?f=penyakit/p_tambah" method="post" class="form-horizontal form-bordered ajaxform" data-target="#notifikasi">
    <fieldset>
		  <div class="form-group">
			<label class="col-md-2 control-label" for="nama_penyakit">Nama Penyakit <span class="text-danger">*</span></label>
			<div class="col-md-10">
			  <input type="text" id="nama_penyakit" name="nama_penyakit" class="form-control col-md-10" placeholder="Masukkan Nama Penyakit..">
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-md-2 control-label" for="solusi">Solusi <span class="text-danger">*</span></label>
			<div class="col-md-10">
        <textarea id="solusi" name="solusi" class="form-control col-md-10" placeholder="Masukkan Solusi .."></textarea>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-md-2 control-label" for="info">Info <span class="text-danger">*</span></label>
			<div class="col-md-10">
        <textarea id="info" name="info" class="form-control col-md-10" placeholder="Masukkan Info .."></textarea>
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