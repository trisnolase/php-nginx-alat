<?php
session_start();
include "../db_link.php";
$act = $_GET['act'];
$modul = $_GET['modul'];
$tanggal = date("ymd");
$jam = date("H:i:s");
if ($modul == 'login' and $act == 'cek') {
    $logCek = mysqli_query($dblink, "select * from tbllogin where nama='$_POST[nama]' and password='$_POST[password]'");
    if (mysqli_num_rows($logCek) > 0) {
        $row = mysqli_fetch_assoc($logCek);
        $_SESSION['nama'] = isset($row['nama']) ? $row['nama'] : '';
        $_SESSION['role'] = isset($row['role']) ? $row['role'] : '';
        header("Location:../dashboard.php?xlink=view_data/data_alat.php&apage=alat&act=1");
    } else {
        header("Location:../");
    }
}
if ($modul == 'logout' and $act == 'cek') {
    session_destroy();
    header("Location:../");
} else {
    echo "<center>Tidak Ada Modul</center>";
}
