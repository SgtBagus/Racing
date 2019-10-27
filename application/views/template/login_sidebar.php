<aside id="sidebar" class="control-sidebar control-sidebar-light" style="display: none;">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">MASUK</li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('login/rider') ?>">
                    <i class="fa fa-lock"></i>
                    <span>Login Rider</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('login') ?>">
                    <i class="fa fa-lock"></i>
                    <span>Login Team</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('login/registerrider') ?>">
                    <i class="fa fa-user"></i>
                    <span>Register Rider</span>
                </a>
            </li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url('login/register') ?>">
                    <i class="fa fa-user"></i>
                    <span>Register Team</span>
                </a>
            </li>
            <li class="header">MENU</li>
            <li style="margin-bottom: 5px;">
                <a href="<?= base_url() ?>">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
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
        </ul>
    </section>
</aside>
