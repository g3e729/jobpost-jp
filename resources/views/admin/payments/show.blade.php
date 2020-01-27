@extends('admin.layouts.default')

@section('pageTitle', $payment->transactionable->display_name . ' ' . $payment->bill_date)

@section('content')
  <div class="l-container py-4">

    @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
      </div>
    @endif

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
                <th width="420px">アカウント</th>
                <th>Tickets</th>
                <th>価格</th>
                @if (! $payment->is_approved)
                  <th width="120px">&nbsp;</th>
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
                  <td>{{ $ticket->tickets }}</td>
                  <td>{{ price($ticket->amount) }}</td>
                  @if (! $payment->is_approved)
                    <td>
                      <div class="payment-actions d-flex justify-content-between">
                        @if (! $ticket->deleted_at)
                          <button type="submit" data-type="delete" form="deleteForm-{{ $ticket->id }}" class="js-ticket-delete btn btn-link text-decoration-none text-muted p-0">削除</button>
                          <form id="deleteForm-{{ $ticket->id }}" method="POST" action="{{ route('admin.tickets.destroy', $ticket) }}" novalidate style="visibility: hidden; position: absolute;">
                            @csrf
                            {{ method_field('DELETE') }}
                          </form>
                        @endif
                      </div>
                    </td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif

        <div class="text-right">
          @if (! $payment->is_approved)
            <button id="js-payment-submit" type="submit" data-type="submit" form="submitForm" class="btn btn-primary btn-submit my-3 w-25">入金確認</button>
          @else
            <button id="js-payment-submit" type="submit" data-type="submit" form="submitForm" class="btn btn-primary btn-submit my-3 w-25">入金確認済み</button>
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

  <form id="submitForm" method="POST" action="{{ route('admin.payments.update', ['payment' => $payment->id]) }}" novalidate style="visibility: hidden; position: absolute;">
    @csrf
    {{ method_field('PATCH') }}

  </form>
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
            modal.querySelector('.modal-body').textContent = `are you sure to delete this ticket?`;
          } else {
            modal.querySelector('.modal-title').textContent = '確認する';
            modal.querySelector('.modal-body').textContent = `{{ $payment->transactionable->display_name }} willing to renew subscription?`;
          }

          $(modal).modal('show');
          currTarget = event.currentTarget.getAttribute('form');

          event.preventDefault();
        })
      });
    }

    modalSubmit.addEventListener('click', function(event) {
      $(modal).modal('hide');
      document.querySelector(`#${currTarget}`).submit();
    });
  </script>
@endsection
