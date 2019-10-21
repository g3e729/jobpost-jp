<?php

namespace App\Models;

use App\Models\HasUserModel;

class SeekerProfile extends HasUserModel
{
	const ROLE = 'seeker';

	static protected $courses = [
		1 => 'basic',
		2 => 'rails-standard',
		3 => 'rails-advance',
		4 => 'rails-expert',
		5 => 'develop-standard',
		6 => 'develop-advance',
		7 => 'design-standard',
		8 => 'design-advance',
		9 => 'python-standard',
		10 => 'python-advance'
	];

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

	static function getCourses($index = null)
	{
		$courses = self::$courses;

		if ($index) {
			return $courses[$index] ?? null;
		}

		return collect(self::$courses);
	}
}
