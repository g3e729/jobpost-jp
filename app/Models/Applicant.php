<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'job_post_id',
        'seeker_profile_id',
        'notes',
        'status_id',
        'scout'
    ];

    protected $hidden = [
        'seeker_profile_id',
        'job_post_id'
    ];

    protected $appends = [
        'employer'
    ];

    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $model->chat_channel()->create([]);
        });
    }

    // Relations
    public function chat_channel()
    {
        return $this->morphOne(ChatChannel::class, 'chattable');
    }

    public function applicant()
    {
        return $this->hasOne(SeekerProfile::class, 'seeker_profile_id');
    }

    public function job_post()
    {
        return $this->belongsTo(JobPost::class, 'job_post_id');
    }

    public function getEmployerAttribute()
    {
        return $this->job_post->company ?? null;
    }
}
