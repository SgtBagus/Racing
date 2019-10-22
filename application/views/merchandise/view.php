<div class="row">
    <div class="col-md-12">
        <div class="box">
            <img class="img-even" src="<?= $file['url'] ?>">
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
        <?= $tbl_merchandise['deskripsi'] ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="#">
            <button class="btn btn-lg btn-block btn-success"> <i class="fa fa-whatsapp"></i> Hubungi Penjual</button>
        </a>
    </div>
</div>