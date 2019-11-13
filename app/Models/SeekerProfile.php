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
        'occupation_id',
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
        'github',

        'taken_id',
        'course_id',
        'it_level',
        'reading',
        'listening',
        'speaking',
        'writing',
        'english_level_id'
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

    static protected $english_levels = [
        'a1' => 'CEFR - A1',
        'a2' => 'CEFR - A2',
        'b1' => 'CEFR - B1',
        'b2' => 'CEFR - B2',
        'c1' => 'CEFR - C1',
        'c2' => 'CEFR - C2'
    ];

    // Skills
    static protected $programming_languages = [
        'pl1' => 'C#',
        'pl2' => 'PHP',
        'pl3' => 'Ruby',
        'pl4' => 'Python2',
        'pl5' => 'Python3',
        'pl6' => 'Javascript',
        'pl7' => 'HTML5+CSS3',
        'pl8' => 'Sass',
        'pl9' => 'SQL',
        'pl10' => 'Bash'
    ];

    // Skills
    static protected $frameworks = [
        'f1' => 'Laravel',
        'f2' => 'Ruby on Rails',
        'f3' => 'Django',
        'f4' => 'Flask',
        'f5' => 'Unity',
        'f6' => 'Vue.js',
        'f7' => 'Bootstrap',
        'f8' => 'TensorFlow'
    ];

    // Skills
    static protected $experiences = [
        'ex1' => 'Web development (server side engineer)',
        'ex2' => 'Web development (front-end engineer)',
        'ex3' => 'Research and development (image processing, natural language processing, machine learning, AI, etc.)',
        'ex4' => 'Consumer game development'
    ];

    // Skills
    static protected $others = [
        'o1' => 'Linux',
        'o2' => 'Cent OS',
        'o3' => 'Debian',
        'o4' => 'Mac OS',
        'o5' => 'Apache',
        'o6' => 'nginx',
        'o7' => 'Unicorn',
        'o8' => 'Amazon Web Service',
        'o9' => 'Wordpress',
        'o10' => 'Vim'
    ];

    // Skills
    static protected $languages = [
        'l1' => 'Nihongo',
        'l2' => 'English',
        'l3' => 'Swahili',
        'l4' => 'Svenska',
        'l5' => 'French'
    ];

    protected $casts = [
        'taken_id' => 'array',
    ];

    public static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            if ($model->taken_id) {
                $model->taken_id = json_encode([$model->taken_id]);
            }

            foreach(['email', 'name', 'japanese_name', 'display_name'] as $attribute) {
                unset($model->$attribute);
            }
        });
    }

    // Attributes
    public function getCourseAttribute()
    {
        return isset(self::$courses[$this->course_id]) ? ucwords(self::$courses[$this->course_id]) : null;
    }

    public function getStudentStatusAttribute()
    {
        return isset(self::$student_status[$this->status]) ? ucwords(self::$student_status[$this->status]) : null;
    }

    public function getTakenClassAttribute()
    {
        $courses = [];

        if ($this->taken_id) {

            foreach ($this->taken_id as $course_id) {
                $courses[$course_id] = self::getCourses($course_id);
            }

        }

        return $courses;
    }

    public function getOccupationAttribute()
    {
        return $this->occupation_id ? self::getOccupations($this->occupation_id) : null;
    }

    public function getEnglishLevelAttribute()
    {
        return $this->english_level_id ? self::getEnglishLevels(strtolower($this->english_level_id)) : null;
    }

    // Scopes
    public function scopeSearch($query, $value)
    {
        return $query->whereHas('user', function ($q) use ($value) {
            $q->where('japanese_name', 'LIKE', "%{$value}%")->orWhere('name', 'LIKE', "%{$value}%");
        });
    }

    // Options
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

    static function getEnglishLevels($index = null)
    {
        $english_levels = self::$english_levels;

        if ($index) {
            return $english_levels[$index] ?? null;
        }

        return collect($english_levels);
    }

    static function getCourses($index = null)
    {
        $courses = self::$courses;

        if ($index) {
            return $courses[$index] ?? null;
        }

        return collect($courses);
    }

    static function getProgrammingLanguages($index = null)
    {
        $programming_languages = self::$programming_languages;

        if ($index) {
            return $programming_languages[$index] ?? null;
        }

        return collect($programming_languages);
    }

    static function getFrameworks($index = null)
    {
        $frameworks = self::$frameworks;

        if ($index) {
            return $frameworks[$index] ?? null;
        }

        return collect($frameworks);
    }

    static function getExperiences($index = null)
    {
        $experiences = self::$experiences;

        if ($index) {
            return $experiences[$index] ?? null;
        }

        return collect($experiences);
    }

    static function getOthers($index = null)
    {
        $others = self::$others;

        if ($index) {
            return $others[$index] ?? null;
        }

        return collect($others);
    }

    static function getLanguages($index = null)
    {
        $languages = self::$languages;

        if ($index) {
            return $languages[$index] ?? null;
        }

        return collect($languages);
    }
    
}
