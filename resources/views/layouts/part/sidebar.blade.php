<!-- Sidebar user panel -->
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
        <label style="color:white!important" class="badge bg-green">
          {{ Auth::user()->username }}
        </label>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">PROYEK</li>
      @php
        createMenu();
      @endphp
      
      {{-- <li id="dashboard"><a href="{{ url('backend') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

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
          <li id="master-group"><a href="{{ url('backend/group') }}"><i class="fa fa-users"></i> Group</a></li>
          <li id="master-menu"><a href="{{ url('backend/menu') }}"><i class="fa fa-list"></i> Menu</a></li>
          <li id="master-permission"><a href="{{ url('backend/permission') }}"><i class="fa fa-key"></i> Permission</a></li>
        </ul>
      </li> --}}

      <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
          <i class="fa fa-sign-out"></i> Keluar</a></li>
    </ul>
  </section>
</aside>
<!-- /.sidebar -->
