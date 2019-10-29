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

        @elseif ($currForm == 2)
        <span class="d-block h4">基本情報</span>

        @else
        <span class="d-block h4">その他</span>
        @endif
      </h1>
    </div>
  </div>

  @if ($currForm == 1)
  <form class="form-company1 needs-validation p-5 px-5 mb-4" action="" method="POST" novalidate>
    
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
  <form class="form-company2 needs-validation pt-3 pb-5 px-5 mb-4" action="" method="POST" novalidate>
    
    <div class="form-group pb-3 row">
      <label for="formCompanyName" class="col-4 col-form-label">会社名</label>
      <div class="col-8">
        <input type="text" class="form-control" id="formCompanyName" name="companyname" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter company name. 
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCompanyIntro" class="col-4 col-form-label">会社紹介</label>
      <div class="col-8">
        <textarea class="form-control" id="formCompanyIntro" name="companyintro" placeholder="" rows="4" style="min-height: 100px;"></textarea>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCompanyHomepage" class="col-4 col-form-label">HPアドレス</label>
      <div class="col-8">
        <input type="url" class="form-control" id="formCompanyHomepage" name="companyhomepage" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter your homepage. 
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCompanyAddress" class="col-4 col-form-label">住所(番地まで)</label>
      <div class="col-8">
        <input type="text" class="form-control" id="formCompanyAddress" name="companyaddress" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter your company address.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCompanyCurrent" class="col-4 col-form-label">住所(ビル名、部屋番号)</label>
      <div class="col-8">
        <input type="text" class="form-control" id="formCompanyCurrent" name="companycurrent" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter your company current address.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCompanyLogo" class="col-4 col-form-label">会社ロゴ(128x128px)</label>
      <div class="col-8">
        <input type="file" class="form-control" id="formCompanyLogo" name="companylogo" accept="image/png, image/jpeg" required>
        <div class="invalid-tooltip">
          Please enter your company logo.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCompanyEyecatch" class="col-4 col-form-label">アイキャッチ</label>
      <div class="col-8">
        <input type="file" class="form-control" id="formCompanyEyecatch" name="companyeyecatch" accept="image/png, image/jpeg" required>
        <div class="invalid-tooltip">
          Please enter your company eyecatch.
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
  <form class="form-company3 needs-validation pt-3 pb-5 px-5 mb-4" action="" method="POST" novalidate>
    
    <div class="form-group pb-3 row">
      <label for="formCompanyFounder" class="col-4 col-form-label">創業者</label>
      <div class="col-8">
        <input type="text" class="form-control" id="formCompanyFounder" name="companyfounder" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter company founder.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCompanyEmployees" class="col-4 col-form-label">社員数</label>
      <div class="col-8">
        <input type="number" class="form-control" id="formCompanyEmployees" name="companyemployees" min="1" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter number of employees.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCompanyEst" class="col-4 col-form-label">設立年月</label>
      <div class="col-8">
        <div class="input-group">
          <input type="text" class="form-control js-datepicker" id="formCompanyEst" name="companyest" placeholder="" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-fw fa-calendar-alt"></i>
            </div>
          </div>
          <div class="invalid-tooltip">
            Please enter company established date.
          </div>
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCompanyIndustry" class="col-4 col-form-label">業種</label>
      <div class="col-8">
        <select class="form-control" id="formCompanyIndustry" name="companyindustry" data-action="change" data-condition="" data-text="Please choose your industry.">
          <option value="" selected hidden disabled>Choose industry</option>
          <option value="industry-it">IT</option>
          <option value="industry-nonit">Non-IT</option>
        </select>
        <div class="invalid-tooltip">
          Please choose your industry.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCompanyFB" class="col-4 col-form-label">Facebook</label>
      <div class="col-8">
        <input type="url" class="form-control" id="formCompanyFB" name="companyfb" placeholder="">
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCompanyTwitter" class="col-4 col-form-label">Twitter</label>
      <div class="col-8">
        <input type="url" class="form-control" id="formCompanyTwitter" name="companytwitter" placeholder="">
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCompanyInstagram" class="col-4 col-form-label">Instagram</label>
      <div class="col-8">
        <input type="url" class="form-control" id="formCompanyInstagram" name="companyinstagram" placeholder="">
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