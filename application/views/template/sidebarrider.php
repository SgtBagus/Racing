<aside id="sidebar" class="control-sidebar control-sidebar-light" style="display: none;">
    <section class="sidebar" style="height: auto;">
        <div class="user-panel">
            <div class="row" align="center">
                <?php
                $id_session = $this->session->userdata('id');
                $rider = $this->mymodel->selectDataone('tbl_raider', array('id' => $id_session));
                $photo = $this->mymodel->selectDataone('file', array('table' => 'tbl_raider', 'table_id' => $rider['id']));
                ?>
                <?php if ($photo != null) { ?>
                    <img src="<?= $photo['url'] ?>" class="img-circle" alt="User Image" height="150px" width="150px">
                <?php } else { ?>
                    <img src="<?= base_url('webfiles/raider/raider_default.png') ?>" class="img-circle" alt="User Image" height="150px" width="150px">
                <?php } ?>

                <h2>
                    <?= $rider['name'] ?>
                    <?php if ($rider['verificacion'] == 'ENABLE') {
                        echo '<i class="fa fa-check-circle" style="color: #3b8dbc"> </i>';
                    } ?>
                </h2>
            </div>
        </div>
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">MENU</li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url() ?>">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;" class="treeview">
                <a href="#">
                    <i class="fa fa-check-square-o"></i>
                    <span>Profil</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('raider/edit/' . $this->session->userdata('id')) ?>"><i class="fa fa-motorcycle"></i> Akun Saya</a>
                    </li>
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('riderpassword') ?>"><i class="fa fa-lock"></i> Ubah Passowrd</a>
                    </li>
                </ul>
            </li>
            <li style="margin-bottom: 5px;" class="treeview">
                <a href="#">
                    <i class="fa fa-map-o"></i>
                    <span>Event</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('monitoreventrider') ?>">
                            <i class="fa fa-television"></i> Monitoring Event
                        </a>
                    </li>
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('event') ?>">
                            <i class="fa fa-star"></i> Cari Event
                        </a>
                    </li>
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('verifteam') ?>">
                            <i class="fa fa-users"></i>
                            <span>Verified Team</span>
                        </a>
                    </li>
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('verifraider') ?>">
                            <i class="fa fa-motorcycle"></i>
                            <span>Verified Rider</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('wisata') ?>">
                    <i class="fa fa-star"></i>
                    <span>Wisata</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('blogs') ?>">
                    <i class="fa fa-newspaper-o"></i>
                    <span>News/Blogs</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('gallery') ?>">
                    <i class="fa fa-picture-o"></i>
                    <span>Gallery</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('merchandise') ?>">
                    <i class="fa fa-cubes"></i>
                    <span>Merchandise</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('login/logoutRider') ?>">
                    <i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>