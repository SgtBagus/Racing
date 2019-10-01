<section class="content">
    <form action="#" method="POST">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <img src="https://images.unsplash.com/photo-1528193599994-e9d6a8a1acb5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1443&q=80" width="100%">
                        <h3>Lorem Ipsum <i class="fa fa-check-circle" style="color: #3b8dbc"> </i></h3>
                        <i class="fa fa-globe"></i> Lorem Ipsum Ipsum Damet<br>
                        <a href="https://maps.google.com/?q=Malang">
                            <button class="btn btn-sm btn-info"> <i></i>Lihat Peta Di Google Maps</button>
                        </a>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="row">
                                    <div class="col-xs-4">
                                        Kategori
                                    </div>
                                    <div class="col-xs-8">
                                        <span class="label bg-green">Mobil</span>
                                        <span class="label bg-red">Extrim</span>
                                        <span class="label bg-blue">Official</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6" align="right">
                                <i class="fa fa-motorcycle"></i> <b> 154 </b>
                                <i class="fa fa-users"></i> <b>12 </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Syarat Pendaftaran </h3>
                    </div>
                    <div class="box-body" align="center">
                        <table style="width: 100%">
                            <tr>
                                <td align="right">Raider</td>
                                <td>:</td>
                                <td align="left"><b>1 s/d 5</b></td>
                            </tr>
                            <tr>
                                <td align="right">CC Mesin</td>
                                <td>:</td>
                                <td align="left"><b>125cc s/d 150cc</b></td>
                            </tr>
                            <tr>
                                <td align="right">Lainnya</td>
                                <td>:</td>
                                <td align="left"><b>-</b></td>
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
                            <select class="form-control select2" data-placeholder="Select a State" style="width: 100%;" id="raiderSelect">
                                <option value="0" selected="">Pilih Raider</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" align="center"  id="raiderList">
                <p class="help-block" id="raiderEmpty">Silakan Memilih Radier yang ingin diikut sertakan</p>
                <input type="hidden" name="team_id" value='1'>
            </div>
        </div>
        <button id="buttonSubmit" class="btn btn-block btn-primary disabled"> Kirim Pendaftaran</button>
    </form>
</section>

<script type="text/javascript">
    $(function() {
        $('#raiderSelect').change(function(){
            if($('#raiderSelect').val() != '0'){
                $('#raiderEmpty').html('<p class="help-block" id="raiderEmpty">Radier yang di daftarkan !</p>');
                addRaider($('#raiderSelect').val());
                $('#buttonSumbit').removeClass('disabled');
            }
        });
    });

    function addRaider(value){
        $('#raiderList').append('<div class="box" id="raiderSelected_'+value+'">' +
            '<div class="box-body">' +
            '<div class="col-xs-4">' +
            '<img src="<?= base_url('assets/') ?>dist/img/user1-128x128.jpg" class="img-circle" alt="User Image" height="65px" width="65px">'+
            '</div>'+
            '<div class="col-xs-8">'+
            '<h4>'+ value +
            '<br>'+
            '<small>'+
            '<i class="fa fa-motorcycle"></i> 125cc ' +
            '</small>'+
            '</h4>'+
            '<button type="button" class="btn btn-sm btn-block btn-danger" onclick="deleteRaider('+value+')"> Hapus</button>'+
            '</div><input type="hidden" name="raider_id" value='+value+'>'+
            '</div>' +
            '</div>');
        $("#raiderSelect option[value='"+value+"']").remove();
    }

    function deleteRaider(value){
        $("#raiderSelect").append("<option value='"+value+"'>"+value+"</option>");
        $("#raiderSelected_"+value).remove();
    }
</script>