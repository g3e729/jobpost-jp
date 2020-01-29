<?php

namespace App\Http\Controllers\API;

use App\Models\ChatChannel;
use App\Services\ChatService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class MessageController extends BaseController
{
    public function index()
    {
        // return ChatChannel::whereHas('chats', function ($q) {
        // 	$q->where('user_id', auth()->user()->id);
        // })->orderBy('updated_at', 'DESC')->paginate(config('site_settings.per_page'));

        return ChatChannel::orderBy('updated_at', 'DESC')->paginate(config('site_settings.per_page'));
    }

    public function show(ChatChannel $message)
    {
        $message->load('chats', 'chattable');

        return $message;
    }

    public function store(Request $request)
    {
        $content = $request->get('message');

        if (empty($content)) {
            apiAbort('Server Error');
        }

        $chatService = (new ChatService);
        $channel = $chatService->find($request->get('channel_id'));

        $chatService->setUser(auth()->user());

        return $chatService->sendMessage(compact('content'));
    }

    public function seen(ChatChannel $channel, Request $request)
    {
        $chatService = (new ChatService($channel));
        $chatService->seen();
        $channel = $chatService->getItem();

        return $channel->chats()->orderBy('created_at', 'DESC')->first();
    }
}
