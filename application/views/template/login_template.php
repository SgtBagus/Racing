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
          <a href="#">
            <div class="col-xs-12 header-menu" align="center">
              <b>ENDURORALLY</b>
            </div>
          </a>
        </div>
      </nav>
    </header>
    <div class="content-wrapper" style="margin-top: -25px">
      <div class="container">
        <?= $contents ?>
      </div>
    </div>
    <footer class="main-footer-login">
      <div class="container" align="center">
        <strong>Copyright © 2019 by <a href="#">ENDURORALLY</a> All Right Reserved</strong>
      </div>
    </footer>
  </div>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="<?= base_url('assets/') ?>plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <script type="text/javascript">
    $('[data-mask]').inputmask()
    $(function() {
      $('.select2').select2()
    });
  </script>
</body>

</html>