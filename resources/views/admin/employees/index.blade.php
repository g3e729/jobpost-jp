@extends('admin.layouts.default')

@section('content')
  <div class="l-container">
    @include('admin.employees.partials.search')
  </div>

  <hr class="content-divider d-block">

  <div class="l-container l-container-wide">
    <div class="row py-4">
      
      @foreach($employees as $employee)
      <div class="col-3 mb-4">
        <div class="shadow-sm card card-staff card-hover">
          <div class="card-body">
            <img src="{{-- {{ $employee->imageUrl(240, 240, 'people') }} --}}" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title">{{ $employee->name }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">アドミン</h6>
              <div class="card-actions">
                <a href="/staff/1" class="card-link">詳細</a>
                <a href="/staff/1/edit" class="card-link">編集</a>
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
                  <span class="text-muted">有給インターン</span>
                </li>
                
                <li class="list-group-item p-1">
                  <div class="font-weight-bold">生年月日</div>
                  <span class="text-muted">{{ $employee->birthday->format('Y-m-d') }}</span>
                </li>
                
                <li class="list-group-item p-1">
                  <div class="font-weight-bold">電話番号</div>
                  <span class="text-muted">{{ $employee->contact_number }}</span>
                </li>
                
                <li class="list-group-item p-1">
                  <div class="font-weight-bold">雇用期間</div>
                  <span class="text-muted">2020年03月20日 ~ 2020年03月20日</span>
                </li>
                
              </ul>
              
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>

  @include('admin.partials.pagination', ['data' => $employees])
@endsection