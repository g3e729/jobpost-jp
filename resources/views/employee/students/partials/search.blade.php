<form class="py-2 mb-4" method="GET" action="">
  <h2 class="py-4 text-center alt-font">Search Students</h2>
  <div class="form-group pb-3 row">
    <label for="formName" class="col-2 col-form-label font-weight-bold text-muted">ユーザー名</label>
    <div class="col-10">
      <input type="text" class="form-control" id="formName" name="search" placeholder="Please enter a name" value="{{ request()->get('search') }}">
    </div>
  </div>
  <div class="pb-3 row">
    <div class="col-3">
      <div class="form-group">
        <label for="formCourse" class="font-weight-bold text-muted">コース</label>
        <select class="form-control" id="formCourse" name="course_id">
          <option value="" {{ empty(request()->get('course_id')) ? 'selected' : '' }}>All Course</option>
          @foreach($courses as $value => $course)
            <option value="{{ $value }}" {{ request()->get('course_id') == $value ? 'selected' : '' }}>{{ ucwords($course) }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-3">
      <div class="form-group">
        <label for="formPeriod" class="font-weight-bold text-muted">期</label>
        <select class="form-control" id="formPeriod" name="period">
          <option value="" selected>All Period</option>
          <option value="31">第31期( 10月1日~ / Phase 31 (October 1st ~</option>
          <option value="32">第32期( 11月1日~ / Phase 32 (October 1st ~</option>
          <option value="33">第33期( 12月1日~ / Phase33 (October 1st ~</option>
          <option value="34">第34期( 1月1日~ / Phase34 (October 1st ~</option>
          <option value="35">第35期( 2月1日~ / Phase35 (October 1st ~</option>
        </select>
      </div>
    </div>
    <div class="col-3">
      <div class="form-group">
        <label for="formStatus" class="font-weight-bold text-muted">ステータス</label>
        <select class="form-control" id="formStatus" name="status">
          <option value="" {{ empty(request()->get('status')) ? 'selected' : '' }}>All Status</option>
          @foreach($statuses as $value => $status)
            <option value="{{ $value }}" {{ request()->get('status') == $value ? 'selected' : '' }}>{{ $status }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-3">
      <div class="form-group">
        <label for="formEnglish" class="font-weight-bold text-muted">English level</label>
        <select class="form-control" id="formEnglish" name="english_level_id">
          <option value="" {{ empty(request()->get('english_level_id')) ? 'selected' : '' }}>All English Level</option>
          @foreach($english_levels as $value => $english_level)
            <option value="{{ $value }}" {{ request()->get('english_level_id') == $value ? 'selected' : '' }}>{{ ucwords($english_level) }}</option>
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
      <input type="reset" class="alt-font btn btn-secondary w-75" value="リセット">
    </div>
  </div>
</form>
