<?php

namespace App\Traits;

use App\Models\EducationHistory;
use App\Models\File;
use App\Models\Portfolio;
use App\Models\Skill;
use App\Models\SocialMediaAccount;
use App\Models\User;
use App\Models\WorkHistory;
use App\Services\FileService;

trait HasUser
{
    // Attributes
    public function getEmailAttribute()
    {
        return $this->user->email;
    }

    public function getNameAttribute()
    {
        return $this->user->name;
    }

    public function getJapaneseNameAttribute()
    {
        return $this->user->japanese_name;
    }

    public function getDisplayNameAttribute()
    {
        if (!$this->user) {
            return null;
        }

        if ($this->user->hasRole('company')) {
            return $this->company_name;
        }

        return empty(str_replace(' ', '', $this->user->japanese_name)) ? $this->user->name : $this->user->japanese_name;
    }

    public function getAvatarAttribute()
    {
        $url = $this->files()->where('type', 'avatar')->first()->url ?? null;

        if (!$url) {
            return asset('img/avatar-default.png');
        }

        return FileService::retrievePath($url);

    }

    public function getCoverPhotoAttribute()
    {
        $url = $this->files()->where('type', 'cover_photo')->first()->url ?? null;

        if (!$url) {
            return null;
        }

        return FileService::retrievePath($url);
    }

    public function getWhatPhotosAttribute()
    {
        $photos = $this->files()->where('type', 'what_photo')
            ->orderBy('sort')
            ->get()->each(function ($file) {
                $file->url = FileService::retrievePath($file->url);
            });

        return $photos->pluck('url', 'sort') ?? collect();
    }

    public function getWhyPhotosAttribute()
    {
        $photos = $this->files()->where('type', 'why_photo')
            ->orderBy('sort')
            ->get()->each(function ($file) {
                $file->url = FileService::retrievePath($file->url);
            });

        return $photos->pluck('url', 'sort') ?? collect();
    }

    public function getHowPhotosAttribute()
    {
        $photos = $this->files()->where('type', 'how_photo')
            ->orderBy('sort')
            ->get()->each(function ($file) {
                $file->url = FileService::retrievePath($file->url);
            });

        return $photos->pluck('url', 'sort') ?? collect();
    }

    public function getSocialMediaAccountsAttribute()
    {
        return $this->social_media->pluck('url', 'social_media')->toArray();
    }

    public function getListedSkillsAttribute()
    {
        return $this->skills->pluck('skill_rate', 'skill_id');
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function social_media()
    {
        return $this->morphMany(SocialMediaAccount::class, 'accountable');
    }

    public function skills()
    {
        return $this->morphMany(Skill::class, 'skillable');
    }

    public function portfolios()
    {
        return $this->morphMany(Portfolio::class, 'portfolable');
    }

    public function work_history()
    {
        return $this->morphMany(WorkHistory::class, 'historiable');
    }

    public function education_history()
    {
        return $this->morphMany(EducationHistory::class, 'historiable');
    }
}
