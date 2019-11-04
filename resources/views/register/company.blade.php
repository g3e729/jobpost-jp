@extends('layouts.register')

@section('content')
  <div class="form-header">
    <div class="progress progress-form" style="height: 18px;">
      <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-anim-{{ $step }}" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100" data-progress="{{ $progress.'%' }}">{{ $step }}/2</div>
    </div>

    <div class="py-4 text-center alt-font">
      <h1 class="h5">新規登録
        @if ($step == 1)
        <span class="d-block h4">パスワード</span>

        @else
        <span class="d-block h4">その他</span>
        @endif
      </h1>
    </div>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form class="form-staff1 needs-validation pt-3 pb-5 px-5 mb-4" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    
    <input type="hidden" name="step" value="{{ $step }}">
    <input type="hidden" name="code" value="{{ $invitation->code }}">
    <input type="hidden" name="email" value="{{ $invitation->email }}">
    <input type="hidden" name="type" value="{{ $invitation->type }}">
    <input type="hidden" name="profile_id" value="{{ $profile_id }}">

    @if ($step == 1)
      
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
          <input type="password" class="form-control" id="formPasswordConfirm" name="password_confirmation" placeholder="" required
            data-action="input" data-condition="password" data-text="Passwords do not match."
          >
          <div class="invalid-tooltip">
            Passwords do not match.
          </div>
        </div>
      </div>

      <hr class="form-divider d-block mb-4">

      <div class="form-group pb-3 row">
        <label for="formCompanyName" class="col-4 col-form-label">名前</label>
        <div class="col-8">
          <input type="text" class="form-control" id="formCompanyName" name="company_name" value="{{ old('company_name') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter company name. 
          </div>
        </div>
      </div>

      <div class="pb-3 row">
        <div class="col-4">住所</div>
        <div class="col-8">
          <div class="form-group position-relative">
            <label for="formCompanyAddress0" class="form-label pt-0">Prefecture</label>
            <select class="form-control" id="formCompanyAddress0" name="prefecture" data-action="change" data-condition="" data-text="Please choose your prefecture.">
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
            <label for="formCompanyAddress1" class="form-label pt-0">番地</label>
            <input type="text" class="form-control" id="formCompanyAddress1" name="address1" value="{{ old('address1') }}" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your house number.
            </div>
          </div>

          <div class="form-group position-relative">
            <label for="formCompanyAddress2" class="form-label pt-0">ビル名 / 部屋番号</label>
            <input type="text" class="form-control" id="formCompanyAddress2" name="address2" value="{{ old('address2') }}" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your building name / room number.
            </div>
          </div>

          <div class="form-group position-relative">
            <label for="formCompanyAddress3" class="form-label pt-0">郵便番号</label>
            <input type="number" class="form-control" id="formCompanyAddress3" name="address3" value="{{ old('address3') }}" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your postal code.
            </div>
          </div>

        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formCompanyFounder" class="col-4 col-form-label">創業者</label>
        <div class="col-8">
          <input type="text" class="form-control" id="formCompanyFounder" name="ceo" value="{{ old('ceo') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter company founder.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formCompanyEmployees" class="col-4 col-form-label">社員数</label>
        <div class="col-8">
          <input type="number" class="form-control" id="formCompanyEmployees" name="number_of_employees" min="1" value="{{ old('number_of_employees') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter number of employees.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formCompanyPhone" class="col-4 col-form-label">電話番号</label>
        <div class="col-8">
          <input type="text" class="form-control" id="formCompanyPhone" name="contact_number" value="{{ old('contact_number') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter a phone number.
          </div>
        </div>
      </div>

    @else

      <div class="form-group pb-3 row">
        <label for="formCompanyIntro" class="col-4 col-form-label">会社紹介文</label>
        <div class="col-8">
          <textarea class="form-control" id="formCompanyIntro" name="description" placeholder="" rows="4" style="min-height: 100px;" required>{{ old('description') }}</textarea>
          <div class="invalid-tooltip">
            Please enter your company's introduction. 
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formCompanyAvatar" class="col-4 col-form-label">アバター</label>
        <div class="col-8">
          <input type="file" class="form-control" id="formCompanyAvatar" name="avatar" accept="image/png, image/jpeg" required>
          <div class="invalid-tooltip">
            Please enter your company avatar.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formCompanyEyecatch" class="col-4 col-form-label">アイキャッチ</label>
        <div class="col-8">
          <input type="file" class="form-control" id="formCompanyEyecatch" name="cover_photo" accept="image/png, image/jpeg" required>
          <div class="invalid-tooltip">
            Please enter your company eyecatch.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formCompanyIndustry" class="col-4 col-form-label">業種、業界</label>
        <div class="col-8">
          <select class="form-control" id="formCompanyIndustry" name="industry_id" data-action="change" data-condition="" data-text="Please choose your industry.">
            <option value="" selected hidden disabled>Choose industry</option>
            @foreach($industries as $index => $name)
              <option value="{{ $index }}">{{ ucwords($name) }}</option>
            @endforeach
          </select>
          <div class="invalid-tooltip">
            Please choose your industry.
          </div>
        </div>
      </div>
      
      <div class="form-group pb-3 row">
        <label for="formCompanyHomepage" class="col-4 col-form-label">HP(URL)</label>
        <div class="col-8">
          <input type="url" class="form-control" id="formCompanyHomepage" name="homepage" value="{{ old('homepage') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter your homepage. 
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formCompanyEst" class="col-4 col-form-label">設立年月</label>
        <div class="col-8">
          <div class="input-group">
            <input type="text" class="form-control js-datepicker" id="formCompanyEst" name="established_date" value="{{ old('established_date') }}" placeholder="" required>
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

    @endif

    <div class="form-group row">
      <div class="col-6 pt-4 mx-auto">
        <button type="submit" class="alt-font btn btn-primary btn-rounded w-100">送信</button>
      </div>
    </div>
    
  </form>
@endsection

@section('js')
  <script src="{{ asset('js/register.js') }}"></script>
  <script>
    $('.js-datepicker').datepicker({
      format: 'yyyy-mm-dd',
    });
  </script>
@endsection