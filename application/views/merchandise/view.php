<div class="row">
    <div class="col-md-12">
        <h3 class="box-title">Merchandise</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <img class="img-detail" src="<?= $file['url'] ?>" id="main_image">

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
            <div class="box-body" align="center">
                <h3><?= $tbl_merchandise['title'] ?><br></h3>
                Dibuat pada : <?= date('d-m-Y', strtotime($tbl_merchandise['created_at'])) ?> <br>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body" align="center">
                <i class="fa fa-money"></i> <b>Rp. <?= number_format($tbl_merchandise['harga'], 0, ',', '.') ?>,- </b>
            </div>
        </div>
    </div>
</div>
<div class="row">
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
                <i class="fa fa-whatsapp"></i> Hubungi Admin
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