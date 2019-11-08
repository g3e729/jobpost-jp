@extends('admin.layouts.default')

@section('pageTitle', $student->display_name)

@section('content')
  <div class="l-container">
    <div class="student-detail">
      <div class="student-detail-top py-4">
        <div class="shadow-sm card card-student-detail">
          <div class="card-body">
            <div class="card-body-img text-center">
              <img src="{{ $student->avatar }}" class="avatar avatar-md">
            </div>
            <div class="card-body-main mt-3">
              <h3 class="text-center">{{ $student->display_name }}</h3>
              
              <div class="card-badges text-center h6">
                
                <span class="badge badge-pill badge-secondary">メールアドレス : {{ $student->email }}</span>
                
                <span class="badge badge-pill badge-secondary">期 : 9</span>
                
                <span class="badge badge-pill badge-secondary">コース : PHP</span>
                
                <span class="badge badge-pill badge-secondary">ステータス : 在学中</span>
                
                <span class="badge badge-pill badge-secondary">英語 : CEFR - B1</span>
                
              </div>
              
              <div class="card-actions card-actions-right position-absolute">
                <a href="{{ route('admin.students.edit', $student) }}" class="card-link h6 mr-3">詳細</a>
                <a href="{{ route('admin.messages.show', $student) }}" class="card-link h6 mr-3">メッセージ</a>
                <button id="js-item-delete" type="submit" form="deleteForm" class="btn btn-link text-decoration-none h6 text-muted">削除</button>
                <form id="deleteForm" method="POST" action="{{ route('admin.students.destroy', $student) }}" novalidate style="visibility: hidden; position: absolute;">
                  @csrf
                  {{ method_field('DELETE') }}
                  
                  <button type="submit">削除</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="student-detail-main pb-4">
        <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link alt-font active" id="pills-basic-tab" data-toggle="pill" href="#pills-basic" role="tab" aria-controls="pills-basic" aria-selected="true">基本情報</a>
          </li>
          <li class="nav-item">
            <a class="nav-link alt-font" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">プロフィール</a>
          </li>
          <li class="nav-item">
            <a class="nav-link alt-font" id="pills-skills-tab" data-toggle="pill" href="#pills-skills" role="tab" aria-controls="pills-skills" aria-selected="false">スキル</a>
          </li>
          <li class="nav-item">
            <a class="nav-link alt-font" id="pills-grades-tab" data-toggle="pill" href="#pills-grades" role="tab" aria-controls="pills-grades" aria-selected="false">成績</a>
          </li>
        </ul>
        <div class="tab-content my-4" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-basic" role="tabpanel" aria-labelledby="pills-basic-tab">
            <table class="table">
              <tbody>
                <tr>
                  <td style="width: 25%" class="font-weight-bold">名前(Japanese)</td>
                  <td>{{ $student->japanese_name }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">名前(English)</td>
                  <td>{{ $student->name }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">生年月日 / 年齢 </td>
                  <td>{{ $student->birthday->format('Y年m月d日') }} / {{ $student->birthday->diff(now())->format('%y') }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">住所</td>
                  <td>
                    <dl>
                      <dt>番地まで</dt>
                      <dd>{{ $student->address1 }}</dd>
                      <dt>ビル名、部屋番号</dt>
                      <dd>{{ $student->address2 }}</dd>
                      <dt>郵便番号</dt>
                      <dd>{{ $student->address3 }}</dd>
                    </dl>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">性別</td>
                  <td>{{ getSex($student->sex) }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">電話番号</td>
                  <td>{{ $student->contact_number }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">メールアドレス</td>
                  <td>{{ $student->email }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">入学日</td>
                  <td>{{ $student->enrollment_date ? $student->enrollment_date->format('Y年m月d日') : '--' }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">卒業日</td>
                  <td>{{ $student->graduation_date ? $student->graduation_date->format('Y年m月d日') :'--' }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">ステータス</td>
                  <td>{{ $student->status }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">ご職業</td>
                  <td>{{ $student->occupation }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">備考</td>
                  <td style="white-space: pre-line;">{{ $student->remark }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <table class="table">
              <tr>
                <td style="width: 25%" class="font-weight-bold">自己紹介</td>
                <td>{{ '--' }}</td>
              </tr>
              <tr>
                <td class="font-weight-bold">やってみたいこと</td>
                <td>{{ '--' }}</td>
              </tr>
              <tr>
                <td class="font-weight-bold">職歴</td>
                <td>
                  <dl>
                    <dt class="text-muted">企業名</dt>
                    <dd>{{ '--' }}</dd>
                    <dt class="text-muted">役職</dt>
                    <dd>{{ '--' }}</dd>
                    <dt class="text-muted">在籍期間</dt>
                    <dd>{{ '--' }}</dd>
                    <dt class="text-muted">業務内容</dt>
                    <dd style="white-space: pre-line;">{{ '--' }}</dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">学歴</td>
                <td>
                  <dl>
                    <dt class="text-muted">学校名</dt>
                    <dd>{{ '--' }}</dd>
                    <dt class="text-muted">学部、専攻、学科</dt>
                    <dd>{{ '--' }}</dd>
                    <dt class="text-muted">卒業</dt>
                    <dd>{{ '--' }}</dd>
                    <dt class="text-muted">学んだこと</dt>
                    <dd style="white-space: pre-line;">{{ '--' }}</dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">アバター</td>
                <td>
                  <img class="avatar avatar-md" src="{{ $student->avatar }}" style="height: 150px; width: 150px; border-width: 2px !important;">
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">アイキャッチ</td>
                <td>
                  <img class="img-fluid border border-secondary my-3 w-100" src="{{ $student->cover_photo ?? 'https://placehold.it/450x450' }}" style="border-width: 2px !important;">
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">ムービー</td>
                <td>
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/dQw4w9WgXcQ?rel=0"
                      allowfullscreen></iframe>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <div class="tab-pane fade" id="pills-skills" role="tabpanel" aria-labelledby="pills-skills-tab">
            <table class="table">
              <tr>
                <td width="50%">
                  <dl class="mb-0">
                    <dt>プログラミング言語</dt>
                    <dd>
                      <dl class="mt-3">
                        <dt class="text-muted">C#</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">PHP</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">Ruby</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">Python2</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">Python3</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">Javascript</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">HTML5+CSS3</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">Sass</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">SQL</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">Bash</dt>
                        <dd>{{ '--' }}</dd>
                      </dl>
                    </dd>
                  </dl>
                </td>
                <td>
                  <dl class="mb-0">
                    <dt>フレームワーク</dt>
                    <dd>
                      <dl class="mt-3">
                        <dt class="text-muted">Laravel</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">Ruby on Rails</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">Django</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">Flask</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">Unity</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">Vue.js</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">Bootstrap</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">TensorFlow</dt>
                        <dd>{{ '--' }}</dd>
                      </dl>
                    </dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="font-weight-bold">その他</dt>
                  <ul class="list-group list-group-flush my-3">
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">Linux</li>
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">Cent OS</li>
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">Debian</li>
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">Mac OS</li>
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">Apache</li>
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">nginx</li>
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">Unicorn</li>
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">Amazon Web Service</li>
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">Wordpress</li>
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">Vim</li>
                  </ul>
                </td>
                <td>
                  <dl class="mb-0">
                    <dt>経験分野</dt>
                    <dd>
                      <dl class="mt-3">
                        <dt class="text-muted">Web開発（サーバサイドエンジニア）</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">Web開発（フロントエンドエンジニア）</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">研究開発（画像処理,自然言語処理,機械学習,AIなど）</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">コンシューマーゲーム開発</dt>
                        <dd>{{ '--' }}</dd>
                      </dl>
                    </dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="font-weight-bold">語学</dt>
                  <ul class="list-group list-group-flush my-3">
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">Nihongo</li>
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">English</li>
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">Swahili</li>
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">Svenska</li>
                    <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">French</li>
                  </ul>
                </td>
                <td>
                  <dl>
                    <dt>TOEIC</dt>
                    <dd>{{ '--' }}</dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <dl class="mb-0">
                    <dt>ポートフォリオ</dt>
                    <dd>
                      <dl class="mt-3">
                        <dt class="text-muted">タイトル</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">内容</dt>
                        <dd style="white-space: pre-line;">{{ '--' }}</dd>
                        <dt class="text-muted">URL</dt>
                        <dd>{{ '--' }}</dd>
                        <dt class="text-muted">画像</dt>
                        <dd>
                          <img class="img-fluid border border-secondary my-3 w-100" src="https://lorempixel.com/720/720/city/" style="border-width: 2px !important;">
                        </dd>
                      </dl>
                    </dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <dl class="mb-0">
                    <dt>Github</dt>
                    <dd>
                      <a href="https://github.com/kamligph" target="_blank">https://github.com/kamligph</a>
                    </dd>
                  </dl>
                </td>
              </tr>
            </table>
          </div>
          <div class="tab-pane fade" id="pills-grades" role="tabpanel" aria-labelledby="pills-grades-tab">
            <table class="table mb-4">
              <tr>
                <th class="border-top-0 text-center" colspan="2">
                  <h4>IT</h4>
                </th>
              </tr>
              <tr>
                <td style="width: 25%" class="font-weight-bold">レッスン</td>
                <td>
                  <dl>
                    <dt>受講済み</dt>
                    <dd>{{ '--' }}</dd>
                    <dd>{{ '--' }}</dd>
                    <dt>受講中</dt>
                    <dd>{{ '--' }}</dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">ITレベル</td>
                <td>{{ '--' }}</td>
              </tr>
            </table>
            <table class="table mb-4">
              <tr>
                <th class="border-top-0 text-center" colspan="2">
                  <h4>English</h4>
                </th>
              </tr>
              <tr>
                <td style="width: 25%" class="font-weight-bold">Reading</td>
                <td>{{ '--' }}</td>
              </tr>
              <tr>
                <td class="font-weight-bold">Listening</td>
                <td>{{ '--' }}</td>
              </tr>
              <tr>
                <td class="font-weight-bold">R&L Total</td>
                <td>{{ '--' }}</td>
              </tr>
              <tr>
                <td class="font-weight-bold">Speaking</td>
                <td>{{ '--' }}</td>
              </tr>
              <tr>
                <td class="font-weight-bold">Writing</td>
                <td>{{ '--' }}</td>
              </tr>
              <tr>
                <td class="font-weight-bold">英語レベル</td>
                <td>{{ '--' }}</td>
              </tr>
            </table>
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
          この生徒を削除してもよろしいですか？
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