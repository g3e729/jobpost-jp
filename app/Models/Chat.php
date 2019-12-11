<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
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
    }

    // Relations
    public function channel()
    {
        return $this->belongsTo(ChatChannel::class, 'channel_id');
    }
}
