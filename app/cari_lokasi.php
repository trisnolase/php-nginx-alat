<?php
include"db_link.php";
$searchTerm = $_GET['term'];
$query = $dblink->query("SELECT * FROM tbllokasi WHERE nama_lokasi LIKE '%".$searchTerm."%' ORDER BY nama_lokasi ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['nama_lokasi'];
}

echo json_encode($data);
?>
