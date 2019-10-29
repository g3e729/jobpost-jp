@extends('layouts.register')

@php
$currForm = 1; // Steps 1, 2
$progressVal = ($currForm / 2) * 100;

@endphp

@section('content')
  <div class="form-header">
    <div class="progress progress-form" style="height: 18px;">
      <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-anim-{{ $currForm }}" role="progressbar" aria-valuenow="{{ $progressVal }}" aria-valuemin="0" aria-valuemax="100" data-progress="{{ $progressVal.'%' }}">{{ $currForm }}/2</div>
    </div>

    <div class="py-4 text-center alt-font">
      <h1 class="h5">新規登録
        @if ($currForm == 1)
        <span class="d-block h4">パスワード</span>

        @else
        <span class="d-block h4">その他</span>
        @endif
      </h1>
    </div>
  </div>

  @if ($currForm == 1)
  <form class="form-staff1 needs-validation pt-3 pb-5 px-5 mb-4" action="" method="POST" novalidate>
    
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

    <hr class="form-divider d-block mb-4">

    <div class="form-group pb-3 row">
      <label for="formStaffName" class="col-4 col-form-label">名前</label>
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
          <label for="formStaffAddress0" class="form-label pt-0">Prefecture</label>
          <select class="form-control" id="formStaffAddress0" name="staffaddress0" data-action="change" data-condition="" data-text="Please choose your prefecture.">
            <option value="" selected hidden disabled>Choose prefecture</option>
            <option id='prefecure-hokkaido'>北海道</option>
            <option id='prefecture-tohoku-0'>東北 - 青森</option>
            <option id='prefecture-tohoku-1'>東北 - 岩手</option>
            <option id='prefecture-tohoku-2'>東北 - 秋田</option>
            <option id='prefecture-tohoku-3'>東北 - 山形</option>
            <option id='prefecture-tohoku-4'>東北 - 宮城</option>
            <option id='prefecture-tohoku-5'>東北 - 福島</option>
            <option id='prefecture-kanto-0'>関東 - 東京</option>
            <option id='prefecture-kanto-1'>関東 - 千葉</option>
            <option id='prefecture-kanto-2'>関東 - 神奈川</option>
            <option id='prefecture-kanto-3'>関東 - 茨城</option>
            <option id='prefecture-kanto-4'>関東 - 栃木</option>
            <option id='prefecture-kanto-5'>関東 - 群馬</option>
            <option id='prefecture-kanto-6'>関東 - 埼玉</option>
            <option id='prefecture-chubu-0'>中部 - 新潟</option>
            <option id='prefecture-chubu-1'>中部 - 富山</option>
            <option id='prefecture-chubu-2'>中部 - 石川</option>
            <option id='prefecture-chubu-3'>中部 - 長野</option>
            <option id='prefecture-chubu-4'>中部 - 山梨</option>
            <option id='prefecture-chubu-5'>中部 - 静岡</option>
            <option id='prefecture-chubu-6'>中部 - 愛知</option>
            <option id='prefecture-chubu-7'>中部 - 岐阜</option>
            <option id='prefecture-chubu-8'>中部 - 福井</option>
            <option id='prefecture-kansai-0'>関西 - 滋賀</option>
            <option id='prefecture-kansai-1'>関西 - 三重</option>
            <option id='prefecture-kansai-2'>関西 - 京都</option>
            <option id='prefecture-kansai-3'>関西 - 大阪</option>
            <option id='prefecture-kansai-4'>関西 - 奈良</option>
            <option id='prefecture-kansai-5'>関西 - 兵庫</option>
            <option id='prefecture-kansai-6'>関西 - 和歌山</option>
            <option id='prefecture-chugoku-0'>中国 - 鳥取</option>
            <option id='prefecture-chugoku-1'>中国 - 岡山</option>
            <option id='prefecture-chugoku-2'>中国 - 広島</option>
            <option id='prefecture-chugoku-3'>中国 - 島根</option>
            <option id='prefecture-chugoku-4'>中国 - 山口</option>
            <option id='prefecture-shikoku-0'>四国 - 徳島</option>
            <option id='prefecture-shikoku-1'>四国 - 香川</option>
            <option id='prefecture-shikoku-2'>四国 - 愛媛</option>
            <option id='prefecture-shikoku-3'>四国 - 高知</option>
            <option id='prefecture-kyushu-0'>九州 - 福岡</option>
            <option id='prefecture-kyushu-1'>九州 - 大分</option>
            <option id='prefecture-kyushu-2'>九州 - 佐賀</option>
            <option id='prefecture-kyushu-3'>九州 - 長崎</option>
            <option id='prefecture-kyushu-4'>九州 - 熊本</option>
            <option id='prefecture-kyushu-5'>九州 - 宮崎</option>
            <option id='prefecture-kyushu-6'>九州 - 鹿児島</option>
            <option id='prefecture-kyushu-7'>九州 - 沖縄</option>
            <option id='prefecture-overseas'>海外</option>
          </select>
          <div class="invalid-tooltip">
            Please choose your prefecture.
          </div>
        </div>

        <div class="form-group position-relative">
          <label for="formStaffAddress1" class="form-label pt-0">番地</label>
          <input type="text" class="form-control" id="formStaffAddress1" name="staffaddress1" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter your house number.
          </div>
        </div>

        <div class="form-group position-relative">
          <label for="formStaffAddress2" class="form-label pt-0">ビル名 / 部屋番号</label>
          <input type="text" class="form-control" id="formStaffAddress2" name="staffaddress2" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter your building name / room number.
          </div>
        </div>

        <div class="form-group position-relative">
          <label for="formStaffAddress3" class="form-label pt-0">郵便番号</label>
          <input type="number" class="form-control" id="formStaffAddress3" name="staffaddress3" placeholder="" required>
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
          <option value="sex-man">男</option>
          <option value="sex-woman">女</option>
        </select>
        <div class="invalid-tooltip">
          Please choose your sex orientation.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formStaffPhone" class="col-4 col-form-label">電話番号</label>
      <div class="col-8">
        <input type="text" class="form-control" id="formStaffPhone" name="staffphone" placeholder="">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-6 pt-4 mx-auto">
        <button type="submit" class="alt-font btn btn-primary btn-rounded w-100">送信</button>
      </div>
    </div>

  </form>

  @else
  <form class="form-staff2 needs-validation pt-3 pb-5 px-5 mb-4" action="" method="POST" novalidate>

    <div class="form-group pb-3 row">
      <label for="formStaffStatus" class="col-4 col-form-label">ステータス</label>
      <div class="col-8">
        <select class="form-control" id="formStaffStatus" name="formStaffstatus" data-action="change" data-condition="" data-text="Please choose your status.">
          <option value="" selected hidden disabled>Choose status</option>
          <option id='status-0'>無休インターン : Unpaid intern</option>
          <option id='status-1'>有給インターン : Paid intern</option>
          <option id='status-2'>契約社員 : Contract employee</option>
          <option id='status-3'>社員 : Employee</option>
          <option id='status-4'>パートタイム : Part time</option>
          <option id='status-5'>フルタイム : Full time</option>
          <option id='status-6'>退職 : Retirement</option>
        </select>
        <div class="invalid-tooltip">
          Please choose your status.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formStaffAvatar" class="col-4 col-form-label">アバター</label>
      <div class="col-8">
        <input type="file" class="form-control" id="formStaffAvatar" name="staffavatar" accept="image/png, image/jpeg" required>
        <div class="invalid-tooltip">
          Please choose your avatar.
        </div>
      </div>
    </div>
    
    <div class="form-group pb-3 row">
      <label for="formStaffCountry" class="col-4 col-form-label">国籍</label>
      <div class="col-8">
        <select class="form-control" id="formStaffCountry" name="staffcountry">
          <option value="" selected hidden disabled>Choose country</option>
          <option id='country-0'>日本人 : Japan</option>
          <option id='country-1'>フィリピン人 : Filipino</option>
        </select>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formStaffPosition" class="col-4 col-form-label">ポジション</label>
      <div class="col-8">
        <select class="form-control" id="formPosition" name="staffposition">
          <option value="" selected hidden disabled>Choose position</option>
          <option id='position-0'>IT</option>
          <option id='position-1'>ESL</option>
          <option id='position-2'>Housekeeper</option>
          <option id='position-3'>Admin</option>
          <option id='position-4'>Marketing</option>
          <option id='position-5'>Sales</option>
          <option id='position-6'>Student support</option>
        </select>
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