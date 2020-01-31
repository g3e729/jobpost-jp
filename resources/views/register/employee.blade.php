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
        <label for="formJapaneseName" class="col col-form-label pr-0">名前(Japanese)</label>
        <div class="col-8">
          <input type="text" class="form-control rounded-0" id="formJapaneseName" name="japanese_name" value="{{ old('japanese_name') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter Japanese name.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formName" class="col col-form-label pr-0">名前(English)</label>
        <div class="col-8">
          <input type="text" class="form-control rounded-0" id="formName" name="name" value="{{ old('name') }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter English name.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formBirthday" class="col col-form-label pr-0">生年月日</label>
        <div class="col-8">
          <div class="input-group">
            <input type="text" class="form-control js-datepicker rounded-0 border-right-0" id="formBirthday" name="birthday" value="{{ old('birthday') }}" placeholder="" required>
            <div class="input-group-append">
              <div class="input-group-text bg-white border-left-0">
                <i class="fas fa-fw fa-calendar-alt text-secondary"></i>
              </div>
            </div>
            <div class="invalid-tooltip">
              Please enter birthdate.
            </div>
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
        <label for="formSex" class="col col-form-label pr-0">性別</label>
        <div class="col-8">
          <select class="form-control form-control-registration rounded-0" id="formSex" name="sex" data-action="change" data-condition="" data-text="Please choose your sex orientation.">
            <option value="" selected hidden disabled></option>
            <option value="m">男</option>
            <option value="f">女</option>
          </select>
          <div class="invalid-tooltip">
            Please choose your sex orientation.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formContactNumber" class="col col-form-label pr-0">電話番号</label>
        <div class="col-8">
          <input type="text" class="form-control rounded-0" id="formContactNumber" name="contact_number" value="{{ old('contact_number') }}" placeholder="">
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formStatus" class="col col-form-label pr-0">ステータス</label>
        <div class="col-8">
          <select class="form-control form-control-registration rounded-0" id="formStatus" name="status" data-action="change" data-condition="" data-text="Please choose your status.">
            <option value="" selected hidden disabled></option>
            @foreach($employment_status as $index => $name)
              <option value="{{ $index }}">{{ mb_convert_case($name, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
          </select>
          <div class="invalid-tooltip">
            Please choose your status.
          </div>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formCountry" class="col col-form-label pr-0">国籍</label>
        <div class="col-8">
          <select class="form-control form-control-registration rounded-0" id="formCountry" name="country">
            <option value="" selected hidden disabled></option>
            @foreach($countries as $index => $name)
              <option value="{{ $index }}">{{ ucwords($name) }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group pb-1 row">
        <label for="formPositionId" class="col col-form-label pr-0">ポジション</label>
        <div class="col-8">
          <select class="form-control form-control-registration rounded-0" id="formPositionId" name="position_id">
            <option value="" selected hidden disabled></option>
            @foreach($positions as $index => $name)
              <option value="{{ $index }}">{{ ucwords($name) }}</option>
            @endforeach
          </select>
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
