@extends('admin.layouts.default')

@section('pageTitle', "{$company->display_name}の情報を編集する")

@section('content')
  <div class="l-container">
    @if(in_array($step, [1, 2]))
      <div class="company-detail">
        <div class="company-detail-top py-4">
            <div class="shadow-sm card card-company-detail">
              <div class="card-body">
                <div class="card-body-img text-center">
                  <img src="{{ $company->avatar }}" class="avatar avatar-md">
                </div>
                <div class="card-body-main mt-3">
                  <h3 class="text-center">{{ $company->display_name }}</h3>

                  <div class="card-actions card-actions-right position-absolute">
                    <a href="{{ route('admin.companies.show', $company) }}" class="card-link mr-3">
                      <i class="fas fa-chevron-circle-left"></i> Back
                    </a>

                    <button type="submit" form="editForm" class="alt-font btn btn-primary btn-submit">更新する</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="company-detail-main pb-4">

          <ul class="nav nav-pills nav-justified mb-3">
            <li class="nav-item">
              <a href="{{ route('admin.companies.edit', [$company]) }}" class="nav-link alt-font {{ $step == 1 ? 'active' : null }}">基本情報</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.companies.edit', [$company, 'step' => '2']) }}" class="nav-link alt-font  {{ $step == 2 ? 'active' : null }}">プロフィール</a>
            </li>
          </ul>

          @if ($errors->any())
            <div class="alert alert-danger pb-0">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          
          @include('admin.companies.partials.step' . $step)

        </div>
      </div>
    @else
      <div class="row py-4">
      @include('admin.partials.notfound')
      </div>
    @endif
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/register.js') }}"></script>
  <script src="{{ asset('js/editform.js') }}"></script>
@endsection