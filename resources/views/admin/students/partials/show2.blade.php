<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <table class="table">
    <tr>
      <td style="width: 25%" class="font-weight-bold">自己紹介</td>
      <td>{!! $student->intro_text ?? '--' !!}</td>
    </tr>
    
    <tr>
      <td class="font-weight-bold">やってみたいこと</td>
      <td>{!! $student->what_text ?? '--' !!}</td>
    </tr>

    @if ($student->work_history->count())
      <tr>
        <td class="font-weight-bold">職歴</td>
        <td>
          @foreach($student->work_history as $index => $work)
          <dl>
            <dt class="text-muted">企業名</dt>
            <dd>{{ $work->company_name ?? '--' }}</dd>

            <dt class="text-muted">役職</dt>
            <dd>{{ $work->role ?? '--' }}</dd>

            @if ($work->started_at)
              <dt class="text-muted">在籍期間</dt>
              <dd>
                {{ $work->started_at->format('Y年m月') }}
                {{ $work->ended_at ? ' - ' . $work->ended_at->format('Y年m月') : '- present' }}
              </dd>
            @endif

            @if (! empty($work->content))
              <dt class="text-muted">業務内容</dt>
              <dd style="white-space: pre-line;">{!! $work->content !!}</dd>
            @endif

          </dl>
          @if ($index+1 != $student->work_history->count())
            <hr>
          @endif
          @endforeach
        </td>
      </tr>
    @endif

    @if ($student->education_history->count())
      <tr>
        <td class="font-weight-bold">学歴</td>
        <td>
          @foreach($student->education_history as $index => $education)
            <dl>
              <dt class="text-muted">学校名</dt>
              <dd>{{ $education->school_name ?? '--' }}</dd>
              
              @if (! empty($education->faculty) || ! empty($education->major) || ! empty($education->department))
                <dt class="text-muted">学部、専攻、学科</dt>
                <dd>
                  {{ ! empty($education->faculty) ? ucwords($education->faculty) . ', ' : '--' }}
                  {{ ! empty($education->major) ? ucwords($education->major) . ', ' : '--' }}
                  {{ ! empty($education->department) ? ucwords($education->department) . ', ' : '--' }}
                </dd>
              @endif

              @if ($education->graduated_at)
                <dt class="text-muted">卒業</dt>
                <dd>{{ $education->graduated_at->format('Y年m月') }}</dd>
              @endif

              @if (! empty($education->content))
                <dt class="text-muted">学んだこと</dt>
                <dd style="white-space: pre-line;">{!! $education->content !!}</dd>
              @endif
            </dl>
            @if ($index+1 != $student->education_history->count())
              <hr>
            @endif
          @endforeach
        </td>
      </tr>
    @endif

{{--     <tr>
      <td class="font-weight-bold">アバター</td>
      <td>
        <img class="avatar avatar-md" src="{{ $student->avatar }}" style="height: 150px; width: 150px; border-width: 2px !important;">
      </td>
    </tr> --}}

    @if ($student->cover_photo)
      <tr>
        <td class="font-weight-bold">アイキャッチ</td>
        <td>
          <img class="img-fluid border border-secondary my-3 w-100" src="{{ $student->cover_photo ?? 'https://placehold.it/450x450' }}" style="border-width: 2px !important;">
        </td>
      </tr>
    @endif

    @if ($student->movie_url)
      <tr>
        <td class="font-weight-bold">ムービー</td>
        <td>
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ $student->movie_url }}"
              allowfullscreen></iframe>
          </div>
        </td>
      </tr>
    @endif

  </table>
</div>