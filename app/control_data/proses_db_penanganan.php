<?php
session_start();
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
<?php
	include "../db_link.php";
	$act = $_GET['act'];
	$modul = $_GET['modul'];
	$tanggal = date("ymd");
	$jam = date("H:i:s");
	$stat = "Normal";
	$xrp = "Rusak Permanen";
	$xnr = "Normal";
	$xstat = "S";
	if ($modul == 'penanganan' and $act == 'input') {
		mysqli_query($dblink, "insert into tblpenanganan(id_gangguan,tgl_penanganan,teknisi,penyelesaian,hasil,rekomendasi) values('$_POST[xidga]',
									'$tanggal',
									'$_POST[xtek]',
									'$_POST[xpeny]',
									'$_POST[xhasil]',
									'$_POST[xrekom]')");
		$xid = $_POST['xnalat'];
		$xxid = $_POST['xida'];
		$xgid = $_POST['xidga'];
		mysqli_query($dblink, "update tblalat set status_alat='$_POST[xhasil]' where id_alat='$xxid'");
		mysqli_query($dblink, "update tblgangguan set status='$xstat' where id_gangguan='$xgid'");

		header("Location:../../dashboard.php?xlink=view_data/penanganan.php&apage=penanganan");
	} else {
		echo "<center>Tidak Ada Modul</center>";
	}
?>
<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>