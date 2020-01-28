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

    protected $appends = [
        'messages',
        'title',
        'recipient'
    ];

    // Relations
    public function chattable()
    {
        return $this->morphTo();
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'channel_id', 'id')->orderBy('created_at', 'ASC');
    }

    public function chat_status()
    {
        return $this->hasMany(ChatStatus::class, 'channel_id');
    }

    public function getOwnerAttribute()
    {
        return $this->chattable->employer;
    }

    public function getRecipientAttribute()
    {
        return $this->chattable->applicant;
    }

    public function getTitleAttribute()
    {
        return $this->chattable->job_post->title;
    }

    public function getImgAttribute()
    {
        return $this->chattable->employer->avatar;
    }

    public function getMessagesAttribute()
    {
        return $this->chats()->orderBy('created_at', 'DESC')->get();
    }
}
