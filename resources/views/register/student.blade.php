@extends('layouts.register')

@php
$currForm = 1; // Steps 1, 2, or 3
$progressVal = ($currForm / 3) * 100;

@endphp

@section('content')
  <div class="form-header">
    <div class="progress progress-form" style="height: 18px;">
      <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-anim-{{ $currForm }}" role="progressbar" aria-valuenow="{{ $progressVal }}" aria-valuemin="0" aria-valuemax="100" data-progress="{{ $progressVal.'%' }}">{{ $currForm }}/3</div>
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
          Please enter name. 
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formNameEN" class="col-4 col-form-label">名前(English)</label>
      <div class="col-8">
        <input type="text" class="form-control" id="formNameEN" name="nameen" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter name.
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
          <label for="formAddress1" class="form-label pt-0">番地まで</label>
          <input type="text" class="form-control" id="formAddress1" name="address1" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter an address.
          </div>
        </div>

        <div class="form-group position-relative">
          <label for="formAddress2" class="form-label pt-0">ビル名、部屋番号</label>
          <input type="text" class="form-control" id="formAddress2" name="address2" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter your building name / room number.
          </div>
        </div>

        <div class="form-group position-relative">
          <label for="formAddress3" class="form-label pt-0">郵便番号</label>
          <input type="text" class="form-control" id="formAddress3" name="address3" placeholder="" required>
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
          <option value="sex-male">男性</option>
          <option value="sex-female">女性</option>
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

    <div class="form-group pb-3 row">
      <label for="formPassportNumber" class="col-4 col-form-label">パスポート番号</label>
      <div class="col-8">
        <input type="text" class="form-control" id="formPassportNumber" name="passport" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter your passport number.
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
  <form class="form-user2 needs-validation pt-3 pb-5 px-5 mb-4" action="" method="POST" novalidate>

    <div class="form-group pb-3 row">
      <label for="formRoomType" class="col-4 col-form-label">部屋タイプ</label>
      <div class="col-8">
        <select class="form-control" id="formRoomType" name="room" data-action="change" data-condition="" data-text="Please choose your room type.">
          <option value="" selected hidden disabled>Choose room</option>
          <option value="room-a">Room A</option>
          <option value="room-b">Room B</option>
        </select>
        <div class="invalid-tooltip">
          Please choose your room type.
        </div>
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
      <label for="formCheckInDate" class="col-4 col-form-label">チェックイン日</label>
      <div class="col-8">
        <div class="input-group">
          <input type="text" class="form-control js-datepicker" id="formCheckInDate" name="checkin" placeholder="" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-fw fa-calendar-alt"></i>
            </div>
          </div>
          <div class="invalid-tooltip">
            Please enter check-in date.
          </div>
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCheckOutDate" class="col-4 col-form-label">チェックアウト日</label>
      <div class="col-8">
        <div class="input-group">
          <input type="text" class="form-control js-datepicker" id="formCheckOutDate" name="checkout" placeholder="" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-fw fa-calendar-alt"></i>
            </div>
          </div>
          <div class="invalid-tooltip">
            Please enter check-out date.
          </div>
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formCourse" class="col-4 col-form-label">希望コース</label>
      <div class="col-8">
        <select class="form-control" id="formCourse" name="course" data-action="change" data-condition="" data-text="Please choose your desired course.">
          <option value="" selected hidden disabled>Choose course</option>
          <option value="course-a">Course A</option>
          <option value="course-b">Course B</option>
        </select>
        <div class="invalid-tooltip">
          Please choose your desired course.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formDuration" class="col-4 col-form-label">留学期間(週間)</label>
      <div class="col-8">
        <select class="form-control" id="formDuration" name="duration" data-action="change" data-condition="" data-text="Please choose your study duration.">
          <option value="" selected hidden disabled>Choose duration</option>
          <option value="duration-a">Duration A</option>
          <option value="duration-b">Duration B</option>
        </select>
        <div class="invalid-tooltip">
          Please choose your study duration.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formArrangement" class="col-4 col-form-label">航空券手配・海外保険手配</label>
      <div class="col-8">
        <select class="form-control" id="formArrangement" name="arrangement" data-action="change" data-condition="" data-text="Please choose your ticket arrangement.">
          <option value="" selected hidden disabled>Choose arrangement</option>
          <option value="arrangement-a">Arrangement A</option>
          <option value="arrangement-b">Arrangement B</option>
        </select>
        <div class="invalid-tooltip">
          Please choose your ticket arrangement.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formPickup" class="col-4 col-form-label">空港までのお迎え希望</label>
      <div class="col-8">
        <select class="form-control" id="formPickup" name="pickup" data-action="change" data-condition="" data-text="Please choose if you want to be pickup.">
          <option value="" selected hidden disabled>Choose pickup</option>
          <option value="pickup-a">Pickup A</option>
          <option value="pickup-b">Pickup B</option>
        </select>
        <div class="invalid-tooltip">
          Please choose if you want to be pickup.
        </div>
      </div>
    </div>

    <div class="form-group pb-3 row">
      <label for="formProfession" class="col-4 col-form-label">ご職業</label>
      <div class="col-8">
        <input type="text" class="form-control" id="formProfession" name="profession" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter profession.
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
  <form class="form-user3 needs-validation pt-3 pb-5 px-5 mb-4" action="" method="POST" novalidate>

    <div class="pb-3 row">
      <div class="col-4">緊急連絡先</div>
      <div class="col-8">
        <div class="form-group position-relative">
          <label for="formRelName" class="form-label pt-0">名前</label>
          <input type="text" class="form-control" id="formRelName" name="relname" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formRelRelationship" class="form-label pt-0">続柄</label>
          <input type="text" class="form-control" id="formRelRelationship" name="relrelationship" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formRelNumber" class="form-label pt-0">電話番号</label>
          <input type="text" class="form-control" id="formRelNumber" name="relnumber" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formRelEmail" class="form-label pt-0">メールアドレス</label>
          <input type="email" class="form-control" id="formRelEmail" name="relemail" placeholder="">
        </div>

      </div>
    </div>

    <div class="pb-3 row">
      <div class="col-4">既往症の有無</div>
      <div class="col-8">
        <div class="form-group position-relative">
          <label for="formDiseaseHad" class="form-label pt-0">ありなし</label>
          <select class="form-control" id="formDiseaseHad" name="diseasehad" data-action="change" data-condition="" data-text="Please choose.">
            <option value="" selected hidden disabled>Presence of pre-existing disease</option>
            <option value="disease-no">No</option>
            <option value="disease-yes">Yes</option>
          </select>
          <div class="invalid-tooltip">
            Please choose.
          </div>
        </div>

        <div class="form-group position-relative">
          <label for="formDiseaseContent" class="form-label pt-0">内容</label>
          <textarea class="form-control" id="formDiseaseContent" name="diseasecontent" placeholder="" rows="4" style="min-height: 100px;"></textarea>
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