<?php
session_start();
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="assets/img/favicon.png">
		<title>
			Sistem Informasi Inventaris Peralatan Jaringan
		</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
		<style>
			body {
				background-color: #fff !important;
			}
		</style>
	</head>

	<body><br>
		<div class="text-center">SISTEM INFORMASI PERALATAN JARINGAN</div>
		<!-- Detail alat -->
		<?php
		include "../db_link.php";
		$xkode = $_GET['idp'];
		$sql = mysqli_query($dblink, "SELECT * from tblalat,tblkategori,tbllokasi
		WHERE
			tblalat.id_kategori =  tblkategori.id_kategori AND
			tblalat.id_lokasi =  tbllokasi.id_lokasi AND
			tblalat.id_alat='$xkode'");
		$i = 0;
		while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
			$i++;
			if (($i % 2) == 0)
				$bg = "#b5e2ff";
			else
				$bg = "#fff";
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
			$xgambar = isset($r['p_img']) ? $r['p_img'] : '';
			$target = "../view_data/prod_img/$xgambar";
			if ($xgambar == '') {
				$xxtampil = 'iempty.jpg';
			} else {
				if (file_exists($target)) {
					$xxtampil = $xgambar;
				} else {
					$xxtampil = 'iempty_ac.jpg';
				}
			}
		?>
			<div class='col-md-12'>
				<div class='card'>
					<div class='card-header card-header-primary'>
						<h4 class='card-title '>Peralatan Jaringan</h4>
						<p class='card-category'> Detail Alat</p>
					</div>
					<div class='card-body'>
						<div class='table-responsive'>
							<table class='table table-hover'>
								<tr>
									<td class='align-top w-25' rowspan='7'>
										<img src='../view_data/prod_img/<?php echo $xxtampil ?>' width='100%'>
									</td>
									<td width="200px">Id Alat</td>
									<td>: <?php echo $xid ?></td>
									<td width="200px">Nama WIFI</td>
									<td>: <?php echo $xnamawifi ?></td>
								</tr>
								<tr>
									<td width="200px">Nama Alat</td>
									<td>: <?php echo $xnama ?></td>
									<td width="200px">Password WIFI</td>
									<td>: <?php echo $xpasswifi ?></td>
								</tr>
								<tr>
									<td width="200px">Lokasi</td>
									<td>: <?php echo $xlokasi ?></td>
									<td width="200px">Frekuensi</td>
									<td>: <?php echo $xfrek ?></td>
								</tr>
								<tr>
									<td width="200px">Kategori</td>
									<td>: <?php echo $xkategori ?></td>
									<td width="200px">Kapasitas RAM</td>
									<td>: <?php echo $xram ?></td>
								</tr>
								<tr>
									<td width="200px">Tahun Pembelian</td>
									<td>: <?php echo $xtahun ?></td>
									<td width="200px">Kapasitas Hardisk</td>
									<td>: <?php echo $xdisk ?></td>
								</tr>
								<tr>
									<td width="200px">Deskripsi</td>
									<td>: <?php echo $xdesc ?></td>
									<td width="200px">Kapasitas Processor</td>
									<td>: <?php echo $xprocessor ?></td>
								</tr>
								<tr>
									<td width="200px">Jumlah Port</td>
									<td>: <?php echo $xjlhport ?></td>
									<td width="200px">Status</td>
									<td>: <?php echo $xstatus ?></td>
								</tr>
							<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- Detail mutasi alat -->
			<?php
			$sqll = mysqli_query($dblink, "SELECT * from tblhistorilokasi,tblalat,tbllokasi WHERE tblhistorilokasi.id_alat=tblalat.id_alat AND tbllokasi.id_lokasi=tblalat.id_lokasi AND tblalat.id_alat='$xkode' order by tblhistorilokasi.id_histori DESC");
			?>
			<div class='col-md-12'>
				<div class='card'>
					<div class='card-header card-header-info'>
						<h4 class='card-title '>Mutasi Peralatan</h4>
						<p class='card-category'> Histori Mutasi</p>
					</div>
					<div class='card-body'>
						<div class='table-responsive'>
							<table class='table table-hover'>
								<thead class='text-center'>
									<th>Lokasi Awal</th>
									<th>Lokasi Mutasi</th>
									<th>Tanggal Mutasi</th>
								</thead>
								<tbody>
									<?php
									$xi = 0;
									while ($rr = mysqli_fetch_array($sqll, MYSQLI_ASSOC)) {
										$xi++;
										$xidal = isset($rr['id_alat']) ? $rr['id_alat'] : '';
										$xnal = isset($rr['nama_peralatan']) ? $rr['nama_peralatan'] : '';
										$xidla = isset($rr['id_lokasi_a']) ? $rr['id_lokasi_a'] : '';
										$xidlb = isset($rr['id_lokasi_b']) ? $rr['id_lokasi_b'] : '';
										$xla = isset($rr['nama_lokasi']) ? $rr['nama_lokasi'] : '';
										$xtglm = isset($rr['tgl']) ? $rr['tgl'] : '';

										$xsql = mysqli_query($dblink, "SELECT * from tbllokasi where id_lokasi='$xidla'");
										while ($xr = mysqli_fetch_array($xsql, MYSQLI_ASSOC)) {
											$xnmla = isset($xr['nama_lokasi']) ? $xr['nama_lokasi'] : '';
										}

										$dsql = mysqli_query($dblink, "SELECT * from tbllokasi where id_lokasi='$xidlb'");
										while ($dr = mysqli_fetch_array($dsql, MYSQLI_ASSOC)) {
											$xnmlb = isset($dr['nama_lokasi']) ? $dr['nama_lokasi'] : '';
										}

										if ($i <> 0) { ?>
											<tr>
												<td><?php echo $xnmla ?></td>
												<td><?php echo $xnmlb ?></td>
												<td><?php echo $xtglm ?></td>
											</tr>
										<?php }
									}
									if ($i == 0) { ?>
										<tr>
											<td colspan='3'>Peralatan belum pernah dimutasi</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- Detail penanganan gangguan alat -->
			<?php
			$wsql = mysqli_query($dblink, "SELECT * from tblpenanganan,tblalat,tblgangguan
	where tblpenanganan.id_gangguan = tblgangguan.id_gangguan and tblgangguan.id_alat = tblalat.id_alat AND tblalat.id_alat='$xkode'
	order by tblpenanganan.id_penanganan desc");
			?>
			<div class='col-md-12'>
				<div class='card'>
					<div class='card-header card-header-success'>
						<h4 class='card-title '>Penanganan Gangguan</h4>
						<p class='card-category'> Histori Gangguan Peralatan</p>
					</div>
					<div class='card-body'>
						<div class='table-responsive'>
							<table class='table table-hover'>
								<thead class='text-center'>
									<th>Gangguan Alat</th>
									<th>Tanggal Lapor</th>
									<th>Tanggal Penanganan</th>
									<th>Teknisi</th>
									<th>Penyelesian</th>
									<th>Hasil</th>
									<th>Rekomendasi</th>
								</thead>
								<tbody>
									<?php
									$xi = 0;
									while ($wr = mysqli_fetch_array($wsql, MYSQLI_ASSOC)) {
										$xi++;
										$xwidk = isset($wr['id_penanganan']) ? $wr['id_penanganan'] : '';
										$xwdes = isset($wr['deskripsi_gangguan']) ? $wr['deskripsi_gangguan'] : '';
										$xwidg = isset($wr['id_gangguan']) ? $wr['id_gangguan'] : '';
										$xtglg = isset($wr['tgl_gangguan']) ? $wr['tgl_gangguan'] : '';
										$xwtgl = isset($wr['tgl_penanganan']) ? $wr['tgl_penanganan'] : '';
										$xwtek = isset($wr['teknisi']) ? $wr['teknisi'] : '';
										$xwpeny = isset($wr['penyelesaian']) ? $wr['penyelesaian'] : '';
										$xwhasil = isset($wr['hasil']) ? $wr['hasil'] : '';
										$xwrekom = isset($wr['rekomendasi']) ? $wr['rekomendasi'] : '';
										$xwida = isset($wr['id_alat']) ? $wr['id_alat'] : '';
										$xwnma = isset($wr['nama_peralatan']) ? $wr['nama_peralatan'] : '';
										if ($xi <> 0) {
									?>
											<tr>
												<td><?php echo $xwdes ?></td>
												<td><?php echo $xtglg ?></td>
												<td><?php echo $xwtgl ?></td>
												<td><?php echo $xwtek ?></td>
												<td><?php echo $xwpeny ?></td>
												<td><?php echo $xwhasil ?></td>
												<td><?php echo $xwrekom ?></td>
											</tr>
										<?php }
									}
									if ($xi == 0) { ?>
										<tr>
											<td colspan='7'>Belum ada laporan gangguan alat atau gangguan belum diproses</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- Detail gangguan alat belum diproses -->
			<?php
			$csql = mysqli_query($dblink, "SELECT * from tblgangguan as a,tblalat as b where a.id_alat=b.id_alat and a.id_alat='$xkode' and a.status='B' order by a.id_gangguan desc");
			?>
			<div class='col-md-12'>
				<div class='card'>
					<div class='card-header card-header-danger'>
						<h4 class='card-title '>Laporan Gangguan</h4>
						<p class='card-category'> Laporan Gangguan Peralatan Belum Diproses</p>
					</div>
					<div class='card-body'>
						<div class='table-responsive'>
							<table class='table table-hover'>
								<thead class='text-center'>
									<th>Tanggal Lapor</th>
									<th>Ciri - Ciri Gangguan</th>
									<th>Deskripsi Gangguan Alat</th>
									<th>Status Proses</th>
								</thead>
								<tbody>
									<?php
									$ci = 0;
									while ($cr = mysqli_fetch_array($csql, MYSQLI_ASSOC)) {
										$ci++;
										$xidk = isset($cr['id_gangguan']) ? $cr['id_gangguan'] : '';
										$xnma = isset($cr['nama_peralatan']) ? $cr['nama_peralatan'] : '';
										$xida = isset($cr['id_alat']) ? $cr['id_alat'] : '';
										$xtgl = isset($cr['tgl_gangguan']) ? $cr['tgl_gangguan'] : '';
										$xciri = isset($cr['ciri']) ? $cr['ciri'] : '';
										$xdg = isset($cr['deskripsi_gangguan']) ? $cr['deskripsi_gangguan'] : '';
										$xsts = isset($cr['status']) ? $cr['status'] : '';
										if ($xsts == "B") {
											$xstatus = "Belum Diproses";
										} else {
											$xstatus = "Sudah Diproses";
										}

										if ($ci <> 0) { ?>
											<tr>
												<td><?php $xtgl ?></td>
												<td><?php $xciri ?></td>
												<td><?php $xdg ?></td>
												<td><?php $xstatus ?></td>
											<?php }
									}
									if ($ci == 0) { ?>
											<tr>
												<td colspan='6'>Belum ada laporan gangguan alat</td>
											</tr>
										<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<script>
				window.print();
			</script>
	</body>

	</html>
<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>