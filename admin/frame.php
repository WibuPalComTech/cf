<?php
	// error_reporting(0);
	session_start();

	if ($_SESSION['login']!=true) {
    echo "<script>location.href='index.php'</script>";
    exit();
  }
  
  // cek hak akses
	$hak_akses = $_SESSION['Level'];
	$level 		 = $hak_akses;

	include "../config-database.php";

	// mendeskripsikan parameter halaman dinamis
	$halaman = @$_GET['f'];

	// halaman dinamis berdasarkan parameter f
	if (!(in_array($halaman, $semua_halaman))) {
		// jika tidak ada didalam list semua_halaman
		// echo "<h1>$halaman</h1>";
		include "./inc/error-page/404.php";
	} else if (in_array($halaman, $cek_akses) && preg_match("/^[a-zA-Z\/_-]*$/",$halaman) ) {
		$xor_key = mt_rand(1000,9999);
		// jika memiliki akses
		include "./inc/".$halaman.".php";
	} else {
		// jika tidak memiliki akses
		include "./inc/error-page/403.php";
	}

?>