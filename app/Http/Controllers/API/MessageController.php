<?php

namespace App\Http\Controllers\API;

use App\Models\Applicant;
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
        $que = (new Applicant)->with(['chat_channel' => function ($q) {
            $q->with('chats');
        }, 'applicant'])->whereHas('chat_channel');

        if ($profile instanceof SeekerProfile) {
            $que = $que->where('seeker_profile_id', $profile->id);
        } elseif ($profile instanceof CompanyProfile) {
            $job_ids = $profile->jobPosts()->get()->pluck('id')->toArray();
            $que = $que->whereIn('job_post_id', $job_ids);
        }

        return $que->orderBy('updated_at', 'DESC')->paginate(config('site_settings.per_page'));
    }

    public function show(ChatChannel $message)
    {
        $message->load('chats', 'chattable');

        return $message;
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            apiAbort(403);
        }

        $content = $request->get('message');

        if (empty($content)) {
            apiAbort('Server Error');
        }

        $chatService = (new ChatService);
        $channel = $chatService->find($request->get('channel_id'));

        $chatService->setUser($user);

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
