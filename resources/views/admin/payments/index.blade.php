@extends('admin.layouts.default')

@section('pageTitle', '入金確認')

@section('content')
  <div class="l-container">
    <div class="payments py-2">
      <div class="payments-top py-4">
        <h2 class="text-center alt-font">入金確認</h2>
      </div>

      <div class="payments-bottom pb-4">
        <ul class="nav nav-pills nav-justified w-50 mx-auto mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link alt-font active" id="pills-unconfirmed-tab" data-toggle="pill" href="#pills-unconfirmed" role="tab" aria-controls="pills-unconfirmed" aria-selected="true">未確認</a>
          </li>
          <li class="nav-item">
            <a class="nav-link alt-font" id="pills-verified-tab" data-toggle="pill" href="#pills-verified" role="tab" aria-controls="pills-verified" aria-selected="false">確認済み</a>
          </li>
        </ul>
        <div class="tab-content my-4" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-unconfirmed" role="tabpanel" aria-labelledby="pills-unconfirmed-tab">
            <table class="table table-striped table-hover js-sortable">
              <thead>
                <tr>
                  <th width="450px">アカウント</th>
                  <th>価格</th>
                  <th width="90px">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach($payments['not_approved'] as $payment)
                  <tr>
                    <td class="d-flex">
                      <img src="{{ $payment->transactionable->avatar }}" class="card-image float-left rounded-circle" style="max-width: 64px;">
                      <div class="ml-3">
                        <h3 class="font-weight-bold h6">{{ $payment->transactionable->display_name }}</h3>
                        <p class="text-muted mb-0">{{ $payment->transactionable->description }}</p>
                        <time>{{ $payment->created_at->format('Y年m月') }}</time>
                      </div>
                    </td>
                    <td>{{ price($payment->total) }}</td>
                    <td>
                      <div class="payment-actions d-flex justify-content-between">
                        <a href="{{ route('admin.payments.show', $payment) }}" class="btn btn-link p-0">詳細</a>
                        <a href="#" class="btn btn-link p-0 js-payment-delete">削除</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="pills-verified" role="tabpanel" aria-labelledby="pills-verified-tab">
            <table class="table table-striped table-hover js-sortable">
              <thead>
                <tr>
                  <th width="450px">アカウント</th>
                  <th>価格</th>
                  <th width="90px">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach($payments['approved'] as $payment)
                  <tr>
                    <td class="d-flex">
                      <img src="{{ $payment->transactionable->avatar }}" class="card-image float-left rounded-circle" style="max-width: 64px;">
                      <div class="ml-3">
                        <h3 class="font-weight-bold h6">{{ $payment->transactionable->display_name }}</h3>
                        <p class="text-muted mb-0">{{ $payment->transactionable->description }}</p>
                        <time>{{ $payment->created_at->format('Y年m月') }}</time>
                      </div>
                    </td>
                    <td>{{ price($payment->total) }}</td>
                    <td>
                      <div class="payment-actions d-flex justify-content-between">
                        <a href="{{ route('admin.payments.show', $payment) }}" class="btn btn-link p-0">詳細</a>
                        <a href="#" class="btn btn-link p-0 js-payment-delete">削除</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('admin.partials.pagination', ['data' => collect()])

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
          株式会社Rettyの10月分の請求を削除しても良いですか？
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
    const sortTables = document.querySelectorAll('.js-sortable');
    const deleteButtons = document.querySelectorAll('.js-payment-delete');
    const modalSubmit = document.querySelector('#js-modal-submit');
    const modal = document.querySelector('#js-delete-modal');
    let currTarget;

    deleteButtons.forEach(btn => {
      btn.addEventListener('click', function(event) {
        $(modal).modal('show');
        currTarget = event.currentTarget.href;

        event.preventDefault();
      })
    });

    modalSubmit.addEventListener('click', function(event) {
      $(modal).modal('hide');
      window.location.replace(currTarget);
    });

    sortTables.forEach((sortTable) => {
      $(sortTable).DataTable({
        info: false,
        order: [[ 0, "asc" ]],
        paging: false,
        searching: false,
        columnDefs: [
          { targets: [2], orderable: false }
        ],
      });
    });
  </script>
@endsection