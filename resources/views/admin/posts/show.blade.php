@extends('admin.layouts.default')

@section('content')
  <div class="l-container">
    <div class="recruitment-detail">
      <div class="recruitment-detail-top py-4 mb-5">
        <div class="shadow-sm card card-recruitment-detail">
          <div class="card-body">
            <div class="card-body-img text-center">
              <img src="https://lorempixel.com/240/240/city/" class="card-image card-image-x2 rounded-circle">
            </div>
            <div class="card-body-main mt-3">
              <h3 class="text-center">自社★C2Cマッチングプラットフォーム開発</h3>

              <div class="card-actions card-actions-right position-absolute">
                <a href="{{ route('admin.recruitments.edit', 0) }}" class="card-link">詳細</a>
                <a href="{{ route('admin.recruitments.delete', 0) }}" class="card-link text-muted js-post-delete">無効にする</a>
              </div>
            </div>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex p-0">
              <span class="w-25 bg-light text-dark p-3">タイトル</span>
              <span class="p-3">...title</span>
            </li>
            <li class="list-group-item d-flex p-0">
              <span class="w-25 bg-light text-dark p-3">ポジション</span>
              <span class="p-3">...position</span>
            </li>
            <li class="list-group-item d-flex p-0">
              <span class="w-25 bg-light text-dark p-3">開発環境</span>
              <span class="p-3">...Development environment</span>
            </li>
            <li class="list-group-item d-flex p-0">
              <span class="w-25 bg-light text-dark p-3">こんなことやります</span>
              <span class="p-3">...do this</span>
            </li>
            <li class="list-group-item d-flex p-0">
              <span class="w-25 bg-light text-dark p-3">応募要件</span>
              <span class="p-3">...Application requirements</span>
            </li>
            <li class="list-group-item d-flex p-0">
              <span class="w-25 bg-light text-dark p-3">募集人数</span>
              <span class="p-3">...Number of applicants</span>
            </li>
            <li class="list-group-item d-flex p-0">
              <span class="w-25 bg-light text-dark p-3">勤務時間</span>
              <span class="p-3">...Working hours</span>
            </li>
            <li class="list-group-item d-flex p-0">
              <span class="w-25 bg-light text-dark p-3">諸手当</span>
              <span class="p-3">...Allowances</span>
            </li>
            <li class="list-group-item d-flex p-0">
              <span class="w-25 bg-light text-dark p-3">昇給・昇格</span>
              <span class="p-3">...Salary increase / promotion</span>
            </li>
            <li class="list-group-item d-flex p-0">
              <span class="w-25 bg-light text-dark p-3">試用期間</span>
              <span class="p-3">...Trial period</span>
            </li>
            <li class="list-group-item d-flex p-0">
              <span class="w-25 bg-light text-dark p-3">住所</span>
              <span class="p-3">...Street address</span>
            </li>
            <li class="list-group-item d-flex p-0">
              <span class="w-25 bg-light text-dark p-3">最寄駅</span>
              <span class="p-3">...nearest station</span>
            </li>
          </ul>
          <div class="card-body">
            <div class="row py-4 justify-content-center">
              <div class="col-3">
                <a href="{{ route('admin.recruitments.edit', 0) }}" class="alt-font btn btn-primary btn-submit w-100">詳細</a>
              </div>
              <div class="col-3">
                <a href="{{ route('admin.recruitments.delete', 0) }}" class="alt-font btn btn-secondary w-75 js-post-delete">無効にする</a>
              </div>
            </div>
          </div>
        </div>
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
          [TODO] Are you sure you want to delete job post ？
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
    const deleteButtons = document.querySelectorAll('.js-post-delete');
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
  </script>
@endsection