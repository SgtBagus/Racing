<div class="row">
    <div class="col-md-12">
        <div class="box">
            <img class="img-detail" src="<?= $file['url'] ?>">
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
                <h3>Data Rank </h3>
            </div>
        </div>
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
            $.ajax({
                url: "<?= base_url(); ?>event/rankfetch/<?=$tbl_event['id']?>",
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
                            'Semua Rank telah Ditampilkan' +
                            '</div>' +
                            '</div>');
                        action = 'active';
                    } else {
                        $('#load_data').append(data);
                        $('#load_data_message').html('<div class="row">' +
                            '<div class="col-xs-12" align="center">' +
                            'Semua Rank telah Ditampilkan' +
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
