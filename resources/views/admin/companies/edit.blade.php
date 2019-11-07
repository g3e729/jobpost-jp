@extends('admin.layouts.default')

@section('pageTitle', "Edit {$company->display_name}")

@section('content')
  <div class="l-container">
    <div class="company-detail">
      <div class="company-detail-top py-4">
          <div class="shadow-sm card card-company-detail">
            <div class="card-body">
              <div class="card-body-img text-center">
                <img src="{{ $company->avatar }}" class="avatar avatar-md">
              </div>
              <div class="card-body-main mt-3">
                <h3 class="text-center">{{ $company->display_name }}</h3>

                <div class="card-actions card-actions-right position-absolute">
                  <a href="{{ route('admin.companies.show', $company) }}" class="card-link mr-3">
                    <i class="fas fa-chevron-circle-left"></i> Back
                  </a>

                  <button type="submit" form="editForm" class="alt-font btn btn-primary btn-submit">更新する</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="company-detail-main pb-4">
        <ul class="nav nav-pills nav-justified mb-3">
          <li class="nav-item">
            <a href="{{ route('admin.companies.edit', [$company]) }}" class="nav-link alt-font {{ $step == 1 ? 'active' : null }}">基本情報</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.companies.edit', [$company, 'step' => '2']) }}" class="nav-link alt-font  {{ $step == 2 ? 'active' : null }}">プロフィール</a>
          </li>
        </ul>

        @if ($step == 1)
          <form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="" novalidate>
            @csrf
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
                <input type="url" class="form-control" id="formFacebook" name="facebook" value="{{ $company->facebook }}"
                  placeholder="">
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formTwitter" class="col-3 col-form-label font-weight-bold">Twitter</label>
              <div class="col-9">
                <input type="url" class="form-control" id="formTwitter" name="twitter" value="{{ $company->twitter }}"
                  placeholder="">
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formInstagram" class="col-3 col-form-label font-weight-bold">Instagram</label>
              <div class="col-9">
                <input type="url" class="form-control" id="formInstagram" name="instagram"
                  value="{{ $company->instagram }}" placeholder="">
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formAvatar" class="col-3 col-form-label font-weight-bold">アバター</label>
              <div class="col-9" data-group="avatar">
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

                <div class="mt-3">
                  <img data-avatar="preview" class="avatar avatar-md border border-secondary my-3"
                    src="{{ $company->avatar ?? 'https://placehold.it/80x80' }}">
                </div>
              </div>
            </div>

            <div class="form-group pb-3 row">
              <label for="formCoverPhoto" class="col-3 col-form-label font-weight-bold">アイキャッチ</label>
              <div class="col-9" data-group="eyecatch">
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

                <div class="mt-3">
                  <img data-avatar="preview" class="img-fluid border border-secondary my-3"
                    src="{{ $company->cover_photo ?? 'https://placehold.it/240x240' }}">
                </div>

              </div>
            </div>

            <div class="form-group row">
              <div class="col-6 py-4 mx-auto">
                <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
              </div>
            </div>
          </form>
        @else
          <form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="" novalidate>

            ...

            <div class="form-group row">
              <div class="col-6 py-4 mx-auto">
                <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
              </div>
            </div>
          </form>
        @endif

      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/register.js') }}"></script>
  <script src="{{ asset('js/editform.js') }}"></script>
@endsection