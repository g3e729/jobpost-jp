@extends('layouts.register')

@php
$currForm = 1; // Steps 1, 2, or 3
$progressVal = ($currForm / 3) * 100;

@endphp

@section('content')
  <div class="form-header">
    <div class="progress progress-form" style="height: 18px;">
      <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-anim-{{ $currForm }}" role="progressbar" aria-valuenow="{{ $progressVal }}" aria-valuemin="0" aria-valuemax="100" data-progress="{{ $progressVal.'%' }}">{{ $currForm }}/3</div>
    </div>

    <div class="py-4 text-center alt-font">
      <h1 class="h5">新規登録
        @if ($currForm == 1)
        <span class="d-block h4">パスワード</span>

        @elseif ($currForm == 2)
        <span class="d-block h4">基本情報</span>

        @else
        <span class="d-block h4">その他</span>
        @endif
      </h1>
    </div>
  </div>

  @if ($currForm == 1)
  <form class="form-staff1 needs-validation p-5 mb-4" action="" method="POST" novalidate>
    
    <div class="form-group pb-3 row">
      <label for="formPassword" class="col-4 col-form-label">パスワード</label>
      <div class="col-8">
        <input type="password" class="form-control" id="formPassword" name="password" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter a password.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formPassword" class="col-4 col-form-label">パスワードの確認</label>
      <div class="col-8">
        <input type="password" class="form-control" id="formPasswordConfirm" name="passwordconfirm" placeholder="" required
          data-action="input" data-condition="password" data-text="Passwords do not match."
        >
        <div class="invalid-tooltip">
          Passwords do not match.
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-6 pt-4 mx-auto">
        <button type="submit" class="alt-font btn btn-primary btn-rounded w-100">送信</button>
      </div>
    </div>

  </form>

  @elseif ($currForm == 2)
  <form class="form-staff2 needs-validation pt-3 pb-5 px-5 mb-4" action="" method="POST" novalidate>

    <div class="form-group pb-3 row">
      <label for="formStaffName" class="col-4 col-form-label">名前(Japanese)</label>
      <div class="col-8">
        <input type="text" class="form-control" id="formStaffName" name="staffname" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter staff name. 
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formStaffBirthdate" class="col-4 col-form-label">生年月日</label>
      <div class="col-8">
        <div class="input-group">
          <input type="text" class="form-control js-datepicker" id="formStaffBirthdate" name="staffbirthdate" placeholder="" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-fw fa-calendar-alt"></i>
            </div>
          </div>
          <div class="invalid-tooltip">
            Please enter staff birthdate.
          </div>
        </div>
      </div>
    </div>

    <div class="pb-3 row">
      <div class="col-4">住所</div>
      <div class="col-8">
        <div class="form-group position-relative">
          <label for="formStaffAddress1" class="form-label pt-0">番地まで</label>
          <input type="text" class="form-control" id="formStaffAddress1" name="staffaddress1" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter an address.
          </div>
        </div>

        <div class="form-group position-relative">
          <label for="formStaffAddress2" class="form-label pt-0">ビル名、部屋番号</label>
          <input type="text" class="form-control" id="formStaffAddress2" name="staffaddress2" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter your building name / room number.
          </div>
        </div>

        <div class="form-group position-relative">
          <label for="formStaffAddress3" class="form-label pt-0">郵便番号</label>
          <input type="text" class="form-control" id="formStaffAddress3" name="staffaddress3" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter your postal code.
          </div>
        </div>

      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formStaffSex" class="col-4 col-form-label">性別</label>
      <div class="col-8">
        <select class="form-control" id="formStaffSex" name="staffsex" data-action="change" data-condition="" data-text="Please choose your sex orientation.">
          <option value="" selected hidden disabled>Choose sex</option>
          <option value="sex-male">男性</option>
          <option value="sex-female">女性</option>
        </select>
        <div class="invalid-tooltip">
          Please choose your sex orientation.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formStaffPhone" class="col-4 col-form-label">電話番号</label>
      <div class="col-8">
        <input type="text" class="form-control" id="formStaffPhone" name="staffphone" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter a phone number.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formStaffAvatar" class="col-4 col-form-label">アバタ</label>
      <div class="col-8">
        <input type="file" class="form-control" id="formStaffAvatar" name="staffavatar" accept="image/png, image/jpeg" required>
        <div class="invalid-tooltip">
          Please choose your avatar.
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-6 pt-4 mx-auto">
        <button type="submit" class="alt-font btn btn-primary btn-rounded w-100">送信</button>
      </div>
    </div>

  </form>

  @else
  <form class="form-staff3 needs-validation pt-3 pb-5 px-5 mb-4" action="" method="POST" novalidate>

    <div class="form-group pb-3 row">
      <label for="formStaffPassport" class="col-3 col-form-label">パスポート番号</label>
      <div class="col-9">
        <input type="text" class="form-control" id="formPassport" name="staffpassport" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter your passport number.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formStaffStatus" class="col-3 col-form-label">ステータス</label>
      <div class="col-9">
        <select class="form-control" id="formStaffStatus" name="formStaffstatus" data-action="change" data-condition="" data-text="Please choose your status.">
          <option value="" selected hidden disabled>Choose status</option>
          <option value="pre-matriculation">Pre-Matriculation</option>
          <option value="student">Student</option>
          <option value="graduated">Graduated</option>
        </select>
        <div class="invalid-tooltip">
          Please choose your status.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formStaffFee" class="col-3 col-form-label">留学費用</label>
      <div class="col-9">
        <input type="number" class="form-control" id="formStaffFee" name="stafffee" min="1" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter student fee.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formStaffCountry" class="col-3 col-form-label">国籍</label>
      <div class="col-9">
        <input type="text" class="form-control" id="formCountry" name="staffcountry" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter your country.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formStaffPosition" class="col-3 col-form-label">ポジション</label>
      <div class="col-9">
        <input type="text" class="form-control" id="formPosition" name="staffposition" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter your position.
        </div>
      </div>
    </div>
    
    <div class="form-group pb-3 row">
      <label for="formStaffRange" class="col-3 col-form-label">雇用期間</label>
      <div class="col-9">
        <div class="input-group input-daterange js-datepicker">
          <input type="text" class="form-control text-left" id="formStaffRangeFrom" name="staffrangefrom" placeholder="">
          <div class="input-group-text">
            <i class="fas fa-fw fa-arrows-alt-h"></i>
          </div>
          <input type="text" class="form-control text-left" id="formStaffRangeTo" name="staffrangeto" placeholder="">
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-6 pt-4 mx-auto">
        <button type="submit" class="alt-font btn btn-primary btn-rounded w-100">送信</button>
      </div>
    </div>

  </form>
  @endif
@endsection

@section('js')
  <script src="{{ asset('js/register.js') }}"></script>
  <script>
    $('.js-datepicker').datepicker();
  </script>
@endsection