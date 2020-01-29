@extends('admin.layouts.default')

@section('pageTitle', '募集')

@section('content')
  <div class="l-container">
    @include('admin.job_posts.partials.search')
  </div>

  <hr class="content-divider d-block">

  @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session()->get('success') }}
    </div>
  @endif

  <div class="l-container l-container-wide py-4">
    <table id="js-sortable" class="table table-striped table-hover">
      <thead>
        <tr>
          <th width="250px">求人</th>
          <th>ポジション</th>
          <th>プログラミング言語</th>
          <th>フレームワーク</th>
          <th>地域</th>
          <th>年収</th>
        </tr>
      </thead>
      <tbody>
        @foreach($job_posts as $job_post)
        <tr>
          <td class="d-flex">
            <img src="{{ '#' }}" alt="" style="max-width: 100px;">
            <div class="ml-2 w-100">
              <h3 class="font-weight-bold h6">{{ $job_post->company->company_name }}</h3>
              <p class="small text-muted mb-0">{{ $job_post->title }}</p>
              <div class="d-flex justify-content-between">
                <a href="{{ route('admin.recruitments.show', $job_post) }}" class="btn btn-link p-0">詳細</a>
              </div>
            </div>
          </td>
          <td>{{ $job_post->position }}</td>
          <td>{{ $job_post->programming_language }}</td>
          <td>{{ $job_post->framework }}</td>
          <td>
            <a href="#">
              {{ $job_post->prefecture ? getPrefecture($job_post->prefecture) : '--' }}
            </a>
          </td>
          <td>{{ $job_post->salary }}</td>
        </tr>
        @endforeach
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
