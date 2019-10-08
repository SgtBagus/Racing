<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <img src="<?= $file['url'] ?>" width="100%" height="230px">
                    <h3>
                        <?= $tbl_event['title'] ?><br>
                        <small>
                            <i class="fa fa-globe"></i> <?= $tbl_event['kota'] ?> - <?= $tbl_event['alamat'] ?>
                        </small>
                        <br>
                        <a href="https://maps.google.com/?q=<?= $tbl_event['alamat'] ?>">
                            <button class="btn btn-sm btn-info"> <i></i> Lihat Peta Di Google Maps</button>
                        </a>
                    </h3>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php if ($tbl_event['status'] == 'ENABLE') {
                                echo '<small class="label bg-green">Dibuka</small>';
                            } else {
                                echo '<small class="label bg-red">Ditutup</small>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-calendar"></i> <?= date('d-m-Y', strtotime($tbl_event['tglevent'])) ?> <br>
                        </div>
                        <div class="col-xs-6" align="right">
                            Pendaftar : 
                            <br>
                            <i class="fa fa-motorcycle"></i><b> <?= $rowraider[0]['rowraider'] ?></b> Raider
                            <i class="fa fa-users"></i><b><?= $rowteam[0]['rowteam'] ?></b> Team
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="#>">
                <button class="btn btn-sm btn-block btn-success"> <i class="fa fa-whatsapp"></i> Hubungi Petanggung Jawab</button>
            </a>
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
                            <td align="right">Raider per Team</td>
                            <td>:</td>
                            <td align="left">
                                <b><?= $tbl_event['minraider'] ?> s/d <?= $tbl_event['maxraider'] ?></b>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="box-footer">
                    <a href="<?= base_url('event/register/') . $tbl_event['id'] ?>">
                        <button class="btn btn-sm btn-block btn-primary btn-daftar"> <i class="fa fa-users"></i> Daftarkan Tim</button>
                    </a>
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
                        <div class="box-footer">
                            <a href="<?= base_url('event/register/') . $tbl_event['id'] ?>">
                                <button class="btn btn-sm btn-block btn-primary btn-daftar"> <i class="fa fa-users"></i> Daftarkan Tim</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    <?php if ($tbl_event['status'] == 'DISABLE') { ?>
        $(".btn-daftar").attr("disabled", true);
    <?php } ?>
</script>