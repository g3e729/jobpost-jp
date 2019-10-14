<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    const ROLE = 'company';

    public function user()
    {
        return $this->belongsTo(User::class);
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
