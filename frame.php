<?php
// memulai session
session_start();
include "./config-database.php";
// f adalah parameter untuk tampilan utama
// variabel f didapat dari method GET f
$f=@$_GET["f"];
// jika variabel f tidak kosong maka akan tampil halaman yg diminta
if (!empty($f)){
	// jika ada paramater
	switch ($f) {
		// isi paramater f
		case 'beranda':
		// isi file dari paramater f
		include "./inc/halaman-umum/beranda.php";
		break;
		case 'kritik-saran':
		include "./inc/halaman-umum/kritik_saran.php";
		break;
		case 'kirim-pesan':
		include "./inc/halaman-umum/kirim_pesan.php";
		break;
		case 'konsultasi':
		include "./inc/konsultasi/konsultasi.php";
		break;
		// jika paramater tidak sesuai
		default:
		// tampil halaman tidak ditemukan
		include "./inc/error-page/404.php";
		break;
	}
}

// simpan adalah parameter untuk file simpan data
// variabel simpan didapat dari method GET simpan
$simpan=@$_GET["simpan"];
// jika variabel simpan tidak kosong maka akan tampil halaman yg diminta
if (!empty($simpan)){
	// jika ada paramater simpan
	switch ($simpan) {
		// isi paramater simpan
		case 'hasil_konsultasi':
		// isi file dari paramater simpan
		include "./inc/konsultasi/hasil_konsultasi.php";
		break;
		// jika paramater tidak sesuai
		default:
		// tampil halaman tidak ditemukan
		include "./inc/error-page/404.php";
		break;
	}
}
?>
