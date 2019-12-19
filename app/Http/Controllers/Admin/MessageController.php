<?php

namespace App\Http\Controllers\Admin;

use App\Services\ChatService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class MessageController extends BaseController
{
	public function index()
	{
		$channels = (new ChatService)->getChannels();

		// dd($channels->first()->chats->first()->user->profile->display_name);

		return view('admin.messages.index', compact('channels'));
	}
}
