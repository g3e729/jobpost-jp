<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'likeable_id',
        'likeable_type',
        'updated_at',
        'liker',
    ];

    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type'
    ];

    protected $appends = [
        'liker_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $user = $model->likeable->user;
            $title = auth()->user()->profile->display_name . ' likes your ';
            $description = '';
            $group_id = substr(md5(now()), 0, 8);

            if ($model->likeable instanceof JobPost) {
                $about_type = JobPost::class;
                $about_id = $model->likeable->id;
                $title .= 'job post.';
            } else {
                $about_type = ($model->likeable instanceof SeekerProfile) ? SeekerProfile::class : CompanyProfile::class;
                $about_id = $model->likeable->id;
                $title .= 'profile.';
            }

            $user->notifications()->create(compact('title', 'description', 'about_type', 'about_id', 'group_id'));
        });
    }

    public function likeable()
    {
        return $this->morphTo();
    }

    public function liker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getLikerIdAttribute()
    {
        return $this->liker->api_token ?? null;
    }
}
