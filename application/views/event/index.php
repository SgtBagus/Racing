<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form" action="<?= base_url('event') ?>" method="GET">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Judul Even</label>
                                    <input type="text" name="title" class="form-control" <?php if ($_GET['title']) {
                                        echo 'value="' . $_GET['title'] . '"';
                                    } ?>>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-xs-12">                      
                                        <label for="exampleInputEmail1">Rentang Tanggal</label>
                                    </div>
                                    <div class="col-xs-6">                      
                                        <div class="form-group">
                                            <label>Tanggal awal</label>
                                            <input type="date" name="dt[firstdate]" class="form-control">
                                        </div>  
                                    </div>
                                    <div class="col-xs-6">                
                                        <div class="form-group"> 
                                            <label>Tanggal awal</label>
                                            <input type="date" name="dt[enddate]" class="form-control">
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group" align="center">
                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-search"></i> Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($tbl_event) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ($tbl_event as $row) {
                            $photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_event')); 
                            $rowteam = $this->mymodel->selectWithQuery("SELECT count(team_id) as rowteam from tbl_event_register WHERE event_id = '".$row['id']."'");
                            $register_id = $this->mymodel->selectDataone('tbl_event_register', array('event_id' => $row['id'])); 
                            $rowraider = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_event_register_raider WHERE event_register_id = '".$register_id['id']."'");
                            ?>
                            <a href="<?= base_url('event/view/') . $row['id'] ?>" class="a_black">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <img class="img-even" src="<?= $photo['url'] ?>" alt="Third slide">
                                            </div>
                                            <div class="col-xs-7">
                                                <h4>
                                                    <?= $row['title'] ?>
                                                    <?php if ($row['status'] == 'ENABLE') {
                                                        echo '<small class="label pull-right bg-green">Dibuka</small>';
                                                    } else {
                                                        echo '<small class="label pull-right bg-red">Ditutup</small>';
                                                    }?>
                                                    <br>
                                                    <small><i class="fa fa-globe"></i> <?= $row['kota'] ?><br>
                                                        <?= $row['alamat'] ?>
                                                    </small>
                                                </h4>
                                                <i class="fa fa-calendar"></i> <?= date('d-m-Y', strtotime($row['tglevent'])) ?> <br>
                                                Pendaftar : 
                                                <b>
                                                    <i class="fa fa-motorcycle"></i> <?= $rowraider[0]['rowraider'] ?>
                                                    <i class="fa fa-users"></i> <?= $rowteam[0]['rowteam'] ?>
                                                </b>
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