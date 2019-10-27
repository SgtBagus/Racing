<footer class="main-footer">
  <div class="container">
    <div class="row" style="text-align: center;">
      <div class="col-xs-4">
        <a href="<?= base_url() ?>" class="menu-footer" style="color:#333333">
          <i class="fa fa-home"></i>
        </a>
      </div>
      <div class="col-xs-4">
        <a href="<?= base_url('event') ?>" class="menu-footer" style="color:#333333">
          <i class="fa fa-star"></i>
        </a>
      </div>
      <div class="col-xs-4">
        <a href="<?= base_url('raider/edit/'.$this->session->userdata('id')) ?>" class="menu-footer" style="color:#333333">
          <i class="fa fa-user-circle"></i>
        </a>
      </div>
    </div>
  </div>
</footer>