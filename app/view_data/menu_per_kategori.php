<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
<?php
	$sql = mysqli_query($dblink, "SELECT * from tblkategori");
	while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
		$xidk = isset($r['id_kategori']) ? $r['id_kategori'] : '';
		$xnmk = isset($r['nama_kategori']) ? $r['nama_kategori'] : '';
		echo "<a href='view_data/data_per_kategori.php&xxid=$xidk'>$xnmk</a>";
	}
?>
<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>