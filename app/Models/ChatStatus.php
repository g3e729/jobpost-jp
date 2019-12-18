<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatStatus extends Model
{
    protected $table = 'chat_status';
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
    	'channel_id',
    	'user_id',
    	'seen'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
