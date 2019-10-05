<?php
if ($this->session->userdata('session_sop') == "") {
  echo "<script type='text/javascript'>window.top.location='" . base_url('login') . "';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ENDURORALLY</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/') ?>custom_css.css">
  <link href="https://fonts.googleapis.com/css?family=Jura&display=swap" rel="stylesheet"> 
  <script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
</head>

<body class="layout-top-nav fixed skin-purple-light">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar">
        <div class="row">
          <div class="col-xs-2" align="center">
            <a href="#" id="sidebarButton" class="header-menu open-sidebar" data-toggle="control-sidebar">
              <i class="fa fa-bars"></i>
            </a>
          </div>
          <a href="#">
            <div class="col-xs-8 header-menu" align="center">
              <b>ENDURORALLY</b>
            </div>
          </a>
          <a href="#" onclick="reset()">
            <div class="col-xs-2 header-menu" align="center" style="margin-left: -5px">
              <i class="fa fa-refresh"></i>
            </div>
          </a>
        </div>
      </nav>
    </header>
    <div class="content-wrapper">
      <div class="container" style="margin-top: -25px;">
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
  <script src="<?= base_url('assets/') ?>plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/pages/dashboard.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/iCheck/icheck.min.js"></script>
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

    function reset() {
      location.reload();
    }

    $('[data-mask]').inputmask();


    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    
  </script>
</body>

</html>