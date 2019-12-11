@extends('layouts.app')

@section('pageTitle', 'Reset Password')

@section('content')
  <form class="form-login needs-validation pt-4 pb-3 pr-5 mb-3" method="POST" action="{{ route('password.update') }}">
    @csrf
    {{ method_field('PATCH') }}

    <input type="hidden" name="email" value="{{ $password_reset->email }}">
    <input type="hidden" name="token" value="{{ $password_reset->token }}">

    <div class="form-group mb-4">
      <label for="password">
        <small>{{ __('パスワード') }}</small>
      </label>
      <input id="password" type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

      @error('password')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>

    <div class="form-group mt-3 mb-4">
      <label for="password-confirm">{{ __('パスワードを認証する') }}</label>
      <input id="password-confirm" type="password" class="form-control rounded-0" name="password_confirmation" required autocomplete="new-password">
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
