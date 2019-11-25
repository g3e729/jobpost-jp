<form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="{{ route('admin.students.update', $student) }}" enctype="multipart/form-data" novalidate>
  @csrf
  {{ method_field('PATCH') }}

  <div class="pb-3 row">
    <div class="col-6">
      <dl class="mb-0">
        <dt>プログラミング言語
          <button type="button" data-target="js-prog-lang" data-title="プログラミング言語" class="js-modal-target ml-3 alt-font btn btn-primary btn-sm">編集する</button>
        </dt>
        <dd>
          <dl class="mt-3">
            @foreach($programming_languages as $id => $programming_language)
              <dt class="text-muted">{{ ucwords($programming_language) }}</dt>
              <dd>{{ $student->listed_skills[$id] ?? 0 }}</dd>
            @endforeach
          </dl>
        </dd>
      </dl>
      <div id="js-prog-lang" class="form-group row" style="display: none;">
        @foreach($programming_languages as $id => $programming_language)
        <div class="col-4 font-weight-bold">{{ ucwords($programming_language) }}</div>
        <div class="col-8 text-right">
          <div class="js-btn-group btn-group btn-group-toggle" data-toggle="buttons">
            @foreach($rates as $rate => $text)
              @php
                $skill_rate = isset($student->listed_skills[$id]) ? $student->listed_skills[$id] : 0;
              @endphp
              <label class="alt-font btn btn-light {{ $skill_rate == $rate ? 'active' : ''}}">
                  <input type="radio" name="{{ $id }}" value="{{ $rate }}" autocomplete="off" {{ $skill_rate == $rate ? 'checked' : ''}}/> {{ $text }}
              </label>
            @endforeach
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="col-6">
      <dl class="mb-0">
        <dt>フレームワーク
          <button type="button" data-target="js-prog-framework" data-title="フレームワーク" class="js-modal-target ml-3 alt-font btn btn-primary btn-sm">編集する</button>
        </dt>
        <dd>
          <dl class="mt-3">
            @foreach($frameworks as $id => $framework)
              <dt class="text-muted">{{ ucwords($framework) }}</dt>
              <dd>{{ $student->listed_skills[$id] ?? 0 }}</dd>
            @endforeach
          </dl>
        </dd>
      </dl>
      <div id="js-prog-framework" class="form-group row" style="display: none;">
        @foreach($frameworks as $id => $framework)
        <div class="col-4 font-weight-bold">{{ ucwords($framework) }}</div>
        <div class="col-8 text-right">
          <div class="js-btn-group btn-group btn-group-toggle" data-toggle="buttons">
            @foreach($rates as $rate => $text)
              @php
                $skill_rate = isset($student->listed_skills[$id]) ? $student->listed_skills[$id] : 0;
              @endphp
              <label class="alt-font btn btn-light {{ $skill_rate == $rate ? 'active' : ''}}">
                  <input type="radio" name="{{ $id }}" value="{{ $rate }}" autocomplete="off" {{ $skill_rate == $rate ? 'checked' : ''}}/> {{ $text }}
              </label>
            @endforeach
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="pb-3 row">
    <div class="col-6">
      <div class="font-weight-bold">その他
        <button type="button" data-target="js-prog-skills" data-title="その他" class="js-modal-target ml-3 alt-font btn btn-primary btn-sm">編集する</button>
      </div>
      <ul class="list-group list-group-flush my-3">
        @if (! $student->listed_skills->intersectByKeys($others)->count())
          --
        @endif
        @foreach($others as $id => $other)
          @if (isset($student->listed_skills[$id]))
            <li class="list-group-item text-muted mb-1 p-0 border-0 bg-transparent">{{ $other }}</li>
          @endif
        @endforeach
      </ul>
      <div id="js-prog-skills" class="form-group row" style="display: none;">
        @foreach($others as $id => $other)
          <div class="col-4 font-weight-bold">{{ ucwords($other) }}</div>
          <div class="col-8 text-right">
            <div class="js-btn-group btn-group btn-group-toggle" data-toggle="buttons">
              @foreach($rates as $rate => $text)
                @php
                  $skill_rate = isset($student->listed_skills[$id]) ? $student->listed_skills[$id] : 0;
                @endphp
                <label class="alt-font btn btn-light {{ $skill_rate == $rate ? 'active' : ''}}">
                    <input type="radio" name="{{ $id }}" value="{{ $rate }}" autocomplete="off" {{ $skill_rate == $rate ? 'checked' : ''}}/> {{ $text }}
                </label>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="col-6">
      <dl class="mb-0">
        <dt>経験分野
          <button type="button" data-target="js-prog-exp" data-title="経験分野" class="js-modal-target ml-3 alt-font btn btn-primary btn-sm">編集する</button>
        </dt>
        <dd>
          <dl class="mt-3">
            @foreach($experiences as $id => $experience)
              <dt class="text-muted">{{ ucwords($experience) }}</dt>
              <dd>{{ $student->listed_skills[$id] ?? 0 }}</dd>
            @endforeach
          </dl>
        </dd>
      </dl>
      <div id="js-prog-exp" class="form-group row" style="display: none;">
        @foreach($experiences as $id => $experience)
        <div class="col-4 font-weight-bold">{{ ucwords($experience) }}</div>
        <div class="col-8 text-right">
          <div class="js-btn-group btn-group btn-group-toggle" data-toggle="buttons">
            @foreach($rates as $rate => $text)
              @php
                $skill_rate = isset($student->listed_skills[$id]) ? $student->listed_skills[$id] : 0;
              @endphp
              <label class="alt-font btn btn-light {{ $skill_rate == $rate ? 'active' : ''}}">
                  <input type="radio" name="{{ $id }}" value="{{ $rate }}" autocomplete="off" {{ $skill_rate == $rate ? 'checked' : ''}}/> {{ $text }}
              </label>
            @endforeach
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formLanguage" class="col-3 col-form-label font-weight-bold">語学</label>
    <div class="col-9">
      <select class="form-control" id="formLanguage" name="language">
        <option value="" selected hidden disabled>Choose language</option>
        @foreach($languages as $index => $language)
        <option value="{{ $index }}" {{ ($index == $student->language) ? 'selected' : null }}>{{ ucwords($language) }}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formJapaneseName" class="col-3 col-form-label font-weight-bold">TOEIC</label>
    <div class="col-9">
      <input type="number" class="form-control" id="formToeic" name="toiec_score" value="{{ $student->toeic }}" placeholder="">
    </div>
  </div>

  @foreach([0, 1, 2] as $i)
    @php
      $portfolio = isset($student->portfolios[$i]) ? $student->portfolios[$i] : null
    @endphp
    <div class="pb-3 row">
      <div class="col-3 font-weight-bold">ポートフォリオ{{ $i + 1 }}</div>
      <div class="col-9">
        <div class="form-group position-relative">
          <label for="formPortfolioTitle" class="form-label pt-0">タイトル</label>
          <input type="text" class="form-control" id="formPortfolioTitle" name="portfolios[{{ $i }}][title]"
            value="{{ $portfolio->title ?? '' }}" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formPortfolioDesc" class="form-label pt-0">内容</label>
          <textarea class="form-control" id="formPortfolioDesc" name="portfolios[{{ $i }}][description]" placeholder="" rows="4"
            style="min-height: 100px;">{{ $portfolio->description ?? '' }}</textarea>
        </div>

        <div class="form-group position-relative">
          <label for="formPortfolioURL" class="form-label pt-0">URL</label>
          <input type="url" class="form-control" id="formPortfolioURL" name="portfolios[{{ $i }}][url]"
            value="{{ $portfolio->url ?? '' }}" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formPortfolioImg" class="form-label pt-0">画像</label>
          <div data-group="eyecatch">
            <div class="pb-3 d-inline-flex flex-column align-items-center">
              <img data-avatar="preview" class="img-fluid border border-secondary mb-3" src="{{ $portfolio->file->url ?? 'https://placehold.it/240x240' }}">
              <button data-avatar="delete" type="button" class="alt-font btn btn-danger w-100 mb-2" {{ isset($student->portfolio_img) && $student->portfolio_img ? null : 'disabled'}}>Delete</button>
            </div>

            <input data-avatar="hidden" type="hidden" name="portfolio_img_deleted" value="0">
            <input data-avatar="file" type="file" class="form-control-file" id="formPortfolioImg" name="portfolios[{{ $i }}][file]"
              accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
            <div class="input-group">
              <input data-avatar="name" type="text" class="form-control" value="{{ $student->portfolio_img ?? null }}"
                disabled>
              <div class="input-group-append">
                <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  <div class="form-group pb-3 row">
    <label for="formGithub" class="col-3 col-form-label font-weight-bold">Github</label>
    <div class="col-9">
      <input type="url" class="form-control" id="formGithub" name="github" value="{{ $student->github }}"
        placeholder="">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-6 py-4 mx-auto">
      <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
    </div>
  </div>
</form>

<div class="modal fade" id="js-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="alt-font btn btn-secondary" data-dismiss="modal">キャンセル</button>
        <button id="js-modal-submit" type="button" class="alt-font btn btn-primary">確認する</button>
      </div>
    </div>
  </div>
</div>

<script>
  const targetButtons = document.querySelectorAll('.js-modal-target');
  const modalSubmit = document.querySelector('#js-modal-submit');
  const modal = document.querySelector('#js-modal');
  const elementForm = document.forms['editForm'];
  const pageButtons = [...targetButtons];

  pageButtons.forEach(btn => {
    btn.addEventListener('click', function(event) {
      event.preventDefault();

      let title = this.dataset.title;
      let target = this.dataset.target;
      let elementTarget = document.querySelector(`#${target}`);
      let elementClone = elementTarget.cloneNode(true);
      elementClone.style.display = 'flex';

      modal.querySelector('.modal-title').textContent = title;
      modal.querySelector('.modal-body').textContent = null;
      modal.querySelector('.modal-body').appendChild(elementClone);

      $(modal).modal('show');

      const elementModal = modal.querySelector('.modal-body');
      const elementsRadio = elementModal.querySelectorAll('input[type="radio"]');

      $(elementsRadio).on('change', (ev) => {
        let currActive = ev.currentTarget.value;
        let actualActive;
        if (currActive == 0) { ctualActive = 2; }
        else if (currActive == 1) { actualActive = 1; }
        else { actualActive = 0; }

        let elementInput = ev.currentTarget.name;
        let elementsGroup = elementForm.querySelectorAll(`[name=${elementInput}]`);
        let elementsParent = [...elementsGroup].map(e => e.parentNode);

        elementsParent.forEach((el, idx) => {
          el.classList.remove('active');
          el.children[0].removeAttribute('checked');

          if (idx == actualActive) {
            el.classList.add('active');
            el.children[0].setAttribute('checked', 'checked');
          }
        });
      });
    })
  });

  modalSubmit.addEventListener('click', function(event) {
    $(modal).modal('hide');
    elementForm.submit();
  });
</script>
