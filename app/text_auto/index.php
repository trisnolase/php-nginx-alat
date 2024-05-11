<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="//code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
  <script>
  $(function() {
    $( "#daftar_lokasi" ).autocomplete({
      source: 'cari_lokasi.php'
    });
  });
  </script>
</head>
<body>

<div class="ui-widget">
  <label for="daftar_lokasi">Lokasi: </label>
  <input id="daftar_lokasi">
</div>
</body>
</html>
