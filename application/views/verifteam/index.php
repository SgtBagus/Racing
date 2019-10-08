<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cari Event</h3>
                </div>
                <div class="box-body">
                    <form role="form" action="<?= base_url('verifteam') ?>" method="GET">
                        <div class="form-group">
                            <label>Nama Event</label>
                            <input type="text" name="title" class="form-control" <?php if ($_GET['title']) {
                                                                                    echo 'value="' . $_GET['title'] . '"';
                                                                                } ?>>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-block btn-primary">
                                <i class="fa fa-search"></i> Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if ($tbl_event_register) { ?>
        <?php foreach ($tbl_event_register as $row) {
                $photo = $this->mymodel->selectDataone('file', array('table_id' => $row['event_id'], 'table' => 'tbl_event'));
                $rowteam = $this->mymodel->selectWithQuery("SELECT count(id) as rowteam from tbl_event_register WHERE event_id = '" . $row['event_id'] . "'"); ?>
            <div class="row">
                <div class="col-xs-12">
                    <a href="<?= base_url('verifteam/view/') . $row['event_register_id'] ?>" class="a_black">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <img class="img-even" src="<?= $photo['url'] ?>" alt="Third slide">
                                    </div>
                                    <div class="col-xs-7">
                                        <h4><?= $row['title'] ?>
                                            <br>
                                            <small>
                                                <?php
                                                        if ($row['approve'] == 'WAITING') {
                                                            echo '<small class="label bg-yellow"><i class="fa fa-warning"> </i> Menunggu Dikonfirmasi </small>';
                                                        } else if ($row['approve'] == "APPROVE") {
                                                            echo '<small class="label bg-primary"><i class="fa fa-check"> </i> Pendaftaran Di Terima </small>';
                                                        } else if ($row['approve'] == "REJECT") {
                                                            echo '<small class="label bg-red"><i class="fa fa-ban"> </i> Pendaftaran Di Tolak </small>';
                                                        } else if ($row['approve'] == "FINISH") {
                                                            echo '<small class="label bg-green"><i class="fa fa-check"> </i> Event Selesai </small>';
                                                        } else if ($row['approve'] == "CANCEL") {
                                                            echo '<small class="label bg-red"><i class="fa fa-ban"> </i> Event Dibatalkan</small>';
                                                        } ?>
                                            </small>
                                            <br>
                                            <small><i class="fa fa-globe"></i> <?= $row['kota'] ?>
                                            </small>
                                        </h4>
                                        <i class="fa fa-users"></i> Pendaftar : <b><?= $rowteam[0]['rowteam'] ?></b> Team
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>
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
</section>