<?php

namespace App\Traits;

use App\Models\Like;

trait HasLike
{
    public function scopePopular($query)
    {
        return $query->with('likes')->withCount([
            'likes' => function ($q) {
                $q->where('likes.likeable_type', get_class($this));
            }
        ]);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
