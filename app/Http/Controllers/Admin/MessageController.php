<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChatChannel;
use App\Services\ChatService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class MessageController extends BaseController
{
	public function index()
	{
		$channels = (new ChatService)->getChannels();

		return view('admin.messages.index', compact('channels'));
	}

	public function destroy(ChatChannel $channel)
	{

		$chatService = (new ChatService($channel));
		$chatService->destroy();

		return redirect()->back()->withSuccess('Messages successfully deleted!');;
	}
}
