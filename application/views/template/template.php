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
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>owl/docs/assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>owl/docs/assets/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/iCheck/all.css">
  <link rel="icon" href="<?= base_url('assets/') ?>img/logo.jpg">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/') ?>custom_css.css">
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

  <script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- <script src="<?= base_url('assets/') ?>owl/docs/assets/vendors/jquery.min.js"></script> -->
  <script src="<?= base_url('assets/') ?>owl/docs/assets/owlcarousel/owl.carousel.js"></script>
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
            // if(isset($_SERVER['HTTP_REFERER'])) {
    // $previous = $_SERVER['HTTP_REFERER'];
    // $previous = base_url();
// }

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
    <div class="content-wrapper">
      <div class="container" style="margin-top: -20px;">
        <!-- <h3 align="center"> <?= $page ?><br><small> <?= $subpage ?></small></h3> -->
        <?= $contents ?>
        <marquee><?= MARQUEE ?></marquee>
      </div>
      <?php
      if ($this->session->userdata('role')) {
        ?>
        <div class="fixed-footer"></div>
      <?php }
      ?>
    </div>
    <?php
    if ($this->session->userdata('session_sop') == "") {
      $this->load->view('template/login_footer');
    } else {
      if ($this->session->userdata('role') == 'Team') {
        $this->load->view('template/footer');
      } else {
        $this->load->view('template/footer_rider');
      }
    }
    ?>
  </div>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/raphael/raphael.min.js"></script>
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
  <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/iCheck/icheck.min.js"></script>
  <script type="text/javascript">
    function lazzy_loader(limit) {
      var output = '<div class="row">' +
        '<div class="col-xs-12" align="center">' +
        '<h4><i class="fa fa-fw fa-spinner fa-spin"></i> Memuat Data !</h4' +
        '</div>' +
        '</div>';
      $('#load_data_message').html(output);
    }

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
          $('#preview_image').before('<br>' +
            '<div align="center">' +
            '<img class="img-circle" alt="User Image" src="' + e.target.result + '" alt="Third slide" height="250px" width="250px" style="margin-bottom: 10px" id="preview">' +
            '</div>');
        }

        reader.readAsDataURL(input.files[0]);
      }
    };

    $('#datepicker').datepicker({
      format: 'dd-mm-yyyy',
    });

    function back() {
      window.history.back();
    }

    $('[data-mask]').inputmask();


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