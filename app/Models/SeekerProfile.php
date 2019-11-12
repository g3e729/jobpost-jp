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
        'portfolio',
        'github',

        'taken_id',
        'course_id',
        'it_level',
        'reading',
        'listening',
        'speaking',
        'writing',
        'english_level'
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

    static protected $experiences = [
      1 => 'プログラムコーディング',
      2 => 'システム設計',
      3 => '保守、追加開発',
      4 => 'インフラ設計',
      5 => 'インフラ構築',
      6 => 'プロジェクトマネジメント',
      7 => '新規開発の企画',
      8 => '要件定義',
      9 => 'テスト',
      10 => '研究開発'
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
        return self::getOccupations($this->occupation_id);
    }

    // Scopes
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

    static function getExperiences($index = null)
    {
        $experiences = self::$experiences;

        if ($index) {
            return $experiences[$index] ?? null;
        }

        return collect($experiences);
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
