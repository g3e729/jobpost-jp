@extends('employee.layouts.default')

@section('pageTitle', 'Files')

@section('content')
  <div class="l-container">
    @include('employee.files.partials.search')
  </div>

  <hr class="content-divider d-block">

  <div class="l-container l-container-wide">

    @if (! $files->count())
      <p class="text-center">No results</p>
    @endif

    <div class="row py-4">
      
      @foreach($files as $file)
        <div class="col-3 mb-4">
          <div class="shadow-sm card card-staff card-hover">
            <div class="card-body">
              <img src="{{ $file->url }}" class="card-image float-left rounded-circle">
              <div class="card-body-top">
                <h5 class="card-title">
                	{{ strlen($file->file_name) > 20 ? substr($file->file_name, 0, 23) . '...' : $file->file_name }}
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $file->type }}</h6>
                <div class="card-actions">{{ formatSizeUnits($file->size) }}</div>
              </div>
              <div class="card-body-main mt-2">
                
                <ul class="list-group list-group-flush">
                  
                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">Used By</div>
                    <span class="text-muted">
                    	<a href="{{ getProfileUrl($file->fileable) }}" target="_blank">{{ $file->fileable->display_name }}</a></span>
                  </li>
                  
                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">Uploader</div>
                    @if ($file->uploader_id == auth()->user()->id)
                    	<span class="text-muted">You</span>
                    @else
                    	<span class="text-muted">{{ $file->uploader->japanese_name ?? $file->uploader->name }}</span>
                    @endif
                  </li>
                  
                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">Uploaded</div>
                    <span class="text-muted">{{ $file->created_at->format('Y年m月d日') }}</span>
                  </li>
                  
                </ul>
                
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>

  @if ($files->count())
  @include('employee.partials.pagination', ['data' => $files])
  @endif
@endsection