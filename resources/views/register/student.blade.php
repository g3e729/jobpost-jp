@extends('layouts.register')

@section('content')
  <div class="form-header">
    <div class="progress progress-form" style="height: 18px;">
      <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-anim-{{ $step }}" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100" data-progress="{{ $progress.'%' }}">{{ $step }}/2</div>
    </div>

    <div class="py-4 text-center alt-font">
      <h1 class="h5">新規登録
      @if ($step == 1)
        <span class="d-block h4">基本情報</span>
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
        <label for="formNameJP" class="col-4 col-form-label">名前(Japanese)</label>
        <div class="col-8">
          <input type="text" class="form-control" id="formNameJP" name="japanese_name" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter Japanese name. 
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formNameEN" class="col-4 col-form-label">名前(English)</label>
        <div class="col-8">
          <input type="text" class="form-control" id="formNameEN" name="name" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter English name.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formBirthDate" class="col-4 col-form-label">生年月日</label>
        <div class="col-8">
          <div class="input-group">
            <input type="text" class="form-control js-datepicker" id="formBirthDate" name="birthday" placeholder="" required>
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
            <select class="form-control" id="formAddress0" name="prefecture" data-action="change" data-condition="" data-text="Please choose your prefecture.">
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
            <option value="m">男</option>
            <option value="f">女</option>
          </select>
          <div class="invalid-tooltip">
            Please choose your sex orientation.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formPhone" class="col-4 col-form-label">電話番号</label>
        <div class="col-8">
          <input type="text" class="form-control" id="formPhone" name="contact_number" placeholder="" required>
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

    @else

      <div class="form-group pb-3 row">
        <label for="formFee" class="col-4 col-form-label">留学費用</label>
        <div class="col-8">
          <input type="number" class="form-control" id="formFee" name="study_aboard_fee" min="0" placeholder="">
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formEnrollDate" class="col-4 col-form-label">入学日</label>
        <div class="col-8">
          <div class="input-group">
            <input type="text" class="form-control js-datepicker" id="formEnrollDate" name="enrollment_date" placeholder="" required>
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
            <input type="text" class="form-control js-datepicker" id="formGraduationDate" name="graduation_date" placeholder="" required>
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
              @foreach($student_status as $index => $name)
                <option value="{{ $index }}">{{ $name }}</option>
              @endforeach
          </select>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formOccupation" class="col-4 col-form-label">ご職業</label>
        <div class="col-8">
          <select class="form-control" id="formOccupation" name="occupation" data-action="change" data-condition="" data-text="Please enter occupation.">
            <option value="" selected hidden disabled>Choose occupation</option>
              @foreach($occupations as $index => $name)
                <option value="{{ $index }}">{{ $name }}</option>
              @endforeach
          </select>
          <div class="invalid-tooltip">
            Please enter occupation.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formRemarks" class="col-4 col-form-label">備考</label>
        <div class="col-8">
          <textarea class="form-control" id="formRemarks" name="description" placeholder="" rows="4" style="min-height: 100px;"></textarea>
        </div>
      </div>

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