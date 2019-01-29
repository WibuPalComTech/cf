<!-- Media Container -->
<div class="media-container">
  <!-- Intro -->
  <section class="site-section site-section-light site-section-top">
    <div class="container">
      <!-- Untuk Start Ukuran PC -->
      <h2 class="text-right animation-slideDown hidden-xs"><strong>Selamat Datang Di Website Sistem Pakar Penyakit Leukimia</strong></h2>
      <h4 class="text-right animation-slideUp push hidden-xs"> Menggunakan Metode Forward Chaining & Certainty Factor</h4>
      <!-- Untuk End Ukuran PC -->
      <!-- Untuk Start Ukuran Mobile -->
      <h4 class="text-right animation-slideDown hidden-lg hidden-md"><strong>Selamat Datang Di Website Sistem Pakar Penyakit Leukimia</strong></h4>
      <h5 class="text-right animation-slideUp push hidden-lg hidden-md"> Menggunakan Metode Forward Chaining & Certainty Factor</h5>
      <!-- Untuk End Ukuran Mobile -->
    </div>
  </section>
  <!-- END Intro -->
  <!-- For best results use an image with a resolution of 2560x279 pixels -->
  <img src="img/pdam/122.jpg" alt="" class="media-image animation-pulseSlow">
</div>
<!-- END Media Container -->
  <?php 
    $data = $mysqli->query("SELECT * FROM penyakit");
    $no         =   1;
    while ($isi = $data->fetch_object()) { 
  ?>
  <!-- Step 1 Header -->
  <section class="site-content site-section site-section-light themed-background">
    <div class="container">
      <div class="site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">
        <h4 class="site-heading"><i class="fa fa-hospital-o"></i> <strong> Penyakit <?= $isi->nama_penyakit ?></strong></h4>
      </div>
    </div>
  </section>
  <!-- END Step 1 Header -->

  <!-- Step 1 -->
  <section class="site-content site-section site-slide-content">
    <div class="container">
      <div class="site-block visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick" data-element-offset="-100">
        <div class="col-sm-6 col-md-6 site-block text-justify">
          <h4><strong>Informasi</strong></h4>
          <?= $isi->info ?>
        </div>
        <div class="col-sm-6 col-md-6 site-block text-justify">
          <h4><strong>Solusi</strong></h4>
          <?= $isi->solusi ?>
        </div>
      </div>
    </div>
  </section>
  <!-- END Step 1 -->
  <?php } ?>
  <script src="js/jquery.vide.min.js"></script>
  <script src="js/pages/animated.js"></script>
