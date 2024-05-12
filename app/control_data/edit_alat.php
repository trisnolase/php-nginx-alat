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
?>
<form id="formEditAlat" name="formEditAlat" method="POST" enctype="multipart/form-data" action="control_data/proses_db_alat.php?modul=alat&act=edit">
	<div class="card">
		<div class="card-header card-header-primary">
			<h4 class="card-title">Peralatan Jaringan</h4>
			<p class="card-category">Edit Data</p>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<tr>
						<td class="text-white" width="15%">Id Alat</td>
						<td class="text-white" width="10px">:</td>
						<input class="form-control" value="<?php echo $xid ?>" type="hidden" name="xid">
						<td><input class="form-control" value="<?php echo $xid ?>" type="teks" name="xid_show" disabled></td>
						<td rowspan="3" valign="top" width="150px" bgcolor="white">
							<img src="view_data/prod_img/<?php echo $xxtampil ?>" width="100%">
							<input class="form-control" value="<?php echo $xgambar ?>" type="hidden" name="xcek">
							<input class="form-control" value="<?php echo $xstatus ?>" type="hidden" name="xstatcek">
						</td>
					</tr>
					<tr>
						<td class="text-white">Kategori</td>
						<td class="text-white">:</td>
						<td>
							<select class="select2 col-md-12" name="xkat">
								<option value="<?php echo $xidkat ?>"><?php echo $xkategori ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="text-white">Lokasi</td>
						<td class="text-white">:</td>
						<td>
							<select class="select2 col-md-12" name="xlok">
								<option value="<?php echo $xidlok ?>"><?php echo $xlokasi ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="text-white">Nama Peralatan</td>
						<td class="text-white">:</td>
						<td colspan="2"><input class="form-control" value="<?php echo $xnama ?>" type="teks" name="xnama"></td>
					</tr>
					<tr>
						<td class="text-white">Tahun Beli</td>
						<td class="text-white">:</td>
						<td colspan="2"><input class="form-control" value="<?php echo $xtahun ?>" type="date" name="xtgl"></td>
					</tr>
					<tr>
						<td class="text-white">Deskripsi</td>
						<td class="text-white">:</td>
						<td colspan="2"><textarea class="form-control" name="xdesc" rows="5" cols="93"><?php echo $xdesc ?></textarea></td>
					</tr>
					<!-- Jumlah Port -->
					<?php if ($xa == 1) { ?>
						<tr>
							<td class="text-white">Jumlah Port</td>
							<td class="text-white">:</td>
							<td colspan="2"><input class="form-control" value="<?php echo $xjlhport ?>" type="teks" name="xjp"></td>
						</tr>
					<?php } else { ?>
						<input value="-" class="form-control" type="hidden" name="xjp">
					<?php } ?>
					<!-- Nama WIFI -->
					<?php if ($xb == 1) { ?>
						<tr>
							<td class="text-white">Nama Wifi</td>
							<td class="text-white">:</td>
							<td colspan="2"><input class="form-control" value="<?php echo $xnamawifi ?>" type="teks" name="xnwifi"></td>
						</tr>
					<?php } else { ?>
						<input value="-" class="form-control" type="hidden" name="xnwifi">
					<?php } ?>
					<!-- Pass Wifi -->
					<?php if ($xc == 1) { ?>
						<tr>
							<td class="text-white">Password Wifi</td>
							<td class="text-white">:</td>
							<td colspan="2"><input class="form-control" value="<?php echo $xpasswifi ?>" type="teks" name="xpwifi"></td>
						</tr>
					<?php } else { ?>
						<input value="-" class="form-control" type="hidden" name="xpwifi">
					<?php } ?>
					<!-- Frekuensi -->
					<?php if ($xd == 1) { ?>
						<tr>
							<td class="text-white">Frekuensi</td>
							<td class="text-white">:</td>
							<td colspan="2"><input class="form-control" value="<?php echo $xfrek ?>" type="teks" name="xfrek"></td>
						</tr>
					<?php } else { ?>
						<input value="-" class="form-control" type="hidden" name="xfrek">
					<?php } ?>
					<!-- Lebar Frekuensi -->
					<?php if ($xe == 1) { ?>
						<tr>
							<td class="text-white">Lebar Frekuensi</td>
							<td class="text-white">:</td>
							<td colspan="2"><input class="form-control" value="<?php echo $xlfrek ?>" type="teks" name="xlfrek"></td>
						</tr>
					<?php } else { ?>
						<input value="-" class="form-control" type="hidden" name="xlfrek">
					<?php } ?>
					<!-- RAM -->
					<?php if ($xf == 1) { ?>
						<tr>
							<td class="text-white">Kapasitas RAM</td>
							<td class="text-white">:</td>
							<td colspan="2"><input class="form-control" value="<?php echo $xram ?>" type="teks" name="xram"></td>
						</tr>
					<?php } else { ?>
						<input value="-" class="form-control" type="hidden" name="xram">
					<?php } ?>
					<!-- Disk -->
					<?php if ($xg == 1) { ?>
						<tr>
							<td class="text-white">Hardisk</td>
							<td class="text-white">:</td>
							<td colspan="2"><input class="form-control" value="<?php echo $xdisk ?>" type="teks" name="xdisk"></td>
						</tr>
					<?php } else { ?>
						<input value="-" class="form-control" type="hidden" name="xdisk">
					<?php } ?>
					<!-- Processor -->
					<?php if ($xh == 1) { ?>
						<tr>
							<td class="text-white">Processor</td>
							<td class="text-white">:</td>
							<td colspan="2"><input class="form-control" value="<?php echo $xprocessor ?>" type="teks" name="xpro"></td>
						</tr>
					<?php } else { ?>
						<input value="-" class="form-control" type="hidden" name="xpro">
					<?php } ?>
					<tr>
						<td class="text-white">Gambar</td>
						<td class="text-white">:</td>
						<td colspan="2"><input class="form-control" type="file" name="xgambar"></td>
					</tr>
					<tr>
						<td colspan="4">
							<input class="btn btn-success btn-sm" type="submit" name="ckirim" value="Simpan">
							<input class="btn btn-warning btn-sm" type="reset" name="creset" value="Batal" onClick=history.go(-1);>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</form>