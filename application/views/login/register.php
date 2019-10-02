<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Daftarkan Tim Anda</h3>
        </div>
        <div class="box-body">
          <form role="form" action="<?= base_url('login/actionRegister') ?>" method="POST" id="sumbit">
            <div class="show_error"></div>
            <div class="form-group">
              <label>Nama Tim</label>
              <input type="text" name="dt[name]" class="form-control">
            </div>
            <div class="form-group">
              <label>Email Tim</label>
              <input type="email" name="dt[email]" class="form-control">
            </div>
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input type="password" name="confirmpassword" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Alamat Tim</label>
              <textarea name="dt[alamat]" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
              <label>Kota Tim</label>
              <input type="password" name="dt[kota]" class="form-control">
            </div>
            <div class="form-group">
              <label>Nomor Wa</label>
              <input type="text" name="dt[nowa]" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
            </div>
            <div class="show_error"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-send btn-md btn-block btn-primary">
                <i class="fa fa-send"></i> Submit
              </button>
              <p class="help-block pull-right">Sudah Punya Akun ? <a href="<?= base_url('login') ?>">Login Disini </a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  $(function() {
    $("#sumbit").submit(function() {
      var form = $(this);
      var mydata = new FormData(this);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: mydata,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
          $(".btn-send").addClass("disabled").html("<i class='la la-spinner la-spin'></i>  Memperoses...").attr('disabled', true);
          form.find(".show_error").slideUp().html("");
        },

        success: function(response, textStatus, xhr) {
          var str = response;
          if (str.indexOf("success") != -1) {
            form.find(".show_error").hide().html(response).slideDown("fast");
            setTimeout(function() {
              window.location.href = "<?= base_url() ?>";
            }, 1000);

            $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled', false);
          } else {
            form.find(".show_error").hide().html(response).slideDown("fast");
            $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled', false);
          }
        },
        error: function(xhr, textStatus, errorThrown) {
          console.log(xhr);
          $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled', false);
          form.find(".show_error").hide().html(xhr).slideDown("fast");
        }
      });
      return false;
    });
  });
</script>