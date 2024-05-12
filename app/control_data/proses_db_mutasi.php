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
	if ($modul == 'mutasi' and $act == 'input') {
		$xkid = $_POST['xnama'];
		$xxlb = $_POST['xlb'];
		$sql = mysqli_query($dblink, "SELECT * from tblalat where id_alat='$xkid'");
		while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
			$xidk = isset($r['id_lokasi']) ? $r['id_lokasi'] : '';
		}
		mysqli_query($dblink, "update tblalat set id_lokasi='$xxlb' WHERE id_alat='$xkid'");
		mysqli_query($dblink, "insert into tblhistorilokasi(id_alat,id_lokasi_a,id_lokasi_b,tgl) values('$_POST[xnama]','$xidk','$_POST[xlb]','$tanggal')");

		header("Location:../../dashboard.php?xlink=view_data/mutasi_alat.php&apage=mutasi");
	} else {
		echo "<center>Tidak Ada Modul</center>";
	}
?>
<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>