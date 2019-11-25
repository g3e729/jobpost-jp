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
        'english_level_id',

        'what_text',
        'intro_text',
        'movie_url'
    ];

    static protected $get_attr = [
        'course',
        'student_status',
        'taken_class',
        'occupation',
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
        'pl1' => 'Java',
        'pl2' => 'C',
        'pl3' => 'C ++',
        'pl4' => 'C#',
        'pl5' => 'PHP',
        'pl6' => 'Ruby',
        'pl7' => 'Python2',
        'pl8' => 'Python3',
        'pl9' => 'Perl',
        'pl10' => 'Objective-C',
        'pl11' => 'Swift',
        'pl12' => 'VB',
        'pl13' => 'R',
        'pl14' => 'Haskell',
        'pl15' => 'Scala',
        'pl16' => 'Go',
        'pl17' => 'Javascript',
        'pl18' => 'HTML5 CSS3',
        'pl19' => 'Coffee script',
        'pl20' => 'Haml',
        'pl21' => 'Sass',
        'pl22' => 'TypeScript',
        'pl23' => 'SQL',
        'pl24' => 'COBOL',
        'pl25' => 'Kotlin',
        'pl26' => 'Rust',
        'pl27' => 'Bash',
        'pl28' => 'Elixir',
        'pl29' => 'F #'
    ];

    // Skills
    static protected $frameworks = [
        'f1' => 'Spring',
        'f2' => 'Java EE',
        'f3' => 'Symfony',
        'f4' => 'CakePHP',
        'f5' => 'FuelPHP',
        'f6' => 'Zend Framework',
        'f7' => 'Laravel',
        'f8' => 'Phalcon',
        'f9' => 'Slim',
        'f10' => 'Ruby on Rails',
        'f11' => 'Sinatra',
        'f12' => 'Django',
        'f13' => 'Tormado',
        'f14' => 'Flask',
        'f15' => 'Pyramid',
        'f16' => 'Pylans',
        'f17' => 'Unity',
        'f18' => 'Unreal Engine',
        'f19' => '.NET Framework',
        'f20' => 'Open GL',
        'f21' => 'Android SDK',
        'f22' => 'iOS SDK',
        'f23' => 'jQuery',
        'f24' => 'Angular JS',
        'f25' => 'React',
        'f26' => 'Vue.js',
        'f27' => 'Node.js',
        'f28' => 'Backbone.js',
        'f29' => 'Ember.js',
        'f30' => 'Knockout.js',
        'f31' => 'Riot.js',
        'f32' => 'Bootstrap',
        'f33' => 'Foundation',
        'f34' => 'Dojo Toolkit',
        'f35' => 'Titanium Mobile',
        'f36' => 'Echo',
        'f37' => 'Gin',
        'f38' => 'Revel',
        'f39' => 'Tensor Flow',
        'f40' => 'Chainer',
        'f41' => 'Keras'
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

    static protected $positions = [
        1 => 'Frontend',
        2 => 'Backend',
        3 => 'Designer',
        4 => 'Data scientist',
        5 => 'Marketing',
        6 => 'Writer',
        7 => 'ETC'
    ];

    static protected $databases = [
        'd1' =>'Oracle',
        'd2' =>'SQL Server',
        'd3' =>'Sybase',
        'd4' =>'MySQL',
        'd5' =>'MariaDB',
        'd6' =>'Postgres',
        'd7' =>'Jet',
        'd8' =>'SQLite'
    ];

    static protected $employment_status = [
        1 => 'Employee',
        2 => 'Contract employee',
        3 => 'Internship'
    ];

    static protected $income = [
        'i1' => '~100',
        'i2' => '150',
        'i3' => '200',
        'i4' => '250',
        'i5' => '300',
        'i6' => '350',
        'i7' => '400',
        'i8' => '450',
        'i9' => '500',
        'i10' => '550',
        'i11' => '600',
        'i12' => '650',
        'i13' => '700',
        'i14' => '750',
        'i15' => '800',
        'i16' => '850',
        'i17' => '900',
        'i18' => '950',
        'i19' => '1000',
        'i20' => '1000~'
    ];

    public static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            if ($model->taken_id) {
                $model->taken_id = json_encode([$model->taken_id]);
            }
        });
    }

    // Scopes
    public function scopeSearch($query, $value)
    {
        return $query->whereHas('user', function ($q) use ($value) {
            $q->where('japanese_name', 'LIKE', "%{$value}%")->orWhere('name', 'LIKE', "%{$value}%");
        });
    }

    // Attributes
    public function getCourseAttribute()
    {
        return isset(self::$courses[$this->course_id]) ? ucwords(self::$courses[$this->course_id]) : null;
    }

    public function getStudentStatusAttribute()
    {
        if ($this->graduation_date < now()) {
            return self::getStudentStatus(3);
        }

        if ($this->enrollment_date < now()) {
            return self::getStudentStatus(2);
        }

        return self::getStudentStatus(1);
    }

    public function getTakenClassAttribute()
    {
        $courses = [];
        $taken = json_decode($this->taken_id);

        foreach ($taken as $course_id) {
            $courses[$course_id] = self::getCourses($course_id);
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

    static function getPositions($index = null)
    {
        $positions = self::$positions;

        if ($index) {
            return $positions[$index] ?? null;
        }

        return collect($positions);
    }

    static function getDatabases($index = null)
    {
        $databases = self::$databases;

        if ($index) {
            return $databases[$index] ?? null;
        }

        return collect($databases);
    }

    static function getEmploymentStatus($index = null)
    {
        $employment_status = self::$employment_status;

        if ($index) {
            return $employment_status[$index] ?? null;
        }

        return collect($employment_status);
    }

    static function getIncome($index = null)
    {
        $income = self::$income;

        if ($index) {
            return $income[$index] ?? null;
        }

        return collect($income);
    }

}
