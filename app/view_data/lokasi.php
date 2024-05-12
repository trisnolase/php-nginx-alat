<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<div class='col-md-12'>
		<div class='card'>
			<div class='card-body'>
				<a class='btn btn-success btn-sm' href='dashboard.php?xlink=view_data/tambah/tambah_lokasi.php&apage=lokasi'>Tambah Data lokasi</a>
			</div>
		</div>
	</div>
	<?php
	include "db_link.php";
	$sql = mysqli_query($dblink, "SELECT * from lokasi_view");
	?>
	<div class='col-md-12'>
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
						<tbody>
							<?php
							while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
								$xidk = isset($r['id_lokasi']) ? $r['id_lokasi'] : '';
								$xnk = isset($r['nama_lokasi']) ? $r['nama_lokasi'] : '';
								$xjlh = isset($r['jlh_alt']) ? $r['jlh_alt'] : '';
							?>
								<tr>
									<td class='text-center'><?php echo $xidk ?></td>
									<td><?php echo $xnk ?></td>
									<td class="text-center"><?php echo $xjlh ?></td>
									<td class='td-actions text-center' style="width:96px;">
										<a class='btn btn-danger btn-sm' href='control_data/proses_db_lokasi.php?modul=lokasi&act=hapus&xxid=<?php echo $xidk ?>'>
											<button type='button' rel='tooltip' title='Remove' class='btn btn-white btn-link btn-sm'>
												<i class='material-icons'>close</i>
											</button>
										</a>
										<a class='btn btn-primary btn-sm' href='dashboard.php?xlink=view_data/edit/edit_lokasi.php&apage=lokasi&mod=edit&id=<?php echo $xidk ?>'>
											<button type='button' rel='tooltip' title='Edit' class='btn btn-white btn-link btn-sm'>
												<i class='material-icons'>edit</i>
											</button>
										</a>
									</td>
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