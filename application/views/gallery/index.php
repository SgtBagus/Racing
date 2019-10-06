<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form" action="<?= base_url('gallery') ?>" method="GET">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Judul Group Gambar</label>
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
            <?php if ($tbl_gallery) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ($tbl_gallery as $row) {
                                $main_image = $this->db->limit(1)->order_by('id')->get_where('tbl_gallery', array('status' => 'ENABLE', 'imagegroup_id' => $row['id']))->result_array();
                                $file =  $this->mymodel->selectDataOne('file', array('table_id' => $main_image[0]['id'], 'table' => 'tbl_gallery'));
                                $imagecount = $this->mymodel->selectWithQuery('SELECT count(id) as imagecount from tbl_gallery WHERE status = "ENABLE" AND imagegroup_id = ' . $row['id']); ?>
                            <a href="<?= base_url('gallery/view/') . $row['id'] ?>" class="a_black">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <img class="img-gallery" src="<?= $file['url'] ?>" alt="Third slide">
                                            </div>
                                            <div class="col-xs-12" align="center">
                                                <h3><b><?= $row['value'] ?><b></h3>
                                            </div>
                                            <div class="col-xs-12" align="center">
                                                <i class="fa fa-picture-o"></i> <b><?= $imagecount[0]['imagecount'] ?></b> Gambar
                                                <br>
                                                <i class="fa fa-calendar"></i> Dibuat pada tgl : <?= date('d-m-Y', strtotime($row['created_at'])) ?>
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