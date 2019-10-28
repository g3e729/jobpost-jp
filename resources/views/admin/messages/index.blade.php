@extends('admin.layouts.default')

@php

$chats = [];
for ($i = 0; $i < 5; $i++) {
  $chats[] = (object) [
    "id" => $i,
    "name" => $faker->name,
    "avatar" => $faker->imageUrl(240, 240, 'people'),
    "date" => $faker->dateTimeThisCentury->format('Y-m-d'),
    "new" => $faker->randomElement($array = array ('True', 'False')),
    "company_name" => $faker->company,
    "company_avatar" => $faker->imageUrl(240, 240, 'city')
  ];
}

@endphp

@section('content')
  <div class="l-container l-container-full mt-n4">
    <div class="row">
      <div class="col-4">
        <div class="chat-users">
          @if ($chats)
          <ul class="nav nav-users" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @foreach($chats as $chat)
            <li class="nav-item chat-person">
              <a class="nav-link p-3 {{ ($chat->id === 0) ? 'active' : '' }}" id="v-pills-{{ $chat->id }}-tab" data-toggle="pill" href="#v-pills-{{ $chat->id }}" role="tab" aria-controls="v-pills-{{ $chat->id }}" aria-selected="false">
                <div class="chat-user">
                  <img src="{{ $chat->avatar }}" alt="{{ $chat->name }}">
                  @if ($chat->new === 'True')
                  <span class="chat-new"></span>
                  @endif
                </div>
                <p class="chat-date">
                  <span class="d-block">{{ $chat->name }}</span>
                  <time>{{ $chat->date }}</time>
                </p>
              </a>
            </li>
            @endforeach
          </ul>
          @endif
        </div>
      </div>
      <div class="col-8 pl-0">
      @if ($chats)
      <div class="tab-content" id="v-pills-tabContent">
        @foreach($chats as $chat)
        <div class="tab-pane fade {{ ($chat->id === 0) ? 'show active' : ''}} " id="v-pills-{{ $chat->id }}" role="tabpanel" aria-labelledby="v-pills-{{ $chat->id }}-tab">
          <div class="selected-user">To: <span class="selected-user-name">{{ $chat->name }}</span></div>
          <div class="chat-tab p-3">
            <ul id="js-chat-scroll" class="chat-box pl-0">
              <li class="chat-left">
                <div class="chat-avatar text-center">
                  <img src="{{ $chat->avatar }}" alt="{{ $chat->name }}">
                  <div class="chat-name">{{ $chat->name }}</div>
                </div>
                <div class="chat-text">Hello, I'm {{ $chat->name }}.
                  <br>How can I help you today?</div>
                <div class="chat-hour">08:55 am</span></div>
              </li>
              <li class="chat-right">
                <div class="chat-hour">08:56 am</span></div>
                <div class="chat-text">Hi, {{ $chat->name }}
                  <br> I need more information about Developer Plan.</div>
                <div class="chat-avatar text-center">
                  <img src="{{ $chat->company_avatar }}" alt="{{ $chat->company_name }}">
                  <div class="chat-name">{{ $chat->company_name }}</div>
                </div>
              </li>
              <li class="chat-left">
                <div class="chat-avatar text-center">
                  <img src="{{ $chat->avatar }}" alt="{{ $chat->name }}">
                  <div class="chat-name">{{ $chat->name }}</div>
                </div>
                <div class="chat-text">Are we meeting today?
                  <br>Project has been already finished and I have results to show you.</div>
                <div class="chat-hour">08:57 am</span></div>
              </li>
              <li class="chat-right">
                <div class="chat-hour">08:59 am</span></div>
                <div class="chat-text">Well I am not sure.
                  <br>I have results to show you.</div>
                <div class="chat-avatar text-center">
                  <img src="{{ $chat->company_avatar }}" alt="{{ $chat->company_name }}">
                  <div class="chat-name">{{ $chat->company_name }}</div>
                </div>
              </li>
              <li class="chat-left">
                <div class="chat-avatar text-center">
                  <img src="{{ $chat->avatar }}" alt="{{ $chat->name }}">
                  <div class="chat-name">{{ $chat->name }}</div>
                </div>
                <div class="chat-text">The rest of the team is not here yet.
                  <br>Maybe in an hour or so?</div>
                <div class="chat-hour">08:57 am</span></div>
              </li>
              <li class="chat-right">
                <div class="chat-hour">08:59 am</span></div>
                <div class="chat-text">Have you faced any problems at the last phase of the project?</div>
                <div class="chat-avatar text-center">
                  <img src="{{ $chat->company_avatar }}" alt="{{ $chat->company_name }}">
                  <div class="chat-name">{{ $chat->company_name }}</div>
                </div>
              </li>
              <li class="chat-left">
                <div class="chat-avatar text-center">
                  <img src="{{ $chat->avatar }}" alt="{{ $chat->name }}">
                  <div class="chat-name">{{ $chat->name }}</div>
                </div>
                <div class="chat-text">Actually everything was fine.
                  <br>I'm very excited to show this to our team.</div>
                <div class="chat-hour">07:00 pm</span></div>
              </li>
            </ul>
          </div>
        </div>
        @endforeach
      </div>
      @endif
    </div>
  </div>
@endsection
