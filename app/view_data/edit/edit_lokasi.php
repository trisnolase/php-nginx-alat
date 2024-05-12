<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<?php
	$xkid = $_GET['id'];
	$sql = mysqli_query($dblink, "SELECT * from tbllokasi where id_lokasi='$xkid'");
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
			$xidk = isset($r['id_lokasi']) ? $r['id_lokasi'] : '';
			$xnk = isset($r['nama_lokasi']) ? $r['nama_lokasi'] : '';
		}
	?>
		<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title'>Lokasi</h4>
				<p class='card-category'>Tambah Lokasi Peralatan</p>
			</div>
			<div class='card-body'>
				<form name='formEditlokasi' method='POST' action='control_data/proses_db_lokasi.php?modul=lokasi&act=edit'>
					<table class='table table-hover'>
						<tr>
							<td width='15%'>Id lokasi</td>
							<td width='10px'>:</td>
							<input value='<?php echo $xidk ?>' type='hidden' name='xid' />
							<td><input class='form-control' value='<?php echo $xidk ?>' type='teks' name='xid' disabled /></td>
						</tr>
						<tr>
							<td>lokasi</td>
							<td>:</td>
							<td><input class='form-control' value='<?php echo $xnk ?>' type='teks' name='xkat' /></td>
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
			</div>
			</form>
		</div>
		</div>

	<?php } ?>

<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>