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
          <li><a href="#!"><i class="fa fa-sign-out"></i> Keluar</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>
<!-- /.sidebar -->
