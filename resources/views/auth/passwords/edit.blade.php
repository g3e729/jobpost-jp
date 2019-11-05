@extends('layouts.app')

@section('pageTitle', 'Reset Password')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
      <div class="card-header">{{ __('パスワードを再設定する') }}</div>

      <div class="card-body">

        <form method="POST" action="{{ route('password.update') }}">
          @csrf
          {{ method_field('PATCH') }}

          <input type="hidden" name="email" value="{{ $password_reset->email }}">
          <input type="hidden" name="token" value="{{ $password_reset->token }}">

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

              @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワードを認証する') }}</label>

            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="alt-font btn btn-primary">{{ __('パスワードを再設定する') }}</button>
            </div>
          </div>
        </form>

      </div>
      </div>
    </div>
  </div>
</div>
@endsection
