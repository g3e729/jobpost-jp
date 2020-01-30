<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow" style="max-width: 54px;">
      <a class="nav-link dropdown-toggle p-0" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <img class="avatar avatar-sm avatar-bordered" src="{{ asset('img/avatar-kredo.png') }}">
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        {{-- <a class="dropdown-item alt-font" href="{{ route('admin.notifications.index') }}">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          通知
        </a> --}}
        <a class="dropdown-item alt-font" href="#" data-toggle="modal" data-target="#js-logout-modal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          ログアウト
        </a>
      </div>
    </li>

  </ul>
</nav>