<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body" align="center">
                    <img src="<?= $file['url'] ?>" width="100%" height="230px">
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
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box-body">
                            <?= $tbl_merchandise['deskripsi'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="#">
                <button class="btn btn-sm btn-block btn-success"> <i class="fa fa-whatsapp"></i> Hubungi Penjual</button>
            </a>
        </div>
    </div>
</section>