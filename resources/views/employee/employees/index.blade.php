@extends('employee.layouts.default')

@section('pageTitle', 'スタッフ')

@section('content')
  <div class="l-container">
    @include('employee.employees.partials.search')
  </div>

  <hr class="content-divider d-block">

  <div class="l-container l-container-wide">

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
                  <a href="{{ route('employee.employees.show', $employee) }}" class="card-link">詳細</a>
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
                    <span class="text-muted">{{ $employee->birthday->format('Y年m月d日') }}</span>
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
  @include('employee.partials.pagination', ['data' => $employees])
  @endif
@endsection