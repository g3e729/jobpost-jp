<?php

namespace App\Http\Controllers\API;

use App\Models\ChatChannel;
use App\Models\CompanyProfile;
use App\Models\SeekerProfile;
use App\Services\ChatService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class MessageController extends BaseController
{
    public function index()
    {
        $profile = auth()->user()->profile ?? null;

        if ($profile instanceof SeekerProfile) {
            return ChatChannel::whereHas('chattable', function ($q) use ($profile) {
                $q->where('seeker_profile_id', $profile->id);
            })->orderBy('updated_at', 'DESC')->paginate(config('site_settings.per_page'));
        } elseif ($profile instanceof CompanyProfile) {
            return ChatChannel::whereHas('chattable', function ($q) use ($profile) {
                $job_ids = $profile->jobPosts()->get()->pluck('id')->toArray();
                $q->whereIn('job_post_id', $job_ids);
            })->orderBy('updated_at', 'DESC')->paginate(config('site_settings.per_page'));
        }

        return [];
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
