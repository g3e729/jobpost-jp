@extends('layouts.errors')

@section('pageTitle', 'Error 419')

@section('content')
    <span class="display-1 d-block">419</span>
    <div class="lead alt-font">Page Expired.</div>
    <div class="mb-4">
    	<i>{!! $exception->getMessage() !!}</i>
    </div>
    <a href="{{ url()->previous() }}" class="alt-font btn btn-link">Go back</a>
@endsection
