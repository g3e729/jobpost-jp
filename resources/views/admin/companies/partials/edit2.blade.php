<form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="{{ route('admin.companies.update', $company) }}" enctype="multipart/form-data" novalidate>
  @csrf
  {{ method_field('PATCH') }}

  @foreach([
    'what' => '何をやっているのか？',
    'why' => 'なぜやるのか',
    'how' => 'どうやっているか'
  ] as $type => $subtitle)
    @php
      $attr = $type . '_text';
      $photo = $type . '_photo';
      $photos = $type . '_photos';
    @endphp
    <div class="pb-3 row">
      <div class="col-3 font-weight-bold">{{ ucwords($type) }}<br>{{ $subtitle }}</div>

      <div class="col-9">
        <div class="form-group position-relative">
          <label for="formWhatDesc" class="form-label pt-0">説明</label>
          <textarea class="form-control" id="formWhatDesc" name="{{ $attr }}" placeholder="" rows="4" cstyle="min-height: 100px;" required>{{ old($attr, $company->$attr) }}</textarea>
          <div class="invalid-tooltip">
            Please enter your company's `{{ $type }}`.
          </div>
        </div>

        @foreach ([0, 1] as $id)
          <div class="form-group position-relative">
            <label for="formWhatImg" class="form-label pt-0">写真{{ $id + 1 }}</label>
            <div data-group="eyecatch">
              <div class="pb-3 d-inline-flex flex-column align-items-center">
                <img data-avatar="preview" class="img-fluid border border-secondary mb-3" src="{{ $company->$photos[$id] ?? 'https://placehold.it/240x240' }}">
                <button data-avatar="delete" type="button" class="alt-font btn btn-danger w-100 mb-2" {{ isset($company->$photos[$id]) && $company->$photos[$id] ? null : 'disabled'}}>Delete</button>
              </div>

              <input data-avatar="hidden" type="hidden" name="photos[{{$type }}][{{ $id }}]['deleted']" value="0">
              <input data-avatar="file" type="file" class="form-control-file" id="formWhatImg" name="photos[{{$type }}][{{ $id }}]"
                accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
              <div class="input-group">
                <input data-avatar="name" type="text" class="form-control" value="{{ $company->$photos[$id] ?? null }}"
                  disabled>
                <div class="input-group-append">
                  <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  @endforeach

  @foreach ([0, 1, 2] as $i)
    @php
      $feature = $company->features[$i] ?? null
    @endphp
    <div class="form-group pb-3 row">
      <label for="formFeature" class="col-3 col-form-label font-weight-bold">特徴{{ $i+1 }}</label>
      <div class="col-9">
        <input type="hidden" name="features[{{ $i }}][title]" value="">
        <textarea class="form-control" name="features[{{ $i }}][description]" placeholder="" rows="4"
          style="min-height: 100px;">{{ $feature->description ?? '' }}</textarea>
      </div>
    </div>
  @endforeach

  @foreach([0, 1, 2] as $i)
    @php
      $portfolio = $company->portfolios[$i] ?? null;
    @endphp
    <div class="pb-3 row">
      <div class="col-3 font-weight-bold">ポートフォリオ{{ $i+1 }}</div>
      <div class="col-9">
        <div class="form-group position-relative">
          <label for="formPortfolioTitle" class="form-label pt-0">タイトル</label>
          <input type="text" class="form-control" id="formPortfolioTitle" name="portfolios[{{ $i }}][title]" value="{{ $portfolio->title ?? '' }}" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formPortfolioDesc" class="form-label pt-0">内容</label>
          <textarea class="form-control" id="formPortfolioDesc" name="portfolios[{{ $i }}][description]" placeholder="" rows="4" style="min-height: 100px;">{{ $portfolio->description ?? '' }}</textarea>
        </div>

        <div class="form-group position-relative">
          <label for="formPortfolioURL" class="form-label pt-0">URL</label>
          <input type="url" class="form-control" id="formPortfolioURL" name="portfolios[{{ $i }}][url]" value="{{ $portfolio->url ?? '' }}" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formPortfolioImg" class="form-label pt-0">画像</label>
          <div data-group="eyecatch">
            <div class="pb-3 d-inline-flex flex-column align-items-center">
              <img data-avatar="preview" class="img-fluid border border-secondary mb-3" src="{{ $portfolio->file->url ?? 'https://placehold.it/240x240' }}">
              <button data-avatar="delete" type="button" class="alt-font btn btn-danger w-100 mb-2" {{ isset($portfolio->file->url) && $portfolio->file->url ? null : 'disabled'}}>Delete</button>
            </div>

            <input data-avatar="hidden" type="hidden" name="portfolios[{{ $i }}][file]['deleted']" value="0">
            <input data-avatar="file" type="file" class="form-control-file" id="formPortfolioImg" name="portfolios[{{ $i }}][file]"
              accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
            <div class="input-group">
              <input data-avatar="name" type="text" class="form-control" value="{{ $portfolio->file->url ?? null }}" disabled>
              <div class="input-group-append">
                <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  <div class="form-group row">
    <div class="col-6 py-4 mx-auto">
      <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
    </div>
  </div>
</form>
