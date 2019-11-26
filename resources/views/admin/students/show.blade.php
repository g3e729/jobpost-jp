@extends('admin.layouts.default')

@section('pageTitle', "{$student->display_name}の情報")

@section('content')
  <div class="l-container">
    <div class="student-detail">
      <div class="student-detail-top py-4">
        <div class="shadow-sm card card-student-detail">
          <div class="card-body">
            <div class="card-actions text-right">
              <a href="{{ route('admin.students.edit', $student) }}" class="card-link">詳細</a>
              <a href="{{ route('admin.messages.show', [$student, 'type' => 'student']) }}" class="card-link">メッセージ</a>
              <button id="js-item-delete" type="submit" form="deleteForm" class="btn btn-link text-decoration-none text-muted">削除</button>
              <form id="deleteForm" method="POST" action="{{ route('admin.students.destroy', $student) }}" novalidate style="visibility: hidden; position: absolute;">
                @csrf
                {{ method_field('DELETE') }}

                <button type="submit">削除</button>
              </form>
            </div>
            <div class="card-body-img text-center">
              <img src="{{ $student->avatar }}" class="avatar avatar-md">
            </div>
            <div class="card-body-main mt-3">
              <h3 class="text-center">{{ $student->display_name }}</h3>

              <div class="card-badges text-center h6">
                <span class="badge badge-pill badge-secondary">メールアドレス : {{ $student->email }}</span>
                <a href="{{ route('admin.students.index', ['course_id' => $student->course_id]) }}"><span class="badge badge-pill badge-secondary">コース : {{ $student->course }}</span></a>
                <span class="badge badge-pill badge-secondary">ステータス : {{ $student->student_status }}</span>
                <a href="{{ route('admin.students.index', ['english_level_id' => $student->english_level_id]) }}"><span class="badge badge-pill badge-secondary">英語 : {{ $student->english_level }}</span></a>
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
          @include('admin.students.partials.show' . $step)
        @endforeach

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="js-delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">削除</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          この生徒を削除してもよろしいですか？
        </div>
        <div class="modal-footer">
          <button type="button" class="alt-font btn btn-secondary" data-dismiss="modal">キャンセル</button>
          <button id="js-modal-submit" type="button" class="alt-font btn btn-primary">確認する</button>
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
