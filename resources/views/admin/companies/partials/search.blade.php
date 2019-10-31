<form class="py-2 mb-4" method="GET" action="">
  <h2 class="py-4 text-center alt-font">Search Companies</h2>
  <div class="form-group pb-3 row">
    <label for="formName" class="col-2 col-form-label">企業名</label>
    <div class="col-10">
      <input type="text" class="form-control" id="formName" name="search" placeholder="Please enter company name" value="{{ request()->get('search') }}">
    </div>
  </div>
  <div class="pb-3 row">
    <div class="col-6">
      <div class="form-group">
        <label for="formIndustry">業種</label>
        <select class="form-control" id="formIndustry" name="industry_id">
        @foreach($industries as $index => $name)
          <option value="{{ $index }}" {{ request()->get('industry_id') == $index ? 'selected' : '' }}>{{ ucwords($name) }}</option>
        @endforeach
        </select>
      </div>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="formArea">地域</label>
        <select class="form-control" id="formArea" name="prefecture">
          <option value="" selected hidden disabled>Choose area</option>
          @foreach($prefectures as $index => $name)
            <option value="{{ $index }}" {{ request()->get('prefecture') == $index ? 'selected' : '' }}>{{ ucwords($name) }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row pt-4 justify-content-center">
    <div class="col-3">
      <button type="submit" class="alt-font btn btn-primary btn-submit w-100">検索</button>
    </div>
    <div class="col-3">
      <button type="reset" class="alt-font btn btn-secondary w-75">リセット</button>
    </div>
  </div>
</form>
