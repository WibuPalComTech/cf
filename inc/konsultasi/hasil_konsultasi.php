<?php 
  // mengambil data pasien, dan gejala
$pasien = $mysqli->query("SELECT * FROM pasien INNER JOIN klinik USING(`id_klinik`)"); 
$gejala = $mysqli->query("SELECT * FROM gejala"); 
?>
<div class="block full">
  <h4 class="page-header">Hasil Konsultasi <?= @$_POST['nama_pasien'] ?> (<?= @$_POST['umur'] ?> Tahun)</h4>
  <div class="tab-content">
    <div class="row">
      <?php 
      $nama_pasien = $mysqli->escape_string(@$_POST['nama_pasien']);
      $tgl_lahir   = $mysqli->escape_string(@$_POST['tgl_lahir']);
      $umur        = $mysqli->escape_string(@$_POST['umur']);
      $alamat      = $mysqli->escape_string(@$_POST['alamat']);
      $jk          = $mysqli->escape_string(@$_POST['jk']);
      $tanggal     = date('Y-m-d H:i:s');
      $value_query = '';
      $value_hasil = '';
      $penyakit    = $mysqli->query("SELECT * FROM penyakit");
      $i = 1;
      // insert data pasien
      $mysqli->query("INSERT INTO `pasien`(`id_pasien`, `nama_pasien`, `tgl_lahir`, `umur`, `alamat`, `jk`, `tanggal`) VALUES (NULL,'$nama_pasien','$tgl_lahir','$umur','$alamat','$jk', '$tanggal')");
      // id pasien
      $id_pasien   = $mysqli->insert_id;
      // memulai perulangan untuk menampilkan data penyakit
      echo '<div class="col-sm-8 pull-right" id="tampil">';
      while ($p = $penyakit->fetch_object()) {
        echo '<div class="col-sm-12">';
        echo '<div class="col-sm-5">';
        // inisiasi nilai awal CF pada masing-masing penyakit
        $hasil_cf[$i]     = 0;
        $lastID           = 0;
        $id_penyakit[$i]  = $p->id_penyakit;
        $kd_hasil         = $id_penyakit[$i] . $id_pasien;
        $p_pasien         = strlen($id_pasien);
        $p_penyakit       = strlen($id_penyakit[$i]);
        $jml_char         = $p_pasien+$p_penyakit;
        $penyakitNya[$i]  = $p->nama_penyakit;

        // memeriksa kode hasil terbaru
        $hasil        = $mysqli->query("SELECT MAX(id_hasil) AS code FROM hasil WHERE id_hasil LIKE '$kd_hasil%'");
        $cekID        = $hasil->fetch_object();
        $lastID       = (int) substr($cekID->code, $jml_char, 5);
        $kode         = $kd_hasil . ($lastID+1);
        $id_hasil[$i] = $kode;
        // menampilkan nama penyakit
        echo '<u><b>Penyakit ' . $p->nama_penyakit . "</b></u><br>";
        $detail_perhitungan[$i] = '';
        $ii = 1;
        $relasi      = $mysqli->query("SELECT * FROM relasi WHERE id_penyakit='".$id_penyakit[$i]."'");
        $case_cf = true;
        while ($r = $relasi->fetch_object()) {
          $id_relasi    = $r->id_relasi;
          $id_gejala    = $r->id_gejala;
          $cf           = $r->bobot_pakar * $_POST['bobot_pasien'][$id_gejala];
          $bobot_pasien = $_POST['bobot_pasien'][$id_gejala];

          echo "CF". $ii . " = BPakar G$ii x BUser G$ii<br>";;
          echo "CF". $ii . " = " . substr($r->bobot_pakar,0,4) . " x " . $_POST['bobot_pasien'][$id_gejala] . "<br>";;
          echo "CF". $ii . " = " . $cf;

          // memasukkan data ke table konsultasi
          $value_query .= "(NULL,'$id_relasi','$kode','$bobot_pasien','$cf'),";
          
          if ($ii==1 && hitung_cf($hasil_cf[$i], $cf)!=0) { 
            // inisiasi CF Pertama;
            $hasil_cf[$i] = hitung_cf($hasil_cf[$i], $cf);
          } else if ($cf == 0 || $case_cf == false) {
            // Tidak melakukan perhitungan jika nilai CF = 0
            $detail_perhitungan[$i] .= "Hasil CF<small>$ii</small> = Tidak Diketahui (Forward Chaining) <br>";
            $hasil_cf[$i] = 0;
            $case_cf = false;
          } else {
            $detail_perhitungan[$i] .= "Hasil CF<small>$ii</small> = Hasil CF<small>".($ii-1)."</small> + CF$ii x (1 - CF$ii) <br>";
            $detail_perhitungan[$i] .= "Hasil CF<small>$ii</small> = " . $hasil_cf[$i] . " + $cf x (1 - $cf) <br>";
            $detail_perhitungan[$i] .= "Hasil CF<small>$ii</small> = <b>" . ($hasil_cf[$i] = hitung_cf($hasil_cf[$i], $cf)) . "</b><br>";
          }
          $nilai_hasil_cf[$i] = array('id_penyakit' => $id_penyakit[$i], 'nama_penyakit' => $penyakitNya[$i], 'hasil' => $hasil_cf[$i], 'id_hasil'=> $id_hasil[$i]);
          echo "<br>";
          $ii++;
        }
        echo '<br>';
        echo '</div>';
        echo '<div class="col-sm-7">';
        echo '<br>';
        echo $detail_perhitungan[$i];
        echo '<br></div>';
        echo '<br>';
        echo '</div>';
        $i++;
      }
      echo '</div>';
      echo '<div class="col-sm-4">';
      $nilai_tertinggi = max(array_column($nilai_hasil_cf, 'hasil'));
      if ($nilai_tertinggi!=0) {
        $sorted_data = orderBy($nilai_hasil_cf, 'hasil');
        $clength = count($sorted_data);
        $urutanKe = array_search($nilai_tertinggi, array_column($sorted_data, 'hasil'));
        echo "<h4>Pasien Diidentifikasi Terkena Penyakit <br><br><b><u>" . $sorted_data[$urutanKe]['nama_penyakit'] . " : " . ($nilai_tertinggi*100) . "%";
        echo '</u></b></h4><br><br>';

        for($x = 0; $x < $clength; $x++) {

          // if ($sorted_data[$x]['hasil']!=0) {
          //   echo $x+1 . ". " . $sorted_data[$x]['nama_penyakit'] . " : " . $sorted_data[$x]['hasil'];
            
          // } else {
          //   echo $x+1 . ". " . $sorted_data[$x]['nama_penyakit'] . " : Tidak Teridentifikasi";
          // }
          // echo "<br>";
          // memasukkan data ke table hasil
          $value_hasil .= "('".$sorted_data[$x]['id_hasil']."','".$sorted_data[$x]['id_penyakit']."','$id_pasien','".$sorted_data[$x]['hasil']."','".($x+1)."'),";
        }
      } else {
        echo "Pasien Tidak Teridentifikasi Penyakit Apapun <br><br><b>";
      }
      echo '<br><button type="submit" id="timbul" class="btn btn-sm btn-danger">Sembunyikan Rincian Perhitungan</button>';
      echo '</div>';
      $mysqli->query("INSERT INTO `hasil`(`id_hasil`, `id_penyakit`, `id_pasien`, `nilai_hasil`, `possible_disease`) VALUES " . substr($value_hasil,0,-1));
      $mysqli->query("INSERT INTO `konsultasi`(`id_konsultasi`, `id_relasi`, `id_hasil`, `bobot_pasien`, `nilai_cf`) VALUES " . substr($value_query,0,-1));
      ?>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $("#timbul").click(function () {
      var query = $("#tampil");
      var isVisible = query.is(':visible');
      if (isVisible === true) {
        $('#tampil:visible').hide();
        $('#timbul').html("Tampil Rincian Perhitungan");
        $('#timbul').removeClass('btn-danger').addClass('btn-success');
      } else {
        $('#tampil:hidden').show();
        $('#timbul').html("Sembunyikan Rincian Perhitungan");
        $('#timbul').removeClass('btn-success').addClass('btn-danger');
      }
    });
  });
</script>