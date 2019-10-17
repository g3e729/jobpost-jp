<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/index.html">
    <div class="sidebar-brand-icon">
      <img class="w-50" src="{{ asset('img/logo-kredo-sp.png') }}" alt="Kredo">
    </div>
    <h1 class="sidebar-brand-text mx-3">
      <img class="w-75" src="{{ asset('img/logo-kredo.png') }}" alt="Kredo">
    </h1>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
    <li class="nav-item {{ request()->is('admin') || request()->is('admin/students') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('admin.students.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>生徒</span>
      </a>
    </li>
  
    <li class="nav-item {{ request()->is('admin/companies') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('admin.companies.index') }}">
        <i class="fas fa-fw fa-building"></i>
        <span>企業</span>
      </a>
    </li>
  
    <li class="nav-item {{ request()->is('admin/staffs') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('admin.staffs.index') }}">
        <i class="fas fa-fw fa-id-badge"></i>
        <span>スタッフ</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('admin/notifications') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('admin.notifications.index') }}">
        <i class="fas fa-fw fa-bell"></i>
        <span>お知らせ</span>
      </a>
    </li>
  
    <li class="nav-item {{ request()->is('admin/recruitments') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('admin.recruitments.index') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>募集</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('admin/account') ? 'active' : ''}}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCreate" aria-expanded="false" aria-controls="collapseCreate">
        <i class="fas fa-fw fa-plus"></i>
        <span>新規作成</span>
      </a>
      <div id="collapseCreate" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('admin.invite')}}">アカウント</a>
          <a class="collapse-item" href="#">お知らせ</a>
        </div>
      </div>
    </li>

    <li class="nav-item {{ request()->is('admin/payments') ? 'active' : ''}}">
      <a class="nav-link" href="#">
        <i class="fas fa-fw fa-money-bill-alt"></i>
        <span>入金確認</span>
      </a>
    </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->