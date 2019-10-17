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
	    <h2 class="py-4 text-center">アカウント作成</h2>
	    <div class="form-group pb-3 row">
	      <label for="formType" class="col-4 col-form-label">アカウントタイプ</label>
	      <div class="col-8">
	        <select class="custom-select" id="formType" name="type" required>
	          <option value="0" selected hidden disabled>Choose account type</option>
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
	        <button type="submit" class="btn btn-primary w-100">送信</button>
	      </div>
	    </div>
	  </form>
	</div>

  <div class="modal modal-sm fade" id="js-registerModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to add account?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
          <button id="js-modalSubmit" type="button" class="btn btn-primary">確認する</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    window.addEventListener('load', function() {
      const forms = document.querySelectorAll('.needs-validation');
      const modalSubmit = document.querySelector('#js-modalSubmit');
      const modal = document.querySelector('#js-registerModal');

      // Loop over them and prevent submission
      Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          $(modal).modal('show');

          event.preventDefault();
        }, false);

        modalSubmit.addEventListener('click', function(event) {
          $(modal).modal('hide');

          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          } else {
            $(form).unbind('submit').submit();
          }

          form.classList.add('was-validated');
        });
      });
    }, false);

  </script>
@endsection