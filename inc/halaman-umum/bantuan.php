<?php 
	// memulai session
	session_start(); 
	// memasukkan konfigurasi database
	include "./config-database.php";
?><!-- Media Container -->
<div class="media-container">
    <!-- Intro -->
    <section class="site-section site-section-light site-section-top">
        <div class="container">
            <h1 class="text-center animation-slideDown"><i class="fa fa-building-o"></i> <strong>Bantuan</strong></h1>
            <h2 class="h3 text-center animation-slideUp"><strong>Berikut adalah daftar pertanyaan dan jawaban yang sering disampaikan oleh pelanggan dan calon pelanggan kami!</strong></h2>
        </div>
    </section>
    <!-- END Intro -->
</div>
<!-- END Media Container -->

<!-- Company Info -->
<section class="site-content site-section">
    <div class="container">
        <div class="row">
			<?php 
			// memanggil data dari tabel tanyajawab yang ada pada database
			$tanyajawab = mysql_query("select tanyajawab.* from tanyajawab");
			// melihat jumlah data pada tabel tanyajawab pada database
			$jumlahtanyajawab=mysql_num_rows($tanyajawab);
			if($jumlahtanyajawab > 0){
			// memulai perulangan untuk menampilkan data tanyajawab
			while($isi = mysql_fetch_array($tanyajawab) ) {  ?><div class="col-sm-4 col-md-4">
               <div class="site-block">
                    <h3 class="site-heading"><strong><?php echo $isi[pertanyaan]; ?></strong></h3>
                    <p><strong>Jawaban</strong> : <?php echo substr($isi[jawaban],0,125); if(strlen($isi[jawaban])>125){ echo " ... ... ...";}?></p><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-terms" data-remote="frame.php?f=detailjawaban&id=<?php echo $isi[id]; ?>"><strong>Baca Selengkapnya ...</strong></a>
                </div>
            </div><?php }}else{ ?><div class="col-lg-12">
               <div class="site-block">
					</br></br></br>
                    <h1 class="site-heading text-center"><strong>Data Belum Dimasukkan !</strong></h1>
					</br></br></br>
            </div><?php } ?>
        </div>
    </div>
</section>
<!-- END Company Info -->