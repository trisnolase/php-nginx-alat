<?php
// error_reporting(0);
include "db_link.php";
$_GET['page'] = empty($_GET['page']) ? null : $_GET['page'];
$hal = $_GET['page'];
?>

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

  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

  <!-- Select 2 Style -->
  <link rel="stylesheet" href="view_data/style/css/select2.min.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">

</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        
        Tip 2: you can also add an image using data-image tag
      -->
      <div class="logo"><a href="index.php?page=homepage" class="simple-text logo-normal">
          Inventaris Peralatan
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li <?php if ($hal == 'homepage') echo "class='nav-item active'"; ?>>
            <a class="nav-link" href="index.php?page=homepage">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li <?php if ($hal == 'alat') echo "class='nav-item active'"; ?>>
            <a class="nav-link" href="index.php?xlink=view_data/data_alat.php&page=alat&act=1">
              <i class="material-icons">library_books</i>
              <p>Data Alat</p>
            </a>
          </li>
          <li <?php if ($hal == 'kategori') echo "class='nav-item active'"; ?>>
            <a class="nav-link" href="index.php?xlink=view_data/kategori.php&page=kategori">
              <i class="material-icons">category</i>
              <p>Kategori</p>
            </a>
          </li>
          </li>
          <li <?php if ($hal == 'lokasi') echo "class='nav-item active'"; ?>>
            <a class="nav-link" href="index.php?xlink=view_data/lokasi.php&page=lokasi">
              <i class="material-icons">location_ons</i>
              <p>Lokasi</p>
            </a>
          </li>
          </li>
          <li <?php if ($hal == 'gangguan') echo "class='nav-item active'"; ?>>
            <a class="nav-link" href="index.php?xlink=view_data/gangguan.php&page=gangguan">
              <i class="material-icons">report</i>
              <p>Gangguan</p>
            </a>
          </li>
          </li>
          <li <?php if ($hal == 'penanganan') echo "class='nav-item active'"; ?>>
            <a class="nav-link" href="index.php?xlink=view_data/penanganan.php&page=penanganan">
              <i class="material-icons">assignment</i>
              <p>Penanganan</p>
            </a>
          </li>
          </li>
          <li <?php if ($hal == 'lapor') echo "class='nav-item active'"; ?>>
            <a class="nav-link" href="index.php?xlink=control_data/lapor_alat.php&page=lapor">
              <i class="material-icons">comment</i>
              <p>Lapor Gangguan</p>
            </a>
          </li>
          </li>
          <li <?php if ($hal == 'mutasi') echo "class='nav-item active'"; ?>>
            <a class="nav-link" href="index.php?xlink=view_data/mutasi_alat.php&page=mutasi">
              <i class="material-icons">cached</i>
              <p>Mutasi</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php
                  $sql = mysqli_query($dblink, "SELECT COUNT(tblalat.status_alat) as jumlah
                            FROM
                                tblalat, tblkategori, tbllokasi
                            WHERE
                                tblalat.id_kategori = tblkategori.id_kategori AND tblalat.id_lokasi = tbllokasi.id_lokasi AND tblalat.status_alat = 'Rusak Sementara'");

                  while ($r = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                    $xjumlah = isset($r['jumlah']) ? $r['jumlah'] : '';
                  }
                  $notif = $xjumlah;
                  if ($notif == '0') {
                    echo "<i class='material-icons'>notifications</i>";
                  } else {
                    echo "<i class='material-icons text-warning'>notifications</i>
                                  <span class='notification'>
                                    $xjumlah
                                  </span>";
                  }
                  ?>
                  <p class="d-lg-none d-md-block"><br>
                  </p>
                </a>

                <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownMenuLink'>
                  <?php
                  if ($notif == '0') {
                    echo "<a class='dropdown-item' href=''> Tidak Ada Laporan Gangguan Terbaru</a>";
                  } else {
                    echo "<a class='dropdown-item' href='index.php?xlink=view_data/gangguan.php&page=gangguan'> $xjumlah Peralatan Rusak Belum Diproses</a>";
                  }
                  ?></div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid text-white">
          <?php
          // $cek = empty($_REQUEST['xlink']) ? include "view_data/home.php" : $_REQUEST['xlink'];
          empty($_REQUEST['xlink']) ? include "view_data/home.php" : include $_REQUEST['xlink'];
          // $slink = $cek;
          // if (isset($cek)) {
          //   include "$cek";
          // } else {
          //   include "view_data/home.php";
          // }
          ?>
        </div>
      </div>

      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple active" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.0"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>

  <script type="text/javascript" src="view_data/style/js/select2.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

  <script>
    $(document).ready(function() {
      $('.select2').select2();
    });
  </script>
  <script>
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
  </script>
  <!-- <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="//code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script> -->
  <script>
    $(function() {
      $("#daftar_lokasi").autocomplete({
        source: 'cari_lokasi.php'
      });
    });
  </script>
</body>

</html>