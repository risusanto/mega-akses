<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li><a href="<?=base_url('admin')?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a><i class="fa fa-edit"></i> Data User <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?=base_url('admin/data-leader')?>">Leader</a></li>
          <li><a href="<?=base_url('admin/data-user')?>">Pelanggan</a></li>
        </ul>
      </li>
    </ul>
  </div>

</div>
<!-- /sidebar menu -->

</div>
</div>

<!-- top navigation -->
<div class="top_nav">
<div class="nav_menu">
<nav class="" role="navigation">
  <div class="nav toggle">
    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
  </div>

  <ul class="nav navbar-nav navbar-right">
    <li class="">
      <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <img src="<?=base_url('assets/images/img.jpg')?>" alt="">John Doe
        <span class=" fa fa-angle-down"></span>
      </a>
      <ul class="dropdown-menu dropdown-usermenu pull-right">
        <li><a href="javascript:;"> Profile</a></li>
        <li>
          <a href="javascript:;">
            <span class="badge bg-red pull-right">50%</span>
            <span>Settings</span>
          </a>
        </li>
        <li><a href="javascript:;">Help</a></li>
        <li><a href="<?=base_url('logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
      </ul>
    </li>
  </ul>
</nav>
</div>
</div>
<!-- /top navigation -->
