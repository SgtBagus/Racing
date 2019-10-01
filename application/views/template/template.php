<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Top Navigation</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/') ?>custom_css.css">
  <link href="https://fonts.googleapis.com/css?family=Jura&display=swap" rel="stylesheet">
  <script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
</head>

<body class="layout-top-nav fixed skin-purple-light">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top" style="height: 60px">
        <div class="container">
          <div class="navbar-header">
            <div class="header-center">
              <a href="#" id="sidebarButton" class="navbar-brand open-sidebar" data-toggle="control-sidebar">
                <i class="fa fa-bars"></i>
              </a>
              <a href="#" class="navbar-brand">
                <b>ENDURORALLY</b>
              </a>
            </div>
          </div>
          <div class="navbar-collapse pull-left">
          </div>
          <div class="navbar-custom-menu header-center">
            <ul class="nav navbar-nav">
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <li>
                <a href="" type="button" class="dropdown-toggle" id="refresh">
                  <i class="fa fa-refresh"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="content-wrapper">
      <div class="container" style="margin-top: -50px;">
        <?= $contents ?>
        <?php $this->load->view('template/sidebar') ?>
        <div class="fixed-footer"></div>
      </div>
    </div>
    <footer class="main-footer">
      <div class="container">
        <div class="row" style="text-align: center;">
          <div class="col-xs-3">
            <a href="#" class="menu-footer">
              <i class="fa fa-dashboard"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="#" class="menu-footer">
              <i class="fa fa-archive"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="#" class="menu-footer">
              <i class="fa fa-table"></i>
            </a>
          </div>
          <div class="col-xs-3">
            <a href="#" class="menu-footer">
              <i class="fa fa-user-circle"></i>
            </a>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script src="<?= base_url('assets/') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/raphael/raphael.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/morris.js/morris.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/moment/min/moment.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/pages/dashboard.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
  <script src="<?= base_url('assets/') ?>mobile/main.js"></script>
  <script src="<?= base_url('assets/') ?>mobile/jquery.mobile-1.4.5.min.js"></script>
  <script src="<?= base_url('assets/') ?>mobile/mobile_custom.js"></script>
  <script type="text/javascript">
    $(function() {
      $('.select2').select2()
    });
    $("#btnFile").click(function() {
      document.getElementById('imageFile').click();
    });

    $("#imageFile").change(function() {
      imagePreview(this);
      $('#preview').remove();
    });

    function imagePreview(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#preview_image').before('<img src="' + e.target.result + '" width="100%" style="margin-bottom: 10px" id="preview">');
        }

        reader.readAsDataURL(input.files[0]);
      }
    };

    $('#datepicker').datepicker({
      format: 'dd-mm-yyyy',
    });

    $('#refresh').click(function() {
      location.reload();
    });
  </script>
</body>

</html>