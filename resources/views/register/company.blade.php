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
        <label for="formPassword" class="col col-form-label pr-0">パスワード</label>
        <div class="col-8">
          <input type="password" class="form-control rounded-0" id="formPassword" name="password" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter a password.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formPasswordConfirmation" class="col col-form-label pr-0">パスワードの確認</label>
        <div class="col-8">
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
        <label for="formCompanyName" class="col col-form-label pr-0">名前</label>
        <div class="col-8">
          <input type="text" class="form-control rounded-0" id="formCompanyName" name="company_name" value="{{ old('company_name') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter company name.
          </div>
        </div>
      </div>

      <div class="pb-1 row">
        <div class="col pr-0 pt-2">住所</div>
        <div class="col-8">
          <div class="form-group position-relative">
            <select class="form-control form-control-registration rounded-0" id="formPrefecture" name="prefecture" data-action="change" data-condition="" data-text="Please choose your prefecture.">
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
        <label for="formCeo" class="col col-form-label pr-0">創業者</label>
        <div class="col-8">
          <input type="text" class="form-control rounded-0" id="formCeo" name="ceo" value="{{ old('ceo') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter company founder.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formNumberOfEmployees" class="col col-form-label pr-0">社員数</label>
        <div class="col-8">
          <input type="number" class="form-control rounded-0" id="formNumberOfEmployees" name="number_of_employees" min="1" value="{{ old('number_of_employees') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter number of employees.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formContactNumber" class="col col-form-label pr-0">電話番号</label>
        <div class="col-8">
          <input type="text" class="form-control rounded-0" id="formContactNumber" name="contact_number" value="{{ old('contact_number') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter a phone number.
          </div>
        </div>
      </div>

    @else

      <div class="form-group pb-1 row">
        <label for="formIntro" class="col col-form-label pr-0">会社紹介文</label>
        <div class="col-8">
          <textarea class="form-control rounded-0" id="formIntro" name="description" placeholder="" rows="4" style="min-height: 100px;" required>{{ old('description') }}</textarea>
          <div class="invalid-tooltip">
            Please enter your company's introduction.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formAvatar" class="col col-form-label pr-0">アバター</label>
        <div class="col-8">
          <input type="file" class="form-control-file" id="formAvatar" name="avatar" accept="image/png, image/jpeg" required>
          <div class="invalid-tooltip">
            Please enter your company avatar.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formCoverPhoto" class="col col-form-label pr-0">アイキャッチ</label>
        <div class="col-8">
          <input type="file" class="form-control-file" id="formCoverPhoto" name="cover_photo" accept="image/png, image/jpeg" required>
          <div class="invalid-tooltip">
            Please enter your company eyecatch.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formIndustryId" class="col col-form-label pr-0">業種、業界</label>
        <div class="col-8">
          <select class="form-control form-control-registration rounded-0" id="formIndustryId" name="industry_id" data-action="change" data-condition="" data-text="Please choose your industry.">
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

      <div class="form-group pb-1 row">
        <label for="formHomepage" class="col col-form-label pr-0">HP(URL)</label>
        <div class="col-8">
          <input type="url" class="form-control rounded-0" id="formHomepage" name="homepage" value="{{ old('homepage') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter your homepage.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formEstablishedDate" class="col col-form-label pr-0">設立年月</label>
        <div class="col-8">
          <div class="input-group">
            <input type="text" class="form-control js-datepicker rounded-0 border-right-0" id="formEstablishedDate" name="established_date" value="{{ old('established_date') }}" placeholder="" required>
            <div class="input-group-append">
              <div class="input-group-text bg-white border-left-0">
                <i class="fas fa-fw fa-calendar-alt text-secondary"></i>
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
        <button type="submit" class="btn btn-capsule btn-rounded w-100">ログイン</button>
      </div>
    </div>

  </form>
@endsection
