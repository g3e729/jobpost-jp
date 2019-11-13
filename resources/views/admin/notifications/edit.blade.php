@extends('admin.layouts.default')

@section('pageTitle', 'お知らせの新規作成')

@section('content')
	<div class="l-container l-container-narrow">
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session()->get('success') }}
    </div>
    @endif
	  <form class="needs-validation py-2 mb-4" method="POST" action="" novalidate>
      @csrf
	    <h2 class="py-4 text-center alt-font">お知らせの新規作成</h2>
      <div class="form-group pb-3 row">
	      <label for="formTitle" class="col-4 col-form-label">タイトル</label>
	      <div class="col-8">
	        <input type="text" class="form-control" id="formTitle" name="title" value="{{ old('title') }}" placeholder="" required>
	        <div class="invalid-tooltip">
	          Please enter title.
	        </div>
	      </div>
	    </div>

      <div class="form-group pb-3 row">
	      <label for="formContent" class="col-4 col-form-label">内容</label>
	      <div class="col-8">
          <textarea class="form-control" id="formContent" name="content" value="{{ old('content') }}" placeholder="" rows="4" style="min-height: 100px;" required></textarea>
          <div class="invalid-tooltip">
            Please enter the content.
          </div>
	      </div>
	    </div>

      <div class="form-group pb-3 row">
	      <label for="formTarget" class="col-4 col-form-label">対象</label>
	      <div class="col-8">
	        <select class="custom-select" id="formTarget" name="target" required>
	          <option value="" selected hidden disabled>Choose specific target</option>
	          <option value="target-company">Company</option>
	          <option value="target-student">Student</option>
	          <option value="target-all">All of them</option>
	        </select>
	        <div class="invalid-tooltip">
	          Please choose your target audience.
	        </div>
	      </div>
	    </div>

      <div class="form-group pb-3 row">
	      <label for="formDate" class="col-4 col-form-label">通知日</label>
	      <div class="col-8">
          <div class="input-group">
            <input type="text" class="form-control js-datepicker" id="formStaffBirthdate" name="birthday" value="{{ old('birthday') }}" placeholder="" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-fw fa-calendar-alt"></i>
              </div>
            </div>
            <div class="invalid-tooltip">
              Please enter notification date.
            </div>
          </div>
	      </div>
	    </div>

      <div class="form-group pb-3 row">
	      <label for="formGenre" class="col-4 col-form-label">ジャンル</label>
	      <div class="col-8">
	        <select class="custom-select" id="formGenre" name="genre" required>
	          <option value="" selected hidden disabled>Choose genre</option>
	          <option value="genre-kredo">Kredo Blog</option>
	          <option value="genre-it">IT</option>
	          <option value="genre-esl">ESL</option>
	          <option value="genre-housekeeper">Housekeeper</option>
	          <option value="genre-etc">Etc</option>
	        </select>
	        <div class="invalid-tooltip">
	          Please choose your genre.
	        </div>
	      </div>
	    </div>

	    <div class="form-group row">
	      <div class="col-6 py-4 mx-auto">
	        <button type="submit" class="alt-font btn btn-primary btn-submit w-100">送信</button>
	      </div>
	    </div>
	  </form>
	</div>

  <div class="modal fade" id="js-register-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">新規作成</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to create notification?
        </div>
        <div class="modal-footer">
          <button type="button" class="alt-font btn btn-secondary" data-dismiss="modal">キャンセル</button>
          <button id="js-modal-submit" type="button" class="alt-font btn btn-primary">確認する</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    const forms = document.querySelectorAll('.needs-validation');
    const modalSubmit = document.querySelector('#js-modal-submit');
    const modal = document.querySelector('#js-register-modal');

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        $(modal).modal('show');

        event.preventDefault();
      }, false);

      form.addEventListener('change', function(event) {
        this.target.setCustomValidity(this.target.value === "" ? "Please choose your target audience." : "");
        this.genre.setCustomValidity(this.genre.value === "" ? "Please choose your genre." : "");
      }, false);

      modalSubmit.addEventListener('click', function(event) {
        $(modal).modal('hide');

        form.target.setCustomValidity(form.target.value === "" ? "Please choose your target audience." : "");
        form.genre.setCustomValidity(form.genre.value === "" ? "Please choose your genre." : "");

        if (form.checkValidity() === false) {

          event.preventDefault();
          event.stopPropagation();
        } else {
          $(form).unbind('submit').submit();
        }

        form.classList.add('was-validated');
      });
    });

  </script>
@endsection
