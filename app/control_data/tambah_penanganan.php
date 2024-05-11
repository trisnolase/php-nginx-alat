<?php
	$xkid = $_GET['id'];
	$sql = mysqli_query($dblink,"SELECT * from tblgangguan where id_gangguan='$xkid'");
	while ($r=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
		$xidk = isset($r['id_gangguan']) ? $r['id_gangguan'] : '';
		$xidalat = isset($r['id_alat']) ? $r['id_alat'] : '';
		$xdes = isset($r['deskripsi_gangguan']) ? $r['deskripsi_gangguan'] : '';
	}
	echo"<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title'>Gangguan Peralatan</h4>
				<p class='card-category'>Edit Data</p>
			</div>
			<div class='card-body'>
				<form name='formInputDataPenanganan' method='POST' action='control_data/proses_db_penanganan.php?modul=penanganan&act=input'>
				<div class='table-responsive'>
				<table class='table table-hover'>
					<tr>
						<td width='15%'>ID Gangguan Alat</td>
						<td align='center'>:</td>
						<td>
							<input class='col-md-11' type='teks' name='xidga' value='$xidk' readonly/>
							<input type='hidden' name='xida' value='$xidalat' readonly/>
						</td>
					</tr>
					<tr>
						<td width='15%'>Deskripsi Gangguan</td>
						<td align='center'>:</td>
						<td><input class='form-control' type='text' name='xdesg' value='$xdes'/></td>
					</tr>
					<tr>
						<td width='15%'>Tanggal Penanganan</td>
						<td align='center'>:</td>
						<td><input class='form-control' type='date' name='xtgl' /></td>
					</tr>
					<tr>
						<td width='15%'>Teknisi</td>
						<td align='center'>:</td>
						<td><input class='form-control' type='teks' name='xtek' /></td>
					</tr>
					<tr>
						<td width='15%'>Penyelesaian</td>
						<td align='center'>:</td>
						<td><input class='form-control' type='teks' name='xpeny' /></td>
					</tr>
					<tr>
						<td width='15%'>Hasil</td>
						<td align='center'>:</td>
						<td>
							<select class='select2 col-md-12' name='xhasil'>
								<option value=''></option>
								<option value='Normal'>Berhasil Diperbaiki</option>
								<option value='Rusak Permanen'>Tidak Berhasil Diperbaiki</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Rekomendasi</td>
						<td align='center'>:</td>
						<td><input class='form-control' type='teks' name='xrekom' /></td>
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