@extends('layouts.errors')

@section('pageTitle', 'Error 403')

@section('content')
    <span class="display-1 d-block">403</span>
    <div class="lead alt-font">This action is unauthorized.</div>
    <div class="mb-4">
    	<i>{!! $exception->getMessage() !!}</i>
    </div>
    <a href="/" class="alt-font btn btn-link">Back to Home</a>
@endsection
