@extends('admin.layouts.default')

@section('pageTitle', $notification->title)

@section('content')
  <div class="l-container l-container-narrow py-4">

    @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
      </div>
    @endif

    <div class="shadow-sm card card-notification-detail">
      <div class="card-body pt-5 px-5">
        <h2 class="card-title w-100 text-truncate">{{ $notification->title }}</h2>
        <div class="card-text" style="white-space: pre-line;">{!! $notification->description !!}</div>
        <div class="card-actions card-actions-right position-absolute">
          <a href="{{ route('admin.notifications.edit', $notification) }}" class="card-link">編集する</a>
          <button id="js-item-delete" type="submit" form="deleteForm" class="btn btn-link text-decoration-none text-muted">削除</button>
          <form id="deleteForm" method="POST" action="{{ route('admin.notifications.destroy', $notification) }}" novalidate style="visibility: hidden; position: absolute;">
            @csrf
            {{ method_field('DELETE') }}

            <button type="submit">削除</button>
          </form>
        </div>
      </div>
      <div class="card-footer bg-primary px-5">
        <ul class="list-inline d-flex justify-content-between mb-0">
          <li class="list-inline-item text-white small"><strong>通知日</strong> : {{ $notification->published_at->format('Y年m月d日')}}</li>
          <li class="list-inline-item text-white small"><strong>ジャンル</strong> : {{ $notification->genre }}</li>
          <li class="list-inline-item text-white small"><strong>対象</strong> : {{ $notification->target }}</li>
          <li class="list-inline-item text-white small"><strong>sent copies</strong> : {{ $notifications->count() }}</li>
        </ul>
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
        [TODO] Are you sure you want to delete notification ？
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
