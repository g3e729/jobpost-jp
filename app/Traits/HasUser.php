<?php

namespace App\Traits;

use App\Models\EducationHistory;
use App\Models\File;
use App\Models\Portfolio;
use App\Models\Skill;
use App\Models\SocialMediaAccount;
use App\Models\User;
use App\Models\WorkHistory;

trait HasUser
{
    static protected $api_attr = [
        'email',
        'name',
        'japanese_name',
        'display_name',
        'avatar',
        'cover_photo',
        'social_media_accounts',
        'listed_skills',

        'what_photos',
        'why_photos',
        'how_photos',
    ];
    
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
        if (! $this->user) {
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

        return $url ?? asset('img/avatar-default.png');
    }

    public function getCoverPhotoAttribute()
    {
        $url = $this->files()->where('type', 'cover_photo')->first()->url ?? null;

        return $url ?? null;
    }

    public function getWhatPhotosAttribute()
    {
        return $this->files()->where('type', 'what_photo')->orderBy('sort')->pluck('url', 'sort') ?? collect();
    }

    public function getWhyPhotosAttribute()
    {
        return $this->files()->where('type', 'why_photo')->orderBy('sort')->pluck('url', 'sort') ?? collect();
    }

    public function getHowPhotosAttribute()
    {
        return $this->files()->where('type', 'how_photo')->orderBy('sort')->pluck('url', 'sort') ?? collect();
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
        return $this->hasMany(Portfolio::class);
    }

    public function work_history()
    {
        return $this->morphMany(WorkHistory::class, 'historiable');
    }

    public function education_history()
    {
        return $this->morphMany(EducationHistory::class, 'historiable');
    }

    // API attribute json setter
    public function forApi()
    {
        $attributes = array_merge(self::$api_attr, $this::$get_attr);
        foreach($attributes as $attr) {
            $this[$attr] = $this->$attr;
        }

        return $this->toJson();
    }
}
