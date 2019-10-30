<form class="py-2 mb-4" method="GET" action="">
  <h2 class="py-4 text-center alt-font">Search Employee</h2>
  <div class="form-group pb-3 row">
    <label for="formName" class="col-2 col-form-label">スタッフ</label>
    <div class="col-10">
      <input type="text" class="form-control" id="formName" name="search" placeholder="Please enter name" value="{{ request()->get('search') }}">
    </div>
  </div>
  <div class="pb-3 row">
    <div class="col-4">
      <div class="form-group">
        <label for="formStaus">ステータス</label>
        <select class="form-control" id="formStaus" name="status">
          <option value="" selected hidden disabled>Choose status</option>
          @foreach($employment_status as $index => $name)
            <option value="{{ $index }}" {{ request()->get('status') == $index ? 'selected' : '' }}>{{ ucwords($name) }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-4">
      <div class="form-group">
        <label for="formPosition">ポジション</label>
        <select class="form-control" id="formPosition" name="position_id">
          <option value="" selected hidden disabled>Choose position</option>
          @foreach($positions as $index => $name)
            <option value="{{ $index }}" {{ request()->get('position_id') == $index ? 'selected' : '' }}>{{ ucwords($name) }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-4">
      <div class="form-group">
        <label for="formCountry">国籍</label>
        <select class="form-control" id="formCountry" name="country">
          <option value="" selected hidden disabled>Choose country</option>
          @foreach($countries as $index => $name)
            <option value="{{ $index }}" {{ request()->get('country') == $index ? 'selected' : '' }}>{{ ucwords($name) }}</option>
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
