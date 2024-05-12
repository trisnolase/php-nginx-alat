<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<div class='card'>
		<div class='card-header card-header-primary'>
			<h4 class='card-title'>Kategori</h4>
			<p class='card-category'>Tambah Kategori Peralatan</p>
		</div>
		<div class='card-body'>
			<form name='formInputDataKategori' method='POST' action='control_data/proses_db_kategori.php?modul=kategori&act=input'>
				<div class='table-responsive'>
					<table class='table table-hover'>
						<tr>
							<td width='15%'>Id kategori</td>
							<td width='10px'>:</td>
							<td><input class='form-control' type='teks' name='xid' required /></td>
						</tr>
						<tr>
							<td>Nama Kategori</td>
							<td>:</td>
							<td><input class='form-control' type='teks' name='xkat' required /></td>
						</tr>
						<tr>
							<td>Detail Tambahan</td>
							<td>:</td>
							<td>
								<input type='checkbox' name='xjp' value='1'> Jumlah Port
								<input type='checkbox' name='xnw' value='1'> Nama WIFI
								<input type='checkbox' name='xpw' value='1'> Password WIFI
								<input type='checkbox' name='xfa' value='1'> Frekuensi Alat
								<input type='checkbox' name='xlf' value='1'> Lebar Frekuensi
								<input type='checkbox' name='xkr' value='1'> Kapasitas RAM
								<input type='checkbox' name='xkh' value='1'> Kapasitas Hardisk
								<input type='checkbox' name='xpr' value='1'> Processor
							</td>
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
				</div>
			</form>
		</div>
	</div>

<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>