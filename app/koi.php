<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Contoh highlighting dengan PHP 7</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap-3/css/bootstrap.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="bootstrap-3/js/bootstrap.min.js" >

    </script>
    </head>
    <body>
        <?php
        //function untuk meng-highlight atau menandai hasil pencarian
        function highlight($text, $keyword) {
            $keyword = explode(" ", $keyword);
            $keyword_count = count($keyword);
            for($i=0; $i<$keyword_count; $i++) {
                $highlighted_text = '<strong><span class="text-primary">' . $keyword[$i] . '</span></strong>';
                $text = str_ireplace($keyword[$i], $highlighted_text, $text);
                }
            return $text;
        }
        // keyword kata-kata pencarian
        $keyword = 'kota';
        //array hasil query dari database
        $hasil_query = ['5 tempat wisata di kota malang yang paling seru','tempat nongkorong kota malang yang murah tapi bukan murahan','daftar universitas di kota malang','tips memilih hotel di kota malang','kota malang yang terkenal dengan kota pendidikan'];
        //echo hasil query dengan highlighting
        echo '<ol>';foreach ($hasil_query as $value) {
            echo '<li>' . highlight($value, $keyword) . '</li>';
        }
        echo '</ol>';
    ?>
</body>
</html>