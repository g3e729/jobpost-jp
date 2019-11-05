@extends('admin.layouts.default')

@section('pageTitle', $company->display_name)

@section('content')
  <div class="l-container">
    <div class="company-detail">
      <div class="company-detail-top py-4">
          <div class="shadow-sm card card-company-detail">
            <div class="card-body">
              <div class="card-body-img text-center">
                <img src="{{ $company->avatar }}" class="card-image card-image-x2 rounded-circle">
              </div>
              <div class="card-body-main mt-3">
                <h3 class="text-center">{{ $company->display_name }}</h3>
                
                <div class="card-actions card-actions-right position-absolute">
                  <a href="{{ route('admin.companies.edit', $company) }}" class="card-link">詳細</a>
                  <a href="/companies/1/delete" class="card-link text-muted">削除</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="company-detail-main pb-4">
        <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link alt-font active" id="pills-basic-tab" data-toggle="pill" href="#pills-basic" role="tab" aria-controls="pills-basic" aria-selected="true">基本情報</a>
          </li>
          <li class="nav-item">
            <a class="nav-link alt-font" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">プロフィール</a>
          </li>
        </ul>
        <div class="tab-content my-4" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-basic" role="tabpanel" aria-labelledby="pills-basic-tab">
            <table class="table">
              <tbody>
                <tr>
                  <td style="width: 25%" class="font-weight-bold">会社紹介</td>
                  <td style="white-space: pre-line;">{{ $company->description }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">HPアドレス</td>
                  <td>{{ $company->homepage }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">住所</td>
                  <td>
                    <dl>
                      <dt>Prefecture</dt>
                      <dd>{{ $company->prefecture }}</dd>
                      <dt>番地</dt>
                      <dd>{{ $company->address1 }}</dd>
                      <dt>ビル名 / 部屋番号</dt>
                      <dd>{{ $company->address2 }}</dd>
                      <dt>郵便番号</dt>
                      <dd>{{ $company->address3 }}</dd>
                    </dl>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">創業者</td>
                  <td>{{ $company->ceo }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">社員数</td>
                  <td>{{ $company->number_of_employees }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">設立年月</td>
                  <td>{{ $company->established_date->format('Y年m月d日') }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">業種・業界</td>
                  <td>{{ $company->industry_id }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Facebook</td>
                  <td>{{ '--' }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Twitter</td>
                  <td>{{ '--' }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Instagram</td>
                  <td>{{ '--' }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">アバター</td>
                  <td>
                    <img class="rounded-circle border border-secondary my-3" src="{{ $company->avatar }}" style="height: 150px; width: 150px; border-width: 2px !important;">
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">アイキャッチ</td>
                  <td>
                    <img class="img-fluid border border-secondary my-3 w-100" src="https://lorempixel.com/720/720/city/" style="border-width: 2px !important;">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <table class="table">
              <tbody>
                <tr>
                  <td style="width: 25%" class="font-weight-bold">What<br>何をやっているのか？</td>
                  <td>
                    <dl>
                      <dt>説明</dt>
                      <dd style="white-space: pre-line;">{{ '--' }}</dd>
                      <dt>写真１</dt>
                      <dd>
                        <img class="img-fluid border border-secondary my-3 w-100" src="https://lorempixel.com/720/720/city/" style="border-width: 2px !important;">
                      </dd>
                      <dt>写真2</dt>
                      <dd>
                        <img class="img-fluid border border-secondary my-3 w-100" src="https://lorempixel.com/720/720/city/" style="border-width: 2px !important;">
                      </dd>
                    </dl>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Why<br>なぜやるのか</td>
                  <td>
                    <dl>
                      <dt>説明</dt>
                      <dd style="white-space: pre-line;">{{ '--' }}</dd>
                      <dt>写真１</dt>
                      <dd>
                        <img class="img-fluid border border-secondary my-3 w-100" src="https://lorempixel.com/720/720/city/" style="border-width: 2px !important;">
                      </dd>
                      <dt>写真2</dt>
                      <dd>
                        <img class="img-fluid border border-secondary my-3 w-100" src="https://lorempixel.com/720/720/city/" style="border-width: 2px !important;">
                      </dd>
                    </dl>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">How<br>どうやっているか</td>
                  <td>
                    <dl>
                      <dt>説明</dt>
                      <dd style="white-space: pre-line;">{{ '--' }}</dd>
                      <dt>写真１</dt>
                      <dd>
                        <img class="img-fluid border border-secondary my-3 w-100" src="https://lorempixel.com/720/720/city/" style="border-width: 2px !important;">
                      </dd>
                      <dt>写真2</dt>
                      <dd>
                        <img class="img-fluid border border-secondary my-3 w-100" src="https://lorempixel.com/720/720/city/" style="border-width: 2px !important;">
                      </dd>
                    </dl>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">特徴１</td>
                  <td style="white-space: pre-line;">{{ '--' }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">特徴2</td>
                  <td style="white-space: pre-line;">{{ '--' }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">特徴3</td>
                  <td style="white-space: pre-line;">{{ '--' }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">ポートフォリオ1</td>
                  <td>
                    <dl>
                      <dt>タイトル</dt>
                      <dd>{{ '--' }}</dd>
                      <dt>内容</dt>
                      <dd style="white-space: pre-line;">{{ '--' }}</dd>
                      <dt>URL</dt>
                      <dd>{{ '--' }}</dd>
                      <dt>画像</dt>
                      <dd>
                        <img class="img-fluid border border-secondary my-3 w-100" src="https://lorempixel.com/720/720/city/" style="border-width: 2px !important;">
                      </dd>
                    </dl>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">ポートフォリオ2</td>
                  <td>
                    <dl>
                      <dt>タイトル</dt>
                      <dd>{{ '--' }}</dd>
                      <dt>内容</dt>
                      <dd style="white-space: pre-line;">{{ '--' }}</dd>
                      <dt>URL</dt>
                      <dd>{{ '--' }}</dd>
                      <dt>画像</dt>
                      <dd>
                        <img class="img-fluid border border-secondary my-3 w-100" src="https://lorempixel.com/720/720/city/" style="border-width: 2px !important;">
                      </dd>
                    </dl>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">ポートフォリオ3</td>
                  <td>
                    <dl>
                      <dt>タイトル</dt>
                      <dd>{{ '--' }}</dd>
                      <dt>内容</dt>
                      <dd style="white-space: pre-line;">{{ '--' }}</dd>
                      <dt>URL</dt>
                      <dd>{{ '--' }}</dd>
                      <dt>画像</dt>
                      <dd>
                        <img class="img-fluid border border-secondary my-3 w-100" src="https://lorempixel.com/720/720/city/" style="border-width: 2px !important;">
                      </dd>
                    </dl>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
@endsection