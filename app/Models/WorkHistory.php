<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkHistory extends Model
{
    protected $dates = [
        'started_at',
        'ended_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
		'company_name',
		'role',
		'content',
		'historiable_id',
		'historiable_type',
		'is_present',
		'started_at',
		'ended_at',
    ];

    public function historiable()
    {
        return $this->morphTo();
    }
}