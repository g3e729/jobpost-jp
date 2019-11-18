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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>

  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

  <script> document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>
</head>

<body id="js-page-top" {{ session('sidebarState') ? 'class=sidebar-toggled' : null }}>
  <div id="wrapper">
    @include('admin.partials.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @include('admin.partials.nav')
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Scroll to Top Button-->
  <a id="js-scroll-top" class="scroll-top rounded" href="#js-page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="js-logout-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="alt-font btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
            <button class="alt-font btn btn-primary" type="submit" href="login.html">ログアウト</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

  <!-- Page level plugins -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <script src="{{ asset('js/admin.js') }}" async></script>

  <script>
    $('.js-datepicker').datepicker({
      format: 'yyyy-mm-dd',
    });
  </script>

  @yield('js')
</body>
</html>
