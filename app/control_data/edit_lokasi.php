<?php
	$xkid = $_GET['id'];
	$sql = mysqli_query($dblink,"SELECT * from tbllokasi where id_lokasi='$xkid'");
		while ($r=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
			$xidk = isset($r['id_lokasi']) ? $r['id_lokasi'] : '';
			$xnk = isset($r['nama_lokasi']) ? $r['nama_lokasi'] : '';
		}
	echo"<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title'>Lokasi</h4>
				<p class='card-category'>Tambah Lokasi Peralatan</p>
			</div>
			<div class='card-body'>
			<form name='formEditlokasi' method='POST' action='control_data/proses_db_lokasi.php?modul=lokasi&act=edit'>
			<table class='table table-hover'>
				<tr>
					<td width='15%'>Id lokasi</td>
					<td width='10px' align='center'>:</td>
					<td><input class='col-md-12' value='$xidk' type='teks' name='xid' readonly/></td>
				</tr>
				<tr>
					<td>lokasi</td>
					<td align='center'>:</td>
					<td><input class='form-control' value='$xnk' type='teks' name='xkat' /></td>
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