
  <form class="py-2 mb-4">
    <h2 class="py-4 text-center alt-font">Search Notification</h2>
    <div class="form-group pb-3 row">
      <label for="formName" class="col-2 col-form-label">お知らせ</label>
      <div class="col-10">
        <input type="text" class="form-control" id="formName" name="formName" placeholder="Please enter company name">
      </div>
    </div>
    <div class="pb-3 row">
      <div class="col-3">
        <div class="form-group">
          <label for="formCategory">ジャンル</label>
          <select class="form-control" id="formCategory" name="formCategory">
            <option value="" selected hidden disabled>Choose category</option>
            <option value="category-a">Category A</option>
            <option value="category-b">Category B</option>
            <option value="category-c">Category C</option>
          </select>
        </div>
      </div>
      <div class="col-3">
        <div class="form-group">
          <label for="formFrom">通知日(from)</label>
          <select class="form-control" id="formFrom" name="formFrom">
            <option value="" selected hidden disabled>Choose from</option>
            <option value="from-a">From A</option>
            <option value="from-b">From B</option>
            <option value="from-c">From C</option>
          </select>
        </div>
      </div>
      <div class="col-3">
        <div class="form-group">
          <label for="formTo">to</label>
          <select class="form-control" id="formTo" name="formTo">
            <option value="" selected hidden disabled>Choose to</option>
            <option value="to-a">To A</option>
            <option value="to-b">To B</option>
            <option value="to-c">To C</option>
          </select>
        </div>
      </div>
      <div class="col-3">
        <div class="form-group">
          <label for="formStatus">ステータス</label>
          <select class="form-control" id="formStatus" name="formStatus">
            <option value="" selected hidden disabled>Choose status</option>
            <option value="status-a">Status A</option>
            <option value="status-b">Status B</option>
            <option value="status-c">Status C</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group row pt-4 justify-content-center">
      <div class="col-3">
        <button type="submit" class="btn btn-primary w-100">検索</button>
      </div>
      <div class="col-3">
        <button id="js-form-clear" class="btn btn-secondary w-75">リセット</button>
      </div>
    </div>
  </form>
