<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cari Raider</h3>
                </div>
                <div class="box-body">
                    <form role="form" action="<?= base_url('raider') ?>" method="GET">
                        <div class="form-group">
                            <label>Nama Raider</label> 
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
    <?php if ($team) { ?>
        <div class="row">
            <?php foreach ($team as $row) {
                $photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_team'));
                $rowmanager = $this->mymodel->selectWithQuery("SELECT count(id) as rowmanager from tbl_manager WHERE team_id = '".$row['id']."'");
                $rowraider = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_raider WHERE team_id = '".$row['id']."'");?>
                <div class="col-xs-6">
                    <div class="box">
                        <div class="box-body">
                            <div class="row" align="center">
                                <div class="col-xs-12">
                                    <img class="img-circle" alt="User Image" src="<?= $photo['url'] ?>" alt="Third slide" height="150px" width="150px">
                                </div>
                                <div class="col-xs-12">
                                    <h4><?= $row['name'] ?> <?php if ($row['verificacion'] == 'ENABLE') {
                                        echo '<i class="fa fa-check-circle" style="color: #3b8dbc"> </i>';
                                    } ?> <br>
                                    <small><i class="fa fa-globe"></i> <?= $row['kota'] ?></small>
                                </h4>
                                <b>
                                    <i class="fa fa-users"></i> Anggota : <b><?= $rowraider[0]['rowraider'] + $rowmanager[0]['rowmanager']?> </b>
                                    <br>
                                    <small>
                                        <b> 
                                            <?= $rowraider[0]['rowraider'] ?> 
                                        </b> Raider & 
                                        <b> 
                                            <?= $rowmanager[0]['rowmanager'] ?> 
                                        </b> Manajer
                                    </small>
                                    <br>
                                    <i class="fa fa-phone"></i> <?= $row['nowa'] ?>
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