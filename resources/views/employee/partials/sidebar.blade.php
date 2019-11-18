<!-- Sidebar -->
<nav class="navbar-nav sidebar sidebar-gradient accordion position-fixed {{ session('sidebarState') }}" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand bg-light d-flex align-items-center justify-content-center" href="{{ route('employee.index') }}">
    <div class="sidebar-brand-icon">
      <img class="w-75" src="{{ asset('img/logo-kredo-new-sp.png') }}" alt="Kredo">
    </div>
    <h1 class="sidebar-brand-text mx-3">
      <img class="w-100" src="{{ asset('img/logo-kredo-new.png') }}" alt="Kredo">
    </h1>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <ul class="nav">
    <li class="nav-item {{ request()->is('employee/students*') ? 'bg-light' : ''}} {{ request()->is('employee/students') ? 'active' : ''}}">
      <a class="nav-link alt-font text-dark" href="{{ request()->is('employee/students') ? '#' : route('employee.students.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>生徒</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('employee/companies*') ? 'bg-light' : ''}} {{ request()->is('employee/companies') ? 'active' : ''}}">
      <a class="nav-link alt-font text-dark" href="{{ request()->is('employee/companies') ? '#' : route('employee.companies.index') }}">
        <i class="fas fa-fw fa-building"></i>
        <span>企業</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('employee/employees*') ? 'bg-light' : ''}} {{ request()->is('employee/employees') ? 'active' : ''}}">
      <a class="nav-link alt-font text-dark" href="{{ request()->is('employee/employees') ? '#' : route('employee.employees.index') }}">
        <i class="fas fa-fw fa-id-badge"></i>
        <span>スタッフ</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('employee/payments*') || request()->is('employee/tickets*') ? 'bg-light' : ''}}">
      <a class="nav-link alt-font text-dark collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment" aria-expanded="false" aria-controls="collapsePayment">
        <i class="fas fa-fw fa-money-bill-alt"></i>
        <span>入金確認</span>
      </a>
      <div id="collapsePayment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item alt-font" href="{{ route('employee.payments.index') }}">入金確認</a>
          <a class="collapse-item alt-font" href="{{ route('employee.tickets.index') }}">チケット購入履歴</a></a>
        </div>
      </div>
    </li>
  </ul>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="sidebar-toggle rounded-circle border-0" id="js-sidebar-toggle" data-sidebar="{{ route('employee.sidebar.update') }}"></button>
  </div>

</nav>
<!-- End of Sidebar -->
