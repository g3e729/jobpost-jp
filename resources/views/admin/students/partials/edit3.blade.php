<form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="" novalidate>
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
        <div class="col-3 font-weight-bold">{{ ucwords($programming_language) }}</div>
        <div class="col-9 text-right">
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-light">
              <input type="radio" name="{{ $programming_language }}" value="2" autocomplete="off"> 受講済み
            </label>
            <label class="btn btn-light">
              <input type="radio" name="{{ $programming_language }}" value="1" autocomplete="off"> 受講中
            </label>
            <label class="btn btn-light active">
              <input type="radio" name="{{ $programming_language }}" value="0" autocomplete="off" checked> 受けてない
            </label>
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
        <div class="col-3 font-weight-bold">{{ ucwords($framework) }}</div>
        <div class="col-9 text-right">
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-light">
              <input type="radio" name="{{ $framework }}" value="2" autocomplete="off"> 受講済み
            </label>
            <label class="btn btn-light">
              <input type="radio" name="{{ $framework }}" value="1" autocomplete="off"> 受講中
            </label>
            <label class="btn btn-light active">
              <input type="radio" name="{{ $framework }}" value="0" autocomplete="off" checked> 受けてない
            </label>
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
        <div class="col-3 font-weight-bold">{{ ucwords($other) }}</div>
        <div class="col-9 text-right">
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-light">
              <input type="radio" name="{{ $other }}" value="2" autocomplete="off"> 受講済み
            </label>
            <label class="btn btn-light">
              <input type="radio" name="{{ $other }}" value="1" autocomplete="off"> 受講中
            </label>
            <label class="btn btn-light active">
              <input type="radio" name="{{ $other }}" value="0" autocomplete="off" checked> 受けてない
            </label>
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
        <div class="col-3 font-weight-bold">{{ ucwords($experience) }}</div>
        <div class="col-9 text-right">
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-light">
              <input type="radio" name="{{ $experience }}" value="2" autocomplete="off"> 受講済み
            </label>
            <label class="btn btn-light">
              <input type="radio" name="{{ $experience }}" value="1" autocomplete="off"> 受講中
            </label>
            <label class="btn btn-light active">
              <input type="radio" name="{{ $experience }}" value="0" autocomplete="off" checked> 受けてない
            </label>
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
      <input type="number" class="form-control" id="formToeic" name="toeic" value="{{ $student->toeic }}" placeholder="">
    </div>
  </div>

  <div class="pb-3 row">
    <div class="col-3 font-weight-bold">ポートフォリオ１</div>
    <div class="col-9">
      <div class="form-group position-relative">
        <label for="formPortfolioTitle" class="form-label pt-0">タイトル</label>
        <input type="text" class="form-control" id="formPortfolioTitle" name="portfolio_title"
          value="{{ $student->portfolio_title }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolioDesc" class="form-label pt-0">内容</label>
        <textarea class="form-control" id="formPortfolioDesc" name="portfolio_desc" placeholder="" rows="4"
          style="min-height: 100px;">{{ $student->portfolio_desc }}</textarea>
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolioURL" class="form-label pt-0">URL</label>
        <input type="url" class="form-control" id="formPortfolioURL" name="portfolio_url"
          value="{{ $student->portfolio_url }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolioImg" class="form-label pt-0">画像</label>
        <div data-group="eyecatch">
          <input data-avatar="file" type="file" class="form-control-file" id="formPortfolioImg" name="portfolio_img"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group">
            <input data-avatar="name" type="text" class="form-control" value="{{ $student->portfolio_img ?? null }}"
              disabled>
            <div class="input-group-append">
              <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
            </div>
          </div>

          <div class="mt-3">
            <img data-avatar="preview" class="img-fluid border border-secondary my-3"
              src="{{ $student->portfolio_img ?? 'https://placehold.it/240x240' }}">
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="pb-3 row">
    <div class="col-3 font-weight-bold">ポートフォリオ2</div>
    <div class="col-9">
      <div class="form-group position-relative">
        <label for="formPortfolio2Title" class="form-label pt-0">タイトル</label>
        <input type="text" class="form-control" id="formPortfolio2Title" name="portfolio2_title"
          value="{{ $student->portfolio2_title }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolio2Desc" class="form-label pt-0">内容</label>
        <textarea class="form-control" id="formPortfolio2Desc" name="portfolio2_desc" placeholder="" rows="4"
          style="min-height: 100px;">{{ $student->portfolio2_desc }}</textarea>
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolio2URL" class="form-label pt-0">URL</label>
        <input type="url" class="form-control" id="formPortfolio2URL" name="portfolio2_url"
          value="{{ $student->portfolio2_url }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolio2Img" class="form-label pt-0">画像</label>
        <div data-group="eyecatch">
          <input data-avatar="file" type="file" class="form-control-file" id="formPortfolio2Img" name="portfolio2_img"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group">
            <input data-avatar="name" type="text" class="form-control" value="{{ $student->portfolio2_img ?? null }}"
              disabled>
            <div class="input-group-append">
              <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
            </div>
          </div>

          <div class="mt-3">
            <img data-avatar="preview" class="img-fluid border border-secondary my-3"
              src="{{ $student->portfolio2_img ?? 'https://placehold.it/240x240' }}">
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="pb-3 row">
    <div class="col-3 font-weight-bold">ポートフォリオ3</div>
    <div class="col-9">
      <div class="form-group position-relative">
        <label for="formPortfolio3Title" class="form-label pt-0">タイトル</label>
        <input type="text" class="form-control" id="formPortfolio3Title" name="portfolio3_title"
          value="{{ $student->portfolio3_title }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolio3Desc" class="form-label pt-0">内容</label>
        <textarea class="form-control" id="formPortfolio3Desc" name="portfolio3_desc" placeholder="" rows="4"
          style="min-height: 100px;">{{ $student->portfolio3_desc }}</textarea>
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolio3URL" class="form-label pt-0">URL</label>
        <input type="url" class="form-control" id="formPortfolio3URL" name="portfolio3_url"
          value="{{ $student->portfolio3_url }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolio3Img" class="form-label pt-0">画像</label>
        <div data-group="eyecatch">
          <input data-avatar="file" type="file" class="form-control-file" id="formPortfolio3Img" name="portfolio3_img"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group">
            <input data-avatar="name" type="text" class="form-control" value="{{ $student->portfolio3_img ?? null }}"
              disabled>
            <div class="input-group-append">
              <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
            </div>
          </div>

          <div class="mt-3">
            <img data-avatar="preview" class="img-fluid border border-secondary my-3"
              src="{{ $student->portfolio3_img ?? 'https://placehold.it/240x240' }}">
          </div>

        </div>
      </div>
    </div>
  </div>

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
  const pageButtons = [...targetButtons];

  pageButtons.forEach(btn => {
    btn.addEventListener('click', function(event) {
      event.preventDefault();

      let title = this.dataset.title;
      let target = this.dataset.target;
      let elementTarget = document.querySelector(`#${target}`);
      elementTarget.style.display =  'flex';

      modal.querySelector('.modal-title').textContent = title;
      modal.querySelector('.modal-body').appendChild(elementTarget);

      $(modal).modal('show');
    })
  });

  modalSubmit.addEventListener('click', function(event) {
    $(modal).modal('hide');
    document.forms['editForm'].submit();
  });
</script>
