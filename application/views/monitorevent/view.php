<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <img src="<?= $filegambar['url'] ?>" width="100%" height="230px">
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
<?php if ($raideregister) { ?>
    <div class="row">
        <?php foreach ($raideregister as $row) {
            $raider = $this->mymodel->selectDataone('tbl_raider', array('id' => $row['raider_id']));
            $motor = $this->mymodel->selectDataone('master_motor', array('id' => $raider['motor_id']));
            $photo = $this->mymodel->selectDataone('file', array('table_id' => $raider['id'], 'table' => 'tbl_raider')); ?>
            <div class="col-xs-6">
                <div class="box">
                    <div class="box-body">
                        <div class="row" align="center">
                            <div class="col-xs-12">
                                <img class="img-circle" alt="User Image" src="<?= $photo['url'] ?>" alt="Third slide" height="150px" width="150px">
                            </div>
                            <div class="col-xs-12">
                                <h4><?= $raider['name'] ?> <?php if ($raider['verificacion'] == 'ENABLE') {
                                    echo '<i class="fa fa-check-circle" style="color: #3b8dbc"> </i>';
                                } ?> <br>
                                <small><i class="fa fa-globe"></i> <?= $raider['kota'] ?></small>
                            </h4>
                            <b>
                                <i class="fa fa-motorcycle"></i> <?= $motor['value'] ?>
                                <br>
                                <i class="fa fa-phone"></i> <?= $raider['nowa'] ?>
                            </b>
                            <a href="#">
                                <button class="btn btn-sm btn-success"> <i class="fa fa-whatsapp"></i> Hubungi Whatsapp</button>
                            </a>
                            <p>Sebanyak : <b><?= $raider['eventikut'] ?></b> Event Telah Di Ikuti</p>
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