@extends('employee.layouts.default')

@section('pageTitle', "{$employee->display_name}の情報")

@section('content')
  <div class="l-container">

    <div class="employee-detail">
      <div class="employee-detail-top py-4">
        <div class="shadow-sm card card-employee-detail">
          <div class="card-body">
            <div class="card-actions text-right">
            </div>
            <div class="card-body-img text-center">
              <img src="{{ $employee->avatar }}" class="avatar avatar-md">
            </div>
            <div class="card-body-main mt-3">
              <h3 class="text-center">{{ $employee->display_name ?? '--' }}</h3>

            </div>
          </div>
        </div>
      </div>
      <div class="employee-detail-main pb-4">
        <table class="table">
          <tbody>
            <tr>
              <td style="width: 25%" class="font-weight-bold">名前(Japanese)</td>
              <td>{{ $employee->japanese_name ?? '--' }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">名前(English)</td>
              <td>{{ $employee->name ?? '--' }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">生年月日</td>
              <td>{{ $employee->birthday->format('Y年m月d日') }} / {{ $employee->birthday->diff(now())->format('%y') ?? '--' }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">住所</td>
              <td>
                <dl>
                  <dt>Prefecture</dt>
                  <dd>{{ getPrefecture($employee->prefecture) }}</dd>
                  <dt>番地</dt>
                  <dd>{{ $employee->address1 }}</dd>
                  <dt>ビル名 / 部屋番号</dt>
                  <dd>{{ $employee->address2 }}</dd>
                  <dt>郵便番号</dt>
                  <dd>{{ $employee->address3 }}</dd>
                </dl>
              </td>
            </tr>
            <tr>
              <td class="font-weight-bold">性別</td>
              <td>{{ $employee->sex === 'm' ? '男' : '女' }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">電話番号</td>
              <td>{{ $employee->contact_number }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">メールアドレス</td>
              <td>{{ $employee->email }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">ステータス</td>
              <td>{{ $employee->employment_status }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">国籍</td>
              <td>{{ getCountries($employee->country) }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">ポジション</td>
              <td>{{ $employee->position }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    const deleteButton = document.querySelector('#js-item-delete');
    const modalSubmit = document.querySelector('#js-modal-submit');
    const modal = document.querySelector('#js-delete-modal');
    let currTarget;

    deleteButton.addEventListener('click', function(event) {
      $(modal).modal('show');
      currTarget = event.currentTarget.getAttribute('form');

      event.preventDefault();
    });

    modalSubmit.addEventListener('click', function(event) {
      $(modal).modal('hide');
      document.querySelector(`#${currTarget}`).submit();
    });

  </script>
@endsection
