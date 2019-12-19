@extends('admin.layouts.default')

@section('pageTitle', 'メッセージ')

@section('content')
  <div class="l-container l-container-full mt-n4">
    <div class="row">


    @if (session()->has('success'))
      <div class="col-12 mt-5 px-5">
        <div class="alert alert-success" role="alert">
          {{ session()->get('success') }}
        </div>
      </div>
    @endif

    @if (!$channels->count())
      <div class="col-12 mt-5">
        <p class="text-center">No results</p>
      </div>
    @endif

    <div class="col-4">
      <div class="chat-users">

        <ul class="nav nav-users" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          @php
            $first = true;
          @endphp
          @foreach($channels as $channel)
            <li class="nav-item chat-person">
              <a class="nav-link p-3 {{ ($first) ? 'active' : '' }}" id="v-pills-{{ $channel->id }}-tab" data-toggle="pill" href="#v-pills-{{ $channel->id }}" role="tab" aria-controls="v-pills-{{ $channel->id }}" aria-selected="false">
                <div class="chat-user">
                  <img src="{{ $channel->img }}" alt="{{ $channel->title }}">
                  @if (!$channel->seen)
                  <span class="chat-new"></span>
                  @endif
                </div>
                <p class="chat-date">
                  <span class="d-block">{{ $channel->title }}</span>
                  <time>{{ $channel->updated_at }}</time>
                </p>
              </a>

              <div class="chat-actions">
                <button form="deleteForm-{{ $channel->id }}" class="chat-link js-chat-delete">
                  <i class="fa fa-trash-alt text-muted"></i>
                </button>
                <form id="deleteForm-{{ $channel->id }}" method="POST" action="{{ route('admin.messages.destroy', $channel) }}" novalidate style="visibility: hidden; position: absolute;">
                  @csrf
                  {{ method_field('DELETE') }}

                  <button type="submit">削除</button>
                </form>
              </div>
            </li>

            @php
             $first = false;
            @endphp
          @endforeach
        </ul>

      </div>
    </div>
    <div class="col-8 pl-0">
      <div class="tab-content" id="v-pills-tabContent">
        @php
         $first = true;
        @endphp

        @foreach($channels as $channel)
          <div class="tab-pane fade {{ $first ? 'show active' : ''}} " id="v-pills-{{ $channel->id }}" role="tabpanel" aria-labelledby="v-pills-{{ $channel->id }}-tab">
            <div class="selected-user">To: <span class="selected-user-name">{{ $channel->title }}</span></div>
            <div class="chat-tab p-3">
              <ul id="js-chat-scroll" class="chat-box pl-0">

                @php
                  $id = $channel->owner->user_id;
                @endphp

                @foreach($channel->chats as $chat)
                  <li class="{{ $id == $chat->user_id ? 'chat-left' : 'chat-right' }}">
                    @if ($id != $chat->user_id)
                      <span class="chat-hour">{{ $chat->created_at->diffForHumans() }}</span>
                    @else
                      <div class="chat-avatar text-center">
                        <img src="{{ $chat->user->profile->avatar }}" alt="{{ $chat->user->profile->display_name }}">
                        <div class="chat-name">{{ $channel->name }}</div>
                      </div>
                    @endif
                    <div class="chat-text">
                      {{ $chat->content }}
                    </div>
                    @if ($id == $chat->user_id)
                      <span class="chat-hour">{{ $chat->created_at->diffForHumans() }}</span>
                    @else
                      <div class="chat-avatar text-center">
                        <img src="{{ $chat->user->profile->avatar }}" alt="{{ $chat->user->profile->display_name }}">
                        <div class="chat-name">{{ $channel->name }}</div>
                      </div>
                    @endif
                  </li>

                  @php
                   $first = false;
                  @endphp
                @endforeach

              </ul>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </div>

  <div class="modal fade" id="js-delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">削除</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          このトークルームをを削除しますか？
        </div>
        <div class="modal-footer">
          <button type="button" class="alt-font btn btn-secondary" data-dismiss="modal">キャンセル</button>
          <button id="js-modal-submit" type="button" class="alt-font btn btn-primary">確認する</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    const deleteButtons = document.querySelectorAll('.js-chat-delete');
    const modalSubmit = document.querySelector('#js-modal-submit');
    const modal = document.querySelector('#js-delete-modal');
    let currTarget;

    deleteButtons.forEach(btn => {
      btn.addEventListener('click', function(event) {
        $(modal).modal('show');
        currTarget = event.currentTarget.href;

        console.log(currentTarget);

        event.preventDefault();
      })
    });

    modalSubmit.addEventListener('click', function(event) {
      $(modal).modal('hide');
      window.location.replace(currTarget);
    });

  </script>
@endsection
