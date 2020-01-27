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
        'scouted'
    ];

    protected $hidden = [
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
            $description = '';
            $about_type = JobPost::class;
            $about_id = $model->job_post_id;

            if ($model->scouted) {
                $title = auth()->user()->profile->display_name . ' scouted you.';
                $user = $model->applicant->user;
            } else {
                $title = auth()->user()->profile->display_name . ' applied to your job.';
                $user = $model->employer->user;
            }

            $user->notifications()->create(compact('title', 'description', 'about_type', 'about_id'));
        });
        static::deleting(function ($model) {
            $model->chat_channel()->forceDelete();
        });
    }

    public function scopeSearch($query, $value, $model)
    {
        if ($model instanceof SeekerProfile) {
            return $query->whereHas('job_post', function ($q) use ($value) {
                $q->search($value);
            });
        } elseif ($model instanceof CompanyProfile) {
            return $query->whereHas('applicant', function ($q) use ($value) {
                $q->search($value);
            });
        }

    }

    // Relations
    public function chat_channel()
    {
        return $this->morphOne(ChatChannel::class, 'chattable');
    }

    public function applicant()
    {
        return $this->hasOne(SeekerProfile::class, 'id', 'seeker_profile_id');
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
