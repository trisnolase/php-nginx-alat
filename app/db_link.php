<?php
	$db_host        = "db";
    $db_user        = "alat";
    $db_pass        = "mypass";
    $db_database    = "dbinventarisperalatan"; 
    
    $dblink = mysqli_connect($db_host,$db_user,$db_pass,$db_database);

    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
        exit();
    }

?>