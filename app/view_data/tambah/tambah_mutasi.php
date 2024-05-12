<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
	</head>

	<body>
		<?php
		include "db_link.php";
		?>
		<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title'>Mutasi Peralatan</h4>
				<p class='card-category'>Input Mutasi</p>
			</div>
			<div class='card-body'>
				<form name='formInputDataMutasi' method='POST' action='control_data/proses_db_mutasi.php?modul=mutasi&act=input'>
					<table class="table table-hover">
						<tr>
							<td width='25%'>Nama Peralatan</td>
							<td width='20px'>:</td>
							<td>
								<select class='select2 col-md-12' name='xnama' id='xnama' required>
									<option value=''></option>
									<?php
									$query = "SELECT * from tblalat,tbllokasi where tblalat.id_lokasi=tbllokasi.id_lokasi AND status_alat='Normal'";
									$result = $dblink->query($query);
									while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
										$xna = "" . $data['nama_peralatan'] . "";
										$xida = "" . $data['id_alat'] . "";
										$xidlok = "" . $data['id_lokasi'] . "";
										$xnamlok = "" . $data['nama_lokasi'] . "";
										echo "<option value='$xida'>$xida | $xna | $xnamlok</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Lokasi Baru</td>
							<td>:</td>
							<td>
								<select class='select2 col-md-12' name='xlb' id='xlb' required>
								</select>
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
				</form>
	</body>

	</html>
<?php } else {
	echo "<center>Silakan login untuk akses data</center";
} ?>