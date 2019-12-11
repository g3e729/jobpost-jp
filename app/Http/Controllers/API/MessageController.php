<?php

namespace App\Http\Controllers\API;

use App\Models\ChatChannel;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class MessageController extends BaseController
{
	protected $user = null;

	public function __construct()
	{
		$this->user = (new UserService)->findApiToken(request()->get('api_token'));
	}
	
	public function index()
	{
		$messages = ChatChannel::whereHas('chats', function ($q) {
			$q->where('user_id', $this->user->id);
		})->get();

		return $messages;
	}
	
	public function show(ChatChannel $message)
	{
		$message->load('chats');

		return $message;
	}
	
	public function store(ChatChannel $message, Request $request)
	{
		$params = [
			'user_id' => $this->user->id,
			'content' => $request->get('message'),
		];

		$chat = $message->chats()->create($params);

		return $chat;
	}
}
