<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#000000">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="account" content="{{ session()->get('account') }}">
    <meta name="api-token" content="{{ session()->get('api_token') }}">
    <title>Kredo</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/common/apple-touch-icon-precomposed.png">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <noscript>
      You need to enable JavaScript to run this app.
    </noscript>
    <div id="root"></div>
    <form id="js-logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>

    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
