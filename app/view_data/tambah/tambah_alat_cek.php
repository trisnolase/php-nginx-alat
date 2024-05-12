<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
?>
	<div class=''>
		<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title'>Peralatan Jaringan</h4>
				<p class='card-category'> Kategori Peralatan</p>
			</div>
			<div class='card-body'>
				<div class='table-responsive'>
					<form name='formCekKategori' method='POST' enctype='multipart/form-data' action='dashboard.php?xlink=view_data/tambah/tambah_alat_kt.php&apage=alat'>
						<table class='table table-hover'>
							<tr>
								<td width='200px'>Kategori</td>
								<td>:</td>
								<td>
									<select class='select2 col-md-12' name='xkat' required>" ;
										<option value=''></option>
										<?php
										$sql = mysqli_query($dblink, "SELECT * from tblkategori");
										while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
											$xidk = isset($r['id_kategori']) ? $r['id_kategori'] : '';
											$xnk = isset($r['nama_kategori']) ? $r['nama_kategori'] : '';
											echo "<option value=$xidk>$xnk</option> ";
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td>
									<input class='btn btn-success' type='submit' name='ckirim' value='Lanjut' />
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