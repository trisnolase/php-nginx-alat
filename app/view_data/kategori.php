<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<div class='col-md-12'>
		<div class='card'>
			<div class='card-body'>
				<a class='btn btn-success btn-sm' href='dashboard.php?xlink=view_data/tambah/tambah_kategori.php&apage=kategori'>Tambah Data Kategori</a>
			</div>
		</div>
	</div>
	<?php
	include "db_link.php";
	$sql = mysqli_query($dblink, "SELECT * from jumlah_per_kategori_view");
	?>
	<div class='col-md-12'>
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
						<tbody>
							<?php
							while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
								$xidk = isset($r['id_kategori']) ? $r['id_kategori'] : '';
								$xnk = isset($r['nama_kategori']) ? $r['nama_kategori'] : '';
								$xjlh = isset($r['jlh_alt']) ? $r['jlh_alt'] : '';
							?>
								<tr>
									<td><?php echo $xidk ?></td>
									<td><?php echo $xnk ?></td>
									<td class="text-center"><?php echo $xjlh ?></td>
									<td class='td-actions text-center' style="width:96px;">
										<a class='btn btn-danger btn-sm' href='control_data/proses_db_kategori.php?modul=kategori&act=hapus&xxid=<?php echo $xidk ?>'>
											<button type='button' rel='tooltip' title='Remove' class='btn btn-white btn-link btn-sm'>
												<i class='material-icons'>close</i>
											</button>
										</a>
										<a class='btn btn-primary btn-sm' href='dashboard.php?xlink=view_data/edit/edit_kategori.php&apage=kategori&mod=edit&id=<?php echo $xidk ?>'>
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
	<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>