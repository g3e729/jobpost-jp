@extends('layouts.register')

@section('content')

  <form class="form-staff1 needs-validation pt-3 pb-5 px-5 mb-4" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf

    <input type="hidden" name="step" value="{{ $step }}">
    <input type="hidden" name="code" value="{{ $invitation->code }}">
    <input type="hidden" name="email" value="{{ $invitation->email }}">
    <input type="hidden" name="type" value="{{ $invitation->type }}">
    <input type="hidden" name="profile_id" value="{{ $profile_id }}">

    @if ($step == 1)

      <div class="form-group pb-3 row">
        <label for="formPassword" class="col-4 col-form-label font-weight-bold">パスワード</label>
        <div class="col-8">
          <input type="password" class="form-control" id="formPassword" name="password" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter a password.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formPasswordConfirmation" class="col-4 col-form-label font-weight-bold">パスワードの確認</label>
        <div class="col-8">
          <input type="password" class="form-control" id="formPasswordConfirmation" name="password_confirmation" placeholder="" required
            data-action="input" data-condition="password" data-text="Passwords do not match."
          >
          <div class="invalid-tooltip">
            Passwords do not match.
          </div>
        </div>
      </div>

      <hr class="form-divider d-block mb-4">

      <div class="form-group pb-3 row">
        <label for="formJapaneseName" class="col-4 col-form-label font-weight-bold">名前(Japanese)</label>
        <div class="col-8">
          <input type="text" class="form-control" id="formJapaneseName" name="japanese_name" value="{{ old('japanese_name') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter Japanese name.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formName" class="col-4 col-form-label font-weight-bold">名前(English)</label>
        <div class="col-8">
          <input type="text" class="form-control" id="formName" name="name" value="{{ old('name') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter English name.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formBirthday" class="col-4 col-form-label font-weight-bold">生年月日</label>
        <div class="col-8">
          <div class="input-group">
            <input type="text" class="form-control js-datepicker" id="formBirthday" name="birthday" value="{{ old('birthday') }}" placeholder="" required>
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
        <div class="col-4 font-weight-bold">住所</div>
        <div class="col-8">
          <div class="form-group position-relative">
            <label for="formPrefecture" class="form-label pt-0">Prefecture</label>
            <select class="form-control" id="formPrefecture" name="prefecture" data-action="change" data-condition="" data-text="Please choose your prefecture.">
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
            <label for="formAddress1" class="form-label pt-0">番地</label>
            <input type="text" class="form-control" id="formAddress1" name="address1" value="{{ old('address1') }}" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your house number.
            </div>
          </div>

          <div class="form-group position-relative">
            <label for="formAddress2" class="form-label pt-0">ビル名 / 部屋番号</label>
            <input type="text" class="form-control" id="formAddress2" name="address2" value="{{ old('address2') }}" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your building name / room number.
            </div>
          </div>

          <div class="form-group position-relative">
            <label for="formAddress3" class="form-label pt-0">郵便番号</label>
            <input type="number" class="form-control" id="formAddress3" name="address3" value="{{ old('address3') }}" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your postal code.
            </div>
          </div>

        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formSex" class="col-4 col-form-label font-weight-bold">性別</label>
        <div class="col-8">
          <select class="form-control" id="formSex" name="sex" data-action="change" data-condition="" data-text="Please choose your sex orientation.">
            <option value="" selected hidden disabled>Choose sex</option>
            <option value="m">男</option>
            <option value="f">女</option>
          </select>
          <div class="invalid-tooltip">
            Please choose your sex orientation.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formContactNumber" class="col-4 col-form-label font-weight-bold">電話番号</label>
        <div class="col-8">
          <input type="text" class="form-control" id="formContactNumber" name="contact_number" value="{{ old('contact_number') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter a phone number.
          </div>
        </div>
      </div>

    @else

      <div class="form-group pb-3 row">
        <label for="formStudyAbroadFee" class="col-4 col-form-label font-weight-bold">留学費用</label>
        <div class="col-8">
          <input type="number" class="form-control" id="formStudyAbroadFee" name="study_abroad_fee" min="0" value="{{ old('study_aboard_fee') }}" placeholder="">
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formEnrollmentDate" class="col-4 col-form-label font-weight-bold">入学日</label>
        <div class="col-8">
          <div class="input-group">
            <input type="text" class="form-control js-datepicker" id="formEnrollmentDate" name="enrollment_date" value="{{ old('enrollment_date') }}" placeholder="" required>
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
        <label for="formGraduationDate" class="col-4 col-form-label font-weight-bold">卒業日</label>
        <div class="col-8">
          <div class="input-group">
            <input type="text" class="form-control js-datepicker" id="formGraduationDate" name="graduation_date" value="{{ old('graduation_date') }}" placeholder="" required>
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
        <label for="formOccupation" class="col-4 col-form-label font-weight-bold">ご職業</label>
        <div class="col-8">
          <select class="form-control" id="formOccupation" name="occupation" data-action="change" data-condition="" data-text="Please enter occupation.">
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

      <div class="form-group pb-3 row">
        <label for="formDescription" class="col-4 col-form-label font-weight-bold">備考</label>
        <div class="col-8">
          <textarea class="form-control" id="formDescription" name="description" value="{{ old('description') }}" placeholder="" rows="4" style="min-height: 100px;"></textarea>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formAvatar" class="col-4 col-form-label font-weight-bold">アバター</label>
        <div class="col-8">
          <input type="file" class="form-control-file" id="formAvatar" name="avatar" accept="image/png, image/jpeg" required>
          <div class="invalid-tooltip">
            Please choose your avatar.
          </div>
        </div>
      </div>

    @endif

    <div class="form-group row">
      <div class="col-6 pt-4 mx-auto">
        <button type="submit" class="alt-font btn btn-primary btn-submit btn-rounded w-100">送信</button>
      </div>
    </div>

  </form>
@endsection
