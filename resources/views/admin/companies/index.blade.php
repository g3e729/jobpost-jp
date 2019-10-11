@extends('admin.layouts.default')

@section('content')
  <div class="l-container l-container-wide">
  	@foreach($companies as $company)
  		<a href="{{ route('admin.companies.show', $company) }}">[{{ $company->id }} {{ $company->name }}, {{ $company->email }}]</a>
  		<br/>
  	@endforeach
  </div>
@endsection