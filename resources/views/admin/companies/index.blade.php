@extends('admin.layouts.default')

@section('content')
  <div class="l-container">
    @include('admin.companies.partials.search')
  </div>

  <hr class="content-divider d-block">

  <div class="l-container l-container-wide">
    <div class="row py-4">

      @if (! $companies->count())
        <p>No result.</p>
      @endif
      
      @foreach($companies as $company)
        <div class="col-3 mb-4">
        <div class="shadow-sm card card-company card-hover">
          <div class="card-body">
            <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title h6">{{ $company->company_name }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $company->industry ?? '--' }}</h6>
              <div class="card-actions">
                <a href="{{ route('admin.companies.show', $company) }}" class="card-link">詳細</a>
                <a href="{{ route('admin.companies.edit', $company) }}" class="card-link">編集</a>
              </div>
            </div>
            <div class="card-body-main mt-2">

              <ul class="list-group list-group-flush">

                <li class="list-group-item p-1">
                  <div class="font-weight-bold">メールアドレス</div>
                  <span class="text-muted">{{ $company->email ?? '--' }}</span>
                </li>

                <li class="list-group-item p-1">
                  <div class="font-weight-bold">プラン</div>
                  <span class="text-muted">{{ $company->plan ?? '--' }}</span>
                </li>

                <li class="list-group-item p-1">
                  <div class="font-weight-bold">HP</div>
                  <span class="text-muted">{{ $company->url ?? '--' }}</span>
                </li>

                <li class="list-group-item p-1">
                  <div class="font-weight-bold">電話番号</div>
                  <span class="text-muted">{{ $company->contact_number ?? '--' }}</span>
                </li>

                <li class="list-group-item p-1">
                  <div class="font-weight-bold">創業者</div>
                  <span class="text-muted">{{ $company->ceo ?? '--' }}</span>
                </li>

              </ul>

            </div>
          </div>
        </div>
        </div>
      @endforeach
      
    </div>
  </div>

  @include('admin.partials.pagination', ['data' => $companies])
@endsection