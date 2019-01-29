<?php
session_start();
session_destroy();
?><!DOCTYPE html>
<!--[if IE 9]><html class="no-js lt-ie10" lang="en"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Sistem Pakar Penyakit Leukimia Menggunakan Metode Forward Chaining & Certainty Factor</title>
<meta name="description" content="Sistem Pakar Penyakit Leukimia Menggunakan Metode Forward Chaining & Certainty Factor" />
<meta name="author" content="Wibu-PalComTech" />
<meta name="robots" content="noindex, nofollow" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />
<link rel="shortcut icon" href="img/favicon.ico" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/plugins.css" />
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="css/themes.css" />
<script src="js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div id="login-container" class="animation-fadeIn">
  <div class="block">
    <div class="block-title">
      <div class="block-options pull-right"><i class="gi gi-lock fa-2x"></i></div>
      <h2>Login Sistem Pakar Penyakit Leukimia</h2>
    </div>
      <?php if(@$_GET['login']=="fail") { ?><div class="alert alert-danger"><i class="fa fa-times-circle"></i> Username atau Password Anda Salah !</div><?php } ?> 	
    <form action="login.php" method="post" id="form-login" class="form-horizontal" />
    <div class="form-group">
      <div class="col-xs-12">
        <div class="input-group"> <span class="input-group-addon"><i class="gi gi-user"></i></span>
          <input type="text" id="login-username" name="username" class="form-control input-lg" placeholder="Username" required />
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-xs-12">
        <div class="input-group"> <span class="input-group-addon"><i class="gi gi-keys"></i></span>
          <input type="password" id="login-password" name="password" class="form-control input-lg" placeholder="Password" required />
        </div>
      </div>
    </div>
    <div class="form-group form-actions">
      <div class="col-xs-8 text-right">
        <button type="submit" class="btn btn-sm btn-primary">Login to Dashboard</button>
      </div>
    </div>
    </form>
  </div>
</div>
<script src="js/vendor/jquery-1.11.0.min.js"></script> 
<script src="js/vendor/bootstrap.min.js"></script> 
<script src="js/plugins.js"></script> 
<script src="js/app.js"></script>
</body>
</html>