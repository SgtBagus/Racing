<aside id="sidebar" class="control-sidebar control-sidebar-light" style="display: none;">
    <section class="sidebar" style="height: auto;">
        <div class="user-panel">
            <div class="row" align="center">
                <?php
                $id_session = $this->session->userdata('id');
                $team = $this->mymodel->selectDataone('tbl_team', array('id' => $id_session));
                $photo = $this->mymodel->selectDataone('file', array('table' => 'tbl_team', 'table_id' => $team['id']));
                ?>
                <img src="<?= $photo['url'] ?>" class="img-circle" alt="User Image" height="150px" width="150px">
                <h2><?= $team['name'] ?>
                    <?php if ($team['verificacion'] == 'ENABLE') {
                        echo '<i class="fa fa-check-circle" style="color: #3b8dbc"> </i>';
                    } ?>
                </h2>
            </div>
        </div>
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">PILIHAN MENU</li>
            <li>
                <a href="<?= base_url() ?>">
                    <i class="fa fa-bar-chart"></i>
                    <span>Statistik</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-check-square-o"></i>
                    <span>Manajemen</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?= base_url('raider') ?>"><i class="fa fa-motorcycle"></i> Pembalap</a>
                    </li>
                    <li>
                        <a href="<?= base_url('manager') ?>"><i class="fa fa-user"></i> Manajer</a>
                    </li>
                    <li>
                        <a href="<?= base_url('team') ?>"><i class="fa fa-users"></i> Team</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-map-o"></i>
                    <span>Event</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?= base_url('event') ?>"><i class="fa fa-star"></i> Cari Event</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-television"></i> Monitoring Event</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Verified Team</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-motorcycle"></i>
                    <span>Verified Rider</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Blog</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('gallery') ?>">
                    <i class="fa fa-picture-o"></i>
                    <span>Gallery</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>Merchandise</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('login/logout') ?>">
                    <i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>