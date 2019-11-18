<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'featurable_id',
        'featurable_type',
    ];

    public function featurable()
    {
        return $this->morphTo();
    }
}