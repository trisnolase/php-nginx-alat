<?php
	echo"<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title'>Lokasi</h4>
				<p class='card-category'>Tambah Lokasi Peralatan</p>
			</div>
			<div class='card-body'>
			<form name='formInputDatalokasi' method='POST' action='control_data/proses_db_lokasi.php?modul=lokasi&act=input'>
			<table class='table table-hover'>
				<tr>
					<td width='15%'>Id lokasi</td>
					<td width='10px' align='center'>:</td>
					<td><input class='form-control' type='teks' name='xid' /></td>
				</tr>
				<tr>
					<td>Nama lokasi</td>
					<td align='center'>:</td>
					<td><input class='form-control' type='teks' name='xkat' /></td>
				</tr>
				<tr>
					<td colspan='3' align='center'>
						<input class='btn btn-success btn-sm' type='submit' name='ckirim' value='Simpan' />
						<input class='btn btn-warning btn-sm' type='reset' name='creset' value='Batal'  onClick=history.go(-1); />
					</td>
				</tr>
				</table>
				</div>
			</form>
		</div>
	</div>";
?>