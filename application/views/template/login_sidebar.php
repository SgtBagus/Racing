<aside id="sidebar" class="control-sidebar control-sidebar-light" style="display: none;">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">MASUK</li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('login/rider') ?>">
                    <img src="<?= base_url('assets/flaticon/sidebar_locked.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Login Rider</span>
                </a>
            </li>
            <!-- <li style="margin-bottom: 5px;">
                <a href="<?= base_url('login') ?>">
                    <img src="<?= base_url('assets/flaticon/sidebar_locked.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Login Team</span>
                </a>
            </li> -->
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('login/registerrider') ?>">
                    <img src="<?= base_url('assets/flaticon/sidebar_rider.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Register Rider</span>
                </a>
            </li>
            <!-- <li style="margin-bottom: 5px;">
                <a href="<?= base_url('login/register') ?>">
                    <img src="<?= base_url('assets/flaticon/sidebar_team.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Register Team</span>
                </a>
            </li> -->
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('kebijakanprivasi') ?>">
                    <img src="<?= base_url('assets/flaticon/sidebar_list.png') ?>" style=" width: 15px; height: 15px; margin-bottom: 5px;">
                    <span>Kebijakan & Privasi</span>
                </a>
            </li>
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
        </ul>
    </section>
</aside>