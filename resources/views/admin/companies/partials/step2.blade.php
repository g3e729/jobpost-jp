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
              <input data-avatar="file" type="file" class="form-control-file" id="formWhatImg" name="photos[{{$type }}][{{ $id }}]"
                accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
              <div class="input-group">
                <input data-avatar="name" type="text" class="form-control" value="{{ $company->$photos[$id] ?? null }}"
                  disabled>
                <div class="input-group-append">
                  <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
                </div>
              </div>

              <div class="mt-3">
                <img data-avatar="preview" class="img-fluid border border-secondary my-3"
                  src="{{ $company->$photos[$id] ?? 'https://placehold.it/240x240' }}">
              </div>

            </div>
          </div>
        @endforeach

      </div>
    </div>
  @endforeach

  <div class="form-group pb-3 row">
    <label for="formFeature" class="col-3 col-form-label font-weight-bold">特徴１</label>
    <div class="col-9">
      <textarea class="form-control" id="formFeature" name="feature" placeholder="" rows="4"
        style="min-height: 100px;">{{ $company->feature }}</textarea>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formFeature2" class="col-3 col-form-label font-weight-bold">特徴2</label>
    <div class="col-9">
      <textarea class="form-control" id="formFeature2" name="feature2" placeholder="" rows="4"
        style="min-height: 100px;">{{ $company->feature2 }}</textarea>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formFeature3" class="col-3 col-form-label font-weight-bold">特徴3</label>
    <div class="col-9">
      <textarea class="form-control" id="formFeature3" name="feature3" placeholder="" rows="4"
        style="min-height: 100px;">{{ $company->feature3 }}</textarea>
    </div>
  </div>

  {{-- @foreach([1, 2, 3] as $i)
    <div class="pb-3 row">
      <div class="col-3 font-weight-bold">ポートフォリオ{{ $i }}</div>
      <div class="col-9">
        <div class="form-group position-relative">
          <label for="formPortfolioTitle" class="form-label pt-0">タイトル</label>
          <input type="text" class="form-control" id="formPortfolioTitle" name="portfolio[{{ $i }}][title]" value="" placeholder="">
        </div>
        
        <div class="form-group position-relative">
          <label for="formPortfolioDesc" class="form-label pt-0">内容</label>
          <textarea class="form-control" id="formPortfolioDesc" name="portfolio[{{ $i }}][description]" placeholder="" rows="4" style="min-height: 100px;"></textarea>
        </div>

        <div class="form-group position-relative">
          <label for="formPortfolioURL" class="form-label pt-0">URL</label>
          <input type="url" class="form-control" id="formPortfolioURL" name="portfolio[{{ $i }}][url]" value="" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formPortfolioImg" class="form-label pt-0">画像</label>
          <div data-group="eyecatch">
            <input data-avatar="file" type="file" class="form-control-file" id="formPortfolioImg" name="portfolio[{{ $i }}][img]"
              accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
            <div class="input-group">
              <input data-avatar="name" type="text" class="form-control" value="{{ $company->portfolio_img ?? null }}" disabled>
              <div class="input-group-append">
                <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
              </div>
            </div>

            <div class="mt-3">
              <img data-avatar="preview" class="img-fluid border border-secondary my-3"
                src="{{ $company->portfolio_img ?? 'https://placehold.it/240x240' }}">
            </div>

          </div>
        </div>
      </div>
    </div>
  @endforeach
 --}}
  <div class="form-group row">
    <div class="col-6 py-4 mx-auto">
      <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
    </div>
  </div>
</form>