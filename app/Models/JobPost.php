<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPost extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'deleted_at',
        'published_at',
        'updated_at'
    ];

    protected $fillable = [
		'company_profile_id',
		'title',
		'description',
		'slug',

		'position',
		'programming_language',
		'framework',
		'environment',
		'database',
		'requirements',
		'employment_type',
		'number_of_applicants',
		'work_time',
        'salary',
		'holidays',
		'allowance',
		'incentive',
		'salary_increase',
		'insurance',
		'contract_period',
		'screening_flow',

		'prefecture',
		'address1',
		'address2',
		'address3',
		'city',
		'country',
		'station',
		'published_at'
	];

    static protected $employment_types = [
        'em' => 'Employee',
        'ce' => 'Contract employee',
        'in' => 'Internship',
    ];

    protected $appends = ['cover_photo'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = urldecode(strtolower($model->name));
        });
        static::updating(function ($model) {
            $model->slug = urldecode(strtolower($model->name));
        });
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('title', 'LIKE', "%{$value}%")
            ->orWhere('position', 'LIKE', "%{$value}%")
            ->orWhere('programming_language', 'LIKE', "%{$value}%")
            ->orWhere('framework', 'LIKE', "%{$value}%")
            ->orWhere('environment', 'LIKE', "%{$value}%")
            ->orWhere('database', 'LIKE', "%{$value}%");
    }

    public function scopePopular($query)
    {
        return $query->select(\DB::raw(
                'job_posts.*,
                count(likes.id) as total_likes')
            )->leftJoin('likes', 'likes.likeable_id', '=', 'job_posts.id')
            ->where('likes.likeable_type', get_class($this))
            ->groupBy('job_posts.id');
    }

    // Attributes
    public function getCoverPhotoAttribute()
    {
        if (! $this->file) {
            return null;
        }
        
        return FileService::retrievePath($this->file->url);
    }

    // Relationships
    public function company()
    {
        return $this->belongsTo(CompanyProfile::class, 'company_profile_id');
    }

    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'likeable');
    }

    static function getEmploymentTypes($index = null)
    {
        $employment_types = self::$employment_types;

        if ($index) {
            return $employment_types[$index] ?? null;
        }

        return collect($employment_types);
    }

    static function getRange($index = null)
    {
        return [
            '~100',
            '150',
            '200',
            '250',
            '300',
            '350',
            '400',
            '450',
            '500',
            '550',
            '600',
            '650',
            '700',
            '750',
            '800',
            '850',
            '900',
            '950',
            '1000',
            '1000~'
        ];
    }
}
