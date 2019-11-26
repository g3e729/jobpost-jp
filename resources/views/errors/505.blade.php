@extends('layouts.errors')

@section('pageTitle', 'Error 505')

@section('content')
    <span class="display-1 d-block">505</span>
    <div class="lead alt-font">Internal Server Error.</div>
    <div class="mb-4">
    	<i>{!! $exception->getMessage() !!}</i>
    </div>
    <a href="{{ url()->previous() }}" class="alt-font btn btn-link">Go back</a>
@endsection
