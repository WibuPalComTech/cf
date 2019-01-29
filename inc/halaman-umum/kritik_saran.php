<!-- Intro -->
<section class="site-section site-section-light site-section-top themed-background-dark">
  <div class="container">
    <h1 class="text-center animation-slideDown"><i class="fa fa-envelope"></i> <strong>Silahkan Kirimkan Pesan</strong></h1>
    <h2 class="h3 text-center animation-slideUp">Kami Akan Dengan Senang Hati Merespon Seluruh Pesan Yang Anda Kirimkan Dan Melayani Anda Dengan Baik!</h2>
  </div>
</section>
<!-- END Intro -->

<!-- Contact -->
<section class="site-content site-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4 site-block">
        <!-- <div class="site-block">
          <h3 class="h2 site-heading"><strong>Sistem Pakar</strong> Penyakit Leukimia</h3>
          <address>
            Jl. Jend. Basuki Rachmat No.5, 20 Ilir D II, Ilir Tim. I, Kota Palembang, Sumatera Selatan 30151<br><br>
            <i class="fa fa-phone"></i> 0852 333 333 01<br>
            <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">doni_dimas1029@gmail.com</a>
          </address>
        </div> -->
        <div class="site-block">
          <h3 class="h2 site-heading"><strong>Penyakit</strong> Leukimia</h3>
          <p class="remove-margin text-justify">
            <strong>&ensp;&ensp; Kanker darah atau Leukemia </strong>adalah kanker yang menyerang sel-sel darah putih. Sel darah putih merupakan sel darah yang berfungsi melindungi tubuh terhadap benda asing atau penyakit. Sel darah putih ini dihasilkan oleh sumsum tulang belakang.
            <br>
            <br>
            &ensp;&ensp; Pada kondisi normal, sel-sel darah putih akan berkembang secara teratur di saat tubuh membutuhkannya untuk memberantas infeksi yang muncul. Namun lain halnya dengan pengidap kanker darah. Sumsum tulang akan memproduksi sel-sel darah putih yang abnormal, tidak dapat berfungsi dengan baik, dan secara berlebihan. Jumlahnya yang berlebihan akan mengakibatkan penumpukan dalam sumsum tulang sehingga sel-sel darah yang sehat akan berkurang.
            <br>
            <br>
            &ensp;&ensp; Selain menumpuk, sel abnormal tersebut juga dapat menyebar ke organ lain, seperti hati, limfa, paru-paru, ginjal, bahkan hingga ke otak dan tulang belakang.
          </p>
        </div>
      </div>
      <div class="col-sm-6 col-md-8 site-block">
        <div class="col-sm-12" id="pesan-masuk">
          <h3 class="h2 site-heading"><strong>Kirim Pesan :</strong></h3>
          <form id="form-validation" action="frame.php?f=kirim-pesan" method="post" class="form-horizontal ajaxform" data-target="#pesan-masuk">
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" id="nama" name="nama" class="form-control input-lg" placeholder="Nama Lengkap Anda..">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" id="email" name="email" class="form-control input-lg" placeholder="Email Anda..">
            </div>
            <div class="form-group">
              <label for="telepon">Telepon</label>
              <input type="text" id="telepon" name="telepon" class="form-control input-lg" placeholder="No. Telepon Anda..">
            </div>
            <div class="form-group">
              <label for="isi_pesan">Pesan</label>
              <textarea id="isi_pesan" name="isi_pesan" rows="7" class="form-control input-lg" placeholder="Masukkan Pesan Anda Disini ..."></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-lg btn-primary">Kirimkan Pesan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END Contact -->
<script>$(function(){FormsValidation.init();});</script>
