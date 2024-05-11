<?php
	include"../db_link.php";
	$act=$_GET['act'];
	$modul=$_GET['modul'];
	
	$xcjp=isset($_POST['xjp']) ? $_POST['xjp'] : '';
	$xcnw=isset($_POST['xnw']) ? $_POST['xnw'] : '';
	$xcpw=isset($_POST['xpw']) ? $_POST['xpw'] : '';
	$xcfa=isset($_POST['xfa']) ? $_POST['xfa'] : '';
	$xclf=isset($_POST['xlf']) ? $_POST['xlf'] : '';
	$xckr=isset($_POST['xkr']) ? $_POST['xkr'] : '';
	$xckh=isset($_POST['xkh']) ? $_POST['xkh'] : '';
	$xcpr=isset($_POST['xpr']) ? $_POST['xpr'] : '';
	
	if($xcjp==1){
			$a='1';
		}else{
			$a='0';
		}
		if($xcnw==1){
			$b='1';
		}else{
			$b='0';
		}
		if($xcpw==1){
			$c='1';
		}else{
			$c='0';
		}
		if($xcfa==1){
			$d='1';
		}else{
			$d='0';
		}
		if($xclf==1){
			$e='1';
		}else{
			$e='0';
		}
		if($xckr==1){
			$f='1';
		}else{
			$f='0';
		}
		if($xckh==1){
			$g='1';
		}else{
			$g='0';
		}
		if($xcpr==1){
			$h='1';
		}else{
			$h='0';
		}

	if($modul=='kategori' AND $act=='input'){
		mysqli_query($dblink,"insert into tblkategori values('$_POST[xid]','$_POST[xkat]')");
		mysqli_query($dblink,"insert into tblbkat(id_kat,a,b,c,d,e,f,g,h) values('$_POST[xid]','$a','$b','$c','$d','$e','$f','$g','$h')");

		header("Location:../index.php?xlink=view_data/kategori.php&page=kategori");
	}elseif($modul=='kategori' AND $act=='edit'){
		$xpid=$_POST['xid'];
		$xkat=$_POST['xkat'];
		
		mysqli_query($dblink,"update tblkategori set nama_kategori='$xkat' where id_kategori='$xpid'");
		mysqli_query($dblink,"update tblbkat set a='$a',b='$b',c='$c',d='$d',e='$e',f='$f',g='$g',h='$h' where id_kat='$xpid'");
		
		header("Location:../index.php?xlink=view_data/kategori.php&page=kategori");
	}elseif($modul=='kategori' AND $act=='hapus'){
		$xkid = $_GET['xxid'];
		mysqli_query($dblink,"delete from tblkategori where id_kategori='$xkid'");
		mysqli_query($dblink,"delete from tblbkat where id_kat='$xkid'");
		
		header("Location:../index.php?xlink=view_data/kategori.php&page=kategori");
	}else{
		echo"<center>Tidak Ada Modul</center>";
	}
?>