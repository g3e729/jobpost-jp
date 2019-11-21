<form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="{{ route('admin.companies.update', $company) }}" enctype="multipart/form-data" novalidate>
  @csrf
  {{ method_field('PATCH') }}

  <div class="form-group pb-3 row">
    <label for="formCompanyName" class="col-3 col-form-label font-weight-bold">名前</label>
    <div class="col-9">
      <input type="text" class="form-control" id="formCompanyName" name="company_name"
        value="{{ $company->company_name }}" placeholder="" required>
      <div class="invalid-tooltip">
        Please enter company name.
      </div>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formIntro" class="col-3 col-form-label font-weight-bold">会社紹介文</label>
    <div class="col-9">
      <textarea class="form-control" id="formIntro" name="description" placeholder="" rows="4"
        style="min-height: 100px;" required>{{ $company->description }}</textarea>
      <div class="invalid-tooltip">
        Please enter your company's introduction.
      </div>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formHomepage" class="col-3 col-form-label font-weight-bold">HP(URL)</label>
    <div class="col-9">
      <input type="url" class="form-control" id="formHomepage" name="homepage" value="{{ $company->homepage }}"
        placeholder="" required>
      <div class="invalid-tooltip">
        Please enter your homepage.
      </div>
    </div>
  </div>

  <div class="pb-3 row">
    <div class="col-3 font-weight-bold">住所</div>
    <div class="col-9">
      <div class="form-group position-relative">
        <label for="formPrefecture" class="form-label pt-0">Prefecture</label>
        <select class="form-control" id="formPrefecture" name="prefecture" data-action="change"
          data-condition="" data-text="Please choose your prefecture.">
          <option value="" selected hidden disabled>Choose prefecture</option>
          @foreach($prefectures as $index => $name)
          <option value="{{ $index }}" {{ ($index == $company->prefecture) ? 'selected' : null }}>{{ $name }}
          </option>
          @endforeach
        </select>
        <div class="invalid-tooltip">
          Please choose your prefecture.
        </div>
      </div>

      <div class="form-group position-relative">
        <label for="formAddress1" class="form-label pt-0">番地</label>
        <input type="text" class="form-control" id="formAddress1" name="address1"
          value="{{ $company->address1 }}" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter your house number.
        </div>
      </div>

      <div class="form-group position-relative">
        <label for="formAddress2" class="form-label pt-0">ビル名 / 部屋番号</label>
        <input type="text" class="form-control" id="formAddress2" name="address2"
          value="{{ $company->address2 }}" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter your building name / room number.
        </div>
      </div>

      <div class="form-group position-relative">
        <label for="formAddress3" class="form-label pt-0">郵便番号</label>
        <input type="number" class="form-control" id="formAddress3" name="address3"
          value="{{ $company->address3 }}" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter your postal code.
        </div>
      </div>

    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formCeo" class="col-3 col-form-label font-weight-bold">創業者</label>
    <div class="col-9">
      <input type="text" class="form-control" id="formCeo" name="ceo" value="{{ $company->ceo }}" placeholder=""
        required>
      <div class="invalid-tooltip">
        Please enter company founder.
      </div>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formNumberOfEmployees" class="col-3 col-form-label font-weight-bold">社員数</label>
    <div class="col-9">
      <input type="number" class="form-control" id="formNumberOfEmployees" name="number_of_employees" min="1"
        value="{{ $company->number_of_employees }}" placeholder="" required>
      <div class="invalid-tooltip">
        Please enter number of employees.
      </div>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formEmail" class="col-3 col-form-label font-weight-bold">メールアドレス</label>
    <div class="col-9">
      <input type="text" class="form-control" id="formEmail" name="email" value="{{ $company->email }}" placeholder="" required>
      <div class="invalid-tooltip">
        Please enter your email.
      </div>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formEstablishedDate" class="col-3 col-form-label font-weight-bold">設立年月</label>
    <div class="col-9">
      <div class="input-group">
        <input type="text" class="form-control js-datepicker" id="formEstablishedDate" name="established_date"
          value="{{ $company->established_date->format('Y-m-d') }}" placeholder="" required>
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
    <label for="formIndustryId" class="col-3 col-form-label font-weight-bold">業種、業界</label>
    <div class="col-9">
      <select class="form-control" id="formIndustryId" name="industry_id" data-action="change" data-condition=""
        data-text="Please choose your industry.">
        <option value="" selected hidden disabled>Choose industry</option>
        @foreach($industries as $index => $name)
        <option value="{{ $index }}" {{ ($index == $company->industry_id) ? 'selected' : null }}>
          {{ ucwords($name) }}</option>
        @endforeach
      </select>
      <div class="invalid-tooltip">
        Please choose your industry.
      </div>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formFacebook" class="col-3 col-form-label font-weight-bold">Facebook</label>
    <div class="col-9">
      <input type="url" class="form-control" id="formFacebook" name="social_media[facebook]" value="{{ $company->social_media_accounts['facebook'] ?? '' }}"
        placeholder="">
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formTwitter" class="col-3 col-form-label font-weight-bold">Twitter</label>
    <div class="col-9">
      <input type="url" class="form-control" id="formTwitter" name="social_media[twitter]" value="{{ $company->social_media_accounts['twitter'] ?? '' }}"
        placeholder="">
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formInstagram" class="col-3 col-form-label font-weight-bold">Instagram</label>
    <div class="col-9">
      <input type="url" class="form-control" id="formInstagram" name="social_media[instagram]"
        value="{{ $company->social_media_accounts['instagram'] ?? '' }}" placeholder="">
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formAvatar" class="col-3 col-form-label font-weight-bold">アバター</label>
    <div class="col-9" data-group="avatar">
      <div class="pb-3 d-inline-flex flex-column align-items-center">
        <img data-avatar="preview" class="avatar avatar-md border border-secondary mb-3" src="{{ $company->avatar }}">
        <button data-avatar="delete" type="button" class="alt-font btn btn-danger w-100 mb-2" {{ isset($company->avatar) && $company->avatar ? null : 'disabled'}}>Delete</button>
      </div>

      <input data-avatar="hidden" type="hidden" name="avatar_deleted" value="0">
      <input data-avatar="file" type="file" class="form-control-file" id="formAvatar" name="avatar"
        accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
      <div class="input-group">
        <input data-avatar="name" type="text" class="form-control" value="{{ $company->avatar ?? null }}"
          disabled required>
        <div class="input-group-append">
          <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
        </div>
        <div class="invalid-tooltip">
          Please choose your avatar.
        </div>
      </div>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formCoverPhoto" class="col-3 col-form-label font-weight-bold">アイキャッチ</label>
    <div class="col-9" data-group="eyecatch">
      <div class="pb-3 d-inline-flex flex-column align-items-center">
        <img data-avatar="preview" class="img-fluid border border-secondary mb-3" src="{{ $company->cover_photo ?? 'https://placehold.it/240x240' }}">
        <button data-avatar="delete" type="button" class="alt-font btn btn-danger w-100 mb-2" {{ isset($company->cover_photo) && $company->cover_photo ? null : 'disabled'}}>Delete</button>
      </div>

      <input data-avatar="hidden" type="hidden" name="cover_photo_deleted" value="0">
      <input data-avatar="file" type="file" class="form-control-file" id="formCoverPhoto" name="cover_photo"
        accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
      <div class="input-group">
        <input data-avatar="name" type="text" class="form-control" value="{{ $company->cover_photo ?? null }}"
          disabled required>
        <div class="input-group-append">
          <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
        </div>
        <div class="invalid-tooltip">
          Please enter your company eyecatch.
        </div>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-6 py-4 mx-auto">
      <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
    </div>
  </div>
</form>
