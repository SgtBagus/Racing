<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <img src="<?= $file_event['url'] ?>" width="100%" height="230px">
                    <h3>
                        <?= $tbl_event['title'] ?><br>
                        <small>
                            <i class="fa fa-globe"></i> <?= $tbl_event['kota'] ?> - <?= $tbl_event['alamat'] ?>
                        </small>
                        <br>
                        <a href="https://maps.google.com/?q=<?= $tbl_event['alamat'] ?>">
                            <button class="btn btn-sm btn-info"> <i></i> Lihat Peta Di Google Maps</button>
                        </a>
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="#>">
                <button class="btn btn-sm btn-block btn-success"> <i class="fa fa-whatsapp"></i>Hubungi Petanggung Jawab</button>
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12" align="center">
            Team Pendaftar <b> <?= $rowteam[0]['rowteam'] ?></b>: 
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cari Team</h3>
                </div>
                <div class="box-body">
                    <form role="form" action="<?= base_url('verifteam/view/'.$tbl_event_register['id']) ?>" method="GET">
                        <div class="form-group">
                            <label>Nama Team</label>
                            <input type="text" name="name" class="form-control" <?php if ($_GET['name']) {
                                                                                        echo 'value="' . $_GET['name'] . '"';
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
    <?php if ($teamregister) { ?>
        <div class="row">
            <?php foreach ($teamregister as $row) {
                $team = $this->mymodel->selectDataone('tbl_team', array('id' => $row['team_id']));
                $photo = $this->mymodel->selectDataone('file', array('table_id' => $team['id'], 'table' => 'tbl_team')); ?>
                <div class="col-xs-6">
                    <div class="box">
                        <div class="box-body">
                            <div class="row" align="center">
                                <div class="col-xs-12">
                                    <img class="img-circle" alt="User Image" src="<?= $photo['url'] ?>" alt="Third slide" height="150px" width="150px">
                                </div>
                                <div class="col-xs-12">
                                    <h4><?= $team['name'] ?> <?php if ($team['verificacion'] == 'ENABLE') {
                                        echo '<i class="fa fa-check-circle" style="color: #3b8dbc"> </i>';
                                    } ?> <br>
                                    <small><i class="fa fa-globe"></i> <?= $team['kota'] ?></small>
                                </h4>
                                <b>
                                    <i class="fa fa-phone"></i> <?= $team['nowa'] ?>
                                </b>
                                <a href="#">
                                    <button class="btn btn-sm btn-success"> <i class="fa fa-whatsapp"></i> Hubungi Whatsapp</button>
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
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
</section>