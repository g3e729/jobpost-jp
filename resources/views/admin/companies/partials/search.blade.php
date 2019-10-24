
  <form class="py-2 mb-4">
    <h2 class="py-4 text-center alt-font">Search Companies</h2>
    <div class="form-group pb-3 row">
      <label for="formName" class="col-2 col-form-label">企業名</label>
      <div class="col-10">
        <input type="text" class="form-control" id="formName" name="formName" placeholder="Please enter company name">
      </div>
    </div>
    <div class="pb-3 row">
      <div class="col-4">
        <div class="form-group">
          <label for="formPlan">プラン</label>
          <select class="form-control" id="formPlan" name="formPlan">
            <option value="" selected hidden disabled>Choose plan</option>
            <option value="plan-a">Plan A</option>
            <option value="plan-b">Plan B</option>
            <option value="plan-c">Plan C</option>
          </select>
        </div>
      </div>
      <div class="col-4">
        <div class="form-group">
          <label for="formIndustry">業種</label>
          <select class="form-control" id="formIndustry" name="formIndustry">
            <option value="" selected hidden disabled>Choose industry</option>
            <option value="industry-a">Industry A</option>
            <option value="industry-b">Industry B</option>
            <option value="industry-c">Industry C</option>
          </select>
        </div>
      </div>
      <div class="col-4">
        <div class="form-group">
          <label for="formArea">地域</label>
          <select class="form-control" id="formArea" name="formArea">
            <option value="" selected hidden disabled>Choose area</option>
            <option value="area-a">Area A</option>
            <option value="area-b">Area B</option>
            <option value="area-c">Area C</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group row pt-4 justify-content-center">
      <div class="col-3">
        <button type="submit" class="alt-font btn btn-primary w-100">検索</button>
      </div>
      <div class="col-3">
        <button type="reset" class="alt-font btn btn-secondary w-75">リセット</button>
      </div>
    </div>
  </form>
