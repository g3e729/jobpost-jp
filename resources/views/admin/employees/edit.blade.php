@extends('admin.layouts.default')

@section('pageTitle', "Edit {$employee->display_name}")

@section('content')
  <div class="l-container">
    <div class="employee-detail">
      <div class="employee-detail-top py-4">
        <div class="shadow-sm card card-employee-detail">
          <div class="card-body">
            <div class="card-body-img text-center">
              <img src="{{ $employee->avatar }}" class="card-image card-image-x2 rounded-circle">
            </div>
            <div class="card-body-main mt-3">
              <h3 class="text-center">{{ $employee->display_name }}</h3>

              <div class="card-actions card-actions-right position-absolute">
                <a href="#" class="card-link">更新する</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="employee-detail-main pb-4">
        <form class="needs-validation py-2 mb-4" method="POST" action="" novalidate>
          @csrf
          <div class="form-group pb-3 row">
            <label for="formTitle" class="col-3 col-form-label">名前(Japanese)</label>
            <div class="col-9">
              <input type="text" class="form-control" id="formJapaneseName" name="japanese_name" value="{{ $employee->japanese_name }}" placeholder="" required>
              <div class="invalid-tooltip">
                Please enter Japanese name.
              </div>
            </div>
          </div>
          
          <div class="form-group pb-3 row">
            <label for="formName" class="col-3 col-form-label">名前(English)</label>
            <div class="col-9">
              <input type="text" class="form-control" id="formName" name="name" value="{{ $employee->name }}" placeholder="" required>
              <div class="invalid-tooltip">
                Please enter English name. 
              </div>
            </div>
          </div>

          <div class="form-group pb-3 row">
            <label for="formBirthday" class="col-3 col-form-label">生年月日</label>
            <div class="col-9">
              <div class="input-group">
                <input type="text" class="form-control js-datepicker" id="formBirthday" name="birthday" value="{{ $employee->birthday->format('Y-m-d') }}" placeholder="" required>
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
            <div class="col-3">住所</div>
            <div class="col-9">
              <div class="form-group position-relative">
                <label for="formPrefecture" class="form-label pt-0">Prefecture</label>
                <select class="form-control" id="formPrefecture" name="prefecture" data-action="change"
                  data-condition="" data-text="Please choose your prefecture.">
                  <option value="" selected hidden disabled>Choose prefecture</option>
                  @foreach($prefectures as $index => $name)
                    @if ($index === $employee->prefecture)
                      <option value="{{ $index }}" selected>{{ $name }}</option>
                    @else
                      <option value="{{ $index }}">{{ $name }}</option>
                    @endif
                  @endforeach
                </select>
                <div class="invalid-tooltip">
                  Please choose your prefecture.
                </div>
              </div>

              <div class="form-group position-relative">
                <label for="formAddress1" class="form-label pt-0">番地</label>
                <input type="text" class="form-control" id="formAddress1" name="address1" value="{{ $employee->address1 }}" placeholder="" required>
                <div class="invalid-tooltip">
                  Please enter your house number.
                </div>
              </div>

              <div class="form-group position-relative">
                <label for="formAddress2" class="form-label pt-0">ビル名 / 部屋番号</label>
                <input type="text" class="form-control" id="formAddress2" name="address2" value="{{ $employee->address2 }}" placeholder="" required>
                <div class="invalid-tooltip">
                  Please enter your building name / room number.
                </div>
              </div>

              <div class="form-group position-relative">
                <label for="formAddress3" class="form-label pt-0">郵便番号</label>
                <input type="number" class="form-control" id="formAddress3" name="address3" value="{{ $employee->address3 }}" placeholder="" required>
                <div class="invalid-tooltip">
                  Please enter your postal code.
                </div>
              </div>

            </div>
          </div>

          <div class="form-group pb-3 row">
            <label for="formSex" class="col-3 col-form-label">性別</label>
            <div class="col-9">
              <select class="form-control" id="formSex" name="sex" data-action="change" data-condition=""
                data-text="Please choose your sex orientation.">
                <option value="" selected hidden disabled>Choose sex</option>
                <option value="m" {{ ('m' == $employee->sex) ? 'selected' : null }}>男</option>
                <option value="f" {{ ('f' == $employee->sex) ? 'selected' : null }}>女</option>
              </select>
              <div class="invalid-tooltip">
                Please choose your sex orientation.
              </div>
            </div>
          </div>

          <div class="form-group pb-3 row">
            <label for="formContactNumber" class="col-3 col-form-label">電話番号</label>
            <div class="col-9">
              <input type="text" class="form-control" id="formContactNumber" name="contact_number" value="{{ $employee->contact_number }}" placeholder="">
            </div>
          </div>

          <div class="form-group pb-3 row">
            <label for="formEmail" class="col-3 col-form-label">メールアドレス</label>
            <div class="col-9">
              <input type="text" class="form-control" id="formEmail" name="email" value="{{ $employee->email }}" placeholder="">
            </div>
          </div>

          <div class="form-group pb-3 row">
            <label for="formStatus" class="col-3 col-form-label">ステータス</label>
            <div class="col-9">
              <select class="form-control" id="formStatus" name="status" data-action="change" data-condition="" data-text="Please choose your status.">
                <option value="" selected hidden disabled>Choose status</option>
                @foreach($employment_status as $index => $name)
                <option value="{{ $index }}" {{ ($index == $employee->status) ? 'selected' : null }}>{{ mb_convert_case($name, MB_CASE_TITLE, 'UTF-8') }}</option>
                @endforeach
              </select>
              <div class="invalid-tooltip">
                Please choose your status.
              </div>
            </div>
          </div>

          <div class="form-group pb-3 row">
            <label for="formCountry" class="col-3 col-form-label">国籍</label>
            <div class="col-9">
              <select class="form-control" id="formCountry" name="country">
                <option value="" selected hidden disabled>Choose country</option>
                @foreach($countries as $index => $name)
                  <option value="{{ $index }}" {{ ($index == $employee->country) ? 'selected' : null }}>{{ ucwords($name) }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group pb-3 row">
            <label for="formPositionId" class="col-3 col-form-label">ポジション</label>
            <div class="col-9">
              <select class="form-control" id="formPositionId" name="position_id">
                <option value="" selected hidden disabled>Choose position</option>
                @foreach($positions as $index => $name)
                <option value="{{ $index }}" {{ ($index == $employee->position_id) ? 'selected' : null }}>{{ ucwords($name) }}</option>
                @endforeach
              </select>
            </div>
          </div>
    
          <div class="form-group row">
            <div class="col-6 py-4 mx-auto">
              <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

