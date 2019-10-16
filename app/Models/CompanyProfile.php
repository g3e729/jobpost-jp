<?php

namespace App\Models;

use App\Models\HasUserModel;

class CompanyProfile extends HasUserModel
{
    const ROLE = 'company';

    public static function boot()
    {
        parent::boot();
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
