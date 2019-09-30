<aside id="sidebar" class="control-sidebar control-sidebar-light" style="display: none;">
    <section class="sidebar" style="height: auto;">
        <div class="user-panel">
            <div class="row" align="center">
                <img src="<?= base_url('assets/')?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <h2>Alexander Pierce</h2>
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
                    <i class="fa fa-archive"></i>
                    <span>Manajemen Event</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i>
                    <span>Pendaftaran</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Pengguna</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#"><i class="fa fa-user"></i> Pendaftar</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i> Pembalap</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>