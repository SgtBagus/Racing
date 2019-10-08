<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body" align="center">
                    <img src="<?= $file['url'] ?>" width="100%" height="230px">
                    <h3><?= $tbl_blog['title'] ?><br></h3>
                    Dibuat pada : <?= date('d-m-Y', strtotime($tbl_blog['created_at'])) ?> <br>
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
                            <?= $tbl_blog['deskripsi'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>