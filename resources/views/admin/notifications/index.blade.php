@extends('admin.layouts.default')

@section('pageTitle', 'Notifications')

@section('content')
  <div class="l-container">
    @include('admin.notifications.partials.search')
  </div>

  <hr class="content-divider d-block">

  <div class="l-container l-container-narrow py-4">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th width="50%">お知らせ</th>
          <th>日付</th>
        </tr>
      </thead>
      <tbody>
        @for($i = 0; $i < 10; $i++)
        <tr>
          <td>
            <a href="{{ route('admin.notifications.show', $i) }}">{{ $faker->realText(30) }}</a>
          </td>
          <td>{{ $faker->dateTime->format('Y-m-d') }}</td>
        </tr>
        @endfor
      </tbody>
    </table>
  </div>

  @include('admin.partials.pagination', ['data' => collect()])
@endsection
