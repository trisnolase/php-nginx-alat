<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<?php
	$xidkat = $_POST['xkat'];
	$gsql = mysqli_query($dblink, "SELECT * from kategori_view where id_kat='$xidkat'");
	while ($gr = mysqli_fetch_array($gsql, MYSQLI_ASSOC)) {
		$xidbk = isset($gr['id_cek']) ? $gr['id_cek'] : '';
		$xa = isset($gr['a']) ? $gr['a'] : '';
		$xb = isset($gr['b']) ? $gr['b'] : '';
		$xc = isset($gr['c']) ? $gr['c'] : '';
		$xd = isset($gr['d']) ? $gr['d'] : '';
		$xe = isset($gr['e']) ? $gr['e'] : '';
		$xf = isset($gr['f']) ? $gr['f'] : '';
		$xg = isset($gr['g']) ? $gr['g'] : '';
		$xh = isset($gr['h']) ? $gr['h'] : '';
		$xidk = isset($gr['id_kategori']) ? $gr['id_kategori'] : '';
		$xnk = isset($gr['nama_kategori']) ? $gr['nama_kategori'] : '';
	}
	?>
	<div class='col-md-12'>
		<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title'>Peralatan Jaringan</h4>
				<p class='card-category'> Tambah Data Peralatan</p>
			</div>
			<div class='card-body'>
				<div class='table-responsive'>
					<form name='formInputDataAlat' method='POST' enctype='multipart/form-data' action='control_data/proses_db_alat.php?modul=alat&act=input'>
						<table class='table table-hover'>
							<tr>
								<td>Kategori</td>
								<td>:</td>
								<td>
									<input class='form-control' value="<?php echo $xidk ?>" type='hidden' name='xkat' />
									<input class='form-control' value=" <?php echo $xnk ?>" type='text' name='xkat' disabled />
								</td>
							</tr>
							<tr>
								<td width='15%'>Id Alat</td>
								<td width='10px'>:</td>
								<td><input class='form-control' type='teks' name='xid' required /></td>
							</tr>
							<tr>
								<td>Lokasi</td>
								<td>:</td>
								<td>
									<select class='col-md-8 select2' id='xlok' name='xlok' required>
										<option value=''></option>
										<?php
										$sql = mysqli_query($dblink, "SELECT * from tbllokasi");
										while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
											$xidl = isset($r['id_lokasi']) ? $r['id_lokasi'] : '';
											$xnl = isset($r['nama_lokasi']) ? $r['nama_lokasi'] : '';
											echo "<option value=$xidl>$xnl</option> ";
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Nama Peralatan</td>
								<td>:</td>
								<td><input class='form-control' type='teks' name='xnama' required /></td>
							</tr>
							<tr>
								<td>Tahun Beli</td>
								<td>:</td>
								<td><input class='form-control col-md-2' type='date' name='xtgl' required /></td>
							</tr>
							<tr>
								<td>Deskripsi</td>
								<td>:</td>
								<td><textarea class='form-control' name='xdesc' rows='5' cols='93' required></textarea></td>
							</tr>
							<!-- Jumlah Port -->
							<?php if ($xa == 1) { ?>
								<tr>
									<td>Jumlah Port</td>
									<td>:</td>
									<td><input class='form-control' type='teks' name='xjp' required /></td>
								</tr>
							<?php } ?>
							<!-- Nama WIFI -->
							<?php if ($xb == 1) { ?>
								<tr>
									<td>Nama Wifi</td>
									<td>:</td>
									<td><input class='form-control' type='teks' name='xnwifi' required /></td>
								</tr>
							<?php } ?>
							<!-- Pass Wifi -->
							<?php if ($xc == 1) { ?>
								<tr>
									<td>Password Wifi</td>
									<td>:</td>
									<td><input class='form-control' type='teks' name='xpwifi' required /></td>
								</tr>
							<?php } ?>
							<!-- Frekuensi -->
							<?php if ($xd == 1) { ?>
								<tr>
									<td>Frekuensi</td>
									<td>:</td>
									<td><input class='form-control' type='teks' name='xfrek' required /></td>
								</tr>
							<?php } ?>
							<!-- Lebar Frekuensi -->
							<?php if ($xe == 1) { ?>
								<tr>
									<td>Lebar Frekuensi</td>
									<td>:</td>
									<td><input class='form-control' type='teks' name='xlfrek' required /></td>
								</tr>
							<?php } ?>
							<!-- RAM -->
							<?php if ($xf == 1) { ?>
								<tr>
									<td>Kapasitas RAM</td>
									<td>:</td>
									<td><input class='form-control' type='teks' name='xram' required /></td>
								</tr>
							<?php } ?>
							<!-- Disk -->
							<?php if ($xg == 1) { ?>
								<tr>
									<td>Hardisk</td>
									<td>:</td>
									<td><input class='form-control' type='teks' name='xdisk' required /></td>
								</tr>
							<?php } ?>
							<!-- Processor -->
							<?php if ($xh == 1) { ?>
								<tr>
									<td>Processor</td>
									<td>:</td>
									<td><input class='form-control' type='teks' name='xpro' required /></td>
								</tr>
							<?php } ?>
							<tr>
								<td>Gambar</td>
								<td>:</td>
								<td><input class='form-control' type='file' name='xgambar'></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td>
									<input class='btn btn-success' type='submit' name='ckirim' value='Simpan' />
									<input class='btn btn-warning' type='reset' name='creset' value='Batal' onClick=history.go(-1); />
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>