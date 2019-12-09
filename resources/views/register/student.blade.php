@extends('layouts.register')

@section('content')

  <form class="form-staff1 needs-validation pt-3 pb-3 pr-5 mb-3 mr-2" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf

    <input type="hidden" name="step" value="{{ $step }}">
    <input type="hidden" name="code" value="{{ $invitation->code }}">
    <input type="hidden" name="email" value="{{ $invitation->email }}">
    <input type="hidden" name="type" value="{{ $invitation->type }}">
    <input type="hidden" name="profile_id" value="{{ $profile_id }}">

    @if ($step == 1)

      <div class="form-group pb-1 row">
        <label for="formPassword" class="col col-form-label">パスワード</label>
        <div class="col-9">
          <input type="password" class="form-control rounded-0" id="formPassword" name="password" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter a password.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formPasswordConfirmation" class="col col-form-label">パスワードの確認</label>
        <div class="col-9">
          <input type="password" class="form-control rounded-0" id="formPasswordConfirmation" name="password_confirmation" placeholder="" required
            data-action="input" data-condition="password" data-text="Passwords do not match."
          >
          <div class="invalid-tooltip">
            Passwords do not match.
          </div>
        </div>
      </div>

      <hr class="form-divider d-block mb-4">

      <div class="form-group pb-1 row">
        <label for="formJapaneseName" class="col col-form-label">名前(Japanese)</label>
        <div class="col-9">
          <input type="text" class="form-control rounded-0" id="formJapaneseName" name="japanese_name" value="{{ old('japanese_name') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter Japanese name.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formName" class="col col-form-label">名前(English)</label>
        <div class="col-9">
          <input type="text" class="form-control rounded-0" id="formName" name="name" value="{{ old('name') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter English name.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formBirthday" class="col col-form-label">生年月日</label>
        <div class="col-9">
          <div class="input-group">
            <input type="text" class="form-control js-datepicker rounded-0 border-right-0" id="formBirthday" name="birthday" value="{{ old('birthday') }}" placeholder="" required>
            <div class="input-group-append">
              <div class="input-group-text bg-white border-left-0">
                <i class="fas fa-fw fa-calendar-alt text-secondary"></i>
              </div>
            </div>
            <div class="invalid-tooltip">
              Please enter birthdate.
            </div>
          </div>
        </div>
      </div>

      <div class="pb-1 row">
        <div class="col">住所</div>
        <div class="col-9">
          <div class="form-group position-relative">
            <select class="form-control form-control-awesome rounded-0" id="formPrefecture" name="prefecture" data-action="change" data-condition="" data-text="Please choose your prefecture." style="-webkit-border-radius: 0;">
              <option value="" selected hidden disabled>Choose prefecture</option>
              @foreach($prefectures as $index => $name)
                <option value="{{ $index }}">{{ $name }}</option>
              @endforeach
            </select>
            <div class="invalid-tooltip">
              Please choose your prefecture.
            </div>
          </div>

          <div class="form-group position-relative">
            <input type="text" class="form-control rounded-0" id="formAddress1" name="address1" value="{{ old('address1') }}" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your house number.
            </div>
          </div>

          <div class="form-group position-relative">
            <input type="text" class="form-control rounded-0" id="formAddress2" name="address2" value="{{ old('address2') }}" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your building name / room number.
            </div>
          </div>

          <div class="form-group position-relative">
            <input type="number" class="form-control rounded-0" id="formAddress3" name="address3" value="{{ old('address3') }}" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your postal code.
            </div>
          </div>

        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formSex" class="col col-form-label">性別</label>
        <div class="col-9">
          <select class="form-control form-control-awesome rounded-0" id="formSex" name="sex" data-action="change" data-condition="" data-text="Please choose your sex orientation.">
            <option value="" selected hidden disabled>Choose sex</option>
            <option value="m">男</option>
            <option value="f">女</option>
          </select>
          <div class="invalid-tooltip">
            Please choose your sex orientation.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formContactNumber" class="col col-form-label">電話番号</label>
        <div class="col-9">
          <input type="text" class="form-control rounded-0" id="formContactNumber" name="contact_number" value="{{ old('contact_number') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter a phone number.
          </div>
        </div>
      </div>

    @else

      <div class="form-group pb-1 row">
        <label for="formStudyAbroadFee" class="col col-form-label">留学費用</label>
        <div class="col-9">
          <input type="number" class="form-control rounded-0" id="formStudyAbroadFee" name="study_abroad_fee" min="0" value="{{ old('study_aboard_fee') }}" placeholder="">
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formEnrollmentDate" class="col col-form-label">入学日</label>
        <div class="col-9">
          <div class="input-group">
            <input type="text" class="form-control js-datepicker rounded-0 border-right-0" id="formEnrollmentDate" name="enrollment_date" value="{{ old('enrollment_date') }}" placeholder="" required>
            <div class="input-group-append">
              <div class="input-group-text bg-white border-left-0">
                <i class="fas fa-fw fa-calendar-alt text-secondary"></i>
              </div>
            </div>
            <div class="invalid-tooltip">
              Please enter enrollment date.
            </div>
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formGraduationDate" class="col col-form-label">卒業日</label>
        <div class="col-9">
          <div class="input-group">
            <input type="text" class="form-control js-datepicker rounded-0 border-right-0" id="formGraduationDate" name="graduation_date" value="{{ old('graduation_date') }}" placeholder="" required>
            <div class="input-group-append">
              <div class="input-group-text bg-white border-left-0">
                <i class="fas fa-fw fa-calendar-alt text-secondary"></i>
              </div>
            </div>
            <div class="invalid-tooltip">
              Please enter graduation date.
            </div>
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formOccupation" class="col col-form-label">ご職業</label>
        <div class="col-9">
          <select class="form-control form-control-awesome rounded-0" id="formOccupation" name="occupation" data-action="change" data-condition="" data-text="Please enter occupation.">
            <option value="" selected hidden disabled>Choose occupation</option>
              @foreach($occupations as $index => $name)
                <option value="{{ $index }}">{{ mb_convert_case($name, MB_CASE_TITLE, 'UTF-8') }}</option>
              @endforeach
          </select>
          <div class="invalid-tooltip">
            Please enter occupation.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formDescription" class="col col-form-label">備考</label>
        <div class="col-9">
          <textarea class="form-control rounded-0" id="formDescription" name="description" value="{{ old('description') }}" placeholder="" rows="4" style="min-height: 100px;"></textarea>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formAvatar" class="col col-form-label">アバター</label>
        <div class="col-9">
          <input type="file" class="form-control-file" id="formAvatar" name="avatar" accept="image/png, image/jpeg" required>
          <div class="invalid-tooltip">
            Please choose your avatar.
          </div>
        </div>
      </div>

    @endif

    <div class="form-group row">
      <div class="col-6 pt-4 mx-auto">
        <button type="submit" class="btn btn-capsule btn-rounded w-100">ログイン</button>
      </div>
    </div>

  </form>
@endsection
