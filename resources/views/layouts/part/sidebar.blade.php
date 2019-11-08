<!-- Sidebar user panel -->
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
        <p style="color:white!important">
          {{ Auth::user()->username }}
        </p>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">PROYEK</li>
      <li id="dashboard"><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="treeview" id="master">
        <a href="#">
          <i class="fa fa-database"></i>
          <span>Data Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li id="master-user"><a href="{{ url('backend/user') }}"><i class="fa fa-user"></i> User</a></li>
          <li id="master-menu"><a href="{{ url('backend/menu') }}"><i class="fa fa-list"></i> Menu</a></li>
        </ul>
      </li>
      <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
          <i class="fa fa-sign-out"></i> Keluar</a></li>
    </ul>
  </section>
</aside>
<!-- /.sidebar -->
