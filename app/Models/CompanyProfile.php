<?php

namespace App\Models;

use App\Models\HasUserModel;

class CompanyProfile extends HasUserModel
{
    const ROLE = 'company';

    public static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            foreach(['email', 'name', 'japanese_name', 'display_name'] as $attribute) {
                unset($model->$attribute);
            }
        });
    }
    
    /**
     * Get posts.
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
