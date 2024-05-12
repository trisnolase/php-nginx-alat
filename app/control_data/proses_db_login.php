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
        // $r = mysqli_fetch_array($logCek, MYSQLI_ASSOC);
        $row = mysqli_fetch_assoc($logCek);
        $_SESSION['nama'] = isset($row['nama']) ? $row['nama'] : '';
        $_SESSION['role'] = isset($row['role']) ? $row['role'] : '';
        // echo $_SESSION['role'];
        header("Location:alat-1");
    } else {
        header("Location:login");
    }
}
if ($modul == 'logout' and $act == 'cek') {
    session_destroy();
    header("Location:login");
} else {
    echo "<center>Tidak Ada Modul</center>";
}
