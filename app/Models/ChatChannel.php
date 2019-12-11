<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatChannel extends Model
{
    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected $fillable = [
        'description',
        'chattable_id',
        'chattable_type'
    ];

    protected $hidden = [
        'chattable_id',
        'chattable_type',
        'deleted_at',
        'updated_at'
    ];

    protected $appends = ['chattable_item', 'last_chat'];

    // Relations
    public function chattable()
    {
        return $this->morphTo();
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'channel_id');
    }

    public function getChattableItemAttribute()
    {
        return $this->chats()->orderBy('created_at', 'DESC')->first();
    }

    public function getLastChatAttribute()
    {
        return $this->chattable;
    }
}
