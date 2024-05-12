<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<div class='col-md-12'>
		<div class='card'>
			<div class='card-body'>
				<a class='btn btn-success btn-sm' href='dashboard.php?xlink=view_data/tambah/tambah_mutasi.php&apage=mutasi'>Mutasi Peralatan</a>
			</div>
		</div>
	</div>
	<?php
	// $sql = mysqli_query($dblink, "SELECT * from histori_lokasi_view order by id_histori desc");
	?>
	<div class='col-md-12'>
		<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title '>Mutasi</h4>
				<p class='card-category'> List Data</p>
			</div>
			<div class='card-body'>
				<div class='table-responsive'>
					<table class='table table-hover'>
						<thead class='text-primary text-center'>
							<th>ID Alat</th>
							<th>Nama Alat</th>
							<th>Lokasi Awal</th>
							<th>Lokasi Mutasi</th>
							<th>Tanggal Mutasi</th>
						</thead>
						<tbody>
							<?php

							// =====================================================================

							$batas = 5;
							$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
							$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

							$previous = $halaman - 1;
							$next = $halaman + 1;

							$data = mysqli_query($dblink, "SELECT * from histori_lokasi_view");
							$jumlah_data = mysqli_num_rows($data);
							$total_halaman = ceil($jumlah_data / $batas);

							$query = mysqli_query($dblink, "SELECT * from histori_lokasi_view order by id_histori desc limit $halaman_awal, $batas");
							$nomor = $halaman_awal + 1;

							// =====================================================================

							while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
								$xidal = isset($r['id_alat']) ? $r['id_alat'] : '';
								$xnal = isset($r['nama_peralatan']) ? $r['nama_peralatan'] : '';
								$xnmla = isset($r['nama_lokasi_a']) ? $r['nama_lokasi_a'] : '';
								$xnmlb = isset($r['nama_lokasi_b']) ? $r['nama_lokasi_b'] : '';
								$xtglm = isset($r['tgl']) ? $r['tgl'] : '';
							?>
								<tr>
									<td class='text-center'><?php echo $xidal ?></td>
									<td><?php echo $xnal ?></td>
									<td><?php echo $xnmla ?></td>
									<td><?php echo $xnmlb ?></td>
									<td class="text-center"><?php echo date_format(new DateTime($xtglm), 'd M Y'); ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>

					<!-- ===================================================================== -->

					<nav>
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link mr-1" <?php if ($halaman > 1) {
																echo "href='dashboard.php?xlink=view_data/mutasi_alat.php&apage=mutasi&halaman=$previous'";
															} ?>>Previous</a>
							</li>
							<?php
							for ($x = 1; $x <= $total_halaman; $x++) {
								$active = '';
								if ($x == $halaman) {
									$active = "active";
								}
							?>
								<li class="page-item <?php echo $active ?>"><a class="page-link mr-1" href="dashboard.php?xlink=view_data/mutasi_alat.php&apage=mutasi&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
							<?php
							}
							?>
							<li class="page-item">
								<a class="page-link" <?php if ($halaman < $total_halaman) {
															echo "href='dashboard.php?xlink=view_data/mutasi_alat.php&apage=mutasi&halaman=$next'";
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