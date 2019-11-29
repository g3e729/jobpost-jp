@extends('admin.layouts.default')

@section('pageTitle', "{$company->display_name}の情報")

@section('content')
  <div class="l-container">
    <div class="company-detail">
      <div class="company-detail-top py-4">
          <div class="shadow-sm card card-company-detail">
            <div class="card-body">
              <div class="card-actions text-right">
                <a href="{{ route('admin.companies.edit', $company) }}" class="card-link">詳細</a>
                <a href="{{ route('admin.recruitments.create', ['company_id' => $company]) }}" class="card-link">募集を作成する</a>
                <a href="{{ route('admin.messages.show', [$company, 'type' => 'company']) }}" class="card-link">メッセージ</a>
                <button id="js-item-delete" type="submit" form="deleteForm" class="btn btn-link text-decoration-none text-muted">削除</button>
                <form id="deleteForm" method="POST" action="{{ route('admin.companies.destroy', $company) }}" novalidate style="visibility: hidden; position: absolute;">
                  @csrf
                  {{ method_field('DELETE') }}

                  <button type="submit">削除</button>
                </form>
              </div>
              <div class="card-body-img text-center">
                <img src="{{ $company->avatar }}" class="avatar avatar-md">
              </div>
              <div class="card-body-main mt-3">
                <h3 class="text-center">{{ $company->display_name }}</h3>

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
                  <td style="width: 25%" class="font-weight-bold">名前</td>
                  <td style="white-space: pre-line;">{{ $company->display_name }}</td>
                </tr>
                
                <tr>
                  <td class="font-weight-bold">会社紹介</td>
                  <td style="white-space: pre-line;">{{ $company->description }}</td>
                </tr>
                
                <tr>
                  <td class="font-weight-bold">HP(URL)</td>
                  <td><a href="{{ $company->homepage }}" target="_blank">{{ $company->homepage }}</a></td>
                </tr>
                
                <tr>
                  <td class="font-weight-bold">住所</td>
                  <td>
                    <dl>
                      <dt>Prefecture</dt>
                      <dd>
                        <a href="{{ route('admin.companies.index', ['prefecture' => $company->prefecture]) }}">
                          {{ getPrefecture($company->prefecture) }}
                        </a>
                      </dd>
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
                  <td class="font-weight-bold">電話番号</td>
                  <td>{{ $company->contact_number }}</td>
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
                  <td class="font-weight-bold">メールアドレス</td>
                  <td>{{ $company->email }}</td>
                </tr>

                <tr>
                  <td class="font-weight-bold">設立年月</td>
                  <td>{{ $company->established_date->format('Y年m月d日') }}</td>
                </tr>

                <tr>
                  <td class="font-weight-bold">業種、業界</td>
                  <td>
                    <a href="{{ route('admin.companies.index', ['industry_id' => $company->industry_id]) }}">
                      {{ $company->industry }}
                    </a>
                  </td>
                </tr>

                @if (isset($company->social_media_accounts['facebook']))
                  <tr>
                    <td class="font-weight-bold">Facebook</td>
                    <td>
                      <a href="{{ $company->social_media_accounts['facebook'] }}" target="_blank">
                        {{ $company->social_media_accounts['facebook'] }}
                      </a>
                    </td>
                  </tr>
                @endif

                @if (isset($company->social_media_accounts['twitter']))
                  <tr>
                    <td class="font-weight-bold">Twitter</td>
                    <td>
                      <a href="{{ $company->social_media_accounts['twitter'] }}" target="_blank">
                        {{ $company->social_media_accounts['twitter'] }}
                      </a>
                    </td>
                  </tr>
                @endif

                @if (isset($company->social_media_accounts['instagram']))
                  <tr>
                    <td class="font-weight-bold">Instagram</td>
                    <td>
                      <a href="{{ $company->social_media_accounts['instagram'] }}" target="_blank">
                        {{ $company->social_media_accounts['instagram'] }}
                      </a>
                    </td>
                  </tr>
                @endif

                {{-- <tr>
                  <td class="font-weight-bold">アバター</td>
                  <td>
                    <img class="avatar avatar-md" src="{{ $company->avatar }}" style="height: 150px; width: 150px; border-width: 2px !important;">
                  </td>
                </tr> --}}

                @if ($company->cover_photo)
                  <tr>
                    <td class="font-weight-bold">アイキャッチ</td>
                    <td>
                      <img class="img-fluid border border-secondary my-3 w-100" src="{{ $company->cover_photo ?? 'https://placehold.it/450x450' }}" style="border-width: 2px !important;">
                    </td>
                  </tr>
                @endif

              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <table class="table">
              <tbody>
                @foreach([
                  'what' => '何をやっているのか？',
                  'why' => 'なぜやるのか',
                  'how' => 'どうやっているか'
                ] as $type => $subtitle)
                  @php
                    $photos = $type . '_photos';
                  @endphp
                  <tr>
                    <td style="width: 25%" class="font-weight-bold">{{ ucwords($type) }}<br>{{ $subtitle }}</td>
                    <td>
                      <dl>
                        <dt>説明</dt>
                        <dd style="white-space: pre-line;">{{ $company->what_text ?? '--' }}</dd>
                        @foreach([0, 1] as $id)
                          @if (isset($company->$photos[$id]))
                            <dt>写真{{ $company->$photos->count() > 1 ? $id + 1 : 1 }}</dt>
                            <dd>
                              <img class="img-fluid border border-secondary my-3 w-100" src="{{ $company->$photos[$id] }}" style="border-width: 2px !important;">
                            </dd>
                          @endif
                        @endforeach
                      </dl>
                    </td>
                  </tr>
                @endforeach

                @foreach([0, 1, 2] as $i)
                  @php
                    $feature = $company->features[$i] ?? null;
                  @endphp

                  @if (! empty($feature) && ! empty($feature->description))
                    <tr>
                      <td class="font-weight-bold">特徴{{ $i+1 }}</td>
                      <td style="white-space: pre-line;">{!! $feature->description ?? '' !!}</td>
                    </tr>
                  @endif
                @endforeach

                @foreach([0, 1, 2] as $i)
                  @php
                    $portfolio = $company->portfolios[$i] ?? null;
                  @endphp
                  @if ($portfolio)
                    <tr>
                      <td class="font-weight-bold">ポートフォリオ{{ $i+1 }}</td>
                      <td>
                        <dl>
                          <dt>タイトル</dt>
                          <dd>{{ $portfolio->title }}</dd>
                          <dt>内容</dt>
                          <dd style="white-space: pre-line;">{!! $portfolio->description !!}</dd>
                          <dt>URL</dt>
                          <dd><a href="{{ $portfolio->url }}" target="_blank">{{ $portfolio->url }}</a></dd>
                          @if ($portfolio->file)
                            <dt>画像</dt>
                            <dd>
                              <img class="img-fluid border border-secondary my-3 w-100" src="{{ $portfolio->file->url }}" style="border-width: 2px !important;">
                            </dd>
                          @endif
                        </dl>
                      </td>
                    </tr>
                  @endif
                @endforeach

              </tbody>
            </table>
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
          この会社を削除してもよろしいですか？
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
