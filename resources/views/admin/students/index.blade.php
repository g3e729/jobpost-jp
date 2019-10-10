@extends('admin.layouts.default')

@section('content')
  <div class="l-container">
    <form class="py-2 mb-4">
      <h2 class="py-4 text-center">Search Students</h2>
      <div class="form-group pb-3 row">
        <label for="formName" class="col-2 col-form-label col-form-label">ユーザー名</label>
        <div class="col-10">
          <input type="text" class="form-control" id="formName" name="formName" placeholder="Please enter a name">
        </div>
      </div>
      <div class="pb-3 row">
        <div class="col-3">
          <div class="form-group">
            <label for="formCourse">コース</label>
            <select class="form-control" id="formCourse" name="formCourse">
              <option value="" selected hidden disabled>Choose course</option>
              <option value="basic">Basic</option>
              <option value="rails-standard">Ruby on Rails Standard</option>
              <option value="rails-advance">Ruby on Rails Advance</option>
              <option value="rails-expert">Ruby on Rails Expert</option>
              <option value="develop-standard">Develop Standard</option>
              <option value="develop-advance">Develop Advance</option>
              <option value="design-standard">Design Standard</option>
              <option value="design-advance">Design Advance</option>
              <option value="python-standard">Python Standard</option>
              <option value="python-advance">Python Advance</option>
            </select>
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="formPeriod">期</label>
            <select class="form-control" id="formPeriod" name="formPeriod">
              <option value="" selected hidden disabled>Choose period</option>
              <option value="31">第31期( 10月1日~ / Phase 31 (October 1st ~</option>
              <option value="32">第32期( 11月1日~ / Phase 32 (October 1st ~</option>
              <option value="33">第33期( 12月1日~ / Phase33 (October 1st ~</option>
              <option value="34">第34期( 1月1日~ / Phase34 (October 1st ~</option>
              <option value="35">第35期( 2月1日~ / Phase35 (October 1st ~</option>
            </select>
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="formStatus">ステータス</label>
            <select class="form-control" id="formStatus" name="formStatus">
              <option value="" selected hidden disabled>Choose status</option>
              <option value="pre-matriculation">Pre-Matriculation</option>
              <option value="student">Student</option>
              <option value="graduated">Graduated</option>
            </select>
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="formEnglish">English level</label>
            <select class="form-control" id="formEnglish" name="formEnglish">
              <option value="" selected hidden disabled>Choose english level</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group row pt-4 justify-content-center">
        <div class="col-3">
          <button type="submit" class="btn btn-primary w-100">検索</button>
        </div>
        <div class="col-3">
          <button id="js-form-clear" class="btn btn-secondary w-75">リセット</button>
        </div>
      </div>
    </form>
  </div>

  <hr class="content-divider d-block">

  <div class="l-container l-container-wide">
    <div class="row py-4">
      
      <div class="col-3 mb-4">
        <div class="card card-student">
          <div class="card-body">
            <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title">田中義人</h5>
              <h6 class="card-subtitle mb-2 text-muted">在学中</h6>
              <div class="card-actions">
                <a href="/students/1" class="card-link">詳細</a>
                <a href="/students/1/edit" class="card-link">編集</a>
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
                  <span class="text-muted">9</span>
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
      
      <div class="col-3 mb-4">
        <div class="card card-student">
          <div class="card-body">
            <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title">田中義人</h5>
              <h6 class="card-subtitle mb-2 text-muted">在学中</h6>
              <div class="card-actions">
                <a href="/students/1" class="card-link">詳細</a>
                <a href="/students/1/edit" class="card-link">編集</a>
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
                  <span class="text-muted">9</span>
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
      
      <div class="col-3 mb-4">
        <div class="card card-student">
          <div class="card-body">
            <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title">田中義人</h5>
              <h6 class="card-subtitle mb-2 text-muted">在学中</h6>
              <div class="card-actions">
                <a href="/students/1" class="card-link">詳細</a>
                <a href="/students/1/edit" class="card-link">編集</a>
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
                  <span class="text-muted">9</span>
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
      
      <div class="col-3 mb-4">
        <div class="card card-student">
          <div class="card-body">
            <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title">田中義人</h5>
              <h6 class="card-subtitle mb-2 text-muted">在学中</h6>
              <div class="card-actions">
                <a href="/students/1" class="card-link">詳細</a>
                <a href="/students/1/edit" class="card-link">編集</a>
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
                  <span class="text-muted">9</span>
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
      
      <div class="col-3 mb-4">
        <div class="card card-student">
          <div class="card-body">
            <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title">田中義人</h5>
              <h6 class="card-subtitle mb-2 text-muted">在学中</h6>
              <div class="card-actions">
                <a href="/students/1" class="card-link">詳細</a>
                <a href="/students/1/edit" class="card-link">編集</a>
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
                  <span class="text-muted">9</span>
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
      
      <div class="col-3 mb-4">
        <div class="card card-student">
          <div class="card-body">
            <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title">田中義人</h5>
              <h6 class="card-subtitle mb-2 text-muted">在学中</h6>
              <div class="card-actions">
                <a href="/students/1" class="card-link">詳細</a>
                <a href="/students/1/edit" class="card-link">編集</a>
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
                  <span class="text-muted">9</span>
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
      
      <div class="col-3 mb-4">
        <div class="card card-student">
          <div class="card-body">
            <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title">田中義人</h5>
              <h6 class="card-subtitle mb-2 text-muted">在学中</h6>
              <div class="card-actions">
                <a href="/students/1" class="card-link">詳細</a>
                <a href="/students/1/edit" class="card-link">編集</a>
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
                  <span class="text-muted">9</span>
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
      
      <div class="col-3 mb-4">
        <div class="card card-student">
          <div class="card-body">
            <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title">田中義人</h5>
              <h6 class="card-subtitle mb-2 text-muted">在学中</h6>
              <div class="card-actions">
                <a href="/students/1" class="card-link">詳細</a>
                <a href="/students/1/edit" class="card-link">編集</a>
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
                  <span class="text-muted">9</span>
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
      
      <div class="col-3 mb-4">
        <div class="card card-student">
          <div class="card-body">
            <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title">田中義人</h5>
              <h6 class="card-subtitle mb-2 text-muted">在学中</h6>
              <div class="card-actions">
                <a href="/students/1" class="card-link">詳細</a>
                <a href="/students/1/edit" class="card-link">編集</a>
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
                  <span class="text-muted">9</span>
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
      
      <div class="col-3 mb-4">
        <div class="card card-student">
          <div class="card-body">
            <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title">田中義人</h5>
              <h6 class="card-subtitle mb-2 text-muted">在学中</h6>
              <div class="card-actions">
                <a href="/students/1" class="card-link">詳細</a>
                <a href="/students/1/edit" class="card-link">編集</a>
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
                  <span class="text-muted">9</span>
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
      
      <div class="col-3 mb-4">
        <div class="card card-student">
          <div class="card-body">
            <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title">田中義人</h5>
              <h6 class="card-subtitle mb-2 text-muted">在学中</h6>
              <div class="card-actions">
                <a href="/students/1" class="card-link">詳細</a>
                <a href="/students/1/edit" class="card-link">編集</a>
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
                  <span class="text-muted">9</span>
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
      
      <div class="col-3 mb-4">
        <div class="card card-student">
          <div class="card-body">
            <img src="https://i.pravatar.cc/300" class="card-image float-left rounded-circle">
            <div class="card-body-top">
              <h5 class="card-title">田中義人</h5>
              <h6 class="card-subtitle mb-2 text-muted">在学中</h6>
              <div class="card-actions">
                <a href="/students/1" class="card-link">詳細</a>
                <a href="/students/1/edit" class="card-link">編集</a>
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
                  <span class="text-muted">9</span>
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
      
    </div>
  </div>

  @include('admin.partials.pagination')
@endsection