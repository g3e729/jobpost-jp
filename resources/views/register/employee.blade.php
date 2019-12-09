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
          <input type="text" class="form-control" id="formContactNumber" name="contact_number" value="{{ old('contact_number') }}" placeholder="">
        </div>
      </div>

    @else

      <div class="form-group pb-3 row">
        <label for="formCountry" class="col-4 col-form-label font-weight-bold">国籍</label>
        <div class="col-8">
          <select class="form-control" id="formCountry" name="country">
            <option value="" selected hidden disabled>Choose country</option>
            @foreach($countries as $index => $name)
              <option value="{{ $index }}">{{ ucwords($name) }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formPositionId" class="col-4 col-form-label font-weight-bold">ポジション</label>
        <div class="col-8">
          <select class="form-control" id="formPositionId" name="position_id">
            <option value="" selected hidden disabled>Choose position</option>
            @foreach($positions as $index => $name)
              <option value="{{ $index }}">{{ ucwords($name) }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formStatus" class="col-4 col-form-label font-weight-bold">ステータス</label>
        <div class="col-8">
          <select class="form-control" id="formStatus" name="status" data-action="change" data-condition="" data-text="Please choose your status.">
            <option value="" selected hidden disabled>Choose status</option>
            @foreach($employment_status as $index => $name)
              <option value="{{ $index }}">{{ mb_convert_case($name, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
          </select>
          <div class="invalid-tooltip">
            Please choose your status.
          </div>
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
