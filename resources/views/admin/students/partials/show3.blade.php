<div class="tab-pane fade" id="pills-skills" role="tabpanel" aria-labelledby="pills-skills-tab">
  <table class="table">
    <tr>
      <td width="50%">
        <dl class="mb-0">
          <dt>プログラミング言語</dt>
          <dd>
            <dl class="mt-3">
              @foreach($programming_languages as $id => $programming_language)
                @if(isset($student->listed_skills[$id]))
                  <dt class="text-muted">{{ ucwords($programming_language) }}</dt>
                  <dd>{{ skillRate($student->listed_skills[$id] ?? 0) }}</dd>
                @endif
              @endforeach
            </dl>
          </dd>
        </dl>
      </td>
      <td>
        <dl class="mb-0">
          <dt>フレームワーク</dt>
          <dd>
            <dl class="mt-3">
              @foreach($frameworks as $id => $framework)
                @if(isset($student->listed_skills[$id]))
                  <dt class="text-muted">{{ ucwords($framework) }}</dt>
                  <dd>{{ skillRate($student->listed_skills[$id] ?? 0) }}</dd>
                @endif
              @endforeach
            </dl>
          </dd>
        </dl>
      </td>
    </tr>
    <tr>
      <td>
        <div class="font-weight-bold">その他</div>
        @if (! $student->listed_skills->intersectByKeys($others)->count())
          <span>--</span>
        @endif
        <ul class="list-group list-group-flush my-3">
          @foreach($others as $id => $other)
            @if (isset($student->listed_skills[$id]))
              <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">{{ ucwords($other) }}</li>
            @endif
          @endforeach
        </ul>
      </td>
      <td>
        <dl class="mb-0">
          <dt>経験分野</dt>
          <dd>
            <dl class="mt-3">
              @foreach($experiences as $id => $experience)
                @if(isset($student->listed_skills[$id]))
                  <dt class="text-muted">{{ ucwords($experience) }}</dt>
                  <dd>{{ skillRate($student->listed_skills[$id] ?? 0) }}</dd>
                @endif
              @endforeach
            </dl>
          </dd>
        </dl>
      </td>
    </tr>
    <tr>
      <td>
        <div class="font-weight-bold">語学</dt>
        <ul class="list-group list-group-flush my-3">
          @if (! $student->listed_skills->intersectByKeys($languages)->count())
            <span>--</span>
          @endif
          @foreach($languages as $id => $language)
            @if (isset($student->listed_skills[$id]))
              <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">{{ $language }}</li>
            @endif
          @endforeach
        </ul>
      </td>
      <td>
        <dl>
          <dt>TOEIC</dt>
          <dd>{{ $student->toiec_score ?? 0 }}</dd>
        </dl>
      </td>
    </tr>
    @if ($student->portfolios->count())
      <tr>
        <td colspan="2">
          <dl class="mb-0">
            <dt>ポートフォリオ</dt>
            <dd>
              @foreach($student->portfolios as $portfolio)
                <dl class="mt-3">
                  <dt class="text-muted">タイトル</dt>
                  <dd>{{ $portfolio->title ?? '--' }}</dd>
                  <dt class="text-muted">内容</dt>
                  <dd style="white-space: pre-line;">{!! $portfolio->description ?? '--' !!}</dd>
                  @if ($portfolio->url)
                    <dt class="text-muted">URL</dt>
                    <dd><a href="{{ $portfolio->url }}" target="_blank">{{ $portfolio->url }}</a></dd>
                  @endif
                  <dt class="text-muted">画像</dt>
                  <dd>
                    <img class="img-fluid border border-secondary my-3 w-100" src="{{ $portfolio->file->url }}" style="border-width: 2px !important;">
                  </dd>
                </dl>
              @endforeach
            </dd>
          </dl>
        </td>
      </tr>
    @endif
    @if ($student->portfolios->count())
      <tr>
        <td colspan="2">
          <dl class="mb-0">
            <dt>Github</dt>
            <dd>
              @if ($student->github)
                <a href="{{ $student->github }}" target="_blank">{{ $student->github }}</a>
              @else
                --
              @endif
            </dd>
          </dl>
        </td>
      </tr>
    @endif
  </table>
</div>
