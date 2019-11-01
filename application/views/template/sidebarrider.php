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
                    <img src="<?= base_url('assets/flaticon/sidebar_house.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Home</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;" class="treeview">
                <a href="#">
                    <img src="<?= base_url('assets/flaticon/sidebar_star.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Event</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('monitoreventrider') ?>">
                            <img src="<?= base_url('assets/flaticon/sidebar_smartphone.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                            Monitoring Event
                        </a>
                    </li>
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('event') ?>">
                            <img src="<?= base_url('assets/flaticon/research.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                            Cari Event
                        </a>
                    </li>
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('verifteam') ?>">
                            <img src="<?= base_url('assets/flaticon/sidebar_team.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                            Verified Team
                        </a>
                    </li>
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('verifraider') ?>">
                            <img src="<?= base_url('assets/flaticon/sidebar_rider.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                            Verified Rider
                        </a>
                    </li>
                </ul>
            </li>
            <li style="margin-bottom: 5px;" class="treeview">
                <a href="#">
                    <img src="<?= base_url('assets/flaticon/sidebar_user.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Profil</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('raider/edit/' . $this->session->userdata('id')) ?>">
                            <img src="<?= base_url('assets/flaticon/sidebar_user.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                            Akun Saya
                        </a>
                    </li>
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('riderpassword') ?>">
                            <img src="<?= base_url('assets/flaticon/sidebar_locked.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                            Ubah Passowrd
                        </a>
                    </li>
                </ul>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('wisata') ?>">
                    <img src="<?= base_url('assets/flaticon/sidebar_wisata.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Wisata</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('blogs') ?>">
                    <img src="<?= base_url('assets/flaticon/sidebar_text-lines.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>News/Blogs</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('gallery') ?>">
                    <img src="<?= base_url('assets/flaticon/sidebar_picture.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Gallery</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('merchandise') ?>">
                    <img src="<?= base_url('assets/flaticon/sidebar_shipment.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Merchandise</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('kebijakanprivasi') ?>">
                    <img src="<?= base_url('assets/flaticon/sidebar_list.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Kebijakan & Privasi</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('login/logoutRider') ?>">
                    <img src="<?= base_url('assets/flaticon/sidebar_logout.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>