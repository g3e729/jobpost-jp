<?php

namespace App\Traits;

use App\Models\File;
use App\Models\User;

trait HasUser
{
    protected $api_attr = ['display_name', 'email', 'japanese_name', 'name'];

    public static function boot()
    {
        parent::boot();
        static::retrieved(function ($model) {
            // $model->display_name = empty(str_replace(' ', '', $model->user->japanese_name)) ? $model->user->name : $model->user->japanese_name;
            // $model->email = $model->user->email;
            // $model->japanese_name = $model->user->japanese_name;
            // $model->name = $model->user->name;
        });
    }

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
	
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function forApi()
    {
        foreach($this->api_attr as $attr) {
            $this[$attr] = $this->$attr;
        }

        return $this->toJson();
    }
}
