@extends('layouts.app')

@section('pageTitle', 'Forgot Password')

@section('content')
  @if (session()->has('success'))
    <div class="alert alert-success mr-5" role="alert">
      {{ session()->get('success') }}
    </div>
  @endif

  <form class="form-login needs-validation pt-4 pb-3 pr-5 mb-3" method="POST" action="{{ route('password.request') }}">
    @csrf

    <div class="form-group my-4">
      <label for="email">
        <small>{!! __('パスワードの再設定<br>
          アカウントの登録メールアドレスをご入力ください。<br>
          パスワードリセット用のリンクをメールでお送りします。')
        !!}</small>
      </label>
      <input id="email" type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

      @error('email')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>

    <div class="form-group row">
      <div class="col-6 pt-4 mt-1 mx-auto">
        <div class="card-actions text-center">
          <button type="submit" class="btn btn-capsule btn-rounded w-100">{{ __('送信')}}</button>
          <a class="btn btn-link text-warning my-3 p-0" href="{{ route('login') }}">
            <small>{{ __('ログイン') }}</small>
          </a>
        </div>
      </div>
    </div>

  </form>
@endsection
