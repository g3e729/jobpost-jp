@extends('admin.layouts.default')

@section('pageTitle', "{$student->display_name}の情報を編集する")

@section('content')
  <div class="l-container">
    @if (in_array($step, ['1', '2', '3', '4']))
      <div class="student-detail">
        <div class="student-detail-top py-4">
          <div class="shadow-sm card card-student-detail">
            <div class="card-body">
              <div class="card-actions text-right">
                <a href="{{ route('admin.students.show', $student) }}" class="card-link">
                  <i class="fas fa-chevron-circle-left"></i> Back
                </a>
                <a href="{{ route('admin.messages.show', [$student, 'type' => 'student']) }}" class="card-link mr-4">メッセージ</a>
                <button type="submit" form="editForm" class="alt-font btn btn-primary btn-submit">更新する</button>
              </div>
              <div class="card-body-img text-center">
                <img src="{{ $student->avatar }}" class="avatar avatar-md">
              </div>
              <div class="card-body-main mt-3">
                <h3 class="text-center">{{ $student->display_name }}</h3>


              </div>
            </div>
          </div>
        </div>
        <div class="student-detail-main pb-4">
          <ul class="nav nav-pills nav-justified mb-3">
            <li class="nav-item">
              <a href="{{ route('admin.students.edit', [$student]) }}" class="nav-link alt-font {{ $step == 1 ? 'active' : null }}">基本情報</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.students.edit', [$student, 'step' => '2']) }}" class="nav-link alt-font  {{ $step == 2 ? 'active' : null }}">プロフィール</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.students.edit', [$student, 'step' => '3']) }}" class="nav-link alt-font  {{ $step == 3 ? 'active' : null }}">スキル</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.students.edit', [$student, 'step' => '4']) }}" class="nav-link alt-font  {{ $step == 4 ? 'active' : null }}">成績</a>
            </li>
          </ul>

          @if ($errors->any())
            <div class="alert alert-danger pb-0">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          @include('admin.students.partials.edit' . $step)

        </div>
      </div>
    @else
      <div class="row py-4">
      @include('admin.partials.notfound')
      </div>
    @endif

  </div>
@endsection

@section('js')
  <script src="{{ asset('js/register.js') }}"></script>
  <script src="{{ asset('js/editform.js') }}"></script>
  <script>
    $('.js-monthpicker').datepicker({
      format: 'yyyy-mm',
      viewMode: 'months',
      minViewMode: 'months',
    });
  </script>
@endsection
