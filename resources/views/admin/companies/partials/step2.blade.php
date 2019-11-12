<form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="" novalidate>
  @csrf
  {{ method_field('PATCH') }}

  <div class="pb-3 row">
    <div class="col-3 font-weight-bold">What<br>何をやっているのか？</div>
    <div class="col-9">
      <div class="form-group position-relative">
        <label for="formWhatDesc" class="form-label pt-0">説明</label>
        <textarea class="form-control" id="formWhatDesc" name="what_desc" placeholder="" rows="4" cstyle="min-height: 100px;" required>{{ $company->what_desc ?? null }}</textarea>
        <div class="invalid-tooltip">
          Please enter your company's `what`.
        </div>
      </div>

      <div class="form-group position-relative">
        <label for="formWhatImg" class="form-label pt-0">写真１</label>
        <div data-group="eyecatch">
          <input data-avatar="file" type="file" class="form-control-file" id="formWhatImg" name="what_img"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group">
            <input data-avatar="name" type="text" class="form-control" value="{{ $company->what_img ?? null }}"
              disabled>
            <div class="input-group-append">
              <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
            </div>
          </div>

          <div class="mt-3">
            <img data-avatar="preview" class="img-fluid border border-secondary my-3"
              src="{{ $company->what_img ?? 'https://placehold.it/240x240' }}">
          </div>

        </div>
      </div>

      <div class="form-group position-relative">
        <label for="formWhatImg2" class="form-label pt-0">写真１</label>
        <div data-group="eyecatch">
          <input data-avatar="file" type="file" class="form-control-file" id="formWhatImg2" name="what_img2"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group">
            <input data-avatar="name" type="text" class="form-control" value="{{ $company->what_img2 ?? null }}"
              disabled>
            <div class="input-group-append">
              <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
            </div>
          </div>

          <div class="mt-3">
            <img data-avatar="preview" class="img-fluid border border-secondary my-3"
              src="{{ $company->what_img2 ?? 'https://placehold.it/240x240' }}">
          </div>

        </div>
      </div>

    </div>
  </div>

  <div class="pb-3 row">
    <div class="col-3 font-weight-bold">Why<br>なぜやるのか</div>
    <div class="col-9">
      <div class="form-group position-relative">
        <label for="formWhyDesc" class="form-label pt-0">説明</label>
        <textarea class="form-control" id="formWhyDesc" name="why_desc" placeholder="" rows="4" cstyle="min-height: 100px;" required>{{ $company->why_desc ?? null }}</textarea>
        <div class="invalid-tooltip">
          Please enter your company's `why`.
        </div>
      </div>

      <div class="form-group position-relative">
        <label for="formWhyImg" class="form-label pt-0">写真１</label>
        <div data-group="eyecatch">
          <input data-avatar="file" type="file" class="form-control-file" id="formWhyImg" name="why_img"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group">
            <input data-avatar="name" type="text" class="form-control" value="{{ $company->why_img ?? null }}"
              disabled>
            <div class="input-group-append">
              <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
            </div>
          </div>

          <div class="mt-3">
            <img data-avatar="preview" class="img-fluid border border-secondary my-3"
              src="{{ $company->why_img ?? 'https://placehold.it/240x240' }}">
          </div>

        </div>
      </div>

      <div class="form-group position-relative">
        <label for="formWhyImg2" class="form-label pt-0">写真１</label>
        <div data-group="eyecatch">
          <input data-avatar="file" type="file" class="form-control-file" id="formWhyImg2" name="why_img2"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group">
            <input data-avatar="name" type="text" class="form-control" value="{{ $company->why_img2 ?? null }}"
              disabled>
            <div class="input-group-append">
              <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
            </div>
          </div>

          <div class="mt-3">
            <img data-avatar="preview" class="img-fluid border border-secondary my-3"
              src="{{ $company->why_img2 ?? 'https://placehold.it/240x240' }}">
          </div>

        </div>
      </div>

    </div>
  </div>

  <div class="pb-3 row">
    <div class="col-3 font-weight-bold">How<br>どうやっているか</div>
    <div class="col-9">
      <div class="form-group position-relative">
        <label for="formHowDesc" class="form-label pt-0">説明</label>
        <textarea class="form-control" id="formHowDesc" name="how_desc" placeholder="" rows="4"
          cstyle="min-height: 100px;" required>{{ $company->how_desc ?? null }}</textarea>
        <div class="invalid-tooltip">
          Please enter your company's `how`.
        </div>
      </div>

      <div class="form-group position-relative">
        <label for="formHowImg" class="form-label pt-0">写真１</label>
        <div data-group="eyecatch">
          <input data-avatar="file" type="file" class="form-control-file" id="formHowImg" name="how_img"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group">
            <input data-avatar="name" type="text" class="form-control" value="{{ $company->how_img ?? null }}" disabled>
            <div class="input-group-append">
              <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
            </div>
          </div>

          <div class="mt-3">
            <img data-avatar="preview" class="img-fluid border border-secondary my-3"
              src="{{ $company->how_img ?? 'https://placehold.it/240x240' }}">
          </div>

        </div>
      </div>

      <div class="form-group position-relative">
        <label for="formWhyImg2" class="form-label pt-0">写真１</label>
        <div data-group="eyecatch">
          <input data-avatar="file" type="file" class="form-control-file" id="formWhyImg2" name="how_img2"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group">
            <input data-avatar="name" type="text" class="form-control" value="{{ $company->how_img2 ?? null }}" disabled>
            <div class="input-group-append">
              <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
            </div>
          </div>

          <div class="mt-3">
            <img data-avatar="preview" class="img-fluid border border-secondary my-3"
              src="{{ $company->how_img2 ?? 'https://placehold.it/240x240' }}">
          </div>

        </div>
      </div>

    </div>
  </div>

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

  <div class="pb-3 row">
    <div class="col-3 font-weight-bold">ポートフォリオ１</div>
    <div class="col-9">
      <div class="form-group position-relative">
        <label for="formPortfolioTitle" class="form-label pt-0">タイトル</label>
        <input type="text" class="form-control" id="formPortfolioTitle" name="portfolio_title" value="{{ $company->portfolio_title }}" placeholder="">
      </div>
      
      <div class="form-group position-relative">
        <label for="formPortfolioDesc" class="form-label pt-0">内容</label>
        <textarea class="form-control" id="formPortfolioDesc" name="portfolio_desc" placeholder="" rows="4" style="min-height: 100px;">{{ $company->portfolio_desc }}</textarea>
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolioURL" class="form-label pt-0">URL</label>
        <input type="url" class="form-control" id="formPortfolioURL" name="portfolio_url" value="{{ $company->portfolio_url }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolioImg" class="form-label pt-0">画像</label>
        <div data-group="eyecatch">
          <input data-avatar="file" type="file" class="form-control-file" id="formPortfolioImg" name="portfolio_img"
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
  
  <div class="pb-3 row">
    <div class="col-3 font-weight-bold">ポートフォリオ2</div>
    <div class="col-9">
      <div class="form-group position-relative">
        <label for="formPortfolio2Title" class="form-label pt-0">タイトル</label>
        <input type="text" class="form-control" id="formPortfolio2Title" name="portfolio2_title" value="{{ $company->portfolio2_title }}" placeholder="">
      </div>
      
      <div class="form-group position-relative">
        <label for="formPortfolio2Desc" class="form-label pt-0">内容</label>
        <textarea class="form-control" id="formPortfolio2Desc" name="portfolio2_desc" placeholder="" rows="4" style="min-height: 100px;">{{ $company->portfolio2_desc }}</textarea>
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolio2URL" class="form-label pt-0">URL</label>
        <input type="url" class="form-control" id="formPortfolio2URL" name="portfolio2_url" value="{{ $company->portfolio2_url }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolio2Img" class="form-label pt-0">画像</label>
        <div data-group="eyecatch">
          <input data-avatar="file" type="file" class="form-control-file" id="formPortfolio2Img" name="portfolio2_img"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group">
            <input data-avatar="name" type="text" class="form-control" value="{{ $company->portfolio2_img ?? null }}" disabled>
            <div class="input-group-append">
              <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
            </div>
          </div>

          <div class="mt-3">
            <img data-avatar="preview" class="img-fluid border border-secondary my-3"
              src="{{ $company->portfolio2_img ?? 'https://placehold.it/240x240' }}">
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
        <input type="text" class="form-control" id="formPortfolio3Title" name="portfolio3_title" value="{{ $company->portfolio3_title }}" placeholder="">
      </div>
      
      <div class="form-group position-relative">
        <label for="formPortfolio3Desc" class="form-label pt-0">内容</label>
        <textarea class="form-control" id="formPortfolio3Desc" name="portfolio3_desc" placeholder="" rows="4" style="min-height: 100px;">{{ $company->portfolio3_desc }}</textarea>
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolio3URL" class="form-label pt-0">URL</label>
        <input type="url" class="form-control" id="formPortfolio3URL" name="portfolio3_url" value="{{ $company->portfolio3_url }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formPortfolio3Img" class="form-label pt-0">画像</label>
        <div data-group="eyecatch">
          <input data-avatar="file" type="file" class="form-control-file" id="formPortfolio3Img" name="portfolio3_img"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group">
            <input data-avatar="name" type="text" class="form-control" value="{{ $company->portfolio3_img ?? null }}" disabled>
            <div class="input-group-append">
              <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
            </div>
          </div>

          <div class="mt-3">
            <img data-avatar="preview" class="img-fluid border border-secondary my-3"
              src="{{ $company->portfolio3_img ?? 'https://placehold.it/240x240' }}">
          </div>

        </div>
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <div class="col-6 py-4 mx-auto">
      <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
    </div>
  </div>
</form>