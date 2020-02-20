@extends('layouts.app')

@section('pageTitle', 'Reset Password')

@section('content')
  <form class="form-login needs-validation pt-4 pb-3 pr-5 mb-3" method="POST" action="{{ route('password.update') }}">
    @csrf
    {{ method_field('PATCH') }}

    <input type="hidden" name="email" value="{{ $password_reset->email }}">
    <input type="hidden" name="token" value="{{ $password_reset->token }}">

    <div class="form-group mb-4 js-password-group">
      <label for="password">
        <small>{{ __('パスワード') }}</small>
      </label>
      <div class="input-group">
        <input id="password" type="password" class="form-control rounded-0 @error('password') is-invalid @enderror border-right-0" name="password" required autocomplete="new-password">
        <div class="input-group-append input-group-icon">
          <div class="input-group-text border-left-0 rounded-0">
          <button class="btn btn-sm btn-link js-reveal-password" type="button">
            <i class="fas fa-eye text-dark"></i>
          </button>
          </div>
        </div>
      </div>

      @error('password')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>

    <div class="form-group mt-3 mb-4 js-password-group">
      <label for="password-confirm">{{ __('パスワードを認証する') }}</label>
      <div class="input-group">
        <input id="password-confirm" type="password" class="form-control rounded-0 border-right-0" name="password_confirmation" required autocomplete="new-password">
        <div class="input-group-append input-group-icon">
          <div class="input-group-text border-left-0 rounded-0">
          <button class="btn btn-sm btn-link js-reveal-password" type="button">
            <i class="fas fa-eye text-dark"></i>
          </button>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-6 pt-4 mt-1 mx-auto">
        <div class="card-actions text-center">
          <button type="submit" class="btn btn-capsule btn-rounded w-100">{{ __('更新') }}</button>
          <a class="btn btn-link text-warning my-3 p-0" href="{{ route('login') }}">
            <small>{{ __('ログイン') }}</small>
          </a>
        </div>
      </div>
    </div>

  </form>
@endsection
