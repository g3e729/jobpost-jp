<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMediaAccount extends Model
{
    public $timestamps = false;

    protected $dates = [
        'created_at',
    ];

    protected $hidden = [
        'accountable_id',
        'accountable_type',
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
		'id',
		'url',
		'social_media',
		'accountable_id',
		'accountable_type'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function accountable()
    {
        return $this->morphTo();
    }
}