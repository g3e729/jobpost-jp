@extends('admin.layouts.default')

@section('pageTitle', "{$employee->display_name}の情報")

@section('content')
  <div class="l-container">

    @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
      </div>
    @endif

    <div class="employee-detail">
      <div class="employee-detail-top py-4">
        <div class="shadow-sm card card-employee-detail">
          <div class="card-body">
            <div class="card-actions text-right">
              <a href="{{ route('admin.employees.edit', $employee) }}" class="card-link">編集する</a>
              <button id="js-item-delete" type="submit" form="deleteForm" class="btn btn-link text-decoration-none text-muted">削除</button>
              <form id="deleteForm" method="POST" action="{{ route('admin.employees.destroy', $employee) }}" novalidate style="visibility: hidden; position: absolute;">
                @csrf
                {{ method_field('DELETE') }}

                <button type="submit">削除</button>
              </form>
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
                  <dd>
                    <a href="{{ route('admin.employees.index', ['prefecture' => $employee->prefecture]) }}">
                      {{ $employee->prefecture ? getPrefecture($employee->prefecture) : '--' }}
                    </a>
                  </dd>
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
              <td>
                <a href="{{ route('admin.employees.index', ['status' => $employee->status]) }}">
                  {{ $employee->employment_status }}
                </a>
              </td>
            </tr>
            <tr>
              <td class="font-weight-bold">国籍</td>
              <td>
                <a href="{{ route('admin.employees.index', ['country' => $employee->country]) }}">
                  {{ getCountries($employee->country) }}
                </a>
              </td>
            </tr>
            <tr>
              <td class="font-weight-bold">ポジション</td>
              <td>
                <a href="{{ route('admin.employees.index', ['position_id' => $employee->position_id]) }}">
                  {{ $employee->position }}
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="js-delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">削除</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          この従業員を削除してもよろしいですか？
        </div>
        <div class="modal-footer">
          <button type="button" class="alt-font btn btn-secondary" data-dismiss="modal">キャンセル</button>
          <button id="js-modal-submit" type="button" class="alt-font btn btn-primary">確認する</button>
        </div>
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
