@extends('employee.layouts.default')

@section('pageTitle', '生徒')

@section('content')
  <div class="l-container">
    @include('employee.students.partials.search')
  </div>

  <hr class="content-divider d-block">

  <div class="l-container l-container-wide">

    @if (! $students->count())
      <p class="text-center">No results</p>
    @endif

    <div class="row py-4">

      @foreach($students as $student)
        <div class="col-3 mb-4">
          <div class="shadow-sm card card-student card-hover">
            <div class="card-body">
              <img src="{{ $student->avatar }}" class="card-image float-left rounded-circle">
              <div class="card-body-top">
                <h5 class="card-title">{{ $student->display_name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $student->student_status ?? '--' }}</h6>
                <div class="card-actions">
                  <a href="{{ route('employee.students.show', $student) }}" class="card-link">詳細</a>
                </div>
              </div>
              <div class="card-body-main mt-2">

                <ul class="list-group list-group-flush">

                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">メールアドレス</div>
                    <span class="text-muted">{{ $student->email }}</span>
                  </li>

                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">入学日{{ $student->graduation_date ? ' - 卒業日' : null }}</div>
                    <span class="text-muted">
                      {{ $student->enrollment_date->format('Y年m月d日') }}<br>
                      {{ $student->graduation_date->format('Y年m月d日') }}
                    </span>
                  </li>

                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">コース</div>
                    <span class="text-muted">{{ $student->course ?? '--' }}</span>
                  </li>

                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">英語</div>
                    <span class="text-muted">{{ $student->english_level ?? '--' }}</span>
                  </li>

                </ul>

              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>

  @if ($students->count())
  @include('employee.partials.pagination', ['data' => $students])
  @endif
@endsection
