<?php

// dont change this file
// setting default wilayah waktu
date_default_timezone_set('Asia/Jakarta');
$tanggal	=	date('Y-m-d');
$jam			=	date('H:i:s');
$forcache	=	date('ymd');

// array untuk jenis kelamin
$gender = array('L'=>'Laki-Laki','P'=>'Perempuan');

// Informasi Koneksi SQL Server
$sql_details = array(
	'host' => 'localhost',
	'user' => 'root',
	'pass' => '12345678',
	'db'   => 'sispak_cf'
);

// membuat koneksi database
$mysqli = new mysqli($sql_details['host'], $sql_details['user'], $sql_details['pass'], $sql_details['db']);

/* memerikas koneksi database */
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

// mendefinisikan semua halaman
$semua_halaman = array(
	"dashboard/index",
	"pengguna/index","pengguna/tambah","pengguna/p_tambah","pengguna/edit","pengguna/p_edit","pengguna/hapus","pengguna/p_hapus",
	"penyakit/index","penyakit/tambah","penyakit/p_tambah","penyakit/edit","penyakit/p_edit","penyakit/hapus","penyakit/p_hapus",
	"gejala/index","gejala/tambah","gejala/p_tambah","gejala/edit","gejala/p_edit","gejala/hapus","gejala/p_hapus",
	"klinik/index","klinik/tambah","klinik/p_tambah","klinik/edit","klinik/p_edit","klinik/hapus","klinik/p_hapus",
	"pasien/index","pasien/tambah","pasien/p_tambah","pasien/edit","pasien/p_edit","pasien/hapus","pasien/p_hapus",
	"pakar/index","pakar/tambah","pakar/p_tambah","pakar/edit","pakar/p_edit","pakar/hapus","pakar/p_hapus",
	"relasi/index","relasi/tambah","relasi/p_tambah","relasi/edit","relasi/p_edit","relasi/hapus","relasi/p_hapus",
	"konsultasi/tambah","konsultasi/p_tambah","konsultasi/hasil","konsultasi/detail",
	"pesan/pesan_belum_dibaca","pesan/semua_pesan_masuk","pesan/edit_pesan_belum_dibaca","pesan/hapus_pesan_masuk","pesan/simpan_hapus_pesan_masuk",
	"laporan/hasil","laporan/pdf",
	"password/index","password/p_index"
);



// mendefinisikan halaman apa saja yang dapat diakses oleh pengguna
switch (@$hak_akses) {
	// jika hak akses adalah admin
	case 'aktif':
	$cek_akses = array( 
		"dashboard/index",
		"pengguna/index","pengguna/tambah","pengguna/p_tambah","pengguna/edit","pengguna/p_edit","pengguna/hapus","pengguna/p_hapus",
		"penyakit/index","penyakit/tambah","penyakit/p_tambah","penyakit/edit","penyakit/p_edit","penyakit/hapus","penyakit/p_hapus",
		"gejala/index","gejala/tambah","gejala/p_tambah","gejala/edit","gejala/p_edit","gejala/hapus","gejala/p_hapus",
		"klinik/index","klinik/tambah","klinik/p_tambah","klinik/edit","klinik/p_edit","klinik/hapus","klinik/p_hapus",
		"pasien/index","pasien/tambah","pasien/p_tambah","pasien/edit","pasien/p_edit","pasien/hapus","pasien/p_hapus",
		"pakar/index","pakar/tambah","pakar/p_tambah","pakar/edit","pakar/p_edit","pakar/hapus","pakar/p_hapus",
		"relasi/index","relasi/tambah","relasi/p_tambah","relasi/edit","relasi/p_edit","relasi/hapus","relasi/p_hapus",
		"konsultasi/tambah","konsultasi/p_tambah","konsultasi/hasil","konsultasi/detail",
		"pesan/pesan_belum_dibaca","pesan/semua_pesan_masuk","pesan/edit_pesan_belum_dibaca","pesan/hapus_pesan_masuk","pesan/simpan_hapus_pesan_masuk",
		"laporan/hasil","laporan/pdf",
		"password/index","password/p_index"
	);
	break;
	// jika hak akses pakar
	case 'pakar':
	$cek_akses = array( 
		"dashboard/index",
		"pengguna/index","pengguna/tambah","pengguna/edit","pengguna/hapus",
		"password/index"
	);
	break;

	default:
	$cek_akses = array("dashboard/index","password/index");
	break;
}


function hitung_cf($cf1,$cf2){
	if ($cf1 >=0 && $cf2 >=0){
		return $kombinasi = $cf1 + $cf2*(1-$cf1);
	}
	else if ($cf1 < 0 || $cf2 <0 ) {
		return $kombinasi = ($cf1+$cf2)/(1 -min(abs($cf1),abs($cf2)));
	}
	else if ($cf1<0 && $cf2 <0){
		$kombinasi =  $cf1 + $cf2*(1+$cf1);
	}
	return $kombinasi;
}

function orderBy($data, $field){
	$code = "return strcasecmp(\$b['$field'], \$a['$field']);";
	usort($data, create_function('$a,$b', $code));
	return $data;
}
// echo hitung_cf(0.76, 0.4);