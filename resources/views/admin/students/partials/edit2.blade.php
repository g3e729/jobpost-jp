<form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="{{ route('admin.students.update', $student) }}" enctype="multipart/form-data" novalidate>
  @csrf
  {{ method_field('PATCH') }}

  <input type="hidden" name="step" value="2">

  <div class="form-group pb-3 row">
    <label for="formIntro" class="col-3 col-form-label font-weight-bold">自己紹介</label>
    <div class="col-9">
      <input type="text" class="form-control" id="formIntro" name="intro_text" value="{{ $student->intro_text }}" placeholder="">
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formAim" class="col-3 col-form-label font-weight-bold">やってみたいこと</label>
    <div class="col-9">
      <textarea class="form-control" id="formAim" name="what_text" placeholder="" rows="4" style="min-height: 100px;">{{ $student->what_text }}</textarea>
    </div>
  </div>

  <div id="js-group-copy" data-iterate="5">
    @foreach ($student->work_history as $k => $work_history)
      <div id="js-group-input{{ $k }}" class="pb-3 row">
        <div class="col-3 font-weight-bold">職歴</div>
        <div class="col-9">
          <div class="form-group position-relative">
            <label for="formCompanyName" class="form-label pt-0">企業名</label>
            <input type="text" class="form-control" name="work_history[{{ $k }}][company_name]" data-name="company_name" value="{{ $work_history->company_name ?? '' }}" placeholder="">
          </div>

          <div class="form-group position-relative">
            <label for="formCompanyRole" class="form-label pt-0">役</label>
            <input type="text" class="form-control" name="work_history[{{ $k }}][role]" data-name="company_role" value="{{ $work_history->role ?? '' }}" placeholder="">
          </div>

          <div class="form-group position-relative">
            <label for="formJobDescription" class="form-label pt-0">内容</label>
            <textarea class="form-control" name="work_history[{{ $k }}][content]" data-name="job_escription" placeholder="" rows="4" style="min-height: 100px;">{{ $work_history->content ?? '' }}</textarea>
          </div>

          <div class="form-group position-relative">
            <label for="formStaffRange" class="form-label pt-0">期間</label>
            <div class="input-group input-daterange js-monthpicker">
              <input type="text" class="form-control text-left" name="work_history[{{ $k }}][started_at]" value="{{ isset($work_history->started_at) ? $work_history->started_at->format('Y-m') : '' }}"
                data-name="staff_range_from" placeholder="">
              <div class="input-group-text">
                <i class="fas fa-fw fa-arrows-alt-h"></i>
              </div>
              <input type="text" class="form-control text-left" name="work_history[{{ $k }}][ended_at]" value="{{ isset($work_history->ended_at) ? $work_history->ended_at->format('Y-m') : '' }}"
                data-name="staff_range_to" placeholder="">
            </div>
          </div>

        </div>
      </div>

      <div class="form-group row">
        <div class="col-3 py-4 mx-auto">
          @if ($loop->last)
            <button type="button" id="js-group-add" class="alt-font btn btn-primary btn-submit w-100">Copy</button>
          @endif
        </div>
      </div>

      @if ($loop->last)
        <hr>
      @endif
    @endforeach
  </div>

  @foreach ($student->education_history as $k => $education_history)

  @if ($k > 0)
    @php continue; @endphp
  @endif
    <div class="pb-3 row">
      <div class="col-3 font-weight-bold">学歴</div>
      <div class="col-9">
        <div class="form-group position-relative">
          <label for="formSchoolName" class="form-label pt-0">学校名</label>
          <input type="text" class="form-control" id="formSchoolName" name="education_history[{{ $k }}][school_name]" value="{{ $education_history->school_name ?? '' }}" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formmajor" class="form-label pt-0">学部</label>
          <input type="text" class="form-control" id="formfaculty" name="education_history[{{ $k }}][faculty]" value="{{ $education_history->faculty ?? '' }}" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formmajor" class="form-label pt-0">学科</label>
          <input type="text" class="form-control" id="formmajor" name="education_history[{{ $k }}][major]" value="{{ $education_history->major ?? '' }}" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formmajor" class="form-label pt-0">専攻</label>
          <input type="text" class="form-control" id="formdepartment" name="education_history[{{ $k }}][department]" value="{{ $education_history->department ?? '' }}" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formSchoolExperience" class="form-label pt-0">学んだこと</label>
          <textarea class="form-control" id="formSchoolExperience" name="education_history[{{ $k }}][content]" placeholder="" rows="4" style="min-height: 100px;">{{ $education_history->content ?? '' }}</textarea>
        </div>

        <div class="form-group position-relative">
          <label for="formGraduationDate" class="form-label pt-0">卒業</label>
          <div class="input-group">
            <input type="text" class="form-control js-datepicker" id="formGraduationDate" name="education_history[{{ $k }}][graduated_at]"
              value="{{ $education_history->graduated_at ?? '' }}" placeholder="">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-fw fa-calendar-alt"></i>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    @if ($loop->last)
      <hr>
    @endif
  @endforeach

  <div class="form-group pb-3 row">
    <label for="formAvatar" class="col-3 col-form-label font-weight-bold">アバター</label>
    <div class="col-9" data-group="avatar">
      <div class="pb-3 d-inline-flex flex-column align-items-center">
        <img data-avatar="preview" class="avatar avatar-md border border-secondary mb-3" src="{{ $student->avatar ?? 'https://placehold.it/80x80' }}">
        <button data-avatar="delete" type="button" class="alt-font btn btn-danger w-100 mb-2" {{ isset($student->avatar) && $student->avatar ? null : 'disabled'}}>Delete</button>
      </div>

      <input data-avatar="hidden" type="hidden" name="avatar_delete" value="0">
      <input data-avatar="file" type="file" class="form-control-file" id="formAvatar" name="avatar"
        accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
      <div class="input-group">
        <input data-avatar="name" type="text" class="form-control" value="{{ $student->avatar ?? null }}"
          disabled required>
        <div class="input-group-append">
          <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
        </div>
        <div class="invalid-tooltip">
          Please choose your avatar.
        </div>
      </div>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formCoverPhoto" class="col-3 col-form-label font-weight-bold">アイキャッチ</label>
    <div class="col-9" data-group="eyecatch">
      <div class="pb-3 d-inline-flex flex-column align-items-center">
        <img data-avatar="preview" class="img-fluid border border-secondary mb-3" src="{{ $student->cover_photo ?? 'https://placehold.it/240x240' }}">
        <button data-avatar="delete" type="button" class="alt-font btn btn-danger w-100 mb-2" {{ isset($student->cover_photo) && $student->cover_photo ? null : 'disabled'}}>Delete</button>
      </div>

      <input data-avatar="hidden" type="hidden" name="cover_photo_delete" value="0">
      <input data-avatar="file" type="file" class="form-control-file" id="formCoverPhoto" name="cover_photo"
        accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
      <div class="input-group">
        <input data-avatar="name" type="text" class="form-control" value="{{ $student->cover_photo ?? null }}"
          disabled required>
        <div class="input-group-append">
          <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
        </div>
        <div class="invalid-tooltip">
          Please enter your profile eyecatch.
        </div>
      </div>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formMovie" class="col-3 col-form-label font-weight-bold">Movie URL</label>
    <div class="col-9">
      <input type="url" class="form-control" id="formMovie" name="movie" value="{{ $student->movie_url }}" placeholder="">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-6 py-4 mx-auto">
      <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
    </div>
  </div>
</form>
