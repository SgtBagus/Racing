<section class="content">
    <div class="row">
        <div class="col-md-12">
            <img class="img-gallery" src="<?= $main_image['url'] ?>" alt="Third slide">
            <div align="center">
                <i class="fa fa-calendar"></i> Dibuat pada tgl : <?= date('d-m-Y', strtotime($id['created_at'])) ?>
            </div>
            <br><br>
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form" action="<?= base_url('gallery/view/' . $id['id']) ?>" method="GET">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Judul Gambar</label>
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
            <?php if ($tbl_gallery) { ?>
                <div class="row">
                    <?php foreach ($tbl_gallery as $row) {
                            $file =  $this->mymodel->selectDataOne('file', array('table_id' => $row['id'], 'table' => 'tbl_gallery'));
                            ?>
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <img class="img-gallery" src="<?= $file['url'] ?>" alt="Third slide">
                                        </div>
                                        <div class="col-xs-12" align="center">
                                            <h3><b><?= $row['title'] ?><b></h3>
                                        </div>
                                        <div class="col-xs-12" align="center">
                                            <i class="fa fa-calendar"></i> Dibuat pada tgl : <?= date('d-m-Y', strtotime($row['created_at'])) ?>
                                        </div>
                                        <div class="col-xs-12">
                                            <p><?= $row['caption'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    <?php } ?>
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