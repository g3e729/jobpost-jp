@extends('admin.layouts.default')

@section('pageTitle', 'Notifications')

@section('content')
  <div class="l-container">
    @include('admin.notifications.partials.search')
  </div>

  <hr class="content-divider d-block">

  <div class="l-container l-container-narrow py-4">

    @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
      </div>
    @endif

    @if (! $notifications->count())
      <p class="text-center">No results</p>
    @else
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th width="50%">お知らせ</th>
            <th>日付</th>
          </tr>
        </thead>
        <tbody>
          @foreach($notifications as $notification)
          <tr>
            <td>
              <a href="{{ route('admin.notifications.show', $notification) }}">{{ $notification->title }}</a>
            </td>
            <td>{{ $notification->published_at->format('Y年m月d日') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>

  @include('admin.partials.pagination', ['data' => collect()])
@endsection
