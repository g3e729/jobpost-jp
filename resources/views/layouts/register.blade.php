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
  <title>Kredo Admin</title>
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

<link rel="shortcut icon" href="/assets/images/common/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="/assets/images/common/apple-touch-icon-precomposed.png">

<!-- Custom fonts for this template-->
<link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho|Noto+Sans+JP&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<script> document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>

</head>
<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card card-form ox-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-6 card-form-left d-block bg-form-image" style="background-image: url('https://source.unsplash.com/OqtafYT5kTw/600x800');"></div>
              <div class="col-6 card-form-right">
                <div class="position-relative">
                  @yield('content')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

  <!-- Page level plugins -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <script src="{{ asset('js/app.js') }}" async></script>

  @yield('js')
</body>
</html>