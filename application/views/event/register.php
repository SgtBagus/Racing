<section class="content">
    <form action="<?= base_url('event/addregister') ?>" method="POST" id="sumbit">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <img src="<?= $file['url'] ?>" width="100%" height="230px">
                        <h3>
                            <?= $tbl_event['title'] ?><br>
                            <small>
                                <i class="fa fa-globe"></i> <?= $tbl_event['kota'] ?> - <?= $tbl_event['alamat'] ?>
                            </small>
                            <a href="https://maps.google.com/?q=<?= $tbl_event['alamat'] ?>">
                                <button class="btn btn-sm btn-info"> <i></i> Lihat Peta Di Google Maps</button>
                            </a>
                        </h3>
                        <input type="hidden" name="event_id" value="<?= $tbl_event['id'] ?>">
                        <input type="hidden" name="team_id" value="<?= $this->session->userdata['id'] ?>">
                        <div class="row">
                            <div class="col-xs-12">
                                <?php if ($tbl_event['status'] == 'ENABLE') {
                                    echo '<small class="label bg-green">Dibuka</small>';
                                } else {
                                    echo '<small class="label bg-red">Ditutup</small>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <b>
                                    <i class="fa fa-calendar"> <?= date('d-m-Y', strtotime($tbl_event['tglevent'])) ?></i>
                                </b>
                            </div>
                            <div class="col-xs-6" align="right">
                                <b>
                                    <i class="fa fa-motorcycle"></i> 154
                                    <i class="fa fa-users"></i> 12
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="#>">
                    <button class="btn btn-sm btn-block btn-success"> <i class="fa fa-whatsapp"></i>Hubungi Petanggung Jawab</button>
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Syarat Pendaftaran </h3>
                    </div>
                    <div class="box-body" align="center">
                        <table style="width: 100%">
                            <tr>
                                <td align="right">Raider per Team</td>
                                <td>:</td>
                                <td align="left">
                                    <b><?= $tbl_event['minraider'] ?> s/d <?= $tbl_event['maxraider'] ?></b>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Masukan Raider</label>
                            <select class="form-control" data-placeholder="Select a State" style="width: 100%;" id="raiderSelect">
                                <option value="0" selected="">Pilih Raider</option>
                                <?php foreach ($raider as $key => $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" align="center" id="raiderList">
                <p class="help-block" id="raiderEmpty">Silakan Memilih Radier yang ingin diikut sertakan</p>
                <input type="hidden" id="teamvalue" value='0'>
            </div>
        </div>
        <div class="show_error"></div>
        <button id="buttonSubmit" class="btn btn-block btn-primary btn-send"> Kirim Pendaftaran</button>
    </form>
</section>

<script type="text/javascript">
    var array = 1;

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
                        location.href = '<?= base_url("monitorevent") ?>';
                        $(".btn-send").removeClass("disabled").html('Kirim Pendaftaran').attr('disabled', false);
                    } else {
                        form.find(".show_error").hide().html(response).slideDown("fast");
                        $(".btn-send").removeClass("disabled").html('Kirim Pendaftaran').attr('disabled', false);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr);
                    $(".btn-send").removeClass("disabled").html('Kirim Pendaftaran').attr('disabled', false);
                    form.find(".show_error").hide().html(xhr).slideDown("fast");
                }
            });
            return false;
        });
    });

    $("#buttonSubmit").attr("disabled", true);

    $(function() {
        $('#raiderSelect').change(function() {
            if ($('#raiderSelect').val() != '0') {
                $('#raiderEmpty').html('<p class="help-block" id="raiderEmpty">Radier yang di daftarkan !</p>');
                get_raider($('#raiderSelect').val());
            }
        });
    });

    function get_raider(id) {
        $.ajax({
            url: "<?= base_url() ?>event/get_raider/" + id,
            type: "GET",
            dataType: "json",
            success: function(data) {
                $.each(data, function(key, value) {
                    addRaider(value.id, value.name, value.alamat, value.url);
                });
            }
        });
    }

    function addRaider(id, name, alamat, img_url) {
        var value_team = parseInt($('#teamvalue').val()) + 1;
        
        $('#raiderList').append('<div class="box" id="raiderSelected_' + id + '">' +
            '<div class="box-body">' +
            '<div class="col-xs-5">' +
            '<img src="' + img_url + '" class="img-circle" alt="User Image" height="65px" width="65px">' +
            '</div>' +
            '<div class="col-xs-7">' +
            '<h4>' + name + '<br>' +
            '<small><i class="fa fa-globe"></i> ' + alamat + '</small>' +
            '</h4>' +
            // '<button type="button" class="btn btn-sm btn-block btn-danger" onclick="deleteRaider(' + id + ')"> Hapus</button>' +
            '</div>' +
            '</div>' +
            '</div>');

        $('#buttonSubmit').before('<input type="hidden" id="raider_id-'+id+'" name="raiderarray['+value_team+']" value='+id+'>')
        $("#buttonSubmit").attr("disabled", false);

        $("#raiderSelect option[value='" + id + "']").remove();
        $('#teamvalue').val(value_team);

        if ($('#teamvalue').val() == <?= $tbl_event['maxraider'] ?>) {
            $("#raiderSelect").attr("disabled", true);
        }
        
        if ($('#teamvalue').val() < <?= $tbl_event['minraider'] ?>) {
            $("#buttonSubmit").attr("disabled", true);
        }
    }

    function deleteRaider(value) {
        $("#raiderSelect").append("<option value='" + value + "'>" + value + "</option>");
        $("#raiderSelected_" + value).remove();
        $("#raider_id-"+value).remove();

        var value_team = parseInt($('#teamvalue').val()) - 1;
        $('#teamvalue').val(value_team);

        if ($('#teamvalue').val() < <?= $tbl_event['maxraider'] ?>) {
            $("#raiderSelect").attr("disabled", false);
        }

        if ($('#teamvalue').val() == 0) {
            $("#buttonSubmit").attr("disabled", true);
        }
        
        if ($('#teamvalue').val() < <?= $tbl_event['minraider'] ?>) {
            $("#buttonSubmit").attr("disabled", true);
        }
    }
</script>