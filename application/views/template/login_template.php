<!DOCTYPE html>
<html>

<head>
  <script type="text/javascript">
        if (screen.width >= 1081) {
            window.location = "https://www.karyastudio.com";
        }
    </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Never Say Old - Mobile</title>
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/iCheck/all.css">
  <link rel="icon" href="<?= base_url('assets/') ?>img/logo.jpg">

  <link rel="stylesheet" href="<?= base_url('assets/') ?>custom_css.css">
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

  <script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
</head>

  
<?php
if ($this->session->userdata('session_sop') == "") {
  $this->load->view('template/login_sidebar');
} else {
  if ($this->session->userdata('role') == 'Team') {
    $this->load->view('template/sidebar');
  } else {
    $this->load->view('template/sidebarrider');
  }
}
?>
<div id="bodyBlock"></div>

<body class="layout-top-nav fixed skin-purple-light">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar" style="background-color:#000; top:0; width:100%; z-index:100; height: 68px;">
        <div class="row" style="height: 68px;">
          <div class="col-xs-2" align="center" style="height: 68px;">
            <?php 
            if ($page != "Home") { ?>
              <a href="#" onclick="back()" class="header-menu">
                <img src="<?= base_url('assets/flaticon/back_header.png') ?>" style=" width: 30px; height: 30px; ">
              </a>
            <?php } ?>
          </div>
          <div class="col-xs-8 header-menu" align="center" style="height: 68px;">
            <a href="<?=base_url()?>"><img style="height:40px" src="<?= base_url('assets/img/') ?>logo2.jpg"></a>
          </div>
          <a href="#" id="open-sidebar">
            <div class="col-xs-2 header-menu" align="center" data-toggle="control-sidebar" style="margin-left: -10px">
              <img src="<?= base_url('assets/flaticon/list.png') ?>" style=" width: 30px; height: 30px; ">
            </div>
          </a>
        </div>
      </nav>
    </header>
    <div class="content-wrapper" style="margin-top: -15px">
      <?php $this->load->view('template/login_sidebar'); ?>
      <div class="container">
        <?= $contents ?>
      </div>
    </div>
    <?php $this->load->view('template/login_footer'); ?>
  </div>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/iCheck/icheck.min.js"></script>
  <script type="text/javascript">
    
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    })

    function opensidebar() {
      $('#open-sidebar').addClass('tutup');
      $('#bodyBlock').addClass('mobile-body-overly');
      $('body').css('overflow', 'hidden');
      $('.tutup').click(function() {
        closesidebar()
      });
    };

    function closesidebar() {
      $('#open-sidebar').removeClass('tutup');
      $('#bodyBlock').removeClass('mobile-body-overly');
      $('body').attr('style', '');

      $('#open-sidebar').click(function() {
        opensidebar();
      });
    };

    $('#open-sidebar').click(function() {
      opensidebar();
    });

    $('.tutup').click(function() {
      closesidebar()
    });
  </script>
</body>

</html>