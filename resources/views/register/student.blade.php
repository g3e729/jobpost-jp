@extends('layouts.register')

@section('content')
  <div class="form-header">
    <div class="progress progress-form" style="height: 18px;">
      <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-anim" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" data-progress="33%">1/3</div>
    </div>

    <div class="py-4 text-center alt-font">
      <h1 class="h5">新規登録
        <span class="d-block h4">基本情報</span>
      </h1>
    </div>
  </div>

  <form class="user needs-validation pt-3 pb-5 px-5 mb-4" action="" method="POST" novalidate>
    
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
        <input type="password" class="form-control" id="formPasswordConfirm" name="passwordconfirm" placeholder="" required>
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
        <select class="form-control" id="formSex" name="sex">
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

  <div class="modal fade" id="js-registerModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">アカウントの追加を確認</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to register account?
        </div>
        <div class="modal-footer">
          <button type="button" class="alt-font btn btn-secondary" data-dismiss="modal">閉じる</button>
          <button id="js-modalSubmit" type="button" class="alt-font btn btn-primary">確認する</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    $('.js-datepicker').datepicker();

    const forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        this.sex.setCustomValidity(this.sex.value === "" ? "Please choose your sex orientation." : "");

        if (form.checkValidity() === false) {
          
          event.preventDefault();
          event.stopPropagation();
        } else {
          $(this).unbind('submit').submit();
        }

        form.classList.add('was-validated');
      }, false);


      form.addEventListener('input', function(event) {
        this.passwordconfirm.setCustomValidity(this.passwordconfirm.value != this.password.value ? "Passwords do not match." : "");
      }, false);

      form.addEventListener('change', function(event) {
        this.sex.setCustomValidity(this.sex.value === "" ? "Please choose your sex orientation." : "");
      }, false);
    });
  </script>
@endsection