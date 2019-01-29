<!-- Intro -->
<section class="site-section site-section-light site-section-top themed-background-dark">
  <div class="container text-center">
    <h1 class="animation-slideDown"><strong>Formulir Konsultasi Penyakit Leukimia</strong></h1>
    <h2 class="h3 text-center animation-slideUp"><?php if(!empty($status_konsultasi)) { echo $status_konsultasi; } else { echo "Harap masukkan data diri anda & menjawab pertanyaan dengan benar!"; } ?></h2>
  </div>
</section>
<!-- END Intro -->

<!-- Checkout Process -->
<section class="site-content site-section">
  <div class="container">
    <div class="site-block" id="formulir">
     <form id="form-validation" action="frame.php?simpan=hasil_konsultasi" method="post" class="ajaxform" data-target="#formulir">

      <!-- END Step Info -->
      <div class="row">
        <div class="col-sm-12">
          <h4 class="page-header">Informasi Data Diri Pasien</h4>
          <div class="row">
            <div class="form-group col-sm-5">
              <label for="nama_pasien">Nama Lengkap</label>
              <input type="text" id="nama_pasien" name="nama_pasien" class="form-control" placeholder="Masukkan Nama Lengkap">
            </div>
            <div class="form-group col-sm-2">
              <label for="tgl_lahir">Tanggal Lahir</label>
              <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir">
            </div>
            <div class="form-group col-sm-2">
              <label for="umur">Umur</label>
              <input type="number" id="umur" name="umur" class="form-control" value="0" readonly="">
            </div>
            <div class="form-group col-sm-3">
              <label for="jk">Jenis Kelamin</label>
              <select id="jk" name="jk" class="form-control" size="1">
                <option value="">Silahkan Pilih Jenis Kelamin?</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat Rumah</label>
            <textarea id="alamat" name="alamat" class="form-control" rows="6"  placeholder="Masukkan Alamat Rumah.."></textarea>
          </div>
        </div>
        <div class="col-sm-12">
          <h4 class="page-header">Silahkan Jawab Pertanyaan</h4>
          <div class="row">
            <?php 
            $no     = 1;
            $gejala = $mysqli->query("SELECT * FROM gejala ORDER BY id_gejala ASC"); 
                // memulai perulangan untuk menampilkan data pengguna
            while ($kl = $gejala->fetch_object()) { ?>
              <div class="form-group col-sm-6">
                <label for=""><?= $no++ ?>. <?= $kl->pertanyaan ?></label>
                <select id="bobot_pasien" name="bobot_pasien[<?= $kl->id_gejala ?>]" class="form-control">
                  <option value="1">Sangat Pasti [ 100% ]</option>
                  <option value="0">Tidak Sakit [ 0% ] </option>
                  <option value="0.2">Tidak Tahu [ 20% ] </option>
                  <option value="0.4">Mungkin [ 40% ] </option>
                  <option value="0.6">Kemungkinan Besar [ 60% ] </option>
                  <option value="0.8">Pasti [ 80% ] </option>
                </select>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="form-group col-sm-12">
          <hr>
          <button type="submit" class="btn btn-lg btn-primary pull-right">Kirimkan Sekarang</button>
        </div>
      </div>
    </form>
    <!-- END Checkout Wizard Content -->
  </div>
</div>
</section>
<!-- END Checkout Process -->

<!-- Services Info -->
<section class="site-content site-section site-section-light themed-background-coral">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-12 push visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">
        <span class="h3"><i class="fa fa-info"></i> <br><strong>Perhatian!</strong><br>Nilai Yang Keluar Hanyalah Perkiraan Sementara Berdasarkan Jawaban Anda & Bobot Yang Berasal Dari Seorang Dokter Pakar. <br>Apabila Anda Terdiagnosa Penyakit Leukimia, Silahkan Periksa Kembali Ke Rumah Sakit Terdekat Untuk Memastikannya !</span>
      </div>
    </div>
  </div>
</section>
<!-- END Services Info -->
<script src="js/app.js?t=<?php echo $time; ?>"></script>
<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/PendaftaranOnline.js"></script>
<script>
  $(function(){ 
    FormsValidation.init();
  });
</script>