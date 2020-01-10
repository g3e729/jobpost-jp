<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'likeable_id',
        'likeable_type',
        'updated_at',
        'liker',
    ];

    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type'
    ];

    protected $appends = [
        'liker_id'
    ];

    public function likeable()
    {
        return $this->morphTo();
    }

    public function liker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getLikerIdAttribute()
    {
        return $this->liker->api_token ?? null;
    }
}
