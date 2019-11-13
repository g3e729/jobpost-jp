<?php

namespace App\Traits;

use App\Models\File;
use App\Models\Portfolio;
use App\Models\Skill;
use App\Models\SocialMediaAccount;
use App\Models\User;

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
        'listed_skills'
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
