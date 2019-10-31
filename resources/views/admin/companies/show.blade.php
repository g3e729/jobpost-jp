@extends('admin.layouts.default')

@section('content')
  <div class="l-container l-container-wide">
  	Company Name: {{ $company->company_name }}
  	<br/>
  	CEO: {{ $company->ceo }}
  	<br/>
  	Email: {{ $company->email }}
  	<br/>
  	Birthday: {{ $company->established_date->format('Y年m月d日') }}
  </div>
@endsection