<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<?php
	$xkid = $_GET['id'];
	$sql = mysqli_query($dblink, "SELECT * from kategori_view where id_kategori='$xkid'");
	if (mysqli_num_rows($sql) == 0) {
		echo "<div class='col'>
	<class='alert-heading'>
	<i class='material-icons text-warning'>warning</i>
	<p>
	Data Tidak Ditemukan
	</p>
</div>";
	} else {
		while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
			$xidk = isset($r['id_kategori']) ? $r['id_kategori'] : '';
			$xnk = isset($r['nama_kategori']) ? $r['nama_kategori'] : '';
			$xxidk = isset($ar['id_kat']) ? $ar['id_kat'] : '';
			$xxa = isset($r['a']) ? $r['a'] : '';
			$xxb = isset($r['b']) ? $r['b'] : '';
			$xxc = isset($r['c']) ? $r['c'] : '';
			$xxd = isset($r['d']) ? $r['d'] : '';
			$xxe = isset($r['e']) ? $r['e'] : '';
			$xxf = isset($r['f']) ? $r['f'] : '';
			$xxg = isset($r['g']) ? $r['g'] : '';
			$xxh = isset($r['h']) ? $r['h'] : '';
		}
	?>
		<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title'>Kategori</h4>
				<p class='card-category'>Edit</p>
			</div>
			<div class='card-body'>
				<form name='formEditKategori' method='POST' action='control_data/proses_db_kategori.php?modul=kategori&act=edit'>
					<table class='table table-hover'>
						<tr>
							<td width='15%'>Id Kategori</td>
							<td width='10px'>:</td>
							<input value='<?php echo $xidk ?>' type='hidden' name='xid' />
							<td><input class='form-control' value='<?php echo $xidk ?>' type='teks' name='xid' disabled /></td>
						</tr>
						<tr>
							<td>Kategori</td>
							<td>:</td>
							<td><input class='form-control' value='<?php echo $xnk ?>' type='teks' name='xkat' /></td>
						</tr>
						<tr>
							<td>Detail Tambahan</td>
							<td>:</td>
							<td>
								<input type='checkbox' name='xjp' value='1' <?php if ($xxa == 1) echo "checked" ?>> Jumlah Port
								<input type='checkbox' name='xnw' value='1' <?php if ($xxb == 1) echo "checked" ?>> Nama WIFI
								<input type='checkbox' name='xpw' value='1' <?php if ($xxc == 1) echo "checked" ?>> Password WIFI
								<input type='checkbox' name='xfa' value='1' <?php if ($xxd == 1) echo "checked" ?>> Frekuensi Alat
								<input type='checkbox' name='xlf' value='1' <?php if ($xxe == 1) echo "checked" ?>> Lebar Frekuensi
								<input type='checkbox' name='xkr' value='1' <?php if ($xxf == 1) echo "checked" ?>> Kapasitas RAM
								<input type='checkbox' name='xkh' value='1' <?php if ($xxg == 1) echo "checked" ?>> Kapasitas Hardisk
								<input type='checkbox' name='xpr' value='1' <?php if ($xxh == 1) echo "checked" ?>> Processor
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<input class='btn btn-success btn-sm' type='submit' name='ckirim' value='Simpan' />
								<input class='btn btn-warning btn-sm' type='reset' name='creset' value='Batal' onClick=history.go(-1); />
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	<?php } ?>

<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>