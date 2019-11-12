<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <table class="table">
    <tr>
      <td style="width: 25%" class="font-weight-bold">自己紹介</td>
      <td>{{ '--' ?? '--' }}</td>
    </tr>
    <tr>
      <td class="font-weight-bold">やってみたいこと</td>
      <td>{{ '--' ?? '--' }}</td>
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