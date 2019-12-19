<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatChannel extends Model
{
    use SoftDeletes;

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
        return $this->hasMany(Chat::class, 'channel_id', 'id');
    }

    public function chat_status()
    {
        return $this->hasMany(ChatStatus::class, 'channel_id');
    }

    public function getChattableItemsAttribute()
    {
        return $this->chats()->orderBy('created_at', 'DESC')->first();
    }

    public function getLastChatAttribute()
    {
        return $this->chattable;
    }

    public function getOwnerAttribute()
    {
        return $this->chattable->employer;
    }

    public function getTitleAttribute()
    {
        return $this->chattable->job_post->title;
    }

    public function getImgAttribute()
    {
        return $this->chattable->employer->avatar;
    }
}
