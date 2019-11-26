@extends('layouts.errors')

@section('pageTitle', 'Error 503')

@section('content')
    <span class="display-1 d-block">503</span>
    <div class="lead alt-font">Service Currently Not Available.</div>
    <div class="mb-4">
    	<i>{!! $exception->getMessage() !!}</i>
    </div>
    <a href="{{ url()->previous() }}" class="alt-font btn btn-link">Go back</a>
@endsection
