<?php
	// memasukkan konfigurasi database
	// filter inputan username
	$nama = trim($_POST['nama']);
	$nama = strip_tags($nama);
	$nama = htmlspecialchars($nama);
	// filter inputan password
	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);
	// filter inputan level
	$telepon = trim($_POST['telepon']);
	$telepon = strip_tags($telepon);
	$telepon = htmlspecialchars($telepon);
	// filter inputan nama
	$isi_pesan = trim($_POST['isi_pesan']);
	$isi_pesan = strip_tags($isi_pesan);
	$isi_pesan = htmlspecialchars($isi_pesan);
	// menggambil tanggal saat ini
	$tanggal = date('Y-m-d H:i:s');
	if(empty($nama) || empty($email) || empty($telepon) || empty($isi_pesan) ){
?><div id="error-container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 text-center">
        	<h1 class="animation-hatch"><i class="fa fa-times text-danger"></i> Gagal Mengirimkan Pesan</h1>
            <h2 class="h3">Harap Mengisi Pesan Dengan Benar Agar Dapat Kami Terima !</h2>
			<a href="javascript:void(0)" data-target="#page-dinamis" data-remote="frame.php?f=kritik-saran" class="btn btn-lg btn-info">Kirim Ulang Pesan</a>
        </div>
    </div>
</div><?php } else { // menyimpan data ke database
	$query =  $mysqli->query("INSERT INTO `pesan` (`nama`, `email`, `telepon`, `isi_pesan`, `tanggal`, `dibaca`) VALUES ('$nama', '$email', '$telepon', '$isi_pesan','$tanggal', 't')");}
	if($query){
?><div id="error-container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 text-center">
        	<h1 class="animation-hatch"><i class="fa fa-check text-success"></i> Berhasil Mengirim Pesan</h1>
            <h2 class="h3">Terima Kasih Telah Mengirimkan Pesan, Kami Akan Segera Menindaklanjuti/Membalas Kiriman Pesan Anda Melalui Email/Telepon</h2>
			<a href="javascript:void(0)" data-target="#page-dinamis" data-remote="frame.php?f=kritik-saran" class="btn btn-lg btn-info">Kirim Ulang Pesan</a>
        </div>
    </div>
</div><?php } ?>