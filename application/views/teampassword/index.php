<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah Password Login</h3>
                </div>
                <div class="box-body">
                    <form role="form" action="<?= base_url('teampassword/update') ?>" method="POST" id="sumbit">
                        <div class="show_error"></div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="newpassword" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Konfrimasi Password Baru</label>
                            <input type="password" name="conf_newpassword" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password Lama</label>
                            <input type="password" name="lastpassword" class="form-control">
                        </div>
                        <div class="show_error"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-send btn-md btn-block btn-primary">
                                <i class="fa fa-save"></i> Simpan
                            </button>
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
                        setTeameout(function() {
                            location.reload();
                        }, 1000);
                        $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Simpan').attr('disabled', false);
                    } else {
                        form.find(".show_error").hide().html(response).slideDown("fast");
                        $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Simpan').attr('disabled', false);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr);
                    $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Simpan').attr('disabled', false);
                    form.find(".show_error").hide().html(xhr).slideDown("fast");
                }
            });
            return false;
        });
    });
</script>