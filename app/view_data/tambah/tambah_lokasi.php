<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<div class='card'>
		<div class='card-header card-header-primary'>
			<h4 class='card-title'>Lokasi</h4>
			<p class='card-category'>Tambah Lokasi Peralatan</p>
		</div>
		<div class='card-body'>
			<form name='formInputDatalokasi' method='POST' action='control_data/proses_db_lokasi.php?modul=lokasi&act=input'>
				<table class='table table-hover'>
					<tr>
						<td width='15%'>Id lokasi</td>
						<td width='10px'>:</td>
						<td><input class='form-control' type='teks' name='xid'></td>
					</tr>
					<tr>
						<td>Nama lokasi</td>
						<td>:</td>
						<td><input class='form-control' type='teks' name='xkat'></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<input class='btn btn-success' type='submit' name='ckirim' value='Simpan'>
							<input class='btn btn-warning' type='reset' name='creset' value='Batal' onClick=history.go(-1);>
						</td>
					</tr>
				</table>
		</div>
		</form>
	</div>
	</div>

<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>