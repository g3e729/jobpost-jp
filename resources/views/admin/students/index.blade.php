@extends('admin.layouts.default')

@section('content')
  <div class="l-container">
    @include('admin.students.partials.search')
  </div>

  <hr class="content-divider d-block">

  <div class="l-container l-container-wide">
    <div class="row py-4">
      
      @for($i = 0; $i < rand(6, 12); $i++)
        <div class="col-3 mb-4">
          <div class="card card-student">
            <div class="card-body">
              <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
              <div class="card-body-top">
                <h5 class="card-title">田中義人</h5>
                <h6 class="card-subtitle mb-2 text-muted">在学中</h6>
                <div class="card-actions">
                  <a href="{{ route('admin.students.show', $i) }}" class="card-link">詳細</a>
                  <a href="{{ route('admin.students.edit', $i) }}" class="card-link">編集</a>
                </div>
              </div>
              <div class="card-body-main mt-2">
                
                <ul class="list-group list-group-flush">
                  
                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">メールアドレス</div>
                    <span class="text-muted">Kredo.@kredo.com</span>
                  </li>
                  
                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">期</div>
                    <span class="text-muted">{{ rand(3, 10) }}</span>
                  </li>
                  
                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">コース</div>
                    <span class="text-muted">PHP</span>
                  </li>
                  
                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">ステータス</div>
                    <span class="text-muted">在学中</span>
                  </li>
                  
                  <li class="list-group-item p-1">
                    <div class="font-weight-bold">英語</div>
                    <span class="text-muted">CEFR - B1</span>
                  </li>
                  
                </ul>
                
              </div>
            </div>
          </div>
        </div>
      @endfor
      
    </div>
  </div>

  @include('admin.partials.pagination')
@endsection