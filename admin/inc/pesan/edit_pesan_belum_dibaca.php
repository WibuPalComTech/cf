<?php 
// filter inputan id
$id = $mysqli->escape_string($_GET['id']);
// meng-update data yang telah di inputkan
$query =  $mysqli->query("UPDATE `pesan` SET `dibaca` = 'y' WHERE `pesan`.`id_pesan` = '$id';");
if($query){ ?>
	<a href="javascript:void(0)" class="btn btn-success" title="Sudah Dibaca" disabled><i class="fa fa-check"></i> Sudah Dibaca</a> <a href="javascript:void(0)" data-toggle="modal" data-target="#detailModal" data-remote="frame.php?f=pesan/hapus_pesan_masuk&id=<?php echo $id; ?>" class="btn btn-danger" title="Hapus Pesan"><i class="fa fa-trash-o"></i></a><?php } else { ?>	<a href="javascript:void(0)" class="btn btn-danger" title="Gagal Memperbarui Data" disabled><i class="fa fa-times"></i> Gagal</a> <a href="javascript:void(0)" data-toggle="modal" data-target="#detailModal" data-remote="frame.php?f=pesan/hapus_pesan_masuk&id=<?php echo $id; ?>" class="btn btn-danger" title="Hapus Pesan"><i class="fa fa-trash-o"></i></a>
<?php } ?>