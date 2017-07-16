<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?=base_url('assets/img/avatar3.png')?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Hello, <?=$username?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li>
                    <a href="<?=base_url()?>">
                        <i class="fa  fa-home"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Data User</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url('admin/data-pelanggan')?>"><i class="fa fa-angle-double-right"></i> Pelangan</a></li>
                        <li><a href="<?=base_url('admin/data-teknisi')?>"><i class="fa fa-angle-double-right"></i> Teknisi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url('admin/data-permohonan')?>">
                        <i class="fa fa-check-square"></i> <span>Permohonan</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url('admin/barang-masuk')?>">
                        <i class="fa fa-truck"></i> <span>Barang Masuk</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
