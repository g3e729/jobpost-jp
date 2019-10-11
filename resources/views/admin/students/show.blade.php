@extends('admin.layouts.default')

@section('content')
  <div class="l-container">
    <div class="student-detail">
      <div class="student-detail-top py-4">
        <div class="card card-student-detail">
          <div class="card-body">
            <div class="card-body-img text-center">
              <img src="https://i.pravatar.cc/300" class="card-image card-image-x2 rounded-circle">
            </div>
            <div class="card-body-main mt-3">
              <h3 class="text-center">田中義人</h3>
              
              <div class="card-badges text-center">
                
                <span class="badge badge-pill badge-light">メールアドレス : Kredo.@kredo.com</span>
                
                <span class="badge badge-pill badge-light">期 : 9</span>
                
                <span class="badge badge-pill badge-light">コース : PHP</span>
                
                <span class="badge badge-pill badge-light">ステータス : 在学中</span>
                
                <span class="badge badge-pill badge-light">英語 : CEFR - B1</span>
                
              </div>
              
              <div class="card-actions card-actions position-absolute">
                <a href="{{ route('admin.students.edit', 1) }}" class="card-link">詳細</a>
                <a href="/messages" class="card-link">編集</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="student-detail-main pb-4">
        <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-basic-tab" data-toggle="pill" href="#pills-basic" role="tab" aria-controls="pills-basic" aria-selected="true">基本情報</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">プロフィール</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-skills-tab" data-toggle="pill" href="#pills-skills" role="tab" aria-controls="pills-skills" aria-selected="false">スキル</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-grades-tab" data-toggle="pill" href="#pills-grades" role="tab" aria-controls="pills-grades" aria-selected="false">成績</a>
          </li>
        </ul>
        <div class="tab-content my-4" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-basic" role="tabpanel" aria-labelledby="pills-basic-tab">
            <table class="table">
              <tbody>
                <tr>
                  <td style="width: 25%" class="font-weight-bold">名前(Japanese)</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">名前(English)</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">生年月日</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">住所</td>
                  <td>
                    <dl>
                      <dt>番地まで</dt>
                      <dd>placeholder</dd>
                      <dt>ビル名、部屋番号</dt>
                      <dd>placeholder</dd>
                      <dt>郵便番号</dt>
                      <dd>placeholder</dd>
                    </dl>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">性別</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">電話番号</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">メールアドレス</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">年齢</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">パスポート番号</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">ステータス</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">留学費用</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">部屋タイプ</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">入学日</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">卒業日</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">チェックイン日</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">チェックアウト日</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">希望コース</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">留学期間(週間)</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">航空券手配・海外保険手配</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">空港までのお迎え希望</td>
                  <td>placeholder</td>
                </tr>

                <tr>
                  <td class="font-weight-bold">ご職業</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">緊急連絡先</td>
                  <td>
                    <dl>
                      <dt>名前</dt>
                      <dd>placeholder</dd>
                      <dt>続柄</dt>
                      <dd>placeholder</dd>
                      <dt>電話番号</dt>
                      <dd>placeholder</dd>
                      <dt>メールアドレス</dt>
                      <dd>placeholder</dd>
                    </dl>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">既往症の有無</td>
                  <td>
                    <dl>
                      <dt>ありなし</dt>
                      <dd>placeholder</dd>
                      <dt>内容</dt>
                      <dd>placeholder</dd>
                    </dl>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">備考</td>
                  <td>placeholder</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="tab-pane w-75 mx-auto fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <table class="table">
              <tr>
                <td>
                  <dl class="mb-0">
                    <dt>自己紹介</dt>
                    <dd>placeholder</dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td>
                  <dl class="mb-0">
                    <dt>やってみたいこと</dt>
                    <dd>placeholder</dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td>
                  <dl class="mb-0">
                    <dt>職歴</dt>
                    <dd>
                      <dl class="mt-3">
                        <dt class="text-muted">企業名</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">役職</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">在籍期間</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">業務内容</dt>
                        <dd>placeholder</dd>
                      </dl>
                    </dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td>
                  <dl class="mb-0">
                    <dt>学歴</dt>
                    <dd>
                      <dl class="mt-3">
                        <dt class="text-muted">学校名</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">学部、専攻、学科</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">卒業</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">学んだこと</dt>
                        <dd>placeholder</dd>
                      </dl>
                    </dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td>
                  <dl class="mb-0">
                    <dt>ムービー</dt>
                    <dd>
                      <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/dQw4w9WgXcQ?rel=0" allowfullscreen></iframe>
                      </div>
                    </dd>
                  </dl>
                </td>
              </tr>
            </table>
          </div>
          <div class="tab-pane w-75 mx-auto fade" id="pills-skills" role="tabpanel" aria-labelledby="pills-skills-tab">
            <table class="table">
              <tr>
                <td width="50%">
                  <dl class="mb-0">
                    <dt>プログラミング言語</dt>
                    <dd>
                      <dl class="mt-3">
                        <dt class="text-muted">C#</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">PHP</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">Ruby</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">Python2</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">Python3</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">Javascript</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">HTML5+CSS3</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">Sass</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">SQL</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">Bash</dt>
                        <dd>placeholder</dd>
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
                        <dd>placeholder</dd>
                        <dt class="text-muted">Ruby on Rails</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">Django</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">Flask</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">Unity</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">Vue.js</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">Bootstrap</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">TensorFlow</dt>
                        <dd>placeholder</dd>
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
                        <dd>placeholder</dd>
                        <dt class="text-muted">Web開発（フロントエンドエンジニア）</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">研究開発（画像処理,自然言語処理,機械学習,AIなど）</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">コンシューマーゲーム開発</dt>
                        <dd>placeholder</dd>
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
                    <dd>placeholder</dd>
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
                        <dd>placeholder</dd>
                        <dt class="text-muted">内容</dt>
                        <dd>placeholder</dd>
                        <dt class="text-muted">URL</dt>
                        <dd>placeholder</dd>
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
                    <dd>placeholder</dd>
                    <dd>placeholder</dd>
                    <dt>受講中</dt>
                    <dd>placeholder</dd>
                  </dl>
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">ITレベル</td>
                <td>placeholder</td>
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
                <td>placeholder</td>
              </tr>
              <tr>
                <td class="font-weight-bold">Listening</td>
                <td>placeholder</td>
              </tr>
              <tr>
                <td class="font-weight-bold">Total</td>
                <td>placeholder</td>
              </tr>
              <tr>
                <td class="font-weight-bold">Speaking</td>
                <td>placeholder</td>
              </tr>
              <tr>
                <td class="font-weight-bold">Writing</td>
                <td>placeholder</td>
              </tr>
              <tr>
                <td class="font-weight-bold">英語レベル</td>
                <td>placeholder</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection