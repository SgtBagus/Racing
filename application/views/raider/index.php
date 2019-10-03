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
    <?php if ($raider) { ?>
        <div class="row">
            <?php foreach ($raider as $row) {
                $photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_raider')); ?>
                <a href="<?= base_url('raider/edit/') . $row['id'] ?>" class="a_black">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <img src="<?= $photo['url'] ?>" alt="Third slide" height="100px" width="100%" >
                                    </div>
                                    <div class="col-xs-7">
                                        <h4><?= $row['name'] ?> <?php if ($row['verificacion'] == 'ENABLE') {
                                            echo '<i class="fa fa-check-circle" style="color: #3b8dbc"> </i>';
                                        } ?> <br>
                                        <small><i class="fa fa-globe"></i> <?= $row['alamat'] ?></small>
                                    </h4>
                                    <b>
                                        <i class="fa fa-phone"></i> <?= $row['nowa'] ?>
                                    </b>
                                    <a href="#">
                                        <button class="btn btn-sm btn-success"> <i class="fa fa-whatsapp"></i> Hubungi Melalui Whatsapp</button>
                                    </a>
                                </div>
                            </div>
                            <p>Sebanyak : <b>34</b> Event Telah Di Ikuti</p>
                            <br>
                            <div class="row" id="deleteForm_<?=$row['id']?>">
                                <div class="col-xs-12 btnDelete_<?=$row['id']?>">
                                    <button class="btn btn-sm btn-block btn-danger" onclick="hapus(<?= $row['id'] ?>)"> <i class="fa fa-trash"></i> Hapus Manager</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
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

<a href="<?= base_url('raider/create') ?>" class="float">
    <i class="fa fa-plus my-float"></i>
</a>

<script type="text/javascript">
    function hapus(id) {
        $(".btnDelete_"+id).remove();
        $("#deleteForm_"+id).append('<div class="col-xs-12 btnDelete_'+id+'" align="center">Konfirmasi Penghapusan</div>'+
            '<div class="col-xs-6 btnDelete_'+id+'">'+
            '<button class="btn btn-sm btn-block btn-info" onclick="cancelDelete('+id+')">' +
            '<i class="fa fa-close"></i> Cancel </button>' +
            '</div>'+
            '<div class="col-xs-6 btnDelete_'+id+'">'+
            '<button class="btn btn-sm btn-block btn-danger" onclick="confirmDelete('+id+')">' +
            '<i class="fa fa-check"></i> Hapus </button>' +
            '</div>'
            );
    };

    function cancelDelete(id){
        $(".btnDelete_"+id).remove();
        $("#deleteForm_"+id).append('<div class="col-xs-12 btnDelete_'+id+'">'+
            '<button class="btn btn-sm btn-block btn-danger" onclick="hapus('+id+')"> <i class="fa fa-trash"></i> Hapus Manager</button>'+
            '</div>'
            );
    }

    function confirmDelete(id){
        location.href = "<?= base_url('raider/delete/') ?>" + id;
    }
</script>