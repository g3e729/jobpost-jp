@extends('admin.layouts.default')

@php
$faker = Faker\Factory::create('ja_JP');

$is_confirm = $faker->boolean();
$total_records = $faker->randomDigit;
$company_name = $faker->company . ' ' . $faker->companySuffix;
$company_avatar = $faker->imageUrl(240, 240, 'city');

@endphp

@section('content')
  <div class="l-container py-4">
    <div class="shadow-sm card card-payment-detail">
      <div class="card-body pt-5 px-5">
        <h2 class="card-title w-100 text-truncate">{{ $company_name }}10月分</h2>
        @if ($total_records)
        <p class="card-text text-muted h5 mb-3">購入履歴</p>
        @endif

        <div class="card-deck my-5">
          <div class="card bg-secondary text-white shadow">
            <div class="card-body text-center h6">
              <div class="text-white-50 small">チケット合計金額</div>
              100,000 円
            </div>
          </div>
          <div class="card bg-primary text-white shadow">
            <div class="card-body text-center h6">
              <div class="text-white-50 small">登録費用</div>
              50,000 円
            </div>
          </div>
          <div class="card bg-danger text-white shadow">
            <div class="card-body h5">
              <span class="text-white-50 small" style="margin-top: 8px; display: inline-block;">合計</span>
              150,000 円
            </div>
          </div>
        </div>

        @if ($total_records)
        <table class="table table-striped table-hover mt-5 mb-4">
          <thead>
            <tr>
              <th width="450px">アカウント</th>
              <th>価格</th>
              @if (!$is_confirm)
              <th width="90px">&nbsp;</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @for ($i = 0; $i < $total_records; $i++)
            <tr>
              <td class="d-flex">
                <img src="{{ $company_avatar }}" class="card-image float-left rounded-circle" style="max-width: 64px;">
                <div class="ml-3">
                  <h3 class="font-weight-bold h6">{{ $company_name }}</h3>
                  <p class="text-muted mb-0">{{ $faker->randomElement($array = array ('15', '30', '45')) }}枚チケットを購入しました</p>
                  <time>{{ $faker->dateTime->format('Y-m-d') }}</time>
                </div>
              </td>
              <td>{{ $faker->randomElement($array = array ('1', '2', '3', '4')) . '0,0000円' }}</td>
              @if (!$is_confirm)
              <td>
                <div class="payment-actions d-flex justify-content-between">
                  <a href="{{ route('admin.payments.ticket.delete', [0, $i]) }}" class="btn btn-link p-0 js-ticket-delete" data-type="delete">削除</a>
                </div>
              </td>
              @endif
            </tr>
            @endfor
          </tbody>
        </table>
        @endif

        <div class="text-right">
          @if (!$is_confirm)
          <a href="{{ route('admin.payments.show', 0) }}" id="js-payment-submit" class="btn btn-primary btn-submit my-3 w-25" data-type="submit">入金確認</a>
          @else
          <a href="{{ route('admin.tickets.index') }}" class="btn btn-primary btn-submit my-3 w-25">入金確認済み</a>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="js-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">...</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
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
    const deleteButtons = document.querySelectorAll('.js-ticket-delete');
    const submitButton = document.querySelector('#js-payment-submit');
    const modalSubmit = document.querySelector('#js-modal-submit');
    const modal = document.querySelector('#js-modal');
    const pageButtons = [...deleteButtons, submitButton];
    let currTarget;

    if (!pageButtons.includes(null)) {
      pageButtons.forEach(btn => {
        btn.addEventListener('click', function(event) {
          if (this.dataset.type === 'delete') {
            modal.querySelector('.modal-title').textContent = '削除';
            modal.querySelector('.modal-body').textContent = `{{ $company_name }} sure want to delete purchase of {{ $faker->randomElement($array = array ('1', '2', '3', '4')) . '0'  }} tickets?`; // KAM: Finalize format
          } else {
            modal.querySelector('.modal-title').textContent = '確認する';
            modal.querySelector('.modal-body').textContent = `{{ $company_name }} willing to renew subscription?`; // KAM: Finalize format
          }

          $(modal).modal('show');
          currTarget = event.currentTarget.href;

          event.preventDefault();
        })
      });
    }

    modalSubmit.addEventListener('click', function(event) {
      $(modal).modal('hide');
      window.location.replace(currTarget);
    });
  </script>
@endsection
