@extends('admin.layouts.default')

@section('pageTitle', '募集フォームを')

@section('content')
	<div class="l-container l-container-narrow">

    @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
      </div>
    @endif

    <form class="needs-validation py-2 mb-4" method="POST" action="{{ route('admin.recruitments.update', $job_post) }}" enctype="multipart/form-data" novalidate>
      @csrf
      {{ method_field('PATCH') }}

      <div class="form-group pb-3 row">
        <label for="formJobTitle" class="col-3 col-form-label font-weight-bold">タイトル</label>
        <div class="col-9">
          <input type="text" class="form-control" id="formJobTitle" name="title" value="{{ old('title', $job_post->title) }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter Job post title.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formCoverPhoto" class="col-3 col-form-label font-weight-bold">アイキャッチ</label>
        <div class="col-9" data-group="eyecatch">
          <div class="pb-3 d-inline-flex flex-column align-items-center">
            <img data-avatar="preview" class="img-fluid border border-secondary mb-3" src="{{ $job_post->cover_photo ?? 'https://placehold.it/240x240' }}">
            <button data-avatar="delete" type="button" class="alt-font btn btn-danger w-100 mb-2" {{ old('cover_photo', $job_post->cover_photo) ? null : 'disabled'}}>Delete</button>
          </div>

          <input data-avatar="hidden" type="hidden" name="cover_photo_delete" value="0">
          <input data-avatar="file" type="file" class="form-control-file" id="formCoverPhoto" name="cover_photo"
            accept="image/png, image/jpeg" style="visibility: hidden; position: absolute;">
          <div class="input-group">
            <input data-avatar="name" type="text" class="form-control" value="{{ old('cover_photo', $job_post->cover_photo) }}"
              disabled required>
            <div class="input-group-append">
              <button data-avatar="browse" type="button" class="alt-font btn btn-primary">Browse</button>
            </div>
            <div class="invalid-tooltip">
              Please enter your Job posting eyecatch.
            </div>
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formPosition" class="col-3 col-form-label font-weight-bold">ポジション</label>
        <div class="col-9">
          <input type="text" class="form-control" id="formPosition" name="position" value="{{ old('position', $job_post->position) }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please choose your position.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formDetails" class="col-3 col-form-label font-weight-bold">こんなことやります。</label>
        <div class="col-9">
          <textarea class="form-control" id="formDetails" name="description" placeholder="" rows="4"
            style="min-height: 100px;" required>{{ old('description', $job_post->description) }}</textarea>
          <div class="invalid-tooltip">
            Please enter Job details.
          </div>
        </div>
      </div>

      <div class="pb-3 row">
        <div class="col-3 font-weight-bold">開発環境</div>
        <div class="col-9">

          <div class="form-group position-relative">
            <label for="formProgramming" class="form-label pt-0">プログラミング言語</label>
            <input type="text" class="form-control" id="formProgramming" name="programming_language" value="{{ old('programming_language', $job_post->programming_language) }}" placeholder="" required>
          </div>

          <div class="form-group position-relative">
            <label for="formFramework" class="form-label pt-0">フレームワーク</label>
            <input type="text" class="form-control" id="formFramework" name="framework" value="{{ old('programming_language', $job_post->framework) }}" placeholder="" required>
          </div>

          <div class="form-group position-relative">
            <label for="formEnvironment" class="form-label pt-0">環境</label>
            <input type="text" class="form-control" id="formEnvironment" name="environment" value="{{ old('environment', $job_post->environment) }}" placeholder="" required>
          </div>

          <div class="form-group position-relative">
            <label for="formDatabase" class="form-label pt-0">データベース</label>
            <input type="text" class="form-control" id="formDatabase" name="database" value="{{ old('database', $job_post->database) }}" placeholder="" required>
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formRequirements" class="col-3 col-form-label font-weight-bold">応募要件</label>
        <div class="col-9">
          <textarea class="form-control" id="formRequirements" name="requirements" placeholder="" rows="4"
            style="min-height: 100px;" required>{{ old('requirements', $job_post->requirements) }}</textarea>
          <div class="invalid-tooltip">
            Please enter Job requirements.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formEmploymentStatus" class="col-3 col-form-label font-weight-bold">雇用状況</label>
        <div class="col-9">
          <select class="form-control" id="formEmploymentStatus" name="employment_type" data-action="change"
            data-condition="" data-text="Please enter employment status.">
            <option value="" selected hidden disabled>Choose employment status</option>
            @foreach($employment_types as $index => $name)
              <option value="{{ $index }}" {{ ($index == old('employment_type', $job_post->employment_type)) ? 'selected' : null }}>{{ ucwords($name) }}</option>
            @endforeach
          </select>
          <div class="invalid-tooltip">
            Please enter employment status.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formNumberOfApplicants" class="col-3 col-form-label font-weight-bold">募集人数</label>
        <div class="col-9">
          <input type="number" class="form-control" id="formNumberOfApplicants" name="number_of_applicants" min="1"
            value="{{ old('number_of_applicants', $job_post->number_of_applicants) }}" placeholder="" required>
          <div class="invalid-tooltip">
            Please enter number of applicants.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formEmploymentIncome" class="col-3 col-form-label font-weight-bold">想定年収</label>
        <div class="col-9">
          <select class="form-control" id="formEmploymentStatus" name="salary" data-action="change"
            data-condition="" data-text="Please enter employment status.">
            <option value="" selected hidden disabled>Choose salary</option>
            @foreach($range as $value)
              <option value="{{ $value }}" {{ ($value == old('salary', $job_post->salary)) ? 'selected' : null }}>{{ $value }}</option>
            @endforeach
          </select>
          <div class="invalid-tooltip">
            Please enter income.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formWorkingTime" class="col-3 col-form-label font-weight-bold">勤務時間</label>
        <div class="col-9">
          <textarea class="form-control" id="formWorkingTime" name="work_time" placeholder="" rows="2"
            style="min-height: 60px;" required>{{ old('work_time', $job_post->work_time) }}</textarea>
          <div class="invalid-tooltip">
            Please enter working schedule.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formHolidays" class="col-3 col-form-label font-weight-bold">休日、休暇</label>
        <div class="col-9">
          <textarea class="form-control" id="formHolidays" name="holidays" placeholder="" rows="2"
            style="min-height: 60px;" required>{{ old('holidays', $job_post->holidays) }}</textarea>
          <div class="invalid-tooltip">
            Please enter holidays.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formAllowance" class="col-3 col-form-label font-weight-bold">諸手当</label>
        <div class="col-9">
          <textarea class="form-control" id="formAllowance" name="allowance" placeholder="" rows="2"
            style="min-height: 60px;" required>{{ old('allowance', $job_post->allowance) }}</textarea>
          <div class="invalid-tooltip">
            Please enter allowances.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formIncentive" class="col-3 col-form-label font-weight-bold">インセンティブ</label>
        <div class="col-9">
          <textarea class="form-control" id="formIncentive" name="incentive" placeholder="" rows="2"
            style="min-height: 60px;" required>{{ old('incentive', $job_post->incentive) }}</textarea>
          <div class="invalid-tooltip">
            Please enter incentives.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formSalaryIncrease" class="col-3 col-form-label font-weight-bold">昇給</label>
        <div class="col-9">
          <textarea class="form-control" id="formSalaryIncrease" name="salary_increase" placeholder="" rows="2"
            style="min-height: 60px;" required>{{ old('salary_increase', $job_post->salary_increase) }}</textarea>
          <div class="invalid-tooltip">
            Please enter salary increase.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formInsurance" class="col-3 col-form-label font-weight-bold">保険</label>
        <div class="col-9">
          <textarea class="form-control" id="formInsurance" name="insurance" placeholder="" rows="2"
            style="min-height: 60px;" required>{{ old('insurance', $job_post->insurance) }}</textarea>
          <div class="invalid-tooltip">
            Please enter insurance.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formContractPeriod" class="col-3 col-form-label font-weight-bold">試用期間</label>
        <div class="col-9">
          <textarea class="form-control" id="formContractPeriod" name="contract_period" placeholder="" rows="2"
            style="min-height: 60px;" required>{{ old('contract_period', $job_post->contract_period) }}</textarea>
          <div class="invalid-tooltip">
            Please enter contract period.
          </div>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formScreeningFlow" class="col-3 col-form-label font-weight-bold">専攻フロー</label>
        <div class="col-9">
          <textarea class="form-control" id="formScreeningFlow" name="screening_flow" placeholder="" rows="2"
            style="min-height: 60px;" required>{{ old('screening_flow', $job_post->screening_flow) }}</textarea>
          <div class="invalid-tooltip">
            Please enter screening flow.
          </div>
        </div>
      </div>

      <div class="pb-3 row">
        <div class="col-3 font-weight-bold">住所</div>
        <div class="col-9">
          <div class="form-group position-relative">
            <label for="formPrefecture" class="form-label pt-0">Prefecture</label>
            <select class="form-control" id="formPrefecture" name="prefecture" data-action="change"
              data-condition="" data-text="Please choose your prefecture.">
              <option value="" selected hidden disabled>Choose prefecture</option>
              @foreach($prefectures as $index => $name)
                <option value="{{ $index }}" {{ ($index == old('prefecture', $job_post->prefecture)) ? 'selected' : null }}>{{ $name }}</option>
              @endforeach
            </select>
            <div class="invalid-tooltip">
              Please choose your prefecture.
            </div>
          </div>

          <div class="form-group position-relative">
            <label for="formAddress1" class="form-label pt-0">番地</label>
            <input type="text" class="form-control" id="formAddress1" name="address1" value="{{ old('address1', $job_post->address1) }}" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your house number.
            </div>
          </div>

          <div class="form-group position-relative">
            <label for="formAddress2" class="form-label pt-0">ビル名 / 部屋番号</label>
            <input type="text" class="form-control" id="formAddress2" name="address2" value="{{ old('address2', $job_post->address2) }}" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your building name / room number.
            </div>
          </div>

          <div class="form-group position-relative">
            <label for="formAddress3" class="form-label pt-0">郵便番号</label>
            <input type="number" class="form-control" id="formAddress3" name="address3" value="{{ old('address3', $job_post->address3) }}" placeholder="" required>
            <div class="invalid-tooltip">
              Please enter your postal code.
            </div>
          </div>

        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formStation" class="col-3 col-form-label font-weight-bold">最寄駅</label>
        <div class="col-9">
          <textarea class="form-control" id="formStation" name="station" placeholder="" rows="2"
            style="min-height: 60px;">{{ old('station', $job_post->station) }}</textarea>
        </div>
      </div>

      <div class="form-group pb-3 row">
        <label for="formStatus" class="col-3 col-form-label font-weight-bold">Status</label>
        <div class="col-9">
            <select class="form-control" id="formStatus" name="Status" data-action="change"
              data-condition="" data-text="Please choose status.">
              <option value="" selected hidden disabled>Choose status</option>
              <option value="1" {{ (0 == old('status', $job_post->status)) ? 'selected' : null }}>Hiring</option>
              <option value="0" {{ (1 == old('status', $job_post->status)) ? 'selected' : null }}>Stop hiring</option>
            </select>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-6 py-4 mx-auto">
          <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
        </div>
      </div>
    </form>
	</div>
@endsection

@section('js')
  <script src="{{ asset('js/register.js') }}"></script>
  <script src="{{ asset('js/editform.js') }}"></script>
@endsection
