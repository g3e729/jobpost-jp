<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationHistory extends Model
{
    protected $dates = [
        'graduated_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'school_name',
        'faculty',
        'major',
        'department',
        'content',
        'historiable_id',
        'historiable_type',
        'graduated_at'
    ];

    public function historiable()
    {
        return $this->morphTo();
    }
}