
  <form class="py-2 mb-4">
    <h2 class="py-4 text-center alt-font">Search Jobs</h2>
    <div class="form-group pb-3 row">
      <label for="formName" class="col-2 col-form-label font-weight-bold text-muted">求人</label>
      <div class="col-10">
        <input type="text" class="form-control" id="formName" name="formName" placeholder="Please enter job title">
      </div>
    </div>
    <div class="pb-3 row">
      <div class="col">
        <div class="form-group">
          <label for="formPosition" class="font-weight-bold text-muted">ポジション</label>
          <select class="form-control" id="formPosition" name="formPosition">
            <option value="" selected hidden disabled>Choose position</option>
            <option value="position-a">Position A</option>
            <option value="position-b">Position B</option>
            <option value="position-c">Position C</option>
          </select>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="formLanguage" class="font-weight-bold text-muted">言語</label>
          <select class="form-control" id="formLanguage" name="formLanguage">
            <option value="" selected hidden disabled>Choose language</option>
            <option value="language-a">Language A</option>
            <option value="language-b">Language B</option>
            <option value="language-c">Language C</option>
          </select>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="formFramework" class="font-weight-bold text-muted">フレームワーク</label>
          <select class="form-control" id="formFramework" name="formFramework">
            <option value="" selected hidden disabled>Choose framework</option>
            <option value="framework-a">Framework A</option>
            <option value="framework-b">Framework B</option>
            <option value="framework-c">Framework C</option>
          </select>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="formArea" class="font-weight-bold text-muted">エリア</label>
          <select class="form-control" id="formArea" name="formArea">
            <option value="" selected hidden disabled>Choose area</option>
            <option value="area-a">Area A</option>
            <option value="area-b">Area B</option>
            <option value="area-c">Area C</option>
          </select>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="formIncome" class="font-weight-bold text-muted">年収</label>
          <select class="form-control" id="formIncome" name="formIncome">
            <option value="" selected hidden disabled>Choose income</option>
            <option value="income-a">Income A</option>
            <option value="income-b">Income B</option>
            <option value="income-c">Income C</option>
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
