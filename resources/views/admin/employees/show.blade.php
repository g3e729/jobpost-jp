@extends('admin.layouts.default')

@section('content')
  <div class="l-container l-container-wide">
  	Japanese Name: {{ $employee->japanese_name }}
  	<br/>
  	Name: {{ $employee->name }}
  	<br/>
  	Email: {{ $employee->email }}
  	<br/>
  	Birthday: {{ $employee->birthday }}
  </div>
@endsection