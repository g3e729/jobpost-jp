@extends('layouts.app')

@section('pageTitle', 'Login')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if(session()->has('message'))
        <div class="alert alert-success">{{ session()->get('message') }}</div>
      @endif

      <div class="card">
        <div class="card-header">{{ __('ログインする') }}</div>

        <div class="card-body">

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label font-weight-bold text-md-right">{{ __('メールアドレス') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                  <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label font-weight-bold text-md-right">{{ __('パスワード') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                  <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">{{ __('私を覚えてますか') }}</label>
                </div>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="alt-font btn btn-primary btn-submit w-50">{{ __('ログインする') }}</button>
              </div>
            </div>

            @if (Route::has('password.request'))
              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4 mt-3">
                  <a class="alt-font btn btn-link" href="{{ route('password.request') }}">{{ __('パスワードをお忘れですか？') }}</a>
                </div>
              </div>
            @endif

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
