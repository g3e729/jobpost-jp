<form id="editForm" class="needs-validation py-2 mb-4" method="POST" action="" novalidate>
  @csrf
  {{ method_field('PATCH') }}

  <div class="form-group pb-3 row">
    <label for="formIntro" class="col-3 col-form-label font-weight-bold">自己紹介</label>
    <div class="col-9">
      <input type="text" class="form-control" id="formIntro" name="intro" value="{{ $student->intro }}" placeholder="">
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formAim" class="col-3 col-form-label font-weight-bold">やってみたいこと</label>
    <div class="col-9">
      <textarea class="form-control" id="formAim" name="aim" value="{{ $student->aim }}" placeholder="" rows="4" style="min-height: 100px;"></textarea>
    </div>
  </div>


  <div id="js-group-copy" data-iterate="5">
    <div id="js-group-input0" class="pb-3 row">
      <div class="col-3 font-weight-bold">職歴</div>
      <div class="col-9">
        <div class="form-group position-relative">
          <label for="formCompanyName" class="form-label pt-0">企業名</label>
          <input type="text" class="form-control" name="history[0][company_name]" data-name="company_name" value="{{ $student->company_name }}" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formCompanyRole" class="form-label pt-0">役</label>
          <input type="text" class="form-control" name="history[0][company_role]" data-name="company_role" value="{{ $student->company_role }}" placeholder="">
        </div>

        <div class="form-group position-relative">
          <label for="formJobDescription" class="form-label pt-0">内容</label>
          <textarea class="form-control" name="history[0][job_escription]" data-name="job_escription" value="{{ $student->job_escription }}" placeholder="" rows="4" style="min-height: 100px;"></textarea>
        </div>

        <div class="form-group position-relative">
          <label for="formStaffRange" class="form-label pt-0">期間</label>
          <div class="input-group input-daterange js-datepicker">
            <input type="text" class="form-control text-left" name="history[0][staff_range_from]"
              data-name="staff_range_from" placeholder="">
            <div class="input-group-text">
              <i class="fas fa-fw fa-arrows-alt-h"></i>
            </div>
            <input type="text" class="form-control text-left" name="history[0][staff_range_to]"
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
    <div class="col-9">
      <div class="form-group position-relative">
        <label for="formSchoolName" class="form-label pt-0">学校名</label>
        <input type="text" class="form-control" id="formSchoolName" name="school_name" value="{{ $student->school_name }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formmajor" class="form-label pt-0">学部、学科、専攻</label>
        <input type="text" class="form-control" id="formmajor" name="major" value="{{ $student->major }}" placeholder="">
      </div>

      <div class="form-group position-relative">
        <label for="formSchoolExperience" class="form-label pt-0">学んだこと</label>
        <textarea class="form-control" id="formSchoolExperience" name="school_experience" value="{{ $student->school_experience }}" placeholder="" rows="4" style="min-height: 100px;"></textarea>
      </div>

      <div class="form-group position-relative">
        <label for="formGraduationDate" class="form-label pt-0">卒業</label>
        <div class="input-group">
          <input type="text" class="form-control js-datepicker" id="formGraduationDate" name="graduation_date"
            value="{{ $student->graduation_date }}" placeholder="">
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

      <div class="mt-3">
        <img data-avatar="preview" class="avatar avatar-md border border-secondary my-3"
          src="{{ $student->avatar ?? 'https://placehold.it/80x80' }}">
      </div>
    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formCoverPhoto" class="col-3 col-form-label font-weight-bold">アイキャッチ</label>
    <div class="col-9" data-group="eyecatch">
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

      <div class="mt-3">
        <img data-avatar="preview" class="img-fluid border border-secondary my-3"
          src="{{ $student->cover_photo ?? 'https://placehold.it/240x240' }}">
      </div>

    </div>
  </div>

  <div class="form-group pb-3 row">
    <label for="formMovie" class="col-3 col-form-label font-weight-bold">Movie URL</label>
    <div class="col-9">
      <input type="url" class="form-control" id="formMovie" name="movie" value="{{ $student->movie }}" placeholder="">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-6 py-4 mx-auto">
      <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
    </div>
  </div>
</form>
