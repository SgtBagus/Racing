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
<br>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Syarat Pendaftaran </h3>
            </div>
            <div class="box-body" align="center">
                <table style="width: 100%">
                    <tr>
                        <td align="right">Rider per Team</td>
                        <td>:</td>
                        <td align="left">
                            <b><?= $tbl_event['minraider'] ?> s/d <?= $tbl_event['maxraider'] ?></b>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box-header with-border">
                        <h3 class="box-title">Deskripsi</h3>
                    </div>
                    <div class="box-body">
                        <?= $tbl_event['deskripsi'] ?>
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
                <h3>Data Verifired </h3>
            </div>
            <div class="col-xs-6">
                <a href="<?= base_url('verifteam/view/') . $tbl_event['id'] ?>">
                    <button class="btn btn-lg btn-block btn-warning btn-daftar" style="margin-bottom: 15px">
                        <i class="fa fa-users"></i> Team
                    </button>
                </a>
            </div>
            <div class="col-xs-6">
                <a href="<?= base_url('verifraider/view/') . $tbl_event['id'] ?>">
                    <button class="btn btn-lg btn-block btn-warning btn-daftar" style="margin-bottom: 15px">
                        <i class="fa fa-motorcycle"></i> Rider
                    </button>
                </a>
            </div>
        </div>
        <?php if ($tbl_event['statusEvent'] == 'BERJALAN' || $tbl_event['statusEvent'] == 'SELESAI') { ?>
            <a href="<?= base_url('event/rank/') . $tbl_event['id'] ?>">
                <button class="btn btn-lg btn-block btn-info btn-daftar" style="margin-bottom: 15px">
                    <i class="fa fa-user"></i> Juara Rider
                </button>
            </a>
            <?php if ($tbl_event['live_url']) { ?>
                <a href="<?= $tbl_event['live_url'] ?>">
                    <button class="btn btn-lg btn-block btn-info btn-daftar" style="margin-bottom: 15px">
                        <i class="fa fa-camera"></i> Live Event
                    </button>
                </a>
            <?php } ?>
        <?php } ?>
        <a href="<?= base_url('event/gallery/') . $tbl_event['id'] ?>">
            <button class="btn btn-lg btn-block btn-info btn-daftar" style="margin-bottom: 15px">
                <i class="fa fa-picture-o"></i> Dokumentasi
            </button>
        </a>
        <?php if ($tbl_event['statusEvent'] == 'STARTED') { ?>
            <a href="<?= base_url('event/register/') . $tbl_event['id'] ?>">
                <button class="btn btn-lg btn-block btn-primary btn-daftar" style="margin-bottom: 15px">
                    <i class="fa fa-users"></i> Daftarkan Tim
                </button>
            </a>
        <?php } else if ($tbl_event['statusEvent'] == 'BERJALAN') { ?>
            <h4 class="help-block" align="center">Event Telah Berjalan!</h4>
        <?php } else if ($tbl_event['statusEvent'] == 'SELESAI') { ?>
            <h4 class="help-block" align="center">Event Telah Selesai!</h4>
            <p class="help-block">Event Telah Selesai!</p>
        <?php } else if ($tbl_event['statusEvent'] == 'BATAL') { ?>
            <h4 class="help-block" align="center">Event Dibatlkan!</h4>
        <?php } ?>
    </div>
</div>
<script type="text/javascript">
    <?php if ($tbl_event['status'] == 'DISABLE') { ?>
        $(".btn-daftar").attr("disabled", true);
    <?php } ?>
</script>