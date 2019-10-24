<div class="row">
    <div class="col-md-12">
        <div class="box">
            <img class="img-even" src="<?= $file['url'] ?>">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <h4 align="center"><?= $tbl_event['title'] ?></h4>
                        <div class="row" align="center">
                            <?php if ($tbl_event['status'] == 'ENABLE') {
                                echo '<small class="label bg-green">Dibuka</small>';
                            } else {
                                echo '<small class="label bg-red">Ditutup</small>';
                            }
                            ?>
                        </div>
                        <p>
                            <i class="fa fa-globe"></i> <?= $tbl_event['kota'] ?><br>
                            <?= $tbl_event['alamat'] ?>
                        </p>
                        <!-- <a href="https://maps.google.com/?q=<?= $tbl_event['alamat'] ?>">
                            <button class="btn btn-md btn-block btn-info"> <i></i> Lihat Peta Di Google Maps</button>
                        </a> -->
                    </div>
                </div>
                <hr style="margin-top:5px; margin-bottom: 5px">
                <div class="row">
                    <div class="col-xs-6">
                        Event Dimulai :
                        <br>
                        <small>
                            <?= date('d-M', strtotime($tbl_event['tgleventStart'])) ?>
                            <b>s/d</b>
                            <?= date('d-M', strtotime($tbl_event['tgleventEnd'])) ?>
                        </small>
                    </div>
                    <div class="col-xs-6" align="right">
                        Pendaftar :
                        <b>
                            <i class="fa fa-motorcycle"></i> <?= $rowraider[0]['rowraider'] ?>
                            <i class="fa fa-users"></i> <?= $rowteam[0]['rowteam'] ?>
                        </b>
                        <br>
                        <small>Event Dibuat : <?= date('d M y', strtotime($row['created_at'])) ?></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xs-12" align="center">
                <h3>Kategori Gallery</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form role="form" action="<?= base_url('gallery') ?>" method="GET">
            <div class="form-group">
                <label for="exampleInputEmail1">Judul Kategori Gambar</label>
                <input type="text" name="title" class="form-control" <?php if ($_GET['title']) {
                                                                            echo 'value="' . $_GET['title'] . '"';
                                                                        } ?> id="filter-search">
            </div>
            <div class="form-group" align="center">
                <button type="submit" class="btn btn-lg btn-block btn-primary"><i class="fa fa-search"></i> Cari</button>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div id="load_data">
    </div>
</div>
<div id="load_data_message"></div>
<script type="text/javascript">
    $(document).ready(function() {

        var limit = 3;
        var start = 0;
        var action = 'inactive';
        var search = 0;

        function load_data(limit, start) {
            lazzy_loader(limit);
            search = $('#filter-search').val();

            $.ajax({
                url: "<?= base_url(); ?>event/galleryfetch/<?=$tbl_event['id']?>/?name=" + search,
                method: "POST",
                data: {
                    limit: limit,
                    start: start
                },
                cache: false,
                success: function(data) {
                    if (data == '') {
                        $('#load_data_message').html('<div class="row">' +
                            '<div class="col-xs-12" align="center">' +
                            'Semua Gallery telah Ditampilkan' +
                            '</div>' +
                            '</div>');
                        action = 'active';
                    } else {
                        $('#load_data').append(data);
                        $('#load_data_message').html('<div class="row">' +
                            '<div class="col-xs-12" align="center">' +
                            'Semua Gallery telah Ditampilkan' +
                            '</div>' +
                            '</div>');
                        action = 'inactive';
                    }
                }
            })
        }

        if (action == 'inactive') {
            action = 'active';
            load_data(limit, start);
        }

        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
                lazzy_loader(limit);
                action = 'active';
                start = start + limit;
                setTimeout(function() {
                    load_data(limit, start);
                }, 1000);
            }
        });
    });
</script>