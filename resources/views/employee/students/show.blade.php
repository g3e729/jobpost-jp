@extends('employee.layouts.default')

@section('pageTitle', "{$student->display_name}の情報")

@section('content')
  <div class="l-container">
    <div class="student-detail">
      <div class="student-detail-top py-4">
        <div class="shadow-sm card card-student-detail">
          <div class="card-body">
            <div class="card-actions text-right">
            </div>
            <div class="card-body-img text-center">
              <img src="{{ $student->avatar }}" class="avatar avatar-md">
            </div>
            <div class="card-body-main mt-3">
              <h3 class="text-center">{{ $student->display_name }}</h3>

              <div class="card-badges text-center h6">
                <span class="badge badge-pill badge-secondary">メールアドレス : {{ $student->email }}</span>
                <span class="badge badge-pill badge-secondary">コース : {{ $student->course }}</span>
                <span class="badge badge-pill badge-secondary">ステータス : {{ $student->student_status }}</span>
                <span class="badge badge-pill badge-secondary">英語 : {{ $student->english_level }}</span>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="student-detail-main pb-4">
        <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link alt-font active" id="pills-basic-tab" data-toggle="pill" href="#pills-basic" role="tab" aria-controls="pills-basic" aria-selected="true">基本情報</a>
          </li>
          <li class="nav-item">
            <a class="nav-link alt-font" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">プロフィール</a>
          </li>
          <li class="nav-item">
            <a class="nav-link alt-font" id="pills-skills-tab" data-toggle="pill" href="#pills-skills" role="tab" aria-controls="pills-skills" aria-selected="false">スキル</a>
          </li>
          <li class="nav-item">
            <a class="nav-link alt-font" id="pills-grades-tab" data-toggle="pill" href="#pills-grades" role="tab" aria-controls="pills-grades" aria-selected="false">成績</a>
          </li>
        </ul>
        <div class="tab-content my-4" id="pills-tabContent">

        @foreach([1, 2, 3, 4] as $step)
          @include('employee.students.partials.show' . $step)
        @endforeach

        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    const deleteButton = document.querySelector('#js-item-delete');
    const modalSubmit = document.querySelector('#js-modal-submit');
    const modal = document.querySelector('#js-delete-modal');
    let currTarget;

    deleteButton.addEventListener('click', function(event) {
      $(modal).modal('show');
      currTarget = event.currentTarget.getAttribute('form');

      event.preventDefault();
    });

    modalSubmit.addEventListener('click', function(event) {
      $(modal).modal('hide');
      document.querySelector(`#${currTarget}`).submit();
    });

  </script>
@endsection
