<?php
	echo"<div class='col-md-12'>
	<div class='card'>
		<div class='card-body'>
			<table border='0' cellpadding='0' width='100%'>
			<tr>
				<td><a class='btn btn-success btn-sm' href='index.php?xlink=control_data/tambah_lokasi.php&page=lokasi'>Tambah Data lokasi</a><td>
				</tr></table></div></div></div>";
	include"db_link.php";
	$sql = mysqli_query($dblink,"SELECT * from tbllokasi");
	echo"<div class='col-md-12'>
			<div class='card'>
				<div class='card-header card-header-primary'>
					<h4 class='card-title '>Lokasi</h4>
					<p class='card-category'> List Data</p>
				</div>
			<div class='card-body'>
				<div class='table-responsive'>
					<table class='table table-hover'>
						<thead class='text-primary text-center'>
						<th>ID Lokasi</td>
						<th>Nama Lokasi</td>
						<th>Jumlah Peralatan</td>
						<th>Aksi</td>
				</thead>
				<tbody>";
		while ($r=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
			$xidk = isset($r['id_lokasi']) ? $r['id_lokasi'] : '';
			$xnk = isset($r['nama_lokasi']) ? $r['nama_lokasi'] : '';

			$fsql = mysqli_query($dblink,"SELECT
					Count(tblalat.id_alat) AS jlh_alt
					FROM
					tbllokasi
					Left Join tblalat ON tbllokasi.id_lokasi = tblalat.id_lokasi
					WHERE
					tbllokasi.id_lokasi = '$xidk'
					GROUP BY
					tbllokasi.id_lokasi
					");
				while ($rj=mysqli_fetch_array($fsql,MYSQLI_ASSOC)){
					$xjlh = isset($rj['jlh_alt']) ? $rj['jlh_alt'] : '';
				}
		
		echo"<tr>
				<td class='text-center'>$xidk</td>
				<td>$xnk</td>
				<td>$xjlh</td>
				<td align='center'>
					<a class='btn btn-danger btn-sm' href='control_data/proses_db_lokasi.php?modul=lokasi&act=hapus&xxid=$xidk'>Hapus</a>
					<a class='btn btn-primary btn-sm' href='index.php?xlink=control_data/edit_lokasi.php&page=lokasi&mod=edit&id=$xidk'>Edit</a>
				</td>
			</tr>";
		}
		echo"</tbody></table></div></div></div>";
?>