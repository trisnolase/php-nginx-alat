<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<div class='col'>
		<div class='card'>
			<div class='card-body'>
				<a href='dashboard.php?xlink=view_data/tambah/tambah_alat_cek.php&apage=alat' class='btn btn-success btn-sm'>Tambah Data Peralatan</a>
				<span class="float-right">
					<a href='dashboard.php?xlink=view_data/data_alat.php&apage=alat&act=1' class='btn btn-primary btn-sm'>Normal</a>
					<a href='dashboard.php?xlink=view_data/data_alat.php&apage=alat&act=2' class='btn btn-warning btn-sm'>Rusak Sementara</a>
					<a href='dashboard.php?xlink=view_data/data_alat.php&apage=alat&act=3' class='btn btn-danger btn-sm'>Rusak Permanen</a>
				</span>
			</div>
		</div>
	</div>
	<?php
	$xrsts = $_GET['act'];
	if ($xrsts == "3") {
		$xxrsts = "Rusak Permanen";
	} elseif ($xrsts == "2") {
		$xxrsts = "Rusak Sementara";
	} else {
		$xxrsts = "Normal";
	}
	?>
	<div class='col-md-12'>
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
							<th>Tahun Pembelian</th>
							<th>Status</th>
							<th>Aksi</th>
						</thead>
						<tbody>
							<?php
							$sql = mysqli_query($dblink, "SELECT * from alat_view where status_alat = '$xxrsts'");
							while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
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
								$xhapus = isset($r['cek_alat']) ? $r['cek_alat'] : '';
								$xnone = 'none';
							?>
								<tr>
									<td><?php echo $xid ?></td>
									<td><a href='dashboard.php?xlink=view_data/detail_alat.php&apage=alat&id=<?php echo $xid ?>'><?php echo $xnama ?></a></td>
									<td><?php echo $xlokasi ?></td>
									<td><?php echo $xkategori ?></td>
									<td class="text-center"><?php echo date_format(new DateTime($xtahun), 'd M Y'); ?></td>
									<td><?php echo $xstatus ?></td>
									<td class='td-actions text-right' style="width:96px;">
										<?php
										if ($xhapus == '') {
											if ($xhimg == '') { ?>
												<a href='control_data/proses_db_alat.php?modul=alat&act=hapus&xxid=<?php echo $xid ?>&g=<?php echo $xnone ?>' class='btn btn-danger btn-sm'>
													<button type='button' rel='tooltip' title='Remove' class='btn btn-white btn-link btn-sm'>
														<i class='material-icons'>close</i>
													</button>
												</a>
											<?php } else { ?>
												<a href='control_data/proses_db_alat.php?modul=alat&act=hapus&xxid=<?php echo $xid ?>&g=<?php echo $xhimg ?>' class='btn btn-danger btn-sm'>
													<button type='button' rel='tooltip' title='Remove' class='btn btn-white btn-link btn-sm'>
														<i class='material-icons'>close</i>
													</button>
												</a>
										<?php }
										} ?>
										<a href='dashboard.php?xlink=view_data/edit/edit_alat.php&apage=alat&id=<?php echo $xid ?>' class='btn btn-primary btn-sm'>
											<button type='button' rel='tooltip' title='Edit' class='btn btn-white btn-link btn-sm'>
												<i class='material-icons'>edit</i>
											</button>
										</a>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>