@extends('admin.layouts.default')

@section('pageTitle', 'スタッフ')

@section('content')
  <div class="l-container">
    @include('admin.employees.partials.search')
  </div>

  <hr class="content-divider d-block">

  <div class="l-container l-container-wide">

    @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
      </div>
    @endif

    @if (! $employees->count())
      <p class="text-center">No results</p>
    @endif

    <div class="row py-4">
      
      @foreach($employees as $employee)
        <div class="col-3 mb-4">
          <div class="shadow-sm card card-staff card-hover">
            <div class="card-body">
              <img src="{{ $employee->avatar }}" class="card-image float-left rounded-circle">
              <div class="card-body-top">
                <h5 class="card-title">{{ $employee->display_name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $employee->position ?? '--' }}</h6>
                <div class="card-actions">
                  <a href="{{ route('admin.employees.show', $employee) }}" class="card-link">詳細</a>
                  <a href="{{ route('admin.employees.edit', $employee) }}" class="card-link">編集</a>
                </div>
              </div>
              <div class="card-body-main mt-2">
                
                <ul class="list-group list-group-flush">
                  
                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">メールアドレス</div>
                    <span class="text-muted">{{ $employee->email }}</span>
                  </li>
                  
                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">ステータス</div>
                    <span class="text-muted">{{ $employee->employment_status }}</span>
                  </li>
                  
                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">生年月日</div>
                    <span class="text-muted">{{ $employee->birthday->format('Y-m-d') }}</span>
                  </li>
                  
                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">電話番号</div>
                    <span class="text-muted">{{ $employee->contact_number }}</span>
                  </li>
                  
                </ul>
                
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>

  @if ($employees->count())
  @include('admin.partials.pagination', ['data' => $employees])
  @endif
@endsection