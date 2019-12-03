<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('pageTitle') - {{ config('app.name') }}</title>
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>
  <div id="app">
    <nav class="navbar navbar-expand topbar mb-4 static-top shadow">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" style="max-width: 214px;">
          <img class="w-100" src="{{ asset('img/logo-kredo-new.png') }}" alt="Kredo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto"></ul>

          @if (!request()->is('login'))
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link alt-font font-weight-bold text-dark" href="{{ route('login') }}">{{ __('ログインする') }}</a>
            </li>
          </ul>
          @endif
        </div>
      </div>
    </nav>

    <main class="py-5 mt-5">
      @yield('content')
    </main>
  </div>

  <script src="{{ asset('js/admin.js') }}" async></script>
  @yield('js')
</body>
</html>
