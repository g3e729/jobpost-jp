@extends('admin.layouts.default')

@section('pageTitle', $employee->display_name)

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
                <a href="{{ route('admin.employees.edit', $employee) }}" class="card-link">詳細</a>
                <a href="/employees/1/delete" class="card-link text-muted">削除</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="employee-detail-main pb-4">
        <table class="table">
          <tbody>
            <tr>
              <td style="width: 25%" class="font-weight-bold">名前(Japanese)</td>
              <td>{{ $employee->japanese_name }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">名前(English)</td>
              <td>{{ $employee->name }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">生年月日</td>
              <td>{{ $employee->birthday->format('Y年m月d日') }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">住所</td>
              <td>
                <dl>
                  <dt>Prefecture</dt>
                  <dd>{{ $employee->prefecture }}</dd>
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
              <td>{{ $employee->status }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">国籍</td>
              <td>{{ $employee->country }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">ポジション</td>
              <td>{{ $employee->position_id }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">アバター</td>
              <td>
                <img class="avatar avatar-md border border-secondary my-3" src="{{ $employee->avatar }}">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection