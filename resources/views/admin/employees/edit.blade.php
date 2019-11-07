@extends('admin.layouts.default')

@section('pageTitle', "Edit {$employee->display_name}")

@section('content')
  <div class="l-container">
    <div class="employee-detail">
      <div class="employee-detail-top py-4">
        <div class="shadow-sm card card-employee-detail">
          <div class="card-body">
            <div class="card-body-img text-center">
              <img src="{{ $employee->avatar }}" class="avatar avatar-md">
            </div>
            <div class="card-body-main mt-3">
              <h3 class="text-center">{{ $employee->display_name }}</h3>

              <div class="card-actions card-actions-right position-absolute">
                <a href="{{ route('admin.employees.show', $employee) }}" class="card-link mr-3">
                  <i class="fas fa-chevron-circle-left"></i> Back
                </a>
                <button type="submit" form="editForm" class="alt-font btn btn-primary btn-submit">更新する</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="employee-detail-main pb-4">

        @if ($errors->any())
          <div class="alert alert-danger pb-0">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="{{ route('admin.employees.update', $employee) }}" enctype="multipart/form-data" novalidate>
          @csrf
          {{ method_field('PATCH') }}

          <div class="form-group pb-3 row">
            <label for="formJapaneseName" class="col-3 col-form-label font-weight-bold">名前(Japanese)</label>
            <div class="col-9">
              <input type="text" class="form-control" id="formJapaneseName" name="japanese_name" value="{{ $employee->japanese_name }}" placeholder="" required>
              <div class="invalid-tooltip">
                Please enter Japanese name.
              </div>
            </div>
          </div>
          
          <div class="form-group pb-3 row">
            <label for="formName" class="col-3 col-form-label font-weight-bold">名前(English)</label>
            <div class="col-9">
              <input type="text" class="form-control" id="formName" name="name" value="{{ $employee->name }}" placeholder="" required>
              <div class="invalid-tooltip">
                Please enter English name. 
              </div>
            </div>
          </div>

          <div class="form-group pb-3 row">
            <label for="formBirthday" class="col-3 col-form-label font-weight-bold">生年月日</label>
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
            <div class="col-3 font-weight-bold">住所</div>
            <div class="col-9">
              <div class="form-group position-relative">
                <label for="formPrefecture" class="form-label pt-0">Prefecture</label>
                <select class="form-control" id="formPrefecture" name="prefecture" data-action="change"
                  data-condition="" data-text="Please choose your prefecture.">
                  <option value="" selected hidden disabled>Choose prefecture</option>
                  @foreach($prefectures as $index => $name)
                    <option value="{{ $index }}" {{ ($index == $employee->prefecture) ? 'selected' : null }}>{{ $name }}</option>
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
            <label for="formSex" class="col-3 col-form-label font-weight-bold">性別</label>
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
            <label for="formContactNumber" class="col-3 col-form-label font-weight-bold">電話番号</label>
            <div class="col-9">
              <input type="text" class="form-control" id="formContactNumber" name="contact_number" value="{{ $employee->contact_number }}" placeholder="">
            </div>
          </div>

          <div class="form-group pb-3 row">
            <label for="formEmail" class="col-3 col-form-label font-weight-bold">メールアドレス</label>
            <div class="col-9">
              <input type="text" class="form-control" id="formEmail" name="email" value="{{ $employee->email }}" placeholder="" required>
              <div class="invalid-tooltip">
                Please enter your email.
              </div>
            </div>
          </div>

          <div class="form-group pb-3 row">
            <label for="formStatus" class="col-3 col-form-label font-weight-bold">ステータス</label>
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
            <label for="formCountry" class="col-3 col-form-label font-weight-bold">国籍</label>
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
            <label for="formPositionId" class="col-3 col-form-label font-weight-bold">ポジション</label>
            <div class="col-9">
              <select class="form-control" id="formPositionId" name="position_id">
                <option value="" selected hidden disabled>Choose position</option>
                @foreach($positions as $index => $name)
                <option value="{{ $index }}" {{ ($index == $employee->position_id) ? 'selected' : null }}>{{ ucwords($name) }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group pb-3 row">
            <label for="formAvatar" class="col-3 col-form-label font-weight-bold">アバター</label>
            <div class="col-9" data-group="avatar">
              <input data-avatar="file" type="file" class="form-control-file" id="formAvatar" name="avatar" accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
              <div class="input-group">
                <input data-avatar="name" type="text" class="form-control" value="{{ $employee->avatar ?? null }}" disabled required>
                <div class="input-group-append">
                  <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
                </div>
                <div class="invalid-tooltip">
                  Please choose your avatar.
                </div>
              </div>

              <div class="mt-3">
                <img data-avatar="preview" class="avatar avatar-md border border-secondary my-3" src="{{ $employee->avatar ?? 'https://placehold.it/80x80' }}">
              </div>
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

@section('js')
  <script src="{{ asset('js/register.js') }}"></script>
  <script src="{{ asset('js/editform.js') }}"></script>
@endsection