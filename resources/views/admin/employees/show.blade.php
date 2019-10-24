@extends('admin.layouts.default')

@section('content')
  <div class="l-container l-container-wide">
  	[{{ $employee->name }}, {{ $employee->email }}]
  </div>
@endsection