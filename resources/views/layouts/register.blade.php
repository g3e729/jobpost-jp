<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" prefix="og: http://ogp.me/ns#"><!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <title>Registration Form | Kredo</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta property="og:locale" content="ja_JP">
  <meta property="fb:admins" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:type" content="blog">
  <meta property="og:image" content="/assets/images/common/logo_ogp.png">

  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
  <link rel="apple-touch-icon-precomposed" href="/assets/images/common/apple-touch-icon-precomposed.png">

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho|Noto+Sans+JP&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>

  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

  <script> document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>
</head>

<body class="bg-gradient-awesome" style="background-image: url('{{ $image }}'), linear-gradient(to right, rgba(253,184,52, 0.7) 0%, rgb(247,149,77, 1) 50%);">
  <div class="container container-awesome">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card card-form ox-hidden border-0 my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-6 card-form-left d-flex align-items-center pr-0">
                <div class="card-form-side text-center w-100">
                  <img src="{{ asset('img/logo-kredo-new-sp.png') }}" alt="Kredo" class="mb-5 pb-5" style="max-width: 112px;">
                  <div class="card-actions pt-5 mt-5">
                    <a class="btn btn-link text-dark my-2" href="{{ route('login') }}">{{ __('すでにアカウントをお持ちですか？') }}</a>
                    <a class="btn btn-pill" href="{{ route('login') }}">{{ __('ログインする') }}</a>
                  </div>
                </div>
              </div>

              <div class="col-6 card-form-right pl-0">
                <div class="position-relative">

                  <div class="form-header">
                    <div class="step">
                      <div class="step-dot {{ $step == 1 ? 'is-active' : ''}}"></div>
                      <div class="step-dot {{ $step == 2 ? 'is-active' : ''}}"></div>
                    </div>
                    <div class="pt-4 text-center">
                      <h1 class="h5 font-weight-bold">新規登録
                        @if ($step == 1)
                          <span class="d-block h6 mt-2">基本情報</span>
                        @else
                          <span class="d-block h6 mt-2">その他</span>
                        @endif
                      </h1>
                    </div>
                  </div>

                  @if ($errors->any())
                    <div class="alert alert-danger pb-0">
                      <ul>
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

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

  <!-- Page level plugins -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <script src="{{ asset('js/admin.js') }}" async></script>
  <script src="{{ asset('js/register.js') }}"></script>

  <script>
    $('.js-datepicker').datepicker({
      format: 'yyyy-mm-dd',
    });
  </script>

  @yield('js')
</body>
</html>
