@extends('layouts.register')

@section('content')
  <div class="form-header">
    <div class="progress progress-form" style="height: 10px;">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
    </div>

    <div class="py-4 text-center alt-font">
      <h1 class="h4">新規登録</h1>
    </div>
  </div>

  <form class="user needs-validation pt-3 pb-5 px-5 mb-4" method="POST" novalidate>
    
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
        </div>
        <div class="invalid-tooltip">
          Please enter birthdate.
        </div>
      </div>
    </div>

    <!-- <div class="form-group pb-3 row">
      <div class="col-4">11</div>
      <div class="col-8"
      
        <label for="formAddress" class="col-4 col-form-label">住所</label>
        <input type="text" class="form-control" id="formAddress" name="address" placeholder="" required>
        <div class="invalid-tooltip">
          Please enter an address.
        </div>


      </div>
    </div> -->

    <div class="form-group row">
      <div class="col-6 pt-4 mx-auto">
        <button type="submit" class="alt-font btn btn-primary btn-rounded w-100">送信</button>
      </div>
    </div>

  </form>
@endsection

@section('js')
  <script>
    console.log('aaaa');
    $('.js-datepicker').datepicker({
    });
  </script>
@endsection