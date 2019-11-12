<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
		'id',
		'skill_id',
		'description',
		'skill_rate',
		'skillable_id',
		'skillable_type'
    ];

    public function skillable()
    {
        return $this->morphTo();
    }
}