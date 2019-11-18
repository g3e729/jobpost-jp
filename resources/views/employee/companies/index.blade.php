@extends('employee.layouts.default')

@section('pageTitle', '企業')

@section('content')
  <div class="l-container">
    @include('employee.companies.partials.search')
  </div>

  <hr class="content-divider d-block">

  <div class="l-container l-container-wide">

    @if (! $companies->count())
      <p class="text-center">No results</p>
    @endif

    <div class="row py-4">

      @foreach($companies as $company)
        <div class="col-3 mb-4">
          <div class="shadow-sm card card-company card-hover">
            <div class="card-body">
              <img src="{{ $company->avatar }}" class="card-image float-left rounded-circle">
              <div class="card-body-top">
                <h5 class="card-title h6">{{ $company->company_name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $company->industry ?? '--' }}</h6>
                <div class="card-actions">
                  <a href="{{ route('employee.companies.show', $company) }}" class="card-link">詳細</a>
                </div>
              </div>
              <div class="card-body-main mt-2">

                <ul class="list-group list-group-flush">

                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">メールアドレス</div>
                    <span class="text-muted">{{ $company->email ?? '--' }}</span>
                  </li>

                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">HP</div>
                    <span class="text-muted">
                      <a href="{{ $company->homepage ?? '#' }}" target="_blank">{{ $company->homepage ?? '--' }}</a>
                    </span>
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

  @if ($companies->count())
  @include('employee.partials.pagination', ['data' => $companies])
  @endif
@endsection
