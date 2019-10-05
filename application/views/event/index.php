<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Judul Even</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="row">
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
                                </div>
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
                            $photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_event')); ?>
                            <a href="<?= base_url('event/view/').$row['id']?>" class="a_black">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <img class="img-even" src="<?= $photo['url'] ?>" alt="Third slide">
                                            </div>
                                            <div class="col-xs-7">
                                                <h4><?= $row['title'] ?><br>
                                                    <small><i class="fa fa-globe"></i> <?= $row['kota'] ?>
                                                    <br>
                                                    <?= $row['alamat'] ?>
                                                </small>
                                            </h4>
                                            <b>
                                                <i class="fa fa-calendar"><?= date('d-m-Y', strtotime($row['tglevent'])) ?></i>
                                                <i class="fa fa-motorcycle"></i> 154
                                                <i class="fa fa-users"></i> 12
                                            </b>
                                            <?php if($row['status'] == 'ENABLE'){
                                                echo '<small class="label pull-right bg-green">Dibuka</small>';
                                            }else{
                                                echo '<small class="label pull-right bg-red">Ditutup</small>';
                                            }
                                            ?>
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