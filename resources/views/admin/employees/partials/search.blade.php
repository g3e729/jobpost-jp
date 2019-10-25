
  <form class="py-2 mb-4">
    <h2 class="py-4 text-center alt-font">Search Staff</h2>
    <div class="form-group pb-3 row">
      <label for="formName" class="col-2 col-form-label">スタッフ</label>
      <div class="col-10">
        <input type="text" class="form-control" id="formName" name="formName" placeholder="Please enter staff name">
      </div>
    </div>
    <div class="pb-3 row">
      <div class="col-4">
        <div class="form-group">
          <label for="formStaus">ステータス</label>
          <select class="form-control" id="formStaus" name="formStaus">
            <option value="" selected hidden disabled>Choose status</option>
            <option value="status-a">Status A</option>
            <option value="status-b">Status B</option>
            <option value="status-c">Status C</option>
          </select>
        </div>
      </div>
      <div class="col-4">
        <div class="form-group">
          <label for="formPosition">ポジション</label>
          <select class="form-control" id="formPosition" name="formPosition">
            <option value="" selected hidden disabled>Choose position</option>
            <option value="position-a">Position A</option>
            <option value="position-b">Position B</option>
            <option value="position-c">Position C</option>
          </select>
        </div>
      </div>
      <div class="col-4">
        <div class="form-group">
          <label for="formCountry">国籍</label>
          <select class="form-control" id="formCountry" name="formCountry">
            <option value="" selected hidden disabled>Choose country</option>
            <option value="country-a">Country A</option>
            <option value="country-b">Country B</option>
            <option value="country-c">Country C</option>
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
