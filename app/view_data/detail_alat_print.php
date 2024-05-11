<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> -->
  <title>
    Sistem Informasi Inventaris Peralatan Jaringan
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

</head>
<body><br>
<center>SISTEM INFORMASI PERALATAN JARINGAN</center>
<?php
	include"../db_link.php";
/*---------------------------------- Detail alat*/
	$xkode=$_GET['idp'];
	$sql = mysqli_query($dblink,"SELECT * from tblalat,tblkategori,tbllokasi
		WHERE
			tblalat.id_kategori =  tblkategori.id_kategori AND
			tblalat.id_lokasi =  tbllokasi.id_lokasi AND
			tblalat.id_alat='$xkode'");
		$i =0;
		while ($r=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
  		$i++ ;
			$xnama = isset($r['nama_peralatan']) ? $r['nama_peralatan'] : '';
			$xlokasi = isset($r['nama_lokasi']) ? $r['nama_lokasi'] : '';
			$xid = isset($r['id_alat']) ? $r['id_alat'] : '';
			$xkategori = isset($r['nama_kategori']) ? $r['nama_kategori'] : '';
			$xtahun = isset($r['tahun_beli']) ? $r['tahun_beli'] : '';
			$xdesc = isset($r['desc_alat']) ? $r['desc_alat'] : '';
			$xjlhport = isset($r['jlh_port']) ? $r['jlh_port'] : '';
			$xnamawifi = isset($r['nama_wifi']) ? $r['nama_wifi'] : '';
			$xpasswifi = isset($r['pass_wifi']) ? $r['pass_wifi'] : '';
			$xfrek = isset($r['frek_alat']) ? $r['frek_alat'] : '';
			$xram = isset($r['k_ram']) ? $r['k_ram'] : '';
			$xdisk = isset($r['k_hardisk']) ? $r['k_hardisk'] : '';
			$xprocessor = isset($r['t_processor']) ? $r['t_processor'] : '';
			$xstatus = isset($r['status_alat']) ? $r['status_alat'] : '';
			$xgambar = isset($r['p_img']) ? $r['p_img'] : '';
			
			$target="../view_data/prod_img/$xgambar";
			
			if($xgambar==''){
				$xxtampil='iempty.jpg';
			}else{
				if(file_exists($target)){
					$xxtampil=$xgambar;
				}else{
					$xxtampil='iempty_ac.jpg';
				}
			}
			
			echo"<div class='col-md-12'>
			<div class='card'>
				<div class='card-header card-header-primary'>
					<h4 class='card-title '>Peralatan Jaringan</h4>
					<p class='card-category'> Detail Alat</p>
				</div>
				<div class='card-body'>
					<div class='table-responsive'>
						<table class='table table-hover'>
							<tr>
								<td class='align-top w-25' rowspan='7'>
									<img src='view_data/prod_img/$xxtampil' width='100%'>
								</td>
								<td align=''>Id Alat</td>
								<td align=''>$xid</td>
								<td align=''>Nama WIFI</td>
								<td align=''>$xnamawifi</td>
							</tr>
							<tr>
								<td align=''>Nama Alat</td>
								<td>$xnama</td>
								<td align=''>Password WIFI</td>
								<td align=''>$xpasswifi</td>
							</tr>
							<tr>
								<td align=''>Lokasi</td>
								<td>$xlokasi</td>
								<td align=''>Frekuensi</td>
								<td align=''>$xfrek</td>
							</tr>
							<tr>
								<td align=''>Kategori</td>
								<td>$xkategori</td>
								<td align=''>Kapasitas RAM</td>
								<td align=''>$xram</td>
							</tr>
							<tr>
								<td align=''>Tahun Pembelian</td>
								<td>$xtahun</td>
								<td align=''>Kapasitas Hardisk</td>
								<td align=''>$xdisk</td>
							</tr>
							<tr>
								<td align=''>Deskripsi</td>
								<td align=''>$xdesc</td>
								<td align=''>Kapasitas Processor</td>
								<td align=''>$xprocessor</td>
							</tr>
							<tr>
								<td align=''>Jumlah Port</td>
								<td align=''>$xjlhport</td>
								<td align=''>Status</td>
								<td align=''>$xstatus</td>
							</tr>";
							}
							echo"
						</table>
					</div>
				</div>
			</div>
		</div>";

/*---------------------------------- Detail mutasi alat*/

	$sqll = mysqli_query($dblink,"SELECT * from tblhistorilokasi,tblalat,tbllokasi WHERE tblhistorilokasi.id_alat=tblalat.id_alat AND tbllokasi.id_lokasi=tblalat.id_lokasi AND tblhistorilokasi.id_lokasi_b<>'' AND tblalat.id_alat='$xkode' order by tblhistorilokasi.id_histori DESC");
	echo"<div class='col-md-12'>
	<div class='card'>
		<div class='card-header card-header-info'>
			<h4 class='card-title '>Mutasi Peralatan</h4>
			<p class='card-category'> Histori Mutasi</p>
		</div>
		<div class='card-body'>
			<div class='table-responsive'>
				<table class='table table-hover'>
					<thead class='text-center'>
						<th>Lokasi Awal</th>
						<th>Lokasi Mutasi</th>
						<th>Tanggal Mutasi</th>
					</thead>
					<tbody>";
		$i=0;
		while ($rr=mysqli_fetch_array($sqll,MYSQLI_ASSOC)){
  		$i++;				
			$xidal = isset($rr['id_alat']) ? $rr['id_alat'] : '';
			$xnal = isset($rr['nama_peralatan']) ? $rr['nama_peralatan'] : '';
			$xidla = isset($rr['id_lokasi_a']) ? $rr['id_lokasi_a'] : '';
			$xidlb = isset($rr['id_lokasi_b']) ? $rr['id_lokasi_b'] : '';
			$xla = isset($rr['nama_lokasi']) ? $rr['nama_lokasi'] : '';
			$xtglm = isset($rr['tgl']) ? $rr['tgl'] : '';
			
			$xsql=mysqli_query($dblink,"SELECT * from tbllokasi where id_lokasi='$xidla'");
			while ($xr=mysqli_fetch_array($xsql,MYSQLI_ASSOC)){
				$xnmla = isset($xr['nama_lokasi']) ? $xr['nama_lokasi'] : '';
			}
			
			$dsql=mysqli_query($dblink,"SELECT * from tbllokasi where id_lokasi='$xidlb'");
			while ($dr=mysqli_fetch_array($dsql,MYSQLI_ASSOC)){
				$xnmlb = isset($dr['nama_lokasi']) ? $dr['nama_lokasi'] : '';
			}
			
			if($i<>0){
				echo"<tr>
					<td>$xnmla</td>
					<td>$xnmlb</td>
					<td align='center'>$xtglm</td>
				</tr>";
			}
		}
			if($i==0){
				echo"<tr>
					<td colspan='3' align='center'>Peralatan belum pernah dimutasi</td>
				</tr>";
			}
			echo"</tbody>
			</table>
			</div>
			</div>
			</div>
			</div>";

/*---------------------------------- Detail penanganan gangguan alat*/

	$wsql = mysqli_query($dblink,"SELECT * from tblpenanganan,tblalat,tblgangguan
		where tblpenanganan.id_gangguan = tblgangguan.id_gangguan and tblgangguan.id_alat = tblalat.id_alat AND tblalat.id_alat='$xkode'
		order by tblpenanganan.id_penanganan desc");
		echo"<div class='col-md-12'>
		<div class='card'>
			<div class='card-header card-header-success'>
				<h4 class='card-title '>Penanganan Gangguan</h4>
				<p class='card-category'> Histori Gangguan Peralatan</p>
			</div>
			<div class='card-body'>
				<div class='table-responsive'>
					<table class='table table-hover'>
						<thead class='text-center'>
							<th>Gangguan Alat</th>
							<th>Tanggal Lapor</th>
							<th>Tanggal Penanganan</th>
							<th>Teknisi</th>
							<th>Penyelesian</th>
							<th>Hasil</th>
							<th>Rekomendasi</th>
						</thead>
						<tbody>";
		$xi=0;
		while ($wr=mysqli_fetch_array($wsql,MYSQLI_ASSOC)){
  		$xi++ ;
			if(($xi % 2)==0)
				$bg="#f2e4fd" ;  
			else
				$bg= "#ffffff";
				
			$xwidk = isset($wr['id_penanganan']) ? $wr['id_penanganan'] : '';
			$xwdes = isset($wr['deskripsi_gangguan']) ? $wr['deskripsi_gangguan'] : '';
			$xwidg = isset($wr['id_gangguan']) ? $wr['id_gangguan'] : '';
			$xtglg = isset($wr['tgl_gangguan']) ? $wr['tgl_gangguan'] : '';
			$xwtgl = isset($wr['tgl_penanganan']) ? $wr['tgl_penanganan'] : '';
			$xwtek = isset($wr['teknisi']) ? $wr['teknisi'] : '';
			$xwpeny = isset($wr['penyelesaian']) ? $wr['penyelesaian'] : '';
			$xwhasil = isset($wr['hasil']) ? $wr['hasil'] : '';
			$xwrekom = isset($wr['rekomendasi']) ? $wr['rekomendasi'] : '';
			$xwida = isset($wr['id_alat']) ? $wr['id_alat'] : '';
			$xwnma = isset($wr['nama_peralatan']) ? $wr['nama_peralatan'] : '';
			
			if($xi<>0){
				echo"<tr>
					<td>$xwdes</td>
					<td>$xtglg</td>
					<td>$xwtgl</td>
					<td>$xwtek</td>
					<td>$xwpeny</td>
					<td>$xwhasil</td>
					<td>$xwrekom</td>";
				echo"</tr>";
			}
		}
			if($xi==0){
				echo"<tr>
					<td colspan='7' align='center'>Belum ada laporan gangguan alat atau gangguan belum diproses</td>
				</tr>";
			}
			echo"</tbody>
			</table>
			</div>
			</div>
			</div>
			</div>";

/*---------------------------------- Detail gangguan alat belum diproses*/

		$csql = mysqli_query($dblink,"SELECT * from tblgangguan as a,tblalat as b where a.id_alat=b.id_alat and a.id_alat='$xkode' and a.status='B' order by a.id_gangguan desc");
		echo"<div class='col-md-12'>
			<div class='card'>
				<div class='card-header card-header-danger'>
					<h4 class='card-title '>Laporan Gangguan</h4>
					<p class='card-category'> Laporan Gangguan Peralatan Belum Diproses</p>
				</div>
				<div class='card-body'>
					<div class='table-responsive'>
						<table class='table table-hover'>
							<thead class='text-center'>
								<th>Tanggal Lapor</th>
								<th>Ciri - Ciri Gangguan</th>
								<th>Deskripsi Gangguan Alat</th>
								<th>Status Proses</th>
							</thead>
							<tbody>";
		$ci =0;
		while ($cr=mysqli_fetch_array($csql,MYSQLI_ASSOC)){
  		$ci++ ;
			if(($ci % 2)==0)
				$bg="#fffee9" ;  
			else
				$bg= "#ffffff";
			$xidk = isset($cr['id_gangguan']) ? $cr['id_gangguan'] : '';
			$xnma = isset($cr['nama_peralatan']) ? $cr['nama_peralatan'] : '';
			$xida = isset($cr['id_alat']) ? $cr['id_alat'] : '';
			$xtgl = isset($cr['tgl_gangguan']) ? $cr['tgl_gangguan'] : '';
			$xciri = isset($cr['ciri']) ? $cr['ciri'] : '';
			$xdg = isset($cr['deskripsi_gangguan']) ? $cr['deskripsi_gangguan'] : '';
			$xsts = isset($cr['status']) ? $cr['status'] : '';
			if($xsts=="B"){
				$xstatus="Belum Diproses";
			}else{
				$xstatus="Sudah Diproses";
			}
		
			if($ci<>0){
			echo"<tr>
				<td>$xtgl</td>
				<td>$xciri</td>
				<td>$xdg</td>
				<td align='center'>$xstatus</td>";
			}
		}
			if($ci==0){
				echo"<tr>
					<td colspan='6' align='center'>Belum ada laporan gangguan alat</td>
				</tr>";
			}
			echo"</tbody>
			</table>
			</div>
			</div>
			</div>
			</div>";
?>

<script>
window.print();
</script>
</body>
</html>