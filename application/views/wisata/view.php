<div class="row">
    <div class="col-md-12">
        <h3 class="box-title" align="center">Wisata</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <img class="img-detail" src="<?= $file['url'] ?>">
            <div class="box-body">
                <h3 align="center">
                    <?= $tbl_wisata['title'] ?>
                </h3>
                <div class="row">
                    <div class="col-xs-6">
                        <p>
                            Wisata Dimulai :
                            <br>
                            <?= date('d M', strtotime($tbl_wisata['tglwisataStart'])) . ' - ' . date('d M', strtotime($tbl_wisata['tglwisataEnd'])) ?>
                        </p>
                    </div>
                    <div class="col-xs-6" align="right">
                        <p>
                            Dibuat pada:
                            <br>
                            <?= date('d M Y', strtotime($tbl_wisata['created_at'])) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <?= $tbl_wisata['desk'] ?>
            </div>
        </div>
    </div>
</div>