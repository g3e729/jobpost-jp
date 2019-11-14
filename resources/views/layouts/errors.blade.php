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
  <title>@yield('pageTitle') - {{ config('app.name') }}</title>
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

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <script> document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>
</head>

<body>
  <div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
	    <div class="row p-5" style="background: #fff">
        <div class="col-md-12 text-center">
          <img src="{{ asset('img/logo-kredo-new-sp.png') }}" alt="Kredo" class="mt-5 mb-3 w-100" style="max-width: 404px;">
          @yield('content')
        </div>
	    </div>
      </div>
    </div>
  </div>
</body>
</html>
