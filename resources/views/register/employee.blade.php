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

  <form class="form-staff1 needs-validation pt-3 pb-5 px-5 mb-4" action="{{ route('register.store') }}" method="POST" novalidate>
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
        <label for="formStaffName" class="col-4 col-form-label">名前(Japanese)</label>
        <div class="col-8">
          <input type="text" class="form-control" id="formStaffName" name="japanese_name" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter Japanese name. 
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formStaffName" class="col-4 col-form-label">名前(English)</label>
        <div class="col-8">
          <input type="text" class="form-control" id="formStaffName" name="name" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter English name. 
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formStaffBirthdate" class="col-4 col-form-label">生年月日</label>
        <div class="col-8">
          <div class="input-group">
            <input type="text" class="form-control js-datepicker" id="formStaffBirthdate" name="birthday" placeholder="" required>
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
            <label for="formStaffAddress0" class="form-label pt-0">Prefecture</label>
            <select class="form-control" id="formStaffAddress0" name="prefecture" data-action="change" data-condition="" data-text="Please choose your prefecture.">
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
            <label for="formStaffAddress1" class="form-label pt-0">番地</label>
            <input type="text" class="form-control" id="formStaffAddress1" name="address1" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your house number.
            </div>
          </div>

          <div class="form-group position-relative">
            <label for="formStaffAddress2" class="form-label pt-0">ビル名 / 部屋番号</label>
            <input type="text" class="form-control" id="formStaffAddress2" name="address2" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your building name / room number.
            </div>
          </div>

          <div class="form-group position-relative">
            <label for="formStaffAddress3" class="form-label pt-0">郵便番号</label>
            <input type="number" class="form-control" id="formStaffAddress3" name="address3" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your postal code.
            </div>
          </div>

        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formStaffSex" class="col-4 col-form-label">性別</label>
        <div class="col-8">
          <select class="form-control" id="formStaffSex" name="sex" data-action="change" data-condition="" data-text="Please choose your sex orientation.">
            <option value="" selected hidden disabled>Choose sex</option>
            <option value="m">男</option>
            <option value="f">女</option>
          </select>
          <div class="invalid-tooltip">
            Please choose your sex orientation.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formStaffPhone" class="col-4 col-form-label">電話番号</label>
        <div class="col-8">
          <input type="text" class="form-control" id="formStaffPhone" name="contact_number" placeholder="">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-6 pt-4 mx-auto">
          <button type="submit" class="alt-font btn btn-primary btn-rounded w-100">送信</button>
        </div>
      </div>

    @else

      <div class="form-group pb-3 row">
        <label for="formStaffCountry" class="col-4 col-form-label">国籍</label>
        <div class="col-8">
          <select class="form-control" id="formStaffCountry" name="country">
            <option value="" selected hidden disabled>Choose country</option>
            @foreach($countries as $index => $name)
              <option value="{{ $index }}">{{ $name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formStaffPosition" class="col-4 col-form-label">ポジション</label>
        <div class="col-8">
          <select class="form-control" id="formPosition" name="position_id">
            <option value="" selected hidden disabled>Choose position</option>
            @foreach($positions as $index => $name)
              <option value="{{ $index }}">{{ $name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formStaffStatus" class="col-4 col-form-label">ステータス</label>
        <div class="col-8">
          <select class="form-control" id="formStaffStatus" name="status" data-action="change" data-condition="" data-text="Please choose your status.">
            <option value="" selected hidden disabled>Choose status</option>
            @foreach($employment_status as $index => $name)
              <option value="{{ $index }}">{{ $name }}</option>
            @endforeach
          </select>
          <div class="invalid-tooltip">
            Please choose your status.
          </div>
        </div>
      </div>

      {{-- <div class="form-group pb-3 row">
        <label for="formStaffAvatar" class="col-4 col-form-label">アバター</label>
        <div class="col-8">
          <input type="file" class="form-control" id="formStaffAvatar" name="avatar" accept="image/png, image/jpeg" required>
          <div class="invalid-tooltip">
            Please choose your avatar.
          </div>
        </div>
      </div> --}}

      <div class="form-group row">
        <div class="col-6 pt-4 mx-auto">
          <button type="submit" class="alt-font btn btn-primary btn-rounded w-100">送信</button>
        </div>
      </div>

    @endif

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