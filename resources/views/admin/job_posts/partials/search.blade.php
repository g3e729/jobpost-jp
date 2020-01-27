
  <form class="py-2 mb-4">
    <h2 class="py-4 text-center alt-font">Search Jobs</h2>
    <div class="form-group pb-3 row">
      <label for="formName" class="col-2 col-form-label font-weight-bold text-muted">求人</label>
      <div class="col-10">
      <input type="text" class="form-control" id="formName" name="search" placeholder="Please enter title, position, language, framework, environment" value="{{ request()->get('search') }}">
      </div>
    </div>
    <div class="pb-3 row">

      <div class="col">
        <div class="form-group">
          <label for="formArea" class="font-weight-bold text-muted">エリア</label>
          <select class="form-control" id="formArea" name="position">
            <option value="" {{ empty(request()->get('position')) ? 'selected' : '' }}>All Positions</option>
            @foreach($positions as $name)
              <option value="{{ $name }}" {{ request()->get('position') == $name ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="formArea" class="font-weight-bold text-muted">エリア</label>
          <select class="form-control" id="formArea" name="programming_language">
            <option value="" {{ empty(request()->get('programming_language')) ? 'selected' : '' }}>All Programming languages</option>
            @foreach($programming_languages as $name)
              <option value="{{ $name }}" {{ request()->get('programming_language') == $name ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="formArea" class="font-weight-bold text-muted">エリア</label>
          <select class="form-control" id="formArea" name="framework">
            <option value="" {{ empty(request()->get('frameworks')) ? 'selected' : '' }}>All Frameworks</option>
            @foreach($frameworks as $name)
              <option value="{{ $name }}" {{ request()->get('framework') == $name ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="formArea" class="font-weight-bold text-muted">エリア</label>
          <select class="form-control" id="formArea" name="prefecture">
            <option value="" {{ empty(request()->get('prefecture')) ? 'selected' : '' }}>All Prefecture</option>
            @foreach($regions as $index => $name)
              <option value="{{ $index }}" {{ request()->get('prefecture') == $index ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col">
        <div class="form-group">
          <label for="formIncome" class="font-weight-bold text-muted">年収</label>
          <select class="form-control" id="formIncome" name="salary">
            <option value="" {{ empty(request()->get('salary')) ? 'selected' : '' }}>Choose income</option>
            @foreach($ranges as $value)
              <option value="{{ $value }}" {{ request()->get('salary') == $value ? 'selected' : '' }}>{{ $value }}</option>
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
        <a href="{{ route('admin.recruitments.index') }}" class="alt-font btn btn-secondary w-75">リセット</a>
      </div>
    </div>
  </form>
