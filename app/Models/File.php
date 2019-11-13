<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'url',
        'file_name',
        'type',
        'mime_type',
        'size',
        'sort',
        'fileable_id',
        'fileable_type'
    ];

    public function fileable()
    {
        return $this->morphTo();
    }
}