<div class="row">
    <div class="col-md-12">
        <h3 class="box-title">Merchandise</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <img class="img-detail" src="<?= $file['url'] ?>">
            <div class="box-body" align="center">
                <h3><?= $tbl_merchandise['title'] ?><br></h3>
                Dibuat pada : <?= date('d-m-Y', strtotime($tbl_merchandise['created_at'])) ?> <br>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body" align="center">
                <i class="fa fa-money"></i> <b>Rp. <?= number_format($tbl_merchandise['harga'], 0, ',', '.') ?>,- </b>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <?= $tbl_merchandise['deskripsi'] ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="https://api.whatsapp.com/send?phone=<?= $tbl_merchandise['phone'] ?>&text=Perkenalkan Saya <?= $this->session->userdata('name') ?>. Saya ingin menanyakan tentang..." target="_black">
            <button class="btn btn-lg btn-block btn-success" style="margin-bottom: 15px">
                <i class="fa fa-whatsapp"></i> Hubungi Penjual
            </button>
        </a>
    </div>
</div>