<?php
$xkid = $_GET['id'];
$sql = mysqli_query($dblink, "SELECT * FROM tblalat,tbllokasi,tblkategori
WHERE
tblalat.id_kategori = tblkategori.id_kategori AND
tblalat.id_lokasi = tbllokasi.id_lokasi AND tblalat.id_alat='$xkid'");
while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
	$xnama = isset($r['nama_peralatan']) ? $r['nama_peralatan'] : '';
	$xlokasi = isset($r['nama_lokasi']) ? $r['nama_lokasi'] : '';
	$xid = isset($r['id_alat']) ? $r['id_alat'] : '';
	$xidlok = isset($r['id_lokasi']) ? $r['id_lokasi'] : '';
	$xidkat = isset($r['id_kategori']) ? $r['id_kategori'] : '';
	$xkategori = isset($r['nama_kategori']) ? $r['nama_kategori'] : '';
	$xtahun = isset($r['tahun_beli']) ? $r['tahun_beli'] : '';
	$xdesc = isset($r['desc_alat']) ? $r['desc_alat'] : '';
	$xjlhport = isset($r['jlh_port']) ? $r['jlh_port'] : '';
	$xnamawifi = isset($r['nama_wifi']) ? $r['nama_wifi'] : '';
	$xpasswifi = isset($r['pass_wifi']) ? $r['pass_wifi'] : '';
	$xfrek = isset($r['frek_alat']) ? $r['frek_alat'] : '';
	$xlfrek = isset($r['l_frek_alat']) ? $r['l_frek_alat'] : '';
	$xram = isset($r['k_ram']) ? $r['k_ram'] : '';
	$xdisk = isset($r['k_hardisk']) ? $r['k_hardisk'] : '';
	$xprocessor = isset($r['t_processor']) ? $r['t_processor'] : '';
	$xstatus = isset($r['status_alat']) ? $r['status_alat'] : '';
	$xgambar = isset($r['p_img']) ? $r['p_img'] : '';
}

$gsql = mysqli_query($dblink, "SELECT * from tblkategori as a,tblbkat as b where a.id_kategori=b.id_kat and b.id_kat='$xidkat'");
while ($gr = mysqli_fetch_array($gsql, MYSQLI_ASSOC)) {
	$xidbk = isset($gr['id_cek']) ? $gr['id_cek'] : '';
	$xa = isset($gr['a']) ? $gr['a'] : '';
	$xb = isset($gr['b']) ? $gr['b'] : '';
	$xc = isset($gr['c']) ? $gr['c'] : '';
	$xd = isset($gr['d']) ? $gr['d'] : '';
	$xe = isset($gr['e']) ? $gr['e'] : '';
	$xf = isset($gr['f']) ? $gr['f'] : '';
	$xg = isset($gr['g']) ? $gr['g'] : '';
	$xh = isset($gr['h']) ? $gr['h'] : '';
}

$target = "view_data/prod_img/$xgambar";

if ($xgambar == '') {
	$xxtampil = 'iempty.jpg';
} else {
	if (file_exists($target)) {
		$xxtampil = $xgambar;
	} else {
		$xxtampil = 'iempty_ac.jpg';
	}
}
echo "<form id='formEditAlat' name='formEditAlat' method='POST' enctype='multipart/form-data' action='control_data/proses_db_alat.php?modul=alat&act=edit'>
	<div class='card'>
		<div class='card-header card-header-primary'>
			<h4 class='card-title'>Peralatan Jaringan</h4>
			<p class='card-category'>Edit Data</p>
		</div>
		<div class='card-body'>
			<div class='table-responsive'>
				<table class='table table-hover'>
					<tr>
						<td class='text-white' width='15%'>Id Alat</td>
						<td class='text-white' width='10px' align='center'>:</td>
						<td><input class='form-control' value='$xid' type='teks' name='xid' readonly></td>
						<td rowspan='3' valign='top' width='150px' bgcolor='white'>
							<img src='view_data/prod_img/$xxtampil' width='100%'>
							<input class='form-control' value='$xgambar' type='hidden' name='xcek'>
							<input class='form-control' value='$xstatus' type='hidden' name='xstatcek'>
						</td>
					</tr>";
echo "<tr>
						<td class='text-white'>Kategori</td>
						<td class='text-white' align='center'>:</td>
						<td>
							<select class='select2 col-md-12' name='xkat'>";
echo "<option value=$xidkat>$xkategori</option>";
echo " </select>
						</td>
					</tr>";
echo "<tr>
						<td class='text-white'>Lokasi</td>
						<td class='text-white' align='center'>:</td>
						<td>
							<select class='select2 col-md-12' name='xlok'>";
echo "<option value='$xidlok'>$xlokasi</option>";
echo " </select>
						</td>
					</tr>";
echo "<tr>
						<td class='text-white'>Nama Peralatan</td>
						<td class='text-white' align='center'>:</td>
						<td colspan='2'><input class='form-control' value='$xnama' type='teks' name='xnama'></td>
					</tr>
					<tr>
						<td class='text-white'>Tahun Beli</td>
						<td class='text-white' align='center'>:</td>
						<td colspan='2'><input class='form-control' value='$xtahun' type='date' name='xtgl'></td>
					</tr>
					<tr>
						<td class='text-white'>Deskripsi</td>
						<td class='text-white' align='center'>:</td>
						<td colspan='2'><textarea class='form-control' name='xdesc' rows='5' cols='93'>$xdesc</textarea></td>
					</tr>";
//Jumlah Port
if ($xa == 1) {
	echo "<tr>
						<td class='text-white'>Jumlah Port</td>
						<td class='text-white' align='center'>:</td>
						<td colspan='2'><input class='form-control' value='$xjlhport' type='teks' name='xjp'></td>
					</tr>";
} else {
	echo "<input value='-' class='form-control' type='hidden' name='xjp'>";
}
//Nama WIFI
if ($xb == 1) {
	echo "<tr>
						<td class='text-white'>Nama Wifi</td>
						<td class='text-white' align='center'>:</td>
						<td colspan='2'><input class='form-control' value='$xnamawifi' type='teks' name='xnwifi'></td>
					</tr>";
} else {
	echo "<input value='-' class='form-control' type='hidden' name='xnwifi'>";
}
//Pass Wifi
if ($xc == 1) {
	echo "<tr>
						<td class='text-white'>Password Wifi</td>
						<td class='text-white' align='center'>:</td>
						<td colspan='2'><input class='form-control' value='$xpasswifi' type='teks' name='xpwifi'></td>
					</tr>";
} else {
	echo "<input value='-' class='form-control' type='hidden' name='xpwifi'>";
}
//Frekuensi
if ($xd == 1) {
	echo "<tr>
						<td class='text-white'>Frekuensi</td>
						<td class='text-white' align='center'>:</td>
						<td colspan='2'><input class='form-control' value='$xfrek' type='teks' name='xfrek'></td>
					</tr>";
} else {
	echo "<input value='-' class='form-control' type='hidden' name='xfrek'>";
}
//Lebar Frekuensi
if ($xe == 1) {
	echo "<tr>
						<td class='text-white'>Lebar Frekuensi</td>
						<td class='text-white' align='center'>:</td>
						<td colspan='2'><input class='form-control' value='$xlfrek' type='teks' name='xlfrek'></td>
					</tr>";
} else {
	echo "<input value='-' class='form-control' type='hidden' name='xlfrek'>";
}
//RAM
if ($xf == 1) {
	echo "<tr>
						<td class='text-white'>Kapasitas RAM</td>
						<td class='text-white' align='center'>:</td>
						<td colspan='2'><input class='form-control' value='$xram' type='teks' name='xram'></td>
					</tr>";
} else {
	echo "<input value='-' class='form-control' type='hidden' name='xram'>";
}
//Disk
if ($xg == 1) {
	echo "<tr>
						<td class='text-white'>Hardisk</td>
						<td class='text-white' align='center'>:</td>
						<td colspan='2'><input class='form-control' value='$xdisk' type='teks' name='xdisk'></td>
					</tr>";
} else {
	echo "<input value='-' class='form-control' type='hidden' name='xdisk'>";
}
//Processor
if ($xh == 1) {
	echo "<tr>
						<td class='text-white'>Processor</td>
						<td class='text-white' align='center'>:</td>
						<td colspan='2'><input class='form-control' value='$xprocessor' type='teks' name='xpro'></td>
					</tr>";
} else {
	echo "<input value='-' class='form-control' type='hidden' name='xpro'>";
}
echo "<tr>
						<td class='text-white'>Gambar</td>
						<td class='text-white' align='center'>:</td>
						<td colspan='2'><input class='form-control' type='file' name='xgambar'></td>
					</tr>
					<tr>
						<td colspan='4' align='center'>
							<input class='btn btn-success btn-sm' type='submit' name='ckirim' value='Simpan'>
							<input class='btn btn-warning btn-sm' type='reset' name='creset' value='Batal' onClick=history.go(-1);>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</form>";
