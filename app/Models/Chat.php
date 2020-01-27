<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use SoftDeletes;
    
    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected $fillable = [
    	'channel_id',
    	'user_id',
    	'content'
    ];

    protected $hidden = [
        'channel_id',
        'updated_at'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
        	$user = auth()->user();
        	$user_id = !$model->user_id && $user ? $user->id : $model->user_id;
        	
        	$model->user_id = $user_id;
        });
        static::created(function ($model) {
            $user_ids = $model->channel->chat_status()
                ->where('user_id', '!=', [1, auth()->user()->id])
                ->get()
                ->pluck('user_id')
                ->toArray();
            $title = auth()->user()->profile->display_name . ' sent a message.';
            $description = '';
            $about_type = ChatChannel::class;
            $about_id = $model->channel_id;

            $users = User::whereIn('id', $user_ids)->get();

            foreach ($users as $user) {
                $user->notifications()->create(compact('title', 'description', 'about_type', 'about_id'));
            }
        });
    }

    // Relations
    public function channel()
    {
        return $this->belongsTo(ChatChannel::class, 'channel_id');
    }

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
