<?php
$sesi = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($sesi == "admin") {
    function highlight($text, $keyword)
    {
        $keyword = explode(" ", $keyword);
        $keyword_count = count($keyword);
        for ($i = 0; $i < $keyword_count; $i++) {
            $highlighted_text = '<strong><span class="text-info">' . $keyword[$i] . '</span></strong>';
            $text = str_ireplace($keyword[$i], $highlighted_text, $text);
        }
        return $text;
    }
    $keyword = $_POST['cari'];
    $sql = mysqli_query($dblink, "SELECT * from alat_view where nama_peralatan like '%$keyword%'");
?>
    <div class='card'>
        <div class='card-header card-header-primary'>
            <h4 class='card-title'>Pencarian</h4>
            <p class='card-category'>Hasil pencarian dengan kata kunci <strong><span class='text-light'> <?php echo '"' . $keyword . '"' ?> </span></strong></p>
        </div>
        <div class='card-body'>

            <?php
            if ($keyword == "") {
                echo "tidak ada hasil";
            } else { ?>
                <!-- <ol> -->
                <div class='table-responsive'>
                    <table class='table table-hover'>
                        <thead class='text-center'>
                            <th>Id Alat</th>
                            <th>Nama Alat</th>
                            <th>Lokasi</th>
                            <th>Kategori</th>
                            <th>Tahun Pembelian</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php
                            while ($gr = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                                $xnama = isset($gr['nama_peralatan']) ? $gr['nama_peralatan'] : '';
                                $xlokasi = isset($gr['nama_lokasi']) ? $gr['nama_lokasi'] : '';
                                $xid = isset($gr['id_alat']) ? $gr['id_alat'] : '';
                                $xkategori = isset($gr['nama_kategori']) ? $gr['nama_kategori'] : '';
                                $xtahun = isset($gr['tahun_beli']) ? $gr['tahun_beli'] : '';
                                $xdesc = isset($gr['desc_alat']) ? $gr['desc_alat'] : '';
                                $xjlhport = isset($gr['jlh_port']) ? $gr['jlh_port'] : '';
                                $xnamawifi = isset($gr['nama_wifi']) ? $gr['nama_wifi'] : '';
                                $xpasswifi = isset($gr['pass_wifi']) ? $gr['pass_wifi'] : '';
                                $xfrek = isset($gr['frek_alat']) ? $gr['frek_alat'] : '';
                                $xram = isset($gr['k_ram']) ? $gr['k_ram'] : '';
                                $xdisk = isset($gr['k_hardisk']) ? $gr['k_hardisk'] : '';
                                $xprocessor = isset($gr['t_processor']) ? $gr['t_processor'] : '';
                                $xstatus = isset($gr['status_alat']) ? $gr['status_alat'] : '';
                                $xhimg = isset($gr['p_img']) ? $gr['p_img'] : '';
                                $xnone = 'none';
                            ?>
                                <!-- </ol> -->
                                <tr>
                                    <td><?php echo $xid ?></td>
                                    <td><a href='dashboard.php?xlink=view_data/detail_alat.php&apage=alat&id=<?php echo $xid ?>'><?php echo $xnama ?></a></td>
                                    <td><?php echo $xlokasi ?></td>
                                    <td><?php echo $xkategori ?></td>
                                    <td class="text-center"><?php echo date_format(new DateTime($xtahun), 'd M Y'); ?></td>
                                    <td><?php echo $xstatus ?></td>
                                    <td class='td-actions text-center' style="width:96px;">
                                        <?php if ($xhimg == '') { ?>
                                            <a href='control_data/proses_db_alat.php?modul=alat&act=hapus&xxid=<?php echo $xid ?>&g=<?php echo $xnone ?>' class='btn btn-danger btn-sm'>
                                                <button type='button' rel='tooltip' title='Remove' class='btn btn-white btn-link btn-sm'>
                                                    <i class='material-icons'>close</i>
                                                </button>
                                            </a>
                                        <?php } else { ?>
                                            <a href='control_data/proses_db_alat.php?modul=alat&act=hapus&xxid=<?php echo $xid ?>&g=<?php echo $xhimg ?>' class='btn btn-danger btn-sm'>
                                                <button type='button' rel='tooltip' title='Remove' class='btn btn-white btn-link btn-sm'>
                                                    <i class='material-icons'>close</i>
                                                </button>
                                            </a>
                                        <?php } ?>
                                        <a href='dashboard.php?xlink=view_data/edit/edit_alat.php&apage=alat&id=<?php echo $xid ?>' class='btn btn-primary btn-sm'>
                                            <button type='button' rel='tooltip' title='Edit' class='btn btn-white btn-link btn-sm'>
                                                <i class='material-icons'>edit</i>
                                            </button>
                                        </a>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
                </div>
        </div>
    <?php } else {
    echo "<center>Silakan login untuk akses data</center";
} ?>