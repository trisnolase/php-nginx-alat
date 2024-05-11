<?php
	echo"<div class='col-md-12'>
			<div class='card'>
				<div class='card-body'>
					<table border='0' cellpadding='0' width='100%'>
						<tr>
							<td>
								<a href='index.php?xlink=control_data/tambah_alat_cek.php&page=alat' class='btn btn-success btn-sm'>Tambah Data Peralatan</a>
							</td>
							<td align='right'>
								<a href='index.php?xlink=view_data/data_alat.php&page=alat&act=1' class='btn btn-primary btn-sm'>Normal</a>
								<a href='index.php?xlink=view_data/data_alat.php&page=alat&act=2' class='btn btn-warning btn-sm'>Rusak Sementara</a>
								<a href='index.php?xlink=view_data/data_alat.php&page=alat&act=3' class='btn btn-danger btn-sm'>Rusak Permanen</a>
							</td>
						</tr></table></div></div></div>";
	$xrsts=$_GET['act'];
	if($xrsts=="3"){
		$xxrsts="Rusak Permanen";
	}elseif($xrsts=="2"){
		$xxrsts="Rusak Sementara";
	}else{
		$xxrsts="Normal";
	}
	$sql = mysqli_query($dblink,"SELECT * from tblalat,tblkategori,tbllokasi
		WHERE
			tblalat.id_kategori =  tblkategori.id_kategori AND
			tblalat.id_lokasi =  tbllokasi.id_lokasi AND
			tblalat.status_alat = '$xxrsts'");
	echo"	<div class='col-md-12'>
				<div class='card'>
					<div class='card-header card-header-primary'>
						<h4 class='card-title '>Peralatan Jaringan</h4>
						<p class='card-category'> List Data</p>
					</div>
				<div class='card-body'>
					<div class='table-responsive'>
						<table class='table table-hover'>
							<thead class='text-center'>
								<th>Id Alat</th>
								<th>Nama Alat</th>
								<th>Lokasi</th>
								<th>Kategori</th>
								<th><center>Tahun Pembelian</center></th>
								<th>Status</th>
								<th>Aksi</th>
							</thead>
						<tbody>";
		while ($r=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
			$xnama = isset($r['nama_peralatan']) ? $r['nama_peralatan'] : '';
			$xlokasi = isset($r['nama_lokasi']) ? $r['nama_lokasi'] : '';
			$xid = isset($r['id_alat']) ? $r['id_alat'] : '';
			$xkategori = isset($r['nama_kategori']) ? $r['nama_kategori'] : '';
			$xtahun = isset($r['tahun_beli']) ? $r['tahun_beli'] : '';
			$xdesc = isset($r['desc_alat']) ? $r['desc_alat'] : '';
			$xjlhport = isset($r['jlh_port']) ? $r['jlh_port'] : '';
			$xnamawifi = isset($r['nama_wifi']) ? $r['nama_wifi'] : '';
			$xpasswifi = isset($r['pass_wifi']) ? $r['pass_wifi'] : '';
			$xfrek = isset($r['frek_alat']) ? $r['frek_alat'] : '';
			$xram = isset($r['k_ram']) ? $r['k_ram'] : '';
			$xdisk = isset($r['k_hardisk']) ? $r['k_hardisk'] : '';
			$xprocessor = isset($r['t_processor']) ? $r['t_processor'] : '';
			$xstatus = isset($r['status_alat']) ? $r['status_alat'] : '';
			$xhimg = isset($r['p_img']) ? $r['p_img'] : '';
			$xnone='none';
			
			
		echo"<tr>
				<td>$xid</td>
				<td><a style='text-decoration:none;' href='index.php?xlink=view_data/detail_alat.php&page=alat&id=$xid'>$xnama</a></td>
				<td>$xlokasi</td>
				<td>$xkategori</td>
				<td align='center'>$xtahun</td>
				<td>$xstatus</td>
				<td class='td-actions text-center'>";
					if($xhimg==''){
						echo"<a href='control_data/proses_db_alat.php?modul=alat&act=hapus&xxid=$xid&g=$xnone' class='btn btn-danger btn-sm'>
							<button type='button' rel='tooltip' title='Remove' class='btn btn-white btn-link btn-sm'>
							<i class='material-icons'>close</i>
							</button>
						</a> ";
					}else{
						echo"<a href='control_data/proses_db_alat.php?modul=alat&act=hapus&xxid=$xid&g=$xhimg' class='btn btn-danger btn-sm'>
							<button type='button' rel='tooltip' title='Remove' class='btn btn-white btn-link btn-sm'>
							<i class='material-icons'>close</i>
							</button>
						</a> ";
					}
					echo"<a href='index.php?xlink=control_data/edit_alat.php&page=alat&id=$xid' class='btn btn-info btn-sm'>
						<button type='button' rel='tooltip' title='Edit' class='btn btn-white btn-link btn-sm'>
						<i class='material-icons'>edit</i>
						</button>
					</a>";
		echo"</tr>";
		}
		echo"
		</tbody>
	  </table>
	</div>
  </div>
</div>
</div>";
?>