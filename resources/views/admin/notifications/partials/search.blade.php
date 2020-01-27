
  <form class="py-2 mb-4">
    <h2 class="py-4 text-center alt-font">Search Notification</h2>
    <div class="form-group pb-3 row">
      <label for="formSearch" class="col-2 col-form-label font-weight-bold text-muted">お知らせ</label>
      <div class="col-10">
      <input type="text" class="form-control" id="formName" name="search" placeholder="Please enter a name" value="{{ request()->get('search') }}">
      </div>
    </div>
    <div class="pb-3 row">
      <div class="col-3">
        <div class="form-group">
          <label for="formGenre" class="font-weight-bold text-muted">ジャンル</label>
          <select class="form-control" id="formGenre" name="genre_id">
            <option value="" selected hidden disabled>Choose category</option>
            @foreach($genres as $index => $name)
              <option value="{{ $index }}" {{ request()->get('genre_id') == $index ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-4">
        <div class="form-group">
          <label for="formPeriod" class="font-weight-bold text-muted">期</label>
          <div class="input-group input-daterange js-monthpicker">
            <input type="text" class="form-control text-left" name="from" value="{{ request()->get('from') }}"
              data-name="students_range_from" placeholder="">
            <div class="input-group-text">
              <i class="fas fa-fw fa-arrows-alt-h"></i>
            </div>
            <input type="text" class="form-control text-left" name="to" value="{{ request()->get('to') }}"
              data-name="students_range_to" placeholder="">
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="form-group">
          <label for="formTarget" class="font-weight-bold text-muted">ステータス</label>
          <select class="form-control" id="formTarget" name="target_id">
            <option value="" selected hidden disabled>Choose target</option>
            @foreach($targets as $index => $name)
              <option value="{{ $index }}" {{ request()->get('target_id') == $index ? 'selected' : '' }}>{{ $name }}</option>
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
      <a href="{{ route('admin.notifications.index') }}" class="alt-font btn btn-secondary w-75">リセット</a>
      </div>
    </div>
  </form>
