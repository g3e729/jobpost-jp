@extends('admin.layouts.default')

@section('content')
  <div class="l-container">
    <div class="payments py-2">
      <div class="payments-top py-4">
        <h2 class="text-center alt-font">入金確認</h2>
      </div>

      <div class="payments-bottom pb-4">
        <ul class="nav nav-pills nav-justified w-50 mx-auto mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link alt-font active" id="pills-unconfirmed-tab" data-toggle="pill" href="#pills-unconfirmed" role="tab" aria-controls="pills-unconfirmed" aria-selected="true">未確認</a>
          </li>
          <li class="nav-item">
            <a class="nav-link alt-font" id="pills-verified-tab" data-toggle="pill" href="#pills-verified" role="tab" aria-controls="pills-verified" aria-selected="false">確認済み</a>
          </li>
        </ul>
        <div class="tab-content my-4" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-unconfirmed" role="tabpanel" aria-labelledby="pills-unconfirmed-tab">
            <table class="table table-striped table-hover js-sortable">
              <thead>
                <tr>
                  <th width="450px">アカウント</th>
                  <th>価格</th>
                  <th width="90px">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @for($i = 0; $i < 10; $i++)
                <tr>
                  <td class="d-flex">
                    <img src="{{ $faker->imageUrl(240, 240, 'city') }}" class="card-image float-left rounded-circle" style="max-width: 64px;">
                    <div class="ml-3">
                      <h3 class="font-weight-bold h6">{{ $faker->company . ' ' . $faker->companySuffix }}</h3>
                      <p class="text-muted mb-0">{{ $faker->text(50) }}</p>
                      <time>{{ $faker->dateTime->format('Y-m-d') }}</time>
                    </div>
                  </td>
                  <td>{{ $faker->randomElement($array = array ('1', '2', '3', '4')) . '0,0000円' }}</td>
                  <td>
                    <div class="payment-actions d-flex justify-content-between">
                      <a href="{{ route('admin.payments.show', $i) }}" class="btn btn-link p-0">詳細</a>
                      <a href="{{ route('admin.payments.delete', $i) }}" class="btn btn-link p-0">削除</a>
                    </div>
                  </td>
                </tr>
                @endfor
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="pills-verified" role="tabpanel" aria-labelledby="pills-verified-tab">
            <table class="table table-striped table-hover js-sortable">
              <thead>
                <tr>
                  <th width="450px">アカウント</th>
                  <th>価格</th>
                  <th width="90px">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @for($i = 0; $i < 10; $i++)
                <tr>
                  <td class="d-flex">
                    <img src="{{ $faker->imageUrl(240, 240, 'city') }}" class="card-image float-left rounded-circle" style="max-width: 64px;">
                    <div class="ml-3">
                      <h3 class="font-weight-bold h6">{{ $faker->company . ' ' . $faker->companySuffix }}</h3>
                      <p class="text-muted mb-0">{{ $faker->text(50) }}</p>
                      <time>{{ $faker->dateTime->format('Y-m-d') }}</time>
                    </div>
                  </td>
                  <td>{{ $faker->randomElement($array = array ('1', '2', '3', '4')) . '0,0000円' }}</td>
                  <td>
                    <div class="payment-actions d-flex justify-content-between">
                      <a href="{{ route('admin.payments.show', $i) }}" class="btn btn-link p-0">詳細</a>
                    </div>
                  </td>
                </tr>
                @endfor
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('admin.partials.pagination')
@endsection

@section('js')
  <script>
    const sortTables = document.querySelectorAll('.js-sortable');

    sortTables.forEach((sortTable) => {
      $(sortTable).DataTable({
        info: false,
        order: [[ 0, "asc" ]],
        paging: false,
        searching: false,
        columnDefs: [
          { targets: [2], orderable: false }
        ],
      });
    });
  </script>
@endsection