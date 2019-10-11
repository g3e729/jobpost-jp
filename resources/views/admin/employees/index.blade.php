@extends('admin.layouts.default')

@section('content')
  <div class="l-container l-container-wide">
  	@foreach($employees as $employee)
  		<a href="{{ route('admin.employees.show', $employee) }}">[{{ $employee->id }} {{ $employee->name }}, {{ $employee->email }}]</a>
  		<br/>
  	@endforeach
  </div>
@endsection