@extends('admin.layouts.default')

@section('content')
	<div class="l-container l-container-narrow">
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session()->get('success') }}
    </div>
    @endif
	  <form class="needs-validation py-2 mb-4" method="POST" action="{{ route('admin.invite.store') }}" novalidate>
      @csrf
	    <h2 class="py-4 text-center alt-font">アカウント作成</h2>
	    <div class="form-group pb-3 row">
	      <label for="formType" class="col-4 col-form-label">アカウントタイプ</label>
	      <div class="col-8">
	        <select class="custom-select" id="formType" name="type" required>
	          <option value="" selected hidden disabled>Choose account type</option>
            @foreach($types as $value => $type)
	          <option value="{{ $value }}">{{ ucwords($type) }}</option>
            @endforeach
	        </select>
	        <div class="invalid-tooltip">
	          Please choose an account type.
	        </div>
	      </div>
	    </div>
	    <div class="form-group pb-3 row">
	      <label for="formEmail" class="col-4 col-form-label">メールアドレス</label>
	      <div class="col-8">
	        <input type="email" class="form-control" id="formEmail" name="email" placeholder="" required>
	        <div class="invalid-tooltip">
	          Please enter an email address.
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
          Are you sure you want to add account?
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
        this.type.setCustomValidity(this.type.value === "" ? "Please choose an account type." : "");
      }, false);

      modalSubmit.addEventListener('click', function(event) {
        $(modal).modal('hide');

        form.type.setCustomValidity(form.type.value === "" ? "Please choose an account type." : "");

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