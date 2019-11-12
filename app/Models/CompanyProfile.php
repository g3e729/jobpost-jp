<?php

namespace App\Models;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasUser;

    const ROLE = 'company';

    protected $dates = [
        'created_at',
        'established_date',
        'updated_at',
    ];

    protected $fillable = [
        'company_name',
        'description',
        'contact_number',
        'prefecture',
        'address1',
        'address2',
        'address3',
        'city',
        'country',
        'industry_id',
        'cover_photo',
        'homepage',
        'ceo',
        'number_of_employees',
        'established_date',
        'portfolio'
    ];

    static protected $industries = [
        1 => 'IT',
        'others' => 'others'
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

    /**
     * Get posts.
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getIndustryAttribute()
    {
        return isset(self::$industries[$this->industry_id]) ? ucwords(self::$industries[$this->industry_id]) : null;
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('company_name', 'LIKE', "%{$value}%");
    }

    static function getIndustries($index = null)
    {
        $industries = self::$industries;

        if ($index) {
            return $industries[$index] ?? null;
        }

        return collect(self::$industries);
    }
}
