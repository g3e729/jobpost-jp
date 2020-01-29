<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChatChannel;
use App\Services\ChatService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class MessageController extends BaseController
{
    public function index(Request $request)
    {
        $user_id = $request->get('user_id');
        $profile = null;

        $channels = (new ChatService)->getChannels($user_id);

        if ($user_id) {
            $user = (new UserService)->find($user_id);

            $profile = $user->profile ?? null;
        }

        return view('admin.messages.index', compact('channels', 'profile'));
    }

    public function destroy(ChatChannel $channel)
    {
        $chatService = (new ChatService($channel));
        $chatService->destroy();

        return redirect()->back()->withSuccess('Messages successfully deleted!');;
    }
}
