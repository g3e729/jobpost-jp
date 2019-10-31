<!-- Sidebar -->
<nav class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
  
  <ul class="nav">
    <li class="nav-item {{ request()->is('admin/students*') ? 'active' : ''}}">
      <a class="nav-link alt-font" href="{{ route('admin.students.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>生徒</span>
      </a>
    </li>
  
    <li class="nav-item {{ request()->is('admin/companies*') ? 'active' : ''}}">
      <a class="nav-link alt-font" href="{{ route('admin.companies.index') }}">
        <i class="fas fa-fw fa-building"></i>
        <span>企業</span>
      </a>
    </li>
  
    <li class="nav-item {{ request()->is('admin/employees*') ? 'active' : ''}}">
      <a class="nav-link alt-font" href="{{ route('admin.employees.index') }}">
        <i class="fas fa-fw fa-id-badge"></i>
        <span>スタッフ</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('admin/recruitments*') ? 'active' : ''}}">
      <a class="nav-link alt-font" href="{{ route('admin.recruitments.index') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>募集</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('admin/notifications*') && !request()->is('admin/notifications/create') ? 'active' : ''}}">
      <a class="nav-link alt-font" href="{{ route('admin.notifications.index') }}">
        <i class="fas fa-fw fa-bell"></i>
        <span>お知らせ</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('admin/messages*') ? 'active' : ''}}">
      <a class="nav-link alt-font" href="{{ route('admin.messages.index') }}">
        <i class="fas fa-fw fa-comment-dots"></i>
        <span>メッセージ</span>
      </a>
    </li>

    <li class="nav-item {{ request()->is('admin/invite*') || request()->is('admin/notifications/create') ? 'active' : ''}}">
      <a class="nav-link alt-font collapsed" href="#" data-toggle="collapse" data-target="#collapseCreate" aria-expanded="false" aria-controls="collapseCreate">
        <i class="fas fa-fw fa-plus"></i>
        <span>新規作成</span>
      </a>
      <div id="collapseCreate" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item alt-font" href="{{ route('admin.invite.create') }}">アカウント</a>
          <a class="collapse-item alt-font" href="{{ route('admin.notifications.create') }}">お知らせ</a>
        </div>
      </div>
    </li>

    <li class="nav-item {{ request()->is('admin/payments*') || request()->is('admin/tickets*') ? 'active' : ''}}">
      <a class="nav-link alt-font collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment" aria-expanded="false" aria-controls="collapsePayment">
        <i class="fas fa-fw fa-money-bill-alt"></i>
        <span>入金確認</span>
      </a>
      <div id="collapsePayment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item alt-font" href="{{ route('admin.payments.index') }}">入金確認</a>
          <a class="collapse-item alt-font" href="{{ route('admin.tickets.index') }}">チケット購入履歴</a></a>
        </div>
      </div>
    </li>
  </ul>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="sidebar-toggle rounded-circle border-0" id="js-sidebar-toggle"></button>
  </div>

</nav>
<!-- End of Sidebar -->