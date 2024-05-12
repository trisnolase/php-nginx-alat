<?php
session_start();
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
<?php
	include "../db_link.php";
	$tanggal = date("ymd");
	$jam = date("H:i:s");
	$stat = "Normal";
	$xrs = "Rusak Sementara";
	$xstat = "B";
	$nama = $_POST['nama_alat'];
	if ($nama == "") {
		header("Location:../../dashboard.php?xlink=view_data/lapor_alat.php&apage=lapor");
	} else {
		mysqli_query($dblink, "insert into tblgangguan(id_alat,tgl_gangguan,ciri,deskripsi_gangguan,status) values('$_POST[nama_alat]',
									'$tanggal',
									'$_POST[ciri_kerusakan]',
									'$_POST[deskripsi_kerusakan]',
									'$xstat')");
		mysqli_query($dblink, "update tblalat set status_alat='$xrs' where id_alat='$_POST[nama_alat]'");
		header("Location:../../dashboard.php?xlink=view_data/gangguan.php&apage=gangguan");
	}
?>
<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>