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
                        <a href="https://maps.google.com/?q=<?= $tbl_event['alamat']?>">
                            <button class="btn btn-sm btn-info"> <i></i> Lihat Peta Di Google Maps</button>
                        </a>
                    </h3>
                    <div class="row">
                        <div class="col-xs-6">
                            <b>
                                <i class="fa fa-calendar"> <?= date('d-m-Y', strtotime($tbl_event['tglevent'])) ?></i>
                            </b>
                        </div>
                        <div class="col-xs-6" align="right">
                            <b>
                                <i class="fa fa-motorcycle"></i> 154
                                <i class="fa fa-users"></i> 12
                            </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="#>">
                <button class="btn btn-sm btn-block btn-success"> <i class="fa fa-whatsapp"></i>Hubungi Petanggung Jawab</button>
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
                                <b><?= $tbl_event['minraider']?> s/d <?= $tbl_event['maxraider'] ?></b>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="box-footer">
                    <a href="<?= base_url('event/register/').$tbl_event['id']?>">
                        <button class="btn btn-sm btn-block btn-primary"> <i class="fa fa-users"></i> Daftarkan Tim</button>
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
                            <a href="<?= base_url('event/register/').$tbl_event['id']?>">
                                <button class="btn btn-sm btn-block btn-primary"> <i class="fa fa-users"></i> Daftarkan Tim</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>