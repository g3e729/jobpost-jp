<?php

namespace App\Models;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyProfile extends Model
{
    use HasUser, SoftDeletes;

    const ROLE = 'company';

    protected $dates = [
        'created_at',
        'deleted_at',
        'established_date',
        'updated_at'
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
        'portfolio',
        
        'what_text',
        'why_text',
        'how_text',

        'deleted_at'
    ];

    static protected $get_attr = [
        'industry',
        'features'
    ];

    static protected $industries = [
        1 => 'IT',
        'others' => 'others'
    ];

    public static function boot()
    {
        parent::boot();
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('company_name', 'LIKE', "%{$value}%");
    }

    // Attributes
    public function getIndustryAttribute()
    {
        return isset(self::$industries[$this->industry_id]) ? ucwords(self::$industries[$this->industry_id]) : null;
    }

    // Relationships
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    public function features()
    {
        return $this->morphMany(Feature::class, 'featurable');
    }

    // Options
    static function getIndustries($index = null)
    {
        $industries = self::$industries;

        if ($index) {
            return $industries[$index] ?? null;
        }

        return collect(self::$industries);
    }
}
