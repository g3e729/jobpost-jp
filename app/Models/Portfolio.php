<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $dates = [
        'created_at',
        'established_date',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'url',
        'portfolable_id',
        'portfolable_type',
    ];

    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function portfolable()
    {
        return $this->morphTo();
    }
}
