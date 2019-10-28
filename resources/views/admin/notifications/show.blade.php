@extends('admin.layouts.default')

@section('content')
  <div class="l-container l-container-narrow py-4">
    <div class="shadow-sm card card-notification-detail">
      <div class="card-body pt-5 px-5">
        <h2 class="card-title w-100 text-truncate">Kredoブログを更新しました。</h2>
        <p class="card-text" style="white-space: pre-line;">「AI（人工知能）時代にプログラマーは失業？生き残るための方法とAIエンジニアを目指す方法」を更新

          https://kredo.jp/media/ai-programmer-survive/
        </p>
        <div class="card-actions card-actions-right position-absolute">
          <a href="/notification/1/edit" class="card-link">編集</a>
          <a href="/notification/1/delete" class="card-link text-muted">削除</a>
        </div>
      </div>
      <div class="card-footer bg-primary px-5">
        <small class="text-white">2019年 9月 12日</small>
      </div>
    </div>
  </div>
@endsection