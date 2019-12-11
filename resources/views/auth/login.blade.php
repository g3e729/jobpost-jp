@extends('layouts.app')

@section('pageTitle', 'Login')

@section('content')
  @if(session()->has('message'))
    <div class="alert alert-success mr-5">{{ session()->get('message') }}</div>
  @endif

  <form class="form-login needs-validation pt-4 pb-3 pr-5 mb-3" method="POST" action="{{ route('login') }}">
    @csrf

    <input type="hidden" id="js-sidebar-state" name="sidebar-state" value="">

    <div class="form-group mb-4">
      <label for="email">
        <small>{{ __('メールアドレス') }}</small>
      </label>
      <input id="email" type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

      @error('email')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>

    <div class="form-group mt-3 mb-4">
      <label for="password">
        <small>{{ __('パスワード') }}</small>
      </label>
      <input id="password" type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

      @error('password')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>

    <div class="form-group row">
      <div class="col-md-6">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label class="form-check-label" for="remember">
          <small>{{ __('パスワードを記憶') }}</small>
        </label>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-6 pt-4 mt-1 mx-auto">
        <div class="card-actions text-center">
          <button type="submit" class="btn btn-capsule btn-rounded w-100">{{ __('ログイン') }}</button>
          @if (Route::has('password.request'))
          <a class="btn btn-link text-warning my-3 p-0" href="{{ route('password.request') }}">
            <small>{{ __('パスワードを忘れましたか？') }}</small>
          </a>
          @endif
        </div>
      </div>
    </div>

  </form>
@endsection

@section('js')
  <script>
    $inputSidebarState = document.querySelector('#js-sidebar-state')
    $inputSidebarState.value = localStorage.getItem("sidebar-state");
  </script>
@endsection
