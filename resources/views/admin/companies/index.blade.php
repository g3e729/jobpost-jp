@extends('admin.layouts.default')

@section('content')
  <div class="l-container">
    @include('admin.companies.partials.search')
  </div>

  <hr class="content-divider d-block">

  <div class="l-container l-container-wide">
    <div class="row py-4">
      
      @for($i = 0; $i < rand(6, 12); $i++)
        <div class="col-3 mb-4">
        <div class="shadow-sm card card-company card-hover">
          <div class="card-body">
            <img src="{{ $faker->imageUrl(240, 240, 'city') }}" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title h6">{{ $faker->company . ' ' . $faker->companySuffix }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">IT</h6>
              <div class="card-actions">
                <a href="{{ route('admin.companies.show', $i) }}" class="card-link">詳細</a>
                <a href="{{ route('admin.companies.edit', $i) }}" class="card-link">編集</a>
              </div>
            </div>
            <div class="card-body-main mt-2">

              <ul class="list-group list-group-flush">

                <li class="list-group-item p-1">
                  <div class="font-weight-bold">メールアドレス</div>
                  <span class="text-muted">{{ $faker->email }}</span>
                </li>

                <li class="list-group-item p-1">
                  <div class="font-weight-bold">プラン</div>
                  <span class="text-muted">{{ Str::random(1) }}</span>
                </li>

                <li class="list-group-item p-1">
                  <div class="font-weight-bold">HP</div>
                  <span class="text-muted">{{ $faker->url }}</span>
                </li>

                <li class="list-group-item p-1">
                  <div class="font-weight-bold">電話番号</div>
                  <span class="text-muted">{{ $faker->phoneNumber }}</span>
                </li>

                <li class="list-group-item p-1">
                  <div class="font-weight-bold">創業者</div>
                  <span class="text-muted">{{ $faker->name }}</span>
                </li>

              </ul>

            </div>
          </div>
        </div>
        </div>
      @endfor
      
    </div>
  </div>

  @include('admin.partials.pagination')
@endsection