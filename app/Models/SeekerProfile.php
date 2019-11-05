<?php

namespace App\Models;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;

class SeekerProfile extends Model
{
    use HasUser;
    
	const ROLE = 'seeker';

    protected $dates = [
        'birthday',
        'enrollment_date',
        'graduation_date',
        'created_at',
        'updated_at',
    ];
    
    protected $fillable = [
        'sex',
        'contact_number',
        'study_abroad_fee',
        'passport_number',
                    
        'type_of_room',
        'enrollment_date',
        'graduation_date',
        'status',
        'course_id',
        'study_period',
        'travel_ticket',
        'for_pickup',

        'description',
        'prefecture',
        'address1',
        'address2',
        'address3',
        'city',
        'country',
        'birthday',
        'avatar',
        'portfolio',
        'github',
                    
        'pre_english_level',
        'pre_it_level'
    ];

	static protected $courses = [
		1 => 'Basic',
		2 => 'Rails Standard',
		3 => 'Rails Advance',
		4 => 'Rails Expert',
		5 => 'Develop Standard',
		6 => 'Develop Advance',
		7 => 'Design Standard',
		8 => 'Design Advance',
		9 => 'Python Standard',
		10 => 'Python Advance'
	];

    static protected $student_status = [
		1 => '入学前 / Pre-Student',
		2 => '生徒 / Student',
		3 => '卒業 / Graduate'
    ];

    static protected $occupations = [
		1 => '学生 / Student',
		2 => '就業者 / Worker',
		3 => 'フリー / Part-time worker'
    ];

    public static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            foreach(['email', 'name', 'japanese_name', 'display_name'] as $attribute) {
                unset($model->$attribute);
            }
        });
    }

    public function avatar()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function getCourseAttribute()
    {
        return isset(self::$courses[$this->course_id]) ? ucwords(self::$courses[$this->course_id]) : null;
    }

    public function getStudentStatusAttribute()
    {
        return isset(self::$student_status[$this->status]) ? ucwords(self::$student_status[$this->status]) : null;
    }

    public function scopeSearch($query, $value)
    {
        return $query->whereHas('user', function ($q) use ($value) {
            $q->where('japanese_name', 'LIKE', "%{$value}%")->orWhere('name', 'LIKE', "%{$value}%");
        });
    }

    static function getStudentStatus($index = null)
    {
        $student_status = self::$student_status;

        if ($index) {
            return $student_status[$index] ?? null;
        }

        return collect($student_status);
    }

    static function getOccupations($index = null)
    {
        $occupations = self::$occupations;

        if ($index) {
            return $occupations[$index] ?? null;
        }

        return collect($occupations);
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
