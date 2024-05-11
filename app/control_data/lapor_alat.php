<div class='card'>
    <div class='card-header card-header-primary'>
        <h4 class='card-title'>Gangguan Peralatan</h4>
        <p class='card-category'>Lapor</p>
    </div>
    <div class='card-body'>
        <form name='formInputDataGangguan' method='POST' action='control_data/proses_laporan_alat.php'>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <td>Nama Alat</td>
                        <td>:</td>
                        <td>
                            <select class='select2 col-12' id='nama_alat' name='nama_alat'>
                                <option value=''></option>
                                <?php $sql = mysqli_query($dblink,"SELECT * from tblalat where status_alat='Normal'");
										while ($r=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
											$xidk = isset($r['id_alat']) ? $r['id_alat'] : '';
											$xnm = isset($r['nama_peralatan']) ? $r['nama_peralatan'] : '';
											echo "<option value='$xidk'>$xidk | $xnm</option> ";
										} ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ciri Kerusakan</td>
                        <td>:</td>
                        <td>
                            <textarea class='form-control' name='ciri_kerusakan' rows='5'></textarea></td>
                    </tr>
                    <tr>
                        <td>Deskripsi Kerusakan</td>
                        <td>:</td>
                        <td>
                            <textarea class='form-control' name='deskripsi_kerusakan' rows='5'></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='text-center'>
                                <input class='btn btn-success btn-sm' type='submit' name='clapor' value='Lapor' />
                                <input class='btn btn-warning btn-sm' type='reset' name='creset' value='Batal'
                                    onClick=history.go(-1); />
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>