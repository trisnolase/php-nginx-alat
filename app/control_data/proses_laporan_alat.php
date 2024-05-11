<?php
	include"../db_link.php";
	$tanggal=date("ymd");
	$jam=date("H:i:s");
	$stat="Normal";
	$xrs="Rusak Sementara";
	$xstat="B";
		mysqli_query($dblink,"insert into tblgangguan(id_alat,tgl_gangguan,ciri,deskripsi_gangguan,status) values('$_POST[nama_alat]',
									'$tanggal',
									'$_POST[ciri_kerusakan]',
									'$_POST[deskripsi_kerusakan]',
									'$xstat')");
		mysqli_query($dblink,"update tblalat set status_alat='$xrs' where id_alat='$_POST[nama_alat]'");
		
		header("Location:../index.php?xlink=view_data/gangguan.php&page=gangguan");
?>