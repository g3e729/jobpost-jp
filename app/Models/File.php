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
        'uploader_id',
        'file_name',
        'type',
        'mime_type',
        'size',
        'sort',
        'fileable_id',
        'fileable_type'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uploader_id = auth()->user()->id;
        });
    }

    // Relations
    public function fileable()
    {
        return $this->morphTo();
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploader_id');
    }

    // Scopes
    public function scopeSearch($query, $value)
    {
        return $query->where('file_name', 'LIKE', "%{$value}%");
    }
}