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
                <li>
                    <a href="<?=base_url('leader/data-permohonan')?>">
                        <i class="fa fa-check-square"></i> <span>Permohonan</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Atur Jadwal</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url('leader/atur-jadwal-instalasi')?>"><i class="fa fa-angle-double-right"></i> Instalasi</a></li>
                        <li><a href="<?=base_url('leader/atur-jadwal-maintenance')?>"><i class="fa fa-angle-double-right"></i> Maintenance</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Jadwal</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url('leader/jadwal-instalasi')?>"><i class="fa fa-angle-double-right"></i> Instalasi</a></li>
                        <li><a href="<?=base_url('leader/jadwal-maintenance')?>"><i class="fa fa-angle-double-right"></i> Maintenance</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url('leader/barang-keluar')?>">
                        <i class="fa fa-truck"></i> <span>Barang Keluar</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="modal fade" id="ganti" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Ubah Password</h4>
            </div>
            <?=form_open('leader/index')?>
            <div class="modal-body">
                  <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password Lama</label>
                    <input type="password" name="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password Baru</label>
                    <input type="password" name="new_password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Konfirmasi Password Baru</label>
                    <input type="password" name="confirm" class="form-control">
                  </div>
                  </div>
                  <!-- /.box-body -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
              <input type="submit" name ="ganti_passwd" class="btn btn-primary" value="Simpan">
            <?=form_close()?>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
