<?php
	$sql = mysqli_query($dblink,"SELECT * from tblgangguan as a,tblalat as b where a.id_alat=b.id_alat order by
	a.id_gangguan desc");
	echo" <div class='col-md-12'>
		<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title '>Laporan Gangguan</h4>
				<p class='card-category'> List Data</p>
			</div>
			<div class='card-body'>
				<div class='table-responsive'>
					<table class='table table-hover'>
						<thead class='text-primary text-center'>
							<th>ID Gangguan</th>
							<th>ID Alat</th>
							<th>Nama Alat</th>
							<th>Tanggal Lapor</th>
							<th>Ciri - Ciri Gangguan</th>
							<th>Deskripsi Gangguan Alat</th>
							<th>Status Proses</th>
							<th>Aksi</th>
						</thead>
						<tbody>";
							while ($r=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
							$xidk = isset($r['id_gangguan']) ? $r['id_gangguan'] : '';
							$xnma = isset($r['nama_peralatan']) ? $r['nama_peralatan'] : '';
							$xida = isset($r['id_alat']) ? $r['id_alat'] : '';
							$xtgl = isset($r['tgl_gangguan']) ? $r['tgl_gangguan'] : '';
							$xciri = isset($r['ciri']) ? $r['ciri'] : '';
							$xdg = isset($r['deskripsi_gangguan']) ? $r['deskripsi_gangguan'] : '';
							$xsts = isset($r['status']) ? $r['status'] : '';
							if($xsts=="B"){
							$xstatus="Belum Diproses";
							}else{
							$xstatus="Sudah Diproses";
							}
							echo"<tr>
								<td>
									<center>$xidk</center>
								</td>
								<td>$xida</td>
								<td>$xnma</td>
								<td>$xtgl</td>
								<td>$xciri</td>
								<td>$xdg</td>
								<td>$xstatus</td>";
								echo" <td>";
									if($xsts<>'S'){
										echo"<a href='index.php?xlink=control_data/tambah_penanganan.php&page=gangguan&id=$xidk' class='btn btn-danger btn-sm'>Ubah Status</a>";
										}else{
										echo"-";
										}
										echo" </td>
							</tr>";

							}
							echo"</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>";
?>