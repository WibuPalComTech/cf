<div class="content-header">
  <div class="header-section">
    <h1>Laporan Hasil Konsultasi</h1>
  </div>
</div>
<div class="block full" id="password-tab">
  <div class="block-title">
  	<div class="block-options pull-right"><i class="gi gi-keys fa-2x"></i></div>
    <h2><strong>Laporan Hasil Konsultasi</strong></h2>
  </div>
  <!-- Awal Notifikasi -->
  <div id="notifikasi">
  <form id="form-validation" action="frame.php" method="get" class="form-horizontal form-bordered" target="_blank">
    <fieldset>
      <div class="form-group">
        <label class="col-md-4 control-label" for="tgl_awal">Tanggal Awal <span class="text-danger">*</span></label>
        <div class="col-md-4">
          <input type="hidden" name="f" value="laporan/pdf">
          <input type="date" id="tgl_awal" name="tgl_awal" class="form-control" placeholder="Tanggal Awal.." />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="tgl_akhir">Tanggal Akhir <span class="text-danger">*</span></label>
        <div class="col-md-4">
          <input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control" placeholder="Tanggal Akhir.." />
        </div>
      </div>
    </fieldset>
    <div class="form-group form-actions">
      <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-sm btn-primary" data-loading-text="Loading .."><i class="fa fa-arrow-right"></i> Submit</button>
      </div>
    </div>
  </form>
  </div>
  <!-- Akhir Notifikasi -->
</div>
<script>$(function() { FormsValidation.init("#form-validation");});</script> </div>
  </div>
</div>