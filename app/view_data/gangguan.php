<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<?php
	// $sql = mysqli_query($dblink, "SELECT * from tblgangguan as a,tblalat as b where a.id_alat=b.id_alat order by a.id_gangguan desc");
	?>
	<div class='col-md-12'>
		<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title '>Laporan Gangguan</h4>
				<p class='card-category'> List Data</p>
			</div>
			<div class='card-body'>
				<div class='table-responsive'>
					<table class='table table-hover'>
						<thead class='text-primary text-center'>
							<th>ID Gangguan</th>
							<th>ID Alat</th>
							<th>Nama Alat</th>
							<th>Tanggal Lapor</th>
							<th>Ciri - Ciri Gangguan</th>
							<th>Deskripsi Gangguan Alat</th>
							<th>Status Proses</th>
							<th>Aksi</th>
						</thead>
						<tbody>
							<?php

							// =====================================================================

							$batas = 5;
							$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
							$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

							$previous = $halaman - 1;
							$next = $halaman + 1;

							$data = mysqli_query($dblink, "SELECT * from gangguan_view");
							$jumlah_data = mysqli_num_rows($data);
							$total_halaman = ceil($jumlah_data / $batas);

							$query = mysqli_query($dblink, "SELECT * from gangguan_view order by status asc limit $halaman_awal, $batas");
							$nomor = $halaman_awal + 1;

							// =====================================================================

							while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
								$xidk = isset($r['id_gangguan']) ? $r['id_gangguan'] : '';
								$xnma = isset($r['nama_peralatan']) ? $r['nama_peralatan'] : '';
								$xida = isset($r['id_alat']) ? $r['id_alat'] : '';
								$xtgl = isset($r['tgl_gangguan']) ? $r['tgl_gangguan'] : '';
								$xciri = isset($r['ciri']) ? $r['ciri'] : '';
								$xdg = isset($r['deskripsi_gangguan']) ? $r['deskripsi_gangguan'] : '';
								$xsts = isset($r['status']) ? $r['status'] : '';
								if ($xsts == "B") {
									$xstatus = "Belum Diproses";
								} else {
									$xstatus = "Sudah Diproses";
								}
							?>
								<tr>
									<td class='text-center'><?php echo $xidk ?></td>
									<td><?php echo $xida ?></td>
									<td><?php echo $xnma ?></td>
									<td class="text-center"><?php echo date_format(new DateTime($xtgl), 'd M Y'); ?></td>
									<td><?php echo $xciri ?></td>
									<td><?php echo $xdg ?></td>
									<td><?php echo $xstatus ?></td>
									<td class="text-center">
										<?php if ($xsts <> 'S') {
											echo "<a href='dashboard.php?xlink=view_data/tambah/tambah_penanganan.php&apage=gangguan&id=$xidk' class='btn btn-danger btn-sm'>Ubah Status</a>";
										} else {
											echo "<i class='material-icons text-success'>check</i>";
										} ?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>

					<!-- ===================================================================== -->

					<nav>
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link mr-1" <?php if ($halaman > 1) {
																echo "href='dashboard.php?xlink=view_data/gangguan.php&apage=gangguan&halaman=$previous'";
															} ?>>Previous</a>
							</li>
							<?php
							for ($x = 1; $x <= $total_halaman; $x++) {
								$active = '';
								if ($x == $halaman) {
									$active = "active";
								}
							?>
								<li class="page-item <?php echo $active ?>"><a class="page-link mr-1" href="dashboard.php?xlink=view_data/gangguan.php&apage=gangguan&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
							<?php
							}
							?>
							<li class="page-item">
								<a class="page-link" <?php if ($halaman < $total_halaman) {
															echo "href='dashboard.php?xlink=view_data/gangguan.php&apage=gangguan&halaman=$next'";
														} ?>>Next</a>
							</li>
						</ul>
					</nav>

					<!-- ===================================================================== -->

				</div>
			</div>
		</div>
	</div>
<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>