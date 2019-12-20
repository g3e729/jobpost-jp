<?php

namespace App\Services;

use App\Models\Applicant;
use App\Models\ChatChannel;
use App\Models\User;
use Exception;

class ChatService extends BaseService
{
    // single model
    protected $item;
    protected $user;

    public function __construct($item = null)
    {
        parent::__construct(ChatChannel::class);
        
        if ($item instanceof ChatChannel) {
            $this->item = $item;
        }
    }

    public function getChannels($user_id = null)
    {
        $user = auth()->user();
        $channels = ChatChannel::whereHas('chats', function ($q) use ($user_id) {
            if ($user_id) {
                $q->where('user_id', $user_id);
            }
        })->orderBy('updated_at', 'DESC')
            ->get();

        $channels->each(function ($channel) use ($user) {
            $channel->seen = 1;
            $status = $channel->chat_status()
                ->whereUserId($user->id)
                ->first();

            if (!$status) {
                $channel->seen = 0;
                $channel->chat_status()->create([
                    'user_id' => $user->id,
                    'seen' => 0
                ]);
            }

            if ($status->seen == 0) {
                $channel->seen = 0;
            }
        });

        return $channels;
    }

    public function sendMessage($fields = [])
    {
        $profiles = User::whereHas('roles', function ($q) {
            $q->where('role_id', 1);
        })->get()->toArray();

        $fields['user_id'] = $this->user->id;

        $chat = $this->item->chats()->create($fields);

        $this->item->touch();

        $model = $this->item->chattable;

        if ($model instanceof Applicant) {
            $profiles[] = $model->applicant;
            $profiles[] = $model->employer;
        }

        foreach($profiles as $profile) {
            $user_id = $profile instanceof User ? $profile->id : $profile->user_id;
            $seen = 0;

            if ($this->user->id == $user_id) {
                continue;
            }

            $status = $this->item->chat_status()->whereUserId($user_id)->first();

            if ($status) {
                $status->update(compact('seen'));
            } else {
                $this->item->chat_status()->create(compact('user_id'));
            }
        }

        return $chat;
    }

    public function seen()
    {
        return $this->item->chat_status()->whereUserId(auth()->user()->id)->update(['seen' => 1]);
    }

    public function setUser(User $user)
    {
        return $this->user = $user;
    }

    public function destroy()
    {
        $this->item->chats()->delete();
        
        return $this->item->delete();
    }
}
