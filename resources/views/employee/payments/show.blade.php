@extends('employee.layouts.default')

@section('pageTitle', $payment->transactionable->display_name . ' ' . $payment->bill_date)

@section('content')
  <div class="l-container py-4">
    
    <div class="shadow-sm card card-payment-detail">
      <div class="card-body pt-5 px-5">
        <h2 class="card-title w-100 text-truncate">{{ $payment->transactionable->display_name }} {{ $payment->bill_date }}</h2>
        @if ($payment->tickets->count())
          <p class="card-text text-muted h5 mb-3">購入履歴</p>
        @endif

        <div class="card-deck my-5">
          <div class="card bg-secondary text-white shadow">
            <div class="card-body text-center h6">
              <div class="text-white-50 small">チケット合計金額</div>
              {{ price($payment->ticket_total) }}
            </div>
          </div>
          <div class="card bg-primary text-white shadow">
            <div class="card-body text-center h6">
              <div class="text-white-50 small">登録費用</div>
              {{ price($payment->subscription_total) }}
            </div>
          </div>
          <div class="card bg-danger text-white shadow">
            <div class="card-body h5">
              <span class="text-white-50 small" style="margin-top: 8px; display: inline-block;">合計</span>
              {{ price($payment->total) }}
            </div>
          </div>
        </div>

        @if ($payment->tickets->count())
          <table class="table table-striped table-hover mt-5 mb-4">
            <thead>
              <tr>
                <th width="450px">アカウント</th>
                <th>価格</th>
                @if (! $payment->is_approved)
                  <th width="90px">&nbsp;</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($payment->tickets as $ticket)
                <tr>
                  <td class="d-flex">
                    <div class="ml-3">
                      <h3 class="font-weight-bold h6 {{ $ticket->deleted_at ? 'text-muted' : '' }}">{{ $payment->transactionable->display_name }}</h3>
                      <p class="text-muted mb-0">{{ $ticket->description }}</p>
                      <time>{{ $ticket->created_at->format('Y年m月d日') }}</time>
                    </div>
                  </td>
                  <td>{{ price($ticket->amount) }}</td>
                  @if (! $payment->is_approved)
                    <td>
                      @if (! $ticket->deleted_at)
                        <div class="payment-actions d-flex justify-content-between">
                          <a href="#" class="btn btn-link p-0 js-ticket-delete" data-type="delete">削除</a>
                        </div>
                      @endif
                    </td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif
      </div>
    </div>
  </div>
@endsection
