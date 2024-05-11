<?php
	echo"<form name='formCekKategori' method='POST' enctype='multipart/form-data' action='index.php?xlink=control_data/tambah_alat_kt.php&apage=alat'>
			<div class=''>
			<div class='card'>
				<div class='card-header card-header-primary'>
					<h4 class='card-title'>Peralatan Jaringan</h4>
					<p class='card-category'> Kategori Peralatan</p>
				</div>
			<div class='card-body'>
				<div class='table-responsive'>
					<table class='table table-hover'>
						<tr>
							<td width='200px'>Kategori</td>
							<td align='center'>:</td>
							<td>
								<select class='form-control select2' name='xkat' style='width:100%' required>" ;
									echo"<option value=''></option>";
									$sql = mysqli_query($dblink,"SELECT * from tblkategori");
									while ($r=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
										$xidk = isset($r['id_kategori']) ? $r['id_kategori'] : '';
										$xnk = isset($r['nama_kategori']) ? $r['nama_kategori'] : '';
										echo "<option value=$xidk>$xnk</option> ";
									}
								echo"</select>
							</td>
						</tr>
						<tr>
							<td colspan='3' align='center'>
								<input class='btn btn-success btn-sm' type='submit' name='ckirim' value='Lanjut' />
								<input class='btn btn-warning btn-sm' type='reset' name='creset' value='Batal'  onClick=history.go(-1); />
							</td>
						</tr>
					</table>
					</table></div></div></div></div>
		</form>";
?>