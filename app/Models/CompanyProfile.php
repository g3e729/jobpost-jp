<?php

namespace App\Models;

use App\Traits\HasLike;
use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyProfile extends Model
{
    use HasLike, HasUser, SoftDeletes;

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
        
        'what_text',
        'why_text',
        'how_text',

        'available_tickets',

        'deleted_at'
    ];

    static protected $industries = [
        1 => 'IT',
        'others' => 'others'
    ];

    protected $appends = [
        'email',
        'name',
        'japanese_name',
        'display_name',
        'avatar',
        'cover_photo',
        'social_media_accounts',
        'listed_skills',

        'what_photos',
        'why_photos',
        'how_photos',

        'industry'
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
    public function jobPosts()
    {
        return $this->hasMany(JobPost::class);
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
