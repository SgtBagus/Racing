<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form" action="<?= base_url('event') ?>" method="GET">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Judul Blog</label>
                                    <input type="text" name="title" class="form-control" <?php if ($_GET['title']) {
                                        echo 'value="' . $_GET['title'] . '"';
                                    } ?>>
                                </div>
                                <div class="form-group" align="center">
                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-search"></i> Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($tbl_blog) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ($tbl_blog as $row) {
                            $photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_blog'));?>
                            <a href="<?= base_url('blogs/view/') . $row['id'] ?>" class="a_black">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <img class="img-gallery" src="<?= $photo['url'] ?>" alt="Third slide">
                                            </div>
                                            <div class="col-xs-12" align="center">
                                                <h3><b><?= $row['title'] ?></b></h3>
                                            </div>
                                            <div class="col-xs-12" align="center">
                                                <?= strlen($row["deskripsi"]) > 50 ? substr($row["deskripsi"],0,50)."..." : $row["deskripsi"] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border" align="center">
                                <h3 class="box-title">Tidak Ada Data</h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>