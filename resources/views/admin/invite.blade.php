@extends('admin.layouts.default')

@section('content')
	<div class="l-container l-container-narrow">
	  <form class="needs-validation py-2 mb-4" novalidate>
	    <h2 class="py-4 text-center">アカウント作成</h2>
	    <div class="form-group pb-3 row">
	      <label for="formType" class="col-4 col-form-label">アカウントタイプ</label>
	      <div class="col-8">
	        <select class="custom-select" id="formType" name="formType" required>
	          <option value="" selected hidden disabled>Choose account type</option>
	          <option value="student">Student</option>
	          <option value="company">Company</option>
	          <option value="staff">Staff</option>
	        </select>
	        <div class="invalid-tooltip">
	          Please choose an account type.
	        </div>
	      </div>
	    </div>
	    <div class="form-group pb-3 row">
	      <label for="formEmail" class="col-4 col-form-label col-form-label">メールアドレス</label>
	      <div class="col-8">
	        <input type="email" class="form-control" id="formEmail" name="formEmail" placeholder="" required>
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
@endsection