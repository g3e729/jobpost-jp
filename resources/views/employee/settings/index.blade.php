@extends('employee.layouts.default')

@section('pageTitle', "情報を編集する")

@section('content')
  <div class="l-container">
    <div class="employee-detail">

      <div class="employee-detail-main pb-4">

        @if ($errors->any())
          <div class="alert alert-danger pb-0">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

      	@if(session()->has('message'))
      		<div class="alert alert-success">{{ session()->get('message') }}</div>
      	@endif

        <form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="{{ route('employee.settings.store') }}" enctype="multipart/form-data" novalidate>
          @csrf

          <input type="hidden" name="type" value="avatar">
          <div class="form-group pb-3 row">
            <label for="formAvatar" class="col-3 col-form-label font-weight-bold">アバター</label>
            <div class="col-9" data-group="avatar">
              <div class="pb-3 d-inline-flex flex-column align-items-center">
                <img data-avatar="preview" class="avatar avatar-md border border-secondary mb-3" src="{{ $profile->avatar ?? 'https://placehold.it/80x80' }}">
              </div>

              <input data-avatar="file" type="file" class="form-control-file" id="formAvatar" name="avatar"
                accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
              <div class="input-group">
                <input data-avatar="name" type="text" class="form-control" value="{{ $profile->avatar ?? null }}"
                  disabled required>
                <div class="input-group-append">
                  <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
                </div>
                <div class="invalid-tooltip">
                  Please choose your avatar.
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-6 py-4 mx-auto">
              <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
            </div>
          </div>
        </form>

        <hr>

        <form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="{{ route('employee.settings.store') }}" novalidate>
          @csrf

          <input type="hidden" name="type" value="password">
  	      <div class="form-group pb-3 row">
  	        <label for="formPassword" class="col-4 col-form-label font-weight-bold">パスワード</label>
  	        <div class="col-8">
  	          <input type="password" class="form-control" id="formPassword" name="password" placeholder="" required>
  	          <div class="invalid-tooltip">
  	            Please enter a password.
  	          </div>
  	        </div>
  	      </div>

  	      <div class="form-group pb-3 row">
  	        <label for="formPasswordConfirmation" class="col-4 col-form-label font-weight-bold">パスワードの確認</label>
  	        <div class="col-8">
  	          <input type="password" class="form-control" id="formPasswordConfirmation" name="password_confirmation" placeholder="" required
  	            data-action="input" data-condition="password" data-text="Passwords do not match."
  	          >
  	          <div class="invalid-tooltip">
  	            Passwords do not match.
  	          </div>
  	        </div>
  	      </div>

          <div class="form-group row">
            <div class="col-6 py-4 mx-auto">
              <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/register.js') }}"></script>
  <script src="{{ asset('js/editform.js') }}"></script>
@endsection
