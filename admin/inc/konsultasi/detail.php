<?php 
// mengambil data hasil berdasarkan id_hasil
$id_hasil = $_GET['id'];
$hasil = $mysqli->query("SELECT * FROM hasil INNER JOIN pasien USING(`id_pasien`) WHERE id_hasil = '$id_hasil' "); 
$data_hasil = $hasil->fetch_object();
$id_pasien = $data_hasil->id_pasien;
$nama_pasien = $data_hasil->nama_pasien;
$umur = $data_hasil->umur;
$tanggal = $data_hasil->tanggal;
// mengambil data gejala
$gejala = $mysqli->query("SELECT * FROM gejala"); 
?>
<div class="content-header">
	<div class="header-section">
		<h1>Konsultasi</h1>
	</div>
</div>
<div class="block full">
	<div class="block-title">
		<div class="block-options pull-right"><i class="gi gi-keys fa-2x"></i></div>
		<h2><strong>Hasil Konsultasi <?= $nama_pasien ?> ( <?= $umur ?> Tahun )</strong></h2>
	</div>
	<div class="tab-content">
		<div class="row">
			<?php 
			$penyakit		 = $mysqli->query("SELECT * FROM hasil INNER JOIN penyakit USING(`id_penyakit`) INNER JOIN pasien USING(`id_pasien`) WHERE id_pasien='$id_pasien' AND tanggal='$tanggal' ORDER BY possible_disease ASC");
			$i = 1;
			// memulai perulangan untuk menampilkan data penyakit
			echo '<div class="col-sm-8 pull-right" id="tampil">';
			while ($p = $penyakit->fetch_object()) {
				echo '<div class="col-sm-12">';
				echo '<div class="col-sm-5">';
				// inisiasi nilai awal CF pada masing-masing penyakit
				$hasil_cf[$i]			= 0;
				$id_penyakit[$i]	= $p->id_penyakit;
				$nama_pasien 	 		= $p->nama_pasien;
				$id_hasil 	 			= $p->id_hasil;
				$penyakitNya[$i]  = $p->nama_penyakit;

				// menampilkan nama penyakit
				echo '<b><u>Penyakit ' . $p->nama_penyakit . "</u></b><br>";
				$detail_perhitungan[$i] = '';
				$ii = 1;
				$relasi 		 = $mysqli->query("SELECT * FROM `konsultasi` INNER JOIN `relasi` USING(`id_relasi`) WHERE `id_hasil`='$id_hasil'");
				$case_cf = true;
				while ($r = $relasi->fetch_object()) {
					$id_relasi 		= $r->id_relasi;
					$id_gejala 		= $r->id_gejala;
					$cf 			 		= $r->nilai_cf;
					$bobot_pasien = $r->bobot_pasien;

					echo "CF". $ii . " = BPakar G$ii x BUser G$ii<br>";;
					echo "CF". $ii . " = " . substr($r->bobot_pakar,0,4) . " x " . substr($bobot_pasien,0,4) . "<br>";;
					echo "CF". $ii . " = " . $cf;

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
					$nilai_hasil_cf[$i] = array('id_penyakit' => $id_penyakit[$i], 'nama_penyakit' => $penyakitNya[$i], 'hasil' => $hasil_cf[$i]);
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
        }
      } else {
        echo "Pasien Tidak Teridentifikasi Penyakit Apapun <br><br><b>";
      }
      echo '<br><button type="submit" id="timbul" class="btn btn-sm btn-danger">Sembunyikan Rincian Perhitungan</button>';
      echo '</div>';
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