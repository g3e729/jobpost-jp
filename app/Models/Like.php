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
        'updated_at'
    ];

    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type'
    ];

    public function likeable()
    {
        return $this->morphTo();
    }
}
