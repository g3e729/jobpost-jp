<?php

namespace App\Models;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeProfile extends Model
{
    use HasUser, SoftDeletes;

    const ROLE = 'employee';

    protected $dates = [
        'birthday',
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    protected $fillable = [
        'sex',
        'contact_number',
        'prefecture',
        'address1',
        'address2',
        'address3',
        'country',
        'status',
        'passport_number',
        'position_id',
        'birthday',

        'deleted_at'
    ];

    static protected $get_attr = [
        'position',
        'employment_status'
    ];

    static protected $employment_status = [
        1 => '無休インターン : Unpaid intern',
        2 => '有給インターン : Paid intern',
        3 => '契約社員 : Contract employee',
        4 => '社員 : Employee',
        5 => 'パートタイム : Part time',
        6 => 'フルタイム : Full time',
        7 => '退職 : Retirement',
    ];

    static protected $positions = [
        1 => 'IT',
        2 => 'ESL',
        3 => 'Housekeeper',
        4 => 'Admin',
        5 => 'Marketing',
        6 => 'Sales',
        7 => 'Student Support',
    ];

    public static function boot()
    {
        parent::boot();
    }

    // Scopes
    public function scopeSearch($query, $value)
    {
        return $query->whereHas('user', function ($q) use ($value) {
            $q->where('japanese_name', 'LIKE', "%{$value}%")->orWhere('name', 'LIKE', "%{$value}%");
        });
    }

    // Attributes
    public function getPositionAttribute()
    {
        return isset(self::$positions[$this->position_id]) ? ucwords(self::$positions[$this->position_id]) : null;
    }

    public function getEmploymentStatusAttribute()
    {
        return isset(self::$employment_status[$this->status]) ? ucwords(self::$employment_status[$this->status]) : null;
    }

    // Options
    static function getEmploymentStatus($index = null)
    {
        $employment_status = self::$employment_status;

        if ($index) {
            return $employment_status[$index] ?? null;
        }

        return collect($employment_status);
    }

    static function getPositions($index = null)
    {
        $positions = self::$positions;

        if ($index) {
            return $positions[$index] ?? null;
        }

        return collect($positions);
    }
}
