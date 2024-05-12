<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<div class='col-md-12'>
		<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title '>Penanganan Laporan Gangguan</h4>
				<p class='card-category'> List Data</p>
			</div>
			<div class='card-body'>
				<div class='table-responsive'>
					<table class='table table-hover'>
						<thead class='text-primary text-center'>
							<th>ID Gangguan</th>
							<th>ID Alat</th>
							<th>Nama Alat</th>
							<th>Tanggal Penanganan</th>
							<th>Teknisi</th>
							<th>Penyelesian</th>
							<th>Hasil</th>
							<th>Rekomendasi</th>
						</thead>
						<tbody>
							<?php

							// =====================================================================

							$batas = 5;
							$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
							$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

							$previous = $halaman - 1;
							$next = $halaman + 1;

							$data = mysqli_query($dblink, "SELECT * from penanganan_view");
							$jumlah_data = mysqli_num_rows($data);
							$total_halaman = ceil($jumlah_data / $batas);

							$query = mysqli_query($dblink, "SELECT * from penanganan_view limit $halaman_awal, $batas");
							$nomor = $halaman_awal + 1;

							// =====================================================================

							while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
								$xidk = isset($r['id_penanganan']) ? $r['id_penanganan'] : '';
								$xidg = isset($r['id_gangguan']) ? $r['id_gangguan'] : '';
								$xtgl = isset($r['tgl_penanganan']) ? $r['tgl_penanganan'] : '';
								$xtek = isset($r['teknisi']) ? $r['teknisi'] : '';
								$xpeny = isset($r['penyelesaian']) ? $r['penyelesaian'] : '';
								$xhasil = isset($r['hasil']) ? $r['hasil'] : '';
								$xrekom = isset($r['rekomendasi']) ? $r['rekomendasi'] : '';
								$xida = isset($r['id_alat']) ? $r['id_alat'] : '';
								$xnma = isset($r['nama_peralatan']) ? $r['nama_peralatan'] : '';
							?><tr>
									<td class='text-center'><?php echo $xidg ?></td>
									<td><?php echo $xida ?></td>
									<td><?php echo $xnma ?></td>
									<td class="text-center"><?php echo date_format(new DateTime($xtgl), 'd M Y'); ?></td>
									<td><?php echo $xtek ?></td>
									<td><?php echo $xpeny ?></td>
									<td><?php echo $xhasil ?></td>
									<td><?php echo $xrekom ?></td>
								</tr>
							<?php } ?></tbody>
					</table>

					<!-- ===================================================================== -->

					<nav>
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link mr-1" <?php if ($halaman > 1) {
																echo "href='dashboard.php?xlink=view_data/penanganan.php&apage=penanganan&halaman=$previous'";
															} ?>>Previous</a>
							</li>
							<?php
							for ($x = 1; $x <= $total_halaman; $x++) {
								$active = '';
								if ($x == $halaman) {
									$active = "active";
								}
							?>
								<li class="page-item <?php echo $active ?>"><a class="page-link mr-1" href="dashboard.php?xlink=view_data/penanganan.php&apage=penanganan&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
							<?php
							}
							?>
							<li class="page-item">
								<a class="page-link" <?php if ($halaman < $total_halaman) {
															echo "href='dashboard.php?xlink=view_data/penanganan.php&apage=penanganan&halaman=$next'";
														} ?>>Next</a>
							</li>
						</ul>
					</nav>

					<!-- ===================================================================== -->

				</div>
			</div>
		</div>
	<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>