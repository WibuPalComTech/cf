<?php 
// memulai session
session_start(); 
$time = time();
include "./config-database.php";
// header('Server: Apache');
?><!DOCTYPE html>
<!--[if IE 9]><html class="no-js lt-ie10" lang="en"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Sistem Pakar Penyakit Leukimia Menggunakan Metode Forward Chaining & Certainty Factor</title>
	<meta name="description" content=" Sistem Pakar Penyakit Leukimia Menggunakan Metode Forward Chaining & Certainty Factor">
	<meta name="author" content="Sistem Pakar Penyakit Leukimia Menggunakan Metode Forward Chaining & Certainty Factor">
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

	<!-- Icons -->
	<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="apple-touch-icon" href="img/icon180.png" sizes="180x180">
	<!-- END Icons -->

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/main.css?t=<?php echo $time; ?>">
	<link rel="stylesheet" href="css/themes.css">
	<!-- END Stylesheets -->
	<script src="js/vendor/modernizr.min.js"></script>
	<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
	<script src="js/vendor/jquery.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/pages/formsValidation.js"></script> 
</head>
<body id="mybody">
	<!-- Page Container -->
	<div id="page-container">
		<!-- Site Header -->
		<header>
			<div class="container">
				<!-- Site Logo -->
				<a href="javascript:void(0)" data-target="#page-dinamis" data-remote="frame.php?f=beranda" class="site-logo" style="display: block">
					<img src="img/pdam-icon.png" height="32px" style="margin-top:-10px;"/> <strong>Sistem Pakar Penyakit Leukimia</strong>
				</a>
				<!-- Site Logo -->
				<!-- Site Navigation -->
				<nav>
					<!-- Menu Toggle -->
					<!-- Toggles menu on small screens -->
					<a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">
						<i class="fa fa-bars"></i>
					</a>
					<!-- END Menu Toggle -->

					<!-- Main Menu -->
					<ul class="site-nav">
						<li class="visible-xs visible-sm">
							<a href="javascript:void(0)" class="site-menu-toggle text-center">
								<i class="fa fa-times"></i>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)" data-target="#page-dinamis" data-remote="frame.php?f=beranda" class="active">Beranda</a>
						</li>
						<li>
							<a href="javascript:void(0)" data-target="#page-dinamis" data-remote="frame.php?f=konsultasi">Konsultasi</a>
						</li>
						<li>
							<a href="javascript:void(0)" data-target="#page-dinamis" data-remote="frame.php?f=kritik-saran">Kirim Pesan</a>
						</li>
					</ul>
					<!-- END Main Menu -->
				</nav>
				<!-- END Site Navigation -->
			</div>
		</header>
		<!-- END Site Header -->
		<div class="" id="page-dinamis">
			<!-- Ini Isi Halaman Dinamis -->
			<?php include "./inc/halaman-umum/beranda.php"; ?>
		</div>
		<!-- Footer -->
		<footer class="site-footer site-section">
			<div class="container">
				<!-- Footer Links -->
				<div class="row">
					<div class="col-lg-12">
						<h4 class="footer-heading"><span id="year-copy"></span> &copy; Sistem Pakar Penyakit Leukimia Menggunakan Metode Forward Chaining & Certainty Factor</h4>
						<ul class="footer-nav list-inline">
							<li>&copy; STMIK PalComTech [Jl. Jend. Basuki Rachmat No.5, 20 Ilir D II, Ilir Tim. I, Kota Palembang, Sumatera Selatan 30151] </li>
						</ul>
					</div>
				</div>
				<!-- END Footer Links -->
			</div>
		</footer>
		<!-- END Footer -->
	</div>
	<!-- END Page Container -->

	<div id="modal-terms" class="modal" tabindex="-1" role="dialog" aria-hidden="true"></div>

	<a href="#" id="to-top"><i class="fa fa-angle-up"></i></a>


	<script src="js/plugins.js"></script>
	<script src="js/app.js?t=<?php echo $time; ?>"></script>
	<script src="js/custom.js?t=<?php echo $time; ?>"></script>

</body>
</html>