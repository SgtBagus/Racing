<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Raider</h3>
                </div>
                <div class="box-body">
                    <form role="form" action="<?= base_url('raider/update') ?>" method="POST" id="sumbit">
                        <div class="show_error"></div>
                        <input type="hidden" name="id" class="form-control" value="<?= $raider['id'] ?>">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="dt[name]" class="form-control" value="<?= $raider['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="dt[alamat]" class="form-control" rows="5"><?= $raider['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Kota</label>
                            <input type="text" name="dt[kota]" class="form-control" value="<?= $raider['kota'] ?>">
                        </div>
                        <div class="row">
                            <div class="col-xs-6">                      
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="dt[tgllahir]" class="form-control" value="<?= $raider['tgllahir'] ?>">
                                </div>  
                            </div>
                            <div class="col-xs-6">                
                                <div class="form-group"> 
                                    <label>Nomor Start</label>
                                    <input type="number" name="dt[nostart]" class="form-control" value="<?= $raider['nostart'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama di Jersey</label>
                            <input type="text" name="dt[namajersey]" class="form-control" value="<?= $raider['namajersey'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Ukuran Jersey</label>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="dt[ukuran_jersey]" class="minimal" value="S" <?php if($raider['ukuran_jersey'] == 'S'){ echo "checked"; } ?>>
                                    S
                                </label>
                                <label>
                                    <input type="radio" name="dt[ukuran_jersey]" class="minimal" value="M" <?php if($raider['ukuran_jersey'] == 'M'){ echo "checked"; } ?>>
                                    M
                                </label>
                                <label>
                                    <input type="radio" name="dt[ukuran_jersey]" class="minimal" value="L" <?php if($raider['ukuran_jersey'] == 'L'){ echo "checked"; } ?>>
                                    L
                                </label>
                                <label>
                                    <input type="radio" name="dt[ukuran_jersey]" class="minimal" value="XL" <?php if($raider['ukuran_jersey'] == 'XL'){ echo "checked"; } ?>>
                                    XL
                                </label>
                                <label>
                                    <input type="radio" name="dt[ukuran_jersey]" class="minimal" value="XXL" <?php if($raider['ukuran_jersey'] == 'XXL'){ echo "checked"; } ?>>
                                    XXL
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">           
                                <div class="form-group">
                                    <label>Nomor Wa</label>
                                    <input type="text" name="dt[nowa]" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="<?= $raider['nowa'] ?>">
                                </div>
                            </div>
                            <div class="col-xs-6">           
                                <div class="form-group">
                                    <label>Nama Motor</label>
                                    <select class="form-control select2" name="dt[motor_id]">
                                        <option value="">--Pilih Kota--</option>
                                        <?php
                                        $master_motor = $this->mymodel->selectData("master_motor");
                                        foreach ($master_motor as $key => $value) {
                                            ?>
                                            <option value="<?= $value['id'] ?>" <?php if($raider['motor_id'] == $value['id']){  echo "selected"; } ?>  ><?= $value['value'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">                      
                                <div class="form-group">
                                    <label>Gol. Darah</label>
                                    <input type="text" name="dt[goldarah]" class="form-control" value="<?= $raider['goldarah'] ?>">
                                </div>  
                            </div>
                            <div class="col-xs-8">                      
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="dt[email]" class="form-control" value="<?= $raider['email']?>">
                                </div>  
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <?php
                                if($file){
                                    echo '<img src="'.$file['url'].'" width="100%" style="margin-bottom: 10px" id="preview">';
                                }
                            ?>
                            <div class="input-group" id="preview_image">
                                <button type="button" class="btn btn-danger" id="btnFile">Pilih Gambar</button>
                                <input name="file" type="file" class="file" id="imageFile" style="display: none;" name="file" accept="image/x-png,image/jpeg,image/jpg" />
                            </div>
                            <p class="help-block">Foto yang diupload disarankan memiliki format PNG, JPG, atau JPEG</p>
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
                        location.href = '<?= base_url("raider") ?>';
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