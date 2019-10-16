<?php

namespace App\Models;

use App\Models\HasUserModel;

class SeekerProfile extends HasUserModel
{
	const ROLE = 'seeker';

    public static function boot()
    {
        parent::boot();
    }
	
    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

	public function getStatusAttribute()
	{
		switch ($this->status_id) {
			case 1:
				return 'pre-student';
			break;
			case 2:
				return 'graduate';
			break;
			default:
				return 'student';
		}
	}

    public function scopeSearch($query, $value)
    {
        return $query->whereHas('user', function ($q) use ($value) {
        	$q->where('name', 'LIKE', "%{$value}%");
        });
    }
}
