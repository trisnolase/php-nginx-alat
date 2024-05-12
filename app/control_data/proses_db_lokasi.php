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
	if ($modul == 'lokasi' and $act == 'input') {
		mysqli_query($dblink, "insert into tbllokasi values('$_POST[xid]',
									'$_POST[xkat]')");

		header("Location:../../dashboard.php?xlink=view_data/lokasi.php&apage=lokasi");
	} elseif ($modul == 'lokasi' and $act == 'edit') {
		$xpid = $_POST['xid'];
		$xkat = $_POST['xkat'];

		mysqli_query($dblink, "update tbllokasi set nama_lokasi='$xkat' where id_lokasi='$xpid'");

		header("Location:../../dashboard.php?xlink=view_data/lokasi.php&apage=lokasi");
	} elseif ($modul == 'lokasi' and $act == 'hapus') {
		$xkid = $_GET['xxid'];
		mysqli_query($dblink, "delete from tbllokasi where id_lokasi='$xkid'");

		header("Location:../dashboard.php?xlink=view_data/lokasi.php&apage=lokasi");
	} else {
		echo "<center>Tidak Ada Modul</center>";
	}
?>
	<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>