<div class="row">
    <div class="col-md-12">
        <div class="box">
            <img class="img-detail" src="https://thumbs.gfycat.com/NegligiblePaltryCorydorascatfish-small.gif">
            <div class="box-body" align="center">
                <h3>Pendaftaran anda Berhasil Mohon cek <b>Email</b> Anda untuk Proses Lebih Lanjut !</h3>
                <hr style="margin-top:5px; margin-bottom: 5px">
                <div class="row">
                    <div class="col-xs-12">
                        <?php if ($this->session->userdata('role') == 'Team') { ?>
                            <a href="<?= base_url('monitorevent') ?>">
                                <button class="btn btn-lg btn-block btn-info"> <i class="fa fa-television"></i> Monitoring Event </button>
                            </a>
                        <?php } else { ?>
                            <a href="<?= base_url('monitoreventrider') ?>">
                                <button class="btn btn-lg btn-block btn-info"> <i class="fa fa-television"></i> Monitoring Event </button>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="col-xs-12" align="center">
                        <h3>Data Verifired!</h3>
                    </div>
                    <div class="col-xs-6">
                        <a href="<?= base_url('verifteam') ?>">
                            <button class="btn btn-lg btn-block btn-warning btn-daftar" style="margin-bottom: 15px">
                                <i class="fa fa-users"></i> Team
                            </button>
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <a href="<?= base_url('verifraider/') ?>">
                            <button class="btn btn-lg btn-block btn-warning btn-daftar" style="margin-bottom: 15px">
                                <i class="fa fa-motorcycle"></i> Rider
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>