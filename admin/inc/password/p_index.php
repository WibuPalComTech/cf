<div id="notifikasi"><?php
	// filter inputan password lama
	$password_lama = $mysqli->escape_string(@$_POST['password_lama']);
	// filter inputan password baru
	$password_baru = $mysqli->escape_string(@$_POST['password_baru']);

	// memanggil username pada session untuk dijadikan variabel username
	$username = $_SESSION['UserID'];

	$pengguna = $mysqli->query("select pengguna.* from pengguna WHERE username='$username' and password= md5('$password_lama')");

	if($pengguna->num_rows==1){
		$query =  $mysqli->query("UPDATE `pengguna` SET `password` = md5('$password_baru') WHERE `pengguna`.`username` = '$username';"); 
	}
	if(@$query){
?>	<div class="alert alert-success alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <h4><i class="fa fa-info-circle"></i> Password Berhasil Diperbarui !</h4>
	</div><?php } else { ?>
	<div class="alert alert-warning alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <h4><i class="fa fa-info-circle"></i> Password Gagal Diperbarui, Silahkan Hubungi Admin !</h4>
	</div><?php } ?>
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
</div>
<script>$(function() { FormsValidation.init("#form-validation");});</script> </div>
  </div>
</div>