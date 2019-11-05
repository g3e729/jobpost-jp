@extends('admin.layouts.default')

@section('pageTitle', "Edit {$employee->display_name}")

@section('content')
  <div class="l-container l-container-wide">
  	[{{ $employee->name }}, {{ $employee->email }}]
  </div>
@endsection