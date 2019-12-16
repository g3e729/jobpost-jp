<?php

namespace App\Services;

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

        return $this->item->chats()->create($fields);
    }

    public function setUser(User $user)
    {
        return $this->user = $user;
    }
}
