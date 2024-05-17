<?php
	$db_host        = "db";
    $db_user        = "root";
    $db_pass        = "mypass";
    $db_database    = "dbinventarisperalatan"; 
    
    $dblink = mysqli_connect($db_host,$db_user,$db_pass,$db_database);

    if (!$dblink){
        echo "Koneksi database gagal : " . mysqli_connect_error();
        exit();
    }

?>
