@extends('layouts.app')

@section('pageTitle', 'Forgot Password')

@section('content')
  <div class="card-success pt-5 mt-5 ml-n5">
    <img src="{{ asset('img/request-success-icon.png') }}" class="card-img-top d-block mx-auto" alt="" style="max-width: 70px;">
    <div class="card-body mt-2">
      <h5 class="card-title text-center h6 mb-0">メールを送信しました</h5>
    </div>

    <div class="card-actions text-center">
      <a class="btn btn-link text-warning my-3 p-0" href="{{ route('login') }}">
        <small>{{ __('ログインページに戻る') }}</small>
      </a>
    </div>
  </div>
@endsection
