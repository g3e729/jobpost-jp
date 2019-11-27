<form class="py-2 mb-4" method="GET" action="">
  <h2 class="py-4 text-center alt-font">Search Files</h2>
  <div class="form-group pb-3 row">
    <label for="formName" class="col-2 col-form-label font-weight-bold text-muted">File</label>
    <div class="col-10">
      <input type="text" class="form-control" id="formName" name="search" placeholder="Please enter name" value="{{ request()->get('search') }}">
    </div>
  </div>
  <div class="pb-3 row">
    
  </div>
  <div class="form-group row pt-4 justify-content-center">
    <div class="col-3">
      <button type="submit" class="alt-font btn btn-primary btn-submit w-100">検索</button>
    </div>
    <div class="col-3">
      <a href="{{ route('employee.files.index') }}" class="alt-font btn btn-secondary w-75">リセット</a>
    </div>
  </div>
</form>
