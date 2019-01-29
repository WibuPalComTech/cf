<?php 
if (empty(@$_GET['tahun'])) {
	$tahun = date('Y');
} else {
	$tahun = @$_GET['tahun'];
}
$get_tahun			= $mysqli->query("SELECT YEAR(`tanggal`) AS tahun FROM pasien GROUP BY YEAR(`tanggal`) ORDER BY YEAR(`tanggal`) DESC");
$pasien					= $mysqli->query("SELECT * FROM pasien");
$klinik 				= $mysqli->query("SELECT * FROM klinik");
$pakar  				= $mysqli->query("SELECT * FROM pakar");
$hasil  				= $mysqli->query("SELECT * FROM hasil INNER JOIN pasien USING(`id_pasien`) WHERE possible_disease='1'");
$hasil_today  	= $mysqli->query("SELECT * FROM hasil INNER JOIN pasien USING(`id_pasien`) WHERE DAY(`tanggal`) = '".date('d')."' AND MONTH(`tanggal`) = '".date('m')."' AND YEAR(`tanggal`) = '".date('Y')."' AND possible_disease='1'");
$hasil_bulan  	= $mysqli->query("SELECT * FROM hasil INNER JOIN pasien USING(`id_pasien`) WHERE MONTH(`tanggal`) = '".date('m')."' AND YEAR(`tanggal`) = '".date('Y')."' AND possible_disease='1'");
$hasil  	= $mysqli->query("SELECT * FROM hasil WHERE possible_disease='1'");
?>
<div class="content-header">
	<div class="header-section">
		<h1>DashBoard</h1>
	</div>
</div>
<div class="row">
	<div id="test2">
		<div class="col-lg-12">
			<div class="block full">
				<div class="block-title">
					<div class="block-options pull-right">
						<div class="btn-group btn-group-sm">
							<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" data-original-title="Program Studi">Pilih Tahun Konsultasi <span class="caret"></span></a>
							<ul class="dropdown-menu text-left">
								<?php while ($t = $get_tahun->fetch_object()) { ?>
									<li><a href="javascript:void(0)" data-target="#page-content" data-remote="frame.php?f=dashboard/index&tahun=<?= $t->tahun ?>">Tahun <?= $t->tahun ?></a></li>
								<?php } ?>
							</ul>
						</div>          	
					</div>
					<h2><i class="fa fa-bar-chart-o"></i> <strong>Statistik Konsulatasi</strong></h2>
				</div>
				<div id="widget-content">
					<div class="row">
						<div class="col-sm-6 col-lg-3">
							<div class="widget">
								<div class="widget-simple themed-background-amethyst">
									<div class="widget-icon pull-left"> <i class="fa fa-users fa-2x"></i> </div>
									<h4 class="widget-content-light text-right">
										<strong><?= $hasil_today->num_rows; ?> Konsultasi</strong><br />
										<small>Total Hari Ini</small>
									</h4>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="widget">
								<div class="widget-simple themed-background-autumn">
									<div class="widget-icon pull-left"> <i class="fa fa-users fa-2x"></i> </div>
									<h4 class="widget-content-light text-right">
										<strong><?= $hasil_bulan->num_rows; ?> Konsultasi</strong><br />
										<small>Total Bulan Ini</small>
									</h4>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="widget">
								<div class="widget-simple themed-background">
									<div class="widget-icon pull-left"> <i class="fa fa-users fa-2x"></i> </div>
									<h4 class="widget-content-light text-right">
										<strong><?= $hasil->num_rows; ?> Konsultasi</strong><br />
										<small>Total Konsultasi</small>
									</h4>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="widget">
								<div class="widget-simple themed-background-modern">
									<div class="widget-icon pull-left"> <span class="fa fa-users fa-2x"></span></div>
									<h4 class="widget-content-light text-right">
										<strong><?= $pasien->num_rows; ?> Orang</strong><br />
										<small>Total Pasien</small>
									</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="chart-div">
					<div class="col-lg-12">
						<div class="text-center">
							<h4 class="sub-header">Statistik Konsultasi Tahun <?= $tahun ?></h4>
						</div>
					</div>
					<div class="row">
						<?php 
						$penyakit		 = $mysqli->query("SELECT * FROM penyakit");
						$i = 1;
						while ($p = $penyakit->fetch_object()) { 
							$id_penyakit = $p->id_penyakit;
							$nama_penyakit = $p->nama_penyakit;
							$query = $mysqli->query("SELECT `pen`.`nama_penyakit`, YEAR(`tanggal`) AS tahun,
								COALESCE((SELECT COUNT(*) FROM `pasien` pp INNER JOIN `hasil` USING(`id_pasien`) WHERE jk='Laki-laki' AND umur < 20 AND umur > 1 AND id_penyakit = '$id_penyakit' AND possible_disease = '1' AND YEAR(tanggal)='$tahun'),0) AS umur_1_20_l, 
								COALESCE((SELECT COUNT(*) FROM `pasien` pp INNER JOIN `hasil` USING(`id_pasien`) WHERE jk='Laki-laki' AND umur < 40 AND umur > 21 AND id_penyakit = '$id_penyakit' AND possible_disease = '1' AND YEAR(tanggal)='$tahun'),0) AS umur_21_40_l, 
								COALESCE((SELECT COUNT(*) FROM `pasien` pp INNER JOIN `hasil` USING(`id_pasien`) WHERE jk='Laki-laki' AND umur < 60 AND umur > 41 AND id_penyakit = '$id_penyakit' AND possible_disease = '1' AND YEAR(tanggal)='$tahun'),0) AS umur_41_60_l, 
								COALESCE((SELECT COUNT(*) FROM `pasien` pp INNER JOIN `hasil` USING(`id_pasien`) WHERE jk='Laki-laki' AND umur < 80 AND umur > 61 AND id_penyakit = '$id_penyakit' AND possible_disease = '1' AND YEAR(tanggal)='$tahun'),0) AS umur_61_80_l, 
								COALESCE((SELECT COUNT(*) FROM `pasien` pp INNER JOIN `hasil` USING(`id_pasien`) WHERE jk='Laki-laki' AND umur < 100 AND umur > 81 AND id_penyakit = '$id_penyakit' AND possible_disease = '1' AND YEAR(tanggal)='$tahun'),0) AS umur_81_100_l, 
								COALESCE((SELECT COUNT(*) FROM `pasien` pp INNER JOIN `hasil` USING(`id_pasien`) WHERE jk='Laki-laki' AND umur > 101 AND id_penyakit = '$id_penyakit' AND possible_disease = '1' AND YEAR(tanggal)='$tahun'),0) AS umur_up_100_l,
								COALESCE((SELECT COUNT(*) FROM `pasien` pp INNER JOIN `hasil` USING(`id_pasien`) WHERE jk='Perempuan' AND umur < 20 AND umur > 1 AND id_penyakit = '$id_penyakit' AND possible_disease = '1' AND YEAR(tanggal)='$tahun'),0) AS umur_1_20_p, 
								COALESCE((SELECT COUNT(*) FROM `pasien` pp INNER JOIN `hasil` USING(`id_pasien`) WHERE jk='Perempuan' AND umur < 40 AND umur > 21 AND id_penyakit = '$id_penyakit' AND possible_disease = '1' AND YEAR(tanggal)='$tahun'),0) AS umur_21_40_p, 
								COALESCE((SELECT COUNT(*) FROM `pasien` pp INNER JOIN `hasil` USING(`id_pasien`) WHERE jk='Perempuan' AND umur < 60 AND umur > 41 AND id_penyakit = '$id_penyakit' AND possible_disease = '1' AND YEAR(tanggal)='$tahun'),0) AS umur_41_60_p, 
								COALESCE((SELECT COUNT(*) FROM `pasien` pp INNER JOIN `hasil` USING(`id_pasien`) WHERE jk='Perempuan' AND umur < 80 AND umur > 61 AND id_penyakit = '$id_penyakit' AND possible_disease = '1' AND YEAR(tanggal)='$tahun'),0) AS umur_61_80_p, 
								COALESCE((SELECT COUNT(*) FROM `pasien` pp INNER JOIN `hasil` USING(`id_pasien`) WHERE jk='Perempuan' AND umur < 100 AND umur > 81 AND id_penyakit = '$id_penyakit' AND possible_disease = '1' AND YEAR(tanggal)='$tahun'),0) AS umur_81_100_p, 
								COALESCE((SELECT COUNT(*) FROM `pasien` pp INNER JOIN `hasil` USING(`id_pasien`) WHERE jk='Perempuan' AND umur > 101 AND id_penyakit = '$id_penyakit' AND possible_disease = '1' AND YEAR(tanggal)='$tahun'),0) AS umur_up_100_p
								FROM `pasien` p INNER JOIN `hasil` USING(`id_pasien`) INNER JOIN `penyakit` `pen` USING(`id_penyakit`) WHERE id_penyakit = '$id_penyakit' AND possible_disease = '1' AND YEAR(`tanggal`)='$tahun'");
							$graph = $query->fetch_object();
							if ($query->num_rows!=0) {
								?>
								<div id="chartdet-div" class="col-md-6">
									<h3 class="text-center"><?= $nama_penyakit ?></h3>
									<div id="chart-pie<?= $id_penyakit?>" class="chart"></div>
									<script type="text/javascript">
										$(function() {
											var chartPie = $('#chart-pie<?= $id_penyakit?>');
											$.plot(chartPie,
												[ 
												{label: ' 1-20 Tahun (Laki-laki)', data: <?= @$graph->umur_1_20_l!=null ? $graph->umur_1_20_l : '0' ?>, color: '#FFB871'},
												{label: ' 1-20 Tahun (Perempuan)', data: <?= @$graph->umur_1_20_p!=null ? $graph->umur_1_20_p : '0' ?>, color: '#AAB871'},
												{label: ' 21-40 Tahun (Laki-laki)', data: <?= @$graph->umur_21_40_l!=null ? $graph->umur_21_40_l : '0' ?>, color: '#6C6CFF'},
												{label: ' 21-40 Tahun (Perempuan)', data: <?= @$graph->umur_21_40_p!=null ? $graph->umur_21_40_p : '0' ?>, color: '#CC6CFF'},
												{label: ' 41-60 Tahun (Laki-laki)', data: <?= @$graph->umur_41_60_l!=null ? $graph->umur_41_60_l : '0' ?>, color: '#1443ff'},
												{label: ' 41-60 Tahun (Perempuan)', data: <?= @$graph->umur_41_60_p!=null ? $graph->umur_41_60_p : '0' ?>, color: '#BB43ff'},
												{label: ' 61-80 Tahun (Laki-laki)', data: <?= @$graph->umur_61_80_l!=null ? $graph->umur_61_80_l : '0' ?>, color: '#FFFF64'},
												{label: ' 61-80 Tahun (Perempuan)', data: <?= @$graph->umur_61_80_p!=null ? $graph->umur_61_80_p : '0' ?>, color: '#00FF64'},
												{label: ' 81-100 Tahun (Laki-laki)', data: <?= @$graph->umur_81_100_l!=null ? $graph->umur_81_100_l : '0' ?>, color: '#970097'},
												{label: ' 81-100 Tahun (Perempuan)', data: <?= @$graph->umur_81_100_p!=null ? $graph->umur_81_100_p : '0' ?>, color: '#FF0097'},
												{label: ' < 100 Tahun (Laki-laki)', data: <?= @$graph->umur_up_100_l!=null ? $graph->umur_up_100_l : '0' ?>, color: '#FAA122'},
												{label: ' < 100 Tahun (Perempuan)', data: <?= @$graph->umur_up_100_p!=null ? $graph->umur_up_100_p : '0' ?>, color: '#FF1B22'}
												],
												{
													legend: {show: true},
													series: {
														pie: {
															show: true,
															radius: 1,
															label: {
																show: true,
																radius: 3 / 4,
																formatter: function(label, pieSeries) {
																	var jk 		 = label.split("(");
																	var gender = jk[1].split(")");
																	return '<div>' + pieSeries.data[0][1] + ' ' + gender[0];  + '</div>';
																}
															}
														}
													}
												}
												)
										})
									</script>	
								</div>
							<?php }} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>