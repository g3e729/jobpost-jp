@extends('admin.layouts.default')

@php

$chats = [];
for ($i = 0; $i < 5; $i++) {
  $chats[] = (object) [
    "id" => $i,
    "name" => $faker->name,
    "avatar" => $faker->imageUrl(240, 240, 'people'),
    "date" => $faker->dateTimeThisCentury->format('Y-m-d')
  ];
}

$company = new stdClass();
$company->name = $faker->company;
$company->avatar = $faker->imageUrl(240, 240, 'city');

$student = new stdClass();
$student->name = $chats[0]->name;
$student->avatar = $chats[0]->avatar;

@endphp

@section('content')
  <div class="l-container l-container-full mt-n4">
    <div class="row">
      <div class="col-4">
        <div class="users-container">
          <!-- <div class="chat-search-box">
            <div class="input-group">
              <input class="form-control" placeholder="Search">
              <div class="input-group-btn">
                <button type="button" class="btn btn-info">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </div> -->

          @if ($chats)
          <ul class="users">
            @foreach($chats as $chat)
            <li class="person" data-chat="person{{ $chat->id }}">
              <div class="user">
                <img src="{{ $chat->avatar }}" alt="{{ $chat->name }}">
                <span class="status busy"></span>
              </div>
              <p class="name-time">
                <span class="name">{{ $chat->name }}</span>
                <span class="time">{{ $chat->date }}</span>
              </p>
            </li>
            @endforeach
          </ul>
          @endif
        </div>
      </div>
      <div class="col-8 pl-0">
        <div class="selected-user">
          <span>To: <span class="selected-user-name">{{ $student->name }}</span></span>
        </div>
        <div class="chat-container">
          <ul id="js-chat-scroll" class="chat-box pl-0">
            <li class="chat-left">
              <div class="chat-avatar text-center">
                <img src="{{ $student->avatar }}" alt="{{ $student->name }}">
                <div class="chat-name">{{ $student->name }}</div>
              </div>
              <div class="chat-text">Hello, I'm {{ $student->name }}.
                <br>How can I help you today?</div>
              <div class="chat-hour">08:55 am</span></div>
            </li>
            <li class="chat-right">
              <div class="chat-hour">08:56 am</span></div>
              <div class="chat-text">Hi, {{ $student->name }}
                <br> I need more information about Developer Plan.</div>
              <div class="chat-avatar text-center">
                <img src="{{ $company->avatar }}" alt="{{ $company->name }}">
                <div class="chat-name">{{ $company->name }}</div>
              </div>
            </li>
            <li class="chat-left">
              <div class="chat-avatar text-center">
                <img src="{{ $student->avatar }}" alt="{{ $student->name }}">
                <div class="chat-name">{{ $student->name }}</div>
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
                <img src="{{ $company->avatar }}" alt="{{ $company->name }}">
                <div class="chat-name">{{ $company->name }}</div>
              </div>
            </li>
            <li class="chat-left">
              <div class="chat-avatar text-center">
                <img src="{{ $student->avatar }}" alt="{{ $student->name }}">
                <div class="chat-name">{{ $student->name }}</div>
              </div>
              <div class="chat-text">The rest of the team is not here yet.
                <br>Maybe in an hour or so?</div>
              <div class="chat-hour">08:57 am</span></div>
            </li>
            <li class="chat-right">
              <div class="chat-hour">08:59 am</span></div>
              <div class="chat-text">Have you faced any problems at the last phase of the project?</div>
              <div class="chat-avatar text-center">
                <img src="{{ $company->avatar }}" alt="{{ $company->name }}">
                <div class="chat-name">{{ $company->name }}</div>
              </div>
            </li>
            <li class="chat-left">
              <div class="chat-avatar text-center">
                <img src="{{ $student->avatar }}" alt="{{ $student->name }}">
                <div class="chat-name">{{ $student->name }}</div>
              </div>
              <div class="chat-text">Actually everything was fine.
                <br>I'm very excited to show this to our team.</div>
              <div class="chat-hour">07:00 pm</span></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
