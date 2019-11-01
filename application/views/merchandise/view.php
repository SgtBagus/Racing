<div class="row">
    <div class="col-md-12">
        <h3 class="box-title" align="center">Merchandise</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <img class="img-detail" src="<?= $file['url'] ?>" id="main_image">
            <div class="box-body" align="center" style="margin-top: -15px;">
                <div class="row">   
                    <?php
                    if ($file_detail) {
                        $i = 1;
                        foreach ($file_detail as $img) {
                            ?>
                            <div class="col-md-2 col-sm-3 col-xs-4">
                                <img src="<?= $img['url'] ?>" id="detail_image-<?= $i ?>" class="img-detail-preview">
                            </div>
                    <?php
                            $i++;
                        }
                    } ?>
                </div>
                <h4><b><?= $tbl_merchandise['title'] ?></b></h4>
                <small>
                Dibuat pada : <?= date('d M Y', strtotime($tbl_merchandise['created_at'])) ?>
                </small>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body" align="center">
                <b>Rp. <?= number_format($tbl_merchandise['harga'], 0, ',', '.') ?>,- </b>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 10px;">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <?= $tbl_merchandise['deskripsi'] ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="https://api.whatsapp.com/send?phone=<?= $tbl_merchandise['phone'] ?>&text=Perkenalkan Saya <?= $this->session->userdata('name') ?>. Saya ingin menanyakan tentang..." target="_black">
            <button class="btn btn-lg btn-block btn-success" style="margin-bottom: 15px">
                <img src="<?= base_url('assets/flaticon/whatsapp.png') ?>" style="display: unset; width: 15px; height: 15px; margin-bottom: 5px;" /> Hubungi Admin
            </button>
        </a>
    </div>
</div>

<script type="text/javascript">
    <?php
    if ($file_detail) {
        $i = 1;
        foreach ($file_detail as $img) {
            ?>

            $('#detail_image-<?= $i ?>').click(function() {
                var main_src = $('#main_image').attr('src');
                var detail_src = $('#detail_image-<?= $i ?>').attr('src');

                $('#detail_image-<?= $i ?>').attr('src', main_src);
                $('#main_image').attr('src', detail_src);
            });
    <?php $i++;
        }
    }
    ?>
</script>