<aside id="sidebar" class="control-sidebar control-sidebar-light" style="display: none;">
    <section class="sidebar" style="height: auto;">
        <div class="user-panel">
            <div class="row" align="center">
                <?php
                $id_session = $this->session->userdata('id');
                $team = $this->mymodel->selectDataone('tbl_team', array('id' => $id_session));
                $photo = $this->mymodel->selectDataone('file', array('table' => 'tbl_team', 'table_id' => $team['id']));
                ?>
                <?php if ($photo != null) { ?>
                    <img src="<?= $photo['url'] ?>" class="img-circle" alt="User Image" height="150px" width="150px">
                <?php } else { ?>
                    <img src="<?= base_url('webfiles/team/team_default.png') ?>" class="img-circle" alt="User Image" height="150px" width="150px">
                <?php } ?>
                <h2>
                    <?= $team['name'] ?>
                    <?php if ($team['verificacion'] == 'ENABLE') {
                        echo '<img src="'.base_url('assets/flaticon/verified.png').'" style=" width: 30px; height: 30px; margin-bottom: 5px;">';
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
                        <a href="<?= base_url('monitorevent') ?>">
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
                    <span>Manajemen</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('raider') ?>">
                            <img src="<?= base_url('assets/flaticon/sidebar_rider.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                            Rider
                        </a>
                    </li>
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('team') ?>">
                            <img src="<?= base_url('assets/flaticon/sidebar_team.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                            Team
                        </a>
                    </li>
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('manager') ?>">
                            <img src="<?= base_url('assets/flaticon/sidebar_user.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                            Manajer
                        </a>
                    </li>
                    <li style="margin-bottom: 5px;">
                        <a href="<?= base_url('teampassword') ?>">
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
                    <span>News</span>
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
                <a href="<?= base_url('login/logout') ?>">
                    <img src="<?= base_url('assets/flaticon/sidebar_logout.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>