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
              <option value="" selected hidden disabled>都道府県</option>
              @foreach($prefectures as $index => $name)
                <option value="{{ $index }}">{{ $name }}</option>
              @endforeach
            </select>
            <div class="invalid-tooltip">
              Please choose your prefecture.
            </div>
          </div>

          <div class="form-group position-relative">
            <input type="text" class="form-control rounded-0" id="formAddress1" name="address1" value="{{ old('address1') }}" placeholder="〜番地" required>
            <div class="invalid-tooltip">
              Please enter your house number.
            </div>
          </div>

          <div class="form-group position-relative">
            <input type="text" class="form-control rounded-0" id="formAddress2" name="address2" value="{{ old('address2') }}" placeholder="ビル名 / 部屋番号" required>
            <div class="invalid-tooltip">
              Please enter your building name / room number.
            </div>
          </div>

          <div class="form-group position-relative">
            <input type="number" class="form-control rounded-0" id="formAddress3" name="address3" value="{{ old('address3') }}" placeholder="郵便番号" required>
            <div class="invalid-tooltip">
              Please enter your postal code.
            </div>
          </div>

        </div>
      </div>

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
        <label for="formHomepage" class="col col-form-label pr-0">HP</label>
        <div class="col-8">
          <input type="url" class="form-control rounded-0" id="formHomepage" name="homepage" value="{{ old('homepage') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter your homepage.
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

      <div class="form-group pb-1 row">
        <label for="formAvatar" class="col col-form-label pr-0">アバター</label>
        <div class="col-8" data-group="avatar">
          <div class="pt-4 pb-3 d-inline-flex flex-column align-items-center w-100 border border-bottom-0 form-file-delete">
            <img data-avatar="preview" class="avatar avatar-md mt-2" src="{{ old('avatar') ?? 'https://placehold.it/80x80' }}">
            <button data-avatar="delete" type="button" class="btn mb-2" {{ old('avatar') ? null : 'disabled'}}>
              <i class="fas fa-aw fa-times mr-1"></i>
              画像を削除
            </button>
          </div>

          <input data-avatar="hidden" type="hidden" name="avatar_delete" value="0">
          <input data-avatar="file" type="file" class="form-control-file" id="formAvatar" name="avatar"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group border border-top-0 form-file-browse">
            <input data-avatar="name" type="text" class="form-control" value="{{ old('avatar') ?? null }}"
              disabled required>
            <div class="input-group-append mx-auto">
              <button data-avatar="browse" type="button" class="btn btn-browse">
                <i class="fas fa-aw fa-image text-warning"></i>
                アップロード
              </button>
            </div>
            <div class="invalid-tooltip">
              Please choose your avatar.
            </div>
          </div>
        </div>

      </div>

      <div class="form-group pb-1 row">
        <label for="formCoverPhoto" class="col col-form-label pr-0">背景</label>
        <div class="col-8" data-group="eyecatch">
          <div class="pt-4 pb-3 d-inline-flex flex-column align-items-center w-100 border border-bottom-0 form-file-delete">
            <img data-avatar="preview" class="avatar avatar-full mt-2" src="{{ old('cover_photo') ?? 'https://placehold.it/80x80' }}">
            <button data-avatar="delete" type="button" class="btn mb-2" {{ old('cover_photo') ? null : 'disabled'}}>
              <i class="fas fa-aw fa-times mr-1"></i>
              画像を削除
            </button>
          </div>

          <input data-avatar="hidden" type="hidden" name="cover_photo_delete" value="0">
          <input data-avatar="file" type="file" class="form-control-file" id="formCoverPhoto" name="cover_photo"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group border border-top-0 form-file-browse">
            <input data-avatar="name" type="text" class="form-control" value="{{ old('cover_photo') ?? null }}"
              disabled required>
            <div class="input-group-append mx-auto">
              <button data-avatar="browse" type="button" class="btn btn-browse">
                <i class="fas fa-aw fa-image text-warning"></i>
                アップロード
              </button>
            </div>
            <div class="invalid-tooltip">
              Please enter your company eyecatch.
            </div>
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formIndustryId" class="col col-form-label pr-0">業種、業界</label>
        <div class="col-8">
          <select class="form-control form-control-registration rounded-0" id="formIndustryId" name="industry_id" data-action="change" data-condition="" data-text="Please choose your industry.">
            <option value="" selected hidden disabled></option>
            @foreach($industries as $index => $name)
              <option value="{{ $index }}">{{ ucwords($name) }}</option>
            @endforeach
          </select>
          <div class="invalid-tooltip">
            Please choose your industry.
          </div>
        </div>
      </div>

    @else

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

      <div class="pb-1 row">
        <div class="col pr-0 pt-2">SNSアカウント</div>
        <div class="col-8">
          <div class="form-group position-relative">
            <input type="url" class="form-control rounded-0" id="formFacebook" name="social_media[facebook]" value="{{ old('social_media[facebook]') }}" placeholder="Facebook">
          </div>

          <div class="form-group position-relative">
            <input type="url" class="form-control rounded-0" id="formFacebook" name="social_media[instagram]" value="{{ old('social_media[instagram]') }}" placeholder="Instagram">
          </div>

          <div class="form-group position-relative">
            <input type="url" class="form-control rounded-0" id="formFacebook" name="social_media[twitter]" value="{{ old('social_media[twitter]') }}" placeholder="Twitter">
          </div>

        </div>
      </div>

    @endif

    <div class="form-group row">
      <div class="col-6 pt-4 mx-auto">
        <button type="submit" class="btn btn-capsule btn-rounded w-100">
          @if ($step == 1)
            次のページ
          @else
            新規作成
          @endif
        </button>
      </div>
    </div>

  </form>
@endsection
