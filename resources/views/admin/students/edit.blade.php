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
          <form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="" novalidate>
            @csrf
            <div class="form-group pb-3 row">
              <label for="formIntro" class="col-3 col-form-label font-weight-bold">自己紹介</label>
              <div class="col-9">
                <input type="text" class="form-control" id="formIntro" name="intro" value="{{ $student->intro }}" placeholder="">
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formAim" class="col-3 col-form-label font-weight-bold">やってみたいこと</label>
              <div class="col-9">
                <textarea class="form-control" id="formAim" name="aim" value="{{ $student->aim }}" placeholder="" rows="4" style="min-height: 100px;"></textarea>
              </div>
            </div>

            ... [todo] multiple work history...
            <div class="pb-3 row">
              <div class="col-3 font-weight-bold">職歴</div>
              <div class="col-9">
                <div class="form-group position-relative">
                  <label for="formCompanyName" class="form-label pt-0">企業名</label>
                  <input type="text" class="form-control" id="formCompanyName" name="company_name" value="{{ $student->company_name }}" placeholder="">
                </div>

                <div class="form-group position-relative">
                  <label for="formCompanyRole" class="form-label pt-0">役</label>
                  <input type="text" class="form-control" id="formCompanyRole" name="company_role" value="{{ $student->company_role }}" placeholder="">
                </div>

                <div class="form-group position-relative">
                  <label for="formJobDescription" class="form-label pt-0">内容</label>
                  <textarea class="form-control" id="formJobDescription" name="job_escription" value="{{ $student->job_escription }}" placeholder="" rows="4" style="min-height: 100px;"></textarea>
                </div>

                <div class="form-group position-relative">
                  <label for="formStaffRange" class="form-label pt-0">期間</label>
                  <div class="input-group input-daterange js-datepicker">
                    <input type="text" class="form-control text-left" id="formStaffRangeFrom" name="staffrangefrom" placeholder="">
                    <div class="input-group-text">
                      <i class="fas fa-fw fa-arrows-alt-h"></i>
                    </div>
                    <input type="text" class="form-control text-left" id="formStaffRangeTo" name="staffrangeto" placeholder="">
                  </div>
                </div>

              </div>
            </div>

            <div class="pb-3 row">
              <div class="col-3 font-weight-bold">職歴</div>
              <div class="col-9">
                <div class="form-group position-relative">
                  <label for="formSchoolName" class="form-label pt-0">学校名</label>
                  <input type="text" class="form-control" id="formSchoolName" name="school_name" value="{{ $student->school_name }}" placeholder="">
                </div>

                <div class="form-group position-relative">
                  <label for="formmajor" class="form-label pt-0">学部、学科、専攻</label>
                  <input type="text" class="form-control" id="formmajor" name="major" value="{{ $student->major }}" placeholder="">
                </div>

                <div class="form-group position-relative">
                  <label for="formSchoolExperience" class="form-label pt-0">学んだこと</label>
                  <textarea class="form-control" id="formSchoolExperience" name="school_experience" value="{{ $student->school_experience }}" placeholder="" rows="4" style="min-height: 100px;"></textarea>
                </div>

                <div class="form-group position-relative">
                  <label for="formGraduationDate" class="form-label pt-0">卒業</label>
                  <div class="input-group">
                    <input type="text" class="form-control js-datepicker" id="formGraduationDate" name="graduation_date"
                      value="{{ $student->graduation_date }}" placeholder="">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <i class="fas fa-fw fa-calendar-alt"></i>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formAvatar" class="col-3 col-form-label font-weight-bold">アバター</label>
              <div class="col-9" data-group="avatar">
                <input data-avatar="file" type="file" class="form-control-file" id="formAvatar" name="avatar"
                  accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
                <div class="input-group">
                  <input data-avatar="name" type="text" class="form-control" value="{{ $student->avatar ?? null }}"
                    disabled required>
                  <div class="input-group-append">
                    <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
                  </div>
                  <div class="invalid-tooltip">
                    Please choose your avatar.
                  </div>
                </div>

                <div class="mt-3">
                  <img data-avatar="preview" class="avatar avatar-md border border-secondary my-3"
                    src="{{ $student->avatar ?? 'https://placehold.it/80x80' }}">
                </div>
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formCoverPhoto" class="col-3 col-form-label font-weight-bold">アイキャッチ</label>
              <div class="col-9" data-group="eyecatch">
                <input data-avatar="file" type="file" class="form-control-file" id="formCoverPhoto" name="cover_photo"
                  accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
                <div class="input-group">
                  <input data-avatar="name" type="text" class="form-control" value="{{ $student->cover_photo ?? null }}"
                    disabled required>
                  <div class="input-group-append">
                    <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
                  </div>
                  <div class="invalid-tooltip">
                    Please enter your profile eyecatch.
                  </div>
                </div>

                <div class="mt-3">
                  <img data-avatar="preview" class="img-fluid border border-secondary my-3"
                    src="{{ $student->cover_photo ?? 'https://placehold.it/240x240' }}">
                </div>

              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formMovie" class="col-3 col-form-label font-weight-bold">Movie URL</label>
              <div class="col-9">
                <input type="url" class="form-control" id="formMovie" name="movie" value="{{ $student->movie }}" placeholder="">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-6 py-4 mx-auto">
                <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
              </div>
            </div>
          </form>
        @elseif ($step == 3)
          ...3rd step
        @elseif ($step == 4)
          <form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="" novalidate>
            @csrf

            <div class="pb-3 row">
              <div class="col-3 font-weight-bold">IT</div>
              <div class="col-9">
                <div class="form-group position-relative">
                  <label for="formITAttended" class="form-label pt-0">受講済み</label>
                  <select class="form-control" id="formITAttended" name="it_attended">
                    <option value="" selected hidden disabled>Choose Attended class</option>
                    @foreach($courses as $index => $name)
                    <option value="{{ $index }}" {{ ($index == $student->it_attended) ? 'selected' : null }}>{{ ucwords($name) }}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group position-relative">
                  <label for="formITCurrent" class="form-label pt-0">受講中</label>
                  <select class="form-control" id="formITCurrent" name="it_current">
                    <option value="" selected hidden disabled>Choose Current class</option>
                    @foreach($courses as $index => $name)
                    <option value="{{ $index }}" {{ ($index == $student->it_current) ? 'selected' : null }}>{{ ucwords($name) }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group position-relative">
                  <label for="formITLevel" class="form-label pt-0">ITレベル</label>
                  <select class="form-control" id="formITLevel" name="it_level">
                    <option value="" selected hidden disabled>Choose IT level</option>
                    @for ($ctr = 1; $ctr <= 7; $ctr++)
                    <option value="{{ $ctr }}" {{ ($ctr == $student->it_level) ? 'selected' : null }}>{{ $ctr }}</option>
                    @endfor
                  </select>
                </div>

              </div>
            </div>

            <div class="pb-3 row">
              <div class="col-3 font-weight-bold">English</div>
              <div class="col-9">
                <div class="form-group position-relative">
                  <label for="formEnglishReading" class="form-label pt-0">Reading</label>
                  <input type="number" class="form-control" id="formEnglishReading" name="english_reading" value="{{ $student->english_reading }}" placeholder="">
                </div>

                <div class="form-group position-relative">
                  <label for="formEnglishListening" class="form-label pt-0">Listening</label>
                  <input type="number" class="form-control" id="formEnglishListening" name="english_listening" value="{{ $student->english_listening }}" placeholder="">
                </div>

                <div class="form-group position-relative">
                  <label for="formEnglishSpeaking" class="form-label pt-0">Speaking</label>
                  <input type="number" class="form-control" id="formEnglishSpeaking" name="english_speaking" value="{{ $student->english_speaking }}" placeholder="">
                </div>

                <div class="form-group position-relative">
                  <label for="formEnglishWriting" class="form-label pt-0">Writing</label>
                  <input type="number" class="form-control" id="formEnglishWriting" name="english_writing" value="{{ $student->english_writing }}" placeholder="">
                </div>

                <div class="form-group position-relative">
                  <label for="formEnglishLevel" class="form-label pt-0">現在のレベル</label>
                  <select class="form-control" id="formEnglishLevel" name="english_level">
                    <option value="" selected hidden disabled>Choose english level</option>
                    @for ($ctr = 1; $ctr <= 7; $ctr++)
                    <option value="{{ $ctr }}" {{ ($ctr == $student->english_level) ? 'selected' : null }}>{{ $ctr }}</option>
                    @endfor
                  </select>
                </div>

              </div>
            </div>

            <div class="form-group row">
              <div class="col-6 py-4 mx-auto">
                <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
              </div>
            </div>
          </form>
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
  <script>
    $('.js-datepicker').datepicker('destroy');
    $('.js-datepicker').datepicker({
      format: 'yyyy-mm',
      viewMode: 'months', 
      minViewMode: 'months',
    });
  </script>
@endsection