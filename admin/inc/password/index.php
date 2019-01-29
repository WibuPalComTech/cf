<div class="content-header">
  <div class="header-section">
    <h1>Pengaturan Password</h1>
  </div>
</div>
<div class="block full" id="password-tab">
  <div class="block-title">
  	<div class="block-options pull-right"><i class="gi gi-keys fa-2x"></i></div>
    <h2><strong>Ganti Password</strong></h2>
  </div>
  <!-- Awal Notifikasi -->
  <div id="notifikasi">
  <form id="form-validation" action="frame.php?f=password/p_index" method="post" class="form-horizontal form-bordered ajaxform" data-target="#notifikasi">
    <fieldset>
      <div class="form-group">
        <label class="col-md-4 control-label" for="password_lama">Password Lama <span class="text-danger">*</span></label>
        <div class="col-md-4">
          <input type="password" id="password_lama" name="password_lama" class="form-control" placeholder="Password Lama.." />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="password_baru">Password Baru <span class="text-danger">*</span></label>
        <div class="col-md-4">
          <input type="password" id="password_baru" name="password_baru" class="form-control" placeholder="Password Baru.." />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="ulang_password_baru">Ulang Password Baru <span class="text-danger">*</span></label>
        <div class="col-md-4">
          <input type="password" id="ulang_password_baru" name="ulang_password_baru" class="form-control" placeholder="Ulang Password Baru.." />
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