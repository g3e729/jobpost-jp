@extends('admin.layouts.default')

@section('pageTitle', "Edit {$student->display_name}")

@php
$stepsArr = array('1', '2', '3', '4');
@endphp

@section('content')
  <div class="l-container">
    @if (in_array($step, $stepsArr))
    <div class="student-detail">
      <div class="student-detail-top py-4">
        <div class="shadow-sm card card-student-detail">
          <div class="card-body">
            <div class="card-body-img text-center">
              <img src="{{ $student->avatar }}" class="avatar avatar-md">
            </div>
            <div class="card-body-main mt-3">
              <h3 class="text-center">{{ $student->display_name }}</h3>

              <div class="card-actions card-actions-right position-absolute">
                <a href="{{ route('admin.students.show', $student) }}" class="card-link mr-3">
                  <i class="fas fa-chevron-circle-left"></i> Back
                </a>
                <a href="{{ route('admin.messages.show', $student) }}" class="card-link ml-0 mr-3">メッセージ</a>
                <button type="submit" form="editForm" class="alt-font btn btn-primary btn-submit">更新する</button>
              </div>

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

        @if ($step == 1)
          <form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="" novalidate>
            @csrf
            <div class="form-group pb-3 row">
              <label for="formJapaneseName" class="col-3 col-form-label font-weight-bold">名前(Japanese)</label>
              <div class="col-9">
                <input type="text" class="form-control" id="formJapaneseName" name="japanese_name" value="{{ $student->japanese_name }}" placeholder="" required>
                <div class="invalid-tooltip">
                  Please enter Japanese name. 
                </div>
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formName" class="col-3 col-form-label font-weight-bold">名前(English)</label>
              <div class="col-9">
                <input type="text" class="form-control" id="formName" name="name" value="{{ $student->name }}" placeholder="" required>
                <div class="invalid-tooltip">
                  Please enter English name.
                </div>
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formBirthday" class="col-3 col-form-label font-weight-bold">生年月日</label>
              <div class="col-9">
                <div class="input-group">
                  <input type="text" class="form-control js-datepicker" id="formBirthday" name="birthday" value="{{ $student->birthday->format('Y-m-d') }}" placeholder="" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="fas fa-fw fa-calendar-alt"></i>
                    </div>
                  </div>
                  <div class="invalid-tooltip">
                    Please enter birthdate.
                  </div>
                </div>
              </div>
            </div>

            <div class="pb-3 row">
              <div class="col-3 font-weight-bold">住所</div>
              <div class="col-9">
                <div class="form-group position-relative">
                  <label for="formPrefecture" class="form-label pt-0">Prefecture</label>
                  <select class="form-control" id="formPrefecture" name="prefecture" data-action="change"
                    data-condition="" data-text="Please choose your prefecture.">
                    <option value="" selected hidden disabled>Choose prefecture</option>
                    @foreach($prefectures as $index => $name)
                    <option value="{{ $index }}" {{ ($index == $student->prefecture) ? 'selected' : null }}>{{ $name }}
                    </option>
                    @endforeach
                  </select>
                  <div class="invalid-tooltip">
                    Please choose your prefecture.
                  </div>
                </div>

                <div class="form-group position-relative">
                  <label for="formAddress1" class="form-label pt-0">番地</label>
                  <input type="text" class="form-control" id="formAddress1" name="address1"
                    value="{{ $student->address1 }}" placeholder="" required>
                  <div class="invalid-tooltip">
                    Please enter your house number.
                  </div>
                </div>

                <div class="form-group position-relative">
                  <label for="formAddress2" class="form-label pt-0">ビル名 / 部屋番号</label>
                  <input type="text" class="form-control" id="formAddress2" name="address2"
                    value="{{ $student->address2 }}" placeholder="" required>
                  <div class="invalid-tooltip">
                    Please enter your building name / room number.
                  </div>
                </div>

                <div class="form-group position-relative">
                  <label for="formAddress3" class="form-label pt-0">郵便番号</label>
                  <input type="number" class="form-control" id="formAddress3" name="address3"
                    value="{{ $student->address3 }}" placeholder="" required>
                  <div class="invalid-tooltip">
                    Please enter your postal code.
                  </div>
                </div>

              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formSex" class="col-3 col-form-label font-weight-bold">性別</label>
              <div class="col-9">
                <select class="form-control" id="formSex" name="sex" data-action="change" data-condition=""
                  data-text="Please choose your sex orientation.">
                  <option value="" selected hidden disabled>Choose sex</option>
                  <option value="m" {{ ('m' == $student->sex) ? 'selected' : null }}>男</option>
                  <option value="f" {{ ('f' == $student->sex) ? 'selected' : null }}>女</option>
                </select>
                <div class="invalid-tooltip">
                  Please choose your sex orientation.
                </div>
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formContactNumber" class="col-3 col-form-label font-weight-bold">電話番号</label>
              <div class="col-9">
                <input type="text" class="form-control" id="formContactNumber" name="contact_number" value="{{ $student->contact_number }}" placeholder="" required>
                <div class="invalid-tooltip">
                  Please enter a phone number.
                </div>
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formEmail" class="col-3 col-form-label font-weight-bold">メールアドレス</label>
              <div class="col-9">
                <input type="text" class="form-control" id="formEmail" name="email" value="{{ $student->email }}" placeholder="" required>
                <div class="invalid-tooltip">
                  Please enter your email.
                </div>
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formEnrollmentDate" class="col-3 col-form-label font-weight-bold">入学日</label>
              <div class="col-9">
                <div class="input-group">
                  <input type="text" class="form-control js-datepicker" id="formEnrollmentDate" name="enrollment_date" value="{{ $student->enrollment_date->format('Y-m-d') }}" placeholder="" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="fas fa-fw fa-calendar-alt"></i>
                    </div>
                  </div>
                  <div class="invalid-tooltip">
                    Please enter enrollment date.
                  </div>
                </div>
              </div>
            </div>
        
            <div class="form-group pb-3 row">
              <label for="formGraduationDate" class="col-3 col-form-label font-weight-bold">卒業日</label>
              <div class="col-9">
                <div class="input-group">
                  <input type="text" class="form-control js-datepicker" id="formGraduationDate" name="graduation_date" value="{{ $student->graduation_date->format('Y-m-d') }}" placeholder="" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="fas fa-fw fa-calendar-alt"></i>
                    </div>
                  </div>
                  <div class="invalid-tooltip">
                    Please enter graduation date.
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formStatus" class="col-3 col-form-label font-weight-bold">ステータス</label>
              <div class="col-9">
                <select class="form-control" id="formStatus" name="status">
                  <option value="" selected hidden disabled>Choose status</option>
                    @foreach($student_status as $index => $name)
                      <option value="{{ $index }}" {{ ($index == $student->status) ? 'selected' : null }}>{{ mb_convert_case($name, MB_CASE_TITLE, 'UTF-8') }}</option>
                    @endforeach
                </select>
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formOccupation" class="col-3 col-form-label font-weight-bold">ご職業</label>
              <div class="col-9">
                <select class="form-control" id="formOccupation" name="occupation" data-action="change" data-condition="" data-text="Please enter occupation.">
                  <option value="" selected hidden disabled>Choose occupation</option>
                    @foreach($occupations as $index => $name)
                      <option value="{{ $index }}" {{ ($index == $student->occupation) ? 'selected' : null }}>{{ mb_convert_case($name, MB_CASE_TITLE, 'UTF-8') }}</option>
                    @endforeach
                </select>
                <div class="invalid-tooltip">
                  Please enter occupation.
                </div>
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formDescription" class="col-3 col-form-label font-weight-bold">備考</label>
              <div class="col-9">
                <textarea class="form-control" id="formDescription" name="description" value="{{ $student->description }}" placeholder="" rows="4" style="min-height: 100px;"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-6 py-4 mx-auto">
                <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
              </div>
            </div>
          </form>
        @elseif ($step == 2)
          ...2nd step
        @elseif ($step == 3)
          ...3rd step
        @elseif ($step == 4)
          ...4
        @endif

        
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
@endsection