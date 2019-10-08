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
             <?php if ($tbl_event_register) { ?>
                 <div class="row">
                     <div class="col-md-12">
                         <?php foreach ($tbl_event_register as $row) {
                                    $event = $this->mymodel->selectDataone('tbl_event', array('id' => $row['event_id']));
                                    $photo = $this->mymodel->selectDataone('file', array('table_id' => $row['event_id'], 'table' => 'tbl_event'));
                                    $rowraider = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_event_register_raider WHERE event_register_id = '" . $row['id'] . "'"); ?>
                             <a href="<?= base_url('monitorevent/view/') . $row['id'] ?>" class="a_black">
                                 <div class="box">
                                     <div class="box-body">
                                         <div class="row">
                                             <div class="col-xs-5">
                                                 <img class="img-even" src="<?= $photo['url'] ?>" alt="Third slide">
                                             </div>
                                             <div class="col-xs-7">
                                                 <h4><?= $event['title'] ?>
                                                     <br>
                                                     <?php
                                                                if ($row['approve'] == 'WAITING') {
                                                                    echo '<small class="label bg-yellow"><i class="fa fa-warning"> </i> Menunggu Dikonfirmasi </small>';
                                                                } else if ($row['approve'] == "APPROVE") {
                                                                    echo '<small class="label bg-green"><i class="fa fa-check"> </i> Pendaftaran Di Terima </small>';
                                                                } else if ($row['approve'] == "REJECT") {
                                                                    echo '<small class="label bg-red"><i class="fa fa-ban"> </i> Pendaftaran Di Tolak </small>';
                                                                } else if ($row['approve'] == "FINISH") {
                                                                    echo '<small class="label bg-green"><i class="fa fa-check"> </i> Event Selesai </small>';
                                                                } else if ($row['approve'] == "CANCEL") {
                                                                    echo '<small class="label bg-red"><i class="fa fa-ban"> </i> Event Dibatalkan</small>';
                                                                } ?>
                                                     <br>
                                                     <small><i class="fa fa-globe"></i> <?= $event['kota'] ?>
                                                     </small>
                                                 </h4>
                                                 <i class="fa fa-motorcycle"></i> Mendaftar dengan : <b><?= $rowraider[0]['rowraider'] ?></b> Raider
                                                 <br>
                                                 <i class="fa fa-calendar"></i> Mendaftar pada : <?= date('d-m-Y', strtotime($row['created_at'])) ?>
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