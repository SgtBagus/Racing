<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form action="<?= base_url('login/act_login') ?>" method="POST" id="login_form">
            <h3 align="center">Silakan Login Sebagai Tim</h3>
            <div class="show_error" id="error_input"></div>
            <div class="form-group">
              <label>Email / Username</label>
              <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
              <p class="help-block"><a href="<?= base_url('login/password') ?>"> Lupa Password ? </a></p>
            </div>
            <button type="submit" class="btn btn-block btn-primary">
              <i class="fa fa-sign-in"></i> Masuk Login
            </button>
            <p class="help-block pull-right">Tidak Punya Akun ? <a href="<?= base_url('login/register') ?>">Daftar Disini </a></p>
          </form>
          <!-- <h4 align="center">atau</h4>
          <div class="row">
            <div class="col-md-12" align="center">
              <a href="<?= $this->google_url ?>" class="btn btn-block btn-social btn-login btn-md">
                <img src="http://transformations-spafitness.com/wp-content/uploads/2013/11/google-logo-icon-PNG-Transparent-Background-1.png">
                <div class="row" align="center">
                  Masuk Dengan Google
                </div>
              </a>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  $("#login_form").submit(function() {
    var mydata = new FormData(this);
    var form = $(this);
    $.ajax({
      type: "POST",
      url: form.attr("action"),
      data: mydata,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response, textStatus, xhr) {
        var str = response;
        if (str.indexOf("success") != -1) {
          window.location.href = "<?= base_url() ?>";
        } else {
          $("#error_input").hide().html(response).slideDown("fast");
        }
      },
    });
    return false;
  });
</script>