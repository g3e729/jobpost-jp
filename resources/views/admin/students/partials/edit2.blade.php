<form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="{{ route('admin.students.update', $student) }}" enctype="multipart/form-data" novalidate>
  @csrf
  {{ method_field('PATCH') }}

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

  @php
    $pholder = $student->work_history->first();
    $student->work_history->forget(0);

    // dd($student->work_history);
  @endphp

  <div id="js-group-copy" data-iterate="5">
    <div id="js-group-input0" class="pb-3 row">
      <div class="col-3 font-weight-bold">職歴</div>
      <div class="col-9">
        <div class="form-group position-relative">
          <label for="formCompanyName" class="form-label pt-0">企業名</label>
          <input type="text" class="form-control" name="work_history[0][company_name]" data-name="company_name" value="{{ $pholder->company_name ?? '' }}" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formCompanyRole" class="form-label pt-0">役</label>
          <input type="text" class="form-control" name="work_history[0][role]" data-name="company_role" value="{{ $pholder->role ?? '' }}" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formJobDescription" class="form-label pt-0">内容</label>
          <textarea class="form-control" name="work_history[0][content]" data-name="job_escription" placeholder="" rows="4" style="min-height: 100px;">{{ $pholder->content ?? '' }}</textarea>
        </div>

        <div class="form-group position-relative">
          <label for="formStaffRange" class="form-label pt-0">期間</label>
          <div class="input-group input-daterange js-datepicker">
            <input type="text" class="form-control text-left" name="work_history[0][started_at]" value="{{ $pholder->started_at ?? '' }}"
              data-name="staff_range_from" placeholder="">
            <div class="input-group-text">
              <i class="fas fa-fw fa-arrows-alt-h"></i>
            </div>
            <input type="text" class="form-control text-left" name="work_history[0][ended_at]" value="{{ $pholder->ended_at ?? '' }}"
              data-name="staff_range_to" placeholder="">
          </div>
        </div>

      </div>
    </div>

    <div class="form-group row">
      <div class="col-3 py-4 mx-auto">
        <button type="button" id="js-group-add" class="alt-font btn btn-primary btn-submit w-100">Copy</button>
      </div>
    </div>
  </div>

  <div class="pb-3 row">
    <div class="col-3 font-weight-bold">学歴</div>
    @php
      $education = $student->education_history->first();
    @endphp
    <div class="col-9">

      <div class="form-group position-relative">
        <label for="formSchoolName" class="form-label pt-0">学校名</label>
        <input type="text" class="form-control" id="formSchoolName" name="education_history[0][school_name]" value="{{ $education->school_name ?? '' }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formmajor" class="form-label pt-0">学部</label>
        <input type="text" class="form-control" id="formfaculty" name="education_history[0][faculty]" value="{{ $education->faculty ?? '' }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formmajor" class="form-label pt-0">学科</label>
        <input type="text" class="form-control" id="formmajor" name="education_history[0][major]" value="{{ $education->major ?? '' }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formmajor" class="form-label pt-0">専攻</label>
        <input type="text" class="form-control" id="formdepartment" name="education_history[0][department]" value="{{ $education->department ?? '' }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formSchoolExperience" class="form-label pt-0">学んだこと</label>
        <textarea class="form-control" id="formSchoolExperience" name="education_history[0][content]" placeholder="" rows="4" style="min-height: 100px;">{{ $education->content ?? '' }}</textarea>
      </div>

      <div class="form-group position-relative">
        <label for="formGraduationDate" class="form-label pt-0">卒業</label>
        <div class="input-group">
          <input type="text" class="form-control js-datepicker" id="formGraduationDate" name="education_history[0][graduated_at]"
            value="{{ $education->graduated_at ?? '' }}" placeholder="">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-fw fa-calendar-alt"></i>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formAvatar" class="col-3 col-form-label font-weight-bold">アバター</label>
    <div class="col-9" data-group="avatar">
      <div class="pb-3 d-inline-flex flex-column align-items-center">
        <img data-avatar="preview" class="avatar avatar-md border border-secondary mb-3" src="{{ $student->avatar ?? 'https://placehold.it/80x80' }}">
      </div>

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
        <img data-avatar="preview" class="img-fluid border border-secondary mb-3"
          src="{{ $student->cover_photo ?? 'https://placehold.it/240x240' }}">
      </div>

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
