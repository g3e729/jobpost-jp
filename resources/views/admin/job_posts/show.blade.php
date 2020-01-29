@extends('admin.layouts.default')

@section('pageTitle', $job_post->title)

@section('content')
  <div class="l-container">
    <div class="recruitment-detail">
      <div class="recruitment-detail-top py-4 mb-5">

        @if (session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
          </div>
        @endif

        <div class="shadow-sm card card-recruitment-detail">
          <div class="card-body">
            <div class="card-actions text-right">
              <a href="{{ route('admin.recruitments.edit', $job_post) }}" class="card-link">編集する</a>
              <button id="js-item-delete" type="submit" form="deleteForm" class="btn btn-link text-decoration-none text-muted">削除</button>
              <form id="deleteForm" method="POST" action="{{ route('admin.recruitments.destroy', $job_post) }}" novalidate style="visibility: hidden; position: absolute;">
                @csrf
                {{ method_field('DELETE') }}

                <button type="submit">削除</button>
              </form>
            </div>
            <div class="card-body-img text-center">
              @if ($job_post->cover_photo)
                <img src="{{ $job_post->cover_photo }}" class="avatar avatar-md">
              @endif
            </div>
            <div class="card-body-main mt-3">
              <h3 class="text-center">{{ $job_post->title }}</h3>
            </div>
          </div>

          <table class="table">
            <tbody>
              <tr>
                <td width="160px" class="bg-light text-dark p-3 font-weight-bold">タイトル</td>
                <td colspan="3">{{ $job_post->title ?? '--' }}</td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">ポジション</td>
                <td colspan="3">{{ $job_post->position ?? '--' }}</td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">開発環境</td>
                <td colspan="3">
                  <dl>
                    <dt>言語</dt>
                    <dd>{{ $job_post->programming_language ?? '--' }}</dd>
                    <dt>フレームワーク</dt>
                    <dd>{{ $job_post->framework ?? '--' }}</dd>
                    <dt>データベース</dt>
                    <dd>{{ $job_post->database ?? '--' }}</dd>
                    <dt>環境</dt>
                    <dd>{{ $job_post->environment ?? '--' }}</dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">こんなことやります</td>
                <td colspan="3">
                  <div style="white-space: pre-line;">{!! $job_post->description !!}</div>
                </td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">応募要件</td>
                <td colspan="3">
                  <div style="white-space: pre-line;">{!! $job_post->environment !!}</div>
                </td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">募集人数</td>
                <td>{{ $job_post->number_of_applicants }}人</td>
                <td width="160px" class="bg-light text-dark p-3 font-weight-bold">想定年収</td>
                <td>{{ $job_post->salary }}</td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">勤務時間</td>
                <td>
                  <div style="white-space: pre-line;">{{ $job_post->work_time }}</div>
                </td>
                <td width="160px" class="bg-light text-dark p-3 font-weight-bold">休日休暇</td>
                <td>
                  <div style="white-space: pre-line;">{{ $job_post->holidays }}</div>
                </td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">諸手当</td>
                <td>{{ $job_post->allowance }}</td>
                <td width="160px" class="bg-light text-dark p-3 font-weight-bold">インセンティブ</td>
                <td>{{ $job_post->incentive }}</td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">昇給・昇格</td>
                <td>{{ $job_post->salary_increase }}</td>
                <td width="160px" class="bg-light text-dark p-3 font-weight-bold">保険</td>
                <td><div style="white-space: pre-line;">{{ $job_post->insurance }}</div></td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">試用期間</td>
                <td>{{ $job_post->contract_period }}</td>
                <td width="160px" class="bg-light text-dark p-3 font-weight-bold">選考フロー</td>
                <td><div style="white-space: pre-line;">{{ $job_post->screening_flow }}</div></td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">住所</td>
                <td>
                  <dl>
                    <dt>Prefecture</dt>
                    <dd>
                      <a href="{{ route('admin.recruitments.index', ['prefecture' => $job_post->prefecture]) }}">
                        {{ $job_post->prefecture ? getPrefecture($job_post->prefecture) : '--' }}
                      </a>
                    </dd>
                    <dt>番地</dt>
                    <dd>{{ $job_post->address1 ?? '--' }}</dd>
                    <dt>ビル名 / 部屋番号</dt>
                    <dd>{{ $job_post->address2 ?? '--' }}</dd>
                    <dt>郵便番号</dt>
                    <dd>{{ $job_post->address3 ?? '--' }}</dd>
                  </dl>
                </td>
                <td class="bg-light text-dark p-3 font-weight-bold">アバター</td>
                <td colspan="3" class="text-center">
                  <a href="{{ route('admin.companies.show', $job_post->company) }}" target="_blank">
                    @if($job_post->company->avatar)
                      <img src="{{ $job_post->company->avatar }}" class="avatar avatar-md">
                      <br>
                    @endif
                    {{ $job_post->company->company_name }}
                  </a>
                </td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">最寄駅</td>
                <td>{{ $job_post->station ?? '--' }}</td>
                <td class="bg-light text-dark p-3 font-weight-bold">求人ステータス</td>
                <td>{{ $job_post->display_status ? 'Hiring' : 'Stop Hiring' }}</td>
              </tr>
            </tbody>
          </table>
          <div class="card-body">
            <div class="row py-4 justify-content-center">
              <div class="col-3">
                <a href="{{ route('admin.recruitments.edit', $job_post) }}" class="alt-font btn btn-primary btn-submit w-100">詳細</a>
              </div>
              <div class="col-3">
                {{-- <a href="{{ route('admin.recruitments.delete', 0) }}" class="alt-font btn btn-secondary w-75 js-post-delete">無効にする</a> --}}
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
          本当に削除してもよろしいですか？
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
