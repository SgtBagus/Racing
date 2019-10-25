<div class="row">
    <div class="col-md-12">
        <div class="box">
            <img class="img-detail" src="<?= $file['url'] ?>">
            <div class="box-body" >
                <h3 align="center">
                    <?= $tbl_wisata['title'] ?>
                </h3>
                <div class="row">
                    <div class="col-xs-6">
                        <small>
                            Wisata Dimulai :
                            <br>
                            <?= date('d M Y', strtotime($tbl_wisata['tglwisataStart'])).' - '.date('d M Y', strtotime($tbl_wisata['tglwisataEnd'])) ?>
                        </small>
                    </div>
                    <div class="col-xs-6" align="right">
                        <small>
                            Dibuat pada:
                            <br>
                            <?= date('d M Y', strtotime($tbl_wisata['created_at']))?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?= $tbl_wisata['desk'] ?>
    </div>
</div>
