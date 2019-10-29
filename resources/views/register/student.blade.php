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
        <span class="d-block h4">基本情報</span>

        @elseif ($currForm == 2)
        <span class="d-block h4">教育</span>

        @else
        <span class="d-block h4">その他</span>
        @endif
      </h1>
    </div>
  </div>

  @if ($currForm == 1)
  <form class="form-user1 needs-validation pt-3 pb-5 px-5 mb-4" action="" method="POST" novalidate>
    
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
      <label for="formNameJP" class="col-4 col-form-label">名前(Japanese)</label>
      <div class="col-8">
        <input type="text" class="form-control" id="formNameJP" name="namejp" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter Japanese name. 
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formNameEN" class="col-4 col-form-label">名前(English)</label>
      <div class="col-8">
        <input type="text" class="form-control" id="formNameEN" name="nameen" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter English name.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formBirthDate" class="col-4 col-form-label">生年月日</label>
      <div class="col-8">
        <div class="input-group">
          <input type="text" class="form-control js-datepicker" id="formBirthDate" name="birthdate" placeholder="" required>
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
      <div class="col-4">住所</div>
      <div class="col-8">
        <div class="form-group position-relative">
          <label for="formAddress0" class="form-label pt-0">Prefecture</label>
          <select class="form-control" id="formAddress0" name="address0" data-action="change" data-condition="" data-text="Please choose your prefecture.">
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
          <label for="formAddress1" class="form-label pt-0">番地</label>
          <input type="text" class="form-control" id="formAddress1" name="address1" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter your house number.
          </div>
        </div>

        <div class="form-group position-relative">
          <label for="formAddress2" class="form-label pt-0">ビル名 / 部屋番号</label>
          <input type="text" class="form-control" id="formAddress2" name="address2" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter your building name / room number.
          </div>
        </div>

        <div class="form-group position-relative">
          <label for="formAddress3" class="form-label pt-0">郵便番号</label>
          <input type="number" class="form-control" id="formAddress3" name="address3" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter your postal code.
          </div>
        </div>

      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formSex" class="col-4 col-form-label">性別</label>
      <div class="col-8">
        <select class="form-control" id="formSex" name="sex" data-action="change" data-condition="" data-text="Please choose your sex orientation.">
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
      <label for="formPhone" class="col-4 col-form-label">電話番号</label>
      <div class="col-8">
        <input type="text" class="form-control" id="formPhone" name="phone" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter a phone number.
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
  <form class="form-user2 needs-validation pt-3 pb-5 px-5 mb-4" action="" method="POST" novalidate>

    <div class="form-group pb-3 row">
      <label for="formFee" class="col-4 col-form-label">留学費用</label>
      <div class="col-8">
        <input type="number" class="form-control" id="formFee" name="fee" min="0" placeholder="">
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formEnrollDate" class="col-4 col-form-label">入学日</label>
      <div class="col-8">
        <div class="input-group">
          <input type="text" class="form-control js-datepicker" id="formEnrollDate" name="enrolldate" placeholder="" required>
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
      <label for="formGraduationDate" class="col-4 col-form-label">卒業日</label>
      <div class="col-8">
        <div class="input-group">
          <input type="text" class="form-control js-datepicker" id="formGraduationDate" name="graduationdate" placeholder="" required>
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
      <label for="formStatus" class="col-4 col-form-label">ステータス</label>
      <div class="col-8">
        <select class="form-control" id="formStatus" name="status">
          <option value="" selected hidden disabled>Choose status</option>
          <option value="status-0">入学前 / Pre-Student</option>
          <option value="status-1">生徒 / Student</option>
          <option value="status-2">卒業 / Graduate</option>
        </select>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formOccupation" class="col-4 col-form-label">ご職業</label>
      <div class="col-8">
        <select class="form-control" id="formOccupation" name="occupation" data-action="change" data-condition="" data-text="Please enter occupation.">
          <option value="" selected hidden disabled>Choose occupation</option>
          <option value="occupation-0">学生 / Student</option>
          <option value="occupation-1">就業者 / Worker</option>
          <option value="occupation-2">フリー / Part-time worker</option>
        </select>
        <div class="invalid-tooltip">
          Please enter occupation.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formRemarks" class="col-4 col-form-label">備考</label>
      <div class="col-8">
        <textarea class="form-control" id="formRemarks" name="remarks" placeholder="" rows="4" style="min-height: 100px;"></textarea>
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