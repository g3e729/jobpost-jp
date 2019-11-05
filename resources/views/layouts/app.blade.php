<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('pageTitle') - {{ config('app.name') }}</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div id="app">
    <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ asset('img/logo-kredo.png') }}" width="120" height="44" alt="Kredo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto"></ul>

          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link alt-font text-white" href="{{ route('login') }}">{{ __('ログインする') }}</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>

    <main class="py-5 mt-5">
      @yield('content')
    </main>
  </div>

  <script src="{{ asset('js/app.js') }}" async></script>
</body>
</html>
