@extends('admin.layouts.default')

@section('content')
  <div class="l-container l-container-wide">
  	[{{ $company->company_name }}, {{ $company->email }}]
  </div>
@endsection