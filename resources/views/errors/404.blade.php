@extends('layouts.errors')

@section('pageTitle', 'Error 404')

@section('content')
    <span class="display-1 d-block">404</span>
    <div class="lead alt-font">The page you are looking for was not found.</div>
    <div class="mb-4">
    	<i>{!! $exception->getMessage() !!}</i>
    </div>
    <a href="/" class="alt-font btn btn-link">Back to Home</a>
@endsection
