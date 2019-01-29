<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Surat Keterangan Ahli Waris</title>
	<link rel="stylesheet" type="text/css" href="css/laporan.css" />
</head>
<body>
	<div id="title-kopcetak">
		SISTEM PAKAR PENYAKIT LEUKIMIA  
	</div>
	<div id="title-kopcetak">
		Menggunakan Metode Forward Chaining & Certainty Factor 
	</div>
	<div id="title-kontakPT">
		
	</div>
	<div style="margin:-70px 0 0 40px">
		<img src="img/icon.png" height="65">
	</div>
	<hr><br>
	<div id="title">
		<u>Laporan Hasil Diagnosa Penyakit Leukimia</u>
	</div>
	<?php
	$tgl_awal 	= @$_GET["tgl_awal"];
	$tgl_akhir 	= @$_GET["tgl_akhir"];
	?>
	<div style="text-align: center; font-size: 9pt">
		Tanggal <?= $tgl_awal ?> s/d <?= $tgl_akhir ?>
	</div>
	<br>
	<div id="isi">
		<table width="80%" border="0.1" cellpadding="0" cellspacing="0" align="center">
			<tbody>
				<tr>
					<th width="20" height="20" align="center" valign="middle">No</th>
					<th width="155" height="20" align="center" valign="middle">Nama Pasien</th>
					<th width="75" height="20" align="center" valign="middle">Tanggal Lahir</th>
					<th width="70" height="20" align="center" valign="middle">Umur</th>
					<th width="77" height="20" align="center" valign="middle">Jenis Kelamin</th>
					<th width="230" height="20" align="center" valign="middle">Alamat</th>
					<th width="120" height="20" align="center" valign="middle">Tgl Konsultasi</th>
					<th width="150" height="20" align="center" valign="middle">Hasil Diagnosa</th>
					<th width="80" height="20" align="center" valign="middle">Presentase</th>
				</tr>
				<?php
				$i = 1;
				$hasil = $mysqli->query("SELECT * FROM `pasien` INNER JOIN `hasil` USING(`id_pasien`) INNER JOIN penyakit USING(`id_penyakit`) WHERE tanggal >= '$tgl_awal' AND tanggal <= '$tgl_akhir' AND possible_disease='1'");
				while ($isi = $hasil->fetch_object()) {
					?>
					<tr>
						<td width="20" height="20" align="center" valign="middle"> <?= $i++ ?>.</td>
						<td width="155" height="20" valign="middle">&nbsp;&nbsp;<?= $isi->nama_pasien ?></td>
						<td width="75" height="20" align="center" valign="middle"> <?= $isi->tgl_lahir ?></td>
						<td width="70" height="20" align="center" valign="middle"> <?= $isi->umur ?> Tahun</td>
						<td width="77" height="20" align="center" valign="middle"> <?= $isi->jk ?></td>
						<td width="230" height="20" valign="middle">&nbsp;&nbsp;<?= $isi->alamat ?></td>
						<th width="120" height="20" align="center" valign="middle"> <?= $isi->tanggal ?></th>
						<th width="150" height="20" align="center" valign="middle"> <?= $isi->nama_penyakit ?></th>
						<th width="80" height="20" align="center" valign="middle"> <?= $isi->nilai_hasil*100 ?>%</th>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<!-- <div style="width: 100%; margin-bottom: -40.25px">
		<div style="margin-left: 475px" id="footer-tanggal">
			<?= $_POST['wilayah'] ?>, <?= date('d F Y') ?>
		</div>
	</div>
	<div style="width: 100%">
		<div style="margin:7.25px 0 50px 25px;" id="footer-tanggal">
			an. Camat <?= $_POST['wilayah'] ?>
		</div>
		<div style="margin-left: 25px" id="footer-tanggal">
			(.................................................)
		</div>
		<div style="margin:-167.25px 0 0 475px;" id="footer-tanggal">
			Kepala Desa <?= $_POST['wilayah'] ?>,
		</div>
		<div style="margin:90px 0 0 475px;" id="footer-tanggal">
			(<b><?= $_POST['nama'] ?></b>)
		</div>
	</div> -->
</body>
</html>
<?php
$filename = "SKTM.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
include("inc/html2pdf/html2pdf.class.php");
$content = '<page style="font-family: freeserif">' . ($content) . '</page>';
try
{
	$html2pdf = new HTML2PDF('L', 'A4', 'en', false, 'ISO-8859-15', array(15, 8, 15, 8));
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	$html2pdf->Output($filename);
} catch (HTML2PDF_exception $e) {echo $e;}
?>