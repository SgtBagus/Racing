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
  <link rel="stylesheet" href="<?= base_url('assets/') ?>custom_css.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="layout-top-nav fixed skin-purple-light">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <div class="header-center">
              <a href="#" id="sidebarButton" class="navbar-brand open-sidebar" data-toggle="control-sidebar">
                <i class="fa fa-bars"></i>
              </a>
              <a href="#" class="navbar-brand">
                <b>Admin</b>LTE
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
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="content-wrapper">
      <div class="container" style="margin-top: -50px;">
        <section class="content-header">
          <h1>
            Top Navigation
            <small>Example 2.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Top Navigation</li>
          </ol>
        </section>
        <?= $contents ?>
        <?php $this->load->view('sidebar/index') ?>
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
  <script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
  <script src="<?= base_url('assets/') ?>mobile/main.js"></script>
  <script src="<?= base_url('assets/') ?>mobile/jquery.mobile-1.4.5.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $("body").on("swiperight", swiperrightHandler);
      $("body").on("swipeleft", swiperleftHandler);

      function swiperrightHandler(event) {
        $('#sidebar').each(function() {
          $('.open-sidebar').click();
          $('#sidebarButton').removeClass('open-sidebar').each(function() {
            $('#sidebarButton').addClass('close-sidebar');
          });
        });
      }

      function swiperleftHandler(event) {
        $('#sidebar').each(function() {
          $('.close-sidebar').click();
          $('#sidebarButton').removeClass('close-sidebar').each(function() {
            $('#sidebarButton').addClass('open-sidebar');
          });
        });
      }


      $('.open-sidebar').click(function() {
        $('#sidebarButton').removeClass('open-sidebar').each(function() {
          $('#sidebarButton').addClass('close-sidebar');
        });
      });

      $('.close-sidebar').click(function() {
        $('#sidebarButton').removeClass('close-sidebar').each(function() {
          $('#sidebarButton').addClass('open-sidebar');
        });
      });

    });
  </script>
</body>

</html>