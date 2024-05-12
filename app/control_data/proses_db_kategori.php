<?php
session_start();
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
<?php
	include "../db_link.php";
	$act = $_GET['act'];
	$modul = $_GET['modul'];

	$xcjp = is_null($_POST['xjp']) ? '' : $_POST['xjp'];
	$xcnw = is_null($_POST['xnw']) ? '' : $_POST['xnw'];
	$xcpw = is_null($_POST['xpw']) ? '' : $_POST['xpw'];
	$xcfa = is_null($_POST['xfa']) ? '' : $_POST['xfa'];
	$xclf = is_null($_POST['xlf']) ? '' : $_POST['xlf'];
	$xckr = is_null($_POST['xkr']) ? '' : $_POST['xkr'];
	$xckh = is_null($_POST['xkh']) ? '' : $_POST['xkh'];
	$xcpr = is_null($_POST['xpr']) ? '' : $_POST['xpr'];

	if ($modul == 'kategori' and $act == 'input') {
		mysqli_query($dblink, "insert into tblkategori values('$_POST[xid]','$_POST[xkat]')");
		mysqli_query($dblink, "insert into tblbkat(id_kat,a,b,c,d,e,f,g,h) values('$_POST[xid]','$xcjp','$xcnw','$xcpw','$xcfa','$xclf','$xckr','$xckh','$xcpr')");

		header("Location:../../dashboard.php?xlink=view_data/kategori.php&apage=kategori");
	} elseif ($modul == 'kategori' and $act == 'edit') {
		$xpid = $_POST['xid'];
		$xkat = $_POST['xkat'];

		mysqli_query($dblink, "update tblkategori set nama_kategori='$xkat' where id_kategori='$xpid'");
		mysqli_query($dblink, "update tblbkat set a='$xcjp',b='$xcnw',c='$xcpw',d='$xcfa',e='$xclf',f='$xckr',g='$xckh',h='$xcpr' where id_kat='$xpid'");

		header("Location:../../dashboard.php?xlink=view_data/kategori.php&apage=kategori");
	} elseif ($modul == 'kategori' and $act == 'hapus') {
		$xkid = $_GET['xxid'];
		mysqli_query($dblink, "delete from tblkategori where id_kategori='$xkid'");
		mysqli_query($dblink, "delete from tblbkat where id_kat='$xkid'");

		header("Location:../dashboard.php?xlink=view_data/kategori.php&apage=kategori");
	} else {
		echo "<center>Tidak Ada Modul</center>";
	}
?>
<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>