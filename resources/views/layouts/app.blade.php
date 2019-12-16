<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('pageTitle') | {{ config('app.name') }}</title>

  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-awesome" style="background-image: url('/img/login/login-bg.png'), linear-gradient(to right, rgba(253,184,52, 0.7) 0%, rgb(247,149,77, 1) 50%);">
  <div class="container container-awesome">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card card-form ox-hidden border-0 my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-6 card-form-left d-flex align-items-center pr-0">
                <div class="card-form-side text-center w-100">
                  <img src="{{ asset('img/logo-kredo-vertical.png') }}" alt="Kredo" class="mb-5 pb-5" style="max-width: 112px;">
                </div>
              </div>

              <div class="col-6 card-form-right pl-0">
                <div class="position-relative">

                  <div class="form-header">
                    <div class="py-5 mt-4 text-center">
                      <h1 class="pt-3 h5 font-weight-bold">
                        @switch(trim($__env->yieldContent('pageTitle')))
                          @case('Login')
                            ログインする
                            @break

                          @case('Forgot Password')
                            パスワードを再設定する
                            @break

                          @case('Reset Password')
                            パスワードを変更する
                            @break

                          @default
                        @endswitch
                      </h1>
                    </div>
                  </div>

                  @if ($errors->any())
                    <div class="alert alert-danger mb-0 mr-5">
                      <ul class="mb-0 pl-3">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                      </ul>
                    </div>
                  @endif

                  @yield('content')

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/admin.js') }}" async></script>
  @yield('js')
</body>
</html>
