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
	if ($modul == 'alat' and $act == 'input') {
		$xdimg = empty($_FILES['xgambar']['name']) ? null : $_FILES['xgambar']['name'];
		$upload_gambar = '';
		if (!is_null($xdimg)) {
			$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
			$shuffle  = substr(str_shuffle($karakter), 0, 5);
			$lokasi_file	= $_FILES['xgambar']['tmp_name'];
			$xnewname = $shuffle . $xdimg;
			$upload_gambar = $xnewname;
			move_uploaded_file($lokasi_file, "../view_data/prod_img/$xnewname");
		}
		mysqli_query($dblink, "insert into tblalat values('$_POST[xid]',
									'$_POST[xkat]',
									'$_POST[xlok]',
									'$_POST[xnama]',
									'$_POST[xtgl]',
									'$_POST[xdesc]',
									'$_POST[xjp]',
									'$_POST[xnwifi]',
									'$_POST[xpwifi]',
									'$_POST[xfrek]',
									'$_POST[xlfrek]',
									'$_POST[xram]',
									'$_POST[xdisk]',
									'$_POST[xpro]',
									'$stat',
									'$upload_gambar')");

		header("Location:../../dashboard.php?xlink=view_data/data_alat.php&apage=alat&act=1");
	} elseif ($modul == 'alat' and $act == 'edit') {
		$xdimg = empty($_FILES['xgambar']['name']) ? null : $_FILES['xgambar']['name'];
		$xpid = $_POST['xid'];
		$xkat = $_POST['xkat'];
		$xlok = $_POST['xlok'];
		$xnama = $_POST['xnama'];
		$xtgl = $_POST['xtgl'];
		$xdesc = $_POST['xdesc'];
		$xjp = $_POST['xjp'];
		$xnwifi = $_POST['xnwifi'];
		$xpwifi = $_POST['xpwifi'];
		$xfrek = $_POST['xfrek'];
		$xlfrek = $_POST['xlfrek'];
		$xram = $_POST['xram'];
		$xdisk = $_POST['xdisk'];
		$xpro = $_POST['xpro'];
		$xxcek = $_POST['xcek'];
		$cekStatus = $_POST['xstatcek'];
		$target = "../view_data/prod_img/$xxcek";
		if (!is_null($xdimg)) {
			$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
			$shuffle  = substr(str_shuffle($karakter), 0, 5);
			$lokasi_file	= $_FILES['xgambar']['tmp_name'];
			$xnewname = $shuffle . $xdimg;
			mysqli_query($dblink, "update tblalat set id_kategori='$xkat', id_lokasi='$xlok', nama_peralatan='$xnama' , tahun_beli='$xtgl', desc_alat='$xdesc', jlh_port='$xjp', nama_wifi='$xnwifi', pass_wifi='$xpwifi', frek_alat='$xfrek', l_frek_alat='$xlfrek', k_ram='$xram', k_hardisk='$xdisk', t_processor='$xpro', p_img='$xnewname' where id_alat='$xpid'");
			if (file_exists($target)) {
				unlink($target);
			}
			move_uploaded_file($lokasi_file, "../view_data/prod_img/$xnewname");
		} else {
			mysqli_query($dblink, "update tblalat set id_kategori='$xkat', id_lokasi='$xlok', nama_peralatan='$xnama' , tahun_beli='$xtgl', desc_alat='$xdesc', jlh_port='$xjp', nama_wifi='$xnwifi', pass_wifi='$xpwifi', frek_alat='$xfrek', l_frek_alat='$xlfrek', k_ram='$xram', k_hardisk='$xdisk', t_processor='$xpro' where id_alat='$xpid'");
		}
		if ($cekStatus == 'Normal') {
			header("Location:../../dashboard.php?xlink=view_data/data_alat.php&apage=alat&act=1");
		} elseif ($cekStatus == 'Rusak Sementara') {
			header("Location:../../dashboard.php?xlink=view_data/data_alat.php&apage=alat&act=2");
		} else {
			header("Location:../../dashboard.php?xlink=view_data/data_alat.php&apage=alat&act=3");
		}
	} elseif ($modul == 'alat' and $act == 'hapus') {
		$xkid = $_GET['xxid'];
		$gambar = $_GET['g'];
		$target = "../view_data/prod_img/$gambar";
		if (file_exists($target)) {
			unlink($target);
		}
		mysqli_query($dblink, "delete from tblalat where id_alat='$xkid'");
		header("Location:../dashboard.php?xlink=view_data/data_alat.php&apage=alat&act=1");
	} else {
		echo "<center>Tidak Ada Modul</center>";
	}
?>
<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>