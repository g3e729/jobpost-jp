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

    public function sendMessage($fields = [])
    {
        $fields['user_id'] = $this->user->id;

        $chat = $this->item->chats()->create($fields);

        $this->item->touch();

        $model = $this->item->chattable;
        $profiles = [];

        if ($model instanceof Applicant) {
            $profiles[] = $model->applicant;
            $profiles[] = $model->employer;
        }

        foreach($profiles as $profile) {
            $user_id = $profile->user_id;
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

    public function setUser(User $user)
    {
        return $this->user = $user;
    }
}
