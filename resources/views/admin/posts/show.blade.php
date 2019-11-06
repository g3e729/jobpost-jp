@extends('admin.layouts.default')

@section('content')
  <div class="l-container">
    <div class="recruitment-detail">
      <div class="recruitment-detail-top py-4 mb-5">
        <div class="shadow-sm card card-recruitment-detail">
          <div class="card-body">
            <div class="card-body-img text-center">
              <img src="https://lorempixel.com/240/240/city/" class="avatar avatar-md">
            </div>
            <div class="card-body-main mt-3">
              <h3 class="text-center">自社★C2Cマッチングプラットフォーム開発</h3>

              <div class="card-actions card-actions-right position-absolute">
                <a href="{{ route('admin.recruitments.edit', 0) }}" class="card-link">詳細</a>
                <a href="{{ route('admin.recruitments.delete', 0) }}" class="card-link text-muted js-post-delete">無効にする</a>
              </div>
            </div>
          </div>
          <table class="table">
            <tbody>
              <tr>
                <td width="160px" class="bg-light text-dark p-3 font-weight-bold">タイトル</td>
                <td colspan="3">自社★C2Cマッチングプラットフォーム開発</td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">ポジション</td>
                <td colspan="3">バックエンド</td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">開発環境</td>
                <td colspan="3">
                  <dl>
                    <dt>言語</dt>
                    <dd>{{ '--' }}</dd>
                    <dt>フレームワーク</dt>
                    <dd>{{ '--' }}</dd>
                    <dt>データベース</dt>
                    <dd>{{ '--' }}</dd>
                    <dt>環境</dt>
                    <dd>{{ '--' }}</dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">こんなことやります</td>
                <td colspan="3">
                  <span style="white-space: pre-line;">ベテラン/若手/転籍/復職など、様々なメンバーを
                    纏めるリーダー候補
                    を募集中！
                    組込・制御系設計開発のリーダーとして若手を含
                    むメンバーの取り纏
                    め、進捗/工数管理等をしていただきます。
                    （主なプロジェクト例）
                    ・情報機器関連の組込開発
                    ・自動車ECU/カーナビゲーションの組込開発
                    ・産業用工作機械のソフトウェア開発
                  </span>
                </td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">応募要件</td>
                <td colspan="3">
                  <span style="white-space: pre-line;">何らかのシステム開発経験　実務３年以上
                    周囲とのコミュニケーションを図りながら業務対応可能な方
                    決まった作業をキチンとこなすことが出来る方
                  </span>
                </td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">募集人数</td>
                <td>5人</td>
                <td width="160px" class="bg-light text-dark p-3 font-weight-bold">想定年収</td>
                <td>４００万円</td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">勤務時間</td>
                <td>
                  <span style="white-space: pre-line;">10:00〜19:00
                    （コアタイム 11:00~16:00）
                  </span>
                </td>
                <td width="160px" class="bg-light text-dark p-3 font-weight-bold">休日休暇</td>
                <td>
                  <span style="white-space: pre-line;">・完全週休2日制（土日）
                    ・祝日
                    ・年末年始休暇
                    ・有給休暇
                    ・慶弔休暇
                    ・GW休暇
                    ・夏期休暇
                  </span>
                </td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">諸手当</td>
                <td>交通費支給（上限2万円）</td>
                <td width="160px" class="bg-light text-dark p-3 font-weight-bold">インセンティブ</td>
                <td>なし</td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">昇給・昇格</td>
                <td>昇格査定あり：年2回（12月、6月）</td>
                <td width="160px" class="bg-light text-dark p-3 font-weight-bold">保険</td>
                <td>
                  <span style="white-space: pre-line;">健康保険
                    厚生年金加入
                    雇用保険
                    労災保険適用
                  </span>
                </td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">試用期間</td>
                <td>6ヶ月</td>
                <td width="160px" class="bg-light text-dark p-3 font-weight-bold">選考フロー</td>
                <td>
                  <span style="white-space: pre-line;">カジュアル面談：人事、エンジニアチームリーダー
                    ▼
                    2次：社長
                    ▼
                    内定

                    ※選考フロー、面接回数は状況に応じて変更になる可能性があります
                  </span>
                </td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">住所</td>
                <td colspan="3">
                  <dl>
                    <dt>Prefecture</dt>
                    <dd>{{ '--' }}</dd>
                    <dt>番地</dt>
                    <dd>{{ '--' }}</dd>
                    <dt>ビル名 / 部屋番号</dt>
                    <dd>{{ '--' }}</dd>
                    <dt>郵便番号</dt>
                    <dd>{{ '--' }}</dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td class="bg-light text-dark p-3 font-weight-bold">最寄駅</td>
                <td colspan="3">六本木駅</td>
              </tr>
            </tbody>
          </table>
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