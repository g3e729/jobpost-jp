<?php

namespace App\Models;

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

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
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

    // Attributes
    public function getCoverPhotoAttribute()
    {
        $url = $this->files()->where('type', 'cover_photo')->first()->url ?? null;

        return $url ?? null;
    }

    // Relationships
    public function company()
    {
        return $this->belongsTo(CompanyProfile::class, 'company_profile_id');
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
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
