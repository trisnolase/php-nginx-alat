<?php
	echo"<div class='col-md-12'>
	<div class='card'>
		<div class='card-body'>
			<table border='0' cellpadding='0' width='100%'>
			<tr>
				<td><a class='btn btn-success btn-sm' href='index.php?xlink=control_data/tambah_kategori.php&page=kategori'>Tambah Data Kategori</a><td>
				</tr></table></div></div></div>";
	include"db_link.php";
	$sql = mysqli_query($dblink,"SELECT * from tblkategori");
	echo"<div class='col-md-12'>
			<div class='card'>
				<div class='card-header card-header-primary'>
					<h4 class='card-title '>Kategori Peralatan</h4>
					<p class='card-category'> List Data</p>
				</div>
			<div class='card-body'>
				<div class='table-responsive'>
					<table class='table table-hover'>
						<thead class='text-primary text-center'>
							<th>ID Kategori</th>
							<th>Nama Kategori</th>
							<th>Jumlah Alat</th>
							<th>Aksi</th>
						</thead>
					<tbody>";
		while ($r=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
			$xidk = isset($r['id_kategori']) ? $r['id_kategori'] : '';
			$xnk = isset($r['nama_kategori']) ? $r['nama_kategori'] : '';
			
			$fsql = mysqli_query($dblink,"SELECT
					Count(tblalat.id_alat) AS jlh_alt
					FROM
					tblkategori
					Left Join tblalat ON tblkategori.id_kategori = tblalat.id_kategori
					WHERE
					tblkategori.id_kategori = '$xidk'
					GROUP BY
					tblalat.id_kategori
					");
				while ($rj=mysqli_fetch_array($fsql,MYSQLI_ASSOC)){
					$xjlh = isset($rj['jlh_alt']) ? $rj['jlh_alt'] : '';
				}


		echo"<tr>
				<td align='center'>$xidk</td>
				<td>$xnk</td>
				<td align='center'>$xjlh</td>
				<td class='td-actions text-center'>
					<a class='btn btn-danger btn-sm' href='control_data/proses_db_kategori.php?modul=kategori&act=hapus&xxid=$xidk'>
						<button type='button' rel='tooltip' title='Remove' class='btn btn-white btn-link btn-sm'>
							<i class='material-icons'>close</i>
						</button>
					</a>
					
					<a class='btn btn-primary btn-sm' href='index.php?xlink=control_data/edit_kategori.php&page=kategori&mod=edit&id=$xidk'>
						<button type='button' rel='tooltip' title='Edit' class='btn btn-white btn-link btn-sm'>
							<i class='material-icons'>edit</i>
						</button>
					</a>
				</td>
			</tr>";
		}
		echo"</tbody>
		</table>
		</div>
		</div>
		</div>";
?>