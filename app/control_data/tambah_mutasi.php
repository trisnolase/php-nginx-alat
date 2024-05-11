<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
	</head>
<body>
<?php
	include"db_link.php";
	
	echo"<div class='card'>
			<div class='card-header card-header-primary'>
				<h4 class='card-title'>Mutasi Peralatan</h4>
				<p class='card-category'>Input Mutasi</p>
			</div>
			<div class='card-body'>
		<form name='formInputDataMutasi' method='POST' action='control_data/proses_db_mutasi.php?modul=mutasi&act=input'>
			<table border='0' cellspacing='0' cellpadding='8px' width='100%' class='form_table'>
				<tr>
					<td width='25%'>Nama Peralatan</td>
					<td width='20px' align='center'>:</td>
					<td>
						<select class='select2 col-md-12' name='xnama' id='xnama' required>
							<option value=''></option>";
							$query = "SELECT * from tblalat,tbllokasi where tblalat.id_lokasi=tbllokasi.id_lokasi AND status_alat='Normal'";
							$result = $dblink->query($query);
								while($data = $result->fetch_array(MYSQLI_ASSOC)){
									$xna="".$data['nama_peralatan']."";
									$xida="".$data['id_alat']."";
									$xidlok="".$data['id_lokasi']."";
									$xnamlok="".$data['nama_lokasi']."";
									echo "<option value='$xida'>$xida | $xna | $xnamlok</option>";
								}
						echo"</select>
					</td>
				</tr>
				<tr>
					<td>Lokasi Baru</td>
					<td align='center'>:</td>
					<td>
						<select class='select2 col-md-12' name='xlb' id='xlb' required>
						</select>";
						// <input id='daftar_lokasi'>	
					echo"</td>
				</tr>
				<tr>
					<td colspan='3' align='center'>
						<input class='btn btn-success btn-sm' type='submit' name='ckirim' value='Simpan' />
						<input class='btn btn-warning btn-sm' type='reset' name='creset' value='Batal' onClick=history.go(-1); />
					</td>
				</tr>
			</table>
		</form>";
?>
<!-- <script>
	// $(document).ready(function() {
	// 	$('.select2').select2();
	// });
	$("#xnama").change(function() {
		var postForm = {
			'id': document.getElementById("xnama").value,
			'op': 1
		};
		$.ajax({
			type: "post",
			url: "pilihan_mutasi.php",
			data: postForm,
			success: function(data) {
				$("#xlb").html(data);
			}
		});
	});
</script> -->
</body>
</html>