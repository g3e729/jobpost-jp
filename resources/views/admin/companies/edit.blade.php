@extends('admin.layouts.default')

@section('pageTitle', "Edit {$company->display_name}")

@section('content')
  <div class="l-container l-container-wide">
  	[{{ $company->company_name }}, {{ $company->email }}]
  </div>
@endsection