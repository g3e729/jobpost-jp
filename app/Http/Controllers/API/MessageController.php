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
		$messages = ChatChannel::whereHas('chats', function ($q) {
			$q->where('user_id', auth()->user()->id);
		})->get();

		return $messages;
	}
	
	public function show(ChatChannel $message)
	{
		$message->load('chats');

		return $message;
	}
	
	public function store(Request $request)
	{
		$chatService = (new ChatService);
		$channel = $chatService->find($request->get('channel_id'));

		$chatService->setUser(auth()->user());
		$content = $request->get('message');

		return $chatService->sendMessage(compact('content'));
	}
}
