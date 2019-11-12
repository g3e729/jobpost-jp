<?php

namespace App\Traits;

use App\Models\File;
use App\Models\SocialMediaAccount;
use App\Models\User;

trait HasUser
{
    static protected $api_attr = ['display_name', 'email', 'japanese_name', 'name'];

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
        // $file_headers = @get_headers($url);

        // if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        //     $url = null;
        // }

        return $url ?? asset('img/avatar-default.png');
    }

    public function getCoverPhotoAttribute()
    {
        $url = $this->files()->where('type', 'cover_photo')->first()->url ?? null;

        return $url ?? null;
    }

    public function getSocialMediaAccountsAttribute()
    {
        return $this->social_media->pluck('url', 'social_media');
    }
	
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

    public function forApi()
    {
        foreach(self::$api_attr as $attr) {
            $this[$attr] = $this->$attr;
        }

        return $this->toJson();
    }
}
