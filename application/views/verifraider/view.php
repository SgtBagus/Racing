<div class="row">
    <div class="col-md-12">
        <h3 class="box-title">Verifired Rider</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <img class="img-detail" src="<?= $file_event['url'] ?>">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <h4 align="center"><?= $tbl_event['title'] ?></h4>
                        <div class="row" align="center">
                            <?php if ($tbl_event['status'] == 'ENABLE') {
                               	echo '<span class="label bg-green round right" style="margin-left:5px">Masih Dibuka</span>';
                            } else {
                               	echo '<span class="label bg-red round right" style="margin-left:5px">Sudah Ditutup</span>';
                            }
                            ?>
                        </div>
                        <div class="col-md-12" style="padding:0px 10px;">
                        <p style="text-align:center;">
                            <!--<i class="fa fa-globe"></i> <?= $tbl_event['kota'] ?><br>-->
                            <?= $tbl_event['alamat'] ?>
                        </p>
                        <!-- <a href="https://maps.google.com/?q=<?= $tbl_event['alamat'] ?>">
                            <button class="btn btn-md btn-block btn-info"> <i></i> Lihat Peta Di Google Maps</button>
                        </a> -->
                        </div>
                    </div>
                </div>
                <hr style="margin-top:5px; margin-bottom: 5px;">
                <div class="row">
                    <div class="col-xs-6">
                        Tanggal Event :
                        <br>
                        <small>
                            <?= date('d M Y', strtotime($tbl_event['tgleventStart'])) ?>
                            <b>s/d</b>
                            <?= date('d M Y', strtotime($tbl_event['tgleventEnd'])) ?>
                        </small>
                    </div>
                    <div class="col-xs-6" align="right">
                        Pendaftar :
                        <b>
                            <i class="fa fa-motorcycle"></i> <?= $rowraider[0]['rowraider'] ?>
                            <i class="fa fa-users"></i> <?= $rowteam[0]['rowteam'] ?>
                        </b>
                        <br>
                        <small>Event Dibuat : <?= date('d-M-Y', strtotime($tbl_event['created_at'])) ?></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="https://api.whatsapp.com/send?phone=<?=$tbl_event['phone']?>&text=Perkenalkan Saya <?= $this->session->userdata('name') ?>. Saya ingin menanyakan tentang...">
    <button class="btn btn-lg btn-block btn-success" style="margin-bottom: 15px">
        <i class="fa fa-whatsapp"></i> Hubungi Petanggung Jawab Event
    </button>
</a>
<br>
<div class="row">
    <div class="col-md-12" align="center">
        Rider Pendaftar <b> <?= $rowraider[0]['rowraider'] ?></b>:
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <form role="form" action="<?= base_url('verifraider/view/' . $tbl_event['id']) ?>" method="GET">
            <div class="form-group">
                <label>Nama Rider</label>
                <input type="text" name="name" class="form-control" <?php if ($_GET['name']) {
                                                                        echo 'value="' . $_GET['name'] . '"';
                                                                    } ?> id="filter-search">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-block btn-primary">
                    <i class="fa fa-search"></i> Cari
                </button>
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

        var limit = 2;
        var start = 0;
        var action = 'inactive';
        var search = 0;

        function load_data(limit, start) {
            lazzy_loader(limit);
            search = $('#filter-search').val();

            $.ajax({
                url: "<?= base_url('verifraider/fetchraider/' . $tbl_event['id']); ?>?name=" + search,
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
                            'Semua Raider Pendaftar telah Ditampilkan' +
                            '</div>' +
                            '</div>');
                        action = 'active';
                    } else {
                        $('#load_data').append(data);
                        $('#load_data_message').html('<div class="row">' +
                            '<div class="col-xs-12" align="center">' +
                            'Tampilkan Lebih Banyak <br> <i class="fa fa-angle-down"></i>' +
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
