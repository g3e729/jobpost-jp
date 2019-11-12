@extends('admin.layouts.default')

@section('pageTitle', '募集')

@section('content')
  <div class="l-container">
    @include('admin.posts.partials.search')
  </div>

  <hr class="content-divider d-block">

  <div class="l-container l-container-wide py-4">
    <table id="js-sortable" class="table table-striped table-hover">
      <thead>
        <tr>
          <th width="250px">求人</th>
          <th>ポジション</th>
          <th>言語</th>
          <th>フレームワーク</th>
          <th>エリア</th>
          <th>年収</th>
        </tr>
      </thead>
      <tbody>
        @for($i = 0; $i < 10; $i++)
        <tr>
          <td class="d-flex">
            <img src="{{ $faker->imageUrl(240, 240, 'city') }}" alt="" style="max-width: 100px;">
            <div class="ml-2 w-100">
              <h3 class="font-weight-bold h6">{{ $faker->company . ' ' . $faker->companySuffix }}</h3>
              <p class="small text-muted mb-0">自社★C2Cマッチングプラット</p>
              <div class="d-flex justify-content-between">
                <p class="small mt-1">フォーム開発</p>
                <a href="{{ route('admin.recruitments.show', $i) }}" class="btn btn-link p-0">詳細</a>
              </div>
            </div>
          </td>
          <td>{{ $faker->randomElement($array = array ('バックエンド', 'フロントエンド', 'フルスタック')) }}</td>
          <td>{{ $faker->randomElement($array = array ('PHP', 'Node', 'Python')) }}</td>
          <td>{{ $faker->randomElement($array = array ('Laravel', 'Egg', 'Django')) }}</td>
          <td>東京</td>
          <td>{{ $faker->numberBetween($min = 10, $max = 999) }}万円</td>
        </tr>
        @endfor
      </tbody>
    </table>
  </div>

  @include('admin.partials.pagination', ['data' => collect()])
@endsection

@section('js')
  <script>
    const sortTable = document.querySelector('#js-sortable');

    $(sortTable).DataTable({
      info: false,
      order: [[ 0, "asc" ]],
      paging: false,
      searching: false,
      stateSave: true
    });
  </script>
@endsection